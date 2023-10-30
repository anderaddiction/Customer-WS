<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

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

//Login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::get('unauthorized', function () {
    return response()->json([
        "success" => false,
        "message" => "Usuario No autorizado, No se proporcionó Token o es invalido"
    ], 401);
})->name('api.unauthorized');

Route::group(['middleware' => ['auth:sanctum']], function () {

    //Customers
    Route::resource('customers', CustomerController::class)
        ->parameters(['customer' => 'customer'])
        ->names('customer')
        ->middleware(['auth', 'auth.session']);

    //logout
    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout')
        ->middleware(['auth', 'auth.session']);
});
