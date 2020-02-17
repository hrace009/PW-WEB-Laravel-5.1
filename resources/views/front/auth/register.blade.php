@extends('front.auth.master')
@section('content')
    <form class="login-form" action="{{ url( 'auth/register' ) }}" method="post">
        <h3 class="form-title font-green">{{ trans( 'main.signup.title' ) }}</h3>
        @if ( $errors->any() )
            <div class="alert alert-danger">
                @foreach( $errors->all() as $e )
                    <span>{{ $e }}</span><br>
                @endforeach
            </div>
        @endif
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="username"
                   class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.username' ) }}</label>
            <input id="username" class="form-control placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.username' ) }}" name="name"/></div>
        <div class="form-group">
            <label for="fullname"
                   class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.fullname' ) }}</label>
            <input id="fullname" class="form-control placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.fullname' ) }}" name="fullname"/></div>
        <div class="form-group">
            <label for="email" class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.email' ) }}</label>
            <input id="email" class="form-control placeholder-no-fix" type="text"
                   placeholder="{{ trans( 'main.signup.email' ) }}"
                   name="email"/>
        </div>
        <div class="form-group">
            <label for="register_password"
                   class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.password' ) }}</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password"
                   placeholder="{{ trans( 'main.signup.password' ) }}" name="password"/></div>
        <div class="form-group">
            <label for="password_confirmation"
                   class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.confirm' ) }}</label>
            <input id="password_confirmation" class="form-control placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.confirm' ) }}" name="password_confirmation"/></div>
        <div class="form-group">
            <label for="pin" class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.pin' ) }}</label>
            <input id="pin" class="form-control placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.pin' ) }}" name="pin"/></div>
        <div class="form-group margin-top-20 margin-bottom-20">
            <div id="register_tnc_error"></div>
        </div>
        <div class="form-actions text-center">
            <button type="submit" id="register-submit-btn"
                    class="btn btn-success uppercase">{{ trans( 'main.signup.submit' ) }}</button>
        </div>
        <div class="create-account">
            <p>
                <a href="{{ url('auth/login') }}" id="register-btn"
                   class="uppercase">{{ trans( 'main.signin.title' ) }}</a>
            </p>
            <p>
                <a href="{{ url('/') }}" id="register-btn"
                   class="uppercase">{{ trans( 'main.back' ) }}</a>
            </p>
        </div>
    </form>
@endsection