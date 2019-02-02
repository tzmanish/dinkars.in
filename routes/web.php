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

// public

Route::get('/', 'publicController@home');

Route::get('projects', 'publicController@projects');

Route::get('about', 'publicController@about');

Route::get('contact', 'publicController@contact');

Route::get('project/{id}', 'publicController@detail');

// admin before login

Route::match(['get', 'post'], 'admin', 'admin@login');

Route::match(['get', 'post'], 'admin/register', 'admin@register');

Route::get('logout', 'admin@logout');

// admin after login

Route::get('admin/dashboard', 'admin@dashboard');

Route::get('admin/password/reset', 'admin@reset');

Route::get('admin/password/check', 'admin@check');

Route::match(['get', 'post'], 'admin/password/update', 'admin@update');

// members

Route::match(['get', 'post'], 'admin/member/add', 'team@addMember');

Route::get('admin/member/show', 'team@showMembers');

Route::get('admin/member/delete', 'team@deleteMember');

Route::get('admin/member/edit/{id}', 'team@editMember');

Route::post('admin/member/update', 'team@updateMember');

// projects

Route::match(['get', 'post'], 'admin/project/add', 'projectController@addProject');

Route::get('admin/project/type/add', 'projectController@addType');

Route::get('admin/project/type/delete', 'projectController@deleteType');

Route::get('admin/project/image/delete', 'projectController@deleteImage');

Route::get('admin/project/show/{type?}', 'projectController@showProjects'); 

Route::get('admin/project/delete', 'projectController@deleteProject'); 

Route::get('admin/project/edit/{id}', 'projectController@editProject');

Route::post('admin/project/update', 'projectController@updateProject');