<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrudController;
use App\Http\Controllers\API\PlainCrudController;
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

Route::get('seedcrud', function(){
	$user = Crud::factory(10)->create();
    return response( $user, 201);
});

Route::resource('plain-crud', PlainCrudController::class);

Route::middleware('auth:sanctum')->group(function(){
	Route::apiResource('crud', CrudController::class);
});

