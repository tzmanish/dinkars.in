<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\featured;
use Session;
use Illuminate\Support\Facades\Input;
use Image;

class featuredController extends Controller
{

	public function addFeatured(Request $request)
	{
		if (Session::has('adminSession')) {

			if ($request->isMethod('post')) {
				$data = $request->all();
				// echo "<pre>"; print_r($data); die;
				$featured = new featured;
				$featured->title = $data['title'];
                $featured->description = $data['description'];
                
                if (!file_exists('images/featured/')) {
                    mkdir('images/featured/', 0777, true);
                }

				if ($request->hasFile('image')) {
					$image_tmp = Input::file('image');
					if ($image_tmp->isValid()) {
						$extension = $image_tmp->getClientOriginalExtension();
						$filename = rand(111, 99999) . '.' . $extension;
						$image_path = 'images/featured/' . $filename;
						Image::make($image_tmp)->fit(1920, 1080)->save($image_path);
					} else {
						return redirect('admin/featured/add')->with('flash_message_error', 'Upload failed due to invalid image file.');
					}
				} else {
					return redirect('admin/featured/add')->with('flash_message_error', 'Upload failed, Image required.');
				}
				$featured->path = $image_path;

				$featured->save();
				return redirect('admin/featured/add')->with('flash_message_success', 'Upload successful.');
			}


			$context = [
				'view' => 'addFeatured'
			];
			return view('auth/addFeatured', $context);
		} else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

	public function showFeatured()
	{
		if (Session::has('adminSession')) {
			$allFeatured = featured::all();
			$count = featured::count();
			$context = [
				'count' => $count,
				'allFeatured' => $allFeatured,
				'view' => 'showFeatured'
			];
			return view('auth/showFeatured', $context);
		} else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

	public function deleteFeatured(Request $request)
	{
		if (Session::has('adminSession')) {
			$data = $request->all();
			$featured = featured::find($data['id']);
            $deletePath = public_path().'/'.$featured->path;
            if(file_exists($deletePath)){unlink($deletePath);}
			echo $featured->delete();
			die;
		} 
		else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}
}
