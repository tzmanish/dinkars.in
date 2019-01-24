@extends('layouts.app')
@section('title', 'Reset')
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/password/update') }}">
                        @csrf

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="form-group row">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">{{ __('Current Password') }}</label>

                            <div class="col-lg-6">
                                <input id="current" type="password" class="form-control" name="current" required>
                            </div>
							<div class="col-lg-2 col-form-label" id="current_status"></div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">{{ __('New Password') }}</label>

                            <div class="col-lg-6">
                                <input id="new" type="password" class="form-control{{ $errors->has('new') ? ' is-invalid' : '' }}" name="new" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirm" class="col-lg-4 col-form-label text-lg-right">{{ __('Confirm Password') }}</label>

                            <div class="col-lg-6">
                                <input id="confirm" type="password" class="form-control" name="confirm" required>
                            </div>
							<div class="col-lg-2 col-form-label" id="match_status"></div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
	$("#current").change(function(){
		var current = $("#current").val();
		$.ajax({
			type:'get',
			url:'check',
			data:{current:current},
			success:function(resp){
				if(resp=="true"){
					$("#current_status").html("<font color=#28a745>correct</font>");
					$("#current").removeClass("is-invalid")
					$("#current").addClass("is-valid")
				}
				else{
					$("#current_status").html("<font color=#dc3545>incorrect!!</font>");
					$("#current").removeClass("is-invalid")
					$("#current").addClass("is-invalid")
				}
			}, error:function(){
				alert("error while connecting with database!!");
			}
		});
	});
	$("#new").change(function(){
		var newpass = $("#new").val();
		var confirm = $("#confirm").val();
		if(newpass != confirm){
			$("#match_status").html("");
			$("#new").removeClass("is-valid")
			$("#new").removeClass("is-invalid")
			$("#confirm").removeClass("is-valid")
			$("#confirm").removeClass("is-invalid")
		}
		else{
			$("#match_status").html("<font color=#28a745>match</font>");
			$("#new").removeClass("is-invalid")
			$("#new").addClass("is-valid")
			$("#confirm").removeClass("is-invalid")
			$("#confirm").addClass("is-valid")
		}
	});
	$("#confirm").change(function(){
		var newpass = $("#new").val();
		var confirm = $("#confirm").val();
		if(newpass != confirm){
			$("#match_status").html("<font color=#dc3545>do not match!!</font>");
			$("#new").removeClass("is-valid")
			$("#new").addClass("is-invalid")
			$("#confirm").removeClass("is-valid")
			$("#confirm").addClass("is-invalid")
		}
		else{
			$("#match_status").html("<font color=#28a745>match</font>");
			$("#new").removeClass("is-invalid")
			$("#new").addClass("is-valid")
			$("#confirm").removeClass("is-invalid")
			$("#confirm").addClass("is-valid")
		}
	});
@endsection
