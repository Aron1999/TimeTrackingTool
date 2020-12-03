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

        $this->mapTenantRoutes(); // add this call
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

    /**
     * Definte the "tenant" routes for the application.
     *
     * These routes should be aliased as tenant.x to make it explicit when referring
     * from view. This would help remove confusion in the future when we have
     * "system" routes. Think of it as a namespace for the routes.
     */
    protected function mapTenantRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('tenant.organisation.')
            // ->prefix('organisation')
            ->group(base_path('routes/organisation.php'));

            Route::middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('tenant.contact.')
            // ->prefix('organisation')
            ->group(base_path('routes/contact.php'));

            Route::middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('tenant.project.')
            // ->prefix('organisation')
            ->group(base_path('routes/project.php'));

            Route::middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('tenant.settings.')
            // ->prefix('organisation')
            ->group(base_path('routes/settings.php'));

            Route::middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('tenant.task.')
            // ->prefix('organisation')
            ->group(base_path('routes/task.php'));
    }
}
