<?php

use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

// use Symfony\Component\Routing\Annotation\Route;


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

Route::resource('jobscr', 'JobDescriptionsController');

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
Route::get('/searchcurrentlocation', 'CandidatesController@search_current_location')->name('search_current_location');
Route::get('/searchmarks12th', 'CandidatesController@search_marks12th')->name('search_marks12th');
Route::get('/searchaggregate_UG', 'CandidatesController@search_aggregate_UG')->name('search_aggregateUG');
Route::get('/searchaggregate_PG', 'CandidatesController@search_aggregate_PG')->name('search_aggregatePG');
Route::get('/searchsalary', 'CandidatesController@search_salary')->name('search_salary');
Route::get('/searchexperience', 'CandidatesController@search_experience')->name('search_experience');
Route::get('/searchstatus', 'CandidatesController@search_status')->name('search_status');
Route::get('/searchskills', 'CandidatesController@search_skills')->name('search_skills');
Route::get('/searchskill', 'CandidatesController@search_skill')->name('search_skill');
Route::get('/searchskills&', 'CandidatesController@search_skills_and')->name('search_skills&');
Route::get('/searchresume', 'CandidatesController@search_resume')->name('search_resume');
Route::get('/searchres', 'CandidatesController@search_res')->name('search_res');
Route::get('/searchresume&', 'CandidatesController@search_resume_and')->name('search_resume&');
Route::get('/searchinterview-type', 'CandidatesController@search_interviewtype')->name('search_interviewtype');
Route::get('/searchsubmission-type', 'CandidatesController@search_submissiontype')->name('search_submissiontype');
Route::get('/sentmails', 'CandidatesController@sentmails')->name('sent_mails');


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
            

            Route::resource('/candidatescl', 'CandidatesController');
            // Route::get('send/{id}', 'CandidatesController@send');

            Route::post('sendcl/{id}', 'CandidatesController@send')->name('client.sendmail');
            Route::get('{id}/mailcl', 'CandidatesController@emailbody');

            Route::get('/searchpagecl', 'CandidatesController@searchpage')->name('client.searchpage');

            Route::get('/searchnamecl', 'CandidatesController@search_name')->name('client.search_name');
            Route::get('/searchlocationcl', 'CandidatesController@search_location')->name('client.search_location');
            Route::get('/searchcurrentlocationcl', 'CandidatesController@search_current_location')->name('client.search_current_location');
            Route::get('/searchmarks12thcl', 'CandidatesController@search_marks12th')->name('client.search_marks12th');
            Route::get('/searchaggregate_UGcl', 'CandidatesController@search_aggregate_UG')->name('client.search_aggregateUG');
            Route::get('/searchaggregate_PGcl', 'CandidatesController@search_aggregate_PG')->name('client.search_aggregatePG');
            Route::get('/searchsalarycl', 'CandidatesController@search_salary')->name('client.search_salary');
            Route::get('/searchexperiencecl', 'CandidatesController@search_experience')->name('client.search_experience');
            Route::get('/searchstatuscl', 'CandidatesController@search_status')->name('client.search_status');
            Route::get('/searchskillscl', 'CandidatesController@search_skills')->name('client.search_skills');
            Route::get('/searchskillcl', 'CandidatesController@search_skill')->name('client.search_skill');
            Route::get('/searchskillscl&', 'CandidatesController@search_skills_and')->name('client.search_skills&');
            Route::get('/searchresumecl', 'CandidatesController@search_resume')->name('client.search_resume');
            Route::get('/searchrescl', 'CandidatesController@search_res')->name('client.search_res');
            Route::get('/searchresumecl&', 'CandidatesController@search_resume_and')->name('client.search_resume&');
            Route::get('/sentmailscl', 'CandidatesController@sentmails')->name('client.sent_mails');
        });
    });
});




