<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

// Route::resources([
//     'projects'=> ProjectController::class,
//     'tasks'=> TaskController::class,
//     'organizations'=> OrganizationController::class
// ],[])->middleware('auth:web');
