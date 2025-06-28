<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('versenyek');
});
Route::get('/fordulok', function () {
    return view('fordulok');
});
Route::get('/versenyzok', function () {
    return view('versenyzok');
});
Route::get('/felhasznalok', function () {
    return view('felhasznalok');
});

