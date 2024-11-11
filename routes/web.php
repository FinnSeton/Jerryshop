<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/frietpan', function () {
    dd('shiiiiiiiit');
});
