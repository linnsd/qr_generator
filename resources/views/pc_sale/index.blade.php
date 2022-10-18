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
                            <td>
                                @switch($data->branch)
                                @case(1)
                                    HO
                                    @break
                                @case(2)
                                    Linn 1
                                    @break
                                @case(3)
                                    Linn 2
                                    @break
                                @case(4)
                                    Linn 3
                                    @break
                                @case(5)
                                    Gadget Store
                                    @break
                                @default
                                    
                            @endswitch
                            </td>
                            <td>{{$data->c_by}}</td>
                            <td>{{$data->u_by}}</td>
                            <td>
                                <div class="d-flex">
                                    <a target="_black" href="{{route('pc_sale.show',$data->id)}}" class="btn btn-sm btn-info mr-1">Detail</a>
                                    <a href="{{route('pc_sale.edit',$data->id)}}" class="btn btn-sm btn-info mr-1">Edit</a>
                                    <form action="{{route('pc_sale.destroy',$data->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
@endsection