@extends('layouts/public')
@section('title', 'About')
@section('body')

@foreach ($team as $member)
	<p>{{$member->name}}</p>
	<img src="{{ asset('images/members') }}/{{ $member->image }}" width="40%" />
@endforeach

@endsection('body')