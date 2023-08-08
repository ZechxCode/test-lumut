<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::prefix('user/home')->namespace('User')->name('user.')->group(function () {
//     Route::get('', [UserController::class, 'index'])->name('dashboard');
// });

Route::middleware(['auth'])->group(
    function () {
        $roleAdmin = 'ensureUserRole:admin';

        Route::get('post', [PostController::class, 'post']);
        Route::get('akun', [UserController::class, 'index'])->middleware($roleAdmin);
        Route::get('akun/create', [UserController::class, 'create'])->name('form.akun');
        Route::post('akun/store', [UserController::class, 'store'])->name('store.register');
        Route::get('akun/{id}/edit', [UserController::class, 'edit'])->middleware($roleAdmin);
        Route::post('akun/{id}', [UserController::class, 'update'])->middleware($roleAdmin);
        Route::get('akun/{id}/editPassword', [UserController::class, 'editPassword'])->middleware($roleAdmin);
        Route::post('akun/{id}/password', [UserController::class, 'updatePassword'])->middleware($roleAdmin);
        Route::delete('akun/{id}', [UserController::class, 'destroy'])->middleware($roleAdmin);
    }
);



Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('post/{id}/edit', 'edit');
    Route::get('post/create', 'create');
    Route::post('post/store', 'store')->name('tambah.post');
    Route::post('post/{id}', 'update');
    Route::delete('post/{id}', 'destroy');
});
Route::controller(UserController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'storeLogin')->name('login.store');
    // Route::get('register', 'register')->name('register');
    // Route::post('register', 'storeRegister')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});
// Route::prefix('user/home')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function () {
//     Route::get('', [UserController::class, 'index'])->name('dashboard');
// });
