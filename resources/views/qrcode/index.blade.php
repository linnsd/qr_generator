<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Generator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">

     <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <script type="text/javascript">
         @if(Session::has('message'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.success("{{ session('message') }}");
          @endif
     </script>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>QR Code List</h2>
            </div>
            <div class="card-body">
               <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                <a href="{{url('/')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;color: white;">Back</a>
                <table class="table table-bordered">
                    <thead class="table-primary">
                     <tr> 
                       <th>No</th>
                         <th>QR Code</th>
                         <th>QR Link</th>
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
                        <td>{{$qr->qr_link}}</td>
                        <td>
                            <form action="{{route('qr.download')}}" method="post">
                                   @csrf
                                   @method('Post')
                               <input type="hidden" name="qr_path" value="{{$qr->path}}">
                               <input type="hidden" name="qr_photo" value="{{$qr->photo}}">
                                <button class="btn btn-success btn-sm" type="submit">
                                    Download QR
                                </button>
                                <a class="btn btn-sm btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{route('qr.destroy',$qr->id)}}">Delete</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>
               </div>
            </div>
        </div>

    </div>
</body>
</html>