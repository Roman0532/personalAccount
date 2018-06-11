@extends('layouts.app')
        <!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Главная страница</title><meta name="description" content="Кафедра прикладной математики">
    <meta name="keywords" content="Кемгу">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/cycle.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <link rel="stylesheet" href="main.css">

    <script type="text/javascript">$(document).ready(function(){
            $(window).scroll(function () {if ($(this).scrollTop() > 0) {$('#scroller').fadeIn();} else {$('#scroller').fadeOut();}});
            $('#scroller').click(function () {$('body,html').animate({scrollTop: 0}, 400); return false;});
        });</script></head>

<body>
<div class="obloko">
    <div class="main">

        <div class="header">
            <div class="logo"><a href="index.html">
                </a><div class="gerb">
                    <a href="index.html">			    	<img src="assets/img/logo.png">
                    </a></div>
                <a href="index.html">				</a><div class="logo_text">
                    <a href="index.html">					</a><h1><m><w><a href="index.html">KЕМЕРОВСКИЙ ГОСУДАРСТВЕННЫЙ УНИВЕРСИТЕТ</a></w></m></h1>
                    <a href="index.html">					</a><h2><w><a href="index.html">К</a></w><a href="index.html">АФЕДРА <w>П</w>РИКЛАДНОЙ <w>М</w>АТЕМАТИКИ</a></h2>
                </div>
                <div class="dante">
                    <h1>(3842) <w> 58-37-43 </w></h1>
                    <h2>E-MAIL:<a href="instruction.html"><w> applmath@kemsu.ru </w></a></h2>
                </div>

            </div>

            <br>
            <br><p></p><hr>
        </div>

        <div id="slider">
            <div id="container">
                <div class="1"></div>
                <div class="images">
                    <img src="assets/img/111.jpg" height="300" width="1085">
                    <img src="assets/img/222.jpg" height="300" width="1085">
                    <img src="assets/img/333.jpg" height="300" width="1085">
                    <img src="assets/img/444.jpg" height="300" width="1085">

                    <img src="assets/img/666.jpg" height="300" width="1085">
                    <img src="assets/img/777.jpg" height="300" width="1085">
                </div>
                <div class="2"></div>
            </div>
        </div>




    </div>
    <div class="site_content">

        <div class="sidebar_container">





            <div class="sidebar">
                <h2>Полезные ссылки<hr></h2>
                <a href="http://www.kemsu.ru">
                    <img src="assets/img/kemstu.gif" style="margin-top: 20px;" border="0" height="50" width="200"></a>

                <a href="http://www.math.kemsu.ru">
                    <img src="assets/img/math.gif" style="margin-top: 20px;" border="0" height="50" width="200"></a>

                <a href="http://elibrary.ru">
                    <img src="assets/img/elb.jpg" style="margin-top: 20px;" border="0" height="50" width="200"></a>

                <a href="http://edu.kemsu.ru">
                    <img src="assets/img/edu2.gif" style="margin-top: 20px;" border="0" height="50" width="200"></a>


                <a href="http://niais.kemsu.ru/conf">
                    <img src="assets/img/oldconf.gif" style="margin-top: 20px;" border="0" height="50" width="200"></a>


                <a href="http://www.kemsu.ru/departments/cce/prof_sotr.html">
                    <img src="assets/img/profkom150x50.gif" style="margin-top: 20px;" border="0" height="50" width="200"></a>

                <a href="http://studclub.kemsu.ru">
                    <img src="assets/img/stud_club150x50.gif" style="margin-top: 20px;" border="0" height="50" width="200"></a>

                <a href="http://science.kemsu.ru">
                    <img src="assets/img/ban2_150x50.gif" style="margin-top: 20px;" border="0" height="50" width="200"></a>


            </div>



        </div>
        <div class="menu">
            <div class="menu2">
                <h2>Меню<hr></h2>
                <p><button onclick="parent.location='index.html'">Главная</button></p>
                <p><button onclick="parent.location='news.html'">Объявления и информация</button></p>
                <p><button onclick="parent.location='prezent.html'">Презентация кафедры</button></p>
                <p><button onclick="parent.location='sotrudniki.blade.php.html'">Сотрудники</button></p>
                <p><button onclick="parent.location='document.html'">Учебная работа</button></p>
                <p><button onclick="parent.location='praktika.html'">Практики обучающихся </button></p>
                <p><button onclick="parent.location='nip.html'">Научная и издательская работа</button></p>
                <p><button onclick="parent.location='materials.html'">Кабинеты преподавателей</button></p>
                <p><button onclick="parent.location='bacalavr.html'">Страница бакалавров</button></p>
                <p><button onclick="parent.location='magistr.html'">Страница магистрантов</button></p>
                <p><button onclick="parent.location='zaochnik.html'">Страница заочников</button></p>
                <!--<p><button onclick="parent.location='trud.html'">Труды кафедры</button></p>-->
                <p><button onclick="parent.location='resurs.html'">Ресурсы</button></p>
                <p><button onclick="parent.location='instruction.html'">Обратная связь</button></p>
                <p><button onclick="parent.location='foto.html'">Фотогалерея</button></p>

            </div>
            <div class="menu2">
                <object type="application/x-shockwave-flash" data="1.swf" height="250" width="200">

                    <param name="movie" value="transparent">
                </object>



            </div>
        </div>
        <div class="content">
            <font size="5" color="#1874CD"><center><b>Кабинеты преподавателей</b></center></font><br>
            <div class="posts_content">
                <!--<span style="color: black;">Личные кабинеты преподавателей</span>-->
                <table>
                    <tbody><tr>
                        <td align="left"><a href="danilov.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Данилов Николай Николаевич</span></span></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Kartashov.html"><span style="text-decoration: underline;"><span style="color: rgb(24, 116, 205);">Карташов Владимир Яковлевич</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Krutikov.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Крутиков Владимир Николаевич</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Meshechkin.html"><span style="text-decoration: underline;"><span style="color: rgb(24, 116, 205);">Мешечкин Владимир Викторович</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Glinchikov.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Глинчиков Константин Евгеньевич</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Chernova.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Чернова Екатерина Сергеевна</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Tolstynov.html"><span style="text-decoration: underline;"><span style="color: rgb(24, 116, 205);">Толстунов Владимир Андреевич</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Gutova.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Гутова Светлана Геннадьевна</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Novoselceva.html"><span style="text-decoration: underline;"><span style="color: rgb(24, 116, 205);">Новосельцева Марина Александровна</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="zlobina.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Злобина Светлана Леонидовна</span></span></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="kagan.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Каган Елена Сергеевна</span></span></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Indenko.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Инденко Оксана Николаевна</span></span><br></a></td>
                    </tr>
                    <tr>
                        <!--<td align="left"><a href="Kosenkova.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Косенкова Мария Викторовна</span></span><br></a></td>
                    </tr>
                    <tr>
                        <td align="left"><a href="Altemerova.html"><span style="color: rgb(24, 116, 205);"><span style="text-decoration: underline;">Алтемерова Олеся Александровна</span></span><br></a></td>
                    </tr>-->
                    </tbody></table>
                <br>

            </div>
        </div>


    </div>

