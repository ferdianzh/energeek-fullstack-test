<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
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

Route::post('/apply/submit', [ApplyController::class, 'store']);

Route::get('/candidates', [CandidateController::class, 'show']);

Route::post('/jobs', [JobController::class, 'store']);

Route::post('/skills', [SkillController::class, 'store']);
