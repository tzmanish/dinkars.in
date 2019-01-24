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



Route::get('/', 'project@home');

Route::get('projects', 'project@projects');

Route::get('about', 'project@about');

Route::get('contact', 'project@contact');

Route::get('project/{p_id}', 'project@detail');



Route::match(['get', 'post'], 'admin', 'admin@login');

Route::match(['get', 'post'], 'admin/register', 'admin@register');

Route::get('logout', 'admin@logout');



Route::get('admin/dashboard', 'admin@dashboard');

Route::get('admin/password/reset', 'admin@reset');

Route::get('admin/password/check', 'admin@check');

Route::match(['get', 'post'], 'admin/password/update', 'admin@update');



Route::match(['get', 'post'], 'admin/member/add', 'team@addMember');