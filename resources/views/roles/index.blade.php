@extends('layout')
  
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">
                <div class="card-header">Role Management</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                <div class="table-responsive" style="font-size:14px;margin-top: 10px;">
                <a href="{{url('/qr_create')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;color: white;">Back</a>


              
                    <a href="{{route('roles.create')}}" class="btn btn-success btn-sm" style="margin-bottom: 10px;color: white;float: right;"><i class="fa fa-fw fa-plus"></i> Create New Role</a>
              
                <table class="table table-bordered">
                    <thead class="table-primary">
                     <tr> 
                         <th>No</th>
                         <th>Name</th>
                         <th width="280px">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @can('role-edit')
                                    <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                @endcan
                                @can('role-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                   </tbody>
                </table>
              @if ($roles->hasPages())
                    <div class="pagination-wrapper">
                         {{ $roles->links() }}
                    </div>
                @endif
               </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection