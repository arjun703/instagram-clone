@extends('layouts.app')

@section('content')

<div class="container">
	<form action="/p" enctype="multipart/form-data" method="POST">
		@csrf
		<div class="row">
			<label for="caption" class="col-md-4 col-form-label text-md-end">{{ __('Caption')}}</label>

			<div class="col-md-6">
		        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

		        @error('caption')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
		        @enderror
			 </div>
		</div>

		<div class="row mt-3">
			<label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Photo')}}</label>

			<div class="col-md-6">
		        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required>

		        @error('image')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
		        @enderror
			 </div>
		</div>

		<div class="row mt-3">
			<button class="btn btn-primary ">
				Upload Post
			</button>
		</div>
	</form>
</div>
@endsection