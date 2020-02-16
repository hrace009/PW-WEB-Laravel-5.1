<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLogin()
    {
        pagetitle([trans('main.login'), settings('server_name')]);
        return view('front.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|between:4,12|alpha_num|regex:/^[a-z0-9]+$/',
            'password' => 'required|string|between:4,12|alpha_num|regex:/^[a-z0-9]+$/',
            'pin' => 'required|numeric|digits_between:4,6|regex:/^[0-9]+$/',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt([
            'name' => strtolower($request->username),
            'password' => strtolower($request->username) . $request->password,
            'qq' => strtolower($request->pin)
        ],
            $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {
        return view('front.auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

        flash()->success(trans('main.reg_complete'));
        return redirect()->back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|between:4,12|alpha_num|regex:/^[a-z0-9]+$/|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|between:4,12|alpha_num|regex:/^[a-z0-9]+$/',
            'pin' => 'required|numeric|digits_between:4,6|numeric|regex:/^[0-9]+$/',
            'fullname' => 'required|string|regex:/^[a-zA-Z ]*$/',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'ID' => (User::all()->count() > 0) ? User::orderBy('ID', 'desc')->first()->ID + 16 : 1024,
            'name' => strtolower($data['name']),
            'email' => $data['email'],
            'passwd' => Hash::make(strtolower($data['name']) . $data['password']),
            'passwd2' => Hash::make(strtolower($data['name']) . $data['password']),
            'truename' => $data['fullname'],
            'answer' => $data['password'],
            'qq' => $data['pin'],
            'creatime' => Carbon::now(),
        ]);
    }
}
