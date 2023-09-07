<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>{!! Session::get('app.siteTitle') !!}</title>
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/leaflet/leaflet.bundle.js"></script>

    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->

    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        .loading-spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Ubah z-index sesuai kebutuhan */
        }

        .loading-spinner {
            border: 2px solid #ccc;
            border-top: 2px solid #007bff;
            /* Ganti warna sesuai kebutuhan */
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        .loading-text {
            text-align: center;
            margin-top: 15px;
            margin-left: 5px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        ::-webkit-scrollbar {
            width: 10px;
            /* Ubah lebar scrollbar */
        }

        ::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            /* Ubah warna latar belakang track */
        }

        ::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Ubah warna thumb scrollbar */
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
            /* Ubah warna thumb saat dihover */
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Logo-->
                <div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
                    <a href="../../demo9/dist/index.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41"
                            fill="none">
                            <g clip-path="url(#clip0_869_1150)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.7146 0.516113C11.4582 0.516113 9.2943 1.41245 7.69881 3.00794L0 10.7067V14.2307C0 16.7204 1.06944 18.9603 2.77401 20.5161C1.06944 22.0719 0 24.3118 0 26.8015V30.3255L7.69881 38.0243C9.2943 39.6198 11.4582 40.5161 13.7146 40.5161C16.2043 40.5161 18.4442 39.4467 20 37.7421C21.5558 39.4467 23.7957 40.5161 26.2854 40.5161C28.5418 40.5161 30.7057 39.6198 32.3012 38.0243L40 30.3255V26.8015C40 24.3118 38.9306 22.0719 37.226 20.5161C38.9306 18.9603 40 16.7204 40 14.2307V10.7067L32.3012 3.00794C30.7057 1.41245 28.5418 0.516113 26.2854 0.516113C23.7957 0.516113 21.5558 1.58555 20 3.29012C18.4442 1.58555 16.2043 0.516113 13.7146 0.516113ZM25.7588 20.5161C25.6629 20.4286 25.5688 20.3387 25.4766 20.2465L20 14.7699L14.5234 20.2465C14.4312 20.3387 14.3371 20.4286 14.2412 20.5161C14.3371 20.6036 14.4312 20.6935 14.5234 20.7857L20 26.2623L25.4766 20.7857C25.5688 20.6935 25.6629 20.6036 25.7588 20.5161ZM22.2222 30.3255V32.0085C22.2222 34.2525 24.0414 36.0717 26.2854 36.0717C27.363 36.0717 28.3965 35.6436 29.1585 34.8816L35.5556 28.4845V26.8015C35.5556 24.5575 33.7364 22.7383 31.4924 22.7383C30.4148 22.7383 29.3813 23.1664 28.6193 23.9284L22.2222 30.3255ZM17.7778 30.3255L11.3807 23.9284C10.6187 23.1664 9.58524 22.7383 8.50762 22.7383C6.26359 22.7383 4.44444 24.5575 4.44444 26.8015V28.4845L10.8415 34.8816C11.6035 35.6436 12.637 36.0717 13.7146 36.0717C15.9586 36.0717 17.7778 34.2525 17.7778 32.0085V30.3255ZM17.7778 9.02373V10.7067L11.3807 17.1038C10.6187 17.8658 9.58524 18.2939 8.50762 18.2939C6.26359 18.2939 4.44444 16.4747 4.44444 14.2307V12.5477L10.8415 6.15063C11.6035 5.38864 12.637 4.96056 13.7146 4.96056C15.9586 4.96056 17.7778 6.7797 17.7778 9.02373ZM28.6193 17.1038L22.2222 10.7067V9.02373C22.2222 6.7797 24.0414 4.96056 26.2854 4.96056C27.363 4.96056 28.3965 5.38864 29.1585 6.15063L35.5556 12.5477V14.2307C35.5556 16.4747 33.7364 18.2939 31.4924 18.2939C30.4148 18.2939 29.3813 17.8658 28.6193 17.1038Z"
                                    fill="#1B61AD"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_869_1150">
                                    <rect width="40" height="41" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <!--end::Logo-->
                <!--begin::Nav-->
                <div class="aside-menu flex-column-fluid pt-0 pb-5 py-lg-5" id="kt_aside_menu">
                    <!--begin::Aside menu-->
                    <div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-overlay-y scroll-ps d-flex"
                        data-kt-scroll="true" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0">
                        <div id="kt_aside_menu"
                            class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-bold fs-6"
                            data-kt-menu="true">
                            @include('layouts.sidebar')
                        </div>
                    </div>
                    <!--end::Aside menu-->
                </div>
                <!--end::Nav-->
                <!--begin::Footer-->
                <div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
                    <!--begin::Menu-->
                    <div class="d-flex flex-center w-100 scroll-px" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-dismiss="click" title="Quick actions">
                        <button type="button" class="btn btn-custom" data-kt-menu-trigger="click"
                            data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" width="12" height="2" rx="1"
                                        transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
                                    <path
                                        d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                        fill="black" />
                                    <path
                                        d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                        fill="#C4C4C4" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 2-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                            </div>
                            <div class="separator mb-3 opacity-75"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Backroom</a>
                            </div>
                        </div>
                        <!--end::Menu 2-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header tablet and mobile-->
                <div class="header-mobile py-3">
                    <!--begin::Container-->
                    <div class="container d-flex flex-stack">
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="../../demo9/dist/index.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41"
                                    viewBox="0 0 40 41" fill="none">
                                    <g clip-path="url(#clip0_869_1150)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.7146 0.516113C11.4582 0.516113 9.2943 1.41245 7.69881 3.00794L0 10.7067V14.2307C0 16.7204 1.06944 18.9603 2.77401 20.5161C1.06944 22.0719 0 24.3118 0 26.8015V30.3255L7.69881 38.0243C9.2943 39.6198 11.4582 40.5161 13.7146 40.5161C16.2043 40.5161 18.4442 39.4467 20 37.7421C21.5558 39.4467 23.7957 40.5161 26.2854 40.5161C28.5418 40.5161 30.7057 39.6198 32.3012 38.0243L40 30.3255V26.8015C40 24.3118 38.9306 22.0719 37.226 20.5161C38.9306 18.9603 40 16.7204 40 14.2307V10.7067L32.3012 3.00794C30.7057 1.41245 28.5418 0.516113 26.2854 0.516113C23.7957 0.516113 21.5558 1.58555 20 3.29012C18.4442 1.58555 16.2043 0.516113 13.7146 0.516113ZM25.7588 20.5161C25.6629 20.4286 25.5688 20.3387 25.4766 20.2465L20 14.7699L14.5234 20.2465C14.4312 20.3387 14.3371 20.4286 14.2412 20.5161C14.3371 20.6036 14.4312 20.6935 14.5234 20.7857L20 26.2623L25.4766 20.7857C25.5688 20.6935 25.6629 20.6036 25.7588 20.5161ZM22.2222 30.3255V32.0085C22.2222 34.2525 24.0414 36.0717 26.2854 36.0717C27.363 36.0717 28.3965 35.6436 29.1585 34.8816L35.5556 28.4845V26.8015C35.5556 24.5575 33.7364 22.7383 31.4924 22.7383C30.4148 22.7383 29.3813 23.1664 28.6193 23.9284L22.2222 30.3255ZM17.7778 30.3255L11.3807 23.9284C10.6187 23.1664 9.58524 22.7383 8.50762 22.7383C6.26359 22.7383 4.44444 24.5575 4.44444 26.8015V28.4845L10.8415 34.8816C11.6035 35.6436 12.637 36.0717 13.7146 36.0717C15.9586 36.0717 17.7778 34.2525 17.7778 32.0085V30.3255ZM17.7778 9.02373V10.7067L11.3807 17.1038C10.6187 17.8658 9.58524 18.2939 8.50762 18.2939C6.26359 18.2939 4.44444 16.4747 4.44444 14.2307V12.5477L10.8415 6.15063C11.6035 5.38864 12.637 4.96056 13.7146 4.96056C15.9586 4.96056 17.7778 6.7797 17.7778 9.02373ZM28.6193 17.1038L22.2222 10.7067V9.02373C22.2222 6.7797 24.0414 4.96056 26.2854 4.96056C27.363 4.96056 28.3965 5.38864 29.1585 6.15063L35.5556 12.5477V14.2307C35.5556 16.4747 33.7364 18.2939 31.4924 18.2939C30.4148 18.2939 29.3813 17.8658 28.6193 17.1038Z"
                                            fill="#1B61AD"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_869_1150">
                                            <rect width="40" height="41" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Aside toggle-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-2x me-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Aside toggle-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header tablet and mobile-->
                <!--begin::Header-->
                <div id="kt_header" class="header py-6 py-lg-0" data-kt-sticky="true" data-kt-sticky-name="header"
                    data-kt-sticky-offset="{lg: '300px'}" style="animation-duration: 0.3s; background-color:#117CB2;">
                    <!--begin::Container-->
                    <div class="header-container container-fluid">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3"
                            id="page_breadcrumb">
                        </div>
                        <!--end::Page title=-->
                        <!--begin::Topbar-->
                        <div class="d-flex align-items-center flex-shrink-0">
                            <div class="d-flex align-items-center py-3 py-lg-0">
                                <div class="me-3">
                                    <div class="btn btn-icon btn-color-light btn-active-color-primary bg-hover-white bg-hover-opacity-10 bg-light bg-opacity-20 w-50px h-50px w-lg-48px h-lg-48px position-relative"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span
                                            class="bullet bullet-dot bg-white h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                                    </div>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px"
                                        data-kt-menu="true">
                                        <!--begin::Heading-->
                                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                                            style="background-image:url('assets/media/misc/pattern-1.jpg')">
                                            <!--begin::Title-->
                                            <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifikasi
                                                <span class="fs-8 opacity-75 ps-3">10 notifikasi baru</span>
                                            </h3>
                                            <!--end::Title-->
                                            <!--begin::Tabs-->
                                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9"
                                                role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active"
                                                        data-bs-toggle="tab" href="#kt_topbar_notifications_1"
                                                        aria-selected="true" role="tab">Notifikasi Baru</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 "
                                                        data-bs-toggle="tab" href="#kt_topbar_notifications_2"
                                                        aria-selected="false" tabindex="-1" role="tab">Telah
                                                        Dibaca</a>
                                                </li>
                                            </ul>
                                            <!--end::Tabs-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Tab content-->
                                        <div class="tab-content">
                                            <!--begin::Tab panel-->
                                            <div class="tab-pane fade show active" id="kt_topbar_notifications_1"
                                                role="tabpanel">
                                                <div class="scroll-y mh-325px px-8">
                                                    <a href="#"
                                                        class="btn btn-outline btn-outline-default mt-5 mb-2 w-100">Tandai
                                                        semua telah dibaca</a>
                                                </div>
                                                <!--begin::Items-->
                                                <div class="scroll-y mh-325px my-5 px-8">
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-25px me-2">
                                                                <img alt="Logo" src="assets/media/misc/">
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#"
                                                                    class="fs-6 text-gray-800 text-hover-primary fw-bolder">Agus</a>
                                                                <div class="text-gray-400 fs-7">Halo Bang!</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Items-->
                                                <!--begin::View more-->
                                                <div class="py-3 text-center border-top">
                                                    <a href="../../demo17/dist/pages/profile/activity.html"
                                                        class="btn btn-color-gray-600 btn-active-color-primary">Lihat
                                                        Semua
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                        <span class="svg-icon svg-icon-5">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="18" y="13"
                                                                    width="13" height="2" rx="1"
                                                                    transform="rotate(-180 18 13)" fill="black">
                                                                </rect>
                                                                <path
                                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                                <!--end::View more-->
                                            </div>
                                            <div class="tab-pane fade " id="kt_topbar_notifications_2"
                                                role="tabpanel">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column px-9">
                                                    <div class="text-center px-4 py-6">
                                                        {{-- <img class="mw-100 mh-200px" alt="image"
                                                            src="assets/media/misc/notif.png"> --}}
                                                    </div>
                                                    <!--end::Illustration-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                        </div>
                                        <!--end::Tab content-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <div class="me-3">
                                    <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
                                        <!--begin::User info-->
                                        <div class="btn btn-icon btn-color-light btn-active-color-primary bg-hover-white bg-hover-opacity-10 bg-light bg-opacity-20 w-50px h-50px w-lg-48px h-lg-48px position-relative"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <div class="symbol symbol-circle symbol-25px symbol-md-35px">
                                                @if (auth()->user()->photo_profile)
                                                    <img alt="Logo" src="{{ auth()->user()->photo_profile }}">
                                                @else
                                                    <img alt="Logo" src="assets/media/avatars/blank.png">
                                                @endif
                                            </div>
                                            <!--begin::Name-->

                                            <!--end::Name-->

                                            <!--begin::Symbol-->

                                            <!--end::Symbol-->
                                        </div>
                                        <div
                                            class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                                            <span
                                                class="text-white  ms-4 fs-8 fw-bold lh-1 mb-1">{{ auth()->user()->name }}</span>
                                        </div>
                                        <!--end::User info-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                            data-kt-menu="true" style="">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <div class="symbol symbol-50px me-5">
                                                        @if (auth()->user()->photo_profile)
                                                            <img alt="Logo"
                                                                src="{{ auth()->user()->photo_profile }}">
                                                        @else
                                                            <img alt="Logo" src="assets/media/avatars/blank.png">
                                                        @endif
                                                    </div>
                                                    <!--end::Avatar-->

                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bold d-flex align-items-center fs-5">
                                                            {{ auth()->user()->name }}
                                                        </div>

                                                        <a href=""
                                                            class="fw-semibold text-muted text-hover-primary fs-7">
                                                            {{ auth()->user()->email }} </a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="javascript:;" data-con="j93ck5d81mt44dlw" onclick=""
                                                    class="menu-link px-5">
                                                    Profile
                                                </a>
                                            </div>
                                            <div class="menu-item px-5">
                                                <a href="{{ route('logout') }}" class="menu-link px-5"
                                                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                                    Sign Out
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        <!--end::User account menu-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Heading-->
                <!--end::Scrolltop-->
                <!--end::Main-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-fluid" id="kt_content_container">
                        @include('layouts.content')
                    </div>
                    <!--end::Container-->
                </div>
                <script>
                    var hostUrl = "assets/";
                </script>
                <script type="text/javascript">
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                </script>
                <script src="{!! asset('assets/js/custom/js.cookie.js') !!}"></script>

                <script type="text/javascript">
                    APP_URL = "{{ getenv('APP_URL') }}/";
                    API_URL = "{{ getenv('API_URL') }}/";

                    $(() => {
                        handleURLChange();

                        window.addEventListener('popstate', function(event) {
                            handleURLChange();
                        });
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    });

                    function handleURLChange() {
                        const currentURL = window.location.href;
                        let lastMenuId = localStorage.getItem('menuId');

                        if (getLastUrl() === 'dashboard') {
                            $('[data-con="ozqopvu1arkmk3gv"]').trigger('click');
                        } else {
                            $(`[data-con="${lastMenuId}"]`).trigger('click');
                        }
                    }



                    let stateData = null;

                    function getLastUrl() {
                        let url = $(location).attr('href');
                        return url.split('/').reverse()[0];
                    }

                    //     function loadPage(element) {
                    //         // $("#pagecontainer").empty();
                    //         let menuId = $(element).data('con');
                    //         let CSRF_NAME = 'csrf_cookie_name';
                    //         $.ajax({
                    //             url: APP_URL + "main/getPage",
                    //             data: {
                    //                 _token: '{{ csrf_token() }}',
                    //                 menu_id: menuId
                    //             },
                    //             type: "POST",
                    //             success: function(pages) {
                    //                 $(".menu-link").removeClass("active");
                    //                 $(`.menu-link[data-con="${menuId}"]`).addClass("active");
                    //                 $('#page_breadcrumb').html(atob(pages.breadcrumb));
                    //                 $('#titleContent').html('').html(`
    // <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1 parentTitle">${pages.menu_title}</h1>

    //   `)
                    //                 console.log(pages.url_path);
                    //                 window.history.pushState(stateData, "", pages.url_path);
                    //                 $("#pagecontainer").html(atob(pages.view));
                    //                 localStorage.setItem('menuId', menuId);
                    //                 blockPage();

                    //             }
                    //         });
                    //     }
                    //PHP BACKEND

                    //API
                    function loadPage(element) {
                        // $("#pagecontainer").empty();
                        let menuId = $(element).data('con');
                        let CSRF_NAME = 'csrf_cookie_name';
                        $.ajax({
                            url: APP_URL + "main/getPage",
                            data: {
                                _token: '{{ csrf_token() }}',
                                menu_id: menuId
                            },
                            type: "POST",
                            success: function(pages) {
                                $(".menu-link").removeClass("active");
                                $(`.menu-link[data-con="${menuId}"]`).addClass("active");
                                $('#page_breadcrumb').html(atob(pages.breadcrumb));
                                $('#titleContent').html('').html(`
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1 parentTitle">${pages.menu_title}</h1>
                                
                  `)
                                console.log(pages.url_path);
                                window.history.pushState(stateData, "", pages.url_path);
                                $("#pagecontainer").html(atob(pages.view));
                                localStorage.setItem('menuId', menuId);
                                blockPage();

                            }
                        });
                    }

                    function blockPage() {
                        const loadingDiv = $(
                            '<div class="loading loading-spinner-overlay" id="loading-spinner"><div class="loading-spinner"></div><p class="loading-text">Loading Data</p></div>'
                        );
                        loadingDiv.hide().appendTo("#pagecontainer").fadeIn();
                    }


                    function unblockPage() {
                        $("#pagecontainer").find(".loading").fadeOut();
                    }
                </script>

                <script src="{!! asset('assets/plugins/custom/datatables/datatables.bundle.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/apps/customers/list/export.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/apps/customers/list/list.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/apps/customers/add.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/modals/select-location.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/widgets.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/apps/chat/chat.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/modals/create-app.js') !!}"></script>
                <script src="{!! asset('assets/js/custom/modals/upgrade-plan.js') !!}"></script>
                <script src="{!! asset('//cdn.amcharts.com/lib/5/index.js') !!}"></script>
                <script src="{!! asset('//cdn.amcharts.com/lib/5/xy.js') !!}"></script>
                <script src="{!! asset('//cdn.amcharts.com/lib/5/themes/Animated.js') !!}"></script>
                <script src="{!! asset('https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js') !!}"></script>
</body>

</html>
