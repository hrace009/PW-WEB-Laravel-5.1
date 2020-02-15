<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('news', 'App\Article');

        $router->model('shop', 'App\ShopItem');

        $router->model('vote', 'App\VoteSite');

        $router->model('voucher', 'App\Voucher');

        $router->model('service', 'App\Service');

        $router->model('user', 'App\User');
    }

    /**
     * Define the routes for the application.
     *
     * @param Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
