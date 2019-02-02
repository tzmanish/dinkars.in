@extends('layouts.app')
@section('title', "Dashboard")
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $chart->container() !!}
{!! $chart->script() !!}
@endsection
@section('js')

@endsection