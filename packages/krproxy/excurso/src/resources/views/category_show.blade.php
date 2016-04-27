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

@section('title', isset($node)?trans("menuAndCategories.{$node->name}"):"")

@section('body')
    <div class="container">
        @if($many)
            <h1>Пример меню</h1>
            <ul class="menu-ul">
                @foreach($nodes as $node)
                    <li>
                        <span>{{$node->name}}</span>
                        @if($node->getDescendantCount()>0)
                            <ul class="sub-menu-ul">
                                @foreach($node->getDescendants() as $descend)
                                    <li><a href="{{URL::to('/category/'.$descend->slug)}}">{{$descend->name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <ol class="breadcrumb">
                <li>
                    <a href="{{url(LaravelLocalization::getCurrentLocale().'/')}}">
                        {{trans('menuAndCategories.main')}}
                    </a>
                </li>
                @foreach($node->getAncestors() as $descend)
                    <li>
                        <a href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$descend->slug)}}">
                            {{trans("menuAndCategories.{$descend->name}")}}
                        </a>
                    </li>
                @endforeach
                <li class="active">{{trans("menuAndCategories.{$node->name}")}}</li>
            </ol>

            <h1>Пример вывода подкатегорий текущей вызванной</h1>
            Текущая категория: <span>{{$node->name}}</span>
            <h3>Подкатегории:</h3>
            @if($node->getDescendantCount()>0)
                <ul class="sub-menu-ul">
                    @foreach($node->getDescendants() as $descend)
                        <li><a href="{{URL::to('/category/'.$descend->slug)}}">{{$descend->name}}</a></li>
                    @endforeach
                </ul>
            @endif

            <h3>Екскурсии:</h3>
            <ul>
                @foreach($products as $product)
                    <li>
                        {{--@if($product->attaches()->count() > 0)--}}
                            {{--<img src="{{URL::to($product->attaches->first()->filename)}}" alt="{{$product->attaches->first()->alt}} title="{{$product->attaches->first()->title}}>--}}
                        {{--@endif--}}
                        <a href="{{URL::to('product/'.$product->slug.'/'.$node->id)}}">{{$product->name}}</a>
                    </li>
                @endforeach
            </ul>
            {!! $products->links() !!}

            <h1>Вывод изображений категории</h1>
            @foreach($node->attaches as $attach)
                <img src="{{URL::to($attach->filename.'/w/150')}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
            @endforeach
        @endif
    </div>
@stop