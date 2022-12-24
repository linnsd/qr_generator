@extends('layout')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
    <div class="container-fuid">
        <div class="card">
            <div class="card-header">QR Logo Edit</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('logo.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="old_file_name" value="{{ $data->file_name }}">

                        <div class="form-group">
                            <label for="name">Logo Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Linn Logo" value="{{ $data->name }}">
                            @error('name')
                                <div class="text-danger">Logo name is required</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo">Choose a logo <span class="text-muted">( .png only) </span></label>
                            <input type="file" class="form-control-file @error('logo') is-invalid @enderror"
                                id="logo" name="logo">
                            @error('logo')
                                <div class="text-danger">File is required and it must be png format</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <img class="img-thumbnail" src="{{ asset('./uploads/logos/' . $data->file_name) }}"
                                alt="">
                        </div>

                        <div>
                            <a href="{{ route('logo.index') }}" class="btn btn-sm btn-primary">Back</a>
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").hide();
            }, 2000);
        });
    </script>
@endsection
