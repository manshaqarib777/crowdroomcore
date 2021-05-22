@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/car/css/car.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    
@endsection
@section('content')
    <div class="bravo_detail_car">
        @include('Car::frontend.layouts.details.banner')
    
        
<div class="card card-style-showpagetop mb-2">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" class="rounded-sm" width="100">
</div>
@endif


<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2">{{$translation->title}}</h6>
<!--<h4 class="font-700" style="font-size:14px; color:#b12222;">{{$translation->address}}</h4>-->
     <!--@if($row->passenger)-->

     <!--       <p class="pipnum">-->
                <!--<i class="fa fa-group"></i>-->
                <!-- {{$translation->address}} -->

     <!--           {{__("Passenger")}}: {{$row->passenger}}-->
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








{{-- Qr code pop up --}}







<link rel="stylesheet" href="{!! asset('qrCode') !!}/css/modal.css" />
<link rel="stylesheet" href="{!! asset('qrCode') !!}/css/style.css" />

<div class="qr-modal" id="qrCodePopUp">
    <div class="qr-big-container">

        <div class="qr-pop-card" id="qrImage">
            <div class="qr-header row">
                <!--<div class="qr-logo col-5">
                    <img src="{!! asset('qrCode') !!}/img/logo.png" alt="" />
                </div> -->

                <!--<div class="qr-header-text">-->
                <!--    {{$translation->title}}-->
                <!--</div>-->
            </div>

            {{-- <img class="product-image" src="{!! asset('qrCode') !!}/img/pexels-tún-807840.jpg" alt="" /> --}}
            <img class="qr-product-image" src="{{$row->getBannerImageUrlAttribute('full')}}" alt="" />
            {{-- <img class="product-image" src="{{$row->getGallery()[0]['large']}}" alt="" /> --}}
            
            
            <div class="qr-product-details-home row">
                <div class="qr-details col-7">
                    
                    
                    
                    <div class="card card-style-homeqr mb-2">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" style="max-height:76px;" class="rounded-sm" width="100">
</div>
@endif
<div class="pl-3 w-100">
<h5 class="font-501" style="font-size:15px; margin-top:-3px;">Apartment Rental</h5>
<div class="">
                        <div class="qr-location" style="line-height:1.5; margin-top:-3px;">
                            <span class="qr-people">

                                @if(!empty($row->location->name))
                                    <i class="fa fa-map-marker"></i>

                                    @php $location = $row->location->translateOrOrigin(app()->getLocale())
                                    @endphp


                                    {{$location->name ?? ''}}
                                    @endif
                                    
                                    </span>
                           
                            
                            

                            <span class="qr-people">
                                <i class="fa fa-bed"></i>
                                {{$row->passenger}} BDR  
                            
                            </span>
                             
                             
                        </div>
                        
                        
                         <div class="qr-price" style="color: #00001e !important; margin-top:0 !important;padding-top:1px">
                        <span class="qr-yen-logo" style="font-size:16px;">¥</span>{{ explode('.',$row->price)[0] }}<span class="qr-small-dec"></span> / {{$row->door}}  
                         <span class="qr-box"
                            style="text-decoration: none;color: #c03!important;">HOT</span>


                    </div>
                       
                       
                      
                <a href="#" class="chip chip-s bg-gray-light">
                    <i class="fa fa-check bg-green-dark color-white"></i>
                    <strong class="color-black font-400">Foreigner Friendly Home</strong>
                </a>    
                     


                    </div>



</div>
<div class="align-self-center mr-n2">

</div>
</div>
</div>
</div>
                    
                    <div class="">
                        <div class="qr-location">
                            {{--<span class="qr-people">

                                @if(!empty($row->location->name))
                                    <i class="fa fa-map-marker"></i>

                                    @php $location = $row->location->translateOrOrigin(app()->getLocale())
                                    @endphp


                                    {{$location->name ?? ''}}
                                    @endif
                            </span>--}}
                            
                            
                            {{--<span class="qr-people">


                                <i class="fa fa-bed"></i>
                                {{$row->passenger}} BDR
                            </span>--}}
                        </div>
                        
                        
                        
                            
                            <div class="pl-3 w-100">
