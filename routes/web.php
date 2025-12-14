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
Route::get('/quotation', function () {
    return view('pages.quotation');
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
