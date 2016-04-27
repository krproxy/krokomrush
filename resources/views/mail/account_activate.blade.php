<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 29.03.16
 * Time: 10:05
 */?>
Для активации аккаунта пройдите по <a href="{{ URL::to("activate/{$sentuser->getUserId()}/{$code}") }}">ссылке</a>