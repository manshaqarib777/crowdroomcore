<?php if(!empty($list_term)): ?>
    <div class="bravo-car-term-featured-box">
        <div class="container">
            <div class="title">
                <?php echo e($title); ?>

            </div>
            <?php if($desc): ?>
                <div class="sub-title">
                    <?php echo e($desc); ?>

                </div>
            <?php endif; ?>
            <div class="row">
                <?php $__currentLoopData = $list_term; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $image_url = get_file_url($item->image_id, 'full');
                    $page_search = Modules\Space\Models\Space::getLinkForPageSearch(false , [ 'terms[]' =>  $item->id] );
                    $tran = $item->translateOrOrigin(app()->getLocale());
                    ?>
                    <div class="col-xs-4 col-sm-3 col-6">
                        <a href="<?php echo e($page_search); ?>">
                            <div class="featured-item">
                                <div class="image">
                                    <img src="<?php echo e($image_url); ?>" class="img-responsive">
                                </div>
                                <h4 class="text">
                                    <?php echo e($tran->name); ?>

                                </h4>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Space/Views/frontend/blocks/term-featured-box/index.blade.php ENDPATH**/ ?>