<?php

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
	if(auth()->user()){
		return redirect('/home-2');
	}
    return view('welcome');
});


Auth::routes();

use App\Http\Controllers\ProfileController;

Route::get('/profile/update', [ProfileController::class, 'updateForm'])->name('profile.edit');

Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');

use App\Http\Controllers\PostController;

Route::get('/home-2', [PostController::class, 'index'])->middleware('auth');

Route::get('/p/create', [PostController::class, 'create'])->middleware('auth');

Route::post('/p', [PostController::class, 'store']);

Route::get('/p/{post}', [PostController::class, 'show']);


Auth::routes();

use App\Http\Controllers\FollowController;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/follow/{user}', [FollowController::class, 'store'])->middleware('auth');

