@extends('admin.layout.app')
@section('title')
    Admin | News Edit
@endsection
@section('body-content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit News</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Edit News</li>
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
            <h3 class="card-title">Edit News</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  action="{{route('admin.news.edit',$item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Title *</label>
                <input type="text" class="form-control" placeholder="Please Enter News Title" name="name" value="{{ $item->name }}" required>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category *</label>
                  <select  class="form-control" name="ref_category" required>
                    <option value="" selected="selected" disabled="disabled">-- select one --</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($item->ref_category == $category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                  </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Top Feature*</label>
                  <select  class="form-control" name="feature" required>
                    <option value="" selected="selected" disabled="disabled">-- select one --</option>
                    <option value="1" @if($item->feature == 1) selected @endif>Yes</option>
                    <option value="0" @if($item->feature == 0) selected @endif>No</option>
                  </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Top Bar*</label>
                  <select  class="form-control" name="top" required>
                    <option value="" selected="selected" disabled="disabled">-- select one --</option>
                    <option value="1" @if($item->top == 1) selected @endif>Yes</option>
                    <option value="0" @if($item->top == 0) selected @endif>No</option>
                  </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control" name="photo">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image Caption</label>
                  <input type="text" class="form-control" placeholder="Please Enter News Image Caption" name="image_caption" value="{{ $item->image_caption }}">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <input type="date" class="form-control" placeholder="Please Enter News Date" name="date" value="{{ $item->date }}">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Autor</label>
                  <input type="text" class="form-control" placeholder="Please Enter News Autor Name" name="autor" value="{{ $item->autor }}">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <div id="editor_1">{!! $item->description !!}</div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('admin.news.view')}}" class="btn btn-primary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>
<script>
    function ready(){
        let editor_1 = false;
        let $_myForm = $('form');
        let $input_for_name = $("<input type='hidden' name='description' value=''/>");
        $_myForm.append($input_for_name);
        function setFroalaEditor(editor_id, $input){
            let editor = null;
            let $_formInput = $input;
            let syncContent = () => {
                let data = editor.html.get();
                let replace_with = '<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>';
                data = data.replace(replace_with, '');
                $_formInput.val(data);
            };
            editor = new FroalaEditor('#'+editor_id, {}, syncContent);

            setInterval(syncContent, 800);
        }
        setFroalaEditor('editor_1', $input_for_name);
    }
    ready();
</script>
@stop
