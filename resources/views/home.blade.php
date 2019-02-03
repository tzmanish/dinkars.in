@extends('layouts/public') 
@section('title', 'Home') 
@section('body')
<div id="carouselExample" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		@foreach ($featuredImages as $featured)
		<li data-target="#carouselExample" data-slide-to="{{$loop->index}}"></li>
		@endforeach
	</ol>
	<div class="carousel-inner">
		@foreach ($featuredImages as $featured)
		<div class="carousel-item @if($loop->first) active @endif" data-interval="5000">
			<img src="{{asset($featured->path)}}" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>{{$featured->title}}</h5>
				<p>{{$featured->description}}</p>
			</div>
		</div>
		@endforeach
	</div>
	<a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
	<a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
@endsection
 
@section('js')
@endsection