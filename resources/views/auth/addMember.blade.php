@extends('layouts.app')
@section('title', "Add Member")
@section('content')

<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
			<div id="error-box">
			@if(Session::has('flash_message_error'))
				<span class="alert-danger" role="alert"> <i class="fas fa-exclamation-triangle"></i> {!! session('flash_message_error') !!}</span>
			@endif
			@if(Session::has('flash_message_success'))
				<span class="alert-info" role="alert"> <i class="fas fa-check-circle"></i> {!! session('flash_message_success') !!} </span>
			@endif
			</div>
		</div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Team Member') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/member/add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-lg-4 col-form-label text-lg-right">{{ __('Name') }}</label>

                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-lg-4 col-form-label text-lg-right">{{ __('Role') }}</label>

                            <div class="col-lg-6">
                                <input id="role" type="text" placeholder="Civil Engineer/ Interior Designer etc." class="form-control" name="role" required>
                            </div>
                        </div>
												
						<div class="form-group row">
							<label for="image" class="col-lg-4 col-form-label text-lg-right">{{ __('Image') }}</label>
							
							<div class="col-lg-4">
								<input type="file" name="image" id="image" class="form-control-file" accept=".jpg,.jpeg,.png" required>
							</div>
							
							<div class="col-lg-4 col-form-label" id="preview_status"></div>
							
							<div class="col-lg-6 offset-lg-4" id="preview">
								<img id="uploadedimage" width="100%" />
							</div>
						</div>

                        <div class="form-group row">
                            <label for="description" class="col-lg-4 col-form-label text-lg-right">{{ __('Description') }}</label>

                            <div class="col-lg-6">
                                <textarea id="description" placeholder="Tell me something about you." class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-8 offset-lg-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

        $(function() {
            document.getElementById("image").onchange = function () {
				
				
				var fileName = document.getElementById("image").value;
				var idxDot = fileName.lastIndexOf(".") + 1;
				var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
				if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
					
					var reader = new FileReader();
					reader.onload = function (e) {
						if (e.total > 2000000) {
							$("#preview_status").html("<font color=#dc3545><i class='fas fa-exclamation-triangle'></i> Image too large, maximum allowed size is 2mb.</font>");
							$image = $("#image");
							$image.val("");
							$image.wrap('<form>').closest('form').get(0).reset();
							$image.unwrap();
							$('#uploadedimage').removeAttr('src');
							return;
						}
						$('#preview_status').html("<font color=#28a745><i class='fas fa-check-circle'></i></font>");
						document.getElementById("uploadedimage").src = e.target.result;
					};
					reader.readAsDataURL(this.files[0]);
				
				}
				else{
					$("#preview_status").html("<font color=#dc3545><i class='fas fa-exclamation-triangle'></i> Only jpg/jpeg and png files are allowed!</font>");
					$image = $("#image");
					$image.val("");
					$image.wrap('<form>').closest('form').get(0).reset();
					$image.unwrap();
					$('#uploadedimage').removeAttr('src');
				}
				
            };
        });
	
@endsection
