<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/incidents', function () {
        return 'Incident list';
    })->middleware('permission:view incidents');

    Route::get('/manage-incidents', function () {
        return 'Manage incidents';
    })->middleware('role:admin');
});
