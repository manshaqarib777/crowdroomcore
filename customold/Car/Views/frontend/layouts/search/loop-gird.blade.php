@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="item-loop {{$wrap_class ?? ''}}">
    <!--@if($row->is_featured == "1")
    {{__("Featured")}}
    @endif -->
    
        <div class="featured"> 
         
         
         
        </div> 
        
            <div class="location">
                 <div class="featured"> 
        @if(!empty($row->location->name))
            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            {{$location->name ?? ''}}
        @endif
        
    
               <!-- <span class="onsale">{{ $row->display_sale_price }}</span>
                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/ Month")}}</span></span>-->.  
               @if($row->passenger)
             {{$row->passenger}} {{__("Passenger")}}
             @endif 
             
        . 
  
            @if($row->baggage)
            {{$row->baggage}} {{__("Baggage")}}
            @endif
            
         
             <!-- @if($row->door)
             {{$row->door}} {{__("Door")}}
             @endif-->
             
             </div></div>
             
             
   
            
            
     
    <div class="thumb-image ">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                    <img src="{{$row->image_url}}" class="img-responsive" alt="">
                @else
                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}
                @endif
            @endif
        </a>
        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
            <i class="fa fa-heart-o"></i>
            
        </div>
    </div>
    
    <!-- <div class="location">
        @if(!empty($row->location->name))
            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            <i class="icofont-flag-alt-1">{{$location->name ?? ''}}</i>
        @endif
        
    </div> -->
   
    
    
    <div class="item-title">
        
         <div class="info">
        <div class="g-price">
            
            <!-- <div class="prefix">
                <span class="fr_text">{{__("from")}}</span>
            </div>-->
            
            <div class="price">
                <span class="onsale">{{ $row->display_sale_price }}</span>
                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/ Year")}}</span></span>
            </div>
        </div>
    </div> 
    <br>
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->is_instant)
                <i class="fa fa-bolt d-none"></i>
            @endif
            
            {{$translation->title}}  </a>
        
     
        <div class="qr-imp-infor" style="color:red;">
       
         {{$row->gear}}
      
    
    
        
        <!--@if($row->discount_percent)
            <div class="sale_info">{{$row->discount_percent}}</div>
        @endif -->
       </div> 
       
    </div>
    
    
    
    
        <!--  <div class="amenities">
        
        @if($row->baggage)
            <span class="amenity bath" data-toggle="tooltip" title="{{__("Baggage")}}" >
                <i class="icofont-badge "></i>
                <span class="text">
                     
                    Apartment<br>
                </span>
            </span>
        @endif  -->
       
        <!-- @if($row->passenger)
            <span class="amenity total" data-toggle="tooltip"  title="{{ __("Passenger") }}">
                <i class="icofont-bed  "></i>
                <span class="text">
                   Bedrooms<br> {{$row->passenger}}
                </span>
            </span>
        @endif -->
       
        <!-- @if($row->gear)
            <span class="amenity bed" data-toggle="tooltip" title="{{__("Gear Shift")}}">
                <i class="input-icon field-icon icon-gear"></i>
                <span class="text">
                    {{$row->gear}}
                </span>
            </span>
        @endif -->
       
       
       <!-- @if($row->baggage)
            <span class="amenity bath" data-toggle="tooltip" title="{{__("Baggage")}}" >
                 <i class="icofont-bathtub  "></i>
                <span class="text">
                    Bathrooms<br>{{$row->baggage}}
                </span>
            </span>
        @endif
        @if($row->door)
            <span class="amenity size" data-toggle="tooltip" title="{{__("Door")}}" >
                 <i class="icofont-ui-home  "></i>
                <span class="text">
                    Size in sqm<br>{{$row->door}}
                </span>
            </span>
        @endif
    </div> -->
       
    
    
    <!--  <div class="info">
        <div class="g-price">
            <div class="prefix">
                <span class="fr_text">{{__("from")}}</span>
            </div>
            <div class="price">
                <span class="onsale">{{ $row->display_sale_price }}</span>
                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/ Month")}}</span></span>
            </div>
        </div>
    </div>  -->
   
   
</div>
