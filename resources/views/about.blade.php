@extends('layouts/public') 
@section('title', 'About') 
@section('body')


<div class="row" id="full-height">
	<div class="col-lg-4 scrollbar-black" id="leftpane">
		<br>
		<div class="col-md-10 offset-md-1">
			<div class="card-container">
				<div class="card" style="max-width: 18rem;">

					<div class="front">
						<div class="cover">
							<img src="{{ asset('images/nomedia/nomedia.png') }}" />
						</div>
						<div class="user">
							<img class="img-circle" src="{{ asset('images/nomedia/nomedia.png') }}" />
						</div>
						<div class="content">
							<div class="main">
								<h3 class="name" style="font-size: 24px; font-weight:400;">Rohit Dinkar</h3>
								<p class="profession">B. Arch. IIT Roorkee</p>
								<h5>Director</h5>
							</div>
						</div>
					</div>

					<div class="back">
						<div class="header">
							<h5 class="motto">Rohit Dinkar</h5>
						</div>
						<div class="content">
							<div class="main row scrollbar-black">
								<p class="text-center">" Minima ex sit totam natus saepe fugit quia tempora laboriosam. Qui ut quis. Voluptatem excepturi sapiente dolorum aspernatur molestiae doloremque id omnis. Libero eaque cupiditate est molestiae reprehenderit sed autem dolor. "</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-10 offset-md-1">
			<div class="card-container">
				<div class="card" style="max-width: 18rem;">

					<div class="front">
						<div class="cover">
							<img src="{{ asset('images/nomedia/nomedia.png') }}" />
						</div>
						<div class="user">
							<img class="img-circle" src="{{ asset('images/nomedia/nomedia.png') }}" />
						</div>
						<div class="content">
							<div class="main">
								<h3 class="name" style="font-size: 24px; font-weight:400;">Shobhit Dinkar</h3>
								<p class="profession">B. Tech. Mechanical Engg.</p>
								<h5>Co-director</h5>
							</div>
						</div>
					</div>

					<div class="back">
						<div class="header">
							<h5 class="motto">Shobhit Dinkar</h5>
						</div>
						<div class="content">
							<div class="main row scrollbar-black">
								<p class="text-center">" Omnis occaecati autem sunt quibusdam. Culpa quas quo fugit aut voluptatem sit rerum tempora distinctio. Qui iusto maiores dolor quibusdam in amet eaque sunt est. Minima ex sit totam natus saepe fugit quia tempora laboriosam. Qui ut quis. Voluptatem excepturi sapiente dolorum aspernatur molestiae doloremque id omnis. Libero eaque cupiditate est molestiae reprehenderit sed autem dolor. "</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
	<div class="col-lg-8 row scrollbar-black" id="memberspane">
		<div class="col-12">
			<br><br>
			<h1>TEAM</h1>
			<hr><br>
		</div>
		@foreach ($team as $member)
		<div class="col-md-4 col-sm-6">
			<div class="card-container">
				<div class="card">

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
								<p class="profession">{{$member->role}}</p>
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