@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp



 <!--<div class="page-content pb-3"> -->
 
 
        
        <!-- card in this page format must have the class card-full to avoid seeing behind it-->
 <!--       <div class="card card-full rounded-m pb-4">-->
 <!--           <div class="drag-line"></div>-->
            
 <!--           <div class="content">-->
                <!--<p class="font-600 mb-n1 color-highlight">Full Maps are Awesome</p>-->
                <!--<h1>Close to You</h1>-->
                <!--<p>-->
                <!--    By default the map you see here is an embeded Google Map. You can add your own API for maps and generate places.-->
                <!--</p>-->
                
                <div class="d-flex" style="background-color:#77777;">
                    
                    
                    <div class="mr-auto" style="margin-left:3px">
                        <img src="{{$row->image_url}}" width="140" class="rounded-sm" 
                        style="border-radius: 12px !important; height:107px;">
                    </div>
            <!--        <div class="mr-auto" >-->
            <!--         <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">-->
            <!--@if($row->image_url)-->
            <!--    @if(!empty($disable_lazyload))-->
            <!--        <img src="{{$row->image_url}}"  class="rounded-sm" > -->
            <!--    @else-->
            <!--        {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}-->
            <!--    @endif-->
            <!--@endif-->
            <!--       </a>-->
                        
            <!--        </div>-->
             
                    
                    <div class="w-100 pl-3">
                        
                 <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
                     
            @if($row->is_instant)
                <i class="fa fa-bolt d-none"></i>
            @endif
            
            <h4 class="mb-0">{{$translation->title}} </h4>
                        </a>
                       
                        <!--<p class="mb-2"> {{$row->gear}}</p>-->
                        
                       <p style="margin-top:-30px;">
                           
                            <!--<i class="fa fa-map-marker color-blue-dark icon-10 text-center ml-2 mr-2"></i>3.4 Miles Away-->
                            <br>
                            
                             @if($row->passenger)
                           <span class="mt-3 badge border color-green-dark border-green-dark"> {{$row->passenger}} {{__("Passenger")}}</span>
                         @endif 
                         
                          @if($row->baggage)
                        <span class="ml-2 badge border color-blue-dark border-blue-dark"> {{$row->baggage}} {{__("Baggage")}}</span>
                           @endif
                           
                           
                           
                            
                            @if(!empty($row->location->name))
                             @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                             <span class="mt-2 badge border color-red-dark border-red-dark"> {{$location->name ?? ''}}</span>
                             @endif
                          
                         </p> 
    <i class="fa fa-star color-yellow-dark icon-10 text-center mr-2"></i>{{ $row->display_price }} / {{ $row->door }}
                    </div>
                </div>
                
                <div class="divider mt-3 mb-3"></div>
                
              
                
               
                
                <!--<a href="#" data-back-to-top class="btn gradient-blue btn-full btn-m font-700 font-12 mt-4 rounded-s">Back to Map</a>-->
                
    <!--        </div>-->
    <!--    </div>-->

    <!--</div>-->
    <!-- Page content ends here-->






















<!--<div class="item-loop {{$wrap_class ?? ''}}">-->
    <!--@if($row->is_featured == "1")
<!--    {{__("Featured")}}-->
<!--    @endif -->
    
<!--        <div class="featured"> -->
         
         
         
<!--        </div> -->
        
<!--            <div class="location">-->
<!--                 <div class="featured"> -->
<!--        @if(!empty($row->location->name))-->
<!--            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp-->
<!--            {{$location->name ?? ''}}-->
<!--        @endif-->
        
    
               <!-- <span class="onsale">{{ $row->display_sale_price }}</span>
<!--                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/ Month")}}</span></span>-->
<!--               @if($row->passenger)-->
<!--             {{$row->passenger}} {{__("Passenger")}}-->
<!--             @endif -->
             
<!--        . -->
  
<!--            @if($row->baggage)-->
<!--            {{$row->baggage}} {{__("Baggage")}}-->
<!--            @endif-->
            
         
             <!-- @if($row->door)
<!--             {{$row->door}} {{__("Door")}}-->
<!--             @endif-->
             
