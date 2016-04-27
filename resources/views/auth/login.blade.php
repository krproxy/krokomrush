<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 29.03.16
 * Time: 9:59
 */?>
@extends('layouts.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {!! Form::open() !!}
                @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Ваш Email' ])
                @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль' ])
                @include('widgets.form._formitem_checkbox', ['name' => 'remember', 'title' => 'Запомнить меня'] )
                @include('widgets.form._formitem_btn_submit', ['title' => 'Вход'])
                {!! Form::close() !!}
                <p><a href="{{URL::to('/reset')}}">Забыли пароль?</a></p>
            </div>
        </div>
    </div>
@stop