<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>پیوند آسمانی - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @yield('styles')
</head>
<body>
<!-- <div class="bgImage"></div> -->
<div class="customContainer">
    <!-- Sidebar -->
    <aside class="sidebar text-right">
        <div class="sidebarHeader text-center py-3 bgCustomBlue">
            <h3>@yield('title')</h3>
        </div>
        <div class="sidebarBody mt-3">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('panel-index') }}" class="nav-link"><span class="glyphicon glyphicon-home"></span>&nbsp;صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a href="#wedding" role="button" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle">مراسم عقد</a>
                    <ul class="navbar-nav collapse" id="wedding">
                        <li class="nav-item">
                            <a href="{{ route('show-wedding') }}" class="nav-link"><span class="glyphicon glyphicon-plus"></span>&nbsp;ثبت عقد جدید</a>
                        </li>
                        <li class="nav-item">
                            <a href="searchWedding.html" class="nav-link"><span class="glyphicon glyphicon-search"></span>&nbsp;جستوجو در عقدها</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;گزارش تمام عقد ها</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#helpers" role="button" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle">خادم یارها</a>
                    <ul class="navbar-nav collapse" id="helpers">
                        <li class="nav-item">
                            <a href="{{ route('show-helper') }}" class="nav-link"><span class="glyphicon glyphicon-list"></span>&nbsp;لیست خادم یارها</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add-helper') }}" class="nav-link"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;افزودن خادم یار جدید</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show-helperRollcall') }}" class="nav-link"><span class="glyphicon glyphicon-time"></span>&nbsp;ثبت ساعت ورود یا خروج</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;گزارش عملکرد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><span class="glyphicon glyphicon-flag"></span>&nbsp;درخواست مرخصی</a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#religious_mans" role="button" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle">عاقدان</a>
                    <ul class="navbar-nav collapse" id="religious_mans">
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link"><span class="glyphicon glyphicon-time"></span>&nbsp;ثبت ساعت ورود یا خروج</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('show-concluder') }}" class="nav-link"><span class="glyphicon glyphicon-list"></span>&nbsp;لیست عاقدان</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add-concluder') }}" class="nav-link"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;افزودن عاقد جدید</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show-concluderRollcall') }}" class="nav-link"><span class="glyphicon glyphicon-time"></span>&nbsp;ثبت ساعت ورود یا خروج</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;گزارش عملکرد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><span class="glyphicon glyphicon-flag"></span>&nbsp;درخواست مرخصی</a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="glyphicon glyphicon-comment"></span>&nbsp;ثبت انتقاد</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('show-station') }}" class="nav-link"><span class="glyphicon glyphicon-tower"></span>&nbsp;مدیریت جایگاه ها</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('show-users') }}" class="nav-link"><span class="glyphicon glyphicon-user"></span>&nbsp;ثبت کاربر</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;صدور گزارش کامل</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="glyphicon glyphicon-stats"></span>&nbsp;وضعیت جایگاه ها</a>
                </li> -->
                <li class="nav-item">
                    <a href="contact.html" class="nav-link"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp;تماس با ما</a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- Content -->
    <section class="content">
        <!-- Top navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bgCustomBlue py-3">
            <button type="button" id="sidebarCollapse" class="navbar-toggler" data-toggle="tooltip" data-placement="left" title="پنل ابزار">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <img src="{{ asset('images/user.png') }}" alt="user name" class="img-thumbnail rounded-circle useHandCursor" width="40" height="40" />
                    </li>
                    <li class="nav-item messagesCounter">
                        <a href="#" class="nav-link"></span><span class="badge badge-pill badge-success"><span class="glyphicon glyphicon-envelope">&nbsp;<span><sup class="messageCounter">6</sup></span></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><span class="glyphicon glyphicon-cog"></span>&nbsp;ویرایش پروفایل</a>
                    </li>
                    <li class="nav-item">
                        <a href="help.html" class="nav-link"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;راهنما</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"><span class="glyphicon glyphicon-log-out"></span>&nbsp;خروج</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main content and fomrs -->
        <section class="container-fluid mt-1 text-right">
            @yield('mainContent')
        </section>
    </section>
</div>
<!-- Modals -->
@yield('modals')
<!-- Script files -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('scripts')
</body>
</html>
