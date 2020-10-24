<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post($slug){
    	$post = Post::with('categories')->with('tags')
    	->where('slug',$slug)->first();
    	//dd($post);
    	return view('user.post',compact('post'));
    }
}
