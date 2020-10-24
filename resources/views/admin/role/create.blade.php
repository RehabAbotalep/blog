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
            <h3 class="box-title">Role</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @include('includes.error')
          <form role="form" action="{{ route('role.store') }}" method="post">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-sm-offset-3 col-sm-7">
                <div class="form-group">
                  <label for="name">Role Name</label>
                  <input type="text" class="form-control{{$errors->has('name')?' has-error':''}}" id="name" name="name" placeholder="Role" value="{{old('name')}}">
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <label>Post Permission</label>
                    @foreach($permissions as $permission)
                      @if($permission->for == 'post')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                      @endif
                    @endforeach
                  </div>
                  
                  <div class="col-sm-4">
                    <label>User Permission</label>
                     @foreach($permissions as $permission)
                      @if($permission->for == 'user')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                      @endif
                    @endforeach
                  </div>
                  <div class="col-sm-4">
                    <label>Others Permission</label>
                     @foreach($permissions as $permission)
                      @if($permission->for == 'others')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                      @endif
                    @endforeach
                  </div>
                  
                  
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('role.index')}}">Back</a>
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