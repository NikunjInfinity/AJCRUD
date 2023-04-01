<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController; 


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/data',AjaxController::class);
