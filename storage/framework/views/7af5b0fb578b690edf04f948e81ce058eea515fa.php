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
                <div class="card-slider owl-carousel owl-no-dots mb-0" style="max-height:242px;">
                    
             
    
                    <div class="card card-style mx-0 mt-4 bg-20 " 
                    style="background-image:url('<?php echo e($row->getBannerImageUrlAttribute('full')); ?>')"
                    data-nav="thumbs" data-allowfullscreen="true"data-card-height="210"> 
                    
                        <!--<div class="card-top pl-3 pt-3">-->
                        <!--    <h1 class="color-white font-19">MasterCard</h1>-->
                        <!--</div>-->
                        <div class="card-center pr-3">
                            <!--<h4 class="color-white text-right">Ticket Price : <?php echo e($row->display_price); ?> </h4>-->
                        </div>
                        <div class="card-bottom pl-3 pb-2">
                            <?php if($row->bathroom): ?>
                            <h5 class="color-white">Price : <?php echo e($row->display_price); ?> / <?php echo e($row->bathroom); ?>  </h5>
                            <?php endif; ?>
                        </div>
                        <!--<div class="card-bottom pr-3 pb-2">-->
                        <!--    <h5 class="color-white float-right">01/26</h5>-->
                        <!--</div>-->
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                    
                    <!--<?php echo e($row->getGallery()[0]['large']); ?>-->
                     <div class="card card-style mx-0 mt-4 bg-20" style="background-image:url('<?php echo e($row->getImageUrlAttribute('full')); ?>')" data-nav="thumbs" data-allowfullscreen="true" data-card-height="210">
                        <!--<div class="card-top pl-3 pt-3">-->
                        <!--    <h1 class="color-white font-19">MasterCard</h1>-->
                        <!--</div>-->
                        <div class="card-center pr-3">
                            <!--<h4 class="color-white text-right"> Ticket Price : <?php echo e($row->display_price); ?></h4>-->
                        </div>
                       <div class="card-bottom pl-3 pb-2">
                            <?php if($row->bathroom): ?>
                            <h5 class="color-white">Price : <?php echo e($row->display_price); ?> / <?php echo e($row->bathroom); ?>  </h5>
                            <?php endif; ?>
                        </div>
                        <!--<div class="card-bottom pr-3 pb-2">-->
                        <!--    <h5 class="color-white float-right">01/26</h5>-->
                        <!--</div>-->
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                
                  
                </div>
            </div>    
        </div>
    </div>    
        
        















    <!--<div class="bravo_banner" style="background-image: url('<?php echo e($row->getBannerImageUrlAttribute('full')); ?>')">-->
    <!--    <div class="container">-->
    <!--        <div class="bravo_gallery">-->
             <!--<div class="qr-back-btn">-->
                 <!--<a href="javascript:javascript:history.go(-1)"> <div>-->
                 <!--    <i class="fa fa-angle-double-left"></i>Back</div></a>-->
             <!--</div>-->
    <!--            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--                <div class="modal-dialog modal-lg" role="document">-->
    <!--                    <div class="modal-content">-->
    <!--                        <div class="modal-body">-->
    <!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                                <span aria-hidden="true">&times;</span>-->
    <!--                            </button>-->
    <!--                            <div class="embed-responsive embed-responsive-16by9">-->
    <!--                                <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
<?php endif; ?>

<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Space/Views/frontend/layouts/details/space-banner.blade.php ENDPATH**/ ?>