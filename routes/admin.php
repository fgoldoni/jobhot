<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'password.confirm', 'role:Administrator|Executive'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users');

    Route::get('/jobs', function () {
        return view('admin.jobs.index');
    })->name('jobs');

    Route::get('/companies', function () {
        return view('admin.companies.index');
    })->name('companies');

    Route::get('/categories', function () {
        return view('admin.categories.index');
    })->name('categories');

    Route::get('/teams', function () {
        return view('admin.teams.index');
    })->name('teams');

    Route::get('/countries', function () {
        return view('admin.countries.index');
    })->name('countries');

    Route::get('/divisions', function () {
        return view('admin.divisions.index');
    })->name('divisions');

    Route::get('/cities', function () {
        return view('admin.cities.index');
    })->name('cities');
});
