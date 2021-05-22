<div class="bravo-more-book-mobile">
    <div class="container">
          <div class="left" style="text-align: right; margin-left: 120px;">
            <div class="g-price">
                <div class="prefix">
                    <span class="fr_text"><?php echo e(__("Rental Price")); ?> </span>
                </div>
                <div class="price">
                    <span class="onsale"><?php echo e($row->display_sale_price); ?>  </span>
                    <span class="text-price"><?php echo e($row->display_price); ?> / <?php echo e($row->door); ?>  </span>
                </div>
            </div>

            <?php if(setting_item('car_enable_review')): ?>
            <?php
            $reviewData = $row->getScoreReview();
            $score_total = $reviewData['score_total'];
            ?>
            <div class="service-review tour-review-<?php echo e($score_total); ?>">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <div class="booking-item-rating-stars-active" style="width: <?php echo e($score_total * 2 * 10 ?? 0); ?>%">
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
                        <?php if($reviewData['total_review'] > 1): ?>
                        <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

                    <?php else: ?>
                        <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

                    <?php endif; ?>
                    </span>
            </div>
            <?php endif; ?>
        </div>
         <div class="right" style="text-align: left; margin-left: -303px;">
            <!--<?php if($row->getBookingEnquiryType() === "book"): ?>-->
                <!--<a class="btn btn-primary" href="https://tawk.to/chat/5f7289cb4704467e89f30e10/default"><?php echo e(__("Contact Now")); ?></a>-->
                 <a class="btn btn-primary" href="tel:15524059801"><?php echo e(__("Call Now")); ?></a>
                
                <!--<a class="btn btn-primary" href="<?php echo e(route('car.detail.mobile',$slug)); ?>"><?php echo e(__("Reserve Now")); ?></a>-->
                
            <!--<?php else: ?>-->
            <!--    <a class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal"><?php echo e(__("Contact Now")); ?></a>-->
            <!--<?php endif; ?>-->
        </div>
    </div>
</div><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Car/Views/frontend/layouts/details/form-book-mobile.blade.php ENDPATH**/ ?>