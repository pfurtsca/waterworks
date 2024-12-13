<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Reading;
use App\Http\Controllers\MeterController;
use App\Models\Meter;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/getReadings', [Customer::class, 'getAllReadingsForCustomer']);
Route::get('/getMostMetersByCustomer', [Customer::class,'getCustomerWithMostMeters']);
Route::get('/getAllMetersInApril', [Reading::class, 'getAllMetersInApril']);
Route::get('/getAllReadingsViaSystem', [Customer::class, 'getAllCustomerViaApp']);

Route::post('/addMeter',[MeterController::class,'addNewMeter']);
Route::put('/editMeter',[MeterController::class,'editMeter']);
Route::delete('/deleteMeter',[MeterController::class,'delete']);


Route::get('/getReadingsForCustomer', [Customer::class, 'getAllReadingsForSpecificCustomer']);


