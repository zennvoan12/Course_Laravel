<?php

namespace App\Services;

class HelloWorld implements
    HelloService
{

    /**
     * @param string $name
     * @return string
     */
    public function hello(string $name): string
    {
        return "Halo $name";
    }
}
