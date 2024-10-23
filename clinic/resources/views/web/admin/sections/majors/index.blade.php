@extends('web.admin.app')

@section('title', 'Majors')

@section('admin-content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">All Majors</h1>
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

          <div class="container-fluid">

          <div class="mb-2">
            <a href="{{route('admin.majors.create')}}" class="btn btn-primary">Add new major</a>
          </div>

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Majors Table</h3>

                  <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($majors as $major)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$major->title}}</td>
                                <td>
                                    <img src="{{ FileHelper::get_file_url($major->image) }}" alt="Major Image" width="50" height="50">
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('admin.majors.edit', $major->id)}}">Edit</a>
                                    <form class="d-inline" action="{{route('admin.majors.destroy', $major->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
@endsection
