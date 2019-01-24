<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Rohit Dinkar Architects | Dinkar Associates - @yield('title')</title>

        <!-- links -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/') }}/@yield('title').css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- Navbar -->	
			
		<nav class="navbar navbar-expand-sm" id="navbar"><a class="navbar-brand" href="/"  id="logo"><img src="{{ asset('images/logo.png') }}"/></a></nav>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark d-flex fixed-top" id="navbar">
		  <a class="navbar-brand" href="/"  id="logo"><img src="{{ asset('images/logo.png') }}"/></a>
		  <button class="navbar-toggler" id="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		  </button>

		  <div class="collapse navbar-collapse align-self-end" id="navbarSupportedContent" >
			<ul class="navbar-nav ml-auto">
			  <li @if($view == 'home') id="active" @endif >
				<a class="nav-link @if($view == 'home') text-dark @endif" href="/" id="navlink">Home</a>
			  </li>
			  <li @if($view == 'projects') id="active" @endif >
				<a class="nav-link @if($view == 'projects') text-dark @endif " href="/projects" id="navlink">Projects</a>
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
    </head>
	
	
	
    <body>
		<main id="content" class="scrollbar-black">
		@yield('body')
		</main>
		
		
		<footer class="text-white bg-dark" id="footer">
		  <div class="row" id="footer-content">
			<div class="col-sm text-center align-middle">
			  <h1>Rohit Dinkar Architects</h1>
			  <p>CA/2010/40912<p>
			</div>
			<div class="col-sm text-center align-middle">
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


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
