<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackerController;

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

// Route::get('/resources/views/couriertrackings', function () {
//     return view('index');
// });

Route::get('/couriertrackings', [TrackerController::class, 'index'])->name('couriertrackings.index');

Route::post('/couriertrackings/message', [TrackerController::class, 'message'])->name('couriertrackings.message');

// Route for displaying a specific message
Route::get('/couriertrackings/message/{id}', [TrackerController::class, 'showMsg'])->name('couriertrackings.contactmessage');


Route::post('/couriertrackings/result', [TrackerController::class, 'result'])->name('couriertrackings.result');


// Route::get('/couriertrackings', [TrackerController::class, 'print'])->name('couriertrackings.print');

Route::get('/couriertrackings/{trackers}', [TrackerController::class, 'show'])->name('couriertrackings.show');
Route::post('/couriertrackings', [TrackerController::class, 'track'])->name('couriertrackings.track');
Route::get('/couriertrackings/update/{id}', [TrackerController::class, 'update'])->name('couriertrackings.update');
Route::post('/couriertrackings/store', [TrackerController::class, 'store'])->name('couriertrackings.store');

