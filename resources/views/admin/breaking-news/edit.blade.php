@extends('admin.layout.app')
@section('title')
    Admin | Breaking News Edit
@endsection
@section('body-content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Breaking News</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Edit Breaking News</li>
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
            <h3 class="card-title">Edit Breaking News</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  action="{{route('admin.breaking-news.edit',$item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Title *</label>
                <input type="text" class="form-control" placeholder="Please Enter News Title" name="name" value="{{ $item->name }}" required>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Time</label>
                  <input type="time" class="form-control" placeholder="Please Enter News Date" name="time" value="{{ $item->time }}">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('admin.breaking-news.view')}}" class="btn btn-primary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@stop
