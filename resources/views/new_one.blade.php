@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{asset('news')}}">News</a>
                        / {{$one->putday}} / {{$one->country_name}}</div>

                    <div class="panel-body">
{!! $one->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection