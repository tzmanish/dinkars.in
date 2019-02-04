@extends('layouts/public') 
@section('title', 'Projects') 
@section('body')
<div class="row bg-yellow" style="padding-top:20px;">
	<div id="filters">
		<span>
			Type: 
			<button class="btn btn-sm btn-danger btnpink dropdown-toggle" type="button" id="typeDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{$currentType}}
			</button>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="typeDropdownButton">
				<a class="dropdown-item @if($currentType=='all')disabled @endif" href="/projects">all ({{$allCount}})</a>
				@foreach ($types as $type)
					@if($type->projects->count())
						<a class="dropdown-item @if($currentType==$type->name) disabled @endif" href="/projects/{{$type->id}}" id="type{{$type->id}}">{{$type->name}} ({{$type->projects->count()}})</a>
					@endif
				@endforeach
			</div>
		</span>
	</div>
	<div id="filters">
		<span>
			Sort By: 
			<button class="btn btn-sm btnpink btn-danger dropdown-toggle" type="button" id="sortDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				@switch($sorting)
					@case('namea')
						Name (A-Z)
						@break
					@case('named')
						Name (Z-A)
						@break
					@case('areaa')
						Area <i class="fas fa-arrow-up"></i>
						@break
					@case('aread')
						Area <i class="fas fa-arrow-down"></i>
						@break
					@case('costa')
						Budget <i class="fas fa-arrow-up"></i>
						@break
					@case('costd')
						Budget <i class="fas fa-arrow-down"></i>
						@break
					@case('ida')
						Older first
						@break
					@case('idd')
						Newer first
						@break
					@default
						Newer first
				@endswitch
			</button>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropdownButton">
				<a class="dropdown-item" href="/projects/{{$urlid}}/id/d" >Newer first</a>
				<a class="dropdown-item" href="/projects/{{$urlid}}/id/a" >Older first</a>
				<a class="dropdown-item" href="/projects/{{$urlid}}/name/a" >Name (A-Z)</a>
				<a class="dropdown-item" href="/projects/{{$urlid}}/name/d" >Name (Z-A)</a>
				<a class="dropdown-item" href="/projects/{{$urlid}}/area/d" >Area <i class="fas fa-arrow-down"></i></a>
				<a class="dropdown-item" href="/projects/{{$urlid}}/area/a" >Area <i class="fas fa-arrow-up"></i></a>
				<a class="dropdown-item" href="/projects/{{$urlid}}/cost/d" >Budget <i class="fas fa-arrow-down"></i></a>
				<a class="dropdown-item" href="/projects/{{$urlid}}/cost/a" >Budget <i class="fas fa-arrow-up"></i></a>
			</div>
		</span>
	</div>
</div>
<div class="card-deck">
	@foreach ($projects as $project)
	<a href="/project/{{$project->id}}" id="card-link" class="col-lg-3 col-md-4 col-sm-6">
		<div class="card bg-light mb-3" style="max-width: 20rem;">
				<img class="card-img-top" src="{{ asset($project->cover) }}" alt="Card image cap">
				<div class="card-body scrollbar-black">
					<h5 class="card-title">{{$project->name}}</h5>
					@php
						$colors=['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
					@endphp
					@foreach ($project->types as $type)
						<span class="badge badge-pill badge-{{$colors[$type->id % 6]}}">{{$type->name}}</span>
					@endforeach
					<p class="card-text">{{$project->description}}</p>
				</div>
			</div>
	</a>
	@endforeach
</div>
@endsection
@section('js')
@endsection