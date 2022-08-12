@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">
                <div class="card-header">QR Code List</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                <a href="{{url('/qr_create')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;color: white;">Back</a>
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
                                <!-- <a class="btn btn-sm btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{route('qr.destroy',$qr->id)}}">Delete</a> -->
                            </form>
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>
              @if ($qr_list->hasPages())
                    <div class="pagination-wrapper">
                         {{ $qr_list->links() }}
                    </div>
                @endif
               </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection