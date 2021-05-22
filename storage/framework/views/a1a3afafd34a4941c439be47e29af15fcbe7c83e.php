
<?php $__env->startSection('content'); ?>

    <div class="b-container">
        <div class="b-panel">
            <?php switch($to):
                case ('admin'): ?>
                <h3 class="email-headline"><strong><?php echo e(__('New Booking Update')); ?></strong></h3>
                <p><?php echo e(__('A booking status has been updated')); ?></p>
                <?php break; ?>

                <?php case ('vendor'): ?>
                <h3 class="email-headline"><strong><?php echo e(__('Hello :name',['name'=>$booking->vendor->nameOrEmail ?? ''])); ?></strong></h3>
                <p><?php echo e(__('A booking for your Service has been updated')); ?></p>
                <?php break; ?>


                <?php case ('customer'): ?>
                <h3 class="email-headline"><strong><?php echo e(__('Hello :name',['name'=>$booking->first_name ?? ''])); ?></strong></h3>
                <p><?php echo e(__('Thanks for booking with us. Your booking Status has been updated')); ?></p>
                <?php break; ?>

            <?php endswitch; ?>

            <?php echo $__env->make($service->email_new_booking_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Email::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Booking/Views/emails/status-updated-booking.blade.php ENDPATH**/ ?>