<!--             </div></div>-->
             
             
   
            
            
     
<!--    <div class="thumb-image ">-->
<!--        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">-->
<!--            @if($row->image_url)-->
<!--                @if(!empty($disable_lazyload))-->
<!--                    <img src="{{$row->image_url}}" class="img-responsive" alt="">-->
<!--                @else-->
<!--                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}-->
<!--                @endif-->
<!--            @endif-->
<!--        </a>-->
<!--        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">-->
<!--            <i class="fa fa-heart-o"></i>-->
            
<!--        </div>-->
<!--    </div>-->
    
    <!-- <div class="location">
<!--        @if(!empty($row->location->name))-->
<!--            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp-->
<!--            <i class="icofont-flag-alt-1">{{$location->name ?? ''}}</i>-->
<!--        @endif-->
        
<!--    </div> -->
   
    
    
<!--    <div class="item-title">-->
        
<!--         <div class="info">-->
<!--        <div class="g-price">-->
            
            <!-- <div class="prefix">
<!--                <span class="fr_text">{{__("from")}}</span>-->
<!--            </div>-->
            
<!--            <div class="price">-->
<!--                <span class="onsale">{{ $row->display_sale_price }}</span>-->
<!--                <span class="text-price">{{ $row->display_price }} <span class="unit">/ {{ $row->door }}</span></span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div> -->
<!--    <br>-->
<!--        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">-->
<!--            @if($row->is_instant)-->
<!--                <i class="fa fa-bolt d-none"></i>-->
<!--            @endif-->
            
<!--            {{$translation->title}}  </a>-->
        
     
<!--        <div class="qr-imp-infor" style="color:red;">-->
       
<!--         {{$row->gear}}-->
      
    
    
        
        <!--@if($row->discount_percent)
<!--            <div class="sale_info">{{$row->discount_percent}}</div>-->
<!--        @endif -->
<!--       </div> -->
       
<!--    </div>-->
    
    
    
    
        <!--  <div class="amenities">
        
<!--        @if($row->baggage)-->
<!--            <span class="amenity bath" data-toggle="tooltip" title="{{__("Baggage")}}" >-->
<!--                <i class="icofont-badge "></i>-->
<!--                <span class="text">-->
                     
<!--                    Apartment<br>-->
<!--                </span>-->
<!--            </span>-->
<!--        @endif  -->
       
        <!-- @if($row->passenger)
<!--            <span class="amenity total" data-toggle="tooltip"  title="{{ __("Passenger") }}">-->
<!--                <i class="icofont-bed  "></i>-->
<!--                <span class="text">-->
<!--                   Bedrooms<br> {{$row->passenger}}-->
<!--                </span>-->
<!--            </span>-->
<!--        @endif -->
       
        <!-- @if($row->gear)
<!--            <span class="amenity bed" data-toggle="tooltip" title="{{__("Gear Shift")}}">-->
<!--                <i class="input-icon field-icon icon-gear"></i>-->
<!--                <span class="text">-->
<!--                    {{$row->gear}}-->
<!--                </span>-->
<!--            </span>-->
<!--        @endif -->
       
       
       <!-- @if($row->baggage)
<!--            <span class="amenity bath" data-toggle="tooltip" title="{{__("Baggage")}}" >-->
<!--                 <i class="icofont-bathtub  "></i>-->
<!--                <span class="text">-->
<!--                    Bathrooms<br>{{$row->baggage}}-->
<!--                </span>-->
<!--            </span>-->
<!--        @endif-->
<!--        @if($row->door)-->
<!--            <span class="amenity size" data-toggle="tooltip" title="{{__("Door")}}" >-->
<!--                 <i class="icofont-ui-home  "></i>-->
<!--                <span class="text">-->
<!--                    Size in sqm<br>{{$row->door}}-->
<!--                </span>-->
<!--            </span>-->
<!--        @endif-->
<!--    </div> -->
       
    
    
    <!--  <div class="info">
<!--        <div class="g-price">-->
<!--            <div class="prefix">-->
<!--                <span class="fr_text">{{__("from")}}</span>-->
<!--            </div>-->
<!--            <div class="price">-->
<!--                <span class="onsale">{{ $row->display_sale_price }}</span>-->
<!--                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/ Month")}}</span></span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>  -->
   
   
<!--</div>-->
