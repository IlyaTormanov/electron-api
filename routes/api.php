<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace'=>'api'],function(){
    Route::group(['namespace'=>'Auth'],function(){
        Route::post('register','RegisterController');
        Route::post('login','LoginController');
    });
        Route::get('user/{id}','UserController@show');
        Route::get('users','UserController@index');
    Route::group(['namespace'=>'TaskManager'],function(){
       Route::post('createBoard','BoardController@create');
       Route::get('boards','BoardController@index');
       Route::get('userBoards/{creator_id}','BoardController@userBoards');
       Route::put('updateBoard/{id}','BoardController@update');
        Route::put('updateColumn/{id}','ColumnController@update');
        Route::post('createColumn','ColumnController@create');
        Route::get('boardColumns/{board_id}','ColumnController@boardColumns');
       Route::get('board/{id}','BoardController@show');
        Route::post('createTask','TaskController@create');
        Route::get('task/{id}','TaskController@show');
    });

});
