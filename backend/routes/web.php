<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

Route::controller(TodosController::class)->prefix('todo')->group(function () {
    Route::get('/', 'index')->name('todos.index');
    Route::post('store', 'store')->name('todos.store');
    Route::post('update/{id}', 'update')->name('todos.update');
    Route::post('delete/{id}', 'delete')->name('todos.delete');
    Route::get('info', 'info')->name('todos.info');
    Route::get('{id}', 'edit')->name('todos.edit');
});