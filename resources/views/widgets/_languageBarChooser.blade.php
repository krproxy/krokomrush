<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 06.04.16
 * Time: 12:51
 */?>
<div class="language_bar_chooser btn-group" role="group" aria-label="...">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a rel="alternate" hreflang="{{$localeCode}}"
           class="btn btn-link navbar-btn @if(LaravelLocalization::getCurrentLocale()==$localeCode) btn-active  @endif"
           href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
            {{ $properties['native'] }}
        </a>
    @endforeach
</div>
