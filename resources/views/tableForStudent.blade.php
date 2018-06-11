<td> @if($document->$field)
     <a href="{{$document->$field}}"><img
                style="width: 45px;height: 45px;"
                src="{{asset('images/document.png')}}" alt=""></a>

    @endif
</td>