<!doctype html>
<html lang="ru">
@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="https://dontentmaster.ru/favicon.ico">
        <link rel="icon" href="https://dontentmaster.ru/favicon.ico" type="image/x-icon">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        @vite(['resources/js/app.js'])
    </head>
@show

<body>
    <div class="wrapper">
        @section('header')
            <div class="header">
                <div class="container">
                    <div class="header-panel">
                        <a href="/" class="header-logo">
                            <img src="{{ Vite::asset('resources/img/logo.webp') }}" alt="">
                        </a>
                        <nav class="navbar navbar-expand-md">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            @if (request()->routeIs('index'))
                                                <a class="nav-link smooth-scroll" href="/#services">Услуги</a>
                                            @else
                                                <a class="nav-link" href="/#services">Услуги</a>
                                            @endif
                                        </li>
                                        <li class="nav-item">
                                            @if (request()->routeIs('index'))
                                                <a class="nav-link smooth-scroll" href="/#portfolio">Примеры работ</a>
                                            @else
                                                <a class="nav-link" href="/#portfolio">Примеры работ</a>
                                            @endif
                                        </li>
                                        <li class="nav-item">
                                            @if (request()->routeIs('index'))
                                                <a class="nav-link smooth-scroll" href="/#contacts">Контакты</a>
                                            @else
                                                <a class="nav-link" href="/#contacts">Контакты</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="header-phone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 1408 1408">
                                <path fill="currentColor" d="M1408 1112q0 27-10 70.5t-21 68.5q-21 50-122 106q-94 51-186 51q-27 0-53-3.5t-57.5-12.5t-47-14.5T856 1357t-49-18q-98-35-175-83q-127-79-264-216T152 776q-48-77-83-175q-3-9-18-49t-20.5-55.5t-14.5-47T3.5 392T0 339q0-92 51-186Q107 52 157 31q25-11 68.5-21T296 0q14 0 21 3q18 6 53 76q11 19 30 54t35 63.5t31 53.5q3 4 17.5 25t21.5 35.5t7 28.5q0 20-28.5 50t-62 55t-62 53t-28.5 46q0 9 5 22.5t8.5 20.5t14 24t11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14t20.5 8.5t22.5 5q18 0 46-28.5t53-62t55-62t50-28.5q14 0 28.5 7t35.5 21.5t25 17.5q25 15 53.5 31t63.5 35t54 30q70 35 76 53q3 7 3 21z"/>
                            </svg>
                            <a href="tel:+79493217787">+7 949 321 77 87</a>
                        </div>
                    </div>
                </div>
            </div>
        @show

        @section('content')

        @show

        @section('footer')
            <div class="footer">
                <div class="container">
                    <div class="footer-panel">
                        <div class="footer-logo">
                            <a href="/">
                                <img src="{{ Vite::asset('resources/img/logo-footer.png') }}" alt="">
                            </a>
                        </div>
                        <ul class="footer-nav">
                            <li class="nav-item">
                                @if (request()->routeIs('index'))
                                    <a class="nav-link smooth-scroll" href="/#services">Услуги</a>
                                @else
                                    <a class="nav-link" href="/#services">Услуги</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (request()->routeIs('index'))
                                    <a class="nav-link smooth-scroll" href="/#portfolio">Примеры работ</a>
                                @else
                                    <a class="nav-link" href="/#portfolio">Примеры работ</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (request()->routeIs('index'))
                                    <a class="nav-link smooth-scroll" href="/#contacts">Контакты</a>
                                @else
                                    <a class="nav-link" href="/#contacts">Контакты</a>
                                @endif
                            </li>
                        </ul>
                        <div class="footer-phone">
                            <a href="tel:+79493217787">+7 949 321 77 87</a>
                        </div>
                    </div>
                </div>
            </div>
        @show
    </div>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=90f31bcc-503b-4dbb-9f51-83b5b12001ff&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
        })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=103782589', 'ym');

        ym(103782589, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
    </script>
</body>
</html>


