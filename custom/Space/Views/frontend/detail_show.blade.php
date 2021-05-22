@extends('layouts.app')
@section('head')
<link href="{{ asset('dist/frontend/module/space/css/space.css?_ver='.config('app.version')) }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
<div class="bravo_detail_space">
{{-- changed --}}
{{-- @include('Space::frontend.layouts.details.space-banner')--}} 
<div class="card card-style-showpagetop detail mb-2">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" class="rounded-sm" width="100">
</div>
@endif
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2">{{$translation->title}}</h6>
<h4 class="font-700" style="font-size:14px; color:#b12222;">{{ $row->display_price }} / {{$row->bathroom}}</h4>
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
            <div class="content">
                
                
                
                
                <!--<div class="d-flex mb-3">-->
                    <!--<div>-->
                    <!--    <img src="/images/iconbulb.gif" width="40" class="">-->
                        
                        <!--<img src="{{$row->getBannerImageUrlAttribute('full')}}" width="110" class="rounded-s shadow-xl">-->
                        
                    <!--</div>-->
                    
          <!--          <div class="pl-3 w-100">-->
                        
                        
          <!--                 @if($row->bathroom)   @if($row->max_guests)-->
          <!--<h5 class="font-500"> {{$row->max_guests}} People Can Use This Space for a duration of {{$row->bathroom}} at the cost of {{ $row->display_price }}.  </h5>-->
          <!--   @endif  @endif -->
                        
                       
                       
                        
          <!--          </div>-->
                    
                <!--</div>-->
                
                
          <!--      <div class="d-flex mb-3">-->
          <!--          <div>-->
          <!--              <img src="/images/icon3.gif" width="40" class="">-->
                        
                        <!--<img src="{{$row->getBannerImageUrlAttribute('full')}}" width="110" class="rounded-s shadow-xl">-->
                        
          <!--          </div>-->
                    
          <!--          <div class="pl-3 w-100">-->
                        
          <!--               @if($row->bathroom)   @if($row->max_guests)-->
          <!--<h5 class="font-500"> {{$row->max_guests}} People Can Use This Space for a duration of {{$row->bathroom}} at the cost of {{ $row->display_price }}.  </h5>-->
          <!--   @endif  @endif -->
             
                     
          
            
                     
          <!--          </div>-->
                    
          <!--      </div>-->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                    
                 
                    
                <!--<div class="divider mt-4"></div>-->
                
                
                <!--<div class="d-flex">-->
                <!--    <div class="mt-1">-->
                <!--        <p class="color-highlight font-600 mb-n1">Event Organizer</p>-->
                <!--        <h1>{{ \App\User::findOrFail($row->create_user)->name }}-->
                <!--                {{-- {{ __('hellodd hidddd') }} --}}-->
                <!--                {{-- {{ $row->create_user }} --}}</h1>-->
                <!--    </div>-->
                <!--    <div class="ml-auto">-->
                <!--        <img src="{{ \App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png') }}" width="60" class="rounded-xl">-->
                <!--    </div>-->
                <!--</div>-->
                
                <!--<div class="row mb-0 mt-4"> -->
                
                
                
                
                 <!--<h5 class="col-4 text-left font-15" >Copyright</h5>-->
                     
                 <!--   <h5 class="col-8 text-right font-14 opacity-60 font-400">2020 CrowdRoom Inc</h5>-->
                    
                 <!--    <h5 class="col-4 text-left font-15" > Location</h5>-->
                     
                 <!--   <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;">{{$location->name ?? ''}} {{$translation->address}}</h5>-->
                    
                 <!--<h5 class="col-4 text-left font-15" >Reservation</h5>-->
                     
                 <!--   <h5 class="col-8 text-right font-14 opacity-60 font-400">Event Ticket Booking</h5>-->
                    
               
                   
                     
                 

                <!--</div>-->
                
                <!--<div class="divider"></div>-->
                
                <!--<div class="d-flex mb-3">-->
                <!--    <div>-->
                <!--        <img src="/images/iconbulb.gif" width="40" class="">-->
                        
                        <!--<img src="{{$row->getBannerImageUrlAttribute('full')}}" width="110" class="rounded-s shadow-xl">-->
                        
                <!--    </div>-->
                    
                <!--    <div class="pl-3 w-100">-->
                       
                <!--        <h5 class="font-500">About {{$translation->title}}</h5>-->
                        
                <!--    </div>-->
                    
                <!--</div>-->
                    
                
                    
                <!--<div class="divider mt-4"></div>-->
               
                
                
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h5 class="opacity-50 font-500">Total Amount to Pay</h5></div>-->
                <!--    <div class="ml-auto"><h5></h5></div>-->
                <!--</div>-->
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h3 class="font-700">Grand Total</h3></div>-->
                <!--    <div class="ml-auto"><h3> </h3></div>-->
                <!--</div>-->
                
                <!--<div class="divider"></div>-->
                
                <a href="#qrCodePopUp" class="qr-code btn btn-full btn-l rounded-s font-600 gradient-highlight" target="" rel="modal:open">Click here to Generate QR Poster. Take Poster Screenshot and share on wechat</a>
                
                
                <!--<a class="qr-code" href="#qrCodePopUp" target="" rel="modal:open" original-title="{{__("Wechat")}}">-->
                
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

                <div class="qr-header-text">
                    {{$translation->title}}
                </div>
            </div>

            {{-- <img class="product-image" src="{!! asset('qrCode') !!}/img/pexels-tún-807840.jpg" alt="" /> --}}
            <img class="qr-product-image" src="{{$row->getBannerImageUrlAttribute('full')}}" alt="" />
            {{-- <img class="product-image" src="{{$row->getGallery()[0]['large']}}" alt="" /> --}}
            
            
            <div class="qr-product-details row">
                <div class="qr-details col-7">
                    
                    
                    
                  
                  
                  
                                     <div class="card card-style-spaceqr mb-2">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" class="rounded-sm" width="100" style="max-height:76px;">
