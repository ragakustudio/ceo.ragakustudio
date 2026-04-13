<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CeoController;

Route::get('/', [CeoController::class, 'index']);
