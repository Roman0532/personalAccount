{{ Form::open(['action' => 'PersonalAccountController@uploadDocuments','files' => true,'style'=>'width:55px']) }}
<input style="display:none; z-index: -1;" class="inputfile inputfile-1" type="file" name="file"
       id="uploadbtn{{$document->id.$field}}">

<label style="cursor: pointer"
       for="uploadbtn{{$document->id.$field}}"
       class="uploadButton"><span>Загрузить документ&hellip;</span></label>
<br>
<br>
{{ Form::submit('Добавить'),['name'=>'upload']}}
{{ Form::hidden('id', $document->id) }}
{{ Form::hidden('column_name',$field) }}
{{ Form::close() }}