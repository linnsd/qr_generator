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
              
                <a href="" class="btn btn-primary btn-sm" style="margin-bottom: 10px;color: white;">Back</a>
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
              
            </div>
        </div>

      <!--   <div class="card">
            <div class="card-header">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
            </div>
        </div> -->

    </div>
</body>
</html>