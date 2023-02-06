@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-10">{{ __('Students') }}</h1>
                </div><!-- /.col -->
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
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student</a>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <table class="table table-bordered top-margin:5">
                                <tr>
                                    <th>Adm No</th>
                                    <th>Fullnames</th>
                                    <th>Course</th>
                                    <th>Photo</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->adm_no }}</td>
                                    <td>{{ $student->fullnames }}</td>
                                    <td>{{ $student->course }}</td>
                                    <td>
                                        <img class="rounded-circle"
                                                src="{{ asset('images/' . $student->photo) }}"
                                                style="max-height: 100px;"
                                                alt="NO IMAGE">
                                    </td>
                                    <td>
                                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>

                                            <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                            {!! $students->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
