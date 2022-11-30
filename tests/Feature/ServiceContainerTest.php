<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloWorld;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ServiceContainerTest extends TestCase
{

    public function testDepedencyInjection()
    {
        // $foo = new Foo();
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo", $foo1->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function testBind()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person("Farhan", "Novian");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Farhan", $person1->firstName);
        self::assertEquals("Farhan", $person2->firstName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingelton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Farhan", "Novian");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Farhan", $person1->firstName);
        self::assertEquals("Farhan", $person2->firstName);
        self::assertSame($person1, $person2);
    }

    public function testInterfaceToClass()
    {
        $this->app->singleton(HelloService::class, HelloWorld::class);

        $helloService = $this->app->make(HelloService::class);
        self::assertEquals("Halo Farhan", $helloService->hello("Farhan"));
    }
}
