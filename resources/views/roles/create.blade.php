@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">Create Role</div>
            <div class="card-body">

                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Name:</strong>
                              {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Permission:</strong>
                              <br/>
                              @foreach($permission as $value)
                                  <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                  {{ $value->name }}</label>
                              <br/>
                              @endforeach
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <a href="{{route('roles.index')}}" class="btn btn-primary">Back</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                  </div>
                  {!! Form::close() !!}
                  
            </div>
        </div>
      </div>
  </div>
</main>
@endsection