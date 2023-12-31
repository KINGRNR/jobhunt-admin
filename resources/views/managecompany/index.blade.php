<div class="table-company-ini">

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header py-4">
            <div class="card-title">
                {{-- <h1
                    style="color: var(--txt, #323232);
                font-size: 20px;
                font-style: normal;
                font-weight: 600;
                line-height: 140%; /* 28px */
                letter-spacing: 0.2px;">
                    List User</h1> --}}
                <div class="input-group ms-2">
                    <div class="w-100 position-relative">
                        <span class="svg-icon svg-icon-2 search-icon position-absolute top-50 translate-middle-y ms-4">
                            <i class="align-self-center fs-2 las la-search"></i>
                        </span>
                        <input type="search" name="search_company" id="search_company" placeholder="Cari"
                            class="form-control form-control-sm ps-12" autocomplete="off"
                            style="display: flex;
                        height: 48px;
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 8px;
                        flex: 1 0 0;
                        width: 241px;">
                    </div>

                    {{-- <span class="input-group-text" id="basic-addon1">
                    </span> --}}
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary me-2 reset-filter" onclick="resetFilter()" style="display: none;">Reset Filter</button>
                <div class="d-flex">
                    <input class="form-control form-control-solid input-required" placeholder="Pick date rage"
                        name="daterangepicker" id="daterangepicker_filter" fdprocessedid="dc1v83">
                    <select name="status_filter" id="status_filter"
                        class="form-select form-select-sm form-select-solid ms-2"
                        style="display: flex;
                            width: 141px;
                            height: 48px;
                            padding: 10px 16px;
                            align-items: center;
                            gap: 16px;">
                        <option value="">Status</option>
                        <option value="1">Approved</option>
                        <option value="0">Processing</option>
                        <option value="2">Rejected</option>
                    </select>
                </div>

                <div class="

                <div class="fw-bolder me-3 ms-2 deleted-selected" style="display: none;">
                    <span class="me-2" id="selected_total">10</span>Selected
                </div>
                <button type="button" class="btn btn-sm btn-danger deleted-selected"
                    data-kt-customer-table-select="delete_selected" style="display: none;"
                    onclick="deleteSelected()">Delete Selected</button>
            </div>
        </div>

        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">

            <!--begin::Table-->
            <table class="table align-middle table-hover  table-row-dashed fs-6 gy-5 text-center" id="table-company">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="ps-4" width="20">No</th>
                        <th class="min-w-125px">Company ID</th>
                        <th class="min-w-125px">Company</th>
                        <th class="min-w-125px">Request Date</th>
                        <th class="min-w-125px">Submission Notes</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">More</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600 text-start align-middle">
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-12">
    @include('managecompany.detail')
</div>

<div class="modal fade" id="kt_modal_add_example" tabindex="-1" aria-hidden="true">
    {{-- @include('managecompany.form') --}}
</div>
@include('managecompany.javascript')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include the jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
