<?php $lang_local = app()->getLocale()
?>

<?php
$service_translation = $service->translateOrOrigin($lang_local);
?>

 <?php $vendor = $service->author;
                ?>
                
                
<!--<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>-->


<div class="page-content">
   
        
        <div class="card card-style2">
            <div class="content">
                
                <div class="d-flex">
                   <div class="mt-1">
                        <p class="color-highlight font-600 mb-n1">Operator</p>
                        <h1><?php echo e($vendor->getDisplayName()); ?></h1>
                    </div>
                    <div class="ml-auto">
                        <img src="<?php echo e($vendor->getAvatarUrl()); ?>" width="60" class="rounded-xl">
                    </div>
                </div>
                
                <div class="row mb-0 mt-4">    
                
                
                
                    <h5 class="col-4 text-left font-15">Service</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">Short-term Space Rental</h5>
                    
                    <?php if($booking->start_date): ?>
                    <h5 class="col-4 text-left font-15"><?php echo e(__('Start Date')); ?></h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e(display_date($booking->start_date)); ?></h5>
                    
                    
                    
                    <h5 class="col-4 text-left font-15"><?php echo e(__('End date')); ?></h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e(display_date($booking->end_date)); ?></h5>
                    
                    
                    <h5 class="col-4 text-left font-15">Duration</h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e(($booking->duration_days)); ?> <?php echo e(__('Days:')); ?> </h5>
                    
                    <?php endif; ?>
                    
                  
                    <!--<h5 class="col-4 text-left font-15">Bill To</h5>-->
                    <!--<h5 class="col-8 text-right font-14 opacity-60 font-400">John Doe</h5>-->
                    
                     <?php if($service_translation->address): ?>
                    <h5 class="col-4 text-left font-15" > Location</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;">detailed address and contact info will be revealed on your Voucher after your reservation</h5>
                     <?php endif; ?>
                    
                    
                    <!--<h5 class="col-4 text-left font-15">Date</h5>-->
                    <!--<h5 class="col-8 text-right font-14 opacity-60 font-400">15th June 2025</h5>-->
                    
                    

                </div>
                
                <div class="divider"></div>
                
                <div class="d-flex mb-3">
                    <div>
                        <img src="<?php echo e($service->image_url); ?>" width="110" class="rounded-s shadow-xl">
                    </div>
                    <div class="pl-3 w-100">
                        <h5 class="font-500"><?php echo e($service_translation->title); ?></h5>
                        
                        
                        <?php
            $price_item = $booking->total_before_extra_price;
             ?>
                           <?php if(!empty($price_item)): ?>
                        <div><h5 class="opacity-50 font-500"><?php echo e(($booking->duration_days)); ?> <?php echo e(__('Days:')); ?> Fee = <?php echo e(format_money( $price_item)); ?></h5></div>
                        
                        <?php endif; ?>
                        
                        
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
                

               
                <?php
