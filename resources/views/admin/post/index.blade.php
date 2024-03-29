@extends('admin.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Blank page
    <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Posts</h3>
        <a class="col-sm-offset-5 btn btn-success" href="{{route('post.create')}}">Add New Post</a>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Post Title</th>
                  <th>Post Subtitle</th>
                  <th>Post Slug</th>
                  <th>Created-at</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->subtitle}}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{  date("d M Y", strtotime($post->created_at)) }}</td>
                  <td>
                    @if($post->status ==1)
                    Published
                    @else
                    Not Published
                  @endif</td>
                  <td><a href="{{route('post.edit',$post->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                  <form id='delete-form-{{$post->id}}' method="post" action="{{route('post.destroy',$post->id)}}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  </form>
                  <td><a href="#"
                    onclick="if(confirm('Are You sure, You want to delete this')){
                    event.preventDefault;
                    document.getElementById('delete-form-{{$post->id}}').submit();
                    }else{
                    event.preventDefault;
                    }">
                    <span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Post Title</th>
                  <th>Post Subtitle</th>
                  <th>Post Slug</th>
                  <th>Created-at</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section('script')
  <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script>
  $(function () {
  $('#example1').DataTable()
  $('#example2').DataTable({
  'paging'      : true,
  'lengthChange': false,
  'searching'   : false,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : false
  })
  })
  </script>
  @endsection