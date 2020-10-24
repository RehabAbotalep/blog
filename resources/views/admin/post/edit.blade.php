@extends('admin.app')
@section('style')
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Text Editors
    <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Posts</h3>
          </div>
          @include('includes.error')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control{{$errors->has('title')?' has-error':''}}" id="title" name="title" placeholder="Title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control{{$errors->has('subtitle')?' has-error':''}}" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{$post->subtitle}}">
                </div>
                <div class="form-group">
                  <label for="subtitle">Post Slug</label>
                  <input type="text" class="form-control{{$errors->has('slug')?' has-error':''}}" id="slug" name="slug" placeholder="Slug" value="{{$post->slug}}">
                </div>
              </div>
              <div class="col-sm-6">
                <br>
                <div class="form-group">
                  <div class="pull-left">
                    <label for="image">File input</label>
                    <input type="file" id="image" name="image">
                  </div>
                  <div class="checkbox pull-right">
                    <label>
                      <input type="checkbox" name="status"
                      @if($post->status == 1) checked @endif value="1">Publish
                    </label>
                  </div>
                </div>
                <br>
                
                <div class="form-group"style="margin-top: 18px;">
                  <label>Select Tags</label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a Tag"
                    style="width: 100%;" name="tags[]">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                      @foreach($post->tags as $postTag)
                      @if($postTag->id == $tag->id)
                      selected
                      @endif
                      @endforeach
                    >{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group" style="margin-top: 18px;">
                  <label>Select Categories</label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a Category"
                    style="width: 100%;" name="categories[]">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}"
                      @foreach($post->categories as $postCategory)
                      @if($postCategory->id == $category->id)
                      selected
                      @endif
                      @endforeach
                      >
                      {{$category->name}}
                    </option>
                    @endforeach
                    
                    
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Write Post body
                <small>Simple and fast</small>
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
                  <i class="fa fa-minus"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body pad">
                
                <textarea class="form-control{{$errors->has('body')?' has-error':''}}" placeholder="Place some text here" name="body"
                style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{$post->body}}</textarea>
                
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-warning" href="{{route('post.index')}}">Back</a>
            </div>
          </form>
        </div>
      </div>
      
      
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<!-- Select2 -->
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}">
</script>
<!-- CK Editor -->
<script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}">
</script>
<script>
$(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1')
//bootstrap WYSIHTML5 - text editor
$('.textarea').wysihtml5()
})
</script>
<script>
$('document').ready(function(){
//Initialize Select2 Elements
$('.select2').select2()
});
</script>
@endsection