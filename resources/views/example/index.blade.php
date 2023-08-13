<div class="row mb-5 w-75 mx-auto">
    <div class="bg-white rounded-3 p-7 shadow-sm m-3">
        <div class="d-flex">
            <input type="date" name="filter_date" id="filter_date" class="form-control form-control-sm"
                style="width: 20%!important;" onchange="onFilter()">
            <select name="status" id="status" class="form-select form-select-sm form-select-solid ms-2"
                style="width: 20%!important;">
                <option value="">Status</option>
                <option value="approve">Approved</option>
                <option value="reject">Rejected</option>
                <option value="processing">Processing</option>
            </select>
            <div class="input-group ms-2">
                <span class="input-group-text" id="basic-addon1">
                    <i class="align-self-center fs-2 las la-search"></i>
                </span>
                <input type="search" name="search_example" id="search_example" placeholder="Search Here!"
                    class="form-control form-control-sm" autocomplete="off">

            </div>
            <button type="button" class="btn btn-sm btn-primary ms-2 mw-25" onclick="onForm(this)"
                data-bs-toggle="modal" data-bs-target="#kt_modal_add_example" style="width: 10%!important;">Add</button>

        </div>

    </div>
</div>

<div class="card" >
    <!--begin::Card header-->

    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">

        <!--begin::Table-->
         <table class="table align-middle table-row-dashed fs-6 gy-5 text-center" id="table-example">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                <tr class="text-center align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="ps-4" width="20">No</th>
                        <th class="min-w-125px">Code</th>
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Active</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
            <tbody class="fw-bold text-gray-600">
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_add_example" tabindex="-1" aria-hidden="true">
        @include('example.form')
    </div>
{{--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Include the jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

 --}}
    @include('example.javascript')
