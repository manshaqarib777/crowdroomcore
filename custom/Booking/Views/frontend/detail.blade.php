@php $lang_local = app()->getLocale()
@endphp

@php
$service_translation = $service->translateOrOrigin($lang_local);
@endphp

@extends('layouts.app')
@section('head')
    <link href="{{ asset('module/booking/css/checkout.css?_ver='.config('app.version')) }}" rel="stylesheet">
@endsection
@section('content')
 @php $vendor = $service->author;
                @endphp

<div class="page-content">
        
        <div class="card card-style-receipt">
            <div class="content">
                
                <div class="d-flex">
                    <div class="mt-1">
                        <p class="color-highlight font-600 mb-n1">Greetings From</p>
                        <h1> {{$vendor->getDisplayName()}}</h1>
                        
                    </div>
                    
                    
                    <div class="ml-auto">
                     @if(!Auth::id())
                    
                        <img src="{{ $vendor->getAvatarUrl()}}" width="60" class="rounded-xl">
                   
                 
             @else    
                
                @if($avatar_url = Auth::user()->getAvatarUrl())
                
                <a href="#" style="margin-top:10px"class="float-right  rounded-xl"><img src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}" class="rounded-xl"  height="32" width="32"></a>
             
                 @endif
                 
               
            @endif 
             </div>
                </div>        
                    
                    
                   
                
               
                
                <div class="row mb-0 mt-4">                
                    <h5 class="col-4 text-left font-15">Booking ID</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">#{{$booking->id}}</h5>
                    
                    <h5 class="col-4 text-left font-15">Status</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400" style="color:#840606;"> {{$booking->statusName}}</h5>
                    
                    
                    
                    <h5 class="col-4 text-left font-15">{{__('Payment Method')}}</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400" style="color:#840606;">{{$gateway->name}} </h5>
                    
                   
                    
                    <h5 class="col-4 text-left font-15">Guest</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">{{$booking->first_name}} {{$booking->last_name}}</h5>
                    
                    
                    
                    @if($booking->start_date)
                    <h5 class="col-4 text-left font-15">{{__('Start date:')}}</h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">{{display_date($booking->start_date)}}</h5>
                    
                    @endif
                    
                   
                            
                            
                            
                    @if($booking->duration)
                    
                     <h5 class="col-4 text-left font-15">{{__('Duration:')}}</h5>
                     @php $duration = $booking->getMeta("duration")
                            @endphp
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"> {{duration_format($duration,true)}}</h5>
                     @endif
                     
                     
                    
                   
                    
                    
                    
                    @if($service_translation->address)
                    <h5 class="col-4 text-left font-15" >Address</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;">{{$service_translation->address}}</h5>
                     @endif

                </div>
                               @php
$price_item = $booking->total_before_extra_price;
@endphp
                
                <div class="divider"></div>
                
                <div class="d-flex mb-3">
                    <div>
                        <img src="{{$service->image_url}}" width="110" class="rounded-s shadow-xl">
                    </div>
                    <div class="pl-3 w-100">
                        
                        <h5 class="font-500">{{$service_translation->title}}</h5>
                    
                    <div><h5 class="opacity-50 font-500">Price : {{format_money( $price_item)}}</h5></div>
                    
                
                    </div>
                    
                    
                </div>
                    
                <!--<div class="d-flex mb-3">-->
                <!--    <div>-->
                <!--        <img src="images/pictures/7s.jpg" width="110" class="rounded-s shadow-xl">-->
                <!--    </div>-->
                <!--    <div class="pl-3 w-100">-->
                <!--        <p class="mb-0 color-highlight">2x Item</p>-->
                <!--        <h1>$1.150 </h1>-->
                <!--        <h5 class="font-500">Your awesome product or service name goes here</h5>-->
                <!--    </div>-->
                <!--</div>-->
                    
                <div class="divider mt-4"></div>
                @php
$price_item = $booking->total_before_extra_price;
@endphp
                @if($booking->status !='draft')
                <div class="d-flex mb-3">
                    <div><h5 class="opacity-50 font-500">{{__("Paid:")}}</h5></div>
                    <div class="ml-auto"><h5>{{format_money($booking->paid)}} </h5></div>
                </div>
                @endif
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h5 class="opacity-50 font-500">Taxes</h5></div>-->
                <!--    <div class="ml-auto"><h5>$50 </h5></div>-->
                <!--</div>-->
                <div class="d-flex mb-3">
                    <div><h3 class="font-700">Grand Total</h3></div>
                    <div class="ml-auto"><h3>{{format_money($booking->total)}} </h3></div>
                </div>
                
                <div class="divider"></div>
                 <!--<p class="font-700"> {{__('we also sent booking details to:')}}  <span>{{$booking->phone}}. </span> </p>-->
                 
                 <!--<p class="font-700"> {{__('we also sent booking details to:')}}  <span>{{$booking->email}}. </span> </p>-->
                
                <!--<a href="#" class="btn btn-full btn-l rounded-s font-600 gradient-highlight">Download Invoice in PDF</a>-->
                
            </div>
        </div>   
    </div>








    
    
