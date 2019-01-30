<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class publicController extends Controller
{
    public function home(){
		$context = [
			'view'=> 'home',
			];
		return view('home', $context);
	}
		
		
	public function projects(){
		$project_list = DB::table('projects')->get();
		$context = [
			'project_list'=> $project_list,
			'view'=> 'projects',
			];
		return view('projects', $context);
	}
		
		
	public function about(){
		$team = DB::table('members')->get();
		$context = [
			'view'=> 'about',
			'team'=> $team,
			];
		return view('about', $context);
	}
		
		
	public function contact(){
		$context = [
			'view'=> 'contact',
			];
		return view('contact', $context);
	}
		
		
	public function detail($p_id){
		$project = DB::table('projects')->where('id', $p_id)->first();
		$context = [
			'project'=> $project,
			'view'=> 'detail',
			];
		return view('detail', $context);
	}
}
