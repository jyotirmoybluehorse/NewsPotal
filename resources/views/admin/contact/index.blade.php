@extends('admin.layout.app')
@section('title')
    Admin | Contact Message
@endsection
@section('body-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Contact Message</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Contact Message</li>
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
                  <th style="width: 17%">
                      Sl No.
                  </th>
                  <th style="width: 17%">
                      Name
                  </th>
                  <th style="width: 17%">
                    Email
                  </th>
                  <th style="width: 17%">
                    Phone Number
                  </th>
                  <th style="width: 17%">
                    Comment
                  </th>
                  <th style="width: 17%">
                    Action
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
                      {{$item->name}}
                  </td>
                  <td>
                    {{$item->email}}
                  </td>
                  <td>
                    {{$item->phone}}
                  </td>
                  <td>
                    {{$item->comment}}
                  </td>
                  <td class="project-actions text-right">
                      <a onclick="onClickDelete(event)" class="btn btn-danger btn-sm" href="{{route('admin.contact-message.delete',$item->id)}}">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                      </a>
                  </td>
              </tr>
              @endforeach
              @else
            <tr>
                <td colspan="8">
                    <div class="alert alert-danger" role="alert">
                        No Message Exist on system
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
