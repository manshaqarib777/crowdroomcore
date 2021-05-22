@php $lang_local = app()->getLocale()
@endphp

@php
$service_translation = $service->translateOrOrigin($lang_local);
@endphp

 @php $vendor = $service->author;
                @endphp
                
                
                
<div class="page-content">
        
        <div class="card card-style2">
            <div class="content">
                
                <div class="d-flex">
                    <div class="mt-1">
                        <p class="color-highlight font-600 mb-n1">Experience Organizer</p>
                        <h1>{{$vendor->getDisplayName()}}</h1>
                    </div>
                    <div class="ml-auto">
                        <img src="{{ $vendor->getAvatarUrl()}}" width="60" class="rounded-xl">
                    </div>
                </div>
                
                <div class="row mb-0 mt-4"> 
                
                
                
                 <h5 class="col-4 text-left font-15" >Service</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">Experience Reservation</h5>
                    
                    @if($booking->start_date)
                    <h5 class="col-4 text-left font-15">{{__('Start date')}}</h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">{{display_date($booking->start_date)}}</h5>
                    
                    <h5 class="col-4 text-left font-15">{{__('Duration')}}</h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"> {{human_time_diff($booking->end_date,$booking->start_date)}}</h5>
                   
                    
                    @endif
                    
                    
                    
                    
                <!--      @php $person_types = $booking->getJsonMeta('person_types')@endphp-->
                <!--@if(!empty($person_types))-->
                <!--    @foreach($person_types as $type)-->
                        
                <!--           <h5 class="col-4 text-left font-15" > Package</h5>-->
                     
                <!--    <h5 class="col-8 text-right font-14 opacity-60 font-400"> {{$type['name_'.$lang_local] ?? $type['name']}} :    {{$type['number']}} </h5>-->
                    
                    
                   
                    
                        
                        
                        
                        
                <!--    @endforeach-->
                <!--@else-->
                <!-- <h5 class="col-4 text-left font-15">{{__("Guests")}}</h5>-->
                <!--    <h5 class="col-8 text-right font-14 opacity-60 font-400">  {{$booking->total_guests}}</h5>-->
                   
                <!--@endif-->
                    
                   
                    
                    
                      @if($service_translation->address)
                    <h5 class="col-4 text-left font-15" > Location</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;">{{$service_translation->address}}</h5>
                     @endif
                 

                </div>
                
                <div class="divider"></div>
                
                <div class="d-flex mb-3">
                    <div>
                        <img src="{{$service->image_url}}" width="110" class="rounded-s shadow-xl">
                    </div>
                    
                    <div class="pl-3 w-100">
                       
                        <h5 class="font-500">{{$service_translation->title}}</h5>
                        <div><h5 class="opacity-50 font-500">Total Price : {{format_money($booking->total)}}</h5></div>
                    </div>
                    
                </div>
                
                 <div class="divider mt-4"></div>
                 
                 
                 
                      @php $person_types = $booking->getJsonMeta('person_types') @endphp
                @if(!empty($person_types))
                    @foreach($person_types as $type)
                    
                     <div class="d-flex mb-3">
                    <div><h5 class="opacity-50 font-500">
                        
                        {{ $type['name_'.$lang_local] ?? $type['name']}}: {{$type['number']}} * {{format_money($type['price'])}}
                        
                        </h5></div>
                    <div class="ml-auto"><h5> {{format_money($type['price'] * $type['number'])}} </h5></div>
                </div>
                        
                           
                        
                    @endforeach
                @else
                    <div class="">
                    <div><h5 class="opacity-50 font-500">
                        {{__("Guests")}}: {{$booking->total_guests}} * {{format_money($booking->getMeta('base_price'))}}
                        </h5>
                    </div>
                    
                <!--<div class="ml-auto">-->
                <!--    <h5>{{format_money($booking->getMeta('base_price') * $booking->total_guests)}} </h5>-->
                <!--</div>-->
                    
                
                    
                @endif
                
                 <div class="divider"></div>
                
                 <div class="d-flex mb-3">
                    <div><h3 class="font-700">Grand Total: </h3></div>
                    <div class="ml-auto"><h3> {{format_money($booking->total)}}</h3></div>
                </div>
                
                
                </div>
                 
                <div class="divider"></div>
                
                <a href="#" class="btn btn-full btn-l rounded-s font-600 gradient-highlight">Scroll down and complete the booking form to finalize your reservation</a>
                
            </div>
        </div>   
    </div>
                                    
                
                
                


