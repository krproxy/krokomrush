<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 13.04.16
 * Time: 17:17
 */ ?>
<div class="media">
    <div class="media-left">
        @if($excursion->attaches()->count() > 0)
            <a href="{{url(LaravelLocalization::getCurrentLocale().'/product/'.$excursion->slug)}}">
                <img class="media-object img-thumbnail"
                     src="{{asset($excursion->attaches->first()->filename.'/150/150/chunk')}}"
                     alt="{{$excursion->attaches->first()->alt}} title="{{$excursion->attaches->first()->title}}>
            </a>
        @endif
    </div>
    <div class="media-body">
        <h3 class="media-heading">{{trans("products.{$excursion->name}")}}</h3>
        @foreach($excursion->parentCategories as $cat)
            <a class="label label-default categoryBadge" data-toggle="tooltip" data-placement="top"
               title="{{trans("menuAndCategories.{$cat->note}")}}"
               href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$cat->slug)}}">
                {{trans("menuAndCategories.{$cat->name}")}}
            </a>
        @endforeach

        <p class="text-justify">{!! trans("products.{$excursion->note}") !!}</p>
    </div>
    <div class="media-right">
        @if($excursion->isNext)
            {{--<p class=""><br><b>{{trans('messages.priceForPlace').': '.$excursion->cost/$excursion->status}}</b></p>--}}
            {{--<p><a class="btn btn-success" href="#" role="button">{{trans('messages.join')}}</a></p>--}}
            @include('widgets.buttonJoinModal', ['excursion' => $excursion, 'modalId' => 'modalJoin'.$excursion->id, 'modalLabel' => 'Ваш Email'])
        @else
            <p class=""><br><b>{{trans('messages.priceForExcursion').': '.$excursion->cost}}</b></p>
            <p><a class="btn btn-success" href="#" role="button">{{trans('messages.order')}}</a></p>
        @endif
    </div>

</div>
