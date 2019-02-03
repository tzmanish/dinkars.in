<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Rohit Dinkar Architects | Dinkar Associates - @yield('title')</title>

        <!-- links -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">

		<link rel="stylesheet" type="text/css" href="{{ asset('css/') }}/@yield('title').css">

		<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

		<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}" crossorigin="anonymous">
    </head>
	
	
	
    <body>

    	{{-- dummy Navbar	 --}}
			
		<nav class="navbar navbar-expand-sm" id="navbar"><a class="navbar-brand" href="/"  id="logo"><img src="{{ asset('images/logo/logo.png') }}"/></a></nav>

		{{-- navbar --}}


		<nav class="navbar navbar-expand-sm navbar-dark bg-dark d-flex fixed-top" id="navbar">
		  <a class="navbar-brand" href="/"  id="logo"><img src="{{ asset('images/logo/logo.png') }}"/></a>
		  <button class="navbar-toggler" id="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		  </button>

		  <div class="collapse navbar-collapse align-self-end" id="navbarSupportedContent" >
			<ul class="navbar-nav ml-auto">
			  <li @if($view == 'home') id="active" @endif >
				<a class="nav-link @if($view == 'home') text-dark @endif" href="/" id="navlink">Home</a>
			  </li>
			  <li @if($view == 'projects' or $view == 'detail') id="active" @endif >
				<a class="nav-link @if($view == 'projects' or $view == 'detail') text-dark @endif " href="/projects" id="navlink">Projects</a>
			  </li>
			  <li @if($view == 'about' ) id="active" @endif >
				<a class="nav-link @if($view == 'about') text-dark @endif " href="/about" id="navlink">About</a>
			  </li>
			  <li @if($view == 'contact' ) id="active" @endif >
				<a class="nav-link @if($view == 'contact') text-dark @endif " href="/contact" id="navlink">Contact</a>
			  </li>
			</ul>
		  </div>
		</nav>
		
		
		
		<main id="content" class="scrollbar-black">
		@yield('body')
		</main>
		
		
		<footer class="text-white bg-dark d-block" id="footer">
		  	<div class="row" id="footer-content">
				<div class="col-sm text-center align-middle d-lg-block d-none">
					<h1>Rohit Dinkar Architects</h1>
					<p>CA/2010/40912<p>
				</div>
				<div class="col-sm text-center align-middle  d-md-block d-none">
					<p>1054 Sch No. 114 Part 2,
					Behind Bharat Petrol Pump,
					Off Ring Road, Indore. (M.P.)</p>
				</div>
				<div class="col-sm text-center align-middle" id="contact">
					<P><i class="fas fa-phone fa-rotate-90"></i><a href="tel:+919826334884"> +91 98263 34884</a></p>
					<P><i class="fas fa-envelope"></i><a href="mailto:ar.dinkar@gmail.com" target="_top"> ar.dinkar@gmail.com</a></p>
				</div>
				<div class="col-sm">
					<div class="d-flex justify-content-center" id="social">
						<a href="https://www.facebook.com/"><i class="fab fa-facebook-f fa-lg"></i></a>
						<a href="https://www.instagram.com/"><i class="fab fa-linkedin-in fa-lg"></i></a>
						<a href="https://in.linkedin.com/"><i class="fab fa-instagram fa-lg"></i></a>
					</div>
				</div>
		  	</div>
		</footer>
		
		
		
	</body>



	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

	<script src="{{asset('js/popper.min.js')}}"></script>

	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

	<script>
		@yield('js')
	</script>
</html>