<!--    <div id="menu-success-2" class="menu menu-box-bottom bg-green-dark rounded-m menu-active"-->
<!--data-menu-height="335"-->
<!--data-menu-effect="menu-over">-->
<!--<h1 class="text-centernew mt-4"><i class="fa-new fa-3x fa-check-circle scale-box color-white shadow-xl rounded-circle"></i></h1>-->
<!--<h1 class="text-centernew mt-3 font-700 color-white">All's Good</h1>-->
<!--<p class="boxed-text-l color-white opacity-70">-->
<!--You can continue with your previous actions.<br> Easy to attach these to success calls.-->
<!--</p>-->
<!--<a href="#" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-600 bg-white color-black">Great, Thanks!</a>-->
<!--</div>-->


<div id="menu-success-1" class="menu menu-box-bottom rounded-m menu-active" 
         data-menu-height="185" 
         data-menu-effect="menu-over">
        <div class="menu-title">
            <i class="fa-new fa-check-circle scale-box float-left mr-3 ml-3 fa-4x color-green-dark"></i>
            <p class="color-highlight">Thanks for Booking !</p>
            <h1>{{$booking->first_name}}</h1>
              <!--<h1>{{$booking->first_name}} {{$booking->last_name}}</h1>-->
            <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="content mt-0 mb-0">
            <p class="pr-3">
                Your reservation was submitted successfully. Take a screen shot of this Voucher to show as proof. Add wechat:crowdroom1
                 <!--Your reservation was submitted successfully. Take a screen shot of this Voucher and show it as proof at the Entrance. You can also Check {{$booking->email}} for details -->
            </p>
        </div>
    </div> 


















    <div class="bravo-booking-page padding-content" >
        <div class="container">
        <!--    <div class="row booking-success-notice">-->
        <!--        <div class="col-lg-8 col-md-8">-->
        <!--            <div class="d-flex align-items-center">-->
        <!--                <img src="{{url('images/ico_success.svg')}}" alt="Payment Success">-->
        <!--                <div class="notice-success">-->
                            
        <!--                    <p class="line1"><span>Dear {{$booking->first_name}},</span>-->
        <!--                      <br>-->
        <!--                      Thanks for using Crowdroom !  {{__('Your reservation was submitted successfully!')}}-->
        <!--                    </p>-->
        <!--                <p class="qr-imp-infor">{{__('Booking details has been sent to:')}} <span>{{$booking->email}}.-->
        <!--                <br>-->
        <!--                <p class="line1">What Next?</p> -->
        <!--                1.Check your email for Reservation Details -->
        <!--                <br>-->
        <!--                2.To see Your E-Ticket / Voucher, Click My bookings below.</span></p>-->
        <!--                </div>-->
                        
                        

        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="col-lg-4 col-md-4">-->
        <!--            <ul class="booking-info-detail">-->
        <!--                <li><span>{{__('Booking Number')}}:</span> {{$booking->id}}</li>-->
        <!--                <li><span>{{__('Booking Date')}}:</span> {{display_date($booking->created_at)}}</li>-->
                        
                        <!--@if(!empty($gateway))
        <!--                <li><span>{{__('Payment Method')}}:</span> {{$gateway->name}}</li>-->
        <!--                @endif-->
        <!--                <li><span>{{__('Booking Status')}}:</span> {{ $booking->status_name }}</li> -->-->
                        
        <!--            </ul>-->
        <!--            <br>-->
        <!--       <div class="text-center">-->
        <!--                <a href="{{route('user.booking_history')}}" class="btn btn-primary">{{__('Booking History')}}</a>-->
        <!--            </div> -->
        <!--            <br>-->
        <!--            <div class="infor-message">-->
        <!--Need Help? Chat with Us - <a href="https://tawk.to/chat/5f7289cb4704467e89f30e10/default">Live Chat Here</a>-->
        <!--</div>-->
                    
        <!--            </div>-->
        <!--    </div>-->
            
            
                    
            <div class="row booking-success-detail">
                <div class="col-md-8">
                    @include ($service->booking_customer_info_file ?? 'Booking::frontend/booking/booking-customer-info')
                    <div class="text-center">
                        <a href="{{route('user.booking_history')}}" class="btn btn-primary">{{__('Booking History')}}</a>
                    </div>
                </div>
                
                
                <div class="col-md-4">
                    @include ($service->checkout_booking_detail_file ?? '')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')

<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>


@endsection
