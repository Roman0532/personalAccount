@include('layouts.appmath')
@yield('head')

<body>
<!-- </div> -->
<div class="obloko">
    <div class="main">
        @if(!\Illuminate\Support\Facades\Auth::check())
            @yield('header')
            @yield('slider')
        @endif
    </div>
    <div class="site_content">
        @yield('left-sidebar')
        <div class="content" style="float: left;width: 79%;font-size: 12px;">
            <font size="5" color="#1874CD">
                {{--<center><b>Кабинеты преподавателей</b></center>--}}
            </font><br>
            <div class="posts_content">
                <!--<span style="color: black;">Личные кабинеты преподавателей</span>-->
                <table>
                    <tbody>
                    <tr>
                        <th align="left">Дисциплина<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>
                        <th align="left">Курс<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>
                        <th align="left">Теоретичекие материалы<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>

                        <th align="left">Практические Материалы<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>

                        <th align="left">Семестровые работы<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>

                        <th align="left">Независимая работа<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>

                        <th align="left">Фос<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>

                        <th align="left">Другое<span
                                    style="color: rgb(24, 116, 205);"></span>
                        </th>
                    </tr>

                    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id === (int)$page)
                        @if($documents->isNotEmpty())
                            @foreach($documents as $document)
                                <tr>
                                    <td align="left"> @if(!empty($document->discipline->title))
                                            {{ $document->discipline->title }}

                                            {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true)) }}
                                            {{ Form::token() }}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                            {{ Form::hidden('column_name','discipline_id') }}
                                            {{ Form::close() }}

                                        @else

                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments')) }}
                                            {{ Form::token() }}
                                            <select name="discipline" class="add_discipline" id="discipline">
                                                @foreach($disciplines as $discipline)
                                                    <option value='{{$discipline->id}}'>{{$discipline->title}}</option>
                                                @endforeach
                                            </select>
                                            {{ Form::submit('Добавить',['name'=>'add_discipline'])}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','discipline_id') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left"> @if(!empty($document->course->title))
                                            {{ $document->course->title }}

                                            {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true)) }}
                                            {{ Form::token() }}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                            {{ Form::hidden('column_name','course_id') }}
                                            {{ Form::close() }}

                                        @else
                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments')) }}
                                            {{ Form::token() }}
                                            <select name="course" class="add_course" id="course">
                                                @foreach($courses as $course)
                                                    <option value='{{$course->id}}'>{{$course->title}}</option>
                                                @endforeach
                                            </select>
                                            {{ Form::submit('Добавить',['name'=>'add_course'])}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','course_id') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left"> @if($document->theoretical_material)<a
                                                href="{{$document->theoretical_material}}"><img
                                                    style="width: 45px;height: 45px;"
                                                    src="{{asset('images/document.png')}}" alt=""></a>

                                        {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true,'id' => 'form')) }}
                                        {{ Form::token() }}
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                        {{ Form::hidden('column_name','theoretical_material') }}
                                        {{ Form::close() }}
                                        @else
                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments','files' => true,'style'=>'width:55px')) }}
                                            {{ Form::token() }}
                                            <input style="display:none; z-index: -1;" class="inputfile inputfile-1"
                                                   type="file" name="file"
                                                   id="uploadbtn{{$document->id.'theoretical_material'}}">

                                            <label style="cursor: pointer"
                                                   for="uploadbtn{{$document->id.'theoretical_material'}}"
                                                   class="uploadButton"><span>Загрузить документ&hellip;</span></label>
                                            <br>
                                            <br>
                                            {{ Form::submit('Добавить')}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','theoretical_material') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left"> @if($document->practical_material)<a
                                                href="{{$document->practical_material}}"><img
                                                    style="width: 45px;height: 45px;"
                                                    src="{{asset('images/document.png')}}" alt=""></a>

                                        {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true,'id'=>'form1')) }}
                                        {{ Form::token() }}
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                        {{ Form::hidden('column_name','practical_material') }}
                                        {{ Form::close() }}

                                        @else
                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments','files' => true,'style'=>'width:55px')) }}
                                            {{ Form::token() }}
                                            <input style="display:none; z-index: -1;" class="inputfile inputfile-1"
                                                   type="file" name="file"
                                                   id="uploadbtn{{$document->id.'practical_material'}}">

                                            <label style="cursor: pointer"
                                                   for="uploadbtn{{$document->id.'practical_material'}}"
                                                   class="uploadButton"><span>Загрузить документ&hellip;</span></label>
                                            <br>
                                            <br>
                                            {{ Form::submit('Добавить')}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','practical_material') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left"> @if($document->semester_work)<a
                                                href="{{$document->semester_work}}"><img
                                                    style="width: 45px;height: 45px;"
                                                    src="{{asset('images/document.png')}}" alt=""></a>

                                        {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true)) }}
                                        {{ Form::token() }}
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                        {{ Form::hidden('column_name','semester_work') }}
                                        {{ Form::close() }}

                                        @else
                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments','files' => true,'style'=>'width:55px')) }}
                                            {{ Form::token() }}
                                            <input style="display:none; z-index: -1;" class="inputfile inputfile-1"
                                                   type="file" name="file"
                                                   id="uploadbtn{{$document->id.'semester_work'}}">
                                            <label style="cursor: pointer"
                                                   for="uploadbtn{{$document->id.'semester_work'}}"
                                                   class="uploadButton"><span>Загрузить документ&hellip;</span></label>
                                            <br>
                                            <br>
                                            {{ Form::submit('Добавить')}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','semester_work') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left"> @if($document->independent_work)<a
                                                href="{{$document->independent_work}}"><img
                                                    style="width: 45px;height: 45px;"
                                                    src="{{asset('images/document.png')}}" alt=""></a>

                                        {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true)) }}
                                        {{ Form::token() }}
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                        {{ Form::hidden('column_name','independent_work') }}
                                        {{ Form::close() }}

                                        @else
                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments','files' => true,'style'=>'width:55px')) }}
                                            {{ Form::token() }}
                                            <input style="display:none; z-index: -1;" class="inputfile inputfile-1"
                                                   type="file" name="file"
                                                   id="uploadbtn{{$document->id.'independent_work'}}">
                                            <label style="cursor: pointer"
                                                   for="uploadbtn{{$document->id.'independent_work'}}"
                                                   class="uploadButton"><span>Загрузить документ&hellip;</span></label>
                                            <br>
                                            <br>
                                            {{ Form::submit('Добавить')}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','independent_work') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left"> @if($document->fos)<a
                                                href="{{$document->fos}}"><img
                                                    style="width: 45px;height: 45px;"
                                                    src="{{asset('images/document.png')}}" alt=""></a>

                                        {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true)) }}
                                        {{ Form::token() }}
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                        {{ Form::hidden('column_name','fos') }}
                                        {{ Form::close() }}

                                        @else
                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments','files' => true,'style'=>'width:55px')) }}
                                            {{ Form::token() }}
                                            <input style="display:none; z-index: -1;" class="inputfile inputfile-1"
                                                   type="file" name="file"
                                                   id="uploadbtn{{$document->id.'fos'}}">
                                            <label style="cursor: pointer"
                                                   for="uploadbtn{{$document->id.'fos'}}"
                                                   class="uploadButton"><span>Загрузить документ&hellip;</span></label>
                                            <br>
                                            <br>
                                            {{ Form::submit('Добавить')}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','fos') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left"> @if($document->other)<a
                                                href="{{$document->other}}"><img
                                                    style="width: 45px;height: 45px;"
                                                    src="{{asset('images/document.png')}}" alt=""></a>

                                        {{ Form::open(array('action' => 'AdminController@deleteDocument','files' => true)) }}
                                        {{ Form::token() }}
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::submit('Удалить', ['name' => 'delete']) }}
                                        {{ Form::hidden('column_name','other') }}
                                        {{ Form::close() }}

                                        @else
                                            {{ Form::open(array('action' => 'AdminController@uploadDocuments','files' => true,'style'=>'width:55px')) }}
                                            {{ Form::token() }}
                                            <input style="display:none; z-index: -1;" class="inputfile inputfile-1"
                                                   type="file" name="file"
                                                   id="uploadbtn{{$document->id.'other'}}">
                                            <label style="cursor: pointer"
                                                   for="uploadbtn{{$document->id.'other'}}"
                                                   class="uploadButton"><span>Загрузить документ&hellip;</span></label>
                                            <br>
                                            <br>
                                            {{ Form::submit('Добавить')}}
                                            {{ Form::hidden('id', $document->id) }}
                                            {{ Form::hidden('column_name','other') }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>

                                    <td align="left">
                                        {{ Form::open(array('action' => 'AdminController@deleteAllDocuments')) }}
                                        {{ Form::token() }}
                                        <label for="deleteBtn{{$document->id}}" id="labelDeleteBtn"><img
                                                    style="width:20px;height: 20px"
                                                    src="{{asset('images/cross.png')}}"
                                                    alt=""></label>
                                        <br>
                                        <input type="submit" name="deleteAll" id="deleteBtn{{$document->id}}"
                                               value="Удалить дисциплину"
                                               style="opacity: 0;width: 10px;">
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::close() }}
                                    </td>

                                    @endforeach
                                </tr>

                                @endif
                                <!-- Нет документа-->
                                {{ Form::open(array('action' => 'AdminController@createDocuments')) }}
                                {{ Form::token() }}
                                {{ Form::submit('Создать', ['name' => 'create']) }}
                                {{ Form::close() }}

                                <br>
                                @else
                                    @if($documents->isNotEmpty())
                                        @foreach($documents as $document)
                                            <tr>
                                                <td> @if(!empty($document->discipline->title))
                                                        {{ $document->discipline->title }}
                                                    @endif
                                                </td>

                                                <td> @if(!empty($document->course->title)){{$document->course->title}}
                                                    @endif
                                                </td>

                                                <td> @if($document->theoretical_material)<a
                                                            href="{{$document->theoretical_material}}"><img
                                                                style="width: 45px;height: 45px;"
                                                                src="{{asset('images/document.png')}}" alt=""></a>
                                                    @endif
                                                </td>

                                                <td> @if($document->practical_material)<a
                                                            href="{{$document->practical_material}}"><img
                                                                style="width: 45px;height: 45px;"
                                                                src="{{asset('images/document.png')}}" alt=""></a>
                                                    @endif
                                                </td>

                                                <td> @if($document->semester_work)<a
                                                            href="{{$document->semester_work}}"><img
                                                                style="width: 45px;height: 45px;"
                                                                src="{{asset('images/document.png')}}" alt=""></a>
                                                    @endif
                                                </td>

                                                <td> @if($document->independent_work)<a
                                                            href="{{$document->independent_work}}"><img
                                                                style="width: 45px;height: 45px;"
                                                                src="{{asset('images/document.png')}}" alt=""></a>
                                                    @endif
                                                </td>

                                                <td> @if($document->fos)<a
                                                            href="{{$document->fos}}"><img
                                                                style="width: 45px;height: 45px;"
                                                                src="{{asset('images/document.png')}}" alt=""></a>
                                                    @endif
                                                </td>

                                                <td> @if($document->other)<a
                                                            href="{{$document->other}}"><img
                                                                style="width: 45px;height: 45px;"
                                                                src="{{asset('images/document.png')}}" alt=""></a>
                                                    @endif
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endif
                                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@yield('footer')

