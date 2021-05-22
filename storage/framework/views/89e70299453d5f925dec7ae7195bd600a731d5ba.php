
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/news/css/news.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/daterange/daterangepicker.css")); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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

<div class="single-slider owl-carousel owl-no-dots mb-0" style="margin-top:25px;">
            <a href="#" class="card card-style bg-6" data-card-height="300">
                <div class="card-bottom px-3">
                    <h1 class="color-white mb-n1">Creative Design.</h1>
                    <p class="color-white opacity-50 mb-3">
                        We created appkit to make your mobile website feel insane! With great attention to every detail.
                    </p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </a>
            <a href="#" class="card card-style bg-16" data-card-height="300">
                <div class="card-bottom px-3">
                    <h1 class="color-white mb-n1">Built by Enabled.</h1>
                    <p class="color-white opacity-50 mb-3">
                        We've been at the front of mobile development for over 10 years, delivering top quality items.
                    </p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </a>
            <a href="#" class="card card-style bg-13" data-card-height="300">
                <div class="card-bottom px-3">
                    <h1 class="color-white mb-n1">Bootstrap & PWA</h1>
                    <p class="color-white opacity-50 mb-3">
                        A language you know and love with familiar code made to be super easy to edit and customise.
                    </p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </a>
        </div> 
        
        </div></div>
        
        
        
         <div class="content mb-0" style="margin-top:-10px;">
            <p class="mb-n1 color-highlight font-600">Rewards & Offers</p>
            <h1>Top Categories</h1>
        </div>
        
        <!--<div class="double-slider owl-carousel owl-no-dots" style="margin-top:40px; overflow: hidden !important; max-height:120px;">-->
        <!--    <a href="https://crowdroom.y3579.com/news/category/places" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Places</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Sports</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Movies</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Tech</h4>-->
        <!--        <img src="images/homeMP.png" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Food</h4>-->
        <!--        <img src="images/pictures/16s.jpg" class="img-fluid"> -->
        <!--    </a>-->
        <!--    <a href="#" class="card card-style mx-0">-->
        <!--        <h4 class="card-bottom color-white pb-2 pt-4 mb-0 pl-3 bg-gradient">Web Design</h4>-->
        <!--        <img src="images/pictures/13s.jpg" class="img-fluid"> -->
        <!--    </a>-->
        <!--</div>-->
        
        
        
        <div class="topic-slider owl-carousel owl-no-dots mb-3" style="margin-top:25px;">
            <h1 style="margin-top:9px; font-size:28px;"><a href="https://crowdroom.y3579.com/news/category/places" class="px-3 color-theme">Places</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Sports</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Music</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Fashion</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Events</a></h1>
            <h1 style="margin-top:9px; font-size:28px;"><a href="#" class="px-3">Breaking</a></h1>
        </div>                

        





    <div class="bravo-news">
        <?php
            $title_page = setting_item_with_lang("news_page_list_title");
            if(!empty($custom_title_page)){
                $title_page = $custom_title_page;
            }
        ?>
        <!--<?php if(!empty($title_page)): ?>-->
        <!--    <div class="bravo_banner" <?php if($bg = setting_item("news_page_list_banner")): ?> style="background-image: url(<?php echo e(get_file_url($bg,'full')); ?>)" <?php endif; ?> >-->
        <!--        <div class="container">-->
        <!--            <h1>-->
        <!--                <?php echo e($title_page); ?>-->
        <!--            </h1>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--<?php endif; ?>-->
        <?php echo $__env->make('News::frontend.layouts.details.news-breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <?php if($rows->count() > 0): ?>
                            <div class="list-news">
                                <?php echo $__env->make('News::frontend.layouts.details.news-loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <hr>
                                <div class="bravo-pagination">
                                    <?php echo e($rows->appends(request()->query())->links()); ?>

                                    <span class="count-string"><?php echo e(__("Showing :from - :to of :total posts",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger">
                                <?php echo e(__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $__env->make('News::frontend.layouts.details.news-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

 
  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/News/Views/frontend/index.blade.php ENDPATH**/ ?>