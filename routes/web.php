<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, Sarfaraz!';
});

Route::get('/json', function () {
    return response()->json(['name' => 'Sarfaraz', 'role' => 'Senior Engineer']);
});

Route::get('/user/{id}', function (string $id) {
    return "User ID: $id";
})->where('id', '[0-9]+');

Route::get('/greet/{name?}', function (string $name = 'Guest') {
    return "Hello, $name!";
})->name('greet');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => 'Admin Dashboard')->name('dashboard');
    Route::get('/users', fn() => 'Admin Users')->name('users');
});

Route::get('/articles', fn() => 'List articles');
Route::post('/articles', fn() => 'Create article');

Route::fallback(fn() => response()->json(['message' => 'Not Found'], 404));
