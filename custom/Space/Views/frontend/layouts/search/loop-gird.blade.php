@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="item-loop {{$wrap_class ?? ''}}">
    @if($row->is_featured == "1")
        <div class="featured">
            {{__("Featured")}}
        </div>
    @endif
    
    
           <div class="location">
                <div class="featured">
        @if(!empty($row->location->name))
            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            {{$location->name ?? ''}}  .
        @endif
        
        
        
        
        @if($row->max_guests)
            <span class="amenity total" data-toggle="tooltip"  title="{{ __("No. People") }}">
               {{__(':count Guest in maximum',['count'=>$row->max_guests])}} Capacity
            </span> 
            
        <!-- {{$row->bed}} {{__("No. Bed")}}-->
        
        @endif  
        
        
        
        
        <!--@if($row->square)-->

        <!--                {!! size_unit_format($row->square) !!}-->

        <!--                @endif-->
        
        </div>
    </div>
    
    
    
    <div class="thumb-image ">
        <a @if(!empty($blank))  @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                    <img src="{{$row->image_url}}" class="img-responsive" alt="">
                @else
                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}
                @endif
            @endif
        </a>
        <div class="price-wrapper">
            <div class="price">
                <!--<span class="onsale">{{ $row->display_sale_price }}</span>-->
                <span class="text-price">{{ $row->display_price }} <span class="unit">/ {{$row->bathroom}}</span></span>
            </div>
            <!-- --> 
            
            <!--   <div class="location">
                
        @if(!empty($row->location->name))
            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            {{$location->name ?? ''}}  .
        @endif
        
        
        
        
        @if($row->max_guests)
            <span class="amenity total" data-toggle="tooltip"  title="{{ __("No. People") }}">
               {{$row->max_guests}} People Max
            </span> 
        @endif
        
        
    </div> -->
    
    
     @if(setting_item('space_enable_review'))
    <?php
    $reviewData = $row->getScoreReview();
    $score_total = $reviewData['score_total'];
    ?>
    <div class="service-review" style="display:none;">
        <span class="rate">
            @if($reviewData['total_review'] > 0) {{$score_total}}/5 @endif <span class="rate-text">{{$reviewData['review_text']}}</span>
        </span>
        <span class="review">
             @if($reviewData['total_review'] > 1)
                {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
            @else
                {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
            @endif
        </span>
    </div>
    @endif
            
          
            
        </div>
        
        
        
        
        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
            <i class="fa fa-heart"></i>
        </div>
    </div>
    
    
    
    
    <div class="item-title">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->is_instant)
                <i class="fa fa-bolt d-none"></i>
            @endif
            {{$translation->title}}
        </a>
        @if($row->discount_percent)
            <div class="sale_info">{{$row->discount_percent}}</div>
        @endif
    </div>
    
    
      <!-- @if(setting_item('space_enable_review'))
    <?php
    $reviewData = $row->getScoreReview();
    $score_total = $reviewData['score_total'];
    ?>
    <div class="service-review">
        <span class="rate">
            @if($reviewData['total_review'] > 0) {{$score_total}}/5 @endif <span class="rate-text">{{$reviewData['review_text']}}</span>
        </span>
        <span class="review">
             @if($reviewData['total_review'] > 1)
                {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
            @else
                {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
            @endif
        </span>
    </div> --> 
   
   
    
    
    
    
    @endif
    <div class="amenities">
        @if($row->max_guests)
            <span class="amenity total" data-toggle="tooltip"  title="{{ __("No. People") }}">
                <i class="input-icon field-icon icofont-users-social  "></i> {{$row->max_guests}}
            </span>
        @endif
        @if($row->bed)
            <span class="amenity bed" data-toggle="tooltip" title="{{__("No. Bed")}}">
                <i class="input-icon field-icon icofont-dining-table"></i> {{$row->bed}}
            </span>
        @endif
        @if($row->bathroom)
            <span class="amenity bath" data-toggle="tooltip" title="{{__("No. Bathroom")}}" >
                <i class="input-icon field-icon icofont-bathtub"></i> {{$row->bathroom}}
            </span>
        @endif
        @if($row->square)
            <span class="amenity size" data-toggle="tooltip" title="{{__("Square")}}" >
                <i class="input-icon field-icon icofont-building-alt"></i> {!! size_unit_format($row->square) !!}
            </span>
        @endif
    </div>
</div>

