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

		<div class="dropdown">
				<button class="btn btn-primary	 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{$currentType}}
				</button>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item @if($currentType=='all') active disabled @endif" href="/admin/project/show">all ({{$allCount}})</a>
					@foreach ($types as $type)
						<a class="dropdown-item @if($currentType==$type->name) active disabled @endif" href="/admin/project/show/{{$type->id}}" id="type{{$type->id}}">{{$type->name}} ({{$type->projects->count()}})<i class="fas fa-trash-alt" id="delete-btn" onclick="deleteType(event, {{$type->id}})"></i></a>
					@endforeach
				</div>
				<a class="btn btn-secondary" href="/admin/project/add" role="button">+</a>
			</div>
		<div class="col-md-10">
			<div class="table-responsive">
				<table class="table table-borderless table-striped table-hover">
						<caption class="bg-secondary text-white">&nbsp; {{$projects->count()}} projects</caption>
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
								<a href="/admin/project/edit/{{$project->id}}" class="btn btn-primary">edit</a>
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
			url:'/admin/project/delete',
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

function deleteType(event, id){
	event.preventDefault();
	if(confirm("Are You Sure?")){
		$.ajax({
			type:'get',
			url:'/admin/project/type/delete',
			data:{id:id},
			success:function(resp){
				$("#error-box").html("<span class='alert-info' role='alert'><i class='fas fa-check-circle'></i> type deleted</span>");
				$("#type"+id).remove();
			}, 
			error:function(resp){
				$("#error-box").html("<span class='alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> can't delete</span>");
			}
		}); 
	}
}

@endsection
