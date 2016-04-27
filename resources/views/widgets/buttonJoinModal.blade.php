<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 16.04.16
 * Time: 18:02
 */ ?>

<p>{{trans('messages.priceForPlace').': '.$excursion->cost/$excursion->status}}</p>
<p>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$modalId}}">
        {{trans('messages.join')}}
    </button>
</p>
@include('modals.join', ['modalId' => $modalId, 'modalLabel' => $modalLabel,'modalName' =>$excursion->name,'excursionId'=>$excursion->id])