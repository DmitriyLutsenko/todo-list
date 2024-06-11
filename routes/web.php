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

Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index');

Route::get('/about', function(){
    return view('pages.about');
});

Route::get('/home', function(){
    return redirect()->route('index');
});
Route::get('/profile/{user_id?}', [App\Http\Controllers\HomeController::class, 'profile'])->middleware('auth')->name('user.profile');
Route::get('/profiles', [App\Http\Controllers\HomeController::class, 'profiles'])->middleware('auth')->name('users.profiles');

Route::prefix('/tasks')->group(function() {
    Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('task.list');
    Route::get('/{id}', [App\Http\Controllers\TaskController::class, 'show'])->name('task.show');
});

Route::prefix('/tasks')->middleware('auth')->group(function() {
    
    Route::post('/add', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
    Route::post('/{id}/changestatus', [App\Http\Controllers\TaskController::class, 'changeActivity'])->name('task.changeActive');
   
    Route::delete('/{id}/delete', [App\Http\Controllers\TaskController::class, 'delete'])->name('task.delete');
    Route::get('/{id}/delete', [App\Http\Controllers\TaskController::class, 'delete'])->name('task');

    Route::get('/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');
    Route::post('/update', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');
});

Route::prefix('/label')->middleware('auth')->group(function() {
    Route::post('/create', [App\Http\Controllers\LabelController::class, 'store'])->name('label.create');
});

Auth::routes();
