@extends('user.layouts.app')

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
            'action' => 'GalleriesController@store',
            'method' =>'POST',
            'enctype' =>'multipart/form-data'])!!}
          <div class="form-group">
              {{Form::label('title', 'Title')}}
              {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Title'])}}
          </div>

          <div class="form-group">
              {{Form::label('body', 'Body')}}
              {{Form::textarea('body', '', [ 'id' => 'article-ckeditor', 'class' => 'textarea', 'placeholder'=>'Body Text', 'cols'=>'80'])}}
          </div>
          
          <div class="form-group">
                  {{Form::file('cover_image')}}
          </div>
              
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
@endsection