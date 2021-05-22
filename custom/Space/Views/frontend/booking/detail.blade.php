@php $lang_local = app()->getLocale()
@endphp

@php
$service_translation = $service->translateOrOrigin($lang_local);
@endphp

 @php $vendor = $service->author;
                @endphp
                
                
<!--<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>-->


<div class="page-content">
   
        
        <div class="card card-style2">
            <div class="content">
                
                <div class="d-flex">
                   <div class="mt-1">
                        <p class="color-highlight font-600 mb-n1">Operator</p>
                        <h1>{{$vendor->getDisplayName()}}</h1>
                    </div>
                    <div class="ml-auto">
                        <img src="{{ $vendor->getAvatarUrl()}}" width="60" class="rounded-xl">
                    </div>
                </div>
                
                <div class="row mb-0 mt-4">    
                
                
                
                    <h5 class="col-4 text-left font-15">Service</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">Short-term Space Rental</h5>
                    
                    @if($booking->start_date)
                    <h5 class="col-4 text-left font-15">{{__('Start Date')}}</h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">{{display_date($booking->start_date)}}</h5>
                    
                    
                    
                    <h5 class="col-4 text-left font-15">{{__('End date')}}</h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">{{display_date($booking->end_date)}}</h5>
                    
                    
                    <h5 class="col-4 text-left font-15">Duration</h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">{{($booking->duration_days)}} {{__('Days:')}} </h5>
                    
                    @endif
                    
                  
                    <!--<h5 class="col-4 text-left font-15">Bill To</h5>-->
                    <!--<h5 class="col-8 text-right font-14 opacity-60 font-400">John Doe</h5>-->
                    
                     @if($service_translation->address)
                    <h5 class="col-4 text-left font-15" > Location</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;">detailed address and contact info will be revealed on your Voucher after your reservation</h5>
                     @endif
                    
                    
                    <!--<h5 class="col-4 text-left font-15">Date</h5>-->
                    <!--<h5 class="col-8 text-right font-14 opacity-60 font-400">15th June 2025</h5>-->
                    
                    

                </div>
                
                <div class="divider"></div>
                
                <div class="d-flex mb-3">
                    <div>
                        <img src="{{$service->image_url}}" width="110" class="rounded-s shadow-xl">
                    </div>
                    <div class="pl-3 w-100">
                        <h5 class="font-500">{{$service_translation->title}}</h5>
                        
                        
                        @php
            $price_item = $booking->total_before_extra_price;
             @endphp
                           @if(!empty($price_item))
                        <div><h5 class="opacity-50 font-500">{{($booking->duration_days)}} {{__('Days:')}} Fee = {{format_money( $price_item)}}</h5></div>
                        
                        @endif
                        
                        
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
@if(!empty($price_item))
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{__('Rental price')}}</h5></div>
<div class="ml-auto"><h5> {{format_money( $price_item)}}</h5></div>
</div>
@endif
@php
$extra_price = $booking->getJsonMeta('extra_price')
@endphp
@if(!empty($extra_price))
@foreach($extra_price as $type)
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{$type['name_'.$lang_local] ?? $type['name']}}</h5></div>
<div class="ml-auto"><h5>{{format_money($type['total'] ?? 0)}}</h5></div>
</div>
@endforeach
@endif

<!--service fee-->
@if(!empty($booking->buyer_fees))
@php
$buyer_fees = json_decode($booking->buyer_fees , true);
foreach ($buyer_fees as $buyer_fee){
$fee_price = $buyer_fee['price'];
if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
$fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
}
@endphp
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{$buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']}}
<i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc'] }}"></i> 
                
@if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
: {{$booking->total_guests}} * {{format_money( $fee_price )}}
@endif</h5></div>
<div class="ml-auto"><h5>@if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
{{ format_money( $fee_price * $booking->total_guests ) }}
@else
{{ format_money( $fee_price ) }}
@endif</h5></div>
</div>
@php }
@endphp
@endif
<div class="d-flex mb-3">
                    <div><h3 class="font-700">Grand Total</h3></div>
                    <div class="ml-auto"><h3>{{format_money($booking->total)}} </h3></div>
                </div>





<!--</div> -->

                
                <div class="divider"></div>
                
                <a href="#" class="btn btn-full btn-l rounded-s font-600 gradient-highlight"> Scroll down to Reserve date without payment,Pay on wechat after reservation</a>
                
            </div>
        </div>   
    </div>
    
    
 
 
 
 
 
 
 
 
 
 
    

