<div class="bravo-form-search-car" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('<?php echo e($bg_image_url); ?>') !important">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-heading text-center"><?php echo e($title); ?></h1>
                <div class="sub-heading text-center"><?php echo e($sub_title); ?></div>
                <div class="g-form-control">
                    <?php echo $__env->make('Car::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Car/Views/frontend/blocks/form-search-car/index.blade.php ENDPATH**/ ?>