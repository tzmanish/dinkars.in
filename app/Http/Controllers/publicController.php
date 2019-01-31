<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Member;

class publicController extends Controller
{
    public function home(){
		$context = [
			'view'=> 'home',
			];
		return view('home', $context);
	}
		
		
	public function projects(){
		$project_list = Project::get();
		$context = [
			'project_list'=> $project_list,
			'view'=> 'projects',
			];
		return view('projects', $context);
	}
		
		
	public function about(){
		$team = Member::get();
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
		
		
	public function detail($id){
		$project = Project::with('types', 'images')->find($id);
		// echo "<pre>"; print_r($project); die;
		$context = [
			'project'=> $project,
			'view'=> 'detail',
			];
		return view('detail', $context);
	}
}