</div>




<div class="obloko">
    <div class="footer">
        <hr>
        <div class="foot">
            <br>
            <p>Адрес: <w>г. Кемерово, пр.Советский, 73, ауд. 202в, 203в.</w></p>
            <p>Телефон: (3842)<w> 58-37-43</w></p>
            <p>E-mail:<a href="instruction.html"><w> applmath@kemsu.ru</w></a></p>

            <p>График работы: <w>пн.-пт., 9:00-18:00</w>, перерыв на обед: <w>13:00-14:00</w></p>
        </div>
        <div class="food">
            <iframe src="https://www.google.com/maps/embed?pb=%211m18%211m12%211m3%211d4536.98058392495%212d86.10039305679264%213d55.34944481477504%212m3%211f0%212f0%213f0%213m2%211i1024%212i768%214f13.1%213m3%211m2%211s0x42d80957817a6b29%3A0x7253138bb6306189%212z0JrQtdC80LXRgNC-0LLRgdC60LjQuSDQs9C-0YHRg9C00LDRgNGB0YLQstC10L3QvdGL0Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgg%215e0%213m2%211sru%212sru%214v1481034436231" style="border: 0pt none ;" allowfullscreen="" frameborder="0" height="200" width="300"></iframe>
        </div>
    </div>
</div>
<div id="scroller" class="b-top" style="display: none;"><span class="b-top-but">наверх</span></div>
</body></html>
