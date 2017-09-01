<?php

use Illuminate\Database\Connection;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;
use Roquie\LaravelPerPageResolver\Builder;
use Roquie\LaravelPerPageResolver\Model;
use Roquie\LaravelPerPageResolver\Paginator;
use Illuminate\Database\Query\Builder as IlluminateQueryBuilder;

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 9/1/17
 */

class BuilderTest extends TestCase
{
    public function testShouldBePerPageIsSetForMainMethod()
    {
        Paginator::perPageResolver(function () {
            return 101;
        });

        $this->assertSame(101, $this->createBuilder()->paginate()->perPage());
    }

    public function testShouldBePerPageIsSetForSimplePaginationMethod()
    {
        Paginator::perPageResolver(function () {
            return 102;
        });

        $this->assertSame(102, $this->createBuilder()->simplePaginate()->perPage());
    }

    /**
     * @return \Roquie\LaravelPerPageResolver\Builder
     */
    protected function createBuilder()
    {
        $builder = new Builder(new IlluminateQueryBuilder(
            $this->createMock(Connection::class),
            $this->createMock(Grammar::class),
            $this->createMock(Processor::class)
        ));

        Model::setConnectionResolver(new \Illuminate\Database\ConnectionResolver([
            null => $builder->getConnection()
        ]));

        $builder->setModel((new class extends Model {}));

        return $builder;
    }
}