@extends('layouts.base')

@section('head')
    @parent
@endsection
@section('title'){{ $category->seo_title }}@endsection

@section('description'){{$category->seo_description}}@endsection

@section('og_title'){{ $category->seo_title }}@endsection
@section('og_description'){{$category->seo_description}}@endsection
@section('og_url'){{ route('services', ['slug' => $category->slug])}}@endsection
@section('og_image'){{'https://dontentmaster.ru'.$category->img}}@endsection
@section('og_site_name'){{"dontentmaster.ru - Ремонт тентов, каркасов, раздвежных механизмов, слесарно-сварочные работы в Донецке"}}@endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <h1 class="service-title">{{$category->name}}</h1>
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="service-media">
                        <img src="{{$category->img}}" alt="{{$category->name}}" class="service-img">
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="service-list">
                        @foreach($category->services as $service)
                        <div class="service-row">
                            <div class="service-name">{{$service->name}}</div>
                            <div class="service-price">
                                @if($service->is_price_individual)
                                    <strong>Инд. расчет</strong>
                                @else
                                    @if($service->is_price_from)
                                        <strong>От {{$service->price}} &#8381;</strong>
                                    @else
                                        <strong>{{$service->price}} &#8381;</strong>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="service-description">
                        {{$category->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
