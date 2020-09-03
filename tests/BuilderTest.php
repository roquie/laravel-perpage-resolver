<?php

declare(strict_types=1);

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;
use Roquie\LaravelPerPageResolver\Builder;
use Roquie\LaravelPerPageResolver\Model;
use Roquie\LaravelPerPageResolver\Paginator;
use Illuminate\Database\Query\Builder as IlluminateQueryBuilder;

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

        // I don't know why framework calls undefined method or magick method.
        // I think I got a mistake with class mock but this workaround works.
        $model = new class extends Model {
            public function hydrate() {
                return Collection::make();
            }
        };

        $model::setConnectionResolver(new \Illuminate\Database\ConnectionResolver([
            null => $builder->getConnection()
        ]));

        $builder->setModel($model);

        return $builder;
    }
}
