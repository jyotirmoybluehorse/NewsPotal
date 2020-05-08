@extends('admin.layout.app')
@section('title')
    Admin | Content Edit
@endsection
@section('body-content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Content Edit</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Content Edit</li>
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
            <h3 class="card-title">Edit Content</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  action="{{route('admin.contents.edit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Site Logo</label>
                <input type="file" class="form-control" name="logo">
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Address *</label>
                  <input type="text" class="form-control" name="address" value="{{(isset($item)&&$item->address)? $item->address: ''}}" placeholder="Please Enter Address" required>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Mail Address *</label>
                  <input type="email" class="form-control" name="email" value="{{(isset($item)&&$item->email)? $item->email: ''}}" placeholder="Please Enter Mail Address" required>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Facebook Link</label>
                  <input type="text" class="form-control" name="facebook" value="{{(isset($item)&&$item->facebook)? $item->facebook: ''}}" placeholder="Please Enter Facebook Address">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Twitter Link</label>
                  <input type="text" class="form-control" name="twiter" value="{{(isset($item)&&$item->twiter)? $item->twiter: ''}}" placeholder="Please Enter Twitter Address">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Google Link</label>
                  <input type="text" class="form-control" name="google" value="{{(isset($item)&&$item->google)? $item->google: ''}}" placeholder="Please Enter Google Address">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Linkedin Link</label>
                <input type="text" class="form-control" name="linkdin" value="{{(isset($item)&&$item->linkdin)? $item->linkdin: ''}}" placeholder="Please Enter Linkedin Address">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">About Us *</label>
                  <div id="editor_1">{!! (isset($item)&&$item->about)? $item->about: '' !!}</div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Footer About *</label>
                  <div id="editor_2">{!! (isset($item)&&$item->footer_about)? $item->footer_about: '' !!}</div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
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
        let editor_2 = false;
        let $_myForm = $('form');
        let $input_for_name = $("<input type='hidden' name='about' value=''/>");
        let $input_for_footer = $("<input type='hidden' name='footer_about' value=''/>");
        $_myForm.append($input_for_name);
        $_myForm.append($input_for_footer);
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
        setFroalaEditor('editor_2', $input_for_footer);
    }
    ready();
</script>
@stop
