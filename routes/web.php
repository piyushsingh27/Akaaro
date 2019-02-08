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

Route::get('/searchname', 'CandidatesController@search_name')->name('search_name');
Route::get('/searchlocation', 'CandidatesController@search_location')->name('search_location');
Route::get('/searchmarks12th', 'CandidatesController@search_marks12th')->name('search_marks12th');
Route::get('/searchaggregate_UG', 'CandidatesController@search_aggregate_UG')->name('search_aggregateUG');
Route::get('/searchaggregate_PG', 'CandidatesController@search_aggregate_PG')->name('search_aggregatePG');
Route::get('/searchsalary', 'CandidatesController@search_salary')->name('search_salary');
Route::get('/searchstatus', 'CandidatesController@search_status')->name('search_status');
Route::get('/searchskills', 'CandidatesController@search_skills')->name('search_skills');
Route::get('/searchinterview-type', 'CandidatesController@search_interviewtype')->name('search_interviewtype');
Route::get('/searchsubmission-type', 'CandidatesController@search_submissiontype')->name('search_submissiontype');


Route::resource('/remarks', 'RemarksController');



//Client Routes

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::group(['namespace' => 'Client'], function() {

        Route::prefix('client')->group(function() {
            Route::get('/home', 'HomeController@index')->name('client.home');

            //Authentication Routes
            Route::get('login', 'Auth\LoginController@showLoginForm')->name('client.login');
            Route::post('login', 'Auth\LoginController@login');
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('client.register');
            Route::post('register', 'Auth\RegisterController@register');
            Route::post('logout', 'Auth\LoginController@logout')->name('client.logout');
        });
    });
});
