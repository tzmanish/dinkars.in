@extends('layouts/public') 
@section('title', 'Detail') 
@section('body')

<div class="bg-light" id="titlebox">
	<h2>{{$project->name}}</h2>
	@php
		$colors=['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
	@endphp
	@foreach ($project->types as $type)
		<span class="badge badge-pill badge-{{$colors[$type->id % 6]}}">{{$type->name}}</span>
	@endforeach
</div>
<div class="row">
	<div class="col-xl-8">
		<div id="carouselIndicators" class="carousel slide bg-dark" data-ride="carousel">
			<ol class="carousel-indicators">
				@foreach($project->images as $image)
				<li data-target="#carouselIndicators" data-slide-to="{{$loop->index}}" @if($loop->first) class="active" @endif></li>
				@endforeach
			</ol>
			<div class="carousel-inner">
				@foreach($project->images as $image)
				<div class="carousel-item  @if($loop->first) active @endif">
					<img class="d-block" src="{{asset($image->path)}}">
				</div>
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<div class="col-xl-4" id="details">
		<h6>{{$project->description}}</h6>
		<hr>
		<ul>
			<li>Clint:<b> {{$project->client}}</b></li>
			<li>Area:<b> {{$project->area}} sqm</b></li>
			<li>Cost:<b> &#8377; {{$project->cost}}</b></li>
		</ul>
		<hr>
		<div class="map-responsive">
			<iframe src="https://www.google.com/maps/{{$project->location}}" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>
@endsection