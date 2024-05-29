@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Quiz</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage Quiz</li>
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
                                    <h3 class="card-title">Title</h3>

                                    <div class="card-tools">
                                        <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal"
                                            data-target="#myModal">Add new</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Quiz Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exams as $key => $exam)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $exam['title'] }}</td>
                                                    <td>{{ $exam['cat_name'] }}</td>
                                                    <td>{{ $exam['exam_date'] }}</td>
                                                    <td><input type="checkbox" class="exam_status"
                                                            data-id="{{ $exam['id'] }}" <?php if ($exam['status'] == 1) {
                                                                echo 'checked';
                                                            } ?>
                                                            name="status"></td>
                                                    <td>
                                                        <a href="{{ url('admin/edit_exam/' . $exam['id']) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <button class="btn btn-danger" data-toggle="modal"
                                                            data-target="#Delete{{$exam['id']}}" id="{{ $exam['id'] }}">Delete</Button>
                                                        <a href="{{ url('admin/add_questions/' . $exam['id']) }}"
                                                            class="btn btn-primary">Add Question</a>
                                                    </td>
                                                </tr>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="Delete{{$exam['id']}}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    Confirmation</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">X</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row align-items-center my-3">
                                                                    <div class="col-md-12" style="font-size:14pt;">
                                                                        <label class="block mb-2 text-center">Are you sure
                                                                            want to
                                                                            Delete?</label>
                                                                        </br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-primary"
                                                                    data-bs-dismiss="modal">CANCEL</button>
                                                                    <a href="{{ url('admin/delete_exam/'.$exam['id'])}}"
                                                                    class="btn btn-danger">DELETE</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new Quiz</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/add_new_exam') }}" class="database_operation">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Enter title</label>
                                        {{ csrf_field() }}
                                        <input type="text" required="required" name="title" placeholder="Enter title"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Enter Date</label>
                                        <input type="date" required="required" name="exam_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Enter duration (in minutes)</label>
                                        <input type="text" required="required" name="exam_duration" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Select category</label>
                                        <select class="form-control" required="required" name="exam_category">
                                            <option value="">Select</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>



        @endsection
