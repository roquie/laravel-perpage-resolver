<?php

declare(strict_types=1);

namespace Roquie\LaravelPerPageResolver;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator as PaginatorInterface;

/**
 * Class Builder
 *
 * @package Roquie\LaravelPerPageResolver
 */
class Builder extends \Illuminate\Database\Eloquent\Builder
{
    /**
     * Paginate the given query.
     *
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param int|null $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        $perPage = $perPage ?: Paginator::resolvePerPage();
        $parameters = Paginator::resolveQueryParameters();

        return parent::paginate($perPage, $columns, $pageName, $page)
            ->appends($parameters);
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function simplePaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): PaginatorInterface
    {
        $perPage = $perPage ?: Paginator::resolvePerPage();
        $parameters = Paginator::resolveQueryParameters();

        return parent::simplePaginate($perPage, $columns, $pageName, $page)
            ->appends($parameters);
    }
}
