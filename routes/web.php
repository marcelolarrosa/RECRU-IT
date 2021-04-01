<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'CandidateController@index')->name('dashboard');
Route::get('/candidate/profile/{candidateId}', 'CandidateController@candidateProfile')->name('candidate-profile-show');
Route::get('/candidate/edit/{candidateId}', 'CandidateController@edit')->name('candidate-edit');
Route::get('/candidate/add', 'CandidateController@add')->name('candidate-add');
Route::post('/candidate/create', 'CandidateController@create')->name('candidate-create');
Route::post('/candidate/save/{candidateId}', 'CandidateController@save')->name('candidate-save');
Route::post('/best-candidate/add/{candidateId}', 'CandidateController@bestCandidateAdd')->name('best-candidate-add');
Route::post('/best-candidate/remove/{candidateId}', 'CandidateController@bestCandidateRemove')->name('best-candidate-remove');
Route::post('/best-candidate/show/{candidateId}', 'CandidateController@bestCandidateShow')->name('best-candidate-show');
Route::get('/candidate/delete/{candidateId}', 'CandidateController@delete')->name('candidate-delete');
Route::get('/scheduled-interviews', 'CandidateController@candidatesScheduled')->name('scheduled-interviews');
Route::get('/scheduled-interviews/cancel/{candidateId}', 'CandidateController@cancelInterview')->name('cancel-interview');
