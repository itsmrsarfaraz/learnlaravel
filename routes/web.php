<?php

use Illuminate\Support\Facades\Route;

// ------------------------------- - route view
Route::get('/', function () {
    return view('welcome');
});

// -------------------------------- plain text routes
Route::get('/hello', function () {
    return 'Hello Laravel 12!';
});

// -------------------------------- json response
Route::get('/ping', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Laravel 12 is awesome!',
        'timestamp' => now(),
    ]);
});

// -------------------------------- route parameters (required)
Route::get('/user/{id}', function (string $id) {
    return "User ID: {$id}";
});

// -------------------------------- route parameters (optional)
Route::get('/greet/{name?}', function (string $name = 'Guest') {
    return "Hello, {$name}!";
});

// -------------------------------- named routes
Route::get('/dashboard', function () {
    return 'Dashboard Page';
})->name('dashboard');

// -------------------------------- route groups
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', function () {
        return 'Admin Home Page';
    });
    Route::get('/settings', function () {
        return 'Admin Settings Page';
    });
});
