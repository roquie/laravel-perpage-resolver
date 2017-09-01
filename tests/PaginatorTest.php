<?php

use Roquie\LaravelPerPageResolver\Paginator;

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 9/1/17
 */

class PaginatorTest extends TestCase
{
    public function testParameterResolvingWhenValueExists()
    {
        Paginator::perPageResolver(function () {
            return 100;
        });

        $this->assertSame(100, Paginator::resolvePerPage());
    }

    public function testParameterResolvingWhenIsNotDefined()
    {
        $reflect = new ReflectionClass(Paginator::class);
        $prop = $reflect->getProperty('perPageResolver');
        $prop->setAccessible(true);
        $prop->setValue('perPageResolver', null);

        $this->assertNull(Paginator::resolvePerPage());
    }
}