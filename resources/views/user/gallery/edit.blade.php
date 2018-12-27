@extends('user.layouts.app')
@section('content')
<div class="panel-header panel-header-sm">
    </div>
<div class="content">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Create Your Profile</h5>
            </div>
            <div class="card-body">
                {!! Form::open([
                    'action' => ['GalleriesController@update', $gallery->id],
                    'method' =>'POST',
                    'enctype' =>'multipart/form-data'])!!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('title', 'Title')}}
                                {{-- 'name', 'value', 'attributes' --}}
                                {{Form::text('title', $gallery->title, ['class' => 'form-control', 'placeholder'=>""])}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('body', 'Body')}}
                                {{Form::textarea('body', $gallery->body, ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::file('cover_image')}}
                            </div>  
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="../assets/img//bg5.jpg" alt="..." >
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="../assets/img//mike.jpg" alt="...">
                            <h5 class="title">Mike Andrew</h5>
                        </a>
                        <p class="description">
                            michael24
                        </p>
                    </div>
                    <p class="description text-center">
                        "Lamborghini Mercy
                        <br> Your chick she so thirsty
                        <br> I'm in that two seat Lambo"
                    </p>
                </div>
                <hr>
                <div class="button-container">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-google-plus-g"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('user.layouts.app')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Titles</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          {!! Form::open([
            'action' => ['GalleriesController@update', $gallery->id],
            'method' =>'POST',
            'enctype' =>'multipart/form-data'])!!}
          <div class="form-group">
              {{Form::label('title', 'Title')}}
              {{Form::text('title', $gallery->title, ['class' => 'form-control', 'placeholder'=>'Title'])}}
          </div>

          <div class="form-group">
              {{Form::label('body', 'Body')}}
              {{Form::textarea('body', $gallery->body, [ 'id' => 'article-ckeditor', 'class' => 'textarea', 'placeholder'=>'Body Text', 'cols'=>'80'])}}
          </div>
          
          <div class="form-group">
                  {{Form::file('cover_image')}}
          </div>
          
          {{Form::hidden('_method', 'PUT')}}
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
          
      {!! Form::close() !!}
        </div>
        <!-- /.box -->

        
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection --}}