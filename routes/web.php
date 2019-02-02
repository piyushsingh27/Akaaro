<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('logout', array('uses' => 'LoginController@logout'));
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
});
//Route::get('/remarks','HomeController@index1');

Route::resource('/candidates', 'CandidatesController');

Route::get('/candidateshired', 'CandidatesController@index_hired');
Route::get('/candidateshold', 'CandidatesController@index_hold');
Route::get('/candidatesselected', 'CandidatesController@index_selected');
Route::get('/candidatesrejected', 'CandidatesController@index_rejected');


Route::get('/interviewface2face', 'CandidatesController@index_face2face');
Route::get('/interviewtelephonic', 'CandidatesController@index_telephonic');

Route::get('/isub', 'CandidatesController@index_ISUB');
Route::get('/csub', 'CandidatesController@index_CSUB');  

Route::get('/searchpage', 'CandidatesController@searchpage')->name('searchpage');

Route::get('/search', 'CandidatesController@search')->name('search');



Route::resource('/remarks', 'RemarksController');
