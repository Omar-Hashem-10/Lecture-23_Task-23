@extends('web.admin.app')

@section('title', 'Majors')

@section('admin-content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Create Major</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.pages.home.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">All Majors</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Major Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.majors.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title">
                  @error('title')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="image">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                      @error('image')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
@endsection
