@extends('admin.layout.app')
@section('title')
    Admin | Dashboard
@endsection
@section('body-content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?php
    $total_subscribers=App\Models\Subscribe::count();
    $total_news=App\Models\News::count();
?>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$total_subscribers}}</h3>
              <p>Total Subscriber</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{route('admin.subscribers.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_news}}</h3>
                <p>Total News</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper-o"></i>
              </div>
              <a href="{{route('admin.news.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div>
    </div>
  </section>
@stop
