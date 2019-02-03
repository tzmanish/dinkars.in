@extends('layouts.app')
@section('title', "Edit Members")
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div id="error-box">
				@if(Session::has('flash_message_error'))
					<span class="alert-danger" role="alert"> 
						<i class="fas fa-exclamation-triangle"></i> {!! session('flash_message_error') !!}
					</span> 
				@endif 
				@if(Session::has('flash_message_success'))
					<span class="alert-info" role="alert"> 
						<i class="fas fa-check-circle"></i> {!! session('flash_message_success') !!} 
					</span> 
				@endif
			</div>
		</div>

		<div class="dropdown">			
				<a class="btn btn-secondary" href="/admin/featured/add" role="button">+</a>
		</div>
		<div class="col-md-10">
			<div class="table-responsive">
				<table class="table table-borderless table-striped table-hover">
						<caption class="bg-secondary text-white">&nbsp; {{$count}} images</caption>
					<thead class="thead-dark">
						<tr>
						<th scope="col">Image</th>
						<th scope="col">Title</th>
						<th scope="col">Description</th>
						<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($allFeatured as $featured)
							<tr id="row{{$featured->id}}">
                				<td><img class="img-thumbnail" width="500px" src="{{asset($featured->path)}}"></td>
								<td>{{$featured->title}}</td>
								<td>{{$featured->description}}</td>
								<td>
								<button  class="btn btn-danger" onclick="deleteFeatured({{$featured->id}})">delete</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="current_status"></div>
@endsection
@section('js')

function deleteFeatured(id){
	if(confirm("Are You Sure? ")){
		$.ajax({
			type:'get',
			url:'delete',
			data:{id:id},
			success:function(resp){
				$("#error-box").html("<span class='alert-info' role='alert'><i class='fas fa-check-circle'></i> entry deleted</span>");
				$("#row"+id).remove();
			}, 
			error:function(resp){
				$("#error-box").html("<span class='alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> can't delete</span>");
			}
		});
	}
}

@endsection
