<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;


class PostController extends Controller
{
    //

    public function index(){

        $posts = Post::whereIn('user_id', auth()->user()->following()->pluck('profiles.user_id'))->orderBy('created_at', 'DESC')->paginate(5);

        return View('home', compact('posts'));
    }

    public function create(){
    	return view('posts/create');
    }

    public function store(){
    	$data = request()->validate([
    		'caption'=>'required',
    		'image'=>['required', 'image'],
    	]);

    	$imagePath = request('image')->store('uploads', 'public');

    	auth()->user()->posts()->create([
    		'caption'=>$data['caption'],
    		'image'=>$imagePath,
    	]);

    	return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post){
    	//dd($post);
    	return view('posts/show', compact('post'));
    }
}
