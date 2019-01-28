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



Route::get('/', 'publicController@home');

Route::get('projects', 'publicController@projects');

Route::get('about', 'publicController@about');

Route::get('contact', 'publicController@contact');

Route::get('project/{p_id}', 'publicController@detail');



Route::match(['get', 'post'], 'admin', 'admin@login');

Route::match(['get', 'post'], 'admin/register', 'admin@register');

Route::get('logout', 'admin@logout');



Route::get('admin/dashboard', 'admin@dashboard');

Route::get('admin/password/reset', 'admin@reset');

Route::get('admin/password/check', 'admin@check');

Route::match(['get', 'post'], 'admin/password/update', 'admin@update');



Route::match(['get', 'post'], 'admin/member/add', 'team@addMember');

Route::match(['get', 'post'], 'admin/member/edit', 'team@editMember');

Route::match(['get', 'post'], 'admin/member/show', 'team@showMembers');


Route::match(['get', 'post'], 'admin/project/add', 'projectController@addProject');

Route::match(['get', 'post'], 'admin/project/edit', 'projectController@editProject');

Route::match(['get', 'post'], 'admin/project/show', 'projectController@showProjects');