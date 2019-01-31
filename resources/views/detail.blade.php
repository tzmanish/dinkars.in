@extends('layouts/public') 
@section('title', 'Detail') 
@section('body')


<div class="card bg-dark text-white">
  @foreach($project->images as $image)
  <img height="200px" width="auto" src="{{ asset($image->image)}}" alt="image">
  @endforeach
  <div>
    <h5 class="card-title">{{$project->name}}</h5>
    <ul>
    @foreach($project->types as $type)
    <li>{{ $type->name }}</li>
    @endforeach
    </ul>
    <p class="card-text">{{$project->description}}</p>
    <p class="card-text">{{$project->client}}</p>
    <p class="card-text">{{$project->area}}</p>
    <p class="card-text">{{$project->cost}}</p>
    <p class="card-text">{{$project->location}}</p>
  </div>
</div>
@endsection