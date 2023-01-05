@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-6">
				<img class="w-100 h-100 object-fit-cover" src="/storage/{{$post->image}}">
			</div>
			<div class="col-6">
				<div class="d-flex align-items-center">
					<div>
						<a href="/profile/{{$post->user->id}}">
							<img src="/storage/{{$post->user->profile->image}}"
							style="width: 50px;height:50px; object-fit: cover;border-radius: 50%;" 
						>
						</a>

					</div>
					<div>
						<strong style="padding-left: 10px">
							{{$post->user->username}}
						</strong>
					</div>

				</div>
				<hr>
				<div>
					{{$post->caption}}
				</div>
			</div>
		</div>
	</div>
@endsection