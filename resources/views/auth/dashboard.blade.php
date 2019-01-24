@extends('layouts.app')
@section('title', "Dashboard")
@section('content')


<div class="row">
@for($i=0; $i<50; $i++)
	<div class="col-12 col-sm-6 col-lg-3" style="padding:5px;">
		<div style="height:200px; background-color:orange;">
		
		</div>
	</div>
	<div class="col-12 col-sm-6 col-lg-3" style="padding:5px;">
		<div style="height:200px; background-color:salmon;">
		
		</div>
	</div>
@endfor
</div>


@endsection('content')