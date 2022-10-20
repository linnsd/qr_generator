@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css"
rel="stylesheet">

<div class="">
    @php
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';  
        $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
        $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';
        $branch = isset($_GET['branch']) ? $_GET['branch'] : '';
    @endphp
   <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">
                <div class="card-header">PC Sale List</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                <div class="d-flex justify-content-end align-items-center">
                    @can('pc-export')
                    <a href="" class="btn btn-sm btn-warning text-white mr-1" id="export_btn"><i class="fa fa-fw fa-file-excel"></i> Export</a>
                    @endcan

                    @can('pc-create')
                    <a href="{{route('pc_sale.create')}}" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-fw fa-plus"></i>Create</a>
                    @endcan
                </div>

                {{-- excel form --}}
                <form action="{{route('pc_sale.export')}}" method="POST" id="excel_form">
                    @csrf
                    <input type="hidden" name="keyword" value="{{$keyword}}">
                    <input type="hidden" name="from_date" value="{{$from_date}}">
                    <input type="hidden" name="to_date" value="{{$to_date}}">
                    <input type="hidden" name="branch" value="{{$branch}}">
                </form>


                <form action="{{route('pc_sale.index')}}" method="GET" autocomplete="off">
                    <div class="d-flex">
                        <input type="text" name="keyword" id="keyword" placeholder="keyword" class="form-control col-2 mr-1" value="{{old('keyword',$keyword)}}">
                        <input type="text" id="from_date" class="form-control date col-1 mr-1" name="from_date" value="{{old('from_date',$from_date)}}" placeholder="From Date">
                        <input type="text" id="to_date" class="form-control date col-1 mr-1" name="to_date" value="{{old('from_date',$to_date)}}" placeholder="To Date">
                        <select name="branch" class="form-control col-1 mr-md-1">
                            <option value="" selected>--Branch--</option>
                            <option value="HO" {{$branch == "HO" ? "selected" : ""}}>HO</option>
                            <option value="Linn 1" {{$branch == "Linn 1" ? "selected" : ""}}>Linn 1</option>
                            <option value="Linn 2" {{$branch == "Linn 2" ? "selected" : ""}}>Linn 2</option>
                            <option value="Linn 3" {{$branch == "Linn 3" ? "selected" : ""}}>Linn 3</option>
                            <option value="Gadget Store" {{$branch == "Gadget Store" ? "selected" : ""}}>Gadget Store</option>
                        </select>
                       
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <div class="text text-muted my-2">Total - {{$count}}</div>
                <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                <table class="table table-bordered">
                    <thead class="table-primary">
                     <tr> 
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Branch</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @forelse ($pc_sales as $data)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data->c_name}}</td>
                            <td>{{$data->c_phone}}</td>
                            <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                            <td>{{$data->branch}}</td>
                            <td>{{$data->c_by}}</td>
                            <td>{{$data->u_by}}</td>
                            <td>
                                <div class="d-flex">
                                    @can('pc-show')
                                    <a href="{{route('pc_sale.show',$data->id)}}" target="_blank" class="btn btn-sm btn-info mr-1"><i class="fas fa-fw fa-eye"></i></a>
                                    @endcan

                                    @can('pc-edit')
                                    <a href="{{route('pc_sale.edit',$data->id)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-fw fa-edit"></i></a>
                                    @endcan

                                    @can('pc-qr-generate')
                                    <a href="{{route('qr.generate_qr',$data->id)}}" class="btn btn-sm btn-success mr-1" target="_blank"><i class="fas fa-fw fa-qrcode"></i></a>
                                    @endcan

                                    @can('pc-print')
                                     <a href="{{route('qr.print_qr',$data->id)}}" target="_blank" class="btn btn-sm btn-secondary mr-1"><i class="fas fa-fw fa-print"></i></a>
                                     @endcan

                                     @can('pc-delete')
                                    <form action="{{route('pc_sale.destroy',$data->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are You Sure You Want To Delete This?')" class="btn btn-sm btn-danger mr-1"><i class="fas fa-fw fa-trash"></i></button>
                                        @method('delete')
                                    </form>
                                     @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center">No Data</td>
                        </tr>
                    @endforelse
                   </tbody>
                </table>
                {!! $pc_sales->appends(request()->input())->links() !!}
               </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
<div class="container">
    
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script>
   $(document).ready(function(){
        setTimeout(function() {
            $(".alert").hide();
        }, 2000);

        $(".date").datepicker({
            format: "dd-mm-yyyy",
            "setDate": new Date(),
            "autoclose": true
        });


        $("#export_btn").click(function(e){
            e.preventDefault();
            $("#excel_form").submit();
        });
    });

</script>
@endsection