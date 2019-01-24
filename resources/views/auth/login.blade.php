@extends('layouts.app')
@section('title', "Login")
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
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
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
