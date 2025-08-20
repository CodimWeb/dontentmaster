@extends('layouts.base')


@section('head')
    @parent
@endsection

@section('title'){{ $seo->seo_title }}@endsection

@section('description'){{ $seo->seo_description }}@endsection

@section('og_title'){{ $seo->seo_title }}@endsection
@section('og_description'){{$seo->seo_description}}@endsection
@section('og_url'){{"https://dontentmaster.ru/"}}@endsection
@section('og_image'){{Vite::asset('resources/img/logo.png')}}@endsection
@section('og_site_name'){{"dontentmaster.ru - Ремонт тентов, каркасов, раздвежных механизмов, слесарно-сварочные работы в Донецке"}}@endsection



@section('header')
    @parent
@endsection

@section('content')
    <div class="content">
        <section class="block-1">
            <div class="container">
                <h1 class="block-1__title">
                    Ремонт тентов
                    <br>
                    <span class="block-1__subtitle">Каркасов, раздвежных механизмов, слесарно-сварочные работы + аргон, фурнинура</span>
                </h1>
            </div>
        </section>

        <section class="block-2" id="services">
            <div class="container">
                <h2 class="title">Наши Услуги</h2>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('services', ['slug' => $category->slug]) }}" class="services-item">
                                <div class="services-item__img">
                                    <img src="{{$category->img}}" alt="">
                                </div>
                                <div class="services-item__title">{{$category->name}}</div>
                                <div class="services-item__show-more">
                                    <button class="btn btn-primary">Подробнее</button>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="block-3" id="portfolio">
            <div class="container">
                <h2 class="title">Примеры работ</h2>
                <div class="swiper-galary">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-1.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-1.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-2.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-2.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-3.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-3.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-4.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-4.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-5.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-5.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-6.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-6.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-7.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-7.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-8.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-8.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-9.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-9.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fancybox="gallery" data-src="{{ Vite::asset('resources/img/example/ex-10.webp') }}">
                                    <img src="{{ Vite::asset('resources/img/example/ex-sm-10.webp') }}" width="200" height="150" alt="" />
                                    <div class="backdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor"><path d="M15 3.5h5.5m0 0V9m0-5.5l-8 8"/><path stroke-linecap="round" d="M11.5 5.5h-4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4"/></g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="about-panel">
                    <div class="about-img">
                        <img src="{{ Vite::asset('resources/img/special.webp') }}" alt="">
                    </div>
                    <div class="about-description">
                        Мы предлагаем широкий спектр услуг по ремонту и обслуживанию прицепов, полуприцепов и борт-тентов.
                        <p class="about-special-title">Специализируемся на:</p>
                        <ul>
                            <li>восстановлении тентов</li>
                            <li>ремонте сдвижных крыш</li>
                            <li>ремонте алюминиевых направляющих</li>
                            <li>изготовлении каркасов</li>
                            <li>замене фурнитуры</li>
                        </ul>
                        Работаем только с качественными материалами и комплектующими, что гарантирует долговечность и надёжность выполненных работ.
                    </div>
                </div>
            </div>
        </section>

        <section class="block-4" id="contacts">
            <div class="container">
                <div class="contacts">
                    <p class="contacts-title">Контакты</p>
                    <div class="contacts-item">
                        <div class="contacts-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 56 56" class="contacts-icon">
                                <path fill="currentColor" d="M28 4c9.389 0 17 7 17 19c0 4.764-2.679 10.63-5.91 15.974l-.543.885c-.183.294-.367.585-.551.874l-.558.861c-.093.143-.186.284-.28.425l-.561.839l-.563.82l-.56.803l-.556.782l-.55.76l-.542.735l-.531.71l-.519.682l-.749.97l-.708.898l-.66.822l-.207.256c-1.354 1.604-3.627 1.54-4.903 0l-.642-.794l-.692-.874l-.487-.623l-.503-.654l-.783-1.034l-.537-.723l-.546-.747l-.553-.771l-.559-.792l-.562-.812l-.562-.83c-.187-.28-.374-.562-.56-.847l-.558-.86l-.551-.875l-.543-.885C13.679 33.63 11 27.764 11 23c0-12 7.611-19 17-19m0 4c-7.622 0-13 5.682-13 15c0 3.345 1.746 7.812 4.61 12.747l.503.85l.523.859l.544.867l.279.436l.573.876l.592.883l.61.888l.627.892l.644.896l.328.45l.668.9l.605.799l.312.405a2 2 0 0 0 3.163 0l.568-.74l.676-.904l.661-.9l.645-.897l.629-.894l.61-.889c.201-.295.399-.59.593-.884l.574-.877c.47-.73.92-1.45 1.348-2.164l.502-.85C39.255 30.81 41 26.343 41 23c0-9.318-5.378-15-13-15m0 5a8 8 0 1 1 0 16a8 8 0 0 1 0-16m0 4a4 4 0 1 0 0 8a4 4 0 0 0 0-8"/>
                            </svg>
                        </div>
                        <div class="contacts-text">ДНР Донецк, ул. Горновая 7А</div>
                    </div>
                    <div class="contacts-item">
                        <div class="contacts-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="contacts-icon">
                                <path fill="currentColor" d="M10.615 19.654h2.77q.161 0 .273-.112q.111-.111.111-.273q0-.161-.111-.273q-.112-.111-.273-.111h-2.77q-.161 0-.273.111q-.111.112-.111.273q0 .162.111.273q.112.112.273.112Zm-3 2.346q-.69 0-1.152-.462Q6 21.075 6 20.385V3.615q0-.69.463-1.152Q6.925 2 7.615 2h8.77q.69 0 1.152.463q.463.462.463 1.152v16.77q0 .69-.462 1.152q-.463.463-1.153.463h-8.77ZM7 17.538v2.847q0 .23.192.423q.193.192.423.192h8.77q.23 0 .423-.192q.192-.193.192-.423v-2.847H7Zm0-1h10V5.5H7v11.038ZM7 4.5h10v-.885q0-.23-.192-.423Q16.615 3 16.385 3h-8.77q-.23 0-.423.192Q7 3.385 7 3.615V4.5Zm0 13.038V21v-3.462ZM7 4.5V3v1.5Z"/>
                            </svg>
                        </div>
                        <div class="contacts-text">
                            <a href="tel:+79493217787">+7 949 321 77 87</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map" class="map"></div>
        </section>
    </div>
@endsection

@section('footer')
    @parent
@endsection

