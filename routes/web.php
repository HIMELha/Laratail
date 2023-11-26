<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
Route::get('/writer/{id}', [FrontController::class, 'userProfile'])->name('userProfile');
Route::get('/followers/{id}', [FrontController::class, 'userFollowers'])->name('userFollowers');


Route::group(['prefix' => 'user'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/save-register', [AuthController::class, 'SaveRegister'])->name('SaveRegister');
        Route::post('/verify-login', [AuthController::class, 'verifyLogin'])->name('verifyLogin');
        
        // Route::get('/register', [AuthController::class, 'register'])->name('register');

    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/create/post', [PostController::class, 'create'])->name('create.post');
        Route::post('/store/post', [PostController::class, 'store'])->name('store.post');
        Route::post('/store/comment/{post_id}', [FrontController::class, 'storeComment'])->name('store.comment');
        
        Route::post('/follow/{writer_id}', [FrontController::class, 'follow'])->name('follow');

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
