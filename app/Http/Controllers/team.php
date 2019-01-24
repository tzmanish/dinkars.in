<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use Session;
use Illuminate\Support\Facades\Input;
use Image;

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
				
				if($request->hasFile('image')){
					$image_tmp = Input::file('image');
					if($image_tmp->isValid()){
						$extension = $image_tmp->getClientOriginalExtension();
						$filename = rand(111, 99999).'.'.$extension;
						$image_path = 'images/members/'.$filename;
						Image::make($image_tmp)->save($image_path);
						$member->image = $filename;
					}
				}
				
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
