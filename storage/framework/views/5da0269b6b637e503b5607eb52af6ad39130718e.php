<div class="card card-style-single-detail mb-2">
<div class="content">
<div class="d-flex">
<?php if($row->banner_image_id): ?>
<div>
<img src="<?php echo e($row->getBannerImageUrlAttribute('full')); ?>" class="rounded-sm" width="100">
</div>
<?php endif; ?>
 <?php if(!empty($row->location->name)): ?>
                            <?php $location = $row->location->translateOrOrigin(app()->getLocale())
                            ?>
                           
                                           
                                 
                          

<div class="pl-3 w-100">
<h5 class="font-501"><?php echo e($translation->title); ?></h5>
<p class="mb-0 mt-n2 font-10 opacity-50"><i class="fa fa-map-marker pr-1"></i> <?php echo e($location->name ?? ''); ?> </p>
<!--<h4 class="font-700" style="font-size:14px; color:#b12222;">-->
  <?php endif; ?>    
<!--            <i class="fa fa-credit-card"></i>-->
<!--                <?php echo e($row->display_price); ?> /Person-->
<!--            </p>-->
<!--         </h4>-->
   
</div>
<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>
</div>
</div>
</div> 











<div class="g-header">
    <div class="left">
        <!--<h2><?php echo e($translation->title); ?></h2>-->

        <!-- <?php if($translation->address): ?>-->
        <!--    <p class="address"><i class="fa fa-map-marker"></i>-->
        <!--        <?php echo e($translation->address); ?>-->
        <!--    </p>-->
        <!--<?php endif; ?> -->
           

    </div>
    
    
    
    
    
    <div class="right">
        <?php if(setting_item('tour_enable_review') and $review_score): ?>
        <div class="review-score">
            <div class="head">
                <div class="left">
                    <span class="head-rating"><?php echo e($review_score['score_text']); ?></span>
                    <span class="text-rating"><?php echo e(__("from :number reviews",['number'=>$review_score['total_review']])); ?></span>
                </div>
                <div class="score">
                    <?php echo e($review_score['score_total']); ?><span>/5</span>
                </div>
            </div>
            <div class="foot">
                <?php echo e(__(":number% of guests recommend",['number'=>$row->recommend_percent])); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
</div>


<br>
<br>
<br>




<!--<?php if(!empty($row->duration) or !empty($row->category_tour->name) or !empty($row->max_people) or !empty($row->location->name)): ?>-->
    <!--<div class="g-tour-feature">-->
    <!--    <div class="row">-->
    <!--        <?php if($row->duration): ?>-->
    <!--            <div class="col-xs-6 col-lg-3 col-md-6 col-6">-->
    <!--                <div class="item">-->
    <!--                    <div class="icon">-->
    <!--                        <i class="icofont-wall-clock"></i>-->
    <!--                    </div>-->
    <!--                    <div class="info">-->
    <!--                        <h4 class="name"><?php echo e(__("Duration")); ?></h4>-->
    <!--                        <p class="value">-->
    <!--                            <?php echo e(duration_format($row->duration,true)); ?>-->
    <!--                        </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
                <!-- <?php endif; ?>
                <?php if(!empty($row->category_tour->name)): ?>
                    <?php $cat = $row->category_tour->translateOrOrigin(app()->getLocale())
                    ?>
                    <div class="col-xs-6 col-lg-3 col-md-6 col-6">
                        <div class="item">
                            <div class="icon">
                                <i class="icofont-climbing"></i>
                            </div>
                            <div class="info">
                                <h4 class="name"><?php echo e(__("Tour Type")); ?></h4>
                                <p class="value">
                                    <?php echo e($cat->name ?? ''); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?> -->
               
                    <!--<?php if($row->max_people): ?>-->
                    <!--    <div class="col-xs-6 col-lg-3 col-md-6 col-6">-->
                    <!--        <div class="item">-->
                    <!--            <div class="icon">-->
                    <!--                <i class="icofont-users"></i>-->
                    <!--            </div>-->
                    <!--            <div class="info">-->
                    <!--                <h4 class="name"><?php echo e(__("Group Size")); ?></h4>-->
                    <!--                <p class="value">-->
                    <!--                    <?php if($row->max_people > 1): ?>-->
                    <!--                        <?php echo e(__(":number persons",array('number'=>$row->max_people))); ?>-->
                    <!--                        <?php else: ?>-->
                    <!--                        <?php echo e(__(":number person",array('number'=>$row->max_people))); ?>-->
                    <!--                        <?php endif; ?>-->
                    <!--                </p>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--     <?php endif; ?>-->
                         
                         
                        <!--<?php endif; ?>
                        <?php if(!empty($row->location->name)): ?>
                            <?php $location = $row->location->translateOrOrigin(app()->getLocale())
                            ?>
                            <div class="col-xs-6 col-lg-3 col-md-6 col-6">
                                <div class="item">
                                    <div class="icon">
                                        <i class="icofont-map"></i>
                                    </div>
                                    <div class="info">
                                        <h4 class="name"><?php echo e(__("Location")); ?></h4>
                                        <p class="value">
                                            <?php echo e($location->name ?? ''); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?> -->
                        
    <!--    </div>-->
    <!--</div>-->
   
    
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
    
    
    
