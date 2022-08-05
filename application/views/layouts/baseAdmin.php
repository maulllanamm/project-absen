<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: Setiawan Iman
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link href="<?php base_url(); ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('mt/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('mt/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('mt/assets/css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('mt/assets/css/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('mt/assets/css/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('mt/assets/css/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('mt/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('mt/assets/toastr/toastr.min.css')}}">

    <link rel="shortcut icon" href="{{asset('aseanAssets/aseranLogo2.png')}}" />
    <link rel="stylesheet" href="{{ mix('/mt/assets/css/custom-v1.css') }}">

</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- header mobile start -->
    <?php $this->load->view('layouts/header_mobile'); ?>
    <!-- header mobile end -->


    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- header mobile start -->
            <?php $this->load->view('layouts/aside'); ?>
            <!-- header mobile end -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                @include('layouts.toogle-users')
                @yield('style')
                @yield('content')

                @include('layouts.footer-admin')
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    @yield('json')
    <script src="{{asset('mt/assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('mt/assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('mt/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
    <script src="{{asset('mt/assets/plugins/custom/gmaps/gmaps.js')}}" type="text/javascript"></script>
    <script src="{{asset('mt/assets/js/pages/dashboard.js')}}" type="text/javascript"></script>


    <script src="{{asset('mt/assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('mt/assets/js/pages/crud/forms/editors/summernote.js')}}" type="text/javascript"></script>


    <script src="{{asset('mt/assets/toastr/toastr.min.js')}}"></script>


    @yield('script')

</body>

</html>