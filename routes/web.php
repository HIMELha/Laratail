<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');

Route::group(['prefix' => 'user'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/verify-login', [AuthController::class, 'verifyLogin'])->name('verifyLogin');
        
        // Route::get('/register', [AuthController::class, 'register'])->name('register');

    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/create/post', [PostController::class, 'create'])->name('create.post');
        Route::post('/store/post', [PostController::class, 'store'])->name('store.post');

        Route::post('/store/comment/{post_id}', [FrontController::class, 'storeComment'])->name('store.comment');
        
    });
});



// Route::get('/register', function () {
//     return view('register');
// });
// Route::get('/profile', function () {
//     return view('profile');
// });

Route::get('/create', function () {
    return view('create');
});


Route::get('/blog', function () {
    return view('blogs');
});
