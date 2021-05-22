@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/news/css/news.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
<div class="page-content-event">
        
        <div class="card notch-clear rounded-0 gradient-dark mb-n5">
            <div class="card-body">
                
                
               
                    
                       
            @if(!Auth::id())
   
                <h5 class="color-white font-20 float-left"> Hello There ! </h5>
                <!--<a href="#" data-menu="menu-cards" style="margin-top:-10px"class="float-right color-white btn btn-xxs font-600 rounded-s border-white"><img src="/images/0t.jpg" class="rounded-xl"  width="32"></a>-->
                <!--<a href="#login" data-toggle="modal" data-target="#login"class="float-right color-white btn btn-xxs font-600 rounded-s border-white"><i class="fa fa-plus mr-2"></i>{{__('Login')}} / {{__('Sign Up')}}</a> -->
               
             @else    
                
                @if($avatar_url = Auth::user()->getAvatarUrl())
                
                <a href="#" style="margin-top:-10px"class="float-right  rounded-xl"><img src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}" class="rounded-xl"  height="32" width="32"></a>
                 @else
                 <span class="avatar-text">{{ucfirst( Auth::user()->getDisplayName()[0])}}</span>
                 @endif
                 <h5 class="color-white font-17 float-left">{{__("Hi! :Name",['name'=>Auth::user()->getDisplayName()])}} </h5>
               
            @endif 
               
               
            
                <div clas="clearfix"></div>
            </div>

<div class="single-slider owl-carousel owl-no-dots mb-0" style="margin-top:25px;">
            <a href="#" class="card card-style bg-6" data-card-height="300">
                <div class="card-bottom px-3">
                    <h1 class="color-white mb-n1">Creative Design.</h1>
                    <p class="color-white opacity-50 mb-3">
                        We created appkit to make your mobile website feel insane! With great attention to every detail.
                    </p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </a>
            <a href="#" class="card card-style bg-16" data-card-height="300">
                <div class="card-bottom px-3">
                    <h1 class="color-white mb-n1">Built by Enabled.</h1>
                    <p class="color-white opacity-50 mb-3">
                        We've been at the front of mobile development for over 10 years, delivering top quality items.
                    </p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </a>
            <a href="#" class="card card-style bg-13" data-card-height="300">
                <div class="card-bottom px-3">
                    <h1 class="color-white mb-n1">Bootstrap & PWA</h1>
                    <p class="color-white opacity-50 mb-3">
                        A language you know and love with familiar code made to be super easy to edit and customise.
                    </p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </a>
        </div> 
        
        </div></div>
        
        
        
         <div class="content mb-0" style="margin-top:-10px;">
            <p class="mb-n1 color-highlight font-600">Rewards & Offers</p>
            <h1>Top Categories</h1>
        </div>
        
        <!--<div class="double-slider owl-carousel owl-no-dots" style="margin-top:40px; overflow: hidden !important; max-height:120px;">-->
        <!--    <a href="https://crowdroom.y3579.com/news/category/places" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Places</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Sports</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Movies</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Tech</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Food</h4>-->
        <!--        <img src="images/pictures/16s.jpg" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Web Design</h4>-->
        <!--        <img src="images/pictures/13s.jpg" class="img-fluid"> -->
        <!--    </a>-->
        <!--</div>-->
        
        
        
        <div class="topic-slider owl-carousel owl-no-dots mb-3" style="margin-top:25px;">
            <h1 style="margin-top:9px; font-size:28px;"><a href="https://crowdroom.y3579.com/news/category/places" class="px-3 color-theme">Places</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Sports</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Music</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Fashion</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Events</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Breaking</a></h1>
        </div>                

        





    <div class="bravo-news">
        @php
            $title_page = setting_item_with_lang("news_page_list_title");
            if(!empty($custom_title_page)){
                $title_page = $custom_title_page;
            }
        @endphp
        <!--@if(!empty($title_page))-->
        <!--    <div class="bravo_banner" @if($bg = setting_item("news_page_list_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif >-->
        <!--        <div class="container">-->
        <!--            <h1>-->
        <!--                {{ $title_page }}-->
        <!--            </h1>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--@endif-->
        @include('News::frontend.layouts.details.news-breadcrumb')
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        @if($rows->count() > 0)
                            <div class="list-news">
                                @include('News::frontend.layouts.details.news-loop')
                                <hr>
                                <div class="bravo-pagination">
                                    {{$rows->appends(request()->query())->links()}}
                                    <span class="count-string">{{ __("Showing :from - :to of :total posts",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                {{__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")}}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        @include('News::frontend.layouts.details.news-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 
  