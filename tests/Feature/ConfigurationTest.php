<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    function testConfig()
    {
        $firstName = config('contoh.author.first');
        $middleName = config('contoh.author.middle');
        $lastName = config('contoh.author.last');
        $email = config('contoh.0.email');
        $web = config('contoh.0.web');

        self::assertEquals('Muhammad', $firstName);
        self::assertEquals('Farhan', $middleName);
        self::assertEquals('Novian', $lastName);
        self::assertEquals('inside.suck@gmail.com', $email);
        self::assertEquals('https://zennovian.com', $web);
    }
}
