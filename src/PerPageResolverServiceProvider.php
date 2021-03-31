<?php

declare(strict_types=1);

namespace Roquie\LaravelPerPageResolver;

use Illuminate\Support\ServiceProvider;

/**
 * Class PerPageResolverServiceProvider
 *
 * @package Roquie\LaravelPerPageResolver
 */
class PerPageResolverServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        Paginator::queryParametersResolver(fn() =>
            $this->app->get('request')->all()
        );

        Paginator::perPageResolver(fn() =>
            (int) $this->app->get('request')->query('per_page')
        );
    }
}
