<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\TestController;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

// Auth


Route::controller(AuthController::class)->group(function(){

    Route::post('/register' , 'register');
    Route::post('/login' , 'login');
    Route::post('/logout' , 'logout')->middleware('auth:sanctum');
});


Route::get('/settings', SettingController::class);

Route::get('/cities', CityController::class);

// Route::get('/ditricts/{city_id}', DistrictController::class);
Route::get('/ditricts', DistrictController::class);

Route::post('/messages', MessageController::class);


// Route::post('/test', function (Request $request) {
    //     dd(request('title'));
    // });
    
    // Route::get('/test',[ TestController::class, 'index'])->name('Test');
    Route::apiResource('/test',TestController::class);


    Route::get('/valid', function(){

     
    
        dd(Auth::attempt([ 'kazem@hotmail', '12345678']));
    });