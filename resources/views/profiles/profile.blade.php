@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-3">
            <img 
            class="rounded-circle"
            width="100px"
            height="100px" 
            src="/storage/{{$user->profile->image}}">



        </div>
        <div class="col-9">
            <div class="d-flex align justify-content-between align-items-baseline">

                <div class="d-flex align-items-center">
                    <h3>{{$user->username}}</h3>
                    @cannot('update', $user->profile) 
                        <follow-button user-id="{{$user->id}}"
                                       follows="{{$follows}}"></follow-button>
                    @endcannot
                </div>


                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
                

                @can('update', $user->profile)
                    <a href="/profile/update">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pe-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pe-3"><strong>{{$user->profile->followers()->count()}}</strong> followers</div>
                <div class="pe-3"><strong>{{$user->following()->count()}}</strong> following</div>
            </div>
            <div>
                <strong>{{$user->profile->title}}</strong>
            </div>
            <div>
                {{$user->profile->description}}
            </div>
            <div>
                <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 mt-3">
                <a href="/p/{{$post->id}}">
                    <img class="w-100 h-100 object-fit-cover" src="/storage/{{$post->image}}">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
