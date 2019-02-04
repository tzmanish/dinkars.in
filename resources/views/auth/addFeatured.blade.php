@extends('layouts.app') 
@section('title', "Add Featured") 
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div id="error-box">
				@if(Session::has('flash_message_error'))
				<span class="alert-danger" role="alert"> <i class="fas fa-exclamation-triangle"></i> {!! session('flash_message_error') !!}</span>				@endif @if(Session::has('flash_message_success'))
				<span class="alert-info" role="alert"> <i class="fas fa-check-circle"></i> {!! session('flash_message_success') !!} </span>				@endif
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Add Featured Image') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ url('admin/featured/add') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label for="image" class="col-lg-4 col-form-label text-lg-right">{{ __('Picture') }}</label>

							<div class="col-lg-6">
								<input type="file" name="image" id="image" class="form-control-file" onchange="imagesPreview(this, 'div#image-preview')" accept=".jpg,.jpeg,.png">
							</div>

							<div class="col-lg-6 offset-lg-4" id="image-preview"></div>
						</div>

						<div class="form-group row">
							<label for="title" class="col-lg-4 col-form-label text-lg-right">{{ __('Title') }}</label>

							<div class="col-lg-6">
								<input id="title" type="text" class="form-control" name="title">
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-lg-4 col-form-label text-lg-right">{{ __('Description') }}</label>

							<div class="col-lg-6">
								<textarea id="description" class="form-control" name="description"></textarea>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-lg-6 offset-lg-4">
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
	// Multiple images preview 

	function imagesPreview(input, target){ 
		$(target).empty(); 
		if(input.files){ 
			var filesAmount = input.files.length; 
			for (i = 0; i < filesAmount; i++) { 
				var reader=new FileReader(); 
				reader.onload=function(event){ 
					$($.parseHTML( '<img>')).attr( 'src', event.target.result).appendTo(target); 
				} 
				reader.readAsDataURL(input.files[i]);
			} 
		} 
	};
@endsection