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
    use PerPageResolverTrait;
}
