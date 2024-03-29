<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="<?php echo e($html_class ?? ''); ?>">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php event(new \Modules\Layout\Events\LayoutBeginHead()); ?>
    <?php
        $favicon = setting_item('site_favicon');
    ?>
    <?php if($favicon): ?>
        <?php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        ?>
        <?php if(!empty($file)): ?>
            <link rel="icon" type="<?php echo e($file['file_type']); ?>" href="<?php echo e(asset('uploads/' . $file['file_path'])); ?>" />
        <?php else: ?>:
            <link rel="icon" type="image/png" href="<?php echo e(url('images/favicon.png')); ?>" />
        <?php endif; ?>
    <?php endif; ?>

    <?php if(!empty($seo_meta)): ?>
        <?php if(isset($seo_meta['seo_index']) and $seo_meta['seo_index'] == 0): ?>
            <meta name="robots" content="noindex">
        <?php endif; ?>
        <?php
            $page_title = $seo_meta['seo_title'] ?? ($seo_meta['service_title'] ?? ($page_title ?? ''));
            if (!empty($page_title) and empty($seo_meta['is_homepage'])) {
                $page_title .= ' - ' . setting_item_with_lang('site_title', false, 'Booking Core');
            }
            if (empty($page_title)) {
                $page_title = setting_item_with_lang('site_title', false, 'Booking Core');
            }
        ?>
        <title><?php echo e($page_title); ?></title>
        <meta name="description"
            content="<?php echo e($seo_meta['seo_desc'] ?? ($seo_meta['service_desc'] ?? setting_item_with_lang('site_desc'))); ?>" />
        
        <meta property="og:url" content="<?php echo e($seo_meta['full_url'] ?? ''); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="<?php echo e($seo_meta['seo_share']['facebook']['title'] ?? ($seo_meta['seo_title'] ?? ($seo_meta['service_title'] ?? ($page_title ?? '')))); ?>" />
        <meta property="og:description"
            content="<?php echo e($seo_meta['seo_share']['facebook']['desc'] ?? ($seo_meta['seo_desc'] ?? ($seo_meta['service_desc'] ?? ''))); ?>" />
        <meta property="og:image"
            content="<?php echo e(get_file_url($seo_meta['seo_share']['facebook']['image'] ?? ($seo_meta['seo_image'] ?? ($seo_meta['service_image'] ?? '')), 'full')); ?>" />
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title"
            content="<?php echo e($seo_meta['seo_share']['twitter']['title'] ?? ($seo_meta['seo_title'] ?? ($seo_meta['service_title'] ?? ($page_title ?? '')))); ?>">
        <meta name="twitter:description"
            content="<?php echo e($seo_meta['seo_share']['twitter']['desc'] ?? ($seo_meta['seo_desc'] ?? ($seo_meta['service_desc'] ?? ''))); ?>">
        <meta name="twitter:image"
            content="<?php echo e(get_file_url($seo_meta['seo_share']['twitter']['image'] ?? ($seo_meta['seo_image'] ?? ($seo_meta['service_image'] ?? '')), 'full')); ?>">
        <link rel="canonical" href="<?php echo e($seo_meta['full_url'] ?? ''); ?>" />
    <?php else: ?>
        <?php
            if (!empty($page_title)) {
                $page_title .= ' - ' . setting_item_with_lang('site_title', false, 'Booking Core');
            } else {
                $page_title = setting_item_with_lang('site_title', false, 'Booking Core');
            }
        ?>
        <title><?php echo e($page_title); ?></title>
        <meta name="description" content="<?php echo e(setting_item_with_lang('site_desc')); ?>" />
    <?php endif; ?>

    <link href="<?php echo e(asset('libs/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/icofont/icofont.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/notification.css')); ?>" rel="newest stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css?_ver=' . config('app.version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('libs/daterange/daterangepicker.css')); ?>">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'
        href='https://fonts.googleapis.com/css?family=Poppins%3A300%2C400%2C500%2C600' type='text/css' media='all' />
    <?php echo \App\Helpers\Assets::css(); ?>

    <?php echo \App\Helpers\Assets::js(); ?>

    <script>
        var bookingCore = {
            url: '<?php echo e(url(app_get_locale())); ?>',
            url_root: '<?php echo e(url('')); ?>',
            booking_decimals: <?php echo e((int) get_current_currency('currency_no_decimal', 2)); ?>,
            thousand_separator: '<?php echo e(get_current_currency('currency_thousand')); ?>',
            decimal_separator: '<?php echo e(get_current_currency('currency_decimal')); ?>',
            currency_position: '<?php echo e(get_current_currency('currency_format')); ?>',
            currency_symbol: '<?php echo e(currency_symbol()); ?>',
            currency_rate: '<?php echo e(get_current_currency('rate', 1)); ?>',
            date_format: '<?php echo e(get_moment_date_format()); ?>',
            map_provider: '<?php echo e(setting_item('map_provider')); ?>',
            map_gmap_key: '<?php echo e(setting_item('map_gmap_key')); ?>',
            routes: {
                login: '<?php echo e(route('auth.login')); ?>',
                register: '<?php echo e(route('auth.register')); ?>',
                checkout: '<?php echo e(is_api() ? route('api.booking.doCheckout') : route('booking.doCheckout')); ?>'
            },
            module: {
                hotel: '<?php echo e(route('hotel.search')); ?>',
                car: '<?php echo e(route('car.search')); ?>',
                tour: '<?php echo e(route('tour.search')); ?>',
                space: '<?php echo e(route('space.search')); ?>',
            },
            currentUser: <?php echo e((int) Auth::id()); ?>,
            isAdmin: <?php echo e(is_admin() ? 1 : 0); ?>,
            rtl: <?php echo e(setting_item_with_lang('enable_rtl') ? '1' : '0'); ?>,
            markAsRead: '<?php echo e(route('core.notification.markAsRead')); ?>',
            markAllAsRead: '<?php echo e(route('core.notification.markAllAsRead')); ?>',
            loadNotify: '<?php echo e(route('core.notification.loadNotify')); ?>',
            pusher_api_key: '<?php echo e(setting_item('pusher_api_key')); ?>',
            pusher_cluster: '<?php echo e(setting_item('pusher_cluster')); ?>',
        };
        var i18n = {
            warning: "<?php echo e(__('Warning')); ?>",
            success: "<?php echo e(__('Success')); ?>",
        };
        var daterangepickerLocale = {
            "applyLabel": "<?php echo e(__('Apply')); ?>",
            "cancelLabel": "<?php echo e(__('Cancel')); ?>",
            "fromLabel": "<?php echo e(__('From')); ?>",
            "toLabel": "<?php echo e(__('To')); ?>",
            "customRangeLabel": "<?php echo e(__('Custom')); ?>",
            "weekLabel": "<?php echo e(__('W')); ?>",
            "first_day_of_week": <?php echo e(setting_item('site_first_day_of_the_weekin_calendar', '1')); ?>,
            "daysOfWeek": [
                "<?php echo e(__('Su')); ?>",
                "<?php echo e(__('Mo')); ?>",
                "<?php echo e(__('Tu')); ?>",
                "<?php echo e(__('We')); ?>",
                "<?php echo e(__('Th')); ?>",
                "<?php echo e(__('Fr')); ?>",
                "<?php echo e(__('Sa')); ?>"
            ],
            "monthNames": [
                "<?php echo e(__('January')); ?>",
                "<?php echo e(__('February')); ?>",
                "<?php echo e(__('March')); ?>",
                "<?php echo e(__('April')); ?>",
                "<?php echo e(__('May')); ?>",
                "<?php echo e(__('June')); ?>",
                "<?php echo e(__('July')); ?>",
                "<?php echo e(__('August')); ?>",
                "<?php echo e(__('September')); ?>",
                "<?php echo e(__('October')); ?>",
                "<?php echo e(__('November')); ?>",
                "<?php echo e(__('December')); ?>"
            ],
        };

    </script>
    <!-- Styles -->
    <style type="text/css">
        .bravo-contact-block .section {
            padding: 80px 0 !important;
        }

    </style>
    
    

    <style>
        .bravo_single_book {
            width: 90% !important;
            margin-left: 5%;
        }

    </style>
    <link href="<?php echo e(route('core.style.customCss')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/carousel-2/owl.carousel.css')); ?>" rel="stylesheet">
    <?php if(setting_item_with_lang('enable_rtl')): ?>
        <link href="<?php echo e(asset('dist/frontend/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <?php echo setting_item('head_scripts'); ?>

    <?php echo setting_item_with_lang_raw('head_scripts'); ?>


    <?php event(new \Modules\Layout\Events\LayoutEndHead()); ?>

</head>

<body class="frontend-page <?php echo e($body_class ?? ''); ?> <?php if(setting_item_with_lang('enable_rtl')): ?> is-rtl <?php endif; ?> <?php if(is_api()): ?> is_api <?php endif; ?>">
    <?php event(new \Modules\Layout\Events\LayoutBeginBody()); ?>

    <?php echo setting_item('body_scripts'); ?>

    <?php echo setting_item_with_lang_raw('body_scripts'); ?>

    <div class="bravo_wrap">
        <?php if(!is_api()): ?>
            <?php echo $__env->make('Layout::parts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Layout::parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div id="bravo_content-wrapper">
            <?php echo $__env->make("Contact::frontend.blocks.contact.home-request", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php echo $__env->make('Layout::parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo setting_item('footer_scripts'); ?>

    <?php echo setting_item_with_lang_raw('footer_scripts'); ?>

    <?php event(new \Modules\Layout\Events\LayoutEndBody()); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2({
      placeholder: {
        id: '-1', // the value of the option
        text: 'Select an option'
      }
    });
        });
        </script>
</body>

</html>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/modules/Contact/Views/home-request.blade.php ENDPATH**/ ?>