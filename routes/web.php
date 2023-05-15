<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CustomAuthController;
 
//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);

    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('/eskul', \App\Http\Controllers\EskulController::class);

    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('/perpus', \App\Http\Controllers\PerpuController::class);

    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('/mapel', \App\Http\Controllers\MapelController::class);

    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('/guru', \App\Http\Controllers\GuruController::class);

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // Route::resource('/pembelian', \App\Http\Controllers\PembelianController::class);


});
 
Route::get('/', [CustomAuthController::class, 'home']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->middleware('hakAkses');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin'); 
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

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
Route::resource('/dashboard' , App\Http\Controllers\DashboardController::class)->middleware('hakAkses');


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::resource('/siswa' , App\Http\Controllers\SiswaController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/eskul' , App\Http\Controllers\EskulController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/perpus' , App\Http\Controllers\PerpuController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/mapel' , App\Http\Controllers\MapelController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/guru' , App\Http\Controllers\GuruController::class);

