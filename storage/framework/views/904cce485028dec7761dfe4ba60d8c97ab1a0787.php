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
                        <p class="color-highlight font-600 mb-n1">Experience Organizer</p>
                        <h1><?php echo e($vendor->getDisplayName()); ?></h1>
                    </div>
                    <div class="ml-auto">
                        <img src="<?php echo e($vendor->getAvatarUrl()); ?>" width="60" class="rounded-xl">
                    </div>
                </div>
                
                <div class="row mb-0 mt-4"> 
                
                
                
                 <h5 class="col-4 text-left font-15" >Service</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">Experience Reservation</h5>
                    
                    <?php if($booking->start_date): ?>
                    <h5 class="col-4 text-left font-15"><?php echo e(__('Start date')); ?></h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"><?php echo e(display_date($booking->start_date)); ?></h5>
                    
                    <h5 class="col-4 text-left font-15"><?php echo e(__('Duration')); ?></h5>
                    
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"> <?php echo e(human_time_diff($booking->end_date,$booking->start_date)); ?></h5>
                   
                    
                    <?php endif; ?>
                    
                    
                    
                    
                <!--      <?php $person_types = $booking->getJsonMeta('person_types')?>-->
                <!--<?php if(!empty($person_types)): ?>-->
                <!--    <?php $__currentLoopData = $person_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                        
                <!--           <h5 class="col-4 text-left font-15" > Package</h5>-->
                     
                <!--    <h5 class="col-8 text-right font-14 opacity-60 font-400"> <?php echo e($type['name_'.$lang_local] ?? $type['name']); ?> :    <?php echo e($type['number']); ?> </h5>-->
                    
                    
                   
                    
                        
                        
                        
                        
                <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--<?php else: ?>-->
                <!-- <h5 class="col-4 text-left font-15"><?php echo e(__("Guests")); ?></h5>-->
                <!--    <h5 class="col-8 text-right font-14 opacity-60 font-400">  <?php echo e($booking->total_guests); ?></h5>-->
                   
                <!--<?php endif; ?>-->
                    
                   
                    
                    
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
                        <div><h5 class="opacity-50 font-500">Total Price : <?php echo e(format_money($booking->total)); ?></h5></div>
                    </div>
                    
                </div>
                
                 <div class="divider mt-4"></div>
                 
                 
                 
                      <?php $person_types = $booking->getJsonMeta('person_types') ?>
                <?php if(!empty($person_types)): ?>
                    <?php $__currentLoopData = $person_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                     <div class="d-flex mb-3">
                    <div><h5 class="opacity-50 font-500">
                        
                        <?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>: <?php echo e($type['number']); ?> * <?php echo e(format_money($type['price'])); ?>

                        
                        </h5></div>
                    <div class="ml-auto"><h5> <?php echo e(format_money($type['price'] * $type['number'])); ?> </h5></div>
                </div>
                        
                           
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="">
                    <div><h5 class="opacity-50 font-500">
                        <?php echo e(__("Guests")); ?>: <?php echo e($booking->total_guests); ?> * <?php echo e(format_money($booking->getMeta('base_price'))); ?>

                        </h5>
                    </div>
                    
                <!--<div class="ml-auto">-->
                <!--    <h5><?php echo e(format_money($booking->getMeta('base_price') * $booking->total_guests)); ?> </h5>-->
                <!--</div>-->
                    
                
                    
                <?php endif; ?>
                
                 <div class="divider"></div>
                
                 <div class="d-flex mb-3">
                    <div><h3 class="font-700">Grand Total: </h3></div>
                    <div class="ml-auto"><h3> <?php echo e(format_money($booking->total)); ?></h3></div>
                </div>
                
                
                </div>
                 
                <div class="divider"></div>
                
                <a href="#" class="btn btn-full btn-l rounded-s font-600 gradient-highlight">Scroll down and complete the booking form to finalize your reservation</a>
                
            </div>
        </div>   
    </div>
                                    
                
                
                


<div class="booking-review">
    <h4 class="booking-review-title"><?php echo e(__("Your Booking")); ?></h4>
    <div class="booking-review-content">
        <div class="review-section">
            <div class="service-info">
                <div>
                    <?php
                        $service_translation = $service->translateOrOrigin($lang_local);
                    ?>
                    <h3 class="service-name"><a href="<?php echo e($service->getDetailUrl()); ?>"><?php echo e($service_translation->title); ?></a></h3>
                    <?php if($service_translation->address): ?>
                        <p class="address"><i class="fa fa-map-marker"></i>
                            <?php echo e($service_translation->address); ?>

                        </p>
                    <?php endif; ?>
                </div>
                
                <?php $vendor = $service->author; ?>
                <?php if($vendor->hasPermissionTo('dashboard_vendor_access') and !$vendor->hasPermissionTo('dashboard_access')): ?>
                    <div class="mt-1">
                        <i class="icofont-info-circle"></i>
                        <?php echo e(__("Vendor")); ?>: <a href="<?php echo e(route('user.profile',['id'=>$vendor->id])); ?>" target="_blank" ><?php echo e($vendor->getDisplayName()); ?></a>
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
                            <?php echo e(human_time_diff($booking->end_date,$booking->start_date)); ?>

                        </div>
                    </li>
                <?php endif; ?>
                <?php $person_types = $booking->getJsonMeta('person_types')?>
                <?php if(!empty($person_types)): ?>
                    <?php $__currentLoopData = $person_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="label"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>:</div>
                            <div class="val">
                                <?php echo e($type['number']); ?>

                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <li>
                        <div class="label"><?php echo e(__("Guests")); ?>:</div>
                        <div class="val">
                            <?php echo e($booking->total_guests); ?>

                        </div>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        
        <?php do_action('booking.checkout.before_total_review'); ?>
        <div class="review-section total-review">
            <ul class="review-list">
                <?php $person_types = $booking->getJsonMeta('person_types') ?>
                <?php if(!empty($person_types)): ?>
                    <?php $__currentLoopData = $person_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="label"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>: <?php echo e($type['number']); ?> * <?php echo e(format_money($type['price'])); ?></div>
                            <div class="val">
                                <?php echo e(format_money($type['price'] * $type['number'])); ?>

                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <li>
                        <div class="label"><?php echo e(__("Guests")); ?>: <?php echo e($booking->total_guests); ?> * <?php echo e(format_money($booking->getMeta('base_price'))); ?></div>
                        <div class="val">
                            <?php echo e(format_money($booking->getMeta('base_price') * $booking->total_guests)); ?>

                        </div>
                    </li>
                <?php endif; ?>
                <?php $extra_price = $booking->getJsonMeta('extra_price') ?>
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
                <?php $discount_by_people = $booking->getJsonMeta('discount_by_people')?>
                <?php if(!empty($discount_by_people)): ?>
                    <li>
                        <div class="label-title"><strong><?php echo e(__("Discounts:")); ?></strong></div>
                    </li>
                    <li class="no-flex">
                        <ul>
                            <?php $__currentLoopData = $discount_by_people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="label">
                                        <?php if(!$type['to']): ?>
                                            <?php echo e(__('from :from guests',['from'=>$type['from']])); ?>

                                        <?php else: ?>
                                            <?php echo e(__(':from - :to guests',['from'=>$type['from'],'to'=>$type['to']])); ?>

                                        <?php endif; ?>
                                        :
                                    </div>
                                    <div class="val">
                                        - <?php echo e(format_money($type['total'] ?? 0)); ?>

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
                    ?>
                    <li>
                        <div class="label">
                            <?php echo e($buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']); ?>

                            <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e($buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc']); ?>"></i>
                            <?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
                                : <?php echo e($booking->total_guests); ?> * <?php echo e(format_money( $fee_price )); ?>

                            <?php endif; ?>
                        </div>
                        <div class="val">
                            <?php if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on"): ?>
                                <?php echo e(format_money( $fee_price * $booking->total_guests )); ?>

                            <?php else: ?>
                                <?php echo e(format_money( $fee_price )); ?>

                            <?php endif; ?>
                        </div>
                    </li>
                     <?php } ?>
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
</div>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Tour/Views/frontend/booking/detail.blade.php ENDPATH**/ ?>