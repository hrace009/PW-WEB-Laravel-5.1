<?php

namespace App\Http;

use App\Http\Middleware\ApplicationEnabled;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EmptyCharacterIfServerOffline;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsInstalled;
use App\Http\Middleware\MaskExists;
use App\Http\Middleware\NotInstalled;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\SelectedCharacter;
use App\Http\Middleware\ServerOnline;
use App\Http\Middleware\ServiceEnabled;
use App\Http\Middleware\SetLanguage;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        CheckForMaintenanceMode::class,
        EncryptCookies::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        ShareErrorsFromSession::class,
        VerifyCsrfToken::class,
        NotInstalled::class,
        ApplicationEnabled::class,
        EmptyCharacterIfServerOffline::class,
        SetLanguage::class
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'guest' => RedirectIfAuthenticated::class,
        'mask.exists' => MaskExists::class,
        'selected.character' => SelectedCharacter::class,
        'service.enabled' => ServiceEnabled::class,
        'server.online' => ServerOnline::class,
        'installed' => IsInstalled::class,
        'admin' => IsAdmin::class
    ];
}
