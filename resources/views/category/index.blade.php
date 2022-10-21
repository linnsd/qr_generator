@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
    $item_name = isset($_GET['item_name']) ? $_GET['item_name'] : '';
?>
<style type="text/css">
    .add {
      background-color:#AA55AA;
      border: none;
      color: white;
      padding: 2px 20px;
      font-size: 30px;
      cursor: pointer;
    }

    /* Darker background on mouse-over */
    .add:hover {
      background-color: #FF55FF;
    }
    .input-group.md-form.form-sm.form-1 input{
    border: 1px solid purple;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    }
    .input-group-text{
    background-color:#AA55AA;
    color:white;
    }
    .switch {
      position: relative;
      display: inline-block;
      width: 45px;
      height: 22px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 15px;
      width: 15px;
      left: 2px;
      bottom: 0px;
      top:3px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 36px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
</style>

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
                            <td>
                                <label class="switch">
                                  <input data-id="{{$category->id}}" data-size ="small" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $category->status ? 'checked' : '' }}>
                                  <span class="slider round"></span>
                              </label>
                            </td>
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

    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var cat_id = $(this).data('id'); 
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?php echo(route("change_category_status")) ?>",
                data: {'status': status, 'cat_id': cat_id},
                success: function(data){
                 console.log(data.success);
                }
            });
        })
      });
</script>
@endpush
