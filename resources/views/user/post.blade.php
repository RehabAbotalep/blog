@extends('user/app')
@section('bg-image',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('sub-heading',$post->subtitle)
<div id="fb-root"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3&appId=413450972575113&autoLogAppEvents=1">
</script>
@section('main-content')
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <small>Created At: {{$post->created_at->diffForHumans()}}
        </small>
        
        @foreach($post->Categories as $category)
        <a href="{{ route('category',$category->slug) }}"><small style="float: right; margin-right: 20px;">
          
          {{$category->name}}
        </small></a>
        @endforeach
        
        
        
        {!! htmlspecialchars_decode($post->body) !!}
        {{--Tags--}}
        <h3>Tags Cloud</h3>
        @foreach($post->tags as $tag)
        <a href="{{ route('tag',$tag->slug) }}"><small style="float: left; margin-right: 20px;
          border: 1px solid gray;border-radius: 5px;padding: 5px;">
          
          {{$tag->name}}
        </small></a>
        @endforeach
      </div>
      <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="10"></div>
    </div>
  </article>
  <hr>
  @endsection