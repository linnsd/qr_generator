@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="w-100">
              <div class="card w-100">
                  <div class="card-header">Create User</div>
                  <div class="card-body">
  
                      <form action="{{ route('users.store') }}" method="POST">
                          @csrf
                          @method('POST')
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="branch" class="col-md-4 col-form-label text-md-right">Branch</label>
                            <div class="col-md-6">
                               <select name="branch" id="branch" class="form-control">
                                    <option value="" selected>--Select--</option>
                                    <option value="1">HO</option>
                                    <option value="2">Linn 1</option>
                                    <option value="3">Linn 2</option>
                                    <option value="4">Linn 3</option>
                                    <option value="5">Gadget Store</option>
                               </select>
                                @if ($errors->has('branch'))
                                    <span class="text-danger">{{ $errors->first('branch') }}</span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Role</label>
                              <div class="col-md-6">
                               
                                 {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                            
                                  
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                        <!--   <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div> -->
  
                          <div class="col-md-6 offset-md-4">
                            <a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
                              <button type="submit" class="btn btn-success">
                                  Create
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection