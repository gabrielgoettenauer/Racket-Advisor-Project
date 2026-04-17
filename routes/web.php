<?php

use Illuminate\Support\Facades\Route;
use App\Models\Racket;
use Illuminate\Http\Request;
use App\Http\Controllers\RecommendationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rackets', function () {
    return Racket::all();
});

Route::get('/recommend', [RecommendationController::class, 'recommend']);