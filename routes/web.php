<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvertController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'as' => 'convert.'
], function () {
    Route::get('/', [ConvertController::class, 'convertForm'])->name('form');
    Route::post('/pdf', [ConvertController::class, 'storeConvertForm'])->name('pdf');

    // Route::view('/preview', 'pdf.pernyataan-ahli-waris')->name('preview');
});