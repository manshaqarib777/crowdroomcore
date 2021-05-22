<?php $lang_local = app()->getLocale()
?>

<?php
$service_translation = $service->translateOrOrigin($lang_local);
?>

 <?php $vendor = $service->author;
                ?>


<div class="page-content">
        
        <div class="card card-style2">
            <div class="content">
                
                <div class="d-flex">
                    <div class="mt-1">
                        <p class="color-highlight font-600 mb-n1">Event Organizer</p>
                        <h1><?php echo e($vendor->getDisplayName()); ?></h1>
                    </div>
                    <div class="ml-auto">
                        <img src="<?php echo e($vendor->getAvatarUrl()); ?>" width="60" class="rounded-xl">
                    </div>
                </div>
                
                <div class="row mb-0 mt-4"> 
                
                
                
                 <h5 class="col-4 text-left font-15" >Service</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">Event Ticket Reservation</h5>
                    
                    <?php if($booking->start_date): ?>
                    <h5 class="col-4 text-left font-15"><?php echo e(__('Event date')); ?></h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e(display_date($booking->start_date)); ?></h5>
                    
                    <?php endif; ?>
                    
                    
                   
                    
                    
                <!--      <h5 class="col-4 text-left font-15">Guest</h5>-->
                <!--<h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e($booking->first_name); ?> <?php echo e($booking->last_name); ?></h5>-->
                    
                    
                    
                    <h5 class="col-4 text-left font-15"><?php echo e(__('Duration')); ?></h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php $duration = $booking->getMeta("duration")
                            ?>
                            <?php echo e(duration_format($duration,true)); ?></h5>
                            
                            
                            
                    
                    
                    
                    
                     <?php $ticket_types = $booking->getJsonMeta('ticket_types')
                    ?>
                    <?php if(!empty($ticket_types)): ?>
                    <?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h5 class="col-4 text-left font-15">Ticket Type</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?></h5>
                    
                    <h5 class="col-4 text-left font-15">People</h5>
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e($type['number']); ?></h5>
                        
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    
                    
                    
                     <?php if($service_translation->address): ?>
                    <h5 class="col-4 text-left font-15" > Location</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;"><?php echo e($service_translation->address); ?></h5>
                     <?php endif; ?>
                 

                </div>
                
                <div class="divider"></div>
                
                <div class="d-flex mb-3">
                    <div>
                        <img src="<?php echo e($service->image_url); ?>" width="110" class="rounded-s shadow-xl">
                    </div>
                    
                    <div class="pl-3 w-100">
                       
                        <h5 class="font-500"><?php echo e($service_translation->title); ?></h5>
                        <div><h5 class="opacity-50 font-500">Ticket Price : <?php echo e(format_money($booking->total)); ?></h5></div>
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
                  <?php $ticket_types = $booking->getJsonMeta('ticket_types')
                    ?>
                    <?php if(!empty($ticket_types)): ?>
                    <?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="d-flex mb-3">
                    <div><h5 class="opacity-50 font-500">Ticket Type : <?php echo e($type['name_'.$lang_local] ?? $type['name']); ?></h5></div>
                    <div class="ml-auto"><h5><?php echo e($type['number']); ?> </h5></div>
                </div>
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h5 class="opacity-50 font-500">Total Amount to Pay</h5></div>-->
                <!--    <div class="ml-auto"><h5></h5></div>-->
                <!--</div>-->
                <div class="d-flex mb-3">
                    <div><h3 class="font-700">Grand Total</h3></div>
                    <div class="ml-auto"><h3> <?php echo e(format_money($booking->total)); ?></h3></div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <div class="divider"></div>
                
                <a href="#" class="btn btn-full btn-l rounded-s font-600 gradient-highlight">Scroll down and complete the booking form to finalize your reservation</a>
                
            </div>
        </div>   
    </div>




<!--New Invoice template design start here-->
<div class="booking-review">
<!--<h4 class="booking-review-title"><?php echo e(__("Your Booking")); ?></h4>-->













<!-- NEW CARD DESIGN START-->
<!--<div class="card card-style2 mb-2">-->
    
<!--<div class="content">-->
<!--<div class="d-flex">-->
<!--<?php if($image_url = $service->image_url): ?>-->
<!--<div>-->
<!--<img src="<?php echo e($service->image_url); ?>" class="rounded-sm" width="100">-->
<!--</div>-->
<!--<?php endif; ?>-->
<!--<div class="w-100 ml-3 pt-1">-->
<!--<h6 class="font-500 font-14 pb-2"><a href="<?php echo e($service->getDetailUrl()); ?>"><?php echo e($service_translation->title); ?></a></h6>-->
<!--<h5 class="font-700" style="font-size:14px;">Ticket Price : <?php echo e(format_money($booking->total)); ?></h5> -->

<!--</div>-->
<!--<div class="align-self-center mr-n2">-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
<!--</div>-->

<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--NEW DESIGN CARD ENDS HERE -->




    
<!-- NEW CARD DESIGN START-->
<!--<div class="card card-style3 mb-2">-->
<!--<div class="content">-->
<!--<div class="d-flex">-->
<!--<?php if($image_url = $service->image_url): ?>-->
<!--<div>-->
<!--<img src="<?php echo e($service->image_url); ?>" class="rounded-sm" width="100">-->
<!--</div>-->
<!--<?php endif; ?>-->
<!--<div class="w-100 ml-3 pt-1">-->
<!--<h6 class="font-500 font-14 pb-2" style="margin-bottom:-16px; margin-top:-13px; margin-left:-10px;"><a href="<?php echo e($service->getDetailUrl()); ?>"><?php echo e($service_translation->address); ?> </a></h6>-->
<!--</div>-->
<!--<div class="align-self-center mr-n2">-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-map-marker font-18 color-blue-dark opacity-20"></i></a>-->

