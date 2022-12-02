<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGet()
    {
        $this->get('/pzn')->assertStatus(200)->assertSeeText('Hello Hans');

    }

    // public function redirectTest()
    // {
    //     $this->get("/youtube")->assertStatus(301)->assertRedirect("/pzn");
    // }

    public function TestError()
    {
        $this->get("/404")->assertSeeText('404 error');
    }

    public function testRouteParameter()
    {
        $this->get('/products/1')->assertSeeText('Product 1');
        $this->get('/products/2')->assertSeeText('Product 2');

        $this->get('products/1/items/XXX')->assertSeeText("Product 1, Item XXX");
    }

    public function testRouteParameterRegex()
    {
        $this->get('/categories/12345')->assertSeeText("Categories : 12345");
        $this->get('/categories/opps')->assertSeeText("404 by Hans");
    }

    public function testParameterOpsional()
    {
        $this->get('/users/novian')->assertSeeText('User novian');
        $this->get('/users')->assertSeeText('User 404');
    }

    public function testConflict()
    {
        $this->get('/conflict/budi')->assertSeeText("Conflict budi");
        $this->get('/conflict/novian')->assertSeeText("Conflict novian");
    }

    public function testRouteName()
    {
        $this->get('/produk/12345')->assertSeeText('/products/12345');
        $this->get('/produk-redirect/12345')->assertRedirect('/products/12345');

    }
}
