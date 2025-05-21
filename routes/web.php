<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/supir/{id}', [SupirController::class, 'show']);
