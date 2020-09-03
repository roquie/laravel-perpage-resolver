<?php

declare(strict_types=1);

namespace Roquie\LaravelPerPageResolver;

/**
 * Class Model
 *
 * @package Roquie\LaravelPerPageResolver
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    use PerPageResolverTrait;
}