<style>
    .posts_content img {
        width: 180px;
        height: 220px;
        float: left;
        margin: 0 7px 9px 0;
        border: outset 3px solid #000000;
        border-radius: 5px;
    }

    .content {
        font: 14px sans-serif;
    }

    .add_discipline {
        width: 150px;
    }

    .add_course {
        width: 50px;
    }

    #labelDeleteBtn {
        cursor: pointer;
    }

    #uploadbtn {
        width: 100%;
    }

    table {
        width: 100%;
        line-height: 1.5em;

    }

    tr > :first-child {
        width: 10%;
    }

    tr > :last-child {
        position: relative;
    }

    tr > :last-child > div {
        position: absolute;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    th {
        text-align: center;
        font-size: 12px;
    }

    td {
        text-align: center;
        width: 10%;
    }

    .posts_content img {
        float: none
    }

</style>
<script type="text/javascript" src="{{ url('js/custom-file-input.js') }}"></script>

{{--<script type="text/javascript">--}}
{{--var sel = document.getElementById("discipline"); // Получаем наш список--}}
{{--var distance = sel.options[sel.selectedIndex].text;--}}
{{--$.ajax({--}}
{{--type: 'get',              // Задаем метод передачи--}}
{{--url: '/doc', // URL для передачи параметра--}}
{{--data: {distance:distance},--}}
{{--success: function(data) {--}}
{{--alert(data)--}}
{{--}--}}
{{--});--}}
{{--</script>--}}