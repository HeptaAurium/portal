<?php

use App\Http\Controllers\CreateRolesController;
use App\Http\Controllers\MembersController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/members', MembersController::class)->middleware('auth');
Route::post('/members/approve', [MembersController::class, 'approve'])->middleware('auth');
Route::post('/members/reject', [MembersController::class, 'reject'])->middleware('auth');
Route::post('/members/suspend', [MembersController::class, 'suspend'])->middleware('auth');

Route::get('/assign-permissions', [CreateRolesController::class, 'create_permissions']);
