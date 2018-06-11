@include('layouts.appmath')
@yield('head')
<style>
    .posts_content img {
        width: 180px;
        height: 220px;
        float: left;
        margin: 0 7px 9px 0;
        border: outset 3px solid #000;
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

    .danger {
        padding: 20px;
        background-color: red;
        color: #fff;
    }

</style>
<body>
<!-- </div> -->
<div class="obloko">
    <div class="main">
        @if(!auth()->check())
            @yield('header')
            @yield('slider')
        @endif
    </div>
    <div class="site_content">
        @yield('left-sidebar')
        <div class="content" style="float: left;width: 79%;font-size: 12px;">
            <font size="5" color="#1874CD">
            </font><br>
            <div class="posts_content">
                <table>
                    <tbody>
                    <tr>
                        <th align="left">Дисциплина<span style="color: rgb(24, 116, 205);"></span></th>
                        <th align="left">Курс<span style="color: rgb(24, 116, 205);"></span></th>
                        <th align="left">Теоретичекие материалы<span style="color: rgb(24, 116, 205);"></span></th>
                        <th align="left">Практические Материалы<span style="color: rgb(24, 116, 205);"></span></th>
                        <th align="left">Семестровые работы<span style="color: rgb(24, 116, 205);"></span></th>
                        <th align="left">Независимая работа<span style="color: rgb(24, 116, 205);"></span></th>
                        <th align="left">Фос<span style="color: rgb(24, 116, 205);"></span></th>
                        <th align="left">Другое<span style="color: rgb(24, 116, 205);"></span></th>
                    </tr>
                    @if(session()->has('danger'))
                        <div class="danger">
                            {{session()->get('danger')}}
                        </div>
                    @endif

                    @if(auth()->check() && auth()->user()->id === (int)$page)
                        @if($documents->isNotEmpty())
                            @foreach($documents as $document)
                                <tr>
                                    <td align="left"> @if(!empty($document->discipline->title))
                                            {{ $document->discipline->title }}
                                            @include('forms.forms-delete',['document'=> $document,'field'=>'discipline_id']) @else
                                            @include('forms.forms-select',['class'=>'add_discipline','selectName'=>'discipline','document'=> $document,
                                             'submitName'=>'add_discipline', 'field'=>'discipline_id','values'=>$disciplines]) @endif
                                    </td>

                                    <td align="left"> @if(!empty($document->course->title))
                                            {{ $document->course->title }}
                                            @include('forms.forms-delete',['document'=> $document,'field'=>'course_id']) @else
                                            @include('forms.forms-select',['class'=>'add_course',
                                            'selectName'=>'course','document'=> $document ,'submitName'=>'add_course',
                                             'field'=>'course_id','values'=>$courses]) @endif
                                    </td>

                                    <td align="left"> @if($document->theoretical_material)<a
                                                href="{{Storage::url($document->theoretical_material)}}">
                                            <img style="width: 45px;height: 45px;"
                                                 src="{{asset('images/document.png')}}" alt=""></a>
                                        @include('forms.forms-delete',['document'=> $document,'field'=>'theoretical_material']) @else
                                            @include('forms.forms-upload',['document'=> $document,'field'=>'theoretical_material']) @endif
                                    </td>

                                    <td align="left"> @if($document->practical_material)<a
                                                href="{{Storage::url($document->practical_material)}}">
                                            <img style="width: 45px;height: 45px;"
                                                 src="{{asset('images/document.png')}}" alt=""></a>
                                            @include('forms.forms-delete',['document'=> $document,'field'=>'practical_material']) @else
                                            @include('forms.forms-upload',['document'=> $document,'field'=>'practical_material']) @endif
                                    </td>

                                    <td align="left"> @if($document->semester_work)<a
                                                href="{{Storage::url($document->semester_work)}}">
                                            <img style="width: 45px;height: 45px;"
                                                 src="{{asset('images/document.png')}}" alt=""></a>
                                            @include('forms.forms-delete',['document'=> $document,'field'=>'semester_work']) @else
                                            @include('forms.forms-upload',['document'=> $document,'field'=>'semester_work']) @endif
                                    </td>

                                    <td align="left"> @if($document->independent_work)<a
                                                href="{{Storage::url($document->independent_work)}}">
                                            <img style="width: 45px;height: 45px;"
                                                 src="{{asset('images/document.png')}}" alt=""></a>
                                            @include('forms.forms-delete',['document'=> $document,'field'=>'independent_work']) @else
                                            @include('forms.forms-upload',['document'=> $document,'field'=>'independent_work']) @endif
                                    </td>

                                    <td align="left"> @if($document->fos)<a href="{{Storage::url($document->fos)}}">
                                            <img style="width: 45px;height: 45px;"
                                                 src="{{asset('images/document.png')}}" alt=""></a>
                                            @include('forms.forms-delete',['document'=> $document,'field'=>'fos']) @else
                                            @include('forms.forms-upload',['document'=> $document,'field'=>'fos']) @endif
                                    </td>

                                    <td align="left"> @if($document->other)<a href="{{Storage::url($document->other)}}">
                                            <img style="width: 45px;height: 45px;"
                                                 src="{{asset('images/document.png')}}" alt=""></a>
                                            @include('forms.forms-delete',['document'=> $document,'field'=>'other']) @else
                                            @include('forms.forms-upload',['document'=> $document,'field'=>'other']) @endif
                                    </td>

                                    <td align="left">
                                        {{ Form::open(['action' => 'PersonalAccountController@deleteAllDocuments']) }}
                                        <label for="deleteBtn{{$document->id}}" id="labelDeleteBtn">
                                            <img style="width:20px;height: 20px" src="{{asset('images/cross.png')}}"
                                                 alt=""></label> <br>
                                        <input type="submit" name="deleteAll" id="deleteBtn{{$document->id}}"
                                               value="Удалить дисциплину" style="opacity: 0;width: 10px;">
                                        {{ Form::hidden('id', $document->id) }}
                                        {{ Form::close() }}
                                    </td>

                                    @endforeach
                                </tr>

                                @endif
                                <!-- Нет документа-->
                                {{ Form::open(['action' => 'PersonalAccountController@createDocuments']) }}
                                {{ Form::submit('Создать', ['name' => 'create']) }}
                                {{ Form::close() }}

                                <br>
                                @else
                                    @if($documents->isNotEmpty())
                                        @foreach($documents as $document)
                                            @if(!empty($document->discipline->title) || !empty($document->course->title)
                                             || !empty($document->theoretical_material) && !empty($document->practical_material) || !empty($document->semester_work)
                                              || !empty($document->independent_work) || !empty($document->fos) || !empty($document->other))
                                                <tr>
                                                    <td> @if(!empty($document->discipline->title))
                                                            {{ $document->discipline->title }}
                                                        @endif
                                                    </td>

                                                    <td> @if(!empty($document->course->title)){{$document->course->title}}
                                                        @endif
                                                    </td>
                                                    @include('tableForStudent',['field' => 'theoretical_material'])
                                                    @include('tableForStudent',['field' => 'practical_material'])
                                                    @include('tableForStudent',['field' => 'semester_work'])
                                                    @include('tableForStudent',['field' => 'independent_work'])
                                                    @include('tableForStudent',['field' => 'fos'])
                                                    @include('tableForStudent',['field' => 'other'])
                                                    @endif
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
<script type="text/javascript" src="{{ url('js/custom-file-input.js') }}"></script>