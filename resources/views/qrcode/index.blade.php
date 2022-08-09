<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>How to Generate QR Code in Laravel 8</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>QR Code List</h2>
            </div>
            <div class="card-body">
               <!--  {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!} -->
               <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                <a href="{{route('qr.create')}}" class="btn btn-success btn-sm" style="margin-bottom: 10px;float: right;">Generate QR</a>
                <table class="table table-bordered">
                    <thead class="table-primary">
                     <tr> 
                       <th>No</th>
                         <th>QR Code</th>
                         <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($qr_list as $key=>$qr)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>
                            <img src="{{asset($qr->path.$qr->photo)}}" style="width:100px;height: 100px;">
                        </td>
                        <td>
                            <form action="{{route('qr.download')}}" method="post">
                                   @csrf
                                   @method('Post')
                                   <input type="hidden" name="qr_path" value="{{$qr->path}}">
                                   <input type="hidden" name="qr_photo" value="{{$qr->photo}}">
                                <button class="btn btn-success btn-sm" type="submit">
                                        Download QR
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>
               </div>
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