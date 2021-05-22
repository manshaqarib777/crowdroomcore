<div class="bravo-more-book-mobile">
    <div class="container">
          <div class="left" style="text-align: right; margin-left: 120px;">
            <div class="g-price">
                <div class="prefix">
                    <span class="fr_text">{{__("Rental Price")}} </span>
                </div>
                <div class="price">
                    <span class="onsale">{{ $row->display_sale_price }}  </span>
                    <span class="text-price">{{ $row->display_price }} / {{$row->door}}  </span>
                </div>
            </div>

            @if(setting_item('car_enable_review'))
            <?php
            $reviewData = $row->getScoreReview();
            $score_total = $reviewData['score_total'];
            ?>
            <div class="service-review tour-review-{{$score_total}}">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <div class="booking-item-rating-stars-active" style="width: {{  $score_total * 2 * 10 ?? 0  }}%">
                        <ul class="booking-item-rating-stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
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
         <div class="right" style="text-align: left; margin-left: -303px;">
            <!--@if($row->getBookingEnquiryType() === "book")-->
                <!--<a class="btn btn-primary" href="https://tawk.to/chat/5f7289cb4704467e89f30e10/default">{{__("Contact Now")}}</a>-->
                 <a class="btn btn-primary" href="tel:15524059801">{{__("Call Now")}}</a>
                
                <!--<a class="btn btn-primary" href="{{route('car.detail.mobile',$slug)}}">{{__("Reserve Now")}}</a>-->
                
            <!--@else-->
            <!--    <a class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">{{__("Contact Now")}}</a>-->
            <!--@endif-->
        </div>
    </div>
</div>