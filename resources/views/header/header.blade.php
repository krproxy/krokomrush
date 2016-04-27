<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url(LaravelLocalization::getCurrentLocale().'/')}}">КРОКОМРУШ</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if(isset($currentPage)&&$currentPage==='main')class="active"@endif>
                    <a href="{{url(LaravelLocalization::getCurrentLocale().'/')}}">
                        {{trans('menuAndCategories.main')}} <span class="sr-only">(current)</span>
                    </a>
                </li>
                @foreach($rootCategories as $rootCategory)
                    @if($rootCategory->showtop)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                {{trans("menuAndCategories.{$rootCategory->name}")}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($rootCategory->descendants as $category)
                                    @if($category->showtop)
                                        <li>
                                            <a href="{{url(LaravelLocalization::getCurrentLocale().'/category/'.$category->slug)}}">
                                                {{trans("menuAndCategories.{$category->name}")}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                <li @if(isset($currentPage)&&$currentPage==='contacts')class="active"@endif>
                    <a href="{{url(LaravelLocalization::getCurrentLocale().'/contacts')}}">
                        {{trans('menuAndCategories.contacts')}} <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    @include('widgets._languageBarChooser')
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>