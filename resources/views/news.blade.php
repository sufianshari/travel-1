@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">
                        @foreach($news as $one)
                            <div>
                                <a href="{{asset('news/'.$one->id)}}">
                                    {{$one->putday}} - {{$one->country_name}}
                                </a>
                            </div>
                            @endforeach
                        <div align="center">
                            {!! $news->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
