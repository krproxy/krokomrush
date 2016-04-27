<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 31.03.16
 *
 * Если запрос прошел как /category/ в представление приходит
 * $many == true и коллекция категорий верхнего уровня в $nodes
 *
 * Если запрос прошел как /category/{slug} в представление приходит
 * $many == false и категория $node  с запрошенным ярлыком
 *
 */
?>
@extends('layouts.master')

@section('title', isset($excursion)?trans("products.{$excursion->name}"):"")

@section('body')
    <div class="container">
        @if($pathCategory)
            <ol class="breadcrumb">
                <li>
                    <a href="{{url(LaravelLocalization::getCurrentLocale().'/')}}">
                        {{trans('menuAndCategories.main')}}
                    </a>
                </li>
                @foreach($pathCategory->getAncestors() as $descend)
                    <li>
                        <a href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$descend->slug)}}">
                            {{trans("menuAndCategories.{$descend->name}")}}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$pathCategory->slug)}}">
                        {{trans("menuAndCategories.{$pathCategory->name}")}}
                    </a>
                </li>
                <li class="active">{{trans("products.{$excursion->name}")}}</li>
            </ol>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="media">
                    <div class="media-left">
                        @if($excursion->attaches && isset($excursion->attaches->first()->filename))
                            {{--@foreach($excursion->attaches as $attach)--}}
                            {{--<img class="media-object" src="{{asset($attach->filename)}}" alt="{{$attach->alt}}"--}}
                            {{--title="{{$attach->title}}">--}}
                            {{--@endforeach--}}
                            <img class="media-object" src="{{asset($excursion->attaches->first()->filename).'/w/250'}}"
                                 alt="{{$excursion->attaches->first()->alt}}"
                                 title="{{$excursion->attaches->first()->title}}">
                        @endif
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">{{trans("products.{$excursion->name}")}}</h3>
                        @foreach($excursion->parentCategories as $cat)
                            <a class="label label-success categoryBadge"
                               href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$cat->slug)}}">
                                {{trans("menuAndCategories.{$cat->name}")}}
                            </a>
                        @endforeach
                        <h4>Цена: {{$excursion->cost}}</h4>
                        {{--<h3>Артикул: {{$excursion->artikul}}</h3>--}}
                                <!-- Indicates a successful or positive action -->
                        <button type="button" class="btn btn-success">Заказать</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <br>
                <p>{!! trans("products.{$excursion->note}") !!}</p>
                <p>{!! trans("products.{$excursion->description}") !!}</p>
            </div>
        </div>
    </div>
@stop