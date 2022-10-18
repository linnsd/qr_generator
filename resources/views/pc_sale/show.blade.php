@extends('layout')
  
@section('content')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css"
rel="stylesheet">


<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Detail PC Sale</div>
                  <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              {{-- form input strat --}}
                             <div class="form-group row">
                              <label for="c_name" class="col-form-label text-md-right">Customer Name</label>
                              <input type="text" id="c_name" class="form-control" name="c_name" required value="{{$data->c_name}}" readonly>
                              @if ($errors->has('c_name'))
                                  <span class="text-danger">{{ $errors->first('c_name') }}</span>
                              @endif
                             </div>
                             {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                              {{-- form input strat --}}
                              <div class="form-group row">
                                <label for="c_phone" class="col-form-label text-md-right">Customer Phone</label>
                                <input type="number" id="c_phone" class="form-control" name="c_phone" required value="{{$data->c_phone}}" readonly>
                                @if ($errors->has('c_phone'))
                                    <span class="text-danger">{{ $errors->first('c_phone') }}</span>
                                @endif
                               </div>
                               {{-- form input end --}}
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="date" class="col-form-label text-md-right">Date</label>
                                  <input type="text" id="date" class="form-control" name="date" required value="{{date('d-m-Y',strtotime($data->date))}}" readonly>
                                  @if ($errors->has('date'))
                                      <span class="text-danger">{{ $errors->first('date') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="cpu" class="col-form-label text-md-right">CPU</label>
                                  <input type="text" id="cpu" class="form-control" name="cpu" required value="{{$data->cpu}}" readonly>
                                  @if ($errors->has('cpu'))
                                      <span class="text-danger">{{ $errors->first('cpu') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="board" class="col-form-label text-md-right">Board</label>
                                  <input type="text" id="board" class="form-control" name="board" required value="{{$data->board}}" readonly>
                                  @if ($errors->has('board'))
                                      <span class="text-danger">{{ $errors->first('board') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="memory" class="col-form-label text-md-right">Memory</label>
                                  <input type="text" id="memory" class="form-control" name="memory" required value="{{$data->memory}}" readonly>
                                  @if ($errors->has('memory'))
                                      <span class="text-danger">{{ $errors->first('memory') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="hdd" class="col-form-label text-md-right">HDD</label>
                                  <input type="text" id="hdd" class="form-control" name="hdd" required value="{{$data->hdd}}" readonly>
                                  @if ($errors->has('hdd'))
                                      <span class="text-danger">{{ $errors->first('hdd') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="graphic" class="col-form-label text-md-right">Graphic</label>
                                  <input type="text" id="graphic" class="form-control" name="graphic" required value="{{$data->graphic}}" readonly>
                                  @if ($errors->has('graphic'))
                                      <span class="text-danger">{{ $errors->first('graphic') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="power_supply" class="col-form-label text-md-right">Power Supply</label>
                                  <input type="text" id="power_supply" class="form-control" name="power_supply" required value="{{$data->power_supply}}" readonly>
                                  @if ($errors->has('power_supply'))
                                      <span class="text-danger">{{ $errors->first('power_supply') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="drive" class="col-form-label text-md-right">Drive</label>
                                  <input type="text" id="drive" class="form-control" name="drive" required value="{{$data->drive}}" readonly>
                                  @if ($errors->has('drive'))
                                      <span class="text-danger">{{ $errors->first('drive') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                          </div>



                          <div class="row">
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="casing" class="col-form-label text-md-right">Casing</label>
                                  <input type="text" id="casing" class="form-control" name="casing" required value="{{$data->casing}}" readonly>
                                  @if ($errors->has('casing'))
                                      <span class="text-danger">{{ $errors->first('casing') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="monitor" class="col-form-label text-md-right">Monitor</label>
                                  <input type="text" id="monitor" class="form-control" name="monitor" required value="{{$data->monitor}}" readonly>
                                  @if ($errors->has('monitor'))
                                      <span class="text-danger">{{ $errors->first('monitor') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="ups" class="col-form-label text-md-right">UPS</label>
                                  <input type="text" id="ups" class="form-control" name="ups" required value="{{$data->ups}}" readonly>
                                  @if ($errors->has('ups'))
                                      <span class="text-danger">{{ $errors->first('ups') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="keyboard_mouse" class="col-form-label text-md-right">K + M</label>
                                  <input type="text" id="keyboard_mouse" class="form-control" name="keyboard_mouse" required value="{{$data->keyboard_mouse}}" readonly>
                                  @if ($errors->has('keyboard_mouse'))
                                      <span class="text-danger">{{ $errors->first('keyboard_mouse') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="antivirus" class="col-form-label text-md-right">Antivirus</label>
                                  <input type="text" id="antivirus" class="form-control" name="antivirus" required value="{{$data->antivirus}}" readonly>
                                  @if ($errors->has('antivirus'))
                                      <span class="text-danger">{{ $errors->first('antivirus') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="other" class="col-form-label text-md-right">Other</label>
                                  <textarea name="other" id="other" class="form-control" readonly>{{$data->other}}</textarea>
                                  @if ($errors->has('other'))
                                      <span class="text-danger">{{ $errors->first('other') }}</span>
                                  @endif
                                 </div>
                                 {{-- form input end --}}
                            </div>
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
   $("#date").datepicker({
       format: "dd-mm-yyyy",
       "setDate": new Date(),
        "autoclose": true,
   });
  })
</script>
@endsection
