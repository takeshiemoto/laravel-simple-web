<?php

use App\Http\Controllers\HelloWorldController;
use Illuminate\Support\Facades\Route;

Route::get('/hello-world', [HelloWorldController::class, 'index']);
