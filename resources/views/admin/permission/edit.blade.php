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
            <h3 class="box-title">Permission</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @include('includes.error')
          <form role="form" action="{{ route('permission.update',$permission->id) }}" method="post">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="box-body">
              <div class="col-sm-offset-3 col-sm-7">
                <div class="form-group">
                  <label for="name">Permission</label>
                  <input type="text" class="form-control{{$errors->has('name')?' has-error':''}}" id="name" name="name"  value="{{$permission->name}}">
                </div>

                <div class="form-group">
                  <label for="name">For</label>
                  <select name="for" class="form-control">
                    <option selected disabled>Select Permission for</option>
                    <option value="user">User</option>
                    <option value="post">Post</option>
                    <option value="others">Others</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('permission.index')}}">Back</a>
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