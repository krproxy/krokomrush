@extends('layouts.master')

@section('title', 'Page Title')

@section('body')
    <div class="container-fluid">
        <div id="carousel-example-generic" class="carousel slide carouselMain" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{asset('images/kiev-slider/1.jpg')}}" alt="...">
                    <div class="carousel-caption">
                        БлаБлаБла
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/kiev-slider/2.jpg')}}" alt="...">
                    <div class="carousel-caption">
                        БлаБлаБла
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/kiev-slider/3.jpg')}}" alt="...">
                    <div class="carousel-caption">
                        БлаБлаБла
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/kiev-slider/4.jpg')}}" alt="...">
                    <div class="carousel-caption">
                        БлаБлаБла
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <h3>Ближайшие экскурсии</h3>
        @foreach($excursions as $excursion)
            @include('widgets.excursionMedia', ['excursion' => $excursion])
        @endforeach
    </div>
@stop