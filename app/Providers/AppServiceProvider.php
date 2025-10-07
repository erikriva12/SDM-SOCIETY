<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Namespace controller (khusus Laravel < 8)
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * This namespace is applied to your controller routes.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Register routes
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Map routes untuk web & api
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace) // pakai namespace untuk Laravel lama
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace) // pakai namespace untuk Laravel lama
            ->group(base_path('routes/api.php'));
    }
}
