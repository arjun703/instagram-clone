@extends('layouts.app')

@section('content')

<div class="container">
	<form action="/profile/update" enctype="multipart/form-data" method="POST">
		@csrf

		@method('PATCH')

		<div class="row">
			<label for="Title" class="col-md-4 col-form-label text-md-end">{{ __('Title')}}</label>

			<div class="col-md-6">
		        <input id="Title" type="text" class="form-control @error('Title') is-invalid @enderror" name="title" value="{{ $user->profile->title }}" required autocomplete="Title" autofocus>

		        @error('Title')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
		        @enderror
			 </div>
		</div>

		<div class="row">
			<label for="Description" class="col-md-4 col-form-label text-md-end">{{ __('Description')}}</label>

			<div class="col-md-6">
		        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $user->profile->description }}" required autocomplete="description" autofocus>

		        @error('description')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
		        @enderror
			 </div>
		</div>

		<div class="row">
			<label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Caption')}}</label>

			<div class="col-md-6">
		        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{$user->profile->url}}" required autocomplete="url" autofocus>

		        @error('url')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
		        @enderror
			 </div>
		</div>


		<div class="row">
			<label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo')}}</label>

			<div class="col-md-6">
		        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
		        @error('image')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
		        @enderror
			 </div>
		</div>

		<div class="row mt-3">
			<button class="btn btn-primary ">
				Update Profile
			</button>
		</div>
	</form>
</div>

@endsection