<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use Session;

class team extends Controller
{
	
    public function addMember(Request $request){
		if(Session::has('adminSession')){
			
			if($request->isMethod('post')){
				$data = $request->all();
				// echo "<pre>"; print_r($data); die;
				$member = new Member;
				$member->name = $data['name'];
				$member->role = $data['role'];
				$member->description = $data['description'];
				$member->picture = $data['image'];
				$member->save();
			}
			
			
			$context = [
				'view'=> 'addMember'
				];
			return view('auth/addMember', $context);
		}
		else{
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}
	
}
