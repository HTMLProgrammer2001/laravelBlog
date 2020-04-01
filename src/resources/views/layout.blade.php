<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Персональный блог</title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/front.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/favicon.png">

</head>

<body>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
{{--                    <li><a href="/">Homepage</a></li>--}}
{{--                    <li><a href="about-me.html">ABOUT ME </a></li>--}}
{{--                    <li><a href="contact.html">CONTACT</a></li>--}}
                </ul>

                <ul class="nav navbar-nav text-uppercase pull-right">
                    @guest
                        <li><a href="{{route('register')}}">Зарегистрироваться</a></li>
                        <li><a href="{{route('login')}}">Ввойти</a></li>
                    @endguest

                    @auth
                        <li><a href="{{route('profile')}}">Мой профиль</a></li>
                        <li><a href="{{route('logout')}}">Выйти</a></li>
                    @endauth
                </ul>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<!--main content start-->
@if(session('success_message'))
    <div class="alert alert-success container">
        {{session('success_message')}}
    </div>
@endif

@yield('content')
<!-- end main content-->

<footer class="footer-widget-section">
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2017 <a href="#">Blog, </a> Designed with <i
                                class="fa fa-heart"></i> by <a href="#">Marlin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- js files -->
<script src="/js/front.js"></script>
</body>
</html>