<div class="booking-review">
<!--<h4 class="booking-review-title">{{__("Your Booking")}}</h4>-->

<!-- NEW CARD DESIGN START-->
<div class="card card-style2 mb-2">
<div class="content">
<div class="d-flex">
@if($image_url = $service->image_url)
<div>
<img src="{{$service->image_url}}" class="rounded-sm" width="100">
</div>
@endif
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2"><a href="{{$service->getDetailUrl()}}">{{$service_translation->title}}</a></h6>
<h5 class="font-700">Total Rental Price: {{format_money($booking->total)}}</h5> 

</div>
<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>

</div>
</div>
</div>

<!--NEW DESIGN CARD ENDS HERE -->




    
<!-- NEW CARD DESIGN START-->
<div class="card card-style3 mb-2">
<div class="content">
<div class="d-flex">
<!--@if($image_url = $service->image_url)-->
<!--<div>-->
<!--<img src="{{$service->image_url}}" class="rounded-sm" width="100">-->
<!--</div>-->
<!--@endif-->
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2" style="margin-bottom:-16px; margin-top:-13px; margin-left:-10px;"><a href="{{$service->getDetailUrl()}}">{{$service_translation->address}} </a></h6>
</div>
<!--<div class="align-self-center mr-n2">-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-map-marker font-18 color-blue-dark opacity-20"></i></a>-->

<!--</div>-->

</div>
</div>
</div>

<!--NEW DESIGN CARD ENDS HERE --> 




<!-- NEW CARD DESIGN START fees details-->
<div class="card card-style3 mb-2">
<div class="content">
<div class="d-flex">
<!--@if($image_url = $service->image_url)-->
<!--<div>-->
<!--<img src="{{$service->image_url}}" class="rounded-sm" width="100">-->
<!--</div>-->
<!--@endif-->
<div class="w-100 ml-3 pt-1" style="margin-bottom:-16px;">
<h6 class="font-500 font-14 pb-2"><a href="{{$service->getDetailUrl()}}">Fee Details</a></h6>
<!--<h4 class="font-700">Total Price: {{format_money($booking->total)}}</h4>-->

@php
$price_item = $booking->total_before_extra_price;
@endphp
@if(!empty($price_item))
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{__('Rental price')}}</h5></div>
<div class="ml-auto"><h5> {{format_money( $price_item)}}</h5></div>
</div>
@endif
@php
$extra_price = $booking->getJsonMeta('extra_price')
@endphp
@if(!empty($extra_price))
@foreach($extra_price as $type)
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{$type['name_'.$lang_local] ?? $type['name']}}</h5></div>
<div class="ml-auto"><h5>{{format_money($type['total'] ?? 0)}}</h5></div>
</div>
@endforeach
@endif



@if(!empty($booking->buyer_fees))
@php
$buyer_fees = json_decode($booking->buyer_fees , true);
foreach ($buyer_fees as $buyer_fee){
$fee_price = $buyer_fee['price'];
if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
$fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
}
@endphp
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{$buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']}}
<i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc'] }}"></i>

<br>
<h4 class="font-700">Total Price: {{format_money($booking->total)}}</h4>


@if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
: {{$booking->total_guests}} * {{format_money( $fee_price )}}
@endif</h5></div>
<div class="ml-auto"><h5>@if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
{{ format_money( $fee_price * $booking->total_guests ) }}
@else
{{ format_money( $fee_price ) }}
@endif</h5></div>
</div>
@php }
@endphp
@endif
</div>
<div class="align-self-center mr-n2">
<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>

</div>

</div>
</div>
</div>

<!--NEW DESIGN CARD ENDS HERE -->

<div class="booking-review-content">
{{--<div class="review-section">
<div class="service-info">
<div>

<h3 class="service-name"><a href="{{$service->getDetailUrl()}}">{{$service_translation->title}}</a></h3>
@if($service_translation->address)
<p class="address"><i class="fa fa-map-marker"></i>
See your email after booking - for Location Address of This Space <!--{{$service_translation->address}} -->
</p>
@endif
</div>
<div>
@if($image_url = $service->image_url)
@if(!empty($disable_lazyload))
<img src="{{$service->image_url}}" class="img-responsive" alt="">
@else
{!! get_image_tag($service->image_id,'medium',['class'=>'img-responsive','alt'=>$service->title]) !!}
@endif
@endif
</div>
@php $vendor = $service->author;
@endphp
@if($vendor->hasPermissionTo('dashboard_vendor_access') and !$vendor->hasPermissionTo('dashboard_access'))
<div class="mt-2">
<i class="icofont-info-circle"></i>
{{ __("Vendor") }}: <a href="{{route('user.profile',['id'=>$vendor->id])}}" target="_blank">{{$vendor->getDisplayName()}}</a>
</div>
@endif
</div>
</div> --}}

