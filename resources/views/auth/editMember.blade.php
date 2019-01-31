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
                <div class="card-header">{{ $member->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/member/update') }}" enctype="multipart/form-data">
                        @csrf
						<input type="hidden" id="memberId" name="id" value="{{$member->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-lg-4 col-form-label text-lg-right">{{ __('Name') }}</label>

                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" value="{{$member->name}}" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-lg-4 col-form-label text-lg-right">{{ __('Role') }}</label>

                            <div class="col-lg-6">
                                <input id="role" type="text" value="{{$member->role}}" class="form-control" name="role" required>
                            </div>
                        </div>
												
						<div class="form-group row">
							<label for="image" class="col-lg-4 col-form-label text-lg-right">{{ __('Profile Picture') }}</label>
							
							<div class="col-lg-6">
							<input type="file" name="image" id="image" class="form-control-file" onchange="imagesPreview(this, 'div#dp-preview')" accept=".jpg,.jpeg,.png">
							</div>
							
							<div class="col-lg-6 offset-lg-4" id="dp-preview">
							<img src="{{asset($member->image)}}" alt="">
							</div>
						</div>

                        <div class="form-group row">
                            <label for="description" class="col-lg-4 col-form-label text-lg-right">{{ __('Description') }}</label>

                            <div class="col-lg-6">
                                <textarea id="description" value="{{$member->description}}" class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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

	
@endsection
