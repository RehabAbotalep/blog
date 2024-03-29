@extends('user/app')
@section('bg-image',asset('user/img/home-bg.jpg'))
@section('title','Blog')
@section('sub-heading','Learn Together and Grow Together')
@section('main-content')
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
      <div class="post-preview">
        <a href="{{route('post',$post->slug)}}">
          <h2 class="post-title">
          {{$post->title}}
          </h2>
          <h3 class="post-subtitle">
          {{$post->subtitle}}
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Start Bootstrap</a>
        {{$post->created_at->diffForHumans()}}</p>
      </div>
      <hr>
      @endforeach
      <!-- Pager -->
      <div style="margin-left: 200px;">
        {{ $posts->links()}}
      </div>
      
      <div class="clearfix">
        
            
          
      </div>
    </div>
  </div>
</div>
<hr>
@endsection