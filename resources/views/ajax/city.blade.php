<ul>
@foreach($cities as $one)
<li>
	<a href="{{asset('city/'.$one->id)}}?time={{time()}}">
	{{$one->name_ru}} ({{$one->name_en}})
	</a>
	</li>
@endforeach
</ul>