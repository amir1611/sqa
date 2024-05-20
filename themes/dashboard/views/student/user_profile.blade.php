@extends('layouts.student')
@section('title','Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                    <form method="POST" action="{{ route('student.profile.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    {{ csrf_field()}}
                                    <input type="text" value="{{ old('name', auth()->user()->name) }}" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    {{ csrf_field()}}
                                    <input type="text" value="{{ old('email', auth()->user()->email) }}" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Contact</label>
                                    {{ csrf_field()}}
                                    <input type="text" value="{{ old('mobile_no', auth()->user()->mobile_no) }}" name="mobile_no" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                          </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection

