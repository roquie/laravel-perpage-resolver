<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 15/02/2017
 */

namespace Roquie\LaravelPerPageResolver;

/**
 * Class Model
 *
 * @package Roquie\LaravelPerPageResolver
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }
}
