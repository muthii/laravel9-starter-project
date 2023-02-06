@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-10">{{ __('Create Student') }}</h1>
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

                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                            <form action="{{ route('students.store') }}" method="POST" id="upload-image" enctype="multipart/form-data">
                                @csrf

                                 <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Admission Number:</strong>
                                            <input type="number"name="adm_no"
                                                @error('adm_no')class="form-control border-danger"@enderror
                                            class="form-control" placeholder="Admissiom Number" value={{ old('adm_no')  }} >
                                        </div>
                                        @error('adm_no')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Fullnames:</strong>
                                            <input type="text"name="fullnames"
                                                @error('fullnames')class="form-control border-danger" @enderror
                                            class="form-control" placeholder="Full names" value={{ old('fullnames')  }}>
                                        </div>
                                        @error('fullnames')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Course:</strong>
                                            <input type="text" name="course"
                                                @error('course') class="form-control border-danger" @enderror
                                            class="form-control" placeholder="Course Name" value={{ old('course')  }} >
                                        </div>
                                        @error('course')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="file" name="photo"
                                                @error('photo') class="form-control border-danger" @enderror
                                            class="form-control"  value={{ old('photo')  }}>
                                        </div>
                                        @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Kenya.svg/1280px-Flag_of_Kenya.svg.png"
                                            alt="preview image" style="max-height: 80px;">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

                        <script type="text/javascript">

                        $(document).ready(function (e) {


                        $('#photo').change(function(){

                            let reader = new FileReader();

                            reader.onload = (e) => {

                            $('#preview-image-before-upload').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(this.files[0]);

                        });

                        });

                        </script>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
