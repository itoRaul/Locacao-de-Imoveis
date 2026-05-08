<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Forms;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Register;

Route::get('/', Home::class)->name('home');

Route::get('login', Login::class)->name('login');

Route::get('register', Register::class)->name('register');

Route::get('logout', Logout::class)->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('form/{id?}', Forms::class)->name('form.edit');
});