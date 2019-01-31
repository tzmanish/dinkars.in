<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Type;
use App\Image as projectimage;
use Session;
use Illuminate\Support\Facades\Input;
use Image;

class projectController extends Controller
{

  public function addProject(Request $request)
  {
    if (Session::has('adminSession')) {
      if ($request->isMethod('post')) {
        $data = $request->all();
        // echo "<pre>"; print_r(Input::file('cover')); die;

        $project = new project;
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->client = $data['client'];
        $project->area = $data['area'];
        $project->cost = $data['cost'];
        $project->location = $data['location'];


        if (!file_exists('images/projects/'.$data['name'])) {
          mkdir('images/projects/'.$data['name'], 0777, true);
        }


        if ($request->hasFile('cover')) {
          $image_tmp = Input::file('cover');
          if ($image_tmp->isValid()) {
            $extension = $image_tmp->getClientOriginalExtension();
            $filename = rand(111, 99999) . '.' . $extension;
            $image_path = 'images/projects/'.$data['name'].'/'.$filename;
            Image::make($image_tmp)->fit(1000, 1000)->save($image_path);
          } else {
            return redirect('admin/project/add')->with('flash_message_error', 'Upload failed due to invalid image file.');
          }
        } else {
          $image_path = "images/nomedia/nomedia.png";
        }
        $project->cover = $image_path;

        $project->save();
        
        if ($request->has('gallery-upload')) {
          foreach ($data['gallery-upload'] as $image_tmp) {
            if ($image_tmp->isValid()) {
              $extension = $image_tmp->getClientOriginalExtension();
              $filename = rand(111, 99999) . '.' . $extension;
              $image_path = 'images/projects/'.$data['name'].'/'. $filename;
              Image::make($image_tmp)->fit(1920, 1080)->save($image_path);
              $image = new projectimage;
              $image->image = $image_path;
              $project->images()->save($image);
            }
          }
        }
        
        if ($request->has('type')) {
          $type = Type::find($data['type']);
          $project->types()->attach($type);
        }

        return redirect('admin/project/add')->with('flash_message_success', 'Upload successful.');
      }

		  $types = Type::all();
      $context = [
        'view' => 'addProject',
        'types' => $types,
      ];
      return view('auth/addProject', $context);
    } else {
      return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
    }
  }

  public function addType(Request $request){
    if (Session::has('adminSession')) {
        $data = $request->all();
        $type = new type;
        $type->name = $data['type'];
        $result = $type->save();
        if($result){
          $id = Type::where('name', $data['type'])->value('id');
          echo $id; die;
        }
        echo $result; die;
    }
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
  }

}