//Admin Routes

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::group(['namespace' => 'Admin'], function() {

        Route::prefix('admin')->group(function() {
            Route::get('/home', 'HomeController@index')->name('admin.home');
            Route::get('/activate_user/{id}', 'HomeController@flagupdate_user');
            Route::get('/deactivate_user/{idd}', 'HomeController@flagdowngrade_user');
            Route::get('/activate_client/{id}', 'HomeController@flagupdate_client');
            Route::get('/deactivate_client/{idd}', 'HomeController@flagdowngrade_client');

            Route::resource('/candidatesad', 'CandidatesController');
            // Route::get('send/{id}', 'CandidatesController@send');

            Route::post('sendad/{id}', 'CandidatesController@send')->name('admin.sendmail');
            Route::get('{id}/mailad', 'CandidatesController@emailbody');

            //Authentication Routes
            Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
            Route::post('login', 'Auth\LoginController@login');
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
            Route::post('register', 'Auth\RegisterController@register');
            Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

            Route::resource('jobsad', 'JobDescriptionController');
            Route::get('jobsadactivate/{id}', 'JobDescriptionController@flagactive');
            Route::get('jobsaddeactivate/{id}', 'JobDescriptionController@flaginactive');
            Route::get('jobsadhold/{id}', 'JobDescriptionController@flaghold');
            Route::get('jobsadactive', 'JobDescriptionController@index_active');
            Route::get('jobsadinactive', 'JobDescriptionController@index_inactive');
            Route::get('jobsadhold', 'JobDescriptionController@index_hold');
            Route::get('jobsadsearch', 'JobDescriptionController@searchpage');
            Route::get('searchjobsadstatus', 'JobDescriptionController@search_status')->name('admin.search_status');
            Route::get('searchjobsadjobtitle', 'JobDescriptionController@search_jobtitle')->name('admin.search_jobtitle');
            Route::get('searchjobsadjobdescription', 'JobDescriptionController@search_jobdescription')->name('admin.search_jobdescription');
            Route::get('searchjobsadjobdescription&', 'JobDescriptionController@search_jobdescription_and')->name('admin.search_jobdescription&');
            Route::get('searchjobsadjob_salary', 'JobDescriptionController@search_jobsalary')->name('admin.search_jobsalary');
            Route::get('searchjobsadjob_experience', 'JobDescriptionController@search_jobexperience')->name('admin.search_jobexperience');

            Route::get('/searchpagead', 'CandidatesController@searchpage')->name('admin.searchpage');

            Route::get('/searchnamead', 'CandidatesController@search_name')->name('admin.search_name');
            Route::get('/searchlocationad', 'CandidatesController@search_location')->name('admin.search_location');
            Route::get('/searchcurrentlocationad', 'CandidatesController@search_current_location')->name('admin.search_current_location');
            Route::get('/searchmarks12thad', 'CandidatesController@search_marks12th')->name('admin.search_marks12th');
            Route::get('/searchaggregate_UGad', 'CandidatesController@search_aggregate_UG')->name('admin.search_aggregateUG');
            Route::get('/searchaggregate_PGad', 'CandidatesController@search_aggregate_PG')->name('admin.search_aggregatePG');
            Route::get('/searchsalaryad', 'CandidatesController@search_salary')->name('admin.search_salary');
            Route::get('/searchexperiencead', 'CandidatesController@search_experience')->name('admin.search_experience');
            Route::get('/searchstatusad', 'CandidatesController@search_status')->name('admin.search_status');
            Route::get('/searchskillsad', 'CandidatesController@search_skills')->name('admin.search_skills');
            Route::get('/searchskillad', 'CandidatesController@search_skill')->name('admin.search_skill');
            Route::get('/searchskillsad&', 'CandidatesController@search_skills_and')->name('admin.search_skills&');
            Route::get('/searchresumead', 'CandidatesController@search_resume')->name('admin.search_resume');
            Route::get('/searchresad', 'CandidatesController@search_res')->name('admin.search_res');
            Route::get('/searchresumead&', 'CandidatesController@search_resume_and')->name('admin.search_resume&');
            Route::get('/sentmailsad', 'CandidatesController@sentmails')->name('admin.sent_mails');
        });
    });
});

Route::resource('/jobs', 'JobDescriptionController');

Route::post('send/{id}', 'CandidatesController@send')->name('sendmail');
Route::get('{id}/mail', 'CandidatesController@emailbody');
// Route::get('/jobss', 'JobDescriptionController@indextest');
