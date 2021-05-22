<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>



 <!--<div class="page-content pb-3"> -->
 
 
        
        <!-- card in this page format must have the class card-full to avoid seeing behind it-->
 <!--       <div class="card card-full rounded-m pb-4">-->
 <!--           <div class="drag-line"></div>-->
            
 <!--           <div class="content">-->
                <!--<p class="font-600 mb-n1 color-highlight">Full Maps are Awesome</p>-->
                <!--<h1>Close to You</h1>-->
                <!--<p>-->
                <!--    By default the map you see here is an embeded Google Map. You can add your own API for maps and generate places.-->
                <!--</p>-->
                
                <div class="d-flex" style="background-color:#77777;">
                    
                    
                    <div class="mr-auto" style="margin-left:3px">
                        <img src="<?php echo e($row->image_url); ?>" width="140" class="rounded-sm" 
                        style="border-radius: 12px !important; height:107px;">
                    </div>
            <!--        <div class="mr-auto" >-->
            <!--         <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl($include_param ?? true)); ?>">-->
            <!--<?php if($row->image_url): ?>-->
            <!--    <?php if(!empty($disable_lazyload)): ?>-->
            <!--        <img src="<?php echo e($row->image_url); ?>"  class="rounded-sm" > -->
            <!--    <?php else: ?>-->
            <!--        <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]); ?>-->
            <!--    <?php endif; ?>-->
            <!--<?php endif; ?>-->
            <!--       </a>-->
                        
            <!--        </div>-->
             
                    
                    <div class="w-100 pl-3">
                        
                 <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl($include_param ?? true)); ?>">
                     
            <?php if($row->is_instant): ?>
                <i class="fa fa-bolt d-none"></i>
            <?php endif; ?>
            
            <h4 class="mb-0"><?php echo e($translation->title); ?> </h4>
                        </a>
                       
                        <!--<p class="mb-2"> <?php echo e($row->gear); ?></p>-->
                        
                       <p style="margin-top:-30px;">
                           
                            <!--<i class="fa fa-map-marker color-blue-dark icon-10 text-center ml-2 mr-2"></i>3.4 Miles Away-->
                            <br>
                            
                             <?php if($row->passenger): ?>
                           <span class="mt-3 badge border color-green-dark border-green-dark"> <?php echo e($row->passenger); ?> <?php echo e(__("Passenger")); ?></span>
                         <?php endif; ?> 
                         
                          <?php if($row->baggage): ?>
                        <span class="ml-2 badge border color-blue-dark border-blue-dark"> <?php echo e($row->baggage); ?> <?php echo e(__("Baggage")); ?></span>
                           <?php endif; ?>
                           
                           
                           
                            
                            <?php if(!empty($row->location->name)): ?>
                             <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
                             <span class="mt-2 badge border color-red-dark border-red-dark"> <?php echo e($location->name ?? ''); ?></span>
                             <?php endif; ?>
                          
                         </p> 
    <i class="fa fa-star color-yellow-dark icon-10 text-center mr-2"></i><?php echo e($row->display_price); ?> / <?php echo e($row->door); ?>

                    </div>
                </div>
                
                <div class="divider mt-3 mb-3"></div>
                
              
                
               
                
                <!--<a href="#" data-back-to-top class="btn gradient-blue btn-full btn-m font-700 font-12 mt-4 rounded-s">Back to Map</a>-->
                
    <!--        </div>-->
    <!--    </div>-->

    <!--</div>-->
    <!-- Page content ends here-->






















<!--<div class="item-loop <?php echo e($wrap_class ?? ''); ?>">-->
    <!--<?php if($row->is_featured == "1"): ?>
<!--    <?php echo e(__("Featured")); ?>-->
<!--    <?php endif; ?> -->
    
<!--        <div class="featured"> -->
         
         
         
<!--        </div> -->
        
<!--            <div class="location">-->
<!--                 <div class="featured"> -->
<!--        <?php if(!empty($row->location->name)): ?>-->
<!--            <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>-->
<!--            <?php echo e($location->name ?? ''); ?>-->
<!--        <?php endif; ?>-->
        
    
               <!-- <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
<!--                <span class="text-price"><?php echo e($row->display_price); ?> <span class="unit"><?php echo e(__("/ Month")); ?></span></span>-->
<!--               <?php if($row->passenger): ?>-->
<!--             <?php echo e($row->passenger); ?> <?php echo e(__("Passenger")); ?>-->
<!--             <?php endif; ?> -->
             
<!--        . -->
  
<!--            <?php if($row->baggage): ?>-->
<!--            <?php echo e($row->baggage); ?> <?php echo e(__("Baggage")); ?>-->
<!--            <?php endif; ?>-->
            
         
             <!-- <?php if($row->door): ?>
<!--             <?php echo e($row->door); ?> <?php echo e(__("Door")); ?>-->
<!--             <?php endif; ?>-->
             
