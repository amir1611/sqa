@extends('layouts.app')
@section('title','Dashboard')
@section('content')

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Student Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.student.update', $std->id) }}" method ="POST">  
                      <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    {{ csrf_field()}}
                                    <input type="text" value="{{ $std->name }}" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    {{ csrf_field()}}
                                    <input type="text" value="{{ $std->email }}" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Contact</label>
                                    {{ csrf_field()}}
                                    <input type="text" value="{{ $std->mobile_no }}" name="mobile_no" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Save</button>
                                  <a href="{{ route('admin.student.manage') }}" class="btn btn-secondary btn mx-2">Back</a>
                              </div>
                          </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-header -->

@endsection