<!--</div>-->

<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--NEW DESIGN CARD ENDS HERE --> 









<div class="booking-review">
    <!--<h4 class="booking-review-title"><?php echo e(__("Your Booking")); ?></h4>-->
    <div class="booking-review-content">
        <div class="review-section">
            <div class="service-info">
                <div>
                    <?php
                    $service_translation = $service->translateOrOrigin($lang_local);
                    ?>
                    <!--<h3 class="service-name"><a href="<?php echo e($service->getDetailUrl()); ?>"><?php echo e($service_translation->title); ?></a></h3>-->
                    <!--<?php if($service_translation->address): ?>-->
                    <!--    <p class="address"><i class="fa fa-map-marker"></i>-->
                    <!--        <?php echo e($service_translation->address); ?>-->
                    <!--    </p>-->
                    <!--    <?php endif; ?>-->
                </div>
                <!--<div>-->
                <!--    <?php if($image_url = $service->getImageUrl()): ?>-->
                <!--    <img src="<?php echo e($image_url); ?>" alt="<?php echo e($service->title); ?>">-->
                <!--    <?php endif; ?>-->
                <!--</div>-->
                <?php $vendor = $service->author;
                ?>
                <?php if($vendor->hasPermissionTo('dashboard_vendor_access') and !$vendor->hasPermissionTo('dashboard_access')): ?>
                    <div class="mt-1">
                        <i class="icofont-info-circle"></i>
                        <?php echo e(__("Vendor")); ?>: <a href="<?php echo e(route('user.profile',['id'=>$vendor->id])); ?>" target="_blank"><?php echo e($vendor->getDisplayName()); ?></a>
                    </div>
                    <?php endif; ?>
            </div>
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
                        <div class="label"><?php echo e(__('Duration:')); ?></div>
                        <div class="val">
                            <?php $duration = $booking->getMeta("duration")
                            ?>
                            <?php echo e(duration_format($duration,true)); ?>

                        </div>
                    </li>
                    <?php endif; ?>
                    <?php $ticket_types = $booking->getJsonMeta('ticket_types')
                    ?>
                    <!--<?php if(!empty($ticket_types)): ?>-->
                    <!--<?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                    <!--<li>-->
                    <!--    <div class="label"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>:</div>-->
                    <!--    <div class="val">-->
                    <!--        <?php echo e($type['number']); ?>-->
                    <!--    </div>-->
                    <!--</li>-->
                    <!--<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                    <!--<?php endif; ?>-->
            </ul>
        </div>
        
        <?php do_action('booking.checkout.before_total_review'); ?>
        <div class="review-section total-review">
            <ul class="review-list">
                <?php $ticket_types = $booking->getJsonMeta('ticket_types')
                ?>
                <?php if(!empty($ticket_types)): ?>
                <?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="label"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>: <?php echo e($type['number']); ?> * <?php echo e(format_money($type['price'])); ?></div>
                    <div class="val">
                        <?php echo e(format_money($type['price'] * $type['number'])); ?>

                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php $extra_price = $booking->getJsonMeta('extra_price')
                ?>
                <?php if(!empty($extra_price)): ?>
                <li>
                    <div class="label-title"><strong><?php echo e(__("Extra Prices:")); ?></strong></div>
                </li>
                <li class="no-flex">
                    <ul>
                        <?php $__currentLoopData = $extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="label"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>:</div>
                            <div class="val">
                                <?php echo e(format_money($type['total'] ?? 0)); ?>

                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(!empty($booking->buyer_fees)): ?>
                    <?php
                    $buyer_fees = json_decode($booking->buyer_fees , true);
                    foreach ($buyer_fees as $buyer_fee){
                    $fee_price = $buyer_fee['price'];
                    if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
                    $fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
                    }
                    }
                    ?>
                    <li>
                        <div class="label">
                            <?php echo e($buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']); ?>

                            <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e($buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc']); ?>"></i>
                            <?php if(!empty($buyer_fee['per_ticket']) and $buyer_fee['per_ticket'] == "on"): ?>
                            : <?php echo e($booking->total_guests); ?> * <?php echo e(format_money( $fee_price )); ?>

                            <?php endif; ?>
                        </div>
                        <div class="val">
                            <?php if(!empty($buyer_fee['per_ticket']) and $buyer_fee['per_ticket'] == "on"): ?>
                            <?php echo e(format_money( $fee_price * $booking->total_guests )); ?>

                            <?php else: ?>
                            <?php echo e(format_money( $fee_price )); ?>

                            <?php endif; ?>
                        </div>
                    </li>
                    
                    <?php endif; ?>
                    <li class="final-total d-block">
                        <div class="d-flex justify-content-between">
                            <div class="label"><?php echo e(__("Total:")); ?></div>
                            <div class="val"><?php echo e(format_money($booking->total)); ?></div>
                        </div>
                        <?php if($booking->status !='draft'): ?>
                            <div class="d-flex justify-content-between">
                                <div class="label"><?php echo e(__("Paid:")); ?></div>
                                <div class="val"><?php echo e(format_money($booking->paid)); ?></div>
                            </div>
                            <?php if($booking->paid < $booking->total ): ?>
                                    <div class="d-flex justify-content-between">
                                        <div class="label"><?php echo e(__("Remain:")); ?></div>
                                        <div class="val"><?php echo e(format_money($booking->total - $booking->paid)); ?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                    </li>
            </ul>
        </div>
    </div>
</div><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Event/Views/frontend/booking/detail.blade.php ENDPATH**/ ?>