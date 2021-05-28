<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group([
    'middleware' => 'api',
    'prefix'     => 'imrc',
    'namespace'  => 'api\imrc\v1',
], function ($router) {
    Route::prefix('v1')->group(function () {
        // clients routes
        Route::get('clients/{id}', 'ClientController@show');
        Route::get('clients', 'ClientController@index');
        Route::post('clients', 'ClientController@store');
        Route::put('clients/{id}', 'ClientController@update');
        Route::get('clients/{id}/edit', 'ClientController@edit');
        Route::delete('clients/{id}', 'ClientController@destroy');

        //workspaces routes
        Route::get('workspaces/{id}', 'WorkspaceController@show');
        Route::get('workspaces', 'WorkspaceController@index');
        Route::post('workspaces', 'WorkspaceController@store');
        Route::put('workspaces/{id}', 'WorkspaceController@update');
        Route::get('workspaces/{id}/edit', 'WorkspaceController@edit');
        Route::delete('workspaces/{id}', 'WorkspaceController@destroy');

        //forms routes
        Route::get('forms/{id}', 'FormController@show');
        Route::get('forms', 'FormController@index');
        Route::post('forms', 'FormController@store');
        Route::put('forms/{id}', 'FormController@update');
        Route::get('forms/{id}/edit', 'FormController@edit');
        Route::delete('forms/{id}', 'FormController@destroy');
        Route::get('form/{slug}', 'FormController@showBySlug');

        //questions routes
        Route::get('questions/{id}', 'QuestionController@show');
        Route::get('questions', 'QuestionController@index');
        Route::post('questions', 'QuestionController@store');
        Route::put('questions/{id}', 'QuestionController@update');
        Route::get('questions/{id}/edit', 'QuestionController@edit');
        Route::delete('questions/{id}', 'QuestionController@destroy');

        //questions answer routes
        Route::post('questions-answers', 'FormQuestionAnswerController@store');

    });
});
