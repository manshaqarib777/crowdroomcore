<tr>
    <!-- <td class="booking-history-type">
        <?php if($service = $booking->service): ?>
            <i class="<?php echo e($service->getServiceIconFeatured()); ?>"></i>
        <?php endif; ?>
        <small><?php echo e($booking->object_model); ?></small>
    </td>-->
    <td>
        <?php if($service = $booking->service): ?>
            <?php
                $translation = $service->translateOrOrigin(app()->getLocale());
            ?>
            <a target="_blank" href="<?php echo e($service->getDetailUrl()); ?>">
                <?php echo e($translation->title); ?>

            </a>
        <?php else: ?>
            <?php echo e(__("[Deleted]")); ?>

        <?php endif; ?>
    </td>
    
    <td width="2%">
        <?php if($service = $booking->service): ?>
        <!-- <a class="btn btn-xs btn-primary btn-info-booking" data-toggle="modal" data-target="#modal-booking-<?php echo e($booking->id); ?>">
                <i class="fa fa-info-circle"></i><?php echo e(__("Details")); ?>

            </a>-->
            
            <?php echo $__env->make($service->checkout_booking_detail_modal_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <a href="<?php echo e(route('user.booking.invoice',['code'=>$booking->code])); ?>" class="btn btn-xs btn-primary btn-info-booking open-new-window mt-1" onclick="window.open(this.href); return false;">
            <i class="fa fa-print"></i><?php echo e(__("Invoice")); ?>

        </a>
    </td>
    
    <td class="a-hidden">
        
        <span><?php echo e($booking->first_name.' '.$booking->last_name); ?></span>
            <br>
            <span><?php echo e($booking->email); ?></span><br>
            <span><?php echo e($booking->phone); ?></span><br>
            <?php echo e(__('Booking ID: # :number',['number'=>$booking->id])); ?>

            <br>Status: <?php echo e($booking->statusName); ?>

            <br>
         <?php echo e(__("Check in")); ?> : <?php echo e(display_date($booking->start_date)); ?> 
        <?php echo e(__("Duration")); ?> : <?php echo e($booking->getMeta("duration") ?? "1"); ?> <?php echo e(__("hours")); ?>

        
    </td>
    
    <td class="a-hidden"><?php echo e(display_date($booking->created_at)); ?></td>
    <td><?php echo e(format_money($booking->total)); ?></td>
    <td><?php echo e(format_money($booking->paid)); ?></td>
    <td><?php echo e(format_money($booking->total - $booking->paid)); ?></td>
    <td class="<?php echo e($booking->status); ?> a-hidden"><?php echo e($booking->statusName); ?></td>
    <td width="2%">
        <?php if($service = $booking->service): ?>
            <a class="btn btn-xs btn-primary btn-info-booking" data-toggle="modal" data-target="#modal-booking-<?php echo e($booking->id); ?>">
                <i class="fa fa-info-circle"></i><?php echo e(__("Details")); ?>

            </a>
            <?php echo $__env->make($service->checkout_booking_detail_modal_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <a href="<?php echo e(route('user.booking.invoice',['code'=>$booking->code])); ?>" class="btn btn-xs btn-primary btn-info-booking open-new-window mt-1" onclick="window.open(this.href); return false;">
            <i class="fa fa-print"></i><?php echo e(__("Invoice")); ?>

        </a>
    </td>
</tr>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Tour/Views/frontend/bookingHistory/loop.blade.php ENDPATH**/ ?>