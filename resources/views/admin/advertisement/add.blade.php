@extends('admin.layout.app')
@section('title')
    Admin | Advertisement Add
@endsection
@section('body-content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Advertisement</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Add Advertisement</li>
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
            <h3 class="card-title">Add Advertisement</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  action="{{route('admin.advertisement.add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image *</label>
                  <input type="file" class="form-control" name="photo" required>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category *</label>
                  <select  class="form-control" name="category" required>
                    <option value="" selected="selected" disabled="disabled">-- select one --</option>
                    <option value="TOPBAR">TOP BAR</option>
                    <option value="PAID">PAID</option>
                    <option value="UNPAID">UNPAID</option>
                  </select>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('admin.advertisement.view')}}" class="btn btn-primary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@stop
