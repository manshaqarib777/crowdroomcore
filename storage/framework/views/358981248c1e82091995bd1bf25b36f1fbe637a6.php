<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $translation = $row->translateOrOrigin(app()->getLocale()); ?>
        
        
        
    <div class="page-content" style="margin-top:130px;">
        <?php if($image_tag = get_image_tag($row->image_id,'full')): ?>
        
        
          <a href="#" class="card card-style bg-1" data-card-height="150">
            <div class="card-center pl-3">
                <h1 class="color-white mb-n1 font-30">Sports</h1>
                <p class="color-white opacity-50 mb-0">Curated by Top Critics</p>
            </div>
            <div class="card-center">
                <span class="icon icon-s float-right bg-theme color-black mr-3 rounded-xl"><i class="fa fa-arrow-right"></i></span>
            </div>
            <div class="card-overlay bg-black opacity-60"></div>
        </a>
        
        
        

          <a href="<?php echo e($row->getDetailUrl()); ?>" class="card card-style" data-card-height="150"><?php echo $image_tag; ?>

          
            <div class="card-center pl-3">
                
                 <?php $category = $row->getCategory; ?>
                    <?php if(!empty($category)): ?>
                        <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>
                        
                         <a  href="<?php echo e($category->getDetailUrl(app()->getLocale())); ?>">
                                    <?php echo e($t->name ?? ''); ?>

                                </a>
                
                <h1 class="color-white mb-n1 font-30"><?php echo e($t->name ?? ''); ?></h1>
                
                     <?php endif; ?>
                     
                 <a class="color-white opacity-50 mb-0" href="<?php echo e($row->getDetailUrl()); ?>"> <?php echo e($translation->title); ?></a>
                <!--<p class="color-white opacity-50 mb-0"><?php echo e($translation->title); ?></p>-->
            </div>
            
            <div class="card-overlay bg-black opacity-60"></div>
          </a>
        
        <?php endif; ?>

    </div>
        
        
        
        
    <!--<div class="post_item ">-->
    <!--    <div class="header">-->
            <!--<?php if($image_tag = get_image_tag($row->image_id,'full')): ?>-->
            <!--    <header class="post-header">-->
            <!--        <a href="<?php echo e($row->getDetailUrl()); ?>">-->
            <!--            <?php echo $image_tag; ?>-->
            <!--        </a>-->
            <!--    </header>-->
            <!--    <div class="cate">-->
            <!--        <?php $category = $row->getCategory; ?>-->
            <!--        <?php if(!empty($category)): ?>-->
            <!--            <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>-->
            <!--            <ul>-->
            <!--                <li>-->
            <!--                    <a href="<?php echo e($category->getDetailUrl(app()->getLocale())); ?>">-->
            <!--                        <?php echo e($t->name ?? ''); ?>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--            </ul>-->
            <!--        <?php endif; ?>-->
            <!--    </div>-->
            <!--<?php endif; ?>-->
            <!--<div class="post-inner">-->
            <!--    <h4 class="post-title">-->
            <!--        <a class="text-darken" href="<?php echo e($row->getDetailUrl()); ?>"> <?php echo e($translation->title); ?></a>-->
            <!--    </h4>-->
                
                <!-- 
                <div class="post-info">
                    <ul>
                        <?php if(!empty($row->getAuthor)): ?>
                            <li>
                                <?php if($avatar_url = $row->getAuthor->getAvatarUrl()): ?>
                                    <img class="avatar" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($row->getAuthor->getDisplayName()); ?>">
                                <?php else: ?>
                                    <span class="avatar-text"><?php echo e(ucfirst($row->getAuthor->getDisplayName()[0])); ?></span>
                                <?php endif; ?>
                                <span> <?php echo e(__('BY ')); ?> </span>
                                <?php echo e($row->getAuthor->getDisplayName() ?? ''); ?>

                            </li>
                        <?php endif; ?>
                        <li> <?php echo e(__('DATE ')); ?>  <?php echo e(display_date($row->updated_at)); ?>  </li>
                    </ul>
                </div>-->
                
                <!-- <div class="post-desciption">
                    <?php echo get_exceprt($translation->content); ?>

                </div>
                
                
                
                <a class="btn-readmore" href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e(__('Read More')); ?></a>-->
            <!--</div>-->
    <!--    </div>-->
    <!--</div>-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/News/Views/frontend/layouts/details/news-loop.blade.php ENDPATH**/ ?>