<div class="content">
<div class="divider mt-4"></div>
@php
$price_item = $booking->total_before_extra_price;
@endphp
@if(!empty($price_item))
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{__('Rental price')}}</h5></div>
<div class="ml-auto"><h5> {{format_money( $price_item)}}</h5></div>
</div>
@endif
@php
$extra_price = $booking->getJsonMeta('extra_price')
@endphp
@if(!empty($extra_price))
@foreach($extra_price as $type)
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{$type['name_'.$lang_local] ?? $type['name']}}</h5></div>
<div class="ml-auto"><h5>{{format_money($type['total'] ?? 0)}}</h5></div>
</div>
@endforeach
@endif

@if(!empty($booking->buyer_fees))
@php
$buyer_fees = json_decode($booking->buyer_fees , true);
foreach ($buyer_fees as $buyer_fee){
$fee_price = $buyer_fee['price'];
if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
$fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
}
@endphp
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500">{{$buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']}}
<i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc'] }}"></i>
@if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
: {{$booking->total_guests}} * {{format_money( $fee_price )}}
@endif</h5></div>
<div class="ml-auto"><h5>@if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
{{ format_money( $fee_price * $booking->total_guests ) }}
@else
{{ format_money( $fee_price ) }}
@endif</h5></div>
</div>
@php }
@endphp
@endif
<div class="d-flex mb-3">
<div><h3 class="font-700">{{__("Total:")}}</h3></div>
<div class="ml-auto"><h3>{{format_money($booking->total)}}</h3></div>
</div>
@if($booking->status !='draft')
<div class="d-flex mb-3">
<div><h3 class="font-700">{{__("Paid:")}}</h3></div>
<div class="ml-auto"><h3>{{format_money($booking->paid)}}</h3></div>
</div>
@if($booking->paid < $booking->total )
<div class="d-flex mb-3">
<div><h3 class="font-700">{{__("Remain:")}}</h3></div>
<div class="ml-auto"><h3>{{format_money($booking->total - $booking->paid)}}</h3></div>
</div>
@endif
@endif
</div>
<div class="review-section">
<ul class="review-list">
@if($booking->start_date)
<li>
<div class="label">{{__('Start date:')}}</div>
<div class="val">
{{display_date($booking->start_date)}}
</div>
</li>
<li>
<div class="label">{{__('End date:')}}</div>
<div class="val">
{{display_date($booking->end_date)}}
</div>
</li>
<li>
<div class="label">{{__('Days:')}}</div>
<div class="val">
{{$booking->duration_days}}
</div>
</li>
@endif
@if($meta = $booking->getMeta('adults'))
<li>
<div class="label">{{__('Adults:')}}</div>
<div class="val">
{{$meta}}
</div>
</li>
@endif
@if($meta = $booking->getMeta('children'))
<li>
<div class="label">{{__('Children:')}}</div>
<div class="val">
{{$meta}}
</div>
</li>
@endif

<li class="flex-wrap">
<div class="flex-grow-0 flex-shrink-0 w-100">
<p class="text-center">
<a data-toggle="modal" data-target="#detailBookingDate{{$booking->code}}" aria-expanded="false" aria-controls="detailBookingDate{{$booking->code}}">
{{__('Detail')}} <i class="icofont-list"></i>
</a>
</p>
</div>
</li>

</ul>
</div>
{{--@include('Booking::frontend/booking/checkout-coupon')--}}
</div>
</div>

<?php
$dateDetail = $service->detailBookingEachDate($booking);
;?>
<div class="modal fade" id="detailBookingDate{{$booking->code}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title text-center">{{__('Detail')}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<ul class="review-list list-unstyled">
<li class="mb-3 pb-1 border-bottom">
<h6 class="label text-center font-weight-bold mb-1"></h6>
<div>
@includeIf("Space::frontend.booking.detail-date",['rows'=>$dateDetail])
</div>
<div class="d-flex justify-content-between font-weight-bold px-2">
<span>{{__("Total:")}}</span>
<span>{{format_money(array_sum(\Illuminate\Support\Arr::pluck($dateDetail,['price'])))}}</span>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>







