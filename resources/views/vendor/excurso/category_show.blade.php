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

            {!! $products->links() !!}

            @foreach($node->attaches as $attach)
                <img src="{{URL::to($attach->filename.'/w/150')}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
            @endforeach

            <p class="lead">{!! trans("menuAndCategories.{$node->note}") !!}</p>


            {{--Подкатегории--}}
            @if($node->getDescendantCount()>0)
                <ul class="sub-menu-ul">
                    @foreach($node->getDescendants() as $descend)
                        <li>
                            <a href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$descend->slug)}}">
                                {{trans("menuAndCategories.{$descend->name}")}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

            {{--Екскурсии--}}
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3 text-center">
                        <a href="{{url(LaravelLocalization::getCurrentLocale().'/product/'.$product->slug.'/'.$node->id)}}">
                            <h3>{{trans("products.{$product->name}")}}</h3>
                            @if($product->attaches()->count() > 0)
                                <img class="img-responsive" src="{{asset($product->attaches->first()->filename)}}"
                                     alt="{{$product->attaches->first()->alt}} title="{{$product->attaches->first()->title}}>
                            @endif
                        </a>
                        <p>{!! trans("products.{$product->note}") !!}</p>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
@stop