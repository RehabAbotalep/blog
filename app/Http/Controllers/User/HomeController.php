<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Category;
use App\Models\User\Post;
use App\Models\User\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
    	//dd($posts);
    	return view('user.blog',compact('posts'));
    }
    /*
    	Get Posts according to Specific Category
     */

    public function category( Category $category){

    	$posts = $category->posts();

    	return view('user.blog',compact('posts'));

    }

    /*
    	Get Posts according to Specific Tag
     */
    
    public function tag(Tag $tag){

    	$posts = $tag->posts();

    	return view('user.blog',compact('posts'));
    }

   
}
