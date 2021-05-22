<?php if($row->banner_image_id): ?>




    
    <div class="page-content-event">
        
        <div class="card notch-clear rounded-0 gradient-dark mb-n5">
            <div class="card-body">
                
                
               
                    
                       
            
             <?php if(!Auth::id()): ?>
   
                 <h5 class="color-white font-20 float-left"> Hello There ! </h5>
                <!--<a href="#" data-menu="menu-cards" style="margin-top:-10px"class="float-right color-white btn btn-xxs font-600 rounded-s border-white"><img src="/images/0t.jpg" class="rounded-xl"  width="32"></a>-->
                <!--<a href="#login" data-toggle="modal" data-target="#login"class="float-right color-white btn btn-xxs font-600 rounded-s border-white"><i class="fa fa-plus mr-2"></i><?php echo e(__('Login')); ?> / <?php echo e(__('Sign Up')); ?></a> -->
                
                <a href="tel:15524059801" data-menu="menu-call" class="float-right color-white btn btn-xs font-600 rounded-s border-white">
                         <i class="fa fa-phone mr-2">Call</i> </a> 
             
                
             <?php else: ?>    
                
                <?php if($avatar_url = Auth::user()->getAvatarUrl()): ?>
                
                <!--<a href="#" style="margin-top:-10px"class="float-right  rounded-xl"><img src="<?php echo e($avatar_url); ?>" alt="<?php echo e(Auth::user()->getDisplayName()); ?>" class="rounded-xl"  height="32" width="32"></a>-->
                  
                     
              
                         
                     
                 <?php else: ?>
             <span class="avatar-text"><?php echo e(ucfirst( Auth::user()->getDisplayName()[0])); ?></span>
                 <?php endif; ?>
                 
                 <h5 class="color-white font-17 float-left"><?php echo e(__("Hi! :Name",['name'=>Auth::user()->getDisplayName()])); ?> </h5>
                <a href="tel:15524059801" data-menu="menu-call" class="float-right color-white btn btn-xs font-600 rounded-s 
                   border-white"><i class="fa fa-phone mr-2">Call</i></a> 
            <?php endif; ?> 
            
             
               
            
                <div clas="clearfix"></div>
            </div>
            <div class="card-body mx-0 px-0 mt-n3 mb-2"> 
            
            
    
    
    
    <div class="card-slider owl-carousel owl-no-dots mb-0" style="margin-top:-35px;">
    
                    <div class="card card-style mx-0 mt-4 bg-20" style="background-image:url('<?php echo e($row->getBannerImageUrlAttribute('full')); ?>')" data-card-height="210">
                        <!--<div class="card-top pl-3 pt-3">-->
                        <!--    <h1 class="color-white font-19">MasterCard</h1>-->
                        <!--</div>-->
                        <div class="card-center pr-3">
                            <!--<h4 class="color-white text-right"> Rental Price : <?php echo e($row->display_price); ?></h4>-->
                        </div>
                        
                        <?php if(!empty($row->location->name)): ?>
                    <?php $location = $row->location->translateOrOrigin(app()->getLocale())
                    ?>
                        <div class="card-bottom pl-3 pb-2">
                        <h5 class="color-white"> In <?php echo e($location->name ?? ''); ?></h5>
                        </div>
                        
                        
                    <?php endif; ?> 
                        <!--<div class="card-bottom pr-3 pb-2">-->
                        <!--    <h5 class="color-white float-right">01/26</h5>-->
                        <!--</div>-->
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                    
                    
                     <div class="card card-style mx-0 mt-4 bg-20" style="background-image:url('<?php echo e($row->getImageUrlAttribute('full')); ?>')" data-card-height="210">
                        <!--<div class="card-top pl-3 pt-3">-->
                        <!--    <h1 class="color-white font-19">MasterCard</h1>-->
                        <!--</div>-->
                        <div class="card-center pr-3">
                            <!--<h4 class="color-white text-right"> Rental Price : <?php echo e($row->display_price); ?></h4>-->
                        </div>
                        
                            <?php if(!empty($row->location->name)): ?>
                    <?php $location = $row->location->translateOrOrigin(app()->getLocale())
                    ?>
                        <div class="card-bottom pl-3 pb-2">
                        <h5 class="color-white"> In <?php echo e($location->name ?? ''); ?></h5>
                        </div>
                        
                        
                    <?php endif; ?> 
                       
                    
                        <!--<div class="card-bottom pr-3 pb-2">-->
                        <!--    <h5 class="color-white float-right">01/26</h5>-->
                        <!--</div>-->
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                
                  
                </div>
    
    
    
    
    
    
    
     


        </div>
    </div>    
        
        






























    <!--<div class="bravo_banner" style="background-image: url('<?php echo e($row->getBannerImageUrlAttribute('full')); ?>')">-->
    <!--    <div class="container">-->
    <!--        <div class="bravo_gallery">-->
             <!--   <div class="qr-back-btn">-->
             <!--    <a href="javascript:javascript:history.go(-1)"> <div>-->
             <!--        <i class="fa fa-angle-double-left"></i>Back</div></a>-->
             <!--</div>-->
    <!--            <div class="btn-group">-->
    <!--                <?php if($row->video): ?>-->
    <!--                    <a href="#" class="btn btn-transparent has-icon bravo-video-popup" data-toggle="modal" data-src="<?php echo e(str_ireplace("watch?v=","embed/",$row->video)); ?>" data-target="#myModal">-->
    <!--                        <i class="input-icon field-icon fa">-->
    <!--                            <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">-->
    <!--                                <g fill="#FFFFFF">-->
    <!--                                    <path d="M2.25,24C1.009,24,0,22.991,0,21.75V2.25C0,1.009,1.009,0,2.25,0h19.5C22.991,0,24,1.009,24,2.25v19.5-->
    <!--                                        c0,1.241-1.009,2.25-2.25,2.25H2.25z M2.25,1.5C1.836,1.5,1.5,1.836,1.5,2.25v19.5c0,0.414,0.336,0.75,0.75,0.75h19.5-->
    <!--                                        c0.414,0,0.75-0.336,0.75-0.75V2.25c0-0.414-0.336-0.75-0.75-0.75H2.25z">-->
    <!--                                    </path>-->
    <!--                                    <path d="M9.857,16.5c-0.173,0-0.345-0.028-0.511-0.084C8.94,16.281,8.61,15.994,8.419,15.61c-0.11-0.221-0.169-0.469-0.169-0.716-->
    <!--                                        V9.106C8.25,8.22,8.97,7.5,9.856,7.5c0.247,0,0.495,0.058,0.716,0.169l5.79,2.896c0.792,0.395,1.114,1.361,0.719,2.153-->
    <!--                                        c-0.154,0.309-0.41,0.565-0.719,0.719l-5.788,2.895C10.348,16.443,10.107,16.5,9.857,16.5z M9.856,9C9.798,9,9.75,9.047,9.75,9.106-->
    <!--                                        v5.788c0,0.016,0.004,0.033,0.011,0.047c0.013,0.027,0.034,0.044,0.061,0.054C9.834,14.998,9.845,15,9.856,15-->
    <!--                                        c0.016,0,0.032-0.004,0.047-0.011l5.788-2.895c0.02-0.01,0.038-0.027,0.047-0.047c0.026-0.052,0.005-0.115-0.047-0.141l-5.79-2.895-->
    <!--                                        C9.889,9.004,9.872,9,9.856,9z">-->
    <!--                                    </path>-->
    <!--                                </g>-->
    <!--                            </svg>-->
    <!--                        </i><?php echo e(__("Car Video")); ?>-->
    <!--                    </a>-->
    <!--                <?php endif; ?>-->
    <!--            </div>-->
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




<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60388b311c1c2a130d629bd4/1evedvfe1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Car/Views/frontend/layouts/details/banner.blade.php ENDPATH**/ ?>