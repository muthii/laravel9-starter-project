@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-10">{{ __('Show Student') }}</h1>
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

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <table class="table table-spripped table-bordered ">
                                    <tr>
                                        <th>Admission No: </th>
                                        <td>{{ $student->adm_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fullnames: </th>
                                        <td>{{ $student->fullnames }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course: </th>
                                        <td>{{ $student->course }}</td>
                                    </tr>
                                    <tr>
                                        <th>Student Photo: </th>
                                        <td>
                                            <img class="rounded-circle"
                                                src="{{ asset('images/' . $student->photo )}}"
                                                class="w-12/12 mb-2 shadow-xl"
                                                alt="images/avatar.jpg"
                                                style="max-height: 80px;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
