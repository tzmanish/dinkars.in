@extends('layouts/public') 
@section('title', 'Projects') 
@section('body')

<div class="row">
	@foreach ($project_list as $project)
	<a href="project/{{$project->id}}" id="card-link" class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
			<div class="card">
				<img class="card-img-top" src="{{ asset('images/projects/'.$project->cover) }}" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">{{$project->name}}</h5>
					<p class="card-text">{{$project->description}}</p>
				</div>
			</div>
	</a>
	@endforeach
</div>
@endsection