{{ Form::open(['action' => 'PersonalAccountController@deleteDocument','files' => true]) }}
{{ Form::hidden('id', $document->id) }}
{{ Form::submit('Удалить', ['name' => 'delete']) }}
{{ Form::hidden('column_name',$field) }}
{{ Form::close() }}