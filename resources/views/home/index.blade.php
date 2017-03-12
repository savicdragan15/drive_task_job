@extends('layouts.main')

@section('title')
    Home page
@stop

@section('content')
    <div class="row col-lg-6 col-md-12 col-sm-12 col-md-push-3 ">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <form id="regostration-form" action="{{ url('/home') }}" method="POST">
             {{ csrf_field() }}
            <h2>Vnesite svoje podatke v prazna polja:</h2>
        <div class="col-lg-6 col-md-12">
             <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
                 <input type="text" name="name" class="form-control" placeholder="Ime" id="name" tabindex="1">
                 @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Spol:</label>
                </div>
                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label>moški <input type="radio" name="gender" value="male" tabindex="3"></label>
                    <label>ženski <input type="radio" name="gender" value="female" checked="" tabindex="4"></label>
                    
                    @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                 <input type="text" name="city" class="form-control" placeholder="Mesto" id="city" tabindex="8">
                 @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
             <div class="form-group {{ $errors->has('head') ? ' has-error' : '' }}">
                 <input type="text" name="head" class="form-control" placeholder="Naslov" id="head" tabindex="10">
                 @if ($errors->has('head'))
                    <span class="help-block">
                        <strong>{{ $errors->first('head') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
           <div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
               <input type="text" class="form-control" name="surname" placeholder="Priimek" id="surname" tabindex="2">
               @if ($errors->has('surname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('day') ? ' has-error' : '' }}">
                <div class="form-group ">
                    <label>Datum rojstva:</label>
                </div>
                <div class="birthday">
                    <select name="day" id="day" tabindex="5">
                    <option>DD</option>
                      <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value=".$i.">{$i}</option>";
                        }
                      ?> 
                </select>
                    <select name="mounth" id="mounth" tabindex="6">
                    <option>MM</option>
                    <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value=".$i.">{$i}</option>";
                        }
                      ?> 
                </select>
                    <select name="year" id="year" tabindex="7">
                    <option>GGGG</option>
                    <?php
                        for ($i = 1900; $i <= 2017; $i++) {
                            echo "<option value=".$i.">{$i}</option>";
                        }
                      ?> 
                </select>
                @if ($errors->has('day'))
                    <span class="help-block">
                        <strong>{{ $errors->first('day') }}</strong>
                    </span>
                @endif
                @if ($errors->has('mounth'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mounth') }}</strong>
                    </span>
                @endif
                @if ($errors->has('year'))
                    <span class="help-block">
                        <strong>{{ $errors->first('year') }}</strong>
                    </span>
                @endif
            </div>
            </div>
            <div class="form-group {{ $errors->has('postalcode') ? ' has-error' : '' }}">
                 <input type="text" class="form-control" name="postalcode" placeholder="Poštna številka" id="postalcode" tabindex="9">
                 @if ($errors->has('postalcode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('postalcode') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('issue') ? ' has-error' : '' }}">
                 <input type="text" class="form-control" name="issue" placeholder="Številka" id="issue" tabindex="11">
                 @if ($errors->has('issue'))
                    <span class="help-block">
                        <strong>{{ $errors->first('issue') }}</strong>
                    </span>
                @endif
            </div>
        </div>
            <div class="custom-button">
                <button type="submit" class="btn btn-success" tabindex="11"><span id="button-text">POŠLJI</span> 
                    <span id="icon-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></span>
                </button>
               
            </div>
        </form>
    </div>

    <script>
        jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });
        $( "#regostration-form" ).validate({
          lang: 'sl',
          errorClass: 'error-custom',
          rules: {
            name: {
               required: true  
            },
            surname: {
               required: true  
            },
            gender: {
               required: true  
            },
            day: {
              required: true,
              number: true
            },
            mounth: {
                required: true,
                number: true
            },
            year: {
              required: true,
              number: true
            },
            city: {
              required: true
            },
            head: {
              required: true
            },
            postalcode: {
              required: true,
              number: true,
              maxlength: 5
            },
            issue: {
              required: true  
            }
            
          },
          submitHandler: function() {
              document.getElementById('regostration-form').submit();
          },
        });
    </script>
@endsection