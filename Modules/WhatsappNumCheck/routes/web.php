<?php

use Illuminate\Support\Facades\Route;
use Modules\WhatsappNumCheck\App\Http\Controllers\CsvController;
use Modules\WhatsappNumCheck\App\Http\Controllers\WhatsappNumCheckController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('whatsappnumcheck', WhatsappNumCheckController::class)->names('whatsappnumcheck');
    Route::resource('csv', CsvController::class)->names('csv');
});
