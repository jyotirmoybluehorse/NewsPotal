@extends('admin.layout.app')
@section('title')
    Admin | Social Video Edit
@endsection
@section('body-content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Social Video</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Edit Social Video</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@include('admin.layout.alert')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Social Video</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  action="{{route('admin.social-video.edit',$item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Video</label>
                  <input type="file" class="form-control" name="video">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Caption</label>
                  <input type="text" class="form-control" placeholder="Please Enter Caption" name="caption" value="{{ $item->caption }}">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <input type="date" class="form-control" placeholder="Please Enter News Date" name="date" value="{{ $item->date }}">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('admin.social-video.view')}}" class="btn btn-primary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@stop
