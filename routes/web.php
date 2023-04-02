<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [LoginController::class, 'login']);
Route::get('/user-status/check', [LoginController::class, 'status'])->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/create-message', [MessageController::class, 'store']);
Route::get('/all-messages', [MessageController::class, 'index']);
Route::get('/delete-messages/{id}', [MessageController::class, 'destroy']);

Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.-]*');