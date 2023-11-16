<div class="z-3">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        body {
            align-items: center;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;

        }



        svg {
            animation: upDown 1s ease-in-out infinite;
        }

        .loader-circle,
        .loader-pointer,
        .loader-line {
            fill: none;
            stroke-width: 5px;
            stroke: #4d6565;
        }

        .loader-center {
            fill: #4d6565;
        }

        .loader-pointer {
            -webkit-transform-origin: bottom center;
            -moz-transform-origin: bottom center;
            -ms-transform-origin: bottom center;
            transform-origin: bottom center;
            animation: spin 4s linear infinite;
            -moz-animation: spin 4s linear infinite;
            -webkit-animation: spin 4s linear infinite;
        }

        .loader-line {
            -webkit-transform-origin: bottom center;
            -moz-transform-origin: bottom center;
            -ms-transform-origin: bottom center;
            transform-origin: bottom center;
            animation: spin 60s linear infinite;
            -moz-animation: spin 60s linear infinite;
            -webkit-animation: spin 60s linear infinite;
        }

        @-moz-keyframes spin {
            from {
                -moz-transform: rotate(0deg);
                -moz-transform-origin: 50% 50%;
            }

            to {
                -moz-transform: rotate(360deg);
                -moz-transform-origin: 50% 50%;
            }
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
                -webkit-transform-origin: 50% 50%;
            }

            to {
                -webkit-transform: rotate(360deg);
                -webkit-transform-origin: 50% 50%;
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
                transform-origin: 50% 50%;
            }

            to {
                transform: rotate(360deg);
                transform-origin: 50% 50%;
            }
        }
    </style>
    <div class="card" aria-hidden="true" style="height: 100vh">
        <div class="card-body d-flex flex-column align-items-center justify-content-center">
            {{-- <p class="card-text placeholder-glow">
                <svg height="240" width="240">
                    <line class="loader-pointer" x1="120" y1="120" x2="120" y2="97" />
                    <line class="loader-line" x1="120" y1="120" x2="135" y2="120" />
                    <circle class="loader-circle" cx="120" cy="120" r="30" />
                    <circle class="loader-center" cx="120" cy="120" r="5" />
                </svg>
            </p> --}}
            <p class="text-muted" style="position: absolute; margin-top: 100px;">Please wait, loading content</p>
        </div>
        
    </div>

    {{-- <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_toggle">
                <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
                    <a href="../../demo3/dist/index.html">
                        <img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px logo" />
                    </a>
                </div>

                <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
                    <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper"
                        data-kt-scroll-offset="100">
                        @include('skeletonloading.sidebar')
                    </div>
                </div>
                <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
                    <div class="d-flex flex-stack">
                        <div class="d-flex align-items-center placeholder-glow">
                            <div class="symbol symbol-circle symbol-40px placeholder ">
                                <img alt="Logo" src="assets/media/avatars/blank.png">
                            </div>
                            <div class="ms-2">
                                <!--begin::Name-->
                                <a href="#"
                                    class="text-gray-800 text-hover-primary placeholder rounded fs-6 fw-bolder lh-1 ">......................................</a>
                                <!--end::Name-->
                                <!--begin::Major-->
                                <span class="text-muted fw-bold d-block placeholder rounded fs-7 lh-1"></span>
                                <!--end::Major-->
                            </div>
                            <!--end::User info-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::User menu-->
                        <div class="ms-1 placeholder-glow">
                            <div
                                class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2 placeholder rounded">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
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
    </div> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="{!! asset('assets/js/custom/js.cookie.js') !!}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script> --}}
</div>
