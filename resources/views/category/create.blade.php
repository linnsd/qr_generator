@extends('layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card w-100">
                <div class="card-header">
                <h5 class="d-flex justify-content-between align-items-center">
                 Category Create
                </h5>
            </div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">

                        <div class="col-md-4">
                            <input type="text" class="form-control form-group" id="name" name="name" required placeholder="Category Name">
                        </div>
                        <div style="" class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
        $("div.alert").remove();
    }, 1000 );    
});
</script>
@endpush
