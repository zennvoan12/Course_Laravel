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
}