<div class="booking-review">
    <h4 class="booking-review-title">{{__("Your Booking")}}</h4>
    <div class="booking-review-content">
        <div class="review-section">
            <div class="service-info">
                <div>
                    @php
                        $service_translation = $service->translateOrOrigin($lang_local);
                    @endphp
                    <h3 class="service-name"><a href="{{$service->getDetailUrl()}}">{{$service_translation->title}}</a></h3>
                    @if($service_translation->address)
                        <p class="address"><i class="fa fa-map-marker"></i>
                            {{$service_translation->address}}
                        </p>
                    @endif
                </div>
                {{--<div>
                    @if($image_url = $service->getImageUrl())
                        <img src="{{$image_url}}" alt="{{$service->title}}">
                    @endif
                </div>--}}
                @php $vendor = $service->author; @endphp
                @if($vendor->hasPermissionTo('dashboard_vendor_access') and !$vendor->hasPermissionTo('dashboard_access'))
                    <div class="mt-1">
                        <i class="icofont-info-circle"></i>
                        {{ __("Vendor") }}: <a href="{{route('user.profile',['id'=>$vendor->id])}}" target="_blank" >{{$vendor->getDisplayName()}}</a>
                    </div>
                @endif
            </div>
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
                        <div class="label">{{__('Duration:')}}</div>
                        <div class="val">
                            {{human_time_diff($booking->end_date,$booking->start_date)}}
                        </div>
                    </li>
                @endif
                @php $person_types = $booking->getJsonMeta('person_types')@endphp
                @if(!empty($person_types))
                    @foreach($person_types as $type)
                        <li>
                            <div class="label">{{$type['name_'.$lang_local] ?? $type['name']}}:</div>
                            <div class="val">
                                {{$type['number']}}
                            </div>
                        </li>
                    @endforeach
                @else
                    <li>
                        <div class="label">{{__("Guests")}}:</div>
                        <div class="val">
                            {{$booking->total_guests}}
                        </div>
                    </li>
                @endif

            </ul>
        </div>
        {{--@include('Booking::frontend/booking/checkout-coupon')--}}
        @do_action('booking.checkout.before_total_review')
        <div class="review-section total-review">
            <ul class="review-list">
                @php $person_types = $booking->getJsonMeta('person_types') @endphp
                @if(!empty($person_types))
                    @foreach($person_types as $type)
                        <li>
                            <div class="label">{{ $type['name_'.$lang_local] ?? $type['name']}}: {{$type['number']}} * {{format_money($type['price'])}}</div>
                            <div class="val">
                                {{format_money($type['price'] * $type['number'])}}
                            </div>
                        </li>
                    @endforeach
                @else
                    <li>
                        <div class="label">{{__("Guests")}}: {{$booking->total_guests}} * {{format_money($booking->getMeta('base_price'))}}</div>
                        <div class="val">
                            {{format_money($booking->getMeta('base_price') * $booking->total_guests)}}
                        </div>
                    </li>
                @endif
                @php $extra_price = $booking->getJsonMeta('extra_price') @endphp
                @if(!empty($extra_price))
                    <li>
                        <div class="label-title"><strong>{{__("Extra Prices:")}}</strong></div>
                    </li>
                    <li class="no-flex">
                        <ul>
                            @foreach($extra_price as $type)
                                <li>
                                    <div class="label">{{$type['name_'.$lang_local] ?? $type['name']}}:</div>
                                    <div class="val">
                                        {{format_money($type['total'] ?? 0)}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                @php $discount_by_people = $booking->getJsonMeta('discount_by_people')@endphp
                @if(!empty($discount_by_people))
                    <li>
                        <div class="label-title"><strong>{{__("Discounts:")}}</strong></div>
                    </li>
                    <li class="no-flex">
                        <ul>
                            @foreach($discount_by_people as $type)
                                <li>
                                    <div class="label">
                                        @if(!$type['to'])
                                            {{__('from :from guests',['from'=>$type['from']])}}
                                        @else
                                            {{__(':from - :to guests',['from'=>$type['from'],'to'=>$type['to']])}}
                                        @endif
                                        :
                                    </div>
                                    <div class="val">
                                        - {{format_money($type['total'] ?? 0)}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
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
                    <li>
                        <div class="label">
                            {{$buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']}}
                            <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc'] }}"></i>
                            @if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
                                : {{$booking->total_guests}} * {{format_money( $fee_price )}}
                            @endif
                        </div>
                        <div class="val">
                            @if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
                                {{ format_money( $fee_price * $booking->total_guests ) }}
                            @else
                                {{ format_money( $fee_price ) }}
                            @endif
                        </div>
                    </li>
                     @php } @endphp
                @endif

                <li class="final-total d-block">
                    <div class="d-flex justify-content-between">
                        <div class="label">{{__("Total:")}}</div>
                        <div class="val">{{format_money($booking->total)}}</div>
                    </div>
                    @if($booking->status !='draft')
                        <div class="d-flex justify-content-between">
                            <div class="label">{{__("Paid:")}}</div>
                            <div class="val">{{format_money($booking->paid)}}</div>
                        </div>
                        @if($booking->paid < $booking->total )
                            <div class="d-flex justify-content-between">
                                <div class="label">{{__("Remain:")}}</div>
                                <div class="val">{{format_money($booking->total - $booking->paid)}}</div>
                            </div>
                        @endif
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
