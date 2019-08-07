@extends('layouts.app')
@section('scripts')
    <script src="{{asset('/js/search.js')}}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{asset('/')}}">Hotels</a>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <input type="search" name="search" id="search" class="form-control form-control-lg"
                                       placeholder="type here"/>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-primary mb-2 btn-block" id="search_click">Search</button>
                            </div>
                        </div>
                        <br />
                        <div id="empty"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection