@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<div class="">
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
  
                <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                <a href="{{route('pc_sale.create')}}" class="btn btn-success btn-sm" style="margin-bottom: 10px;color: white;float: right;"><i class="fa fa-fw fa-plus"></i>Create</a>
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
                                    <a href="{{route('pc_sale.show',$data->id)}}" target="_blank" class="btn btn-sm btn-info mr-1"><i class="fas fa-fw fa-eye"></i></a>
                                    <a href="{{route('pc_sale.edit',$data->id)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-fw fa-edit"></i></a>

                                    <a href="{{route('qr.generate_qr',$data->id)}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-fw fa-qrcode"></i></a>

                                     <a href="{{route('qr.print_qr',$data->id)}}" target="_blank" class="btn btn-sm btn-secondary mr-1"><i class="fas fa-fw fa-print"></i></a>

                                    <form action="{{route('pc_sale.destroy',$data->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are You Sure You Want To Delete This?')" class="btn btn-sm btn-danger mr-1"><i class="fas fa-fw fa-trash"></i></button>
                                        @method('delete')
                                    </form>
                                     
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="20" style="text-align: center">No Data</td>
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
<script>
   $(document).ready(function(){
        setTimeout(function() {
            $(".alert").hide();
        }, 2000);
    });
</script>
@endsection