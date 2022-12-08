<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Farhan')->assertSeeText("Hello Farhan");
        $this->post('/input/hello', ['name' => 'Farhan'])->assertSeeText("Hello Farhan");
    }

    public function testNestedInput()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Farhan'
            ]
        ])->assertSeeText('Hello Farhan');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            "name" => [
                "first" => "Muhammad",
                "last" => "Novian",
                "middle" => "Farhan"
            ]
        ])->assertSeeText("name")->assertSeeText("first")->assertSeeText("last")->assertSeeText("Muhammad")->assertSeeText("Novian")->assertSeeText("Farhan");
    }


    public function testArrayInput()
    {
        $this->post('/input/hello/array', [
            'products' => [
                ['name' => 'Asus TUF Gaming'],
                ['name' => 'iPhone XR']
            ]
        ])->assertSeeText('Asus TUF Gaming')->assertSeeText('iPhone XR');
    }

    public function testInputType()
    {
        $this->post('/post/type', [
            'name' => 'Farhan',
            'married' => 'true',
            'birth_date' => '1996-11-1'
        ])->assertSeeText('Farhan')->assertSeeText('true')->assertSeeText('1996-11-1');
    }


}