$price_item = $booking->total_before_extra_price;
?>
<?php if(!empty($price_item)): ?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e(__('Rental price')); ?></h5></div>
<div class="ml-auto"><h5> <?php echo e(format_money( $price_item)); ?></h5></div>
</div>
<?php endif; ?>
<?php
$extra_price = $booking->getJsonMeta('extra_price')
?>
<?php if(!empty($extra_price)): ?>
<?php $__currentLoopData = $extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?></h5></div>
<div class="ml-auto"><h5><?php echo e(format_money($type['total'] ?? 0)); ?></h5></div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<!--service fee-->
<?php if(!empty($booking->buyer_fees)): ?>
<?php
$buyer_fees = json_decode($booking->buyer_fees , true);
foreach ($buyer_fees as $buyer_fee){
$fee_price = $buyer_fee['price'];
if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
$fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
}
?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e($buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']); ?>

<i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e($buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc']); ?>"></i> 
                
<?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
: <?php echo e($booking->total_guests); ?> * <?php echo e(format_money( $fee_price )); ?>

<?php endif; ?></h5></div>
<div class="ml-auto"><h5><?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
<?php echo e(format_money( $fee_price * $booking->total_guests )); ?>

<?php else: ?>
<?php echo e(format_money( $fee_price )); ?>

<?php endif; ?></h5></div>
</div>
<?php }
?>
<?php endif; ?>
<div class="d-flex mb-3">
                    <div><h3 class="font-700">Grand Total</h3></div>
                    <div class="ml-auto"><h3><?php echo e(format_money($booking->total)); ?> </h3></div>
                </div>





<!--</div> -->

                
                <div class="divider"></div>
                
                <a href="#" class="btn btn-full btn-l rounded-s font-600 gradient-highlight"> Scroll down to Reserve date without payment,Pay on wechat after reservation</a>
                
            </div>
        </div>   
    </div>
    
    
 
 
 
 
 
 
 
 
 
 
    

<div class="booking-review">
<!--<h4 class="booking-review-title"><?php echo e(__("Your Booking")); ?></h4>-->

<!-- NEW CARD DESIGN START-->
<div class="card card-style2 mb-2">
<div class="content">
<div class="d-flex">
<?php if($image_url = $service->image_url): ?>
<div>
<img src="<?php echo e($service->image_url); ?>" class="rounded-sm" width="100">
</div>
<?php endif; ?>
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2"><a href="<?php echo e($service->getDetailUrl()); ?>"><?php echo e($service_translation->title); ?></a></h6>
<h5 class="font-700">Total Rental Price: <?php echo e(format_money($booking->total)); ?></h5> 

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
<!--<?php if($image_url = $service->image_url): ?>-->
<!--<div>-->
<!--<img src="<?php echo e($service->image_url); ?>" class="rounded-sm" width="100">-->
<!--</div>-->
<!--<?php endif; ?>-->
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2" style="margin-bottom:-16px; margin-top:-13px; margin-left:-10px;"><a href="<?php echo e($service->getDetailUrl()); ?>"><?php echo e($service_translation->address); ?> </a></h6>
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
<!--<?php if($image_url = $service->image_url): ?>-->
<!--<div>-->
<!--<img src="<?php echo e($service->image_url); ?>" class="rounded-sm" width="100">-->
<!--</div>-->
<!--<?php endif; ?>-->
<div class="w-100 ml-3 pt-1" style="margin-bottom:-16px;">
<h6 class="font-500 font-14 pb-2"><a href="<?php echo e($service->getDetailUrl()); ?>">Fee Details</a></h6>
<!--<h4 class="font-700">Total Price: <?php echo e(format_money($booking->total)); ?></h4>-->

<?php
$price_item = $booking->total_before_extra_price;
?>
<?php if(!empty($price_item)): ?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e(__('Rental price')); ?></h5></div>
<div class="ml-auto"><h5> <?php echo e(format_money( $price_item)); ?></h5></div>
</div>
<?php endif; ?>
<?php
$extra_price = $booking->getJsonMeta('extra_price')
?>
<?php if(!empty($extra_price)): ?>
<?php $__currentLoopData = $extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?></h5></div>
<div class="ml-auto"><h5><?php echo e(format_money($type['total'] ?? 0)); ?></h5></div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



<?php if(!empty($booking->buyer_fees)): ?>
<?php
$buyer_fees = json_decode($booking->buyer_fees , true);
foreach ($buyer_fees as $buyer_fee){
$fee_price = $buyer_fee['price'];
if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
$fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
}
?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e($buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']); ?>

<i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e($buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc']); ?>"></i>

<br>
<h4 class="font-700">Total Price: <?php echo e(format_money($booking->total)); ?></h4>


<?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
: <?php echo e($booking->total_guests); ?> * <?php echo e(format_money( $fee_price )); ?>

<?php endif; ?></h5></div>
<div class="ml-auto"><h5><?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
<?php echo e(format_money( $fee_price * $booking->total_guests )); ?>

<?php else: ?>
<?php echo e(format_money( $fee_price )); ?>

<?php endif; ?></h5></div>
</div>
<?php }
?>
<?php endif; ?>
</div>
<div class="align-self-center mr-n2">
<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>

</div>

</div>
</div>
</div>

<!--NEW DESIGN CARD ENDS HERE -->

<div class="booking-review-content">


<div class="content">
<div class="divider mt-4"></div>
<?php
$price_item = $booking->total_before_extra_price;
?>
<?php if(!empty($price_item)): ?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e(__('Rental price')); ?></h5></div>
<div class="ml-auto"><h5> <?php echo e(format_money( $price_item)); ?></h5></div>
</div>
<?php endif; ?>
<?php
$extra_price = $booking->getJsonMeta('extra_price')
?>
<?php if(!empty($extra_price)): ?>
<?php $__currentLoopData = $extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?></h5></div>
<div class="ml-auto"><h5><?php echo e(format_money($type['total'] ?? 0)); ?></h5></div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(!empty($booking->buyer_fees)): ?>
<?php
$buyer_fees = json_decode($booking->buyer_fees , true);
foreach ($buyer_fees as $buyer_fee){
$fee_price = $buyer_fee['price'];
if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
$fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
}
?>
<div class="d-flex mb-3">
<div><h5 class="opacity-50 font-500"><?php echo e($buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']); ?>

<i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e($buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc']); ?>"></i>
<?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
: <?php echo e($booking->total_guests); ?> * <?php echo e(format_money( $fee_price )); ?>

<?php endif; ?></h5></div>
<div class="ml-auto"><h5><?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
<?php echo e(format_money( $fee_price * $booking->total_guests )); ?>

<?php else: ?>
<?php echo e(format_money( $fee_price )); ?>

<?php endif; ?></h5></div>
</div>
<?php }
?>
<?php endif; ?>
<div class="d-flex mb-3">
<div><h3 class="font-700"><?php echo e(__("Total:")); ?></h3></div>
<div class="ml-auto"><h3><?php echo e(format_money($booking->total)); ?></h3></div>
</div>
<?php if($booking->status !='draft'): ?>
<div class="d-flex mb-3">
<div><h3 class="font-700"><?php echo e(__("Paid:")); ?></h3></div>
<div class="ml-auto"><h3><?php echo e(format_money($booking->paid)); ?></h3></div>
</div>
<?php if($booking->paid < $booking->total ): ?>
<div class="d-flex mb-3">
<div><h3 class="font-700"><?php echo e(__("Remain:")); ?></h3></div>
<div class="ml-auto"><h3><?php echo e(format_money($booking->total - $booking->paid)); ?></h3></div>
</div>
<?php endif; ?>
<?php endif; ?>
</div>
<div class="review-section">
<ul class="review-list">
<?php if($booking->start_date): ?>
<li>
<div class="label"><?php echo e(__('Start date:')); ?></div>
<div class="val">
<?php echo e(display_date($booking->start_date)); ?>

</div>
</li>
<li>
<div class="label"><?php echo e(__('End date:')); ?></div>
<div class="val">
<?php echo e(display_date($booking->end_date)); ?>

</div>
</li>
<li>
<div class="label"><?php echo e(__('Days:')); ?></div>
<div class="val">
<?php echo e($booking->duration_days); ?>

</div>
</li>
<?php endif; ?>
<?php if($meta = $booking->getMeta('adults')): ?>
<li>
<div class="label"><?php echo e(__('Adults:')); ?></div>
<div class="val">
<?php echo e($meta); ?>

</div>
</li>
<?php endif; ?>
<?php if($meta = $booking->getMeta('children')): ?>
<li>
<div class="label"><?php echo e(__('Children:')); ?></div>
<div class="val">
<?php echo e($meta); ?>

</div>
</li>
<?php endif; ?>

<li class="flex-wrap">
<div class="flex-grow-0 flex-shrink-0 w-100">
<p class="text-center">
<a data-toggle="modal" data-target="#detailBookingDate<?php echo e($booking->code); ?>" aria-expanded="false" aria-controls="detailBookingDate<?php echo e($booking->code); ?>">
<?php echo e(__('Detail')); ?> <i class="icofont-list"></i>
</a>
</p>
</div>
</li>

</ul>
</div>

</div>
</div>

<?php
$dateDetail = $service->detailBookingEachDate($booking);
;?>
<div class="modal fade" id="detailBookingDate<?php echo e($booking->code); ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title text-center"><?php echo e(__('Detail')); ?></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<ul class="review-list list-unstyled">
<li class="mb-3 pb-1 border-bottom">
<h6 class="label text-center font-weight-bold mb-1"></h6>
<div>
<?php if ($__env->exists("Space::frontend.booking.detail-date",['rows'=>$dateDetail])) echo $__env->make("Space::frontend.booking.detail-date",['rows'=>$dateDetail], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="d-flex justify-content-between font-weight-bold px-2">
<span><?php echo e(__("Total:")); ?></span>
<span><?php echo e(format_money(array_sum(\Illuminate\Support\Arr::pluck($dateDetail,['price'])))); ?></span>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>







<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Space/Views/frontend/booking/detail.blade.php ENDPATH**/ ?>