<div class="card card-style2b">
            <div class="content">
                
                
                
                
                
                
                
                <div class="d-flex mb-3" style="margin-top:-22px">
                   
                   
            
                        
                        
                    <!--    <div> -->
                    <!--    <img src="/images/icon3.gif" width="40" class="">-->
                        
                        <!--<img src="<?php echo e($row->getBannerImageUrlAttribute('full')); ?>" width="110" class="rounded-s shadow-xl">-->
                        
                    <!--</div>-->
                    
                    
                    
                    <div class="pl-3 w-100">
              
                        
                        
                
                
                
        <!--        <?php if($translation->address): ?>  -->
                
        <!--    <h5 class="font-500">Taking Place @ <?php echo e($translation->address); ?>-->
        <!--    <?php if($translation->faqs): ?>-->
        <!--    <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
            <!--<br>-->
           
            <!--<br>-->
            <!--<?php echo $item['content']; ?>-->
            
        <!--    </h5>-->
        <!--     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
            
        <!-- <?php endif; ?>-->
        <!--<?php endif; ?>       -->
                     
                    </div>
                    
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                    
                 
                    
                <!--<div class="divider mt-4"></div>-->
                
                
                <div class="d-flex">
                    <div class="mt-1">
                        <p class="color-highlight font-600 mb-n1">Experience Host</p>
                        <h1><?php echo e(\App\User::findOrFail($row->create_user)->name); ?>

                                
                                </h1>
                    </div>
                    
                    <div class="ml-auto">
                        <img src="<?php echo e(\App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png')); ?>" width="60" class="rounded-xl">
                    </div>
                </div>
                
        <div class="row mb-0 mt-4"> 
                
            <div class="content" style="margin-top:-22px;">
                
                
                <img src="/images/fan.jpeg" class="rounded-xl"  width="30">
                <img src="/images/1small.png" class="rounded-xl"  width="30">
                <img src="/images/2s.png" class="rounded-xl"  width="30">
                <img src="/images/gam.jpeg" class="rounded-xl"  width="30">
                <img src="/images/dan.jpeg" class="rounded-xl"  width="30">
                <img src="/images/fin.jpeg" class="rounded-xl"  width="30">
                <img src="/images/ham.jpg" class="rounded-xl"  width="30">
                    
             <?php if(!Auth::id()): ?>
   
                <!--<h5 class="color-white font-20 float-left"> Hello There ! </h5>-->
               
               
               <?php else: ?>    
                
                  <?php if($avatar_url = Auth::user()->getAvatarUrl()): ?>
                
                <a href="#"><img src="<?php echo e($avatar_url); ?>"class="rounded-xl"width="30" alt="<?php echo e(Auth::user()->getDisplayName()); ?>"></a>
                
                  <?php endif; ?>
                 
               
             <?php endif; ?> 
                
                 <span class="pt-3 pl-2 font-700"><?php echo (rand(10, 500));?>+ <h11>viewed</h11></span>
                
                <!--<span class="pt-3 pl-2 font-700"><?php echo e(__(":number persons",array('number'=>$row->max_people))); ?></span>-->
            </div>
                
                
                 <!--<h5 class="col-4 text-left font-15" >Copyright</h5>-->
                     
                 <!--   <h5 class="col-8 text-right font-14 opacity-60 font-400">2020 CrowdRoom Inc</h5>-->
                    
                 <!--    <h5 class="col-4 text-left font-15" > Location</h5>-->
                     
                 <!--   <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;"><?php echo e($location->name ?? ''); ?> <?php echo e($translation->address); ?></h5>-->
                  
        </div>
                
                <!--<div class="divider"></div>-->
                
                <!--<div class="d-flex mb-3">-->
                <!--    <div>-->
                <!--        <img src="/images/iconbulb.gif" width="40" class="">-->
                        
                        <!--<img src="<?php echo e($row->getBannerImageUrlAttribute('full')); ?>" width="110" class="rounded-s shadow-xl">-->
                        
                <!--    </div>-->
                    
                <!--    <div class="pl-3 w-100">-->
                       
                <!--        <h5 class="font-500">About <?php echo e($translation->title); ?></h5>-->
                        
                <!--    </div>-->
                    
                <!--</div>-->
                    
                
                    
                <!--<div class="divider mt-4"></div>-->
               
                
                
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h5 class="opacity-50 font-500">Total Amount to Pay</h5></div>-->
                <!--    <div class="ml-auto"><h5></h5></div>-->
                <!--</div>-->
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h3 class="font-700">Grand Total</h3></div>-->
                <!--    <div class="ml-auto"><h3> </h3></div>-->
                <!--</div>-->
                
                
                <div class="divider mt-4" style="margin-top:-10px!important;"></div>
            <?php if($translation->itinerary): ?>
                <h6 class="font-15 font-600 mb-n1"><i class="fa fa-check-circle color-green-dark icon-30"></i> This Experience  includes The Following Items</h6>
                <div class="divider mt-4"></div>
                <?php $__currentLoopData = $translation->itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                 <a href="#" data-menu="order-2">
                
                         
                    <div class="d-flex mb-3">
                        <div class="todobox"style="background-image: url('<?php echo e(!empty($item['image_id']) ? get_file_url($item['image_id'],"full") : ""); ?>')" width="90"> 
                        </div>
                        <div class="align-self-center">
                            <h2 class="font-15 line-height-s mt-1 mb-n1"><?php echo e($item['title']); ?></h2>
                          
                          <p class="mb-0 mt-n2 font-11 opacity-70" style="line-height: 1.1;padding-top: 10px;">
                                <?php echo clean($item['content']); ?>

                             
                            </p>
                            <span class="d-block pt-1 font-11"><?php echo e($item['desc']); ?></span>
                        </div>
                    </div>
                    
                  </a>
                  <div class="divider mt-4"></div>
               
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            <?php endif; ?>    
            
            
                
               <?php echo $__env->make('Tour::frontend.layouts.details.tour-include-exclude', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($translation->content): ?>
                
            
                <div class="d-flex mb-3">
                    <div><h5 class="opacity-80 font-500"><?php echo $translation->content ?> </h5></div>
                    <div class="ml-auto"><h5> </h5></div>
                </div><?php endif; ?>
                
                
                <div class="divider"></div>
                
                 
        
        
        
        
        
                <a href="#qrCodePopUp" class="qr-code btn btn-full btn-l rounded-s font-600 gradient-highlight" target="" rel="modal:open">Click here to Generate QR Poster. Take Poster Screenshot and share on wechat</a>
                
                
                <!--<a class="qr-code" href="#qrCodePopUp" target="" rel="modal:open" original-title="<?php echo e(__("Wechat")); ?>">-->
                    <div class="divider mt-4"></div>
               
            
            <!--<div class="content mt-0">-->
            <!--    <p class="mb-n1 color-highlight font-600 mb-n1">Great choice to </p>-->
            <!--    <h2>Add to your Reservation</h2>-->
            <!-- <br>-->
            <!--</div>-->
            
            <!--<div class="double-slider owl-carousel owl-no-dots">-->
            <!--    <div class="item">-->
            <!--        <div data-card-height="200" class="card rounded-m shadow-l" style="background-image:url(images/food/small/2s.jpg)">-->
            <!--            <div class="card-bottom text-center">-->
            <!--                <h2 class="color-white font-700 font-20 mb-3">Sauces</h2>-->
            <!--                <a href="#" class="btn btn-xs btn-full font-13 font-600 gradient-highlight rounded-s mr-2 ml-2 mb-2">View</a>-->
            <!--            </div>-->
            <!--            <div class="card-overlay bg-gradient"></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        
                <?php echo $__env->make('Tour::frontend.layouts.details.tour-itinerary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
            </div>
            
        </div>  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<br>
<br>
<!--  <?php if($translation->faqs): ?>-->
<!--<div class="g-rules">-->
    
<!--    <div class="description">-->
          
<!--            <div class="imp-infor">-->
<!--                <div class="row">-->
<!--                <div class="col-lg-4">-->
<!--                    <div class="key"><?php echo e(__("Hotel Policy")); ?></div>-->
<!--                </div>-->
<!--                <div class="col-lg-8">-->
                    <!--<?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                    <!--<div class="item <?php if($key > 1): ?> d-none <?php endif; ?>">-->
                    <!--        <div class="strong" style="font-weight:800;"><?php echo e($item['title']); ?></div>-->
                    <!--        <div class="context" style="font-weight:500;"><?php echo $item['content']; ?></div>-->
                    <!--    </div>-->
                    <!--<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                    <?php if( count($translation->faqs) > 2): ?>-->
<!--                        <div class="btn-show-all">-->
<!--                            <span class="text"><?php echo e(__("Show All")); ?></span>-->
<!--                            <i class="fa fa-caret-down"></i>-->
<!--                        </div>-->
<!--                    <?php endif; ?>-->
<!--                </div>-->
<!--            </div>-->
        
                    
<!--        </div> </div> </div><?php endif; ?> -->


    
     <!--<?php echo $__env->make('Tour::frontend.layouts.details.tour-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
     
    <!--<?php echo $__env->make('Tour::frontend.layouts.details.tour-include-exclude', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->





    <!--<style>-->
    <!--    .social-icons {-->
    <!--        margin-bottom: 13px;-->
    <!--        padding: 4px 1px;-->
    <!--        box-shadow: 0.5px 0.4px 20px 8px #c3b1b518;-->
    <!--        border-radius: 1px;-->
    <!--        margin-left: -10px;-->
    <!--        margin-right: -10px;-->

    <!--        display: flex;-->
    <!--    }-->

    <!--    .share-icons {-->
    <!--        display: flex;-->
    <!--    }-->

    <!--    .facebook-icon,-->
    <!--    .twitter-icon,-->
    <!--    .qr-code,-->
    <!--    .service-wishlist {-->
    <!--        padding: 0px 10px;-->
    <!--    }-->

    <!--    #wishlist {-->
    <!--        padding-left: 13px;-->

    <!--        display: block;-->
    <!--    }-->

    <!--    @media(max-width: 576px) {-->
    <!--        .social-icons {-->
    <!--            display: flex;-->
    <!--            font-size: 28px;-->
    <!--        }-->
    <!--    }-->
    <!--</style>-->
    <!--<div calss="row" style="margin: 0px 10px; border-radius: 2px ; background#fff;">-->

    <!--    <div class="social-icons ">-->
    <!--        <div class="social-share">-->
    <!--            <div class="share-icons">-->
                    <!-- <a class="facebook-icon" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Facebook")); ?>">
    <!--                    <i class="icofont-facebook-messenger"></i>-->
    <!--                </a> -->
                   
                    <!--<a class="twitter-icon" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Twitter")); ?>">
    <!--                                <i class="icofont-twitter"></i>-->
    <!--                            </a> -->

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>




    <!--                   <h8 style="font-size:10px; margin-right: 16px;-->
    <!--margin-left: 10px;">Generate Sharable QR Poster to share with friends</h8>-->
    <!--            <a class="qr-code" href="#qrCodePopUp" target="" rel="modal:open" original-title="<?php echo e(__("Wechat")); ?>"> -->
    <!--                <i class="icofont-qr-code"></i>-->
    <!--            </a>-->

    <!--            </div>-->
    <!--        </div>-->
    <!--        <div>-->
                <!--<div class="service-wishlist <?php echo e($row->isWishList()); ?>" id="wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">-->
                <!--    <i class="icofont-archive"></i>-->
                <!--</div>-->
    <!--        </div>-->

    <!--        <div class="btn-group">-->
    <!--            <?php if($row->video): ?>-->
    <!--                <a href="#" class="btn btn-transparent has-icon bravo-video-popup" data-toggle="modal" data-src="<?php echo e(str_ireplace("watch?v=","embed/",$row->video)); ?>" data-target="#myModal">-->
    <!--                    <i class="input-icon field-icon fa">-->
    <!--                        <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;"-->
    <!--                            xml:space="preserve">-->
    <!--                            <g fill="#FFFFFF">-->
    <!--                                <path d="M2.25,24C1.009,24,0,22.991,0,21.75V2.25C0,1.009,1.009,0,2.25,0h19.5C22.991,0,24,1.009,24,2.25v19.5-->
    <!--                                    c0,1.241-1.009,2.25-2.25,2.25H2.25z M2.25,1.5C1.836,1.5,1.5,1.836,1.5,2.25v19.5c0,0.414,0.336,0.75,0.75,0.75h19.5-->
    <!--                                    c0.414,0,0.75-0.336,0.75-0.75V2.25c0-0.414-0.336-0.75-0.75-0.75H2.25z">-->
    <!--                                </path>-->
    <!--                                <path d="M9.857,16.5c-0.173,0-0.345-0.028-0.511-0.084C8.94,16.281,8.61,15.994,8.419,15.61c-0.11-0.221-0.169-0.469-0.169-0.716-->
    <!--                                    V9.106C8.25,8.22,8.97,7.5,9.856,7.5c0.247,0,0.495,0.058,0.716,0.169l5.79,2.896c0.792,0.395,1.114,1.361,0.719,2.153-->
    <!--                                    c-0.154,0.309-0.41,0.565-0.719,0.719l-5.788,2.895C10.348,16.443,10.107,16.5,9.857,16.5z M9.856,9C9.798,9,9.75,9.047,9.75,9.106-->
    <!--                                    v5.788c0,0.016,0.004,0.033,0.011,0.047c0.013,0.027,0.034,0.044,0.061,0.054C9.834,14.998,9.845,15,9.856,15-->
    <!--                                    c0.016,0,0.032-0.004,0.047-0.011l5.788-2.895c0.02-0.01,0.038-0.027,0.047-0.047c0.026-0.052,0.005-0.115-0.047-0.141l-5.79-2.895-->
    <!--                                    C9.889,9.004,9.872,9,9.856,9z">-->
    <!--                                </path>-->
    <!--                            </g>-->
    <!--                        </svg>-->
    <!--                    </i><?php echo e(__("Tour Video")); ?>-->
    <!--                </a>-->
    <!--                <?php endif; ?>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->


    


    <link rel="stylesheet" href="<?php echo asset('qrCode'); ?>/css/modal.css" />
    <link rel="stylesheet" href="<?php echo asset('qrCode'); ?>/css/style.css" />

    <div class="qr-modal" id="qrCodePopUp">
   
        <div class="qr-big-container">
            
          
            
            
            

            <div class="qr-pop-card" style="max-width: 370px !important; max-height: 500px !important;" id="qrImage">
                <div class="qr-header row">
                    <!--<div class="qr-logo col-5">
                        <img src="<?php echo asset('qrCode'); ?>/img/logo.png" alt="" />
                    </div> -->

                    <!--<div class="qr-header-text">-->
                    <!--    <?php echo e($translation->title); ?>-->
                    <!--</div>-->
                </div>

                
                
     <!--<div class="card-overlay bg-gradient opacity-40"></div>            -->
     
   <img class="qr-product-image" 
   style=" opacity: 1 !important;
    transition: all 300ms ease;
    pointer-events: all !important;
    max-height: 279px;
    background-color: #bbc5bd3b;
    background-image: linear-gradient(to bottom, #656D78, #434A54) !important;"  
    
   src=" <?php echo e($row->image_url); ?>"
   
  alt="" />
   
  
     <!--<img class="qr-product-image" style="background-color: #1a2b48;" -->
     <!--src="<?php echo e($row->getBannerImageUrlAttribute('full')); ?>" alt="" />           -->
                
                
                <div class="qr-product-details row" style="margin-top:36px;">
                    <div class="qr-details col-7">
                        
                        
          
                        

    
      
            
    
    
 <div class="card card-style-tourqr mb-2">   
<div class="content">
<div class="d-flex">
<?php if($row->banner_image_id): ?>
<div>
<img src="<?php echo e($row->getBannerImageUrlAttribute('full')); ?>" class="rounded-sm" width="100">
</div>
<?php endif; ?>


<div class="pl-3 w-100">
<h5 class="font-501"style="font-size:16px;"><?php echo e($translation->title); ?></h5>
<!--<h4 class="font-700" style="font-size:14px; color:#b12222;">-->
    
            <i class="fa fa-credit-card"></i>
            <?php echo e($row->display_price); ?> /Person
            
            <span class="qr-box" style="text-decoration: line-through;color: #c03!important;">¥<?php echo e(explode('.',$row->price)[0]); ?></span>
                
            </p>
</h4>

 <?php if(!empty($row->location->name)): ?>
                            <?php $location = $row->location->translateOrOrigin(app()->getLocale())
                            ?>
 
<p class="mb-0 mt-n2 font-10 opacity-50" style="line-height: 1.1;"><i class="fa fa-map-marker pr-1"></i> <?php echo e($location->name ?? ''); ?>, <?php echo e($translation->address); ?> </p>

  <?php endif; ?>  
   
</div>
<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>
</div>
</div>
</div> 
             
             
                 
  
    
    
           
                        
                        
                        
                        
                        
                        
         <div class="">
    <img class="qr-product-image2" src="/images/navi2.png" alt="" >
            <div class="" style="padding-top: 20px !important; font-weight;500">
                            <?php if($translation->itinerary): ?>
              
                <?php $__currentLoopData = $translation->itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                 <a href="#" data-menu="order-2">
                
                         
                    <div class="d-flex mb-3">
                        <!--<div class="todobox"style="background-image: url('<?php echo e(!empty($item['image_id']) ? get_file_url($item['image_id'],"full") : ""); ?>')" width="90"> -->
                        <!--</div>-->
                        <div class="align-self-center">
                            <!--<h2 class="font-15 line-height-s mt-1 mb-n1"><?php echo e($item['title']); ?></h2>-->
                          
                          <p class="mb-0 mt-n2 font-11 opacity-70" style="line-height: 0.9; margin-top:-230px!important; margin-bottom: -3px !important;">
                              <i class="fa fa-check-circle color-green-dark icon-30" style="margin-right: -13px;"></i> <?php echo e($item['title']); ?> <span style="font-size:7px;">(<?php echo e($item['desc']); ?>)</span>
                            </p>
                            
                            <!--<span class="d-block pt-1 font-11"><?php echo e($item['desc']); ?></span>-->
                        </div>
                    </div>
                    
                  </a>
                
               
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
              <?php endif; ?>    
                       
            </div> 
        </div> 

                        <!--  <div class="qr-small-dec" style="text-decoration: line-through;color: #c03!important;">
                            <span class="qr-yen-logo">¥</span><?php echo e(explode('.',$row->price)[0]); ?><span style="font-size:16px">.<?php echo e(explode('.',$row->price)[1]); ?></span>
                        </div>-->

                        <!--<div class="qr-price" style="color: #00001e !important; margin-top:0 !important;padding-top:0">-->
                        <!--    <span class="qr-yen-logo">¥</span><?php echo e(explode('.',$row->sale_price)[0]); ?><span class="qr-small-dec">/Person </span> </div>-->
                        
                 
                        
                        <div class="qr-seller">
                            <img src="<?php echo e(\App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png')); ?>" alt="" class="qr-avatar" style="margin-top:-420px;"/>
                            <br>
                            
                            <div class="content" style="margin-top:0px; margin-left: -3px;">
                
                
          
                
                
                <!--<span class="pt-3 pl-2 font-700"><h13><?php echo (rand(20, 300));?>+ views</h13></span>-->
            </div>

                       </div>
                        </div>
                    
                    
                    
                    <div class="qr-code-img text-center col-5" style="margin-top:6px;">
                        
                        <div class="">

                            <img src="data:image/<IMAGE_TYPE>;base64,<?php echo base64_encode(QrCode::format('png')->size(123)->generate(url()->current()));; ?>">
                        </div>

                        
                        <div class="qr-text" style="margin-top:-14px;">长按二维码 <br>
                        Long Press To See Agenda And Activity Details</div>
                        <br>
                    
                      <?php if($translation->content): ?> 
                     <div class="qr-text" style="color: #a90d0d !important; font-weight:400; font-size: 8px;">
                         <?php echo $translation->content ?>
                     </div>
                    <?php endif; ?>
                    
                        
                    </div>
                </div>
            </div>
            <!--<div class="button-div col-12 text-center">
                <a type="button" class="btn qr-btn-secondary" rel="modal:close" onclick="downloadQr(`<?php echo e($row->slug); ?>`);">
                    Save To Phone
                </a>
            </div> -->
            

        </div>
    </div>





    <form action="/download/qrCode" method="post" id="downloadQrForm">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="url" value="<?php echo e(url()->current()); ?>">
        <input type="hidden" name="slug" value="<?php echo e($row->slug); ?>">
    </form>

    <script type="text/javascript" src="<?php echo asset('qrCode/js'); ?>/html2canvas_withCustomScale.js"></script>
    


    <script type="text/javascript">
        function downloadQr(slug) {
            // $("#downloadQrForm").submit()

            // html2canvas(document.getElementById('qrCodePopUp'), {
            //     dpi: 2
            // }).then(function(canvas) {
            //     // to view the generated image on the same page
            //     document.body.appendChild(canvas);
            //
            //
            //     const a = document.createElement("a")
            //     document.body.appendChild(a)
            //
            //     a.href = canvas.toDataURL()
            //     a.download = slug + '.png'
            //     a.click()
            //     document.body.removeChild(a)
            //     // // to save the image as png file
            //     // Canvas2Image.saveAsPNG(canvas);
            //
            //     // Get base64URL
            //     // canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');
            // });

            html2canvas(document.getElementById('qrImage'), {
                dpi: 192,
                onrendered: function(canvas) {
                    document.body.appendChild(canvas);


                    const a = document.createElement("a")
                    document.body.appendChild(a)

                    a.href = canvas.toDataURL()
                    a.download = slug + '.png'
                    a.click()
                    document.body.removeChild(a)
                }
            });

        }
    </script>





       <!--<div class="infor-message">-->
       <!-- Need Help? Chat with Us - <a href="https://tawk.to/chat/5f7289cb4704467e89f30e10/default">Live Chat Here</a>-->
       <!-- </div>-->


   


      




        <link rel="stylesheet" href="<?php echo asset('vshowbox-master'); ?>/dist/vshowbox.css">

        <style media="screen">
            .gallery {
                display: none;
            }

            #vShowBox {
                display: none;
            }

            .image {
                padding: 10px 0;
            }

            .bravo-more-book-mobile {
                display: none;
            }

            @media(max-width: 576px) {
                #gallery-hide-when-mobo {
                    display: none !important;
                }

                .gallery {
                    display: block;
                }

                #vShowBox {
                    display: block;
                }

            }
        </style>

        <?php if($row->getGallery()): ?>
            <div class="g-gallery" id="gallery-hide-when-mobo">
                <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
                    <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item): ?>
                            <a href="<?php echo e($item['large']); ?>" data-thumb="<?php echo e($item['thumb']); ?>"></a>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="social">
                    <div class="social-share">
                        <span class="social-icon">
                            <i class="icofont-share"></i>
                        </span>
                        <ul class="share-wrapper">
                            <li>
                                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Facebook")); ?>">
                                    <i class="fa fa-facebook fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Twitter")); ?>">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                        <i class="fa fa-heart-o"></i>
                    </div>
                </div>
            </div>
            <?php endif; ?>









            <!--<?php if($row->getGallery()): ?>-->



            <!--    <div id="vShowBox"></div>-->



            <!--    <script src="<?php echo asset('vshowbox-master'); ?>/dist/vshowbox.js"></script>-->
            <!--    <script>-->
            <!--        const gallery = JSON.parse(`<?php echo json_encode($row->getGallery()); ?>`);-->
            <!--        var slide_images = [];-->
            <!--        for (const val of gallery) {-->
            <!--            if (val.large) {-->

            <!--                slide_images.push({-->
            <!--                    caption: '',-->
            <!--                    content: val.large-->
            <!--                })-->
            <!--            }-->
            <!--        }-->
            <!--        const vshowbox = vShowBox({-->

            <!--            container: document.querySelector('#vShowBox'),-->
            <!--            slides: slide_images-->

            <!--        });-->
            <!--    </script>-->



            <!--    <?php endif; ?>-->



    <!--            -->




               
                <?php echo $__env->make('Tour::frontend.layouts.details.tour-faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($row->map_lat && $row->map_lng): ?>
                    <div class="g-location">
                        <div class="location-title">
                            <h3><?php echo e(__("Tour Location")); ?></h3>
                            <?php if($translation->address): ?>
                                <div class="address">
                                    <i class="icofont-location-arrow"></i>
                                    <?php echo e($translation->address); ?>

                                </div>
                                <?php endif; ?>
                        </div>

                        <div class="location-map">
                            <div id="map_content"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    
                    
                    
    <!--                  <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m menu-active app"-->
    <!--    data-menu-height="400" style="max-height:190px" -->
    <!--    data-menu-effect="menu-parallax">-->
    <!--                       <div>-->
    <!--                    <img src="/images/appsIcon.png" class="rounded-sm" width="100" style="margin-left: 9px;-->
    <!--margin-top: 10px; border-radius:12px !important;">-->
                   
        <!--<img class="mx-auto mt-4 rounded-m" src="/images/appsIcon.png" alt="img" width="90">-->
        
        <!--<h5 class="text-center2 boxed-text-xl style= padding-bottom:10px">-->
        <!--    Install Places App for a Better Experience-->
        <!--</h5>-->
    <!--    <div class="boxed-text-l" style="text-align:right; margin-top:-75px;">-->
    <!--          <h6 class="font-500 font-14 pb-2">Install Places App for a Better Experience</h6>-->
    <!--        <a href="https://apps.apple.com/us/app/places-by-crowdroom/id1549861039" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">iOS AppStore</a>-->
    <!--        <a href="#" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Android App</a>-->
            <!--<a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>-->
    <!--    </div> -->
        
    <!--    </div>-->
    <!--</div> -->
    
    
    
    
  
    
    
    
    
    <?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Tour/Views/frontend/layouts/details/tour-detail.blade.php ENDPATH**/ ?>