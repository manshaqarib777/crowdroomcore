
   


    <div class="card card-stylenews">
            <div class="content">
                 <?php $category = $row->getCategory; ?>
                <?php if(!empty($category)): ?>
                    <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>
                    
                 <a href="<?php echo e($category->getDetailUrl(app()->getLocale())); ?>">
                                <?php echo e($t->name ?? ''); ?>

                            </a>    
                <!--<p class="mb-n1 color-highlight font-600">Awesome Article</p>-->
                 <?php endif; ?>
                
                <h1>
                   <?php echo e($translation->title); ?>

                </h1>
                <p>
                    <?php echo $translation->content; ?>

                </p>
                
                <div class="divider"></div>
                
                <div class="d-flex">
                    <div class="mr-2">
                        <img src="/images/appsIcon.png" width="40" class="rounded-s">
                    </div>
                    <div>
                        <h5> <?php if(!empty($row->getAuthor)): ?></h5>
                        <p class="mb-0 mt-n2" style="margin-top:10px!important;"><?php echo e($row->getAuthor->getDisplayName() ?? ''); ?> | <?php echo e(display_date($row->updated_at)); ?> </p>
                     <?php endif; ?>
                     </div>
                   
                </div>

                
                <!--<h4>Offers From Local Partners</h4>-->
                
                
           
            
                <!--<p>-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--</p>-->
                
                
            </div>
        </div>
        
       
        
 

<div class="article">
    <!--<div class="header">-->
    <!--    <?php if($image_url = get_file_url($row->image_id, 'full')): ?>-->
    <!--        <header class="post-header">-->
    <!--            <img src="<?php echo e($image_url); ?>" alt="<?php echo e($translation->title); ?>">-->
    <!--        </header>-->
    <!--        <div class="cate">-->
    <!--            <?php $category = $row->getCategory; ?>-->
    <!--            <?php if(!empty($category)): ?>-->
    <!--                <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>-->
    <!--                <ul>-->
    <!--                    <li>-->
    <!--                        <a href="<?php echo e($category->getDetailUrl(app()->getLocale())); ?>">-->
    <!--                            <?php echo e($t->name ?? ''); ?>-->
    <!--                        </a>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!--            <?php endif; ?>-->
    <!--        </div>-->
    <!--    <?php endif; ?>-->
    <!--</div>-->
    <!--<h2 class="title"><?php echo e($translation->title); ?></h2>-->
    <!--<div class="post-info">-->
    <!--    <ul>-->
    <!--        <?php if(!empty($row->getAuthor)): ?>-->
    <!--            <li>-->
    <!--                <span> <?php echo e(__('BY ')); ?> </span>-->
    <!--                <?php echo e($row->getAuthor->getDisplayName() ?? ''); ?>-->
    <!--            </li>-->
    <!--        <?php endif; ?>-->
    <!--        <li> <?php echo e(__('DATE ')); ?>  <?php echo e(display_date($row->updated_at)); ?>  </li>-->
    <!--    </ul>-->
    <!--</div>-->
    <!--<div class="post-content"> <?php echo $translation->content; ?></div>-->
    <!--<div class="space-between">-->
    <!--    <?php if(!empty($tags = $row->getTags()) and count($tags) > 0): ?>-->
    <!--        <div class="tags">-->
    <!--            <?php echo e(__("Tags:")); ?>-->
    <!--            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
    <!--                <?php $t = $tag->translateOrOrigin(app()->getLocale()); ?>-->
    <!--                <a href="<?php echo e($tag->getDetailUrl(app()->getLocale())); ?>" class="tag-item"> <?php echo e($t->name ?? ''); ?> </a>-->
    <!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
    <!--        </div>-->
    <!--    <?php endif; ?>-->
        <!--<div class="share"> <?php echo e(__("Share")); ?>-->
        <!--    <a class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Facebook")); ?>"><i class="fa fa-facebook fa-lg"></i></a>-->
        <!--    <a class="twitter share-item" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Twitter")); ?>"><i class="fa fa-twitter fa-lg"></i></a>-->
        <!--</div>-->
       
</div>


                      <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m menu-active app"
        data-menu-height="400" style="max-height:150px" 
        data-menu-effect="menu-parallax">
                           <div>
                       <img src="/images/appsIcon.png" class="rounded-sm" width="100" style="margin-left: 9px;
    margin-top: 10px; border-radius:12px !important;">
    
                   
        <!--<img class="mx-auto mt-4 rounded-m" src="/images/appsIcon.png" alt="img" width="90">-->
        
        <!--<h5 class="text-center2 boxed-text-xl style= padding-bottom:10px">-->
        <!--    Install Places App for a Better Experience-->
        <!--</h5>-->
        <div class="boxed-text-l" style="text-align:right; margin-top:-75px;margin-left:52px;">
              <h6 class="font-500 font-14 pb-2">Install Places App for a Better Experience</h6>
            <a href="https://crowdroom.y3579.com/news/get-places-mobile-app" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">iOS App</a>
            <a href="https://crowdroom.y3579.com/news/get-places-mobile-app" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Android App</a>
            <!--<a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>-->
        </div> </div>
    </div> 
         
 
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/News/Views/frontend/layouts/details/news-detail.blade.php ENDPATH**/ ?>