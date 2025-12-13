<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/category', function () {
    return view('pages.category');
});

Route::get('/employe', function () {
    return view('pages.employe');
});

Route::get('/sales', function () {
    return view('pages.sales');
});