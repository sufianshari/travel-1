@extends('layouts.app')
@section('scripts')
    @parent

@endsection
@section('content')
    <div id="container"></div>
    <div class="container fly">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{asset($obj->country->code_3.'/'.$obj->country->name_en)}}">
                        {{$obj->country->name_ru}} /
                    </a> {{$obj->name_ru}} <br/>
                    <a href="{{asset($obj->country->code_3.'/'.$obj->country->name_en)}}">
                        {{$obj->country->name_en}}
                    </a>
                    / {{$obj->name_en}}
                </div>

                <div class="panel-body">
                    <iframe width="100%" height="650px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox={{$obj->country->country_geo->box}}&amp;layer=mapnik&amp;marker={{$obj->latitude}}%2C{{$obj->longitude}}" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=53.9217&amp;mlon=27.5812#map=10/53.9217/27.5812">Посмотреть более крупную карту</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection
