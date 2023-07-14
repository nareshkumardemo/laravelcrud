<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'show_home'])->name('home');

Route::get('/note/hit/{id}',[HomeController::class,'show_hit_note'])->name('hit_note');

//route for admin only

Route::middleware(['auth','can:isAdmin'])->group(function(){

        Route::get('/showuser',[AdminController::class, 'show'])->name('users_show');

        Route::get('/users',[AdminController::class, 'index_user'])->name('users_index');

        Route::post('/users',[AdminController::class, 'create_user'])->name('user_create');

        Route::get('/user/edit/{id}',[AdminController::class, 'edit'])->name('user_edit');

        Route::put('/user/edit/{id}',[AdminController::class, 'update'])->name('user_update');

        Route::get('/user/delete/{id}',[AdminController::class, 'destroy'])->name('user_destroy');

        Route::get('/searchuser',[AdminController::class, 'show'])->name('searchuser');

 });


//route for admin and user both

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'show_dashboard'])->name('dashboard');

    Route::get('/shownotes',[NoteController::class,'shownotes'])->name('shownotes');

    Route::get('/note/show/{id}',[DashboardController::class,'show_single_note'])->name('show_single');

    Route::get('/note',[NoteController::class, 'index'])->name('note_index');

    Route::post('/note',[NoteController::class, 'create'])->name('note_create');

    Route::get('/note/edit/{id}',[NoteController::class, 'edit'])->name('note_edit');

    Route::put('/note/edit/{id}',[NoteController::class, 'update'])->name('note_update');

    Route::get('/note/delete/{id}',[NoteController::class, 'destroy'])->name('note_destroy');

    Route::get('/note/shaire/',[NoteController::class, 'shaire'])->name('note_shaire');

     Route::get('/search',[NoteController::class, 'search'])->name('search');

     Route::get('/send/email/',[NoteController::class, 'sendMail'])->name('sendMail');
 
     Route::get('/searchtitle',[NoteController::class,'shownotes'])->name('searchtitle');

     Route::get('/filterNotes',[NoteController::class,'shownotes'])->name('filter_Notes');

 
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
