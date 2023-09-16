<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DependencyController;

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
Route::post('subbycat', [DependencyController::class, 'subCategoryByCategory'])->name('subbycat');
Route::post('subqbycat', [DependencyController::class, 'subQuestionByCategory'])->name('subqbycat');
Route::post('childbysubcat', [DependencyController::class, 'childCategoryBySubCategory'])->name('childbysubcat');