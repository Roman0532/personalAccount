@include('layouts.appmath')
@yield('head')
<body>
<div class="obloko">
    <div class="main">
@yield('header')
@yield('slider')
    </div>
    <div class="site_content">
@yield('sidebar')
        @yield('left-sidebar')
        <div class="content">
            <font size="5" color="#1874CD">
                <center><b>Кабинеты преподавателей</b></center>
            </font><br>
            <div class="posts_content">
                <!--<span style="color: black;">Личные кабинеты преподавателей</span>-->
                <table>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td align="left"><a href="/teacher/{{$teacher->email}}"><span
                                            style="color: rgb(24, 116, 205);"><span
                                                style="text-decoration: underline;">{{$teacher->full_name}}</span></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>

            </div>
        </div>


    </div>

</div>
@yield('footer')
