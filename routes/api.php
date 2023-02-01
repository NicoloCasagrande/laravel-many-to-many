<?php

use App\Http\Controllers\Api\PostController;
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


// Rotta per la gestione dei token di autenticazione per i client che fanno rihcieste verso il server
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('test', function() {
//     return response()->json([
//         'name' => 'Nicolo', 
//         'surname' => 'Casagrande'
//     ]);
// });

Route::get('posts', [PostController::class, 'index']);