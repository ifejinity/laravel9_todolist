<?php

use App\Http\Controllers\TodoController;
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
Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::delete('/todos/delete/{todo}',[TodoController::class, 'delete'])->name('todos.delete');
Route::post('/todos/add',[TodoController::class, 'add'])->name('add');
Route::post('/todos/update/{todo}',[TodoController::class, 'update'])->name('todos.update');
Route::put('/todos/save/{todo}', [TodoController::class, 'save'])->name('todos.save');