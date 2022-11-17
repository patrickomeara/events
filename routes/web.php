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

        // http://events.test/projects/update
        Route::get('projects/update', [ProjectsController::class, 'update'])->name('projects.update');

        // http://events.test/projects/archive
        Route::get('projects/archive', [ProjectsController::class, 'archive'])->name('projects.archive');

        // https://github.com/laravel/framework/blob/98a03013ed74925f68040beee0937203b632f57d/src/Illuminate/Events/Dispatcher.php#L362-L380

        // http://events.test/tasks/close
        Route::get('tasks/close', [TasksController::class, 'close'])->name('tasks.close');

        // http://events.test/telescope

        // https://laravel.com/docs/master/authentication#events
    });

require __DIR__.'/auth.php';
