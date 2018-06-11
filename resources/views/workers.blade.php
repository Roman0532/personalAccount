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
            <h2> Сотрудники кафедры </h2>
            <div class="posts_content">
                <table>
                    <tbody><tr>
                        <td class="center"><img src="{{asset('images/Kagan.jpg')}}"></td>

                        <td class="center"><p align="justify"><w>Каган Елена Сергеевна</w> – зав. кафедрой, кандидат технических наук, доцент
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Математические методы в психологии;</li>
                                <li>Теория вероятностей и математическая статистика;</li>
                                <li>Анализ и моделирование социальных процессов;</li>

                                <li>Избранные главы прикладной статистики;</li>
                                <li>Методы анализа и обработки данных для принятия управленчесих решений.</li>
                            </ul>
                        </td>

                    </tr>
                    </tbody></table>
                <hr>

                <table>
                <table>
                    <hr>
                    <tr>
                        <td class="center"><img src="{{asset('images/Chernova.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Чернова Екатерина Сергеевна</w>
                                – зам. зав. кафедрой, кандидат физико-математических наук, старший преподаватель
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Финансовая математика;</li>
                                <li>Исследование операций;</li>
                                <li>Системный анализ;</li>
                                <li>Теория игр и исследование операций;</li>
                                <li>Информационный бизнес.</li>

                            </ul>
                        </td>

                    </tr>
                </table>
                <table>
                    <hr>
                    <tr>
                        <td class="center"><img src="{{asset('images/Krutikov.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Крутиков Владимир Николаевич</w>
                                – доктор технических наук, профессор
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Анализ данных;</li>
                                <li>Методы оптимизации;</li>
                                <li>Нейронные сети;</li>
                                <li>Системный анализ;</li>
                                <li>Методы оптимизации и исследование операций;</li>
                                <li>Методы распознавания образов.</li>
                            </ul>
                        </td>

                    </tr>
                </table>
                <table>


                    <hr>

                    <tr>
                        <td class="center"><img src="{{asset('images/Meshechkin.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Мешечкин Владимир Викторович</w>
                                – кандидат физико-математических наук, доцент, заместитель декана
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Непрерывные математические модели;</li>
                                <li>Теория вычислительных процессов и структур;</li>
                                <li>Математическая экономика на ПК;</li>
                                <li>Теория прогнозирования;</li>

                                <li>Статистика.</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                <table>


                    <hr>

                    <tr>
                        <td class="center"><img src="{{asset('images/Tolstunov.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Толстунов Владимир Андреевич</w>
                                – кандидат технических наук, доцент
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Теория вероятностей и математическая статистика;</li>

                                <li>Теория случайных процессов;</li>
                                <li>Дополнительные главы математической статистики.</li>
                            </ul>
                        </td>

                    </tr>
                </table>
                <table>


                    <hr>

                    <tr>
                        <td class="center"><img src="{{asset('images/Gutova.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Гутова Светлана Геннадьевна</w>
                                – кандидат технических наук, доцент
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Дискретная математика;</li>

                                <li>Теория вероятностей и математическая статистика;</li>
                                <li>Дискретная математика и математическая логика;</li>
                                <li>Применение непрерывных дробей при построении математических моделей.</li>
                            </ul>
                        </td>

                    </tr>

                </table>
                <table>


                    <hr>

                    <tr>
                        <td class="center"><img src="{{asset('images/Novoselceva.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Новосельцева Марина Александровна</w>
                                – кандидат технических наук, доцент
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Высшая математика;</li>

                                <li>Теория вероятностей и математическая статистика;</li>
                                <li>Идентификация стохастических объектов;</li>
                                <li>Техногенные системы и экологический риск, экология и природопользование;</li>
                                <li>Идентификация динамических систем.</li>
                            </ul>
                        </td>

                    </tr>

                </table>
                <table>
                    <hr>
                    <tr>
                        <td class="center"><img src="{{asset('images/Indeyko.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Инденко Оксана Николаевна</w>
                                – кандидат технических наук, доцент
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Математические методы в психологии;</li>
                                <li>Теория вероятностей и математическая статистика;</li>
                                <li>Анализ и моделирование социальных процессов;</li>

                                <li>Избранные главы прикладной статистики;</li>
                                <li>Методы анализа и обработки данных для принятия управленчесих решений.</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                <table>
                    <hr>
                    <tr>
                        <td class="center"><img src="{{asset('images/Glinchikov.jpg')}}"></td>

                        <td class="center">
                            <p align="justify">
                                <w>Глинчиков Константин Евгеньевич</w>
                                – старший преподаватель
                            </p>
                            <p><span>Преподаваемые дисциплины:</span></p>
                            <ul>
                                <li>Компьютерная автоматизация научных исследований;</li>
                                <li>Математические основы технической кибернетики;</li>
                                <li>Программирование в системах реального времени;</li>
                                <li>Математика;</li>
                                <li>Теория вероятностей и математическая статистика.</li>
                            </ul>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
@yield('footer')