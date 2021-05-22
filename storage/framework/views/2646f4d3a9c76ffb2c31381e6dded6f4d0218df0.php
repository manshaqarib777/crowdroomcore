
<?php $__env->startSection('head'); ?>


    <link href="<?php echo e(asset('dist/frontend/module/event/css/event.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="bravo_detail_event">

  
<div class="card card-style-event mb-2">
<div class="content">
<div class="d-flex">
<?php if($row->banner_image_id): ?>
<div>
<img src="<?php echo e($row->getBannerImageUrlAttribute('full')); ?>" class="rounded-sm" width="100">
</div>
<?php endif; ?>
<div class="w-100 ml-3 pt-1">
<h6 class="font-500 font-14 pb-2"><?php echo e($translation->title); ?></h6>
<h4 class="font-700" style="font-size:14px; color:#b12222;"> Ticket Price : <?php echo e($row->display_price); ?> </h4>
<!--     <?php if($row->max_guests): ?>-->

<!--            <p class="pipnum">-->
                <!--<i class="fa fa-group"></i>-->
                <!-- <?php echo e($translation->address); ?> -->

<!--                <?php echo e($row->max_guests); ?> People Max-->
                <!--  <?php echo e(__(':count Guest in maximum',['count'=>$row->max_guests])); ?> -->
               
<!--                 <?php endif; ?>-->
</div>
<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>
</div>
</div>
</div>
<?php echo $__env->make('Event::frontend.layouts.details.form-book', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>






<!--<?php $__env->startSection('content'); ?>-->
<!--    <div class="bravo_detail_event">-->
<!--        <?php echo $__env->make('Event::frontend.layouts.details.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
<!--        <?php echo $__env->make('Event::frontend.layouts.details.form-book', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
<!--    </div>-->
<!--<?php $__env->stopSection(); ?>-->

<?php $__env->startSection('footer'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            <?php if($row->map_lat && $row->map_lng): ?>
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>],
                zoom:<?php echo e($row->map_zoom ?? "8"); ?>,
                ready: function (engineMap) {
                    engineMap.addMarker([<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>], {
                        icon_options: {}
                    });
                }
            });
            <?php endif; ?>
        })
    </script>
    <script>
        var bravo_booking_data = <?php echo json_encode($booking_data); ?>

        var bravo_booking_i18n = {
			no_date_select:'<?php echo e(__('Please select Start and End date')); ?>',
            no_guest_select:'<?php echo e(__('Please select at least one number')); ?>',
            load_dates_url:'<?php echo e(route('event.vendor.availability.loadDates')); ?>'
        };
    </script>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("libs/fotorama/fotorama.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("libs/sticky/jquery.sticky.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/event/js/single-event.js?_ver='.config('app.version'))); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Event/Views/frontend/detail_show.blade.php ENDPATH**/ ?>