@extends('layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card w-100">
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
                            <input type="text" class="form-control form-group" id="remark" name="remark" required placeholder="Item Name">
                            <select name="category" id="category" class="form-control form-group">
                                <option value="">--Category--</option>
                                @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="qr_link" name="qr_link" required placeholder="Website Link">
                        </div>
                        <div class="col-md-12 form-group my-2">
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

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
        $("div.alert").remove();
    }, 1000 );    
});
</script>
@endpush
