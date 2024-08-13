<?php

use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function (){
    Route::get('/',[RecordController::class, 'record']);
    Route::post('/', [RecordController::class, 'store']);
    Route::get('/attendance',[RecordController::class, 'search']);
    Route::get('/userList',[RecordController::class, 'showUser']);
    Route::get('/monthlyAttendance',[RecordController::class, 'monthlySearch']);

});
