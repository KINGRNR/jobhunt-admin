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
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

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

{{-- <body id="kt_body" class="sidebar-enabled"> --}}

<body id="kt_body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="../../demo3/dist/index.html">
                        <img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px logo" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside menu-->
                <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
                    <!--begin::Aside Menu-->
                    @include('layouts.sidebar')

                    <!--end::Aside Menu-->
                </div>
                <!--end::Aside menu-->
                <!--begin::Footer-->
                <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
                    <!--begin::User panel-->
                    <div class="d-flex flex-stack">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-40px">
                                @if (auth()->user()->photo_profile)
                                    <img alt="Logo" src="{{ auth()->user()->photo_profile }}">
                                @else
                                    <img alt="Logo" src="assets/media/avatars/blank.png">
                                @endif
                            </div>
                            <!--end::Avatar-->
                            <!--begin::User info-->
                            <div class="ms-2">
                                <!--begin::Name-->
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder lh-1">{{ auth()->user()->name }}</a>
                                <!--end::Name-->
                                <!--begin::Major-->
                                <span class="text-muted fw-bold d-block fs-7 lh-1">{{ auth()->user()->name }}</span>
                                <!--end::Major-->
                            </div>
                            <!--end::User info-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::User menu-->
                        <div class="ms-1">
                            <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2"
                                data-kt-menu-trigger="click" data-kt-menu-overflow="true"
                                data-kt-menu-placement="top-end">
                                <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                            fill="black" />
                                        <path
                                            d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            @if (auth()->user()->photo_profile)
                                                <img alt="Logo" src="{{ auth()->user()->photo_profile }}">
                                            @else
                                                <img alt="Logo" src="assets/media/avatars/blank.png">
                                            @endif
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">
                                                {{ auth()->user()->name }}
                                                <span
                                                    class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                            </div>
                                            <a href="#"
                                                class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
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
                                    <a href="javascript:;" data-con="sqtlpuyaaivgnsda" onclick="loadPage(this)"
                                        class="menu-link px-5">My
                                        Profile</a>
                                </div>

                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="right-end">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title position-relative">Language
                                            <span
                                                class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                    src="assets/media/flags/united-states.svg"
                                                    alt="" /></span></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo3/dist/account/settings.html"
                                                class="menu-link d-flex px-5 active">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/media/flags/united-states.svg"
                                                        alt="" />
                                                </span>English</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo3/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/media/flags/spain.svg"
                                                        alt="" />
                                                </span>Spanish</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo3/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/media/flags/germany.svg"
                                                        alt="" />
                                                </span>German</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo3/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/media/flags/japan.svg"
                                                        alt="" />
                                                </span>Japanese</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo3/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/media/flags/france.svg"
                                                        alt="" />
                                                </span>French</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5 my-1">
                                    <a href="../../demo3/dist/account/settings.html" class="menu-link px-5">Account
                                        Settings</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
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
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <div class="menu-content px-5">
                                        <label
                                            class="form-check form-switch form-check-custom form-check-solid pulse pulse-success"
                                            for="kt_user_menu_dark_mode_toggle">
                                            <input class="form-check-input w-30px h-20px" type="checkbox"
                                                value="1" name="mode" id="kt_user_menu_dark_mode_toggle"
                                                data-kt-url="../../demo3/dist/index.html" />
                                            <span class="pulse-ring ms-n1"></span>
                                            <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                                        </label>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::User menu-->
                    </div>
                    <!--end::User panel-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('layouts.navbar')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-fluid" id="kt_content_container">
                        @include('layouts.content')
                    </div>
                    <!--end::Container-->
                </div>
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container d-flex flex-column flex-md-row flex-stack">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-gray-400 fw-bold me-1">2023</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-muted text-hover-primary fw-bold me-2 fs-6">Job-Hunt</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://keenthemes.com/support" target="_blank"
                                    class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://1.envato.market/EA4JP" target="_blank"
                                    class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                {{-- @include('layouts.rightsidebar') --}}
                <!--end::Content-->
                <!--begin::Footer-->

                <!--end::Footer-->
            </div>

            <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
                data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
                @include('layouts.notification')
            </div>
            <!--end::Wrapper-->
            <!--end::Activities drawer-->
            <!--begin::Chat drawer-->
            <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat"
                data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
                <!--begin::Messenger-->
                <div class="card w-100 rounded-0" id="kt_drawer_chat_messenger">
                    <!--begin::Card header-->
                    <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                        <!--begin::Title-->
                        <div class="card-title">
                            <!--begin::User-->
                            <div class="d-flex justify-content-center flex-column me-3">
                                <a href="#"
                                    class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian
                                    Cox</a>
                                <!--begin::Info-->
                                <div class="mb-0 lh-1">
                                    <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                    <span class="fs-7 fw-bold text-muted">Active</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <div class="me-2">
                                <button class="btn btn-sm btn-icon btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-three-dots fs-3"></i>
                                </button>
                                <!--begin::Menu 3-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                    data-kt-menu="true">
                                    <!--begin::Heading-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_users_search">Add Contact</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_invite_friends">Invite Contacts
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                title="Specify a contact email to send an invitation"></i></a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                        data-kt-menu-placement="right-start">
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">Groups</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                                    title="Coming soon">Create Group</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                                    title="Coming soon">Invite Members</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                                    title="Coming soon">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-1">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 3-->
                            </div>
                            <!--end::Menu-->
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                            rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    {{-- <div class="card-body" id="kt_drawer_chat_messenger_body">
                        <!--begin::Messages-->
                        <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                            data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                            data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                                Cox</a>
                                            <span class="text-muted fs-7 mb-1">2 mins</span>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                        data-kt-element="message-text">How likely are you to recommend our company to
                                        your friends and family ?</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->
                            <!--begin::Message(out)-->
                            <div class="d-flex justify-content-end mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">5 mins</span>
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                        data-kt-element="message-text">Hey there, we’re just writing to let you know
                                        that you’ve been subscribed to a repository on GitHub.</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(out)-->
                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                                Cox</a>
                                            <span class="text-muted fs-7 mb-1">1 Hour</span>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                        data-kt-element="message-text">Ok, Understood!</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->
                            <!--begin::Message(out)-->
                            <div class="d-flex justify-content-end mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">2 Hours</span>
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                        data-kt-element="message-text">You’ll receive notifications for all issues,
                                        pull requests!</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(out)-->
                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                                Cox</a>
                                            <span class="text-muted fs-7 mb-1">3 Hours</span>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                        data-kt-element="message-text">You can unwatch this repository immediately by
                                        clicking here:
                                        <a href="https://keenthemes.com">Keenthemes.com</a>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->
                            <!--begin::Message(out)-->
                            <div class="d-flex justify-content-end mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">4 Hours</span>
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                        data-kt-element="message-text">Most purchased Business courses during this
                                        sale!</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(out)-->
                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                                Cox</a>
                                            <span class="text-muted fs-7 mb-1">5 Hours</span>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                        data-kt-element="message-text">Company BBQ to celebrate the last quater
                                        achievements and goals. Food and drinks provided</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->
                            <!--begin::Message(template for out)-->
                            <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">Just now</span>
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                        data-kt-element="message-text"></div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(template for out)-->
                            <!--begin::Message(template for in)-->
                            <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                                Cox</a>
                                            <span class="text-muted fs-7 mb-1">Just now</span>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                        data-kt-element="message-text">Right before vacation season we have the next
                                        Big Deal for you.</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(template for in)-->
                        </div>
                        <!--end::Messages-->
                    </div> --}}
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                        <!--begin::Input-->
                        <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                            placeholder="Type a message"></textarea>
                        <!--end::Input-->
                        <!--begin:Toolbar-->
                        <div class="d-flex flex-stack">
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center me-2">
                                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                    data-bs-toggle="tooltip" title="Coming soon">
                                    <i class="bi bi-paperclip fs-3"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                    data-bs-toggle="tooltip" title="Coming soon">
                                    <i class="bi bi-upload fs-3"></i>
                                </button>
                            </div>
                            <!--end::Actions-->
                            <!--begin::Send-->
                            <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                            <!--end::Send-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Messenger-->
            </div>
            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                            transform="rotate(90 13 6)" fill="black" />
                        <path
                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Scrolltop-->
            <!--end::Main-->

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
                            $('#get_breadcumbs').html(atob(pages.breadcrumb));
                            $('#titleContent').html('').html(`
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1 parentTitle">${pages.menu_title}</h1>
                                
                  `)
                            window.history.pushState(stateData, "", pages.url_path);
                            $("#pagecontainer").html(atob(pages.view));
                            localStorage.setItem('menuId', menuId);
                            blockPage();
                        },
                    });

                }

                function removeSkeleton() {
                    $('.menu-skeleton').hide();
                    $('.menu-real').fadeIn();
                }

                function blockPage() {
                    // const loadingDiv = $(
                    //     '<div class="loading loading-spinner-overlay" id="loading-spinner"><div class="loading-spinner"></div><p class="loading-text">Loading Data</p></div>'
                    // );
                    const loadingDiv = $(
                        '<div class="loading loading-spinner-overlay" id="loading-spinner"></div>'
                    );
                    // $('.card-blocking').removeClass('d-none');
                    loadingDiv.hide().appendTo("#pagecontainer").fadeIn();
                }


                function unblockPage() {
                    $("#pagecontainer").find(".loading").fadeOut();
                    removeSkeleton();
                }
            </script>
            <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"> --}}
            </script>
</body>

</html>
