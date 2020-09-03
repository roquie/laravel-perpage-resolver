<?php

declare(strict_types=1);

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;
use Roquie\LaravelPerPageResolver\Model;

class ModelTest extends TestCase
{
    public function testShouldBeReturnCustomObject()
    {
        $builder = new Builder(
            $this->createMock(ConnectionInterface::class),
            $this->createMock(Grammar::class),
            $this->createMock(Processor::class)
        );

        $this->assertInstanceOf(
            \Roquie\LaravelPerPageResolver\Builder::class,
            (new Model())->newEloquentBuilder($builder)
        );
    }
}
