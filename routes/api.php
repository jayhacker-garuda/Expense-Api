<?php

use App\Http\Controllers\api\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.all');
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
Route::get('/expenses/show/{expense}', [ExpenseController::class, 'show'])->name('expenses.show');
Route::post('/expenses/update', [ExpenseController::class, 'update'])->name('expenses.update');
Route::post('/expenses/delete', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
