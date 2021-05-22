<?php $__env->startSection('content'); ?>

    <div class="b-container">
        <div class="b-panel">
            <h3 class="email-headline"><strong><?php echo e(__('New House Request !')); ?></strong></h3>
            <p>New House Request</p>
            <br>
            <div class="b-panel">
                <div class="b-table-wrap">
                    <table class="b-table" cellspacing="0" cellpadding="0">
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Name')); ?></td>
                            <td class="val"><?php echo e($contact->user->name); ?></td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Email')); ?></td>
                            <td class="val"><?php echo e($contact->user->email); ?></td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Phone No')); ?></td>
                            <td class="val"><?php echo e($contact->user->phone); ?></td>
                        </tr>
                        <br>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Need Date')); ?></td>
                            <td class="val"><?php echo e($contact->event_date); ?></td>
                        </tr>
                        <!--<tr class="info-first-name">-->
                        <!--    <td class="label"><?php echo e(__('Event Type')); ?></td>-->
                        <!--    <td class="val"><?php echo e($contact->event_type); ?></td>-->
                        <!--</tr>-->
                       
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Rooms')); ?></td>
                            <td class="val"><?php echo e($contact->bedroom_id); ?></td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Pay Term')); ?></td>
                            <td class="val"><?php echo e($contact->rental_term_id); ?></td>
                        </tr>
                        
                         <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Area')); ?></td>
                            <td class="val"><?php echo e($contact->message); ?></td>
                        </tr>
                        
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('LandMark')); ?></td>
                            <td class="val"><?php echo e($contact->preferred_area_id); ?></td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Budget')); ?></td>
                            <td class="val"><?php echo e($contact->budget_id); ?></td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Amenities')); ?></td>
                            <td class="val"><?php echo e($contact->amenity_id); ?></td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Duration')); ?></td>
                            <td class="val"><?php echo e($contact->duration_id); ?></td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('Location')); ?></td>
                            <td class="val"><?php echo e($contact->location_id); ?></td>
                        </tr>
                        
                        
                        <tr class="info-first-name">
                            <td class="label"><?php echo e(__('More Info')); ?></td>
                            <td class="val"><?php echo e($contact->requirement_id); ?></td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Email::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/crowdroom.y3579.com/modules/Contact/Views/emails/home-notification.blade.php ENDPATH**/ ?>