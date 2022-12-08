<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request)
    {
        $name = $request->input('name');
        return "Hello $name";
    }

    public function helloFirst(Request $req)
    {
        $firstName = $req->input("name.first");
        return "Hello $firstName";
    }

    public function helloInput(Request $req): string
    {
        $input = $req->input();
        return json_encode($input);
    }

    public function arrayInput(Request $req)
    {
        $name = $req->input('products.*.name');
        return json_encode($name);
    }
    public function inputType(Request $req): string
    {
        $name = $req->input("name");
        $married = $req->boolean("married");
        $birthDate = $req->date('birth_date', 'Y-m-d');

        return json_encode([
            "name" => $name,
            "married" => $married,
            "birth_date" => $birthDate->format('Y-m-d')
        ]);
    }
}
