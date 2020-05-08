@extends('admin.layout.app')
@section('title')
    Admin | News
@endsection
@section('body-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>News</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">News</li>
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
        <a href="{{route('admin.news.add')}}" class="btn btn-primary">Add News</a>
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
                  <th style="width: 20%">
                      Sl No.
                  </th>
                  <th style="width: 20%">
                      News Title
                  </th>
                  <th style="width: 20%">
                      Image
                  </th>
                  <th style="width: 20%">
                    News Category
                  </th>
                  <th style="width: 20%">
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
                    @if ($item->photo=="")
                        <img width="100px" height="100px" src="{{ \App\Http\Controllers\ExtraController::assetURL('assetes/no_image.jpeg')}}" class="img-responsive"/>
                    @else
                        <img width="100px" height="100px" src="{{ \App\Http\Controllers\ExtraController::photoURL($item->photo) }}" class="img-responsive"/>
                    @endif
                  </td>
                  <td>
                      @if($item->refCategory != null)
                        {{$item->refCategory->name}}
                      @endif
                  </td>

                  <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="{{route('admin.news.edit',$item->id)}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <a onclick="onClickDelete(event)" class="btn btn-danger btn-sm" href="{{route('admin.news.delete',$item->id)}}">
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
                        No Category Exist on system, please add new
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
