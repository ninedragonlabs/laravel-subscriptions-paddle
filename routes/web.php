<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\WebhookController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pay',[PaymentController::class,'pay'])->middleware(['auth']);
Route::get('plans',[PlanController::class,'index'])->middleware(['auth']);
Route::post('subscribe',[PlanController::class,'subscribe'])->middleware(['auth'])->name('subscribe');
Route::get('cancel/{subscription}',[PlanController::class,'cancel'])->middleware(['auth'])->name('cancel');
Route::post('paddle/webhook', WebhookController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
