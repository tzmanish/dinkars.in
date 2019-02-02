<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use App\User;
use App\Charts\dashboard;
use App\type;
use Illuminate\Support\Collection;
use App\project;

class admin extends Controller
{
	
    public function login(Request $request){
		if(Session::has('adminSession')){
			$context = [
				'view'=> 'dashboard',
				];
			return redirect('admin/dashboard/');
		}
		if($request->isMethod("post")){
			$data = $request->input();
			if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'isAdmin'=>'1'])){
				Session::put('adminSession', $data['email']);
				return redirect('admin/dashboard');
			}
			else{
				return redirect('admin')->with('flash_message_error', 'Invalid Email or Password. Make sure you are an admin!!');
			}
		}
		$context = [
				'view'=> 'login',
			];
		return view('auth/login', $context);
	}

    public function register(Request $request){
		if($request->isMethod("post")){
			$data = $request->all();
			$user = new user;
			$user->name = $data['name'];
			$user->email = $data['email'];
			$user->password = bcrypt($data['password']);
			$user->save();
			return redirect('admin')->with('flash_message_success', 'You are now registered, contact site manager for admin rights :)');
		}
		$context = [
				'view'=> 'register',
			];
		return view('auth/register', $context);
	}

	public function logout(){
		Session::flush();
		return redirect('admin')->with('flash_message_success', 'Session logged out.');
	}

    public function reset(){
		if(Session::has('adminSession')){
			$context = [
				'view'=> 'reset',
				];
			return view('auth/passwords/reset', $context);
		}
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}
	
	public function check(Request $request){
		if(Session::has('adminSession')){
			$data = $request->all();
			$password = $data['current'];
			$check = User::where(['email'=> Auth::user()->email])->first();
			if(Hash::check($password, $check->password)){
				echo "true"; die;
			}
			else{
				echo "false"; die;
			}
		}
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}

    public function update(Request $request){
		if(Session::has('adminSession')){
			
			if($request->isMethod('post')){
				$data = $request->all();
				$check = User::where(['email'=> Auth::user()->email])->first();
				$current = $data['current'];
				if($data['new'] != $data['confirm']){
					return redirect('admin/password/reset')->with('flash_message_error', 'New passwords dont match!!');
				}
				if(Hash::check($current, $check->password)){
					$new = bcrypt($data['new']);
					User::where(['email'=> Auth::user()->email])->update(['password' => $new]);
					return redirect('admin/password/reset')->with('flash_message_success', 'Password updated.');
				}
				else{
					return redirect('admin/password/reset')->with('flash_message_error', 'Wrong current password!!');
				}
			}
			
		}
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access settings.');
		}
	}	



    public function dashboard(){
		if(Session::has('adminSession')){

			Collection::macro('toAssoc', function () {
				return $this->reduce(function ($assoc, $keyValuePair) {
					list($key, $value) = $keyValuePair;
					$assoc[$key] = $value;
					return $assoc;
				}, new static);
			});

			Collection::macro('mapToAssoc', function ($callback) {
				return $this->map($callback)->toAssoc();
			});

			$data = type::with('projects')->get()
			->mapToAssoc(function ($type) {
				return [$type['name'], count($type['projects'])];    
			});
			// echo "<pre>"; print_r($data); die;
			$chart = new dashboard;
			$chart->labels($data->keys());
			$chart->dataset('no of projects (out of '.project::get()->count().')', 'bar', $data->values())
			->color('#000000');
			$chart->title("Project type stats");

			$context = [
				'view'=> 'dashboard',
				'chart' => $chart
				];
			return view('auth/dashboard', $context);
		}
		else{
			return redirect('admin')->with('flash_message_error', 'You need to login as administrator to access dashboard.');
		}
	}

}
