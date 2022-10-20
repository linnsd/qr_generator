@extends('layout')
  
@section('content')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css"
rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">QR Detail</div>
                  <div class="card-body" align="center">
                        <img src="{{asset('uploads/pc_sale/'.$strpath)}}" style="width:200px;height:200px;">     
                        <div class="form-group">
                          <a href="{{url('download_pc_qr?photo_path='.$strpath,)}}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-download"></i>Download QR</a>
              
                          <a href="{{url('print_pc_qr?photo_path='.$strpath)}}" target="_blank" class="btn btn-sm btn-primary mr-1"><i class="fas fa-fw fa-print"></i>Print</a>
                        </div>                    
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>


{{-- scripts --}}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function(){
    
  })
</script>
@endsection
