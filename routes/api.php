<?php

use App\Http\Controllers\Api\FlowerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/flowers', [FlowerController::class, 'index']);

Route::post('/send-flowers', [FlowerController::class, 'store']);

Route::get('/show-flowers/{id}', [FlowerController::class, 'show']);

Route::put('/update-flowers/{id}', [FlowerController::class, 'update']);

Route::delete('/delete-flowers/{id}', [FlowerController::class, 'destroy']);
