@extends('layouts.app')
@section('scripts')
	@parent
 <script src={{asset('js/cabinet.js')}}>
 
  </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add photo</div>

                    <div class="panel-body">
						<form action="{{asset('cabinet')}}" method="post">
							{!!csrf_field()!!}
						<datalist id="myData">
							<option value="0" label="City">
							<option value="0" label="City2">
						</datalist>
  <div class="form-group">
    <label for="countryInput">Country</label>
	<select class="form-control" name="countryInput" id="countryInput">
	@foreach($countries as $country)
	<option value="{{$country->id}}">{{$country->country_name}}
	</option>
	@endforeach
	</select>
  </div>
  <div class="form-group">
    <label for="cityInput">City</label>
    <input type="text" class="form-control" name="cityInput" id="cityInput" placeholder="City" list="myData">
  </div>
  <div class="form-group">
    <label for="exampleInputPhoto">Photo input</label>
    <input type="file" name="exampleInputFile" id="exampleInputPhoto">
    <p class="help-block">Choose path to your photo.</p>
  </div>
   <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description">I was here.</textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form></div>	
                </div>
            </div>
        </div>
    </div>
@endsection
