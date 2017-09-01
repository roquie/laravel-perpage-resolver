<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 15/02/2017
 */

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
    public function register()
    {
        Paginator::perPageResolver(function () {
            return (int) $this->app
                ->get('request') // use PSR ContainerInterface
                ->query('per_page');
        });
    }
}