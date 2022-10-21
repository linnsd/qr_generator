@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<!-- 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
    $item_name = isset($_GET['item_name']) ? $_GET['item_name'] : '';
    $category = isset($_GET['category']) ? $_GET['category'] : '';
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <!-- The Modal -->
         
            <form action="{{route('qr_export')}}" id="qr_export_form" method="post">
                @csrf
                @method('POST')
                
                <input type="hidden" name="item_name" value="{{$item_name}}">
                <input type="hidden" name="category" value="{{$category}}">
            </form>
            <div class="card w-100">
                <div class="card-header">QR Code List</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <div class="table-responsive" style="font-size:14px;">
                    <a href="{{url('/qr_create')}}" class="btn btn-primary btn-sm form-group" style="color: white;">Back</a>
                    <form action="{{route('qr.index')}}" id="qr_form">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" name="item_name" id="item_name" class="form-control form-group" placeholder="Search Item..." value="{{old('item_name',$item_name)}}">
                            </div>
                            <div class="col-md-2">
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}" {{$category == $cat->id ? "selected" : ""}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8" align="right">
                                <a href="{{route('qr.create')}}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-plus"></i>Create</a>&nbsp;
                                <a class="btn btn-sm btn-warning" id="export">Export</a>
                            </div>
                        </div>
                    </form>
                    <p>Total - {{$count}}</p>
                <table class="table table-bordered">
                    <thead class="table-primary">
                     <tr> 
                         <th>No</th>
                         <th>QR Code</th>
                         <th>QR Link</th>
                         <th>Item Name</th>
                         <th>Category</th>
                         <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($qr_list as $key=>$qr)
                    {{-- Modal --}}
                    <div class="modal" id="myModal{{$qr->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Update Item Name</h4>
                              <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="fa fa-window-close"></i></button>
                            </div>
          
                            <!-- Modal body -->
                            <div class="modal-body">
                              <form action="{{ route('update_remark',$qr->id) }}" method="POST" accept-charset="utf-8" class="form-horizontal">
                                    @csrf
                                  <input type="text" name="remark" id="remark" class="form-control form-group" value="{{$qr->remark}}" placeholder="Item Name">
                                  <select name="category" class="form-control form-group">
                                      <option value="">Select</option>
                                      @foreach ($categories as $cat)
                                      <option value="{{$cat->id}}" {{$qr->category_id == $cat->id ? "selected" : ""}}>{{$cat->name}}</option>
                                      @endforeach
                                  </select>
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
          
                    <tr>
                        <td>{{++$i}}</td>
                        <td>
                            <img src="{{asset($qr->path.$qr->photo)}}" style="width:100px;height: 100px;">
                        </td>
                        <td>{{$qr->qr_link}}</td>
                        <td>{{$qr->remark}}</td>
                        <td>{{ $qr->category_name }}</td>
                        <td>
                            <form action="{{route('qr.download')}}" method="post">
                                   @csrf
                                   @method('Post')
                                @can('qr-edit')
                               <button id="alert_modal{{$qr->id}}" type="button" class="btn btn-sm btn-primary"  data-remark="{{$qr->remark}}" data-id="{{$qr->id}}">
                                  <i class="fa fa-fw fa-edit"></i>
                                </button>
                                @endcan

                                <a href="{{url('print_all_qr?photo_path='.$qr->photo)}}" target="_blank" class="btn btn-sm btn-secondary mr-1"><i class="fas fa-fw fa-print"></i></a>

                                @can('qr-download')
                               <input type="hidden" name="qr_path" value="{{$qr->path}}">
                               <input type="hidden" name="qr_photo" value="{{$qr->photo}}">
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fas fa-fw fa-download"></i>
                                </button>
                                @endcan 

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
    setTimeout(function() {
        $(".alert").hide();
    }, 1000);
   
    let qr_list = @json($qr_list);
    // console.log(qr_list.data);

    qr_list.data.forEach( data => {
        $(`#alert_modal${data.id}`).click(function(){
            // const data_remark = $('#alert_modal').attr("data-remark");
            // const qr_id = $('#alert_modal').attr("data-id");
            // $('#remark').val(data_remark);
            // $('#qr_id').val(qr_id);

            $(`#myModal${data.id}`).modal('show');
        });
    });

    $('#item_name').change(function(){
        this.form().submit();
    });
    $('#export').click(function(){
        $('#qr_export_form').submit();
    });

    $("#category").on("change",function(){
        $("#qr_form").submit();
    });
</script>
@endpush
