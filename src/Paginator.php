<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 15/02/2017
 */

namespace Roquie\LaravelPerPageResolver;

use Closure;

/**
 * Class Paginator
 *
 * @package Roquie\LaravelPerPageResolver
 */
class Paginator extends \Illuminate\Pagination\Paginator
{
    /**
     * The per page resolver callback.
     *
     * @var \Closure
     */
    protected static $perPageResolver;

    /**
     * Set the per page resolver callback.
     *
     * @param \Closure $resolver
     */
    public static function perPageResolver(Closure $resolver)
    {
        static::$perPageResolver = $resolver;
    }

    /**
     * Resolve the per page or return the default value.
     *
     * @return \Closure|null
     */
    public static function resolvePerPage()
    {
        if (isset(static::$perPageResolver)) {
            return call_user_func(static::$perPageResolver);
        }

        return null;
    }
}
