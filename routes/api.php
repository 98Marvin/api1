<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Api Phase One

Route::get('students', [ApiController::class, 'listStudents']);
Route::get('students/{id}', [ApiController::class, 'showStudent']);
Route::post('students/create', [ApiController::class, 'createStudent']);
Route::put('students/{id}/update', [ApiController::class, 'updateStudent']);
Route::delete('students/{id}/delete', [ApiController::class, 'deleteStudent']);






    
