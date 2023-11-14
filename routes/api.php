<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

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


// minggu ke 5
Route::get('/students', [StudentController::class, 'index'])->middleware('auth:sanctum');
Route::post('/students', [StudentController::class, 'store'])->middleware('auth:sanctum');
Route::put('/students/{id}', [StudentController::class,'update'])->middleware('auth:sanctum');
Route::delete('/students/{id}',[StudentController::class,'destroy'])->middleware('auth:sanctum');
Route::get('/students/{id}', [StudentController::class, 'show'])->middleware('auth:sanctum');
Route::post('/students/sf', [StudentController::class, 'sort'])->middleware('auth:sanctum');//sf(sort and filter)

// minggu 7
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
