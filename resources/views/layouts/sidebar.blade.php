<div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper" data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
    data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
    <!--begin::Menu-->
    @include('skeletonloading.sidebar')

    <div class="menu menu-column menu-rounded fw-bold my-auto menu-real" id="#kt_aside_menu" data-kt-menu="true" style="display: none;">
        {{-- menu Dashboard --}}
        <div class="menu-item">
            <a class="menu-link active" href="javascript:;" data-con="ozqopvu1arkmk3gv" data-type="main"
                onclick="loadPage(this)" title="" data-judul="Dashboard" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right"
                data-bs-original-title="Dashboard">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                    <span class="svg-icon svg-icon-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </div>
        {{-- Menu Master --}}
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                    <span class="svg-icon svg-icon-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Master</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link active" href="javascript:;" data-con="cfweqelm72wwtxbg" data-type="sub"
                        onclick="loadPage(this)">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Example</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="javascript:;" data-con="ozqopvu1arkmk3gr" data-type="sub"
                        onclick="loadPage(this)">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Notification</span>
                    </a>
                </div>
            </div>
        </div>
        {{-- Menu Manage Company --}}
        <div class="menu-item">
            <a class="menu-link menu-title" href="javascript:;" data-con="sqtlpuyaaasfa132" data-type="main"
                onclick="loadPage(this)" title="" data-judul="Manage Company" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right"
                data-bs-original-title="Manage Company">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                    <span class="svg-icon svg-icon-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Manage Company</span>
            </a>
        </div>
        {{-- Menu User Management --}}
        <div class="menu-item">
            <a class="menu-link menu-title" href="javascript:;" data-con="sqtlpuyaaivgna9" data-type="main"
                onclick="loadPage(this)" title="" data-judul="User Management" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right"
                data-bs-original-title="User Management">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                    <span class="svg-icon svg-icon-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">User Management</span>
            </a>
        </div>
        {{-- Menu Manage Job --}}
        <div class="menu-item">
            <a class="menu-link menu-title" href="javascript:;" data-con="sqtlpuyaaivgasw2" data-type="main"
                onclick="loadPage(this)" title="" data-judul="Manage Job" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right"
                data-bs-original-title="Manage Job">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                    <span class="svg-icon svg-icon-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Manage Job</span>
            </a>
        </div>
        {{-- Menu Configuration accordion --}}
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                    <span class="svg-icon svg-icon-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Pengaturan</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link" href="javascript:;" data-con="sqtlpuyaaivgnal8" data-type="sub" onclick="loadPage(this)">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Config</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end::Menu-->
</div>