<!--             </div></div>-->
             
             
   
            
            
     
<!--    <div class="thumb-image ">-->
<!--        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl($include_param ?? true)); ?>">-->
<!--            <?php if($row->image_url): ?>-->
<!--                <?php if(!empty($disable_lazyload)): ?>-->
<!--                    <img src="<?php echo e($row->image_url); ?>" class="img-responsive" alt="">-->
<!--                <?php else: ?>-->
<!--                    <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]); ?>-->
<!--                <?php endif; ?>-->
<!--            <?php endif; ?>-->
<!--        </a>-->
<!--        <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">-->
<!--            <i class="fa fa-heart-o"></i>-->
            
<!--        </div>-->
<!--    </div>-->
    
    <!-- <div class="location">
<!--        <?php if(!empty($row->location->name)): ?>-->
<!--            <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>-->
<!--            <i class="icofont-flag-alt-1"><?php echo e($location->name ?? ''); ?></i>-->
<!--        <?php endif; ?>-->
        
<!--    </div> -->
   
    
    
<!--    <div class="item-title">-->
        
<!--         <div class="info">-->
<!--        <div class="g-price">-->
            
            <!-- <div class="prefix">
<!--                <span class="fr_text"><?php echo e(__("from")); ?></span>-->
<!--            </div>-->
            
<!--            <div class="price">-->
<!--                <span class="onsale"><?php echo e($row->display_sale_price); ?></span>-->
<!--                <span class="text-price"><?php echo e($row->display_price); ?> <span class="unit">/ <?php echo e($row->door); ?></span></span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div> -->
<!--    <br>-->
<!--        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl($include_param ?? true)); ?>">-->
<!--            <?php if($row->is_instant): ?>-->
<!--                <i class="fa fa-bolt d-none"></i>-->
<!--            <?php endif; ?>-->
            
<!--            <?php echo e($translation->title); ?>  </a>-->
        
     
<!--        <div class="qr-imp-infor" style="color:red;">-->
       
<!--         <?php echo e($row->gear); ?>-->
      
    
    
        
        <!--<?php if($row->discount_percent): ?>
<!--            <div class="sale_info"><?php echo e($row->discount_percent); ?></div>-->
<!--        <?php endif; ?> -->
<!--       </div> -->
       
<!--    </div>-->
    
    
    
    
        <!--  <div class="amenities">
        
<!--        <?php if($row->baggage): ?>-->
<!--            <span class="amenity bath" data-toggle="tooltip" title="<?php echo e(__("Baggage")); ?>" >-->
<!--                <i class="icofont-badge "></i>-->
<!--                <span class="text">-->
                     
<!--                    Apartment<br>-->
<!--                </span>-->
<!--            </span>-->
<!--        <?php endif; ?>  -->
       
        <!-- <?php if($row->passenger): ?>
<!--            <span class="amenity total" data-toggle="tooltip"  title="<?php echo e(__("Passenger")); ?>">-->
<!--                <i class="icofont-bed  "></i>-->
<!--                <span class="text">-->
<!--                   Bedrooms<br> <?php echo e($row->passenger); ?>-->
<!--                </span>-->
<!--            </span>-->
<!--        <?php endif; ?> -->
       
        <!-- <?php if($row->gear): ?>
<!--            <span class="amenity bed" data-toggle="tooltip" title="<?php echo e(__("Gear Shift")); ?>">-->
<!--                <i class="input-icon field-icon icon-gear"></i>-->
<!--                <span class="text">-->
<!--                    <?php echo e($row->gear); ?>-->
<!--                </span>-->
<!--            </span>-->
<!--        <?php endif; ?> -->
       
       
       <!-- <?php if($row->baggage): ?>
<!--            <span class="amenity bath" data-toggle="tooltip" title="<?php echo e(__("Baggage")); ?>" >-->
<!--                 <i class="icofont-bathtub  "></i>-->
<!--                <span class="text">-->
<!--                    Bathrooms<br><?php echo e($row->baggage); ?>-->
<!--                </span>-->
<!--            </span>-->
<!--        <?php endif; ?>-->
<!--        <?php if($row->door): ?>-->
<!--            <span class="amenity size" data-toggle="tooltip" title="<?php echo e(__("Door")); ?>" >-->
<!--                 <i class="icofont-ui-home  "></i>-->
<!--                <span class="text">-->
<!--                    Size in sqm<br><?php echo e($row->door); ?>-->
<!--                </span>-->
<!--            </span>-->
<!--        <?php endif; ?>-->
<!--    </div> -->
       
    
    
    <!--  <div class="info">
<!--        <div class="g-price">-->
<!--            <div class="prefix">-->
<!--                <span class="fr_text"><?php echo e(__("from")); ?></span>-->
<!--            </div>-->
<!--            <div class="price">-->
<!--                <span class="onsale"><?php echo e($row->display_sale_price); ?></span>-->
<!--                <span class="text-price"><?php echo e($row->display_price); ?> <span class="unit"><?php echo e(__("/ Month")); ?></span></span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>  -->
   
   
<!--</div>-->
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Car/Views/frontend/layouts/search/loop-gird.blade.php ENDPATH**/ ?>