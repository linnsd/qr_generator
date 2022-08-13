@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<!-- 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Update Remark</h4>
                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="fa fa-window-close"></i></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="{{ route('update_remark') }}" method="get" accept-charset="utf-8" class="form-horizontal">
                        <input type="text" name="remark" id="remark" class="form-control form-group" placeholder="Remark">
                        <input type="hidden" name="qr_id" id="qr_id">
                        <div class="row form-group">
                            <div class="col-md-4"></div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>&nbsp;
                            <button type="submit" class="btn btn-success">UPDATE</button>
                        </div>
                    </form>

                  </div>

                  <!-- Modal footer -->
                 <!--  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div> -->

                </div>
              </div>
            </div>

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
                         <th>Remark</th>
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
                        <td>{{$qr->remark}}</td>
                        <td>
                            <form action="{{route('qr.download')}}" method="post">
                                   @csrf
                                   @method('Post')
                               <button id="alert_modal" type="button" class="btn btn-sm btn-primary"  data-remark="{{$qr->remark}}" data-id="{{$qr->id}}">
                                  <i class="fa fa-fw fa-edit"></i>
                                </button>

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

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('#alert_modal').click(function(){
            const data_remark = $('#alert_modal').attr("data-remark");
            const qr_id = $('#alert_modal').attr("data-id");
            $('#remark').val(data_remark);
            $('#qr_id').val(qr_id);
            $('#myModal').modal('show');
        });
</script>
@endpush
