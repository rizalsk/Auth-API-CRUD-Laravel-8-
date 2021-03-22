<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrudController;
use App\Http\Controllers\API\PlainCrudController;
use App\Http\Controllers\API\SampleDocumentationController;
use App\Http\Controllers\API\UserController;
use App\Models\User;
use App\Models\Crud;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('tokenizer', function(){
	$user = User::factory()->create();

    return response(['token' => $user->createToken('access-api')->plainTextToken ], 201);

});

Route::get('seed', function(){
	\Artisan::call('db:seed');
    return response( ['message' => 'Data Created'], 201);
});


Route::middleware('auth:sanctum')->group(function(){
	Route::apiResource('crud', CrudController::class);
});

Route::group([
    'prefix' => 'v1',
    //'middleware' => ['auth:sanctum']
], function () {
	Route::apiResource('plain-crud', PlainCrudController::class);
});
