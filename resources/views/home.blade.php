@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<style>
    .dashboard-icon {
        font-size: 2rem;
    }
</style>

<div class="container-fluid">
    <h3 class="text text-muted"></h3>
   <div class="d-flex justify-content-center mt-5">
    {{-- total users --}}
    <div class="col-3">
        <div class="card p-3">
            <div class="d-flex justify-content-around align-items-center">
                <div class="icon">
                    <i class="fas fa-fw fa-users dashboard-icon"></i>
                </div>
                <div class="d-flex flex-column">
                    <h6>Total Users</h6>
                    <h6 class="text-primary"><a href="{{route('users.index')}}">{{$total_users}}</a></h6>
                </div>
            </div>
        </div>
    </div>

     {{-- total users --}}
     <div class="col-3">
        <div class="card p-3">
            <div class="d-flex justify-content-around align-items-center">
                <div class="icon">
                    <i class="fas fa-fw fa-qrcode dashboard-icon"></i>
                </div>
                <div class="d-flex flex-column">
                    <h6>Total QR Generates</h6>
                    <h6 class="text-primary"><a href="{{route('qr.index')}}">{{$total_qr}}</a></h6>
                </div>
            </div>
        </div>
    </div>

     {{-- total users --}}
     <div class="col-3">
        <div class="card p-3">
            <div class="d-flex justify-content-around align-items-center">
                <div class="icon">
                    <i class="fas fa-fw fa-computer dashboard-icon"></i>
                </div>
                <div class="d-flex flex-column">
                    <h6>Total PC Sales </h6>
                    <h6 class="text-primary"><a href="{{route('pc_sale.index')}}">{{$total_pc_sales}}</a></h6>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script>
</script>
@endsection