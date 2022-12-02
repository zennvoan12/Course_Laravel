<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/hello')->assertSeeText('Hello Farhan');
        $this->get('/hello-again')->assertSeeText('Hello Farhan');

    }

    public function testViewNested()
    {
        $this->get('/hello-world')->assertSeeText('World Farhan');

    }

    public function testViewWithoutRoute()
    {
        $this->view(
            'hello',
            [
                'name' => 'Farhan'
            ]
        )->assertSeeText('Hello Farhan');

        $this->view(
            'hello.world',
            [
                'name' => 'Farhan'
            ]
        )->assertSeeText('World Farhan');
    }
}
