<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->group(function () {
        // https://laravel.com/docs/master/eloquent#events

        // http://events.test/projects/create
        Route::get('projects/create', [ProjectsController::class, 'create'])->name('projects.create');

        // http://events.test/tasks/create
        Route::get('tasks/create', [TasksController::class, 'create'])->name('tasks.create');
    });

require __DIR__.'/auth.php';