</div>
@endif
<div class="pl-3 w-100">
<h5 class="font-501" style="font-size:15px; margin-top:-3px;">Meetup Space Rental</h5>
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
                                <i class="fa fa-users"></i>
                                 {{__(':count Guest in maximum',['count'=>$row->max_guests])}} 
                            
                            </span>
                             
                             
                        </div>
                        
                        
                         <div class="qr-price" style="color: #00001e !important; margin-top:0 !important;padding-top:1px">
                        <span class="qr-yen-logo" style="font-size:16px;">¥</span>{{ explode('.',$row->sale_price)[0] }}<span class="qr-small-dec"></span> / {{$row->bathroom}}  
                        <!-- <span class="qr-box"
                            style="text-decoration: line-through;color: #c03!important;">¥{{ explode('.',$row->sale_price)[0] }}</span>-->


                    </div>
                       
                       
                      
                <a href="#" class="chip chip-s bg-gray-light">
                    <i class="fa fa-check bg-green-dark color-white"></i>
                    <strong class="color-black font-400">{{$row->square}} </strong>
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
                            <!--<span class="qr-people">-->


                            <!--    <i class="fa fa-users"></i>-->
                            <!--    {{__(':count Guest in maximum',['count'=>$row->max_guests])}} -->
                            <!--</span>-->
                        </div>
                        <div class="qr-small-dec">
                <!--<span class="qr-box"-->
                <!--style="margin-top:-5px;text-decoration: line-through;color: #c03!important;">¥{{ explode('.',$row->price)[0] }}</span>-->
                            {{-- {!! str_replace(" ","&nbsp;",$translation->title) !!} --}}
                            <h5 class="font-501" style="font-size:16px; margin-top:-3px; margin-left:4px;">  {{$translation->title}}</h5>
                          

                        </div>
                        {{-- {!! str_limit($translation->content,50) !!} --}}


                    </div>


                        


               
                    
                   
                             @if($row->bed)
             <div class="qr-imp-infor" style="margin-top:-5px;">
                 {{$row->bed}}
                    
                    </div>
                    @endif
                    <div class="qr-seller" style="margin-top:5px">
                        <img src="{{ \App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png') }}" alt="" class="qr-avatar" />
                        <!--<span class="qr-seller-name">-->
                        <!--    {{ \App\User::findOrFail($row->create_user)->name }}-->
                        <!--    {{-- {{ __('hellodd hidddd') }} --}}-->
                        <!--    {{-- {{ $row->create_user }} --}}-->
                        <!--</span>-->
                    </div>



                </div>
                <div class="qr-code-img text-center col-5" style="margin-top:10px;">
                    {{-- <img src="{!! asset('qrCode') !!}/img/qr-generator.png" alt="" /> --}}
                    <div class="">

                        <img src="data:image/<IMAGE_TYPE>;base64,{!! base64_encode(QrCode::format('png')->size(123)->generate(url()->current())); !!}">
                    </div>

                    <br>
                    <div class="qr-text">长按二维码<br>Long Press To see More Details About This Meetup Space
                        <!--{{$translation->title}}.-->
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
    <!--margin-left: 10px;">Click here to Generate QR Poster</h8>-->
    <!--            <a class="qr-code" href="#qrCodePopUp" target="" rel="modal:open" original-title="{{__("Wechat")}}"> -->
    <!--                <i class="icofont-qr-code"></i>-->
    <!--            </a>-->

            </div>
        </div>
        <div>
            
        </div>

        
    </div>
</div>



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








@include('Space::frontend.layouts.details.space-form-book')
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
no_guest_select:'{{__('Please select at least one guest')}}',
load_dates_url:'{{route('space.vendor.availability.loadDates')}}',
name_required:'{{ __("Name is Required") }}',
email_required:'{{ __("Email is Required") }}',
};
</script>
<script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
<script type="text/javascript" src="{{ asset('module/space/js/single-space.js?_ver='.config('app.version')) }}"></script>
@endsection



     <!--Start of Tawk.to Script-->
 <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f7289cb4704467e89f30e10/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


