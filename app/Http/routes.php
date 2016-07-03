<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Carbon\Carbon as Carbon;

Route::auth();
Route::get('/',"HomeController@index");
Route::get('home', 'HomeController@index');
Route::get('match/{id}','Admin\MatchController@show');

Route::Post('bet','BetController@store');

Route::get('history','UserController@getHistory');

Route::get('welcome',function(){
	return date('m');
	//return Carbon::now()->toDateString();
	//eturn strtotime(date('Y-m-d h:i:d'));
});

//Route::get('admin', ['middleware' => 'admin', function () {
//    return "ban la admin";
//}]);

Route::group(['prefix' => 'admin','namespace' => "Admin"],function(){

		Route::get('listaccount',['as' => 'account.getList', 'uses' => 'AccountController@getList']);
		Route::get('matches',function(){
			return redirect()->route('match.index');
		});

		Route::get('account/{id}',['as' => 'account.getAccount', 'uses' => 'AccountController@getAccount']);
		Route::group(['prefix' => 'matches'],function(){
			Route::get("create",['as' => "match.create", 'uses' => "MatchController@create"]);
			Route::post("create","MatchController@store");

			Route::get("listmatch",['as' => "match.index", 'uses' => "MatchController@index"]);
			//Route::get("listmatch", "MatchController@index");

			Route::get('delete/{id}','MatchController@destroy');

			Route::get('update/{id}','MatchController@showUpdateView');
			Route::post('update/{id}', 'MatchController@update');

			Route::get('update-score/{id}','MatchController@showUpdateScore');
			Route::post('update-score/{id}','MatchController@updateScore');

			Route::get('changerole/{id}','MatchController@changeRole');

			Route::get('matchdetail/{id}','MatchController@getMatchDetail');

			
		});

});