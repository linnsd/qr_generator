<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Generator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>QR Code Generate</h2>

            </div>

            <div class="card-body">
                <a href="{{route('qr.index')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;float: right;color: white;">Recent QR List</a>
                <br>
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
            <div class="row">
                <div class="col-md-4" align="center">
                     <img src="{{asset($qr_data->path.$qr_data->photo)}}" style="width:200px;height: 200px;">
                     <form action="{{route('qr.download')}}" method="post">
                       @csrf
                       @method('Post')
                       <input type="hidden" name="qr_path" value="{{$qr_data->path}}">
                       <input type="hidden" name="qr_photo" value="{{$qr_data->photo}}">
                    <button class="btn btn-success btn-sm" type="submit">
                            Download QR
                        </button>
                    </form>
                </div>
                
            </div>
            @endif
            
            </div>
        </div>

    </div>
</body>
</html>