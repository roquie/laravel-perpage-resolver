<?php

declare(strict_types=1);
use Mockery as m;

class TestCase extends PHPUnit\Framework\TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }
}
