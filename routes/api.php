<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;

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

// Route::get('/animals', function () {
//     echo("menampilkan data animals");
// });

Route::get('/animals', [AnimalsController::class, 'index']);//singkat

// Route::post('/animals', function () {
//     echo("menambahkan data animals");
// });
Route::post('/animals/{request}', [AnimalsController::class, 'store']);//singkat

// Route::put('/animals/{id}', function($id) {
//     echo("mengedit data $id");
// });
Route::put('/animals/{id}/{request}', [AnimalsController::class,'update']);//singkat

// Route::delete('/animals/{id}', function($id) {
//     echo("menghapus data $id");
// });
Route::delete('/animals/{id}',[AnimalsController::class,'destroy']);
