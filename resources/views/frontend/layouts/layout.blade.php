@php
    $generalSetting = \App\Models\GeneralSetting::first();
    $seoSetting = \App\Models\SEOSetting::first();
@endphp



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ @$seoSetting->description }}">
    <meta name="keywords" content="{{ @$seoSetting->keywords }}">


    <title>{{ @$seoSetting->title }}</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset($generalSetting->favicon) }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style-plugin-collection.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/timer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
    <div class="preloader">
        <img src="{{ asset('frontend/assets/images/preloader.gif') }}" alt="">
    </div>

    @include('frontend.layouts.navbar')

    <div class="main_wrapper" data-bs-spy="scroll" data-bs-target="#main_menu_area" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary" tabindex="0">

        {{-- <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu --> --}}


        @yield('content')
        <!-- Footer-Area-Start -->
        @include('frontend.layouts.footer')
        <!-- Footer-Area-End -->
    </div>



    <script src="{{ asset('frontend/assets/js/vendor/jquery-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/contact-form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/modernizr.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/timer.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/js/now.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @stack('scripts')
</body>

</html>
