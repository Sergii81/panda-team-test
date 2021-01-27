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

//Route::get('/', function () {
//    return view('tasks.index');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index');
Route::get('/add-new-task-form', [\App\Http\Controllers\TaskController::class, 'addForm'])->name('add.form');
Route::post('/add-new-task', [\App\Http\Controllers\TaskController::class, 'add'])->name('add');

Route::group([
    'middleware'    => ['auth'],
], function(){
    Route::get('/edit-task-form/{task_id}', [\App\Http\Controllers\TaskController::class, 'editForm'])->name('edit.form');
    Route::post('/edit-new-task', [\App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
});


