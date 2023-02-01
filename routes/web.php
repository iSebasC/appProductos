<?php

use App\Http\Controllers\CrudController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [CrudController::class, "index"])->name("crud.index");

// Ruta para añadir nuevo producto
Route::post('/registrar-producto', [CrudController::class, "create"])->name("crud.create");

// Ruta para modificar producto
Route::post('/modificar-producto', [CrudController::class, "update"])->name("crud.update");

// Ruta para eliminar producto
Route::get('/eliminar-producto-{id}', [CrudController::class, "delete"])->name("crud.delete");