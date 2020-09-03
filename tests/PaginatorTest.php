<?php

declare(strict_types=1);

use Roquie\LaravelPerPageResolver\Paginator;

class PaginatorTest extends TestCase
{
    public function testPerPageParameterResolvingWhenValueExists()
    {
        Paginator::perPageResolver(function () {
            return 100;
        });

        $this->assertSame(100, Paginator::resolvePerPage());
    }

    public function testPerPageParameterResolvingWhenIsNotDefined()
    {
        $reflect = new ReflectionClass(Paginator::class);
        $prop = $reflect->getProperty('perPageResolver');
        $prop->setAccessible(true);
        $prop->setValue('perPageResolver', null);

        $this->assertNull(Paginator::resolvePerPage());
    }

    public function testQueryParameterResolvingWhenValueExists()
    {
        Paginator::queryParametersResolver(function () {
            return ['foo' => 'bar'];
        });

        $this->assertSame(['foo' => 'bar'], Paginator::resolveQueryParameters());
    }

    public function testQueryParameterResolvingWhenIsNotDefined()
    {
        $reflect = new ReflectionClass(Paginator::class);
        $prop = $reflect->getProperty('queryParametersResolver');
        $prop->setAccessible(true);
        $prop->setValue('queryParametersResolver', null);

        $this->assertNull(Paginator::resolveQueryParameters());
    }
}
