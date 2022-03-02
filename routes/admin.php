<?php


use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users');

    Route::get('/jobs', function () {
        return view('dashboard');
    })->name('jobs');

    Route::get('/companies', function () {
        return view('dashboard');
    })->name('companies');
});
