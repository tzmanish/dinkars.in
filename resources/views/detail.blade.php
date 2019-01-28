@extends('layouts/public') 
@section('title', 'Detail') 
@section('body')


<div class="card bg-dark text-white">
  <img class="card-img" src="{{ asset('images/projects/'.$project[0]->cover)}}" alt="image">
  <div class="card-img-overlay">
    <h5 class="card-title">{{$project[0]->name}}</h5>
    <p class="card-text">{{$project[0]->description}}</p>
    <p class="card-text">{{$project[0]->client}}</p>
    <p class="card-text">{{$project[0]->area}}</p>
    <p class="card-text">{{$project[0]->cost}}</p>
    <p class="card-text">{{$project[0]->location}}</p>
  </div>
</div>
@endsection