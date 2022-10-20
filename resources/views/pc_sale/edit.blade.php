@extends('layout')
  
@section('content')
<link id="bsdp-css" href="{{asset('./css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">


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
                          {{-- Customer Information --}}
                          <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2">User's Information</legend>

                            <div class="row">
                              <div class="col-md-6">
                                {{-- form input strat --}}
                              <div class="form-group row">
                                <label for="c_name" class="col-form-label text-md-right">Customer Name</label>
                                <input type="text" id="c_name" class="form-control" name="c_name" required autofocus placeholder="Mg Mg" value="{{$data->c_name}}">
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
                                  <input type="number" id="c_phone" class="form-control" name="c_phone" required autofocus placeholder="09xxxxxxxxx" value="{{$data->c_phone}}">
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
                                    <input type="text" id="date" class="form-control" name="date" required placeholder="{{date('d-m-Y')}}" value="{{date('d-m-Y',strtotime($data->date))}}">
                                    @if ($errors->has('date'))
                                        <span class="text-danger">{{ $errors->first('date') }}</span>
                                    @endif
                                  </div>
                                  {{-- form input end --}}
                              </div>
                            </div>
                          </fieldset>
                          {{-- PC Specification --}}
                          <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2">PC Information</legend>

                            <div class="row">
                              <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="cpu" class="col-form-label text-md-right">CPU</label>
                                  <input type="text" id="cpu" class="form-control" name="cpu" required placeholder="Core i7 10th SN-ABCDEFG" value="{{$data->cpu}}">
                                  @if ($errors->has('cpu'))
                                      <span class="text-danger">{{ $errors->first('cpu') }}</span>
                                  @endif
                                </div>
                                {{-- form input end --}}
                            </div>
                              <div class="col-md-6">"
                                  {{-- form input strat --}}
                                  <div class="form-group row">
                                    <label for="board" class="col-form-label text-md-right">Board</label>
                                    <input type="text" id="board" class="form-control" name="board" required placeholder="Asus H510MK SN-ABCDEFG" value="{{$data->board}}">
                                    @if ($errors->has('board'))
                                        <span class="text-danger">{{ $errors->first('board') }}</span>
                                    @endif
                                  </div>
                                  {{-- form input end --}}
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="memory" class="col-form-label text-md-right">Memory</label>
                                  <input type="text" id="memory" class="form-control" name="memory" required placeholder="Apacer DDR4 8GB SN-ABCDEFG" value="{{$data->memory}}">
                                  @if ($errors->has('memory'))
                                      <span class="text-danger">{{ $errors->first('memory') }}</span>
                                  @endif
                                </div>
                                {{-- form input end --}}
                            </div>
                            <div class="col-md-6">
                              {{-- form input strat --}}
                              <div class="form-group row">
                                <label for="hdd" class="col-form-label text-md-right">HDD/SDD</label>
                                <input type="text" id="hdd" class="form-control" name="hdd" required placeholder="HDD 1000GB SN-ABCDEFG" value="{{$data->hdd}}">
                                @if ($errors->has('hdd'))
                                    <span class="text-danger">{{ $errors->first('hdd') }}</span>
                                @endif
                              </div>
                              {{-- form input end --}}
                          </div>
                              
                            </div>
                            
                            
                            <div class="row">                    
                              <div class="col-md-6">
                                  {{-- form input strat --}}
                                  <div class="form-group row">
                                    <label for="graphic" class="col-form-label text-md-right">Graphic</label>
                                    <input type="text" id="graphic" class="form-control" name="graphic" required placeholder="Asus GT730 2GB SN-ABCDEFG" value="{{$data->graphic}}">
                                    @if ($errors->has('graphic'))
                                        <span class="text-danger">{{ $errors->first('graphic') }}</span>
                                    @endif
                                  </div>
                                  {{-- form input end --}}
                              </div>
                              <div class="col-md-6">
                                {{-- form input strat --}}
                                <div class="form-group row">
                                  <label for="antivirus" class="col-form-label text-md-right">Antivirus</label>
                                  <input type="text" id="antivirus" class="form-control" name="antivirus" required value="{{$data->antivirus}}">
                                  @if ($errors->has('antivirus'))
                                      <span class="text-danger">{{ $errors->first('antivirus') }}</span>
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
                                    <input type="text" id="power_supply" class="form-control" name="power_supply" required placeholder="Green Tech 800W SN-ABCDEFG" value="{{$data->power_supply}}">
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
                                    <input type="text" id="drive" class="form-control" name="drive" required placeholder="Lite On SN-ABCDEFG" value="{{$data->drive}}">
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
                                    <input type="text" id="casing" class="form-control" name="casing" required placeholder="Deagon 1903" value="{{$data->casing}}">
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
                                    <input type="text" id="monitor" class="form-control" name="monitor" required value="{{$data->monitor}}">
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
                                    <input type="text" id="ups" class="form-control" name="ups" required value="{{$data->ups}}">
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
                                    <input type="text" id="keyboard_mouse" class="form-control" name="keyboard_mouse" required value="{{$data->keyboard_mouse}}">
                                    @if ($errors->has('keyboard_mouse'))
                                        <span class="text-danger">{{ $errors->first('keyboard_mouse') }}</span>
                                    @endif
                                  </div>
                                  {{-- form input end --}}
                              </div>
                            </div>
                            
                            
                            <div class="row">
                              
                              <div class="col-md-12">
                                  {{-- form input strat --}}
                                  <div class="form-group row">
                                    <label for="other" class="col-form-label text-md-right">Other</label>
                                    <textarea name="other" id="other" class="form-control">{{$data->other}}</textarea>
                                    @if ($errors->has('other'))
                                        <span class="text-danger">{{ $errors->first('other') }}</span>
                                    @endif
                                  </div>
                                  {{-- form input end --}}
                              </div>
                            </div>
                          </fieldset>


                          <div class="row">
                          {{-- <div class="col-md-6"></div> --}}
                          <div class="col-md-6 d-flex justify-content-start p-0">
                            <a href="{{route('pc_sale.index')}}" class="btn btn-primary mr-1">Back</a>
                            <button type="submit" class="btn btn-success">
                              Update
                          </button>
                          </div>
                          <div class="col-md-6"></div>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>


{{-- scripts --}}
<script src="{{asset('./js/jquery-3.4.1.slim.min.js')}}"></script>
<script src="{{asset('./js/bootstrap-datepicker.min.js')}}"></script>
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
