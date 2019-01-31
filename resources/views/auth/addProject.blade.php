@extends('layouts.app')
@section('title', "Add Project")
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
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
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Add Project') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ url('admin/project/add') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label for="name" class="col-lg-4 col-form-label text-lg-right">{{ __('Name') }}</label>

							<div class="col-lg-6">
								<input id="name" type="text" class="form-control" name="name" required autofocus>
							</div>
						</div>

						<div class="form-group row">
							<label for="client" class="col-lg-4 col-form-label text-lg-right">{{ __('Client') }}</label>

							<div class="col-lg-6">
								<input id="client" type="text" class="form-control" name="client">
							</div>
						</div>

						<div class="form-group row">
							<label for="area" class="col-lg-4 col-form-label text-lg-right">{{ __('area') }}</label>

							<div class="col-lg-6 input-group">
								<input id="area" type="number" class="form-control" name="area">
								<div class="input-group-append">
									<span class="input-group-text">sqm</span>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label for="cost" class="col-lg-4 col-form-label text-lg-right">{{ __('cost') }}</label>

							<div class="col-lg-6 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">&#8377;</span>
								</div>
								<input id="cost" type="number" class="form-control" name="cost">
							</div>
						</div>

						<div class="form-group row">
							<label for="location" class="col-lg-4 col-form-label text-lg-right">{{ __('Location') }}</label>
							<div class="col-lg-6 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="gmap">https://example.com/users/</span>
								</div>
								<input type="text" class="form-control" id="location" aria-describedby="gmap" name="location">
							</div>
						</div>

						<div class="form-group row">
							<label for="cover" class="col-lg-4 col-form-label text-lg-right">{{ __('Cover Image') }}</label>

							<div class="col-lg-6">
								<input type="file" name="cover" id="cover" class="form-control-file" onchange="imagesPreview(this, 'div#cover-preview')" accept=".jpg,.jpeg,.png">
							</div>
							<div class="col-lg-6 offset-lg-4" id="cover-preview"></div>
						</div>

						<div class="form-group row">
							<label for="gallery-upload" class="col-lg-4 col-form-label text-lg-right">{{ __('Project Images') }}</label>
				
							<div class="col-lg-6">
								<input id="gallery-upload" type="file" class="form-control-file" name="gallery-upload[]" multiple onchange="imagesPreview(this, 'div#multi-gallery')" accept=".jpg,.jpeg,.png">
							</div>
							<div class="col-lg-8 offset-lg-2" id="multi-gallery"></div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-lg-4 col-form-label text-lg-right">{{ __('Description') }}</label>

							<div class="col-lg-6">
								<textarea id="description" class="form-control" name="description"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label for="type" class="col-lg-4 col-form-label text-lg-right">{{ __('Select Tags:') }}</label>
							<div class="col-lg-6" id="typeList">

								@foreach ($types as $type)
										<label id="typeOption"><input type="checkbox" name="type[]" value="{{$type->id}}">{{$type->name}}</label>
								@endforeach
							
							</div>
							<label for="addTag" class="col-lg-4 col-form-label text-lg-right">{{ __('Add More Tags') }}</label>
							<div class="col-lg-6 input-group">
								<input id="addTag" type="text" class="form-control">
								<button class="input-group-append" id="submitTag">add tag</button>
							</div>
							<div  class="col-lg-6 offset-lg-4" id="current_status"></div>
						</div>
						
						<div class="form-group row mb-0">
							<div class="col-lg-6 offset-lg-4">
								<button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br><br><br>
@endsection
 
@section('js') 


// Multiple images preview

function imagesPreview(input, target) {
  $(target).empty();
  if (input.files) {
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();
      reader.onload = function(event) {
        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(target);
      }
      reader.readAsDataURL(input.files[i]);
    }
  }
};
		

//add tag

		$("#submitTag").click(function(event){
			event.preventDefault();
			var tag = $("#addTag").val();
			if(!tag){
				$("#current_status").html("<font color=#ffc107><i class='fas fa-exclamation-circle'></i> empty</font>");
				return;
			}
			$.ajax({
				type:'get',
				url:'type/add',
				data:{type:tag},
				success:function(resp){
					$("#current_status").html("<font color=#28a745><i class='fas fa-check-circle'></i> tag added</font>");
					$('#typeList').append('<label id="typeOption"><input type="checkbox" name="type[]" value="'+resp+'" checked>'+tag+'</label>');
				}, 
				error:function(resp){
					$("#current_status").html("<font color=#ffc107><i class='fas fa-exclamation-circle'></i> tag already axist</font>");
				}
			});
		});

@endsection