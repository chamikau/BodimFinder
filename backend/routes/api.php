<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\VerificationDocumentController;
use App\Http\Controllers\AdminActionController;

Route::apiResource('properties', PropertyController::class);
Route::apiResource('reservations', ReservationController::class);

Route::apiResource('favorites', FavoriteController::class)->only(['index','store','destroy']);

Route::apiResource('documents', VerificationDocumentController::class)->only(['index','store','update']);

Route::apiResource('admin-actions', AdminActionController::class)->only(['index','store']);