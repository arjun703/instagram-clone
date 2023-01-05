<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index($user){

        $follows = (auth()->user()) ? auth()->user()->following->contains($user):false;

    	$user = User::findOrFail($user);
        
    	return view('profiles.profile', [
                        'user'    =>   $user, 
                        'follows' =>   $follows
               ]
        );
    }

    public function updateForm(){

    	return view('profiles/edit', ['user'=>auth()->user()]);
    }

    public function update(){

    	$data = request()->validate([
    		'title'=>'required',
    		'description'=>'',
    		'url'=>'url',
    		'image'=>'image',
    	]);


    	if(request('image')){
    		$imagePath = request('image')->store('profile', 'public');
    		$data = array_merge($data,['image'=>$imagePath,]);
    	}

    	auth()->user()->profile->update($data);

    	return redirect('/profile/' . auth()->user()->id);
    }
}
