<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/shoe/{shoe}/{apikey}', function (string $shoe, string $apikey) {
    echo DataController::getShoe($shoe, $apikey);
});
Route::get('/shoeclean/{shoe}/{apikey}', function (string $shoe, string $apikey) {
    echo DataController::getCleanData($shoe, $apikey);
});
