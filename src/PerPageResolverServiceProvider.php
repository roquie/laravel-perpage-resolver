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
        Paginator::queryParametersResolver(function () {
            return $this->app->get('request')->all();
        });

        Paginator::perPageResolver(function () {
            return (int) $this->app
                ->get('request') // use PSR ContainerInterface
                ->query('per_page');
        });
    }
}
