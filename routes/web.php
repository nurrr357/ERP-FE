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
Route::get('/product', function () {
    return view('pages.product');
});
Route::get('/bom', function () {
    return view('pages.bom');
});
Route::get('/purchase', function () {
    return view('pages.purchase');
});
Route::get('/manufacturing-order', function () {
    return view('pages.manufacturing');
});

Route::get('/components', function () {
    return view('pages.components');
});

Route::get('/companies', function () {
    return view('pages.companies');
});

Route::get('/vendors', function () {
    return view('pages.vendors');
});

Route::get('/rfq', function () {
    return view('pages.rfq');
});
