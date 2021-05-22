<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $html_class ?? '' }}">
{{-- all-new-update --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php event(new \Modules\Layout\Events\LayoutBeginHead()); @endphp
    @php
        $favicon = setting_item('site_favicon');
    @endphp
    @if ($favicon)
        @php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        @endphp
        @if (!empty($file))
            <link rel="icon" type="{{ $file['file_type'] }}" href="{{ asset('uploads/' . $file['file_path']) }}" />
        @else:
            <link rel="icon" type="image/png" href="{{ url('images/favicon.png') }}" />
        @endif
    @endif

    @if (!empty($seo_meta))
        @if (isset($seo_meta['seo_index']) and $seo_meta['seo_index'] == 0)
            <meta name="robots" content="noindex">
        @endif
        @php
            $page_title = $seo_meta['seo_title'] ?? ($seo_meta['service_title'] ?? ($page_title ?? ''));
            if (!empty($page_title) and empty($seo_meta['is_homepage'])) {
                $page_title .= ' - ' . setting_item_with_lang('site_title', false, 'Booking Core');
            }
            if (empty($page_title)) {
                $page_title = setting_item_with_lang('site_title', false, 'Booking Core');
            }
        @endphp
        <title>Meetup Space Request</title>
        <meta name="description"
            content="{{ $seo_meta['seo_desc'] ?? ($seo_meta['service_desc'] ?? setting_item_with_lang('site_desc')) }}" />
        {{-- Facebook share --}}
        <meta property="og:url" content="{{ $seo_meta['full_url'] ?? '' }}" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="{{ $seo_meta['seo_share']['facebook']['title'] ?? ($seo_meta['seo_title'] ?? ($seo_meta['service_title'] ?? ($page_title ?? ''))) }}" />
        <meta property="og:description"
            content="{{ $seo_meta['seo_share']['facebook']['desc'] ?? ($seo_meta['seo_desc'] ?? ($seo_meta['service_desc'] ?? '')) }}" />
        <meta property="og:image"
            content="{{ get_file_url($seo_meta['seo_share']['facebook']['image'] ?? ($seo_meta['seo_image'] ?? ($seo_meta['service_image'] ?? '')), 'full') }}" />
        {{-- Twitter share --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title"
            content="{{ $seo_meta['seo_share']['twitter']['title'] ?? ($seo_meta['seo_title'] ?? ($seo_meta['service_title'] ?? ($page_title ?? ''))) }}">
        <meta name="twitter:description"
            content="{{ $seo_meta['seo_share']['twitter']['desc'] ?? ($seo_meta['seo_desc'] ?? ($seo_meta['service_desc'] ?? '')) }}">
        <meta name="twitter:image"
            content="{{ get_file_url($seo_meta['seo_share']['twitter']['image'] ?? ($seo_meta['seo_image'] ?? ($seo_meta['service_image'] ?? '')), 'full') }}">
        <link rel="canonical" href="{{ $seo_meta['full_url'] ?? '' }}" />
    @else
        @php
            if (!empty($page_title)) {
                $page_title .= ' - ' . setting_item_with_lang('site_title', false, 'Booking Core');
            } else {
                $page_title = setting_item_with_lang('site_title', false, 'Booking Core');
            }
        @endphp
        <title>{{ $page_title }}</title>
        <meta name="description" content="{{ setting_item_with_lang('site_desc') }}" />
    @endif

    <link href="{{ asset('libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/notification.css') }}" rel="newest stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver=' . config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('libs/daterange/daterangepicker.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'
        href='https://fonts.googleapis.com/css?family=Poppins%3A300%2C400%2C500%2C600' type='text/css' media='all' />
    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    <script>
        var bookingCore = {
            url: '{{ url(app_get_locale()) }}',
            url_root: '{{ url('') }}',
            booking_decimals: {{ (int) get_current_currency('currency_no_decimal', 2) }},
            thousand_separator: '{{ get_current_currency('currency_thousand') }}',
            decimal_separator: '{{ get_current_currency('currency_decimal') }}',
            currency_position: '{{ get_current_currency('currency_format') }}',
            currency_symbol: '{{ currency_symbol() }}',
            currency_rate: '{{ get_current_currency('rate', 1) }}',
            date_format: '{{ get_moment_date_format() }}',
            map_provider: '{{ setting_item('map_provider') }}',
            map_gmap_key: '{{ setting_item('map_gmap_key') }}',
            routes: {
                login: '{{ route('auth.login') }}',
                register: '{{ route('auth.register') }}',
                checkout: '{{ is_api() ? route('api.booking.doCheckout') : route('booking.doCheckout') }}'
            },
            module: {
                hotel: '{{ route('hotel.search') }}',
                car: '{{ route('car.search') }}',
                tour: '{{ route('tour.search') }}',
                space: '{{ route('space.search') }}',
            },
            currentUser: {{ (int) Auth::id() }},
            isAdmin: {{ is_admin() ? 1 : 0 }},
            rtl: {{ setting_item_with_lang('enable_rtl') ? '1' : '0' }},
            markAsRead: '{{ route('core.notification.markAsRead') }}',
            markAllAsRead: '{{ route('core.notification.markAllAsRead') }}',
            loadNotify: '{{ route('core.notification.loadNotify') }}',
            pusher_api_key: '{{ setting_item('pusher_api_key') }}',
            pusher_cluster: '{{ setting_item('pusher_cluster') }}',
        };
        var i18n = {
            warning: "{{ __('Warning') }}",
            success: "{{ __('Success') }}",
        };
        var daterangepickerLocale = {
            "applyLabel": "{{ __('Apply') }}",
            "cancelLabel": "{{ __('Cancel') }}",
            "fromLabel": "{{ __('From') }}",
            "toLabel": "{{ __('To') }}",
            "customRangeLabel": "{{ __('Custom') }}",
            "weekLabel": "{{ __('W') }}",
            "first_day_of_week": {{ setting_item('site_first_day_of_the_weekin_calendar', '1') }},
            "daysOfWeek": [
                "{{ __('Su') }}",
                "{{ __('Mo') }}",
                "{{ __('Tu') }}",
                "{{ __('We') }}",
                "{{ __('Th') }}",
                "{{ __('Fr') }}",
                "{{ __('Sa') }}"
            ],
            "monthNames": [
                "{{ __('January') }}",
                "{{ __('February') }}",
                "{{ __('March') }}",
                "{{ __('April') }}",
                "{{ __('May') }}",
                "{{ __('June') }}",
                "{{ __('July') }}",
                "{{ __('August') }}",
                "{{ __('September') }}",
                "{{ __('October') }}",
                "{{ __('November') }}",
                "{{ __('December') }}"
            ],
        };

    </script>
    <!-- Styles -->
    <style type="text/css">
        .bravo-contact-block .section {
            padding: 80px 0 !important;
        }

    </style>
    {{-- Custom Style --}}
    {{-- changed --}}

    <style>
        .bravo_single_book {
            width: 90% !important;
            margin-left: 5%;
        }

    </style>
    <link href="{{ route('core.style.customCss') }}" rel="stylesheet">
    <link href="{{ asset('libs/carousel-2/owl.carousel.css') }}" rel="stylesheet">
    @if (setting_item_with_lang('enable_rtl'))
        <link href="{{ asset('dist/frontend/css/rtl.css') }}" rel="stylesheet">
    @endif
    {!! setting_item('head_scripts') !!}
    {!! setting_item_with_lang_raw('head_scripts') !!}

    @php event(new \Modules\Layout\Events\LayoutEndHead()); @endphp

</head>


<body class="frontend-page {{ $body_class ?? '' }} @if (setting_item_with_lang('enable_rtl')) is-rtl @endif @if (is_api()) is_api @endif">
    @php event(new \Modules\Layout\Events\LayoutBeginBody()); @endphp

    {!! setting_item('body_scripts') !!}
    {!! setting_item_with_lang_raw('body_scripts') !!}
    <div class="bravo_wrap">
        @if (!is_api())
            @include('Layout::parts.topbar')
            @include('Layout::parts.header')
        @endif

        <div id="bravo_content-wrapper">
            @include("Contact::frontend.blocks.contact.space-request")
        </div>

        @include('Layout::parts.footer')
    </div>
    {!! setting_item('footer_scripts') !!}
    {!! setting_item_with_lang_raw('footer_scripts') !!}
    @php event(new \Modules\Layout\Events\LayoutEndBody()); @endphp
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
