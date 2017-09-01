<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 15/02/2017
 */

namespace Roquie\LaravelPerPageResolver;

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
     * @param callable $resolver
     */
    public static function perPageResolver(callable $resolver)
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
        if (null !== static::$perPageResolver) {
            return call_user_func(static::$perPageResolver);
        }

        return null;
    }
}
