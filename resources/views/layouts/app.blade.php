<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>RDA - Admin @yield('title')</title>

		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/layout.css') }}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/') }}/{{$view}}.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		
		
	</head>
	
	
	<body>
		<div id="app">
		
		
			<!-- side navigatrion bars -->
			<div class="nav-side-menu scrollbar-black">
				<a class="brand" href="{{ url('admin') }}"><img id="logo" src="{{ asset('images/logo/logo.png') }}"/></a>
				<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
			  
				<div class="menu-list">
		  
					<ul id="menu-content" class="menu-content collapse out">
					
						@guest
						
							<li @if($view == 'login') class="active" @endif><a href="{{ url('admin') }}"><i class="fa fa-user fa-lg"></i> {{ __('Login') }}</a></li>
							
						@else
						
							<a href="{{ url('admin') }}"><li @if($view == 'dashboard') class="active" @endif><i class="fas fa-tachometer-alt"></i> Dashboard</li></a>
							
							<li data-toggle="collapse" @if($view == 'addProject' or $view == 'editProject' or $view == 'showProjects') class="active" @endif data-target="#projects" class="collapsed">
								<a href="#"><i class="fas fa-project-diagram"></i> Projects <span id="down-arrow"><i class="fas fa-chevron-down"></i></span></a>
							</li>
							<ul class="sub-menu collapse @if($view == 'addProject' or $view == 'editProject' or $view == 'showProjects') show @endif" id="projects">
								<li @if($view == 'editProject' or $view == 'showProjects') class="active" @endif><a href="{{url('admin/project/show')}}">Edit Projects</a></li>
								<li @if($view == 'addProject') class="active" @endif><a href="{{url('admin/project/add')}}">Add Project</a></li>
							</ul>

							<li data-toggle="collapse" @if($view == 'addMember' or $view == 'editMember' or $view == 'showMembers') class="active" @endif data-target="#team" class="collapsed">
								<a href="#"><i class="fa fa-users fa-lg"></i> Team <span id="down-arrow"><i class="fas fa-chevron-down"></i></span></a>
							</li>
							<ul class="sub-menu collapse @if($view == 'addMember' or $view == 'editMember' or $view == 'showMembers') show @endif" id="team">
								<li @if($view == 'editMember' or $view == 'showMembers') class="active" @endif><a href="{{url('admin/member/show')}}">Edit Members</a></li>
								<li @if($view == 'addMember') class="active" @endif><a href="{{url('admin/member/add')}}">Add Member</a></li>
							</ul>
							
							<li data-toggle="collapse" @if($view == 'reset') class="active" @endif data-target="#user" class="collapsed">
								<a href="#"><i class="fa fa-user fa-lg"></i> {{ Auth::user()->name }} <span id="down-arrow"><i class="fas fa-chevron-down"></i></span></a>
							</li>
							<ul class="sub-menu collapse @if($view == 'reset') show @endif" id="user">
								<li @if($view == 'reset') class="active" @endif><a href="{{url('admin/password/reset')}}">{{ __('Change Password') }}</a></li>
								<li><a href="{{ url('logout') }}">{{ __('Logout') }}</a></li>
							</ul>
							
						@endguest
					</ul>
				</div>
			</div>


			<!-- Content -->
			<main id="site-content"   class="scrollbar-black">
				@yield('content')
			</main>
			
			
		</div>
	</body>

    <!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
		@yield('js')
    </script>
	
</html>
