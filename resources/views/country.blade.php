@extends('layouts.app')
@section('styles')
    @parent
@endsection
@section('scripts')
    @parent

    <script src="{{asset('js/country.js')}}"></script>
    <script>
        var map = new Datamap({
            element: document.getElementById('container'),
        });
        map.updateChoropleth({us: 'green'}, {reset: true})
    </script>
@endsection
@section('content')
    <div id="container"></div>
    <div class="container fly">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$obj->name_ru}} / {{$obj->name_en}}
                        <a href="/" class="close">&times;</a>
                    </div>

                    <div class="panel-body">
                        @include('templates.country')
                                           </div>
                </div>
            </div>
    </div>
@endsection
