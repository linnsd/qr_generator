@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="w-100">
              <div class="card w-100">
                  <div class="card-header">Edit User</div>
                  <div class="card-body">
  
                      {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br/>
                                    @foreach($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    <br/>
                                    @endforeach
                                </div>
                            </div> --}}
                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                <a href="{{route('roles.index')}}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="table-responsive" style="font-size:14px">
                                <table class="table table-bordered styled-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Read</th>
                                            <th>Create</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            {{-- <th>Export</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $i=>$permission)
                                        @php
                                            $ids = explode(',', $permission->ids);
                                            $strArr = explode(',', $permission->name);
                                        @endphp
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $permission->model }}</td>
                                            @foreach($ids as $k=>$id)
                                            <td>
                                                 <label>{{ Form::checkbox('permission[]', $id, in_array($id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                </label>
                                            </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>    
                                </table>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-0">
                                <a href="{{route('roles.index')}}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection