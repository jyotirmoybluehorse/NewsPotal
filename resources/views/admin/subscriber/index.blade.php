@extends('admin.layout.app')
@section('title')
    Admin | Subcriber List
@endsection
@section('body-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Subcriber List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Subcriber List</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@include('admin.layout.alert')
<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
        <div class="card-tools">
        {{-- <a href="{{route('admin.category.add')}}" class="btn btn-primary">Add Category</a> --}}
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 50%">
                      Sl No.
                  </th>
                  <th style="width: 50%">
                      Email Address
                  </th>
              </tr>
          </thead>
          <tbody>
            @if($items->isNotEmpty())
            @php($count = 0)
            @foreach($items as $item)
            @php($count++)
              <tr>
                  <td>
                      {{$count}}
                  </td>
                  <td>
                      {{$item->email}}
                  </td>
              </tr>
              @endforeach
              @else
            <tr>
                <td colspan="8">
                    <div class="alert alert-danger" role="alert">
                        No Subscriber Exist on system
                    </div>
                </td>
            </tr>
            @endif
          </tbody>
      </table>
    </div>
  </div>
{{ $items->links() }}
</section>
<!-- /.content -->
@stop
