<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 04.04.16
 * Time: 22:17
 */
?>

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
                    <a href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$descend->slug)}}">
                        {{trans("menuAndCategories.{$pathCategory->name}")}}
                    </a>
                </li>
                <li class="active">{{trans("products.{$excursion->name}")}}</li>
            </ol>
        @endif

        @if($excursion->attaches)
            @foreach($excursion->attaches as $attach)
                <img src="{{URL::to($attach->filename)}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
            @endforeach
        @endif

        <h3>Товар: {{trans("products.{$excursion->name}")}}</h3>

        <h3>Цена: {{$excursion->cost}}</h3>
        <h3>Артикул: {{$excursion->artikul}}</h3>

        <h3>Аннотация:</h3>
        {!! trans("products.{$excursion->note}") !!}

        <h3>Описание:</h3>
        {!!trans("products.{$excursion->description}") !!}

        <h3>Входит в категории:</h3>

        {{info($excursion->categories)}}

        @foreach($excursion->parentCategories as $cat)

            <li>-><a href="{{URL::to('/category/'.$cat->slug)}}">{{$cat->name}}</a></li>
        @endforeach
    </div>
@stop