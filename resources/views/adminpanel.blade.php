@include('layouts.appmath')
@yield('head')
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

<!-- Styles -->
<script type="text/javascript">
    function viewdiv(id, button) {
        var el = document.getElementById(id[0]);
        var e2 = document.getElementById(id[1]);
        var e3 = document.getElementById(id[2]);
        var e4 = document.getElementById(id[3]);
        var b1 = document.getElementById(button[0]);
        var b2 = document.getElementById(button[1]);
        var b3 = document.getElementById(button[2]);
        var b4 = document.getElementById(button[3]);


        if (el.style.display == "block") {
            el.style.display = "none";
            b1.style.background = '#6c757d';
        } else {
            b1.style.background = '#c8cbcf'
            el.style.display = "block";
        }
        e2.style.display = "none";
        e3.style.display = "none";
        e4.style.display = "none";
        b2.style.background = "#6c757d";
        b3.style.background = "#6c757d";
        b4.style.background = "#6c757d";

    }
</script>
<style>

    .success {
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: #636b6f;
        color: #fff;
        text-align: center;
    }

    .function {
        margin: 0 auto;
        width: 100%;
        height: 50px;
    }

    .form, .form1, .form2, .form3 {
        width: 100%;
        height: 500px;
        text-align: center;
        margin-top: 10px;
    }

    .admin-button {
        float: left;
        width: 25%;
    }

    .card-body {
        text-align: center;
        margin-top: 15px;
    }

    .card-body input {
        padding: 8px;
    }

    button.btn {
        margin-top: 10px;
        background: #6c757d;
        border: none;
    }

    .btn {
        margin-top: 10px;
        background: #6c757d;
        color: #fff;
        border-radius: 8px;
    }

    .admin-button:hover {
        background: #6c757d;
    }

    .admin-button {
        background: #636b6f;
        border: none;
    }

    #select {
        padding: 8px;
    }


</style>
<body>
<div class="obloko">
    <div class="main">
    </div>
    <div class="site_content">
        @yield('sidebar')
        @yield('left-sidebar')
        <div class="content">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
            @if(session()->has('success'))
                <div class="success">
                    {{session()->get('success')}}
                </div>
            @endif
            <div class="function">
                <button class="admin-button"
                        onclick="viewdiv(['form','form1','form2','form3'],[this.id,'deleteUser','addDiscipline','deleteDiscipline']);"
                        id="addUser"
                        name="addUser">
                    Добавить
                    пользователя
                </button>
                <button class="admin-button"
                        onclick="viewdiv(['form1','form','form2','form3'],[this.id,'addUser','addDiscipline','deleteDiscipline']);"
                        id="deleteUser" name="delete-user">
                    Удалить
                    пользователя
                </button>
                <button class="admin-button"
                        onclick="viewdiv(['form3','form','form1','form2'],[this.id,'addUser','deleteUser','deleteDiscipline']);"
                        id="addDiscipline" name="add-discipline">
                    Добавить
                    дисциплину
                </button>
                <button class="admin-button"
                        onclick="viewdiv(['form2','form','form1','form3'],[this.id,'addUser','addDiscipline','deleteUser']);"
                        id="deleteDiscipline" name="delete-discipline">
                    Удалить дисциплину
                </button>
            </div>

            <div style="display:none;" id="form1" class="form1">
                {{ Form::open(['action' => 'PersonalAccountController@deleteTeacher']) }}
                {{ Form::token() }}
                <select name="teachers" class="delete_teachers" id="select">
                    @foreach($teachers->except(1) as $teacher)
                        <option value='{{$teacher->id}}'>{{$teacher->full_name}}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn" value="Удалить пользователя" name="deleteTeacher">
                {{ Form::close() }}
            </div>

            <div style="display:none;" id="form2" class="form2">
                {{ Form::open(['action' => 'PersonalAccountController@deleteDiscipline']) }}
                {{ Form::token() }}
                <select name="discipline" class="delete_discipline" id="select">
                    @foreach($disciplines as $discipline)
                        <option value='{{$discipline->id}}'>{{$discipline->title}}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn" name="deleteDiscipline" value="Удалить дисциплину">
                {{ Form::close() }}
            </div>

            <div style="display:none;" id="form3" class="form3">
                {{ Form::open(['action' => 'PersonalAccountController@addDiscipline']) }}
                {{ Form::token() }}
                <input type="text" name="discipline" style="padding:8px;width: 41%"
                       placeholder="Введите название дисциплины">
                <select name="teachers" class="teachers" id="select">
                    @foreach($teachers as $teacher)
                        <option value='{{$teacher->id}}'>{{$teacher->full_name}}</option>
                    @endforeach
                </select> <br>
                <input type="submit" class="btn" name="addDiscipline" value="Добавить дисциплину">
                {{ Form::close() }}
            </div>

            <div style="display:none;" id="form" class="form">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="full_name"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Имя Фамилия Отчество') }}</label>

                                            <div class="col-md-6">
                                                <input id="full_name" type="text"
                                                       class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}"
                                                       name="full_name" value="{{ old('full_name') }}" required
                                                       autofocus>

                                                @if ($errors->has('full_name'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                       name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Введите пароль еще раз') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn">
                                                    {{ __('Добавить пользователя') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('footer')
