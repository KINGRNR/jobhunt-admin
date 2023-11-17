<div class="table-user-ini">
    {{-- <div class="row mb-5 w-75 mx-auto">
    </div> --}}
    <div id="filter_role"></div>

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
                        <input type="search" name="search_user" id="search_user" placeholder="Cari"
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
                <button type="button" class="btn btn-danger me-2 reset-filter" onclick="resetFilter()" style="display: none;">Reset Filter</button>
                <div class="d-flex">
                    <input class="form-control form-control-solid input-required" placeholder="Pick date rage"
                        name="daterangepicker" id="daterangepicker_filter" fdprocessedid="dc1v83">
                    <select name="role_filter" id="role_filter"
                        class="form-select form-select-sm form-select-solid ms-2"
                        style="display: flex;
                            width: 141px;
                            height: 48px;
                            padding: 10px 16px;
                            align-items: center;
                            gap: 16px;">
                        <option value="">All Role</option>
                        <option value="BfiwyVUDrXOpmStr">User/Jobseeker</option>
                        <option value="FOV4Qtgi5lcQ9kZ">Company</option>
                        <option value="FOV4Qtgi5lcQ9kCY">Admin</option>
                    </select>
                </div>

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
            <table class="table align-middle table-hover  table-row-dashed fs-6 gy-5 text-center" id="table-user">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="ps-4" width="20">
                            <div class="form-check ms-2"><input class="form-check-input row-checkbox" id="checkAll"
                                    type="checkbox"></div>
                        </th>
                        <th class="ps-4" width="20">No</th>
                        <th class="min-w-100px">Username</th>
                        <th class="min-w-100px">Email</th>
                        <th class="min-w-100px">Joining Date</th>
                        <th class="min-w-100px">Full Name</th>
                        <th class="min-w-100px">Role</th>
                        <th>action</th>
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
                    <form action="javascript:onSaveSuspend()" method="post" id="formSuspend" name="formSuspend"
                        autocomplete="off" enctype="multipart/form-data">
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
                            <input class="form-control form-control-solid" placeholder="Pick date rage"
                                id="kt_daterangepicker_1" />
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
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserLabel">Delete User</h1>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="javascript:onDeleteUser()" method="post" id="formDeleteUsers"
                        name="formDeleteUsers" autocomplete="off" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div id="userId">

                            </div>
                            <p>Selected Users to Delete:</p>
                            <ul id="selectedUsersList">
                                <!-- Daftar nama pengguna yang dipilih akan ditambahkan di sini -->
                            </ul>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="deleteConfirmBtn"
                    onclick="onDeleteUser()">Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="deleteCancelBtn">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

@include('listuser.javascript')