<h5 class="font-501" style="font-size:15px; margin-left:-7px;">{{$translation->title}}</h5>
                        
                            
                            </div>
                            </div>
                    


                    <!--<div class="qr-price" style="color: #00001e !important; margin-top:0 !important;padding-top:0">-->
                    <!--    <span class="qr-yen-logo">¥</span>{{ explode('.',$row->price)[0] }}<span class="qr-small-dec"></span> -->
                        <!-- <span class="qr-box"
                    <!--        style="text-decoration: line-through;color: #c03!important;">¥{{ explode('.',$row->sale_price)[0] }}</span>-->


                    <!--</div>-->
                    
                     @if($row->gear)
               <div class="qr-imp-infor">
                   {{$row->gear}}</div>
                   @endif
                   
                    
                    <div class="qr-seller">
                        <img src="{{ \App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png') }}" alt="" class="qr-avatar" />
                        <!--<span class="qr-seller-name">-->
                        <!--    {{ \App\User::findOrFail($row->create_user)->name }}-->
                        <!--    {{-- {{ __('hellodd hidddd') }} --}}-->
                        <!--    {{-- {{ $row->create_user }} --}}-->
                        <!--</span>-->
                    </div>



                </div>
                <div class="qr-code-img text-center col-5" >
                    {{-- <img src="{!! asset('qrCode') !!}/img/qr-generator.png" alt="" /> --}}
                    <div class="">

                        <img src="data:image/<IMAGE_TYPE>;base64,{!! base64_encode(QrCode::format('png')->size(123)->generate(url()->current())); !!}" 
                        style="margin-bottom:-10px; margin-top:12px;">
                    </div>

                    <br>
                    <div class="qr-text">Long Press To see details about This Apartment
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="button-div col-12 text-center">
            <a type="button" class="btn qr-btn-secondary" rel="modal:close" onclick="downloadQr(`{{ $row->slug }}`);">
                Download
            </a>
        </div>-->
        

    </div>
</div>







<div class="card card-style4">
            <div class="content">
                
           
                <a href="#qrCodePopUp" class="qr-code btn btn-full btn-l rounded-s font-600 gradient-highlight" target="" rel="modal:open">Click here to Generate QR Poster. Take Poster Screenshot and share on wechat</a>
                
                
                <!--<a class="qr-code" href="#qrCodePopUp" target="" rel="modal:open" original-title="{{__("Wechat")}}">-->
                
            </div>
        </div>   









<style>
    .social-icons {
        margin-bottom: 13px;
        padding: 4px 1px;
        box-shadow: 0.5px 0.4px 20px 8px #c3b1b518;
        border-radius: 1px;
        margin-left: -10px;
        margin-right: -10px;

        display: flex;
    }

    .share-icons {
        display: flex;
    }

    .facebook-icon,
    .twitter-icon,
    .qr-code,
    .service-wishlist {
        padding: 0px 10px;
    }

    #wishlist {
        padding-left: 13px;

        display: block;
    }

    @media(max-width: 576px) {
        .social-icons {
            display: flex;
            font-size: 28px;
        }
    }
</style>
<div calss="row" style="margin: 0px 10px; margin-left:30px; margin-right:30px; border-radius: 2px ; background#fff;">

    <div class="social-icons ">
        <div class="social-share">
            <div class="share-icons">
                <!--<a class="facebook-icon" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">-->
                <!--    <i class="icofont-facebook-messenger"></i>-->
                <!--</a>-->
                <!--<a class="twitter-icon" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                                <i class="icofont-twitter"></i>
                            </a> -->

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>



    <!--          <h8 style="font-size:10px; margin-right: 16px;-->
    <!--margin-left: 10px;">Click here to Generate Sharable QR Poster</h8>-->
                <!--<a class="qr-code" href="#qrCodePopUp" target="" rel="modal:open" original-title="{{__("Wechat")}}"> -->
                <!--    <i class="icofont-qr-code"></i>-->
                <!--</a>-->

            </div>
        </div>
        <div>
            
        </div>

        
    </div>
</div>











<form action="/download/qrCode" method="post" id="downloadQrForm">
    @csrf
    <input type="hidden" name="url" value="{{ url()->current() }}">
    <input type="hidden" name="slug" value="{{ $row->slug }}">
</form>

<script type="text/javascript" src="{!! asset('qrCode/js') !!}/html2canvas_withCustomScale.js"></script>
{{-- <script type="text/javascript" src="{!! asset('qrCode/js') !!}/html2canvas.min.js"></script> --}}


<script type="text/javascript">
    function downloadQr(slug) {
        // $("#downloadQrForm").submit()

        // html2canvas(document.getElementById('qrCodePopUp'), {
        //     dpi: 2
        // }).then(function(canvas) {
        //     // to view the generated image on the same page
        //     document.body.appendChild(canvas);
        //
        //
        //     const a = document.createElement("a")
        //     document.body.appendChild(a)
        //
        //     a.href = canvas.toDataURL()
        //     a.download = slug + '.png'
        //     a.click()
        //     document.body.removeChild(a)
        //     // // to save the image as png file
        //     // Canvas2Image.saveAsPNG(canvas);
        //
        //     // Get base64URL
        //     // canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');
        // });

        html2canvas(document.getElementById('qrImage'), {
            dpi: 192,
            onrendered: function(canvas) {
                document.body.appendChild(canvas);


                const a = document.createElement("a")
                document.body.appendChild(a)

                a.href = canvas.toDataURL()
                a.download = slug + '.png'
                a.click()
                document.body.removeChild(a)
            }
        });

    }
</script>











        
        
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
			no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one number')}}',
            load_dates_url:'{{route('car.vendor.availability.loadDates')}}',
            name_required:'{{ __("Name is Required") }}',
            email_required:'{{ __("Email is Required") }}',
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/car/js/single-car.js?_ver='.config('app.version')) }}"></script>
@endsection
