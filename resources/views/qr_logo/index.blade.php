@extends('layout')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <style>
        .logo {
            width: 80px;
            height: 80px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 22px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 2px;
            bottom: 0px;
            top: 3px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 36px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="container-fuid">
        <div class="card">
            <div class="card-header">QR Logo List</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <div>
                        @php
                            $keyword = $_GET['keyword'] ?? '';
                        @endphp
                        <form action="">
                            <input type="text" name="keyword" class="form-control" value="{{ $keyword }}"
                                placeholder="Search...">
                        </form>
                    </div>
                    @can('pc-create')
                        <div>
                            <a href="{{ route('logo.create') }}" class="btn btn-success btn-sm" style="color: white;"><i
                                    class="fa fa-fw fa-plus"></i>Create</a>
                        </div>
                    @endcan
                </div>

                <div class="text text-muted my-2">Total - {{ $count }}</div>
                <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logos as $logo)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $logo->name }}</td>
                                    <td>
                                        <img class="logo" src="{{ asset('./uploads/logos/' . $logo->file_name) }}"
                                            alt="">
                                    </td>
                                    <td>
                                        <label class="switch">
                                            <input data-id="{{ $logo->id }}" data-size="small" class="toggle-class"
                                                type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                data-toggle="toggle" data-on="Active" data-off="InActive"
                                                {{ $logo->status ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($logo->created_at)) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('logo.edit', $logo->id) }}"
                                                class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('logo.destroy', $logo->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this?')"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-2">
                    {!! $logos->appends(request()->input())->links() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var logo_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('logo_status') }}",
                    data: {
                        'status': status,
                        'logo_id': logo_id
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                });
            });

            setTimeout(function() {
                $(".alert").hide();
            }, 2000);


        });
    </script>
@endsection
