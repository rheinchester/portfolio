@extends('auth.admin.layouts.app')

@section('main-content')
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blank page
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          @component('components.person')
            
          @endcomponent
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
    
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <h1>
                User Stats
              </h1>
              {{-- tABLE STARTS --}}
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">id</th>{{-- THIS IS ID --}}
                  <th>Full name</th>
                  <th>username</th>
                  <th>Email</th>
                  <th>Occupation</th>
                  <th>Number of galleries</th>
                </tr>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="/user/profile/{{$user->id}}/edit">{{$user->name}}</a></td>
                    <td>
                      {{-- {{$user->profile->username}} --}}
                    </td>
                    <td> {{$user->email}}</td>
                    <td> </td>
                    <td> </td>
                        
                  </tr>
                @endforeach
              </table>
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection