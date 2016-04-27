<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 16.04.16
 * Time: 18:11
 */ ?>
@extends('layouts.modal')

@section('modalContent')
    {!! Form::open(['url' => 'foo/bar']) !!}
    {!! Form::hidden('excursionId',$excursionId) !!}
    <div class="modal-body">
        @include('widgets.form._formitem_text', ['name' => 'name', 'title' => 'Имя', 'placeholder' => 'Ваше Имя' ])
        @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Ваш Email' ])
        @include('widgets.form._formitem_text', ['name' => 'phone', 'title' => 'Телефон', 'placeholder' => 'Ваш Телефон' ])
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
        @include('widgets.form._formitem_btn_submit', ['title' => 'Вход'])
    </div>
    {!! Form::close() !!}
@stop
