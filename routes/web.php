<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Forms;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Register;
use App\Livewire\ForgotPassword;
use App\Livewire\ResetPassword;
use App\Livewire\DashboardUser;

Route::get('/', Home::class)->name('home');

Route::get('login', Login::class)->name('login');

Route::get('register', Register::class)->name('register');

Route::get('logout', Logout::class)->name('logout');

Route::get('forgot-password', ForgotPassword::class)->name('forgot.password');

Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('form/{id?}', Forms::class)->name('form.edit');
    Route::get('dashboard-user', DashboardUser::class)->name('dashboard-user');
});