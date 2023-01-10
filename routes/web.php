<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{RolesController,UsuariosController};
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/login',[HomeController::class,'login'])->name('home.login');

Route::get('/home',[HomeController::class,'index'])->name('home.index');

Route::resource('/roles',RolesController::class);

Route::post('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
Route::post('/usuarios/{usuario}/activar',[UsuariosController::class,'activar'])->name('usuarios.activar');
Route::resource('/usuarios',UsuariosController::class);

Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::post('/usuarios',[UsuariosController::class, 'store'])->name('usuarios.store');
Route::delete('/usuarios/{usuario}',[UsuariosController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{usuario}/edit',[UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}',[UsuariosController::class, 'update'])->name('usuarios.update');
