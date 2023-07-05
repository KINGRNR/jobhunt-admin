<div class="row mb-7">
    <div class="">
        <div class="bg-white rounded-1 p-7 shadow-sm m-3">
            <div class="d-flex">
                <div class="d-flex align-items-center">
                    <input type="date" class="btn btn-sm btn-light btn-active-light-primary ms-4 h-50px w-141px" id="" name="">
                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary ms-2 w-145px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Status
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                    </a>
                </div>
               <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid ms-2 flex-grow-1" placeholder="Cari">
                    <button type="button" class="btn btn-primary ms-2">Cari</button>
         </div>
            
        </div>
    </div>
</div>

<div class="card">
    <!--begin::Card header-->
  
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
       
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-example">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Code</th>
                    <th class="min-w-125px">Name</th>
                    <th class="min-w-125px">Active</th>
                    <th>Actions</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <tbody class="fw-bold text-gray-600">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true"> 
    @include('example.form')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- Include the jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


</div>
    
<div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bolder">Export Customers</h2>
                <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="kt_customers_export_form" class="form" action="#">
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-bold form-label mb-5">Select Date Range:</label>
                        <input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
                    </div>
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-bold form-label mb-5">Select Export Format:</label>
                        <select data-control="select2" data-placeholder="Select a format" data-hide-search="true"
                            name="format" class="form-select form-select-solid">
                            <option value="excell">Excel</option>
                            <option value="pdf">PDF</option>
                            <option value="cvs">CVS</option>
                            <option value="zip">ZIP</option>
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Row-->
                    <div class="row fv-row mb-15">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold form-label mb-5">Payment Type:</label>
                        <!--end::Label-->
                        <!--begin::Radio group-->
                        <div class="d-flex flex-column">
                            <!--begin::Radio button-->
                            <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="1" checked="checked"
                                    name="payment_type" />
                                <span class="form-check-label text-gray-600 fw-bold">All</span>
                            </label>
                            <!--end::Radio button-->
                            <!--begin::Radio button-->
                            <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="2" checked="checked"
                                    name="payment_type" />
                                <span class="form-check-label text-gray-600 fw-bold">Visa</span>
                            </label>
                            <!--end::Radio button-->
                            <!--begin::Radio button-->
                            <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="3" name="payment_type" />
                                <span class="form-check-label text-gray-600 fw-bold">Mastercard</span>
                            </label>
                            <!--end::Radio button-->
                            <!--begin::Radio button-->
                            <label class="form-check form-check-custom form-check-sm form-check-solid">
                                <input class="form-check-input" type="checkbox" value="4" name="payment_type" />
                                <span class="form-check-label text-gray-600 fw-bold">American Express</span>
                            </label>
                            <!--end::Radio button-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_customers_export_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

@include('example.javascript')
