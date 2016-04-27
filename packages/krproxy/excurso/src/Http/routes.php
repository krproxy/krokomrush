<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 29.03.16
 * Time: 21:44
 */

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['web', 'localeSessionRedirect', 'localizationRedirect']
    ],
    function () {
        Route::get('category/{slug?}', 'krproxy\excurso\Http\Controllers\ExCategoryController@show');
        Route::get('product/{slug}/{categoryid?}', 'krproxy\excurso\Http\Controllers\ExExcursionController@show');
    });