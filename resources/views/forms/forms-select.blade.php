{{ Form::open(['action' => 'PersonalAccountController@uploadData']) }}
<select name="{{$selectName}}" class="{{$class}}">
    @foreach($values as $value)
        <option value='{{$value->id}}'>{{$value->title}}</option>
    @endforeach
</select>
{{ Form::submit('Добавить',['name'=>$submitName])}}
{{ Form::hidden('id', $document->id) }}
{{ Form::hidden('column_name',$field) }}
{{ Form::close() }}