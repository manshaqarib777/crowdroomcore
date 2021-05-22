<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('Welcome Back !')); ?></h4>
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="<?php echo e(url('images/ico_close.svg')); ?>" alt="close">
                    </i>
                </span>
            </div>
            <div class="modal-body relative">
                 <p style="text-align:center;font-weight:500;">Please Login to Book Spaces and Activities</p>
                <?php echo $__env->make('Layout::auth/login-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('Register Here')); ?></h4>
                
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="<?php echo e(url('images/ico_close.svg')); ?>" alt="close">
                    </i>
                </span>
            </div>
            <div class="modal-body">
                <p style="text-align:center;font-weight:500;">You are almost done! just let us know who's asking</p>
                <?php echo $__env->make('Layout::auth/register-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Layout/parts/login-register-modal.blade.php ENDPATH**/ ?>