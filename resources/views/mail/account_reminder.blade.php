<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 29.03.16
 * Time: 10:06
 */?>
Для создания нового пароля пройдите по <a href="{{ URL::to("reset/{$sentuser->getUserId()}/{$code}") }}">ссылке</a>
