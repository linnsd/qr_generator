@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">
                <div class="card-header">
                <h5 class="d-flex justify-content-between align-items-center">
                  QR Code Generate
                  <a href="{{route('qr.index')}}" class="btn btn-primary btn-sm" style="color: white;">Recent QR List</a>

                </h5>
            </div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <!-- <a href="{{route('qr.index')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;float: right;color: white;">Recent QR List</a>
                <br> -->
                    <form action="{{route('qr.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">

                        <div class="col-md-5">
                            <input type="text" class="form-control" id="qr_link" name="qr_link" required>
                        </div>
                        <div class="col-md-1" style="margin-top:5px;">
                            <button type="submit" class="btn btn-sm btn-success">Generate</button>
                        </div>
                    </div>
                </form>
                @if($qr_data != null)
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-4" align="center">
                         <img src="{{asset($qr_data->path.$qr_data->photo)}}" style="width:200px;height: 200px;">
                         <form action="{{route('qr.download')}}" method="post">
                           @csrf
                           @method('Post')
                           <input type="hidden" name="qr_path" value="{{$qr_data->path}}">
                           <input type="hidden" name="qr_photo" value="{{$qr_data->photo}}">
                        <button class="btn btn-success btn-sm" type="submit" style="margin-top:10px;">
                                Download QR
                            </button>
                        </form>
                    </div>
                    
                </div>
                @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection