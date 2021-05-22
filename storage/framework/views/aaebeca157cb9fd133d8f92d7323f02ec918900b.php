<?php if(!empty($breadcrumbs)): ?>
<div class="breadcrumb-page-bar" aria-label="breadcrumb">
    <ul class="page-breadcrumb">
        <li class="">
            
            <!-- <a href="<?php echo e(url('/')); ?>"><i class='fa fa-home'></i> <?php echo e(__('Home')); ?></a> | --> 
            <!-- <i class="fa fa-angle-right"></i>--> 
        </li>
        <!-- <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class=" <?php echo e($breadcrumb['class'] ?? ''); ?>">
                
                <?php if(!empty($breadcrumb['url'])): ?>
                    <a href="<?php echo e($breadcrumb['url']); ?>"><?php echo e($breadcrumb['name']); ?></a>
                    <i class="fa fa-angle-right"></i>
                <?php else: ?>
                    <?php echo e($breadcrumb['name']); ?>

                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
        Language 语言翻译<i class="fa fa-angle-right"></i>
        <?php echo $__env->make('Language::frontend.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
    <div class="bravo-more-menu-user">
        
        Menu目录<i class="fa fa-angle-right"></i>
        <i class="icofont-settings"></i>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Layout/parts/user-bc.blade.php ENDPATH**/ ?>