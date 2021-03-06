<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

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

        $this->mapApiPcRoutes();

        $this->mapApiAppRoutes();

        $this->mapApiWeiXinRoutes();
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
        Route::middleware('web')
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
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapApiPcRoutes()
    {
        Route::prefix('api/sys/pc/v1')
            ->middleware('api')
            ->middleware(['before', 'monitor_pc', 'source_sys', 'after'])
            ->namespace($this->namespace)
            ->group(base_path('routes/pc.php'));
    }

    protected function mapApiAppRoutes()
    {
        Route::prefix('api/sys/app/v1')
            ->middleware('cors')
            ->middleware('api')
            ->middleware(['before', 'monitor_app', 'source_sys', 'after'])
            ->namespace($this->namespace)
            ->group(base_path('routes/app.php'));
    }

    protected function mapApiWeiXinRoutes()
    {
        Route::prefix('api/weixin/v1')
            ->middleware('api')
            ->middleware(['before', 'monitor_weixin', 'after'])
            ->namespace($this->namespace)
            ->group(base_path('routes/wx.php'));
    }
}
