@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
    $item_name = isset($_GET['item_name']) ? $_GET['item_name'] : '';
?>

<div class="container-fluid">
    <div align="right" style="margin-top:10px;">
        <a href="{{route('categories.create')}}" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-fw fa-plus"></i>Create</a>
    </div>
     

    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card w-100">
                <div class="card-header">Category List</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <div class="table-responsive" style="font-size:14px;">
                  
                    <p>Total - {{$count}}</p>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                         <tr> 
                            <th>No</th>
                             <th>Category</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$category->name}}</td>
                            <td></td>
                            <td>
                                 <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                   @csrf
                                   @method('DELETE')

                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-fw fa-edit"></i></a>

                               
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                         
                            </form>
                            </td>
                        </tr>
                        @endforeach
                       </tbody>
                    </table>
              @if ($categories->hasPages())
                    <div class="pagination-wrapper">
                         {{ $categories->links() }}
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
    $('#alert_modal').click(function(){
            const data_remark = $('#alert_modal').attr("data-remark");
            const qr_id = $('#alert_modal').attr("data-id");
            $('#remark').val(data_remark);
            $('#qr_id').val(qr_id);
            $('#myModal').modal('show');
        });

    $('#item_name').change(function(){
        this.form().submit();
    });
    $('#export').click(function(){
        $('#qr_export_form').submit();
    });
</script>
@endpush
