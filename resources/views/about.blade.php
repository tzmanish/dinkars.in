@extends('layouts/public') 
@section('title', 'About') 
@section('body')


<div class="row" id="full-height">
	<div class="col-lg-4 scrollbar-black bg-yellow" id="leftpane">
		<br>
		@foreach($admins as $admin)
			<div class="col-md-10 offset-md-1">
				<div class="card-container">
					<div class="card" style="max-width: 20rem;">

						<div class="front">
							<div class="cover">
								<img src="{{ asset($admin->image) }}" />
							</div>
							<div class="user">
								<img class="img-circle" src="{{ asset($admin->image) }}" />
							</div>
							<div class="content">
								<div class="main">
									<h3 class="name" style="font-size: 24px; font-weight:400;">{{$admin->name}}</h3>
									<p class="profession">{{$admin->qualification}}</p>
									<h5>{{$admin->role}}</h5>
								</div>
							</div>
						</div>

						<div class="back">
							<div class="header">
								<h5 class="motto">{{$admin->name}}</h5>
							</div>
							<div class="content">
								<div class="main row scrollbar-black">
									<p class="text-center">{{$admin->description}}</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		@endforeach

	</div>
	<div class="col-lg-8 row scrollbar-black" id="memberspane" style="padding:20px;">
		<div class="col-12" style="padding:20px;">
			<h2>OUR TEAM</h2>
			<hr>
		</div>
		@foreach ($team as $member)
		<div class="col-md-4 col-sm-6">
			<div class="card-container">
				<div class="card" style="max-width: 16rem;">

					<div class="front">
						<div class="cover">
							<img src="
									@if (file_exists(public_path($member->image)))
										{{ asset($member->image) }}
									@else 
										{{ asset('images/nomedia/nomedia.png') }} 
									@endif
									" />
						</div>
						<div class="user">
							<img class="img-circle" src="
									@if (file_exists(public_path($member->image)))
										{{ asset($member->image) }}
									@else 
										{{ asset('images/nomedia/nomedia.png') }} 
									@endif
									" />
						</div>
						<div class="content">
							<div class="main">
								<h3 class="name">{{$member->name}}</h3>
								<p class="profession">{{$member->qualification}}</p>
								<h5>{{$member->role}}</h5>
							</div>
						</div>
					</div>

					<div class="back">
						<div class="header">
							<h5 class="motto">{{$member->name}}</h5>
						</div>
						<div class="content">
							<div class="main row scrollbar-black">
								<p class="text-center">{{$member->description}}</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>
@endsection