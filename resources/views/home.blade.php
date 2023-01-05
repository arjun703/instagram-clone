@extends('layouts.app')

@section('content')
<div class="container">

    @if($posts->count()==0)
        <div>
            <h1>
                Follow peoples to see their posts here
            </h1>
        </div>
    @endif

    @foreach($posts as $post)
        <div class="row">
            
            <div class="col-md-5">
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
            <div class="col-md-7">
                <img class="w-100 h-100 object-fit-cover" src="/storage/{{$post->image}}">
            </div>
        </div>
        <hr>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>

</div>
@endsection
