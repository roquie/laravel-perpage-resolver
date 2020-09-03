<?php

declare(strict_types=1);

namespace Roquie\LaravelPerPageResolver;

/**
 * Trait PerPageResolverTrait
 *
 * @package Roquie\LaravelPerPageResolver
 */
trait PerPageResolverTrait
{
    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return \Roquie\LaravelPerPageResolver\Builder
     */
    public function newEloquentBuilder($query): Builder
    {
        return new Builder($query);
    }
}
