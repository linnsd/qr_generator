@extends('layout')
  
@section('content')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css"
rel="stylesheet">


<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Edit PC Sale</div>
                  <div class="card-body">
  
                      <form action="{{ route('pc_sale.update',$data->id) }}" method="POST" autocomplete="off">
                          @csrf
                          @method('PUT')
                        <div class="form-group row">
                              <label for="c_name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="c_name" class="form-control" name="c_name" required value="{{$data->c_name}}">
                                  @if ($errors->has('c_name'))
                                      <span class="text-danger">{{ $errors->first('c_name') }}</span>
                                  @endif
                              </div>
                        </div>
  
                        <div class="form-group row">
                              <label for="c_phone" class="col-md-4 col-form-label text-md-right">Customer Phone</label>
                              <div class="col-md-6">
                                  <input type="text" id="c_phone" class="form-control" name="c_phone" required value="{{$data->c_phone}}">
                                  @if ($errors->has('c_phone'))
                                      <span class="text-danger">{{ $errors->first('c_phone') }}</span>
                                  @endif
                              </div>
                        </div>
  
                        <div class="form-group row">
                              <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                              <div class="col-md-6">
                                  <input type="text" id="date" class="form-control" name="date" required value="{{$data->date}}">
                                  @if ($errors->has('date'))
                                      <span class="text-danger">{{ $errors->first('date') }}</span>
                                  @endif
                              </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpu" class="col-md-4 col-form-label text-md-right">CPU</label>
                            <div class="col-md-6">
                                <input type="text" id="cpu" class="form-control" name="cpu" required value="{{$data->cpu}}">
                                @if ($errors->has('cpu'))
                                    <span class="text-danger">{{ $errors->first('cpu') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="board" class="col-md-4 col-form-label text-md-right">Board</label>
                            <div class="col-md-6">
                                <input type="text" id="board" class="form-control" name="board" required value="{{$data->board}}">
                                @if ($errors->has('board'))
                                    <span class="text-danger">{{ $errors->first('board') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                          <label for="memory" class="col-md-4 col-form-label text-md-right">Memory</label>
                          <div class="col-md-6">
                              <input type="text" id="memory" class="form-control" name="memory" required value="{{$data->memory}}">
                              @if ($errors->has('memory'))
                                  <span class="text-danger">{{ $errors->first('memory') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="hdd" class="col-md-4 col-form-label text-md-right">HDD</label>
                          <div class="col-md-6">
                              <input type="text" id="hdd" class="form-control" name="hdd" required value="{{$data->hdd}}">
                              @if ($errors->has('hdd'))
                                  <span class="text-danger">{{ $errors->first('hdd') }}</span>
                              @endif
                          </div>
                        </div>


                        <div class="form-group row">
                          <label for="graphic" class="col-md-4 col-form-label text-md-right">Graphic</label>
                          <div class="col-md-6">
                              <input type="text" id="graphic" class="form-control" name="graphic" required value="{{$data->graphic}}">
                              @if ($errors->has('graphic'))
                                  <span class="text-danger">{{ $errors->first('graphic') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="power_supply" class="col-md-4 col-form-label text-md-right">Power Supply</label>
                          <div class="col-md-6">
                              <input type="text" id="power_supply" class="form-control" name="power_supply" required value="{{$data->power_supply}}">
                              @if ($errors->has('power_supply'))
                                  <span class="text-danger">{{ $errors->first('power_supply') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="drive" class="col-md-4 col-form-label text-md-right">Drive</label>
                          <div class="col-md-6">
                              <input type="text" id="drive" class="form-control" name="drive" required value="{{$data->drive}}">
                              @if ($errors->has('drive'))
                                  <span class="text-danger">{{ $errors->first('drive') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="casing" class="col-md-4 col-form-label text-md-right">Casing</label>
                          <div class="col-md-6">
                              <input type="text" id="casing" class="form-control" name="casing" required value="{{$data->casing}}">
                              @if ($errors->has('casing'))
                                  <span class="text-danger">{{ $errors->first('casing') }}</span>
                              @endif
                          </div>
                        </div>



                        <div class="form-group row">
                          <label for="monitor" class="col-md-4 col-form-label text-md-right">Monitor</label>
                          <div class="col-md-6">
                              <input type="text" id="monitor" class="form-control" name="monitor" required value="{{$data->monitor}}">
                              @if ($errors->has('monitor'))
                                  <span class="text-danger">{{ $errors->first('monitor') }}</span>
                              @endif
                          </div>
                        </div>


                        <div class="form-group row">
                          <label for="ups" class="col-md-4 col-form-label text-md-right">UPS</label>
                          <div class="col-md-6">
                              <input type="text" id="ups" class="form-control" name="ups" required value="{{$data->ups}}">
                              @if ($errors->has('ups'))
                                  <span class="text-danger">{{ $errors->first('ups') }}</span>
                              @endif
                          </div>
                        </div>


                        <div class="form-group row">
                          <label for="keyboard_mouse" class="col-md-4 col-form-label text-md-right">K + M</label>
                          <div class="col-md-6">
                              <input type="text" id="keyboard_mouse" class="form-control" name="keyboard_mouse" required value="{{$data->keyboard_mouse}}">
                              @if ($errors->has('keyboard_mouse'))
                                  <span class="text-danger">{{ $errors->first('keyboard_mouse') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="antivirus" class="col-md-4 col-form-label text-md-right">Antivirus</label>
                          <div class="col-md-6">
                              <input type="text" id="antivirus" class="form-control" name="antivirus" required value="{{$data->antivirus}}">
                              @if ($errors->has('antivirus'))
                                  <span class="text-danger">{{ $errors->first('antivirus') }}</span>
                              @endif
                          </div>
                        </div>


                        <div class="form-group row">
                            <label for="other" class="col-md-4 col-form-label text-md-right">Other</label>
                            <div class="col-md-6">
                                <input type="text" id="other" class="form-control" name="other" required value="{{$data->other}}">
                                @if ($errors->has('other'))
                                    <span class="text-danger">{{ $errors->first('other') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                      </form>
                        
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
   $("#date").datepicker({
       format: "dd-mm-yyyy",
   });
  })
</script>
@endsection
