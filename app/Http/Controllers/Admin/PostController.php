<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Category;
use App\Models\User\Post;
use App\Models\User\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{   

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.post',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'    =>'required',
            'subtitle' => 'required',
            'body'     => 'required',
            'image'     => 'required'
        ]);
       $imageName = $request->image->store('public');
       $post = new Post;
       $post->title = $request->title;
       $post->subtitle = $request->subtitle;
       $post->image = $imageName;
       $post->body = $request->body;
       $post->slug = $request->slug;
       if($request->status){
        $post->status = $request->status;
       }
       
       $post->save();
       $post->tags()->sync($request->tags);
       $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $tags = Tag::all();

        $categories = Category::all();

        $post = Post::with('tags','categories')->findOrFail($id);
       // dd($post);

        return view('Admin.post.edit',compact('post','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $this->validate($request,[
            'title'    =>'required',
            'subtitle' => 'required',
            'body'     => 'required',
            
        ]);

        if($request->hasFile('image')){
            $imageName = $request->image->store('public');
            $post->image =  $imageName;
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->slug = $request->slug;
        if( $request->status ){
         $post->status = $request->status;   
        }
        else{
           $post->status = 0; 
        }
        //dd($request->all());
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //return $id;
        $post = Post::findOrFail($id)->delete();
        return back();
    }
}
