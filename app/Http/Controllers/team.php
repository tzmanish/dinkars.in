<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use Session;
use Illuminate\Support\Facades\Input;
use Image;

class team extends Controller
{

	public function addMember(Request $request)
	{
		if (Session::has('adminSession')) {

			if ($request->isMethod('post')) {
				$data = $request->all();
				// echo "<pre>"; print_r($data); die;
				$member = new Member;
				$member->name = $data['name'];
				$member->role = $data['role'];
				$member->description = $data['description'];

				if ($request->hasFile('image')) {
					$image_tmp = Input::file('image');
					if ($image_tmp->isValid()) {
						$extension = $image_tmp->getClientOriginalExtension();
						$filename = rand(111, 99999) . '.' . $extension;
						$image_path = 'images/members/' . $filename;
						Image::make($image_tmp)->fit(1000, 1000)->save($image_path);
					} else {
						return redirect('admin/member/add')->with('flash_message_error', 'Upload failed due to invalid image file.');
					}
				} else {
					$filename = "nomedia/nomedia.png";
				}
				$member->image = $filename;

				$member->save();
				return redirect('admin/member/add')->with('flash_message_success', 'Upload successful.');
			}


			$context = [
				'view' => 'addMember'
			];
			return view('auth/addMember', $context);
		} else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

	public function showMembers(Request $request)
	{
		if (Session::has('adminSession')) {
			$members = Member::all();
			$count = Member::count();
			$context = [
				'count' => $count,
				'members' => $members,
				'view' => 'showMembers'
			];
			return view('auth/showMembers', $context);
		} else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

	public function editMember($id)
	{
		if (Session::has('adminSession')) {

			$member = Member::find($id);
			$context = [
				'member' => $member,
				'view' => 'editMember'
			];
			return view('auth/editMember', $context);
		} else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

	public function updateMember(Request $request)
	{
		if (Session::has('adminSession')) {


			$data = $request->all();
			// echo "<pre>"; print_r($data); die;
			$member = member::find($data['id']);
			$member->name = $data['name'];
			$member->role = $data['role'];
			$member->description = $data['description'];

			if ($request->hasFile('image')) {
				$image_tmp = Input::file('image');
				if ($image_tmp->isValid()) {
					$extension = $image_tmp->getClientOriginalExtension();
					$filename = rand(111, 99999) . '.' . $extension;
					$image_path = 'images/members/' . $filename;
					Image::make($image_tmp)->fit(1000, 1000)->save($image_path);
					if ($member->image != "nomedia/nomedia.png") {
						$deletePath = public_path().'/images/members/'.$member->image;
						if(file_exists($deletePath)){unlink($deletePath);}
					}
					$member->image = $filename;
				} else {
					return redirect('/admin/member/show')->with('flash_message_error', 'Update failed due to invalid image file.');
				}
			}
			$member->save();

			return redirect('/admin/member/show')->with('flash_message_success', $data['name'].' updated');
		} 
		else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

	public function deleteMember(Request $request)
	{
		if (Session::has('adminSession')) {
			$data = $request->all();
			$member = member::find($data['id']);
			if ($member->image != "nomedia/nomedia.png") {
				$deletePath = public_path().'/images/members/'.$member->image;
				if(file_exists($deletePath)){unlink($deletePath);}
			}
			echo member::destroy($data['id']);
			die;
		} 
		else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

}
