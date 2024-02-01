<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::redirect('/', '/home');


Auth::routes();



//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/phonebook', \App\Filament\Pages\Phonebook::class)->name('filament.pages.phonebook');
