<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController; 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/rgstr',RegController::class); 
