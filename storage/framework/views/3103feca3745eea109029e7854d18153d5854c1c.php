<?php if($translation->itinerary): ?>
    <!--<div class="g-itinerary">-->
        <!--<h3> <?php echo e(__("Itinerary")); ?> </h3>-->
        
        
        
       
              <div class="single-slider owl-carousel owl-no-dots" style="margin-top:58px; margin-bottom:-15px;">
                <?php $__currentLoopData = $translation->itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
            <div class="item" style="margin-top:10px;">
                <div data-card-height="185" class="card rounded-m shadow-l" style="background-image: url('<?php echo e(!empty($item['image_id']) ? get_file_url($item['image_id'],"full") : ""); ?>')">
                    <!--<div class="card-top mt-2">-->
                    <!--    <p class="color-white"><i class="fa fa-star color-yellow-dark px-2"></i>4.9</p>-->
                    <!--</div>-->
                    <div class="card-bottom mb-2">
                        <h5 class="color-white font-15 px-2" style="margin-top:-80px!important;"><?php echo e($item['title']); ?></h5>
                        <p class="color-white mb-0 mt-n2 font-11 opacity-70 px-2">
                            <?php echo e($item['desc']); ?>

                        </p>
                        <p class="color-white mb-0 mt-n2 font-11 opacity-70 px-2">
                            <?php echo clean($item['content']); ?>

                        </p>
                    </div>
                    <div class="card-overlay bg-gradient opacity-30"></div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>
        
        
        
        
        
        
        
        
        <!--<div class="list-item owl-carousel">-->
        <!--    <?php $__currentLoopData = $translation->itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--        <div class="item" style="background-image: url('<?php echo e(!empty($item['image_id']) ? get_file_url($item['image_id'],"full") : ""); ?>')">-->
        <!--            <div class="header">-->
        <!--                <div class="item-title"><?php echo e($item['title']); ?></div>-->
        <!--                <div class="item-desc"><?php echo e($item['desc']); ?></div>-->
        <!--            </div>-->
        <!--            <div class="body">-->
        <!--                <div class="item-title"><?php echo e($item['title']); ?></div>-->
        <!--                <div class="item-desc"><?php echo e($item['desc']); ?></div>-->
        <!--                <div class="item-context">-->
        <!--                    <?php echo clean($item['content']); ?>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
        <!--</div>-->
    <!--</div>-->
<?php endif; ?>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Tour/Views/frontend/layouts/details/tour-itinerary.blade.php ENDPATH**/ ?>