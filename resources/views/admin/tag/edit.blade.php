@extends('admin.app')
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
            <h3 class="box-title">Tag</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @include('includes.error')
          <form role="form" action="{{ route('tag.update',$tag->id) }}" method="post">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="box-body">
              <div class="col-sm-offset-3 col-sm-7">
                <div class="form-group">
                  <label for="name">Tag Title</label>
                  <input type="text" class="form-control{{$errors->has('name')?' has-error':''}}" id="name" name="name" placeholder="Tag Title" value="{{$tag->name}}">
                </div>
                
                <div class="form-group">
                  <label for="slug">Tag Slug</label>
                  <input type="text" class="form-control{{$errors->has('slug')?' has-error':''}}" id="slug" name="slug" placeholder="Slug" value="{{$tag->slug}}">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('tag.index')}}">Back</a>
                </div>
              </form>
            </div>
          </div>
          
        </div>
        <!-- /.box-body -->
        
      </div>
      
      
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection