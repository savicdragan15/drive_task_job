@extends('layouts.main')
@section('content')
    <div class="row col-lg-6 col-md-12 col-sm-12 col-md-push-3 ">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <form action="{{ url('/home') }}" method="POST">
             {{ csrf_field() }}
            <h2>Vnesite svoje podatke v prazna polja:</h2>
        <div class="col-lg-6 col-md-12">
             <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
                 <input type="text" name="name" class="form-control" placeholder="Ime" id="name">
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
                    <label>moški <input type="checkbox" name="gender" value="male"></label>
                    <label>ženski <input type="checkbox" name="gender" value="female" checked=""></label>
                    
                    @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                 <input type="text" name="city" class="form-control" placeholder="Mesto" id="city">
                 @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
             <div class="form-group {{ $errors->has('head') ? ' has-error' : '' }}">
                 <input type="text" name="head" class="form-control" placeholder="Naslov" id="city">
                 @if ($errors->has('head'))
                    <span class="help-block">
                        <strong>{{ $errors->first('head') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
           <div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
               <input type="text" class="form-control" name="surname" placeholder="Priimek" id="surname">
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
                <select name="day">
                    <option>DD</option>
                      <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value=".$i.">{$i}</option>";
                        }
                      ?> 
                </select>
                <select name="mounth">
                    <option>MM</option>
                    <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value=".$i.">{$i}</option>";
                        }
                      ?> 
                </select>
                <select name="year">
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
            <div class="form-group {{ $errors->has('postalcode') ? ' has-error' : '' }}">
                 <input type="text" class="form-control" name="postalcode" placeholder="Poštna številka" id="surname">
                 @if ($errors->has('postalcode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('postalcode') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('issue') ? ' has-error' : '' }}">
                 <input type="text" class="form-control" name="issue" placeholder="Številka" id="surname">
                 @if ($errors->has('issue'))
                    <span class="help-block">
                        <strong>{{ $errors->first('issue') }}</strong>
                    </span>
                @endif
            </div>
        </div>
            <div class="">
                <button type="submit" class="btn btn-success">Link</button>
            </div>
        </form>
    </div>
    
@endsection