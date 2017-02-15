<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 15/02/2017
 */

namespace Roquie\LaravelPerPageResolver;

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
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $perPage = $perPage ?: Paginator::resolvePerPage();

        return parent::paginate($perPage, $columns, $pageName, $page);
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
    public function simplePaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $perPage = $perPage ?: Paginator::resolvePerPage();

        return parent::simplePaginate($perPage, $columns, $pageName, $page);
    }
}
