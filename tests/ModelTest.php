<?php

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;
use Roquie\LaravelPerPageResolver\Model;

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 9/1/17
 */

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