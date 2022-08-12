@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">
                <div class="card-header">User List</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                <a href="{{url('/qr_create')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;color: white;">Back</a>

                <a href="{{route('users.create')}}" class="btn btn-success btn-sm" style="margin-bottom: 10px;color: white;float: right;"><i class="fa fa-fw fa-plus"></i>Create</a>
                <table class="table table-bordered">
                    <thead class="table-primary">
                     <tr> 
                       <th>No</th>
                         <th>User Name</th>
                         <th>Email</th>
                         <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                           <form action="{{route('users.destroy',$user->id)}}" method="post"
                                 onsubmit="return confirm('Do you want to delete?');">
                                 @csrf
                                 @method('DELETE')
                                 <a class="btn btn-sm btn-primary" href="{{route('users.edit',$user->id)}}"><i
                                         class="fa fa-fw fa-edit"></i></a>
                                
                                 <button class="btn btn-sm btn-danger btn-sm" type="submit">
                                     <i class="fa fa-fw fa-trash" title="Delete"></i>
                                 </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>
              @if ($users->hasPages())
                    <div class="pagination-wrapper">
                         {{ $users->links() }}
                    </div>
                @endif
               </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection