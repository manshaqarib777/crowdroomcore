@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/tour/css/tour.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
    <div class="bravo_detail_tour">
        
        
        {{-- @include('Tour::frontend.layouts.details.tour-banner') --}}
        
     <div class="card card-style-showpagetop detail mb-2" style="margin-top:-40px;">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" class="rounded-sm" width="100">
</div>
@endif
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2">{{$translation->title}}</h6>
<h4 class="font-700" style="font-size:14px; color:#b12222;">{{ $row->display_price }} </h4>
     <!--@if($row->max_guests)-->

     <!--       <p class="pipnum">-->
                <!--<i class="fa fa-group"></i>-->
                <!-- {{$translation->address}} -->

     <!--           {{$row->max_guests}} People Max-->
                <!--  {{__(':count Guest in maximum',['count'=>$row->max_guests])}} -->
               
     <!--            @endif-->
</div> 




<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>
</div>
</div>
</div>


        
     <div class="card card-style4">
            <!--<div class="content">-->
                
                
                
                
                <!--<div class="d-flex mb-3">-->
                <!--    <div>-->
                <!--        <img src="/images/iconbulb.gif" width="40" class="">-->
                        
                        <!--<img src="{{$row->getBannerImageUrlAttribute('full')}}" width="110" class="rounded-s shadow-xl">-->
                        
                <!--    </div>-->
                    
                    <!--<div class="pl-3 w-100">-->
                    {{--    @if(!empty($row->location->name))
                            @php $location = $row->location->translateOrOrigin(app()->getLocale())
                            @endphp
                            
                            
                         @if(!empty($row->category_tour->name))
                    @php $cat = $row->category_tour->translateOrOrigin(app()->getLocale())
                    @endphp  
                    
                    
                    
                    @if(!empty($row->duration) or !empty($row->category_tour->name) or !empty($row->max_people) or !empty($row->location->name))
                    
                    
                        
                         <h5 class="font-500">A {{duration_format($row->duration,true)}} {{$cat->name ?? ''}} Experience in {{$location->name ?? ''}}.  @if($row->max_people > 1) There are
                                            {{ __(":number persons",array('number'=>$row->max_people)) }}
                                            @else
                                            {{ __(":number person",array('number'=>$row->max_people)) }} each session
                                            @endif
                                         .  </h5>
                        @endif 
                        @endif
                        @endif --}}
             
                        
                        
                    <!--</div>-->
                    
                <!--</div>-->
                
                
       
                
            <!--</div>-->
        </div>  
       
        
        
        
        
        
        
        
        
        
        
        @include('Tour::frontend.layouts.details.tour-form-book')
        
    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                }
            });
            @endif
        })
    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
                no_date_select:'{{__('Please select Start date')}}',
                no_guest_select:'{{__('Please select at least one guest')}}',
                load_dates_url:'{{route('tour.vendor.availability.loadDates')}}',
                name_required:'{{ __("Name is Required") }}',
                email_required:'{{ __("Email is Required") }}',
            };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/tour/js/single-tour.js?_ver='.config('app.version')) }}"></script>
@endsection
