<div class="table-user-ini">
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


            </div>

        </div>
    </div>

    <div class="card">
        <!--begin::Card header-->

        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">

            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5 text-center" id="table-user">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-center align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="ps-4" width="20">No</th>
                        <th class="min-w-20px">Photo</th>
                        <th class="min-w-125px">Joining date</th>
                        <th class="min-w-125px">Company</th>
                        <th class="min-w-125px">Job Name</th>
                        <th class="min-w-125px">Jumlah Pelamar</th>
                        <th class="min-w-125px">Job Id</th>
                        <th class="min-w-125px">Status</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600 text-center align-middle">
                    <tr>
                        <td>1</td>
                        <td><img src="" alt=""></td>
                        <td>2020</td>
                        <td>PT NERAKA</td>
                        <td>Marketing Executive</td>
                        <td>13 Pelamar</td>
                        <td>JB0010</td>
                        <td><span>REQUESt</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-12">
    @include('managejob.detail')
</div>
<div class="modal fade" id="kt_modal_add_example" tabindex="-1" aria-hidden="true">
    @include('managejob.form')
</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include the jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>




@include('managejob.javascript')
