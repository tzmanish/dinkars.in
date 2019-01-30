@extends('layouts/public') 
@section('title', 'Detail') 
@section('body')


<div class="card bg-dark text-white">
  <img class="card-img" src="{{ asset('images/projects/'.$project->cover)}}" alt="image">
  <div class="card-img-overlay">
    <h5 class="card-title">{{$project->name}}</h5>
    <p class="card-text">{{$project->description}}</p>
    <p class="card-text">{{$project->client}}</p>
    <p class="card-text">{{$project->area}}</p>
    <p class="card-text">{{$project->cost}}</p>
    <p class="card-text">{{$project->location}}</p>
  </div>
</div>
@endsection