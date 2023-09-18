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
                    <tr class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="ps-4" width="20">No</th>
                        <th class="min-w-100px">Username</th>
                        <th class="min-w-100px">Email</th>
                        <th class="min-w-100px">Joining Date</th>
                        <th class="min-w-100px">Full Name</th>
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
    @include('listuser.detail')
</div>
<div class="modal fade" id="kt_modal_add_example" tabindex="-1" aria-hidden="true">
    @include('listuser.form')
</div>

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include the jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}


<div class="modal fade" id="suspendModal" tabindex="-1" aria-labelledby="suspendModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Suspend User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="javascript:onSaveSuspend()" method="post" id="formSuspend" name="formSuspend" autocomplete="off" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="User" class="form-label">Selected User:</label>
                            <input type="text" class="form-control" id="selected_user" name="selected_user">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi:</label>
                            <textarea class="form-control input-required" id="description" name="description" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">Range Tanggal:</label>
                            <input class="form-control form-control-solid input-required" placeholder="Pick date rage" id="kt_daterangepicker_1"/>
                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="confirmBtn">Confirm</button>
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelBtn">Cancel</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@include('listuser.javascript')
