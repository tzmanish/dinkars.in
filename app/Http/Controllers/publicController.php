<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Member;
use App\featured;
use App\type;

class publicController extends Controller
{
    public function home(){
			$featuredImages = featured::get();
			$context = [
				'view'=> 'home',
				'featuredImages' => $featuredImages,
				];
			return view('home', $context);
	}
		
		
	public function projects($type = 0, $sortby='id', $ad='d'){
		if($type){
		  $projects = Type::with('projects')->find($type)->projects;
		  $curType = Type::find($type)->name;
		}
		else{
		  $projects = Project::all();
		  $curType = 'all';
		}
		if($ad=='a'){$sorted = $projects->sortBy($sortby);}
		else{$sorted = $projects->sortByDesc($sortby);}
		$context = [
			'projects'=> $sorted,
			'sorting' => $sortby.$ad,
			'view'=> 'projects',
			'types' => Type::all(),
			'allCount' => Project::all()->count(),
			'currentType' => $curType,
			'urlid' => $type
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
