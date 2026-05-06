<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class);

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


// Individual method bindings
// Route::get('/posts',          [PostController::class, 'index']);
// Route::get('/posts/create',   [PostController::class, 'create']);
// Route::post('/posts',         [PostController::class, 'store']);
// Route::get('/posts/{id}',     [PostController::class, 'show']);
// Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
// Route::put('/posts/{id}',     [PostController::class, 'update']);
// Route::delete('/posts/{id}',  [PostController::class, 'destroy']);

// instead of writing 7 routes manually
Route::resource('posts', PostController::class);



Route::fallback(fn() => response()->json(['message' => 'Not Found'], 404));
