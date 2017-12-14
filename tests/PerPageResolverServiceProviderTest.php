<?php

use Illuminate\Contracts\Foundation\Application;
use Mockery\MockInterface;
use Roquie\LaravelPerPageResolver\Paginator;
use Roquie\LaravelPerPageResolver\PerPageResolverServiceProvider;
use Mockery as m;

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 9/1/17
 */

class PerPageResolverServiceProviderTest extends TestCase
{
    public function testPackageRegistration()
    {
        $app = m::mock(Application::class, function (MockInterface $m) {
            $m->shouldReceive('get')
              ->andReturn(new class {
                  public function all() {
                      return ['foo' => 'bar'];
                  }
                  public function query() {
                      return 100;
                  }
              });
        });

        $provider = new PerPageResolverServiceProvider($app);
        $provider->register();

        $this->assertSame(100, Paginator::resolvePerPage());
        $this->assertSame(['foo' => 'bar'], Paginator::resolveQueryParameters());
    }

    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }
}