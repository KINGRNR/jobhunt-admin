<div class="modal-dialog modal-dialog-centered mw-650px">
    <!--begin::Modal content-->
    <div class="modal-content">
        <!--begin::Form-->
        <form class="form" action="#" id="kt_modal_add_customer_form"
            data-kt-redirect="../../demo9/dist/apps/customers/list.html">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_customer_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add a Customer</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
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
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-10 px-lg-17">
                <!--begin::Scroll-->
                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold mb-2">Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="name"
                            value="Sean Bean" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">
                            <span class="required">Email</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Email address must be active"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" class="form-control form-control-solid" placeholder="" name="email"
                            value="sean@dellito.com" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-15">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Description</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder=""
                            name="description" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Billing toggle-->
                    <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                        href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false"
                        aria-controls="kt_customer_view_details">Shipping Information
                        <span class="ms-2 rotate-180">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Billing toggle-->
                    <!--begin::Billing form-->
                    <div id="kt_modal_add_customer_billing_info" class="collapse show">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Address Line 1</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="" name="address1"
                                value="101, Collins Street" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Address Line 2</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="" name="address2"
                                value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Town</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="" name="city"
                                value="Melbourne" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-7">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">State / Province</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="" name="state"
                                    value="Victoria" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Post Code</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="" name="postcode"
                                    value="3000" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">Country</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="country" aria-label="Select a Country" data-control="select2"
                                data-placeholder="Select a Country..." data-dropdown-parent="#kt_modal_add_customer"
                                class="form-select form-select-solid fw-bolder">
                                <option value="">Select a Country...</option>
                                <option value="AF">Afghanistan</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="me-5">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold">Use as a billing adderess?</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="fs-7 fw-bold text-muted">If you need more info, please check budget
                                        planning</div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input" name="billing" type="checkbox" value="1"
                                        id="kt_modal_add_customer_billing" checked="checked" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <span class="form-check-label fw-bold text-muted"
                                        for="kt_modal_add_customer_billing">Yes</span>
                                    <!--end::Label-->
                                </label>
                                <!--end::Switch-->
                            </div>
                            <!--begin::Wrapper-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Billing form-->
                </div>
                <!--end::Scroll-->
            </div>
            <!--end::Modal body-->
            <!--begin::Modal footer-->
            <div class="modal-footer flex-center">
                <!--begin::Button-->
                <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
            <!--end::Modal footer-->
        </form>
        <!--end::Form-->
    </div>
</div>
