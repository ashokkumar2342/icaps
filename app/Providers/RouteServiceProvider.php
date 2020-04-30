<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapSellerRoutes();

        $this->mapUserRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::domain('www.icaps.co.in')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::domain('api.icaps.co.in')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
    
    protected function mapAdminRoutes()
    {
        Route::domain('admin.icaps.co.in')
             ->middleware('web')
             ->namespace('App\Http\Controllers\Admin')
             ->group(base_path('routes/admin.php'));
    }

    protected function mapSellerRoutes()
    {
        Route::domain('seller.icaps.co.in')
             ->middleware('web')
             ->namespace('App\Http\Controllers\Seller')
             ->group(base_path('routes/seller.php'));
    }
    protected function mapUserRoutes()
    {
        Route::domain('www.icaps.co.in')
             ->prefix('user')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/user.php'));
    }
}
