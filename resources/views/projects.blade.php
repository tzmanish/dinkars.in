@extends('layouts/public')
@section('title', 'Projects')
@section('body')


@foreach ($project_list as $project)
	<p>{{$project->name}}</p>
@endforeach


@endsection('body')
