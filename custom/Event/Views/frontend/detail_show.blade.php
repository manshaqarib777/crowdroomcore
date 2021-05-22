@extends('layouts.app')
@section('head')


    <link href="{{ asset('dist/frontend/module/event/css/event.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    
@endsection

@section('content')


<div class="bravo_detail_event">
{{-- changed --}}
 {{--@include('Event::frontend.layouts.details.banner')--}} 
<div class="card card-style-event mb-2">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" class="rounded-sm" width="100">
</div>
@endif
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2">{{$translation->title}}</h6>
<h4 class="font-700" style="font-size:14px; color:#b12222;"> Ticket Price : {{ $row->display_price }} </h4>
<!--     @if($row->max_guests)-->

<!--            <p class="pipnum">-->
                <!--<i class="fa fa-group"></i>-->
                <!-- {{$translation->address}} -->

<!--                {{$row->max_guests}} People Max-->
                <!--  {{__(':count Guest in maximum',['count'=>$row->max_guests])}} -->
               
<!--                 @endif-->
</div>
<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>
</div>
</div>
</div>
@include('Event::frontend.layouts.details.form-book')
</div>
@endsection






<!--@section('content')-->
<!--    <div class="bravo_detail_event">-->
<!--        @include('Event::frontend.layouts.details.banner')-->
<!--        @include('Event::frontend.layouts.details.form-book')-->
<!--    </div>-->
<!--@endsection-->

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
			no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one number')}}',
            load_dates_url:'{{route('event.vendor.availability.loadDates')}}'
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/event/js/single-event.js?_ver='.config('app.version')) }}"></script>
@endsection
