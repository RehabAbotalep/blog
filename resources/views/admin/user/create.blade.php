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
            <h3 class="box-title">User</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @include('includes.error')
          <form role="form" action="{{ route('user.store') }}" method="post">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-sm-offset-3 col-sm-7">
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" class="form-control{{$errors->has('name')?' has-error':''}}" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                  <label for="name">Email</label>
                  <input type="email" class="form-control{{$errors->has('name')?' has-error':''}}" id="email" name="email" placeholder="email" value="{{old('email')}}">
                </div>

                <div class="form-group">
                  <label for="name">Phone</label>
                  <input type="text" class="form-control{{$errors->has('phone')?' has-error':''}}" id="phone" name="phone" placeholder="phone" value="{{old('phone')}}">
                </div>

                <div class="form-group">
                  <label for="name">Password</label>
                  <input type="password" class="form-control{{$errors->has('name')?' has-error':''}}" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                </div>

                <div class="form-group">
                  <label for="name">Confirm Password</label>
                  <input type="password" class="form-control{{$errors->has('password_confirmation')?' has-error':''}}" id="password_confirmation" name="password_confirmation" placeholder="password_confirmation" value="{{old('password_confirmation')}}">
                </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="status" @if(old('status') ==1)
                        checked
                      @endif
                      >Active</label>
                  </div>
                </div>

                <div class="form-group">
                  <label for="name">Assign Role</label>
                  <div class="row">
                    @foreach($roles as $role)
                    
                    <div class="checkbox" style="display: inline;">
                      <label><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}}</label>
                    </div>
                    
                    @endforeach
                  </div>
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('user.index')}}">Back</a>
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