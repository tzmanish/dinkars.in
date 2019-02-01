@extends('layouts.app')
@section('title', "Edit Projects")
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
		<div class="col-md-10">
			<div class="table-responsive">
				<table class="table table-borderless table-striped table-hover">
						<caption class="bg-warning">&nbsp; {{$count}} projects</caption>
					<thead class="thead-dark">
						<tr>
						<th scope="col">Name</th>
						<th scope="col">Client</th>
						<th scope="col">Actions</th>
						<th scope="col">Thumbnail</th>
						</tr>
					</thead>
					<tbody>
						@foreach($projects as $project)
							<tr id="row{{$project->id}}">
								<td>{{$project->name}}</td>
								<td>{{$project->client}}</td>
								<td>
								<a href="edit/{{$project->id}}" class="btn btn-primary">edit</a>
								<button  class="btn btn-danger" onclick="deleteProject({{$project->id}})">delete</button>
								</td>
								<td><img class="img-thumbnail" width="100px" src="{{asset($project->cover)}}"></td>
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

function deleteProject(id){
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
