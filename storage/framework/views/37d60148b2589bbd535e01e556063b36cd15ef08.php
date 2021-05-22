<div class="modal fade" tabindex="-1" role="dialog" id="enquiry_form_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content enquiry_form_modal_form">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Submit Interest")); ?> 
                <br>
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button><br>
                <p>Kindly note that this service will be rendered on a first-come-first-serve basis.<br>
                Add wechat ID : crowdroom1</p>
            </div>
            <div class="modal-body">
                <input type="hidden" name="service_id" value="<?php echo e($row->id); ?>">
                <input type="hidden" name="service_type" value="<?php echo e($service_type ?? ''); ?>">
                <div class="form-group" >
                    <input type="text" class="form-control" name="enquiry_name" placeholder="<?php echo e(__("Your Name *")); ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="enquiry_email" placeholder="<?php echo e(__("Your Email *")); ?>">
                </div>
                <div class="form-group" v-if="!enquiry_is_submit">
                    <input type="text" class="form-control" name="enquiry_phone" placeholder="<?php echo e(__("Your Phone Number *")); ?>">
                </div>
                <div class="form-group" v-if="!enquiry_is_submit">
                    <textarea class="form-control" placeholder="<?php echo e(__("Write Your Wechat ID and Message Here...")); ?>" name="enquiry_note"></textarea>
                </div>
                <?php if(setting_item("booking_enquiry_enable_recaptcha")): ?>
                    <div class="form-group">
                        <?php echo e(recaptcha_field('enquiry_form')); ?>

                    </div>
                <?php endif; ?>
                <div class="message_box"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="button" class="btn btn-primary btn-submit-enquiry"><?php echo e(__("Send Mesage now")); ?>

                <i class="fa icon-loading fa-spinner fa-spin fa-fw" style="display: none"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Booking/Views/frontend/global/enquiry-form.blade.php ENDPATH**/ ?>