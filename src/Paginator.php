<?php

declare(strict_types=1);

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
     * @var ?Closure
     */
    protected static ?Closure $perPageResolver = null;

    /**
     * The query parameters resolver callback.
     *
     * @var ?Closure
     */
    protected static ?Closure $queryParametersResolver = null;

    /**
     * Set the per page resolver callback.
     *
     * @param callable $resolver
     */
    public static function perPageResolver(callable $resolver): void
    {
        static::$perPageResolver = $resolver;
    }

    /**
     * Resolve the per page or return the default value.
     *
     * @return ?int
     */
    public static function resolvePerPage(): ?int
    {
        if (null !== static::$perPageResolver) {
            return call_user_func(static::$perPageResolver);
        }

        return null;
    }

    /**
     * Set the resolver callback of query parameters.
     *
     * @param callable $resolver
     */
    public static function queryParametersResolver(callable $resolver): void
    {
        static::$queryParametersResolver = $resolver;
    }

    /**
     * Resolve the query parameters or return the default value.
     *
     * @return ?array
     */
    public static function resolveQueryParameters(): ?array
    {
        if (null !== static::$queryParametersResolver) {
            return call_user_func(static::$queryParametersResolver);
        }

        return null;
    }
}
