<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Type;
use App\Image as projectimage;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
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
              $image->path = $image_path;
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

  public function deleteType(Request $request){
    if (Session::has('adminSession')) {
        $data = $request->all();
        type::destroy($data['id']);
    }
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
  }

  public function deleteImage(Request $request){
    if (Session::has('adminSession')) {
        $data = $request->all();
        $id = $data['id'];
        $image = projectimage::find($id);
        $deletePath = public_path().'/'.$image->path;
        if(file_exists($deletePath)){unlink($deletePath);}
        echo $image->delete(); 
        die;
    }
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
  }

  public function showProjects($type = 0){
    if (Session::has('adminSession')) {
      if($type){
        $projects = Type::with('projects')->find($type)->projects;
        $curType = Type::find($type)->name;
      }
      else{
        $projects = Project::all();
        $curType = 'all';
      }
			$context = [
				'projects' => $projects,
        'view' => 'showProjects',
        'types' => Type::all(),
        'allCount' => Project::all()->count(),
        'currentType' => $curType
			];
			return view('auth/showProjects', $context);
    }
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
  }

  public function deleteProject(Request $request)
  {
	  if (Session::has('adminSession')) {
      
      $data = $request->all();      
        // echo "<pre>"; print_r($data); die;
		  $project = project::with('types', 'images')->find($data['id']);
		  if ($project->cover != "images/nomedia/nomedia.png") {
			  $deletePath = public_path().'/'.$project->cover;
			  if(file_exists($deletePath)){unlink($deletePath);}
      }
      $directory= public_path('images/projects/'.$project->name);
		  File::deleteDirectory($directory);
		  echo $project->delete();
		  die;
	  } 
	  else {
		  return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
	  }
  }

	public function editProject($id)
	{
		if (Session::has('adminSession')) {

      $project = Project::with('types', 'images')->find($id);
      $types = Type::all();
			$context = [
        'project' => $project,
        'types' => $types,
				'view' => 'editProject'
			];
			return view('auth/editProject', $context);
		} else {
			return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

  public function updateProject(Request $request)
  {
    if (Session::has('adminSession')) {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;

        $project = project::find($data['id']);
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
            if ($project->cover != "images/nomedia/nomedia.png") {
              $deletePath = public_path().'/'.$project->cover;
              if(file_exists($deletePath)){unlink($deletePath);}
            }
            $project->cover = $image_path;
          }
        }

        $project->save();
        
        if ($request->has('gallery-upload')) {
          foreach ($data['gallery-upload'] as $image_tmp) {
            if ($image_tmp->isValid()) {
              $extension = $image_tmp->getClientOriginalExtension();
              $filename = rand(111, 99999) . '.' . $extension;
              $image_path = 'images/projects/'.$data['name'].'/'. $filename;
              Image::make($image_tmp)->fit(1920, 1080)->save($image_path);
              $image = new projectimage;
              $image->path = $image_path;
              $project->images()->save($image);
            }
          }
        }
        
        $project->types()->detach();
        if ($request->has('type')) {
          $type = Type::find($data['type']);
          $project->types()->attach($type);
        }

        return redirect('admin/project/add')->with('flash_message_success', 'Upload successful.');
      
    } else {
      return redirect('/admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
    }
  }

}
