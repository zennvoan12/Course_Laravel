<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pzn', function () {
    return "Hello Hans";
});


Route::redirect('/youtube', '/pzn', 301);

Route::fallback(function () {
    return '404 by Hans';
});

Route::view(
    '/hello',
    'Hello',
    [
        'name' => 'Farhan'
    ]
);


Route::get('/hello-again', function () {
    return view('hello', [
        'name' => 'Farhan'
    ]);
});


Route::get('/hello-world', function () {
    return view(
        'hello.world',
        [
            'name' => 'Farhan'
        ]
    );
});


Route::get('/products/{id}', function ($productId) {
    return "Product $productId";
})->name('product.detail');

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name('product.item.detail');


Route::get('/categories/{id}', function (string $categoryId) {
    return "Categories : $categoryId";
})->where('id', '[0-9]+')->name('category.detail');

Route::get('users/{id?}', function ($userId = '404') {
    return "User $userId";
})->name('user.detail');


Route::get('/conflict/{name}', function (string $name) {
    return "Conflict $name";
});

Route::get('/conflict/novian', function () {
    return 'Conflict Farhan Novian';
});


Route::get('/produk/{id}', function ($id) {
    $link = route('product.detail', [
        'id' => $id
    ]);
    return "Link $link";
});


Route::get('/produk-redirect/{id}', function ($id) {
    return redirect()->route('product.detail', [
        'id' => $id
    ]);
});


Route::get('/controller/hello', [HelloController::class, 'hello']);
