@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-10">{{ __('Edit Student') }}</h1>
                </div><!-- /.col -->
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                        <form action="{{ route('students.update',$student->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                             <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Admission Number:</strong>
                                        <input type="number" name="adm_no" value="{{ $student->adm_no }}" class="form-control" placeholder="Admission Number">
                                    </div>
                                    @error('adm_no')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fullnames:</strong>
                                        <input type="text"
                                            @error('fullnames') class="form-control border-danger" @enderror
                                        name="fullnames"
                                        value="{{ $student->fullnames }}"
                                        class="form-control" placeholder="Fullnames">
                                    </div>
                                    @error('fullnames')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Course:</strong>
                                        <input type="text"
                                            @error('course') class="form-control border-danger" @enderror
                                        name="course"
                                        value="{{ $student->course }}"
                                        class="form-control"
                                        placeholder="Course">
                                    </div>
                                    @error('course')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Student Photo:</strong>
                                        <input type="file" name="photo"
                                        class="form-control"
                                        value={{ $student->photo  }}>
                                        <img
                                            src="{{ asset('images/'.$student->photo)}}"
                                            class="w-12/12 mb-2 shadow-xl"
                                            alt="NO IMAGE"
                                            style="max-height: 80px;">
                                    </div>
                                    @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
