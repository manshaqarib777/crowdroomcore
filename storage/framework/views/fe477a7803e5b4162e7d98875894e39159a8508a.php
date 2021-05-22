<?php if($row->banner_image_id): ?>





 
        
        
        
        

 <div class="page-content-event">
        
        <div class="card notch-clear rounded-0 gradient-dark mb-n5">
            <div class="card-body">
                
                
                  <?php if(!Auth::id()): ?>
   
                 <h5 class="color-white font-20 float-left"> Hello There ! </h5>
                <!--<a href="#" data-menu="menu-cards" style="margin-top:-10px"class="float-right color-white btn btn-xxs font-600 rounded-s border-white"><img src="/images/0t.jpg" class="rounded-xl"  width="32"></a>-->
                <!--<a href="#login" data-toggle="modal" data-target="#login"class="float-right color-white btn btn-xxs font-600 rounded-s border-white"><i class="fa fa-plus mr-2"></i><?php echo e(__('Login')); ?> / <?php echo e(__('Sign Up')); ?></a> -->
                <?php else: ?>    
                
                <?php if($avatar_url = Auth::user()->getAvatarUrl()): ?>
                
                <a href="#" style="margin-top:-10px"class="float-right  rounded-xl"><img src="<?php echo e($avatar_url); ?>" alt="<?php echo e(Auth::user()->getDisplayName()); ?>" class="rounded-xl"  height="32" width="32"></a>
                 <?php else: ?>
               <span class="avatar-text"><?php echo e(ucfirst( Auth::user()->getDisplayName()[0])); ?></span>
                 <?php endif; ?>
                 <h5 class="color-white font-17 float-left"><?php echo e(__("Hi! :Name",['name'=>Auth::user()->getDisplayName()])); ?> </h5>
               
               <?php endif; ?> 
               
               
            
                <div clas="clearfix"></div>
            </div>
            
            
            <div class="card-body mx-0 px-0 mt-n4 mb-5"> 
            
               <?php if($translation->itinerary): ?>
            
            <div class="task-slider owl-carousel owl-no-dots" style="margin-top:18px; margin-bottom:-15px;">
                  <?php $__currentLoopData = $translation->itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <div class="item" style="margin-top:10px;">
                <div data-card-height="145" class="card rounded-m shadow-l" style="background-image: url('<?php echo e(!empty($item['image_id']) ? get_file_url($item['image_id'],"full") : ""); ?>')">
                    <!--<div class="card-top mt-2">-->
                    <!--    <p class="color-white"><i class="fa fa-star color-yellow-dark px-2"></i>4.9</p>-->
                    <!--</div>-->
                    <div class="card-bottom mb-2">
                        <h5 class="color-white font-15 px-2"><?php echo e($item['title']); ?></h5>
                        <p class="color-white mb-0 mt-n2 font-11 opacity-50 px-2">
                            <?php echo e($item['desc']); ?></p>
                    </div>
                    
                    
                   <div class="card-overlay bg-gradient opacity-30"></div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
              </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>
            <?php endif; ?>   
            
            
            
            
       
       

            </div>    
        </div>
    </div>    
        
        











    <!--<div class="bravo_banner" style="background-image: url('<?php echo e($row->getBannerImageUrlAttribute('full')); ?>')">-->
    <!--    <div class="container">-->
    <!--        <div class="bravo_gallery">-->
    <!--            <div class="qr-back-btn">-->
                 <!--<a href="javascript:javascript:history.go(-1)"> <div>-->
                 <!--    <i class="fa fa-angle-double-left"></i>Back</div></a>-->
    <!--         </div>-->
    <!--            -->
    <!--        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--            <div class="modal-dialog modal-lg" role="document">-->
    <!--                <div class="modal-content">-->
    <!--                    <div class="modal-body">-->
    <!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                            <span aria-hidden="true">&times;</span>-->
    <!--                        </button>-->
    <!--                        <div class="embed-responsive embed-responsive-16by9">-->
    <!--                            <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--</div>-->
    <?php endif; ?><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Tour/Views/frontend/layouts/details/tour-banner.blade.php ENDPATH**/ ?>