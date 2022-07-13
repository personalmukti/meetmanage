<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, SkdpController, MeetController};
use App\Models\{User};
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

Route::controller(AdminController::class)->group(function(){
    Route::get('/', 'login')->name('login');
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/login', 'auth')->name('auth');
    Route::get('/admin', 'index')->name('dashboard')->middleware('auth');
});

Route::middleware('auth')->controller(SkdpController::class)->group(function(){
    Route::get('/admin/skdp', 'index')->name('skdp');
    Route::get('/admin/skdp/add', 'create')->name('skdp-add');
    Route::post('/admin/skdp/add', 'store')->name('skdp-store');
    Route::get('/admin/skdp/{id}/edit', 'edit')->name('skdp-edit');
    Route::post('/admin/skdp/update', 'update')->name('skdp-update');
    Route::get('/admin/skdp/{id}/delete', 'destroy')->name('skdp-destroy');
});

Route::middleware('auth')->controller(MeetController::class)->group(function(){
    Route::get('/admin/meet', 'index')->name('meet');
    Route::get('/admin/meet/add', 'create')->name('meet-add');
    Route::post('/admin/meet/add', 'store')->name('meet-store');
    Route::get('/admin/meet/{id}/edit', 'edit')->name('meet-edit');
    Route::post('/admin/meet/update', 'update')->name('meet-update');
    Route::get('/admin/meet/{id}/delete', 'destroy')->name('meet-destroy');
});


Route::get('/buat-admin', function () {
    $user = new User;
    $user->username = 'admin';
    $user->password = bcrypt('admin');
    $user->email = 'admin@gmail.com';
    $save = $user->save();
    if($save){
        echo 'Berhasil';
    }
    
});
