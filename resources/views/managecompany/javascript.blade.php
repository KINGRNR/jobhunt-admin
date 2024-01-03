{{-- <script src="assets/js/custom/apps/customers/list/export.js"></script>
<script src="assets/js/custom/apps/customers/list/list.js"></script>
<script src="assets/js/custom/apps/customers/add.js"></script> --}}
{{-- <script src="{!! asset('assets/js/custom/js.cookie.js') !!}"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script> --}}
<script src="assets/js/quickact.js"></script>
<script type="text/javascript">
    var form = 'formExample';
    $(() => {
        var start = moment().subtract(29, "days");
        var end = moment();

        function cb(start, end) {
            $("#daterangepicker_filter").html(start.format("MMMM D, YYYY") + " - " + end.format(
                "MMMM D, YYYY"));
        }

        $("#daterangepicker_filter").daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                "Today": [moment(), moment()],
                "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1,
                    "month").endOf("month")]
            }
        }, cb);

        cb(start, end);
        init()
    })
    init = async () => {
        await initializeDataTables();
        quick.unblockPage()
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });
    //filter
    var filterDatatable = [];
    var userTable = null;

    $('[name="daterangepicker"]').on('apply.daterangepicker', (event) => {
        var selectedValue = $(event.target).val();

        if (selectedValue !== '0') {
            filterDatatable.date = selectedValue;
        } else {
            delete filterDatatable.date;
        }
        if (userTable) {
            userTable.destroy();
        }
        $('.reset-filter').fadeIn();
        initializeDataTables(filterDatatable);
    });

    $('[name="status_filter"]').on('change', (event) => {
        var selectedValue = $(event.target).val();

        filterDatatable.status = selectedValue;

        if (userTable) {
            userTable.destroy();
        }
        $('.reset-filter').fadeIn();

        initializeDataTables(filterDatatable);
    });
    resetFilter = () => {
        if (userTable) {
            userTable.destroy();
        }
        $('[name="role_filter"]').val('');
        $('.reset-filter').fadeOut();

        initializeDataTables();
    }

    function initializeDataTables(filterDatatable) {
        userTable = $('#table-company').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: APP_URL + 'managecompany/index',
                type: "POST",
                dataType: "json",
                data: filterDatatable,
            },
            columns: [{
                    "targets": 0,
                    render: function(data, type, row, meta) {
                        return '<span class="ps-3">' + (meta.row + meta.settings._iDisplayStart + 1) +
                            '</span>';
                    }
                },
                {
                    data: 'company_id',
                    name: 'company_id'
                },
                {
                    data: null,
                    name: 'company_data',
                    render: function(data, type, row) {
                        var companyName = data && data.company_name ? data.company_name : '-';
                        var photo = data && data.photo_profile ? data.photo_profile : '';
                        var googlePhoto = data && data.google_photo_profile ? data
                            .google_photo_profile : '';

                        if (!photo && googlePhoto) {
                            return '<div class=""><img src="' + googlePhoto +
                                '" alt="Google User Photo" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 5px;">' +
                                ' <span>' + companyName + '</span></div>';
                        } else if (photo) {
                            return '<div class=""><img src="' + photo +
                                '" alt="User Photo" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 5px;">' +
                                ' <span>' + companyName + '</span></div>';
                        } else {
                            return '<div class=""><img src="' + APP_URL +
                                'assets/media/avatars/blank.png" alt="User Photo" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 5px;">' +
                                ' <span>' + companyName + '</span></div>';
                        }
                    }
                },
                {
                    data: 'company_since',
                    name: 'company_since'
                },
                {
                    data: 'company_description',
                    name: 'company_description'
                },
                {
                    data: 'company_isverif',
                    render: function(data, type, row) {
                        let badgeText, badgeColor;
                        if (data == 1) {
                            badgeText = 'Approved';
                            badgeColor = 'badge-light-success';
                        } else if (data == 2) {
                            badgeText = 'Rejected';
                            badgeColor = 'badge-light-danger';
                        } else {
                            badgeText = 'Processing';
                            badgeColor = 'badge-light-warning';
                        }

                        var badgeHTML = '<span class="badge ' + badgeColor + ' fw-bolder">' +
                            badgeText +
                            '</span>';
                        return badgeHTML;
                    }
                },
                {
                    data: 'company_id',
                    render: function(data, type, row) {
                        var id = data; // Ambil ID dari data atau sumber lain sesuai kebutuhan
                        var btnHTML = `
        <div class="me-0">
            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" type="button" 
                id="toggleDropdownTable" onclick="toggleMenu(${id})">
                <i class="bi bi-three-dots fs-3"></i>
            </button>
        </div>
    `;
                        return btnHTML;
                    },
                }
                // {
                //     render: function(data, type, row) {

                //     }
                // },
            ]

        });
        $('#search_company').on('input', function() {
            var searchValue = $(this).val();
            userTable.search(searchValue).draw();
        });

        $('#table-user tbody').on('click', 'tr', function() {
            let rowData = userTable.row(this).data();
            if (rowData) {
                let id = rowData.id;
                onDetail(id);
            } else {
                onReset();
                $('#formExample').find('input, select').removeAttr('disabled');
                $('.actCreate').removeClass('d-none');
                $('.actEdit').addClass('d-none');
            }
        }).css('cursor', 'pointer');
    }

    // toggleDetailUser = () => {
    //     $(`[data-group="detail"]`).addClass('active');
    //     $(`[data-group="job"]`).removeClass('active');
    //     $('#job_history').fadeOut();
    //     $('#kt_profile_details_view').fadeIn();
    // }
    // toggleJob = () => {
    //     $(`[data-group="detail"]`).removeClass('active');
    //     $(`[data-group="job"]`).addClass('active');
    //     $('#kt_profile_details_view').fadeOut();
    //     $('#job_history').fadeIn();
    // }
    toogleTable = () => {
        $('.table-company-ini').fadeIn();
        $('.detail').fadeOut();
    }
    toggleMenu = (id) => {
        console.log(id);
        Swal.fire({
            title: 'Action',
            showCancelButton: true,
            showDenyButton: false,
            confirmButtonText: 'Details',
            customClass: {
                popup: 'custom-swal-popup',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                onDetail(id).then(() => {
                    initializeDataTablesJob(id);
                });
            }
        })
    }
    toggleDetail = () => {
        loadchartatas()
        $(`[data-group="detail"]`).addClass('active');
        $(`[data-group="job"]`).removeClass('active');
        $('.table-company-ini').hide();
        $('.detail').fadeIn();
    }
    onDetail = (id, callback) => {
        return new Promise((resolve, reject) => {
            quick.blockPage();
            $.ajax({
                url: APP_URL + 'managecompany/show',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: (response) => {
                    // $('#body_detail_comp').empty()


                    var data = response.data
                    if (data.company_isverif == '0') {
                        $('.card-acc-reject').removeClass('d-none')
                        $('.detail-job').empty()
                    }
                    $('#id').val(data.company_id)
                    $('#user_id').val(data.company_user_id)


                    let badgeText, badgeColor;
                    if (data.company_isverif == 1) {
                        badgeText = 'Approved';
                        badgeColor = 'success';
                    } else if (data.company_isverif == 2) {
                        badgeText = 'Rejected';
                        badgeColor = 'danger';
                    } else {
                        badgeText = 'Request';
                        badgeColor = 'warning';
                    }
                    const formattedId = String(data.company_id).padStart(4, '0');
                    // const gender = data.gender === 1 ? 'Woman' : 'Man';
                    var headerDetail = `<div class="card-title m-0 d-flex">

                        <div class="d-flex flex-column mt-2">
                    <div class="d-flex align-items-center">
                        <span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">${data.company_name}</span>
                        <span class="badge badge-light-${badgeColor} fw-bolder ms-2 fs-8 py-1 px-3">${badgeText}</span>
                    </div>
                    <div class="d-flex flex-wrap fw-bold fs-6 pe-2">
                        <span
                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">${data.company_position}</span>
                    </div>
                </div>
                </div>
                <div class="card-toolbar m-0">
                <h4 class="fw-bolder m-0 text-gray-500">Company ID</h4>
                <h4 class="ms-3 mt-2" id="id_company">${formattedId}</h4>
                </div>`
                    var bodyDetail = `
              <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">

                            <img src="assets/media/avatars/blank.png" alt="image" id="profile_image"
                                class="img-fluid" style="border-radius: 50%;">


                        </div>

                    </div>
                    <div class="flex-grow-1">

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Email</label>

                            <div class="col-lg-8">
                                <span class="fs-6">${data.email}</span>
                            </div>

                        </div>

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Company Phone Number</label>

                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6">${data.company_number}</span>
                            </div>

                        </div>

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Website</label>

                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fs-6 me-2"">${data.company_website}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Address</label>
                            <div class="col-lg-8">
                                <span class="fs-6 me-2"">${data.company_address}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-lg-8">
                                <button class="btn btn-light" onclick="toogleTable()">Kembali</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Date Request</label>
                            <div class="col-lg-8">
                                <span class=" fs-6">${quick.convertDate(data.created_at)}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">LinkedIn Account</label>
                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6">${data.company_linkedin}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Since</label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fs-6 me-2">${data.company_since}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Description</label>
                            <div class="col-lg-8">
                                <span class="fs-6 me-2">${data.company_description}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `
                    if (data.company_isverif == '1') {
                        $('.card-acc-reject').addClass('d-none')
                        var detailJobDatatable = ` <div class="card">
        <!--begin::Card header-->
        <div class="card-header py-4">
            <div class="card-title">
                <h4>
                    List Job Available
                </h4>
            </div>
            <div class="card-toolbar">
 <div class="input-group ms-2">
                    <div class="w-100 position-relative">
                        <span class="svg-icon svg-icon-2 search-icon position-absolute top-50 translate-middle-y ms-4">
                            <i class="align-self-center fs-2 las la-search"></i>
                        </span>
                        <input type="search" name="search_job" id="search_job" placeholder="Cari"
                            class="form-control form-control-sm ps-12" autocomplete="off"
                            style="display: flex;
                        height: 48px;
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 8px;
                        flex: 1 0 0;
                        width: 241px;">
                    </div>
                </div>                    
            </div>
        </div>

        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">

            <!--begin::Table-->
            <table class="table align-middle table-hover  table-row-dashed fs-6 gy-5 text-center" id="table-company-job">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start align-middle text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="ps-4" width="20">No</th>
                        <th class="min-w-125px">Requested Job Date</th>
                        <th class="min-w-125px">Job Name</th>
                        <th class="min-w-125px">Job Id</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">Detail</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600 text-start align-middle">
                </tbody>
            </table>
        </div>
    </div>`

                        $('.detail-job').empty().append(detailJobDatatable);

                    }
                    $('#body_detail_comp').empty().append(bodyDetail);

                    $('#header_detail_comp').empty().append(headerDetail);
                    var button = [];
                    if (data.company_isverif == 0) {
                        button =
                            `<button class="btn btn-danger btn-rejacc" data-bs-toggle="modal"
                            data-bs-target="#modal_reject">Reject</button>
                        <button class="btn btn-success btn-rejacc" condition?="1" data-id="${data.company_id}" data-user-id="${data.company_user_id}"
                            msg="Halo! Company request anda sudah kami terima, Selamat memakai full fitur yang kami sediakan!"
                            onclick="accCompany(this)">Approve</button>`;
                    } else if (data.company_isverif == 2){
                       button = `<button class="btn btn-primary btn-rejacc" condition?="1" data-id="${data.company_id}" data-user-id="${data.company_user_id}"
                            msg="Halo! Company mohon maaf atas ketidak nyamanannya, kami telah mengkaji ulang dan mengambil keputusan untuk Acc permintaan pembuatan akun company anda!"
                            onclick="accCompany(this)">Review Again & Approve</button>` 
                     }
                    // else if (data.company_isverif == 1){
                    //     button = `<button class="btn btn-primary btn-rejacc" condition?="2" data-id="${data.company_id}" data-user-id="${data.company_user_id}"
                    //         msg="Halo! Company mohon maaf atas ketidak nyamanannya, kami telah mengkaji ulang dan mengambil keputusan untuk menghapus akses akun company anda di website kami karena beberapa hal!"
                    //         onclick="accCompany(this)">Review Again & Approve</button>` 
                    // }
                    $(".btn-acc").empty().append(button);
                    // console.log(detailJobDatatable);
                },
                complete: (response) => {
                    toggleDetail();
                    quick.unblockPage(500);
                    resolve();
                }
            });
        });
    }

    function initializeDataTablesJob(id) {
        let table = $('#table-company-job').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: APP_URL + 'managecompany/jobIndex',
                type: "POST",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
            },
            order: [
                [1, 'desc']
            ],
            columns: [{
                    "targets": 0,
                    "orderable": false,
                    render: function(data, type, row, meta) {
                        return '<span class="ps-3">' + (meta.row + meta.settings._iDisplayStart + 1) +
                            '</span>';
                    }
                },
                {
                    data: 'job_requested_date',
                    sort: 'asc',
                    name: 'job_requested_date',
                    render: function(data, type, row) {

                        var formattedDate = quick.convertDate(data);


                        return formattedDate;
                    }
                },
                {
                    data: 'job_name',
                    name: 'job_name'
                },
                {
                    data: 'job_code',
                    name: 'job_code'
                },
                {
                    data: 'job_status',
                    render: function(data, type, row) {
                        let badgeText, badgeColor;
                        if (data == 1) {
                            badgeText = 'Approved';
                            badgeColor = 'badge-light-success';
                        } else if (data == 2) {
                            badgeText = 'Rejected';
                            badgeColor = 'badge-light-danger';
                        } else {
                            badgeText = 'Processing';
                            badgeColor = 'badge-light-warning';
                        }

                        var badgeHTML = '<span class="badge ' + badgeColor + ' fw-bolder">' +
                            badgeText +
                            '</span>';
                        return badgeHTML;
                    }
                },
                {
                    data: 'company_id',
                    render: function(data, type, row) {
                        var id = data; // Ambil ID dari data atau sumber lain sesuai kebutuhan
                        var btnHTML = `
        <div class="me-0">
            <button type="button" class="btn btn-light btn-sm ms-2" onclick="onForm(this)">Detail Job</button>
        </div>
    `;
                        return btnHTML;
                    },
                }
                // {
                //     render: function(data, type, row) {

                //     }
                // },
            ]

        });
        $('#search_job').on('input', function() {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });

        $('#table-job tbody').on('click', 'tr', function() {
            let rowData = table.row(this).data();
            if (rowData) {
                let id = rowData.id;
                onDetail(id);
            } else {
                onReset();
                $('#formExample').find('input, select').removeAttr('disabled');
                $('.actCreate').removeClass('d-none');
                $('.actEdit').addClass('d-none');
            }
        }).css('cursor', 'pointer');
    }

    accCompany = (data) => {

        var cond = $(data).attr('condition?');
        var id = $(data).attr('data-id');
        var user_id = $(data).attr('data-user-id');
        var msg = $(data).attr('msg');

        // var data = $('[name="' + form + '"]')[0];
        // var formData = new FormData(data);
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah kamu ingin melanjutkan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/managecompany/rejacc',
                    type: 'POST',
                    // processData: false,
                    // contentType: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        cond: cond,
                        user_id: user_id,
                        msg: msg,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: (response.success) ? 'success' : "error",
                                buttonsStyling: false,
                                confirmButtonText: "Oke!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            }).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    }

    var form = 'formReject';
    rejectCompany = () => {
        var validasi = 'true';
        $(".input-required").each(function(i, obj) {
            let inputValue = $(this).val().trim();

            if (inputValue === "") {
                $(this).removeClass("is-valid").addClass("is-invalid");
                validasi = 'false-invalid';
            } else {
                $(this).removeClass("is-invalid");
                $(this).parent().find(".error_code").removeClass("invalid-feedback").text("").show();
            }
        });
        var data = $('[name="' + form + '"]')[0];
        var formData = new FormData(data);
        if (validasi === 'true') {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah kamu ingin melanjutkan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/managecompany/rejacc',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: response.title,
                                    text: response.message,
                                    icon: (response.success) ? 'success' : "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Oke!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    },
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        },
                        error: function(response) {
                            let err_msg = response.responseJSON
                            Swal.fire({
                                title: err_msg.title,
                                text: err_msg.message,
                                icon: (err_msg.success) ? 'success' : "error",
                                buttonsStyling: false,
                                confirmButtonText: "Oke!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            }).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        } else if (validasi === 'false-invalid') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi Form Terlebih Dahulu!',
                confirmButtonClass: 'swal2-confirm btn btn-primary',
            });
        }
    }
    // onDisplayEdit = () => {
    //     $('#formExample').find('input, select').removeAttr('disabled');
    //     $('.actEdit').addClass('d-none');
    //     $('.actCreate').removeClass('d-none');
    // }
    // onForm = () => {
    //     onReset();
    //     $('.actEdit').addClass('d-none');
    //     $('.actCreate').removeClass('d-none');
    // }
    // onReset = () => {
    //     $('#formExample').find('input, select').removeAttr('disabled');
    //     let form = $('#formExample');
    //     form.find('input[type="text"], input[type="email"], input[type="number"], input[type="hidden"]').val('');
    //     form.find('textarea').val('');
    //     form.find('select').prop('selectedIndex', 0);
    //     form.find('input[type="checkbox"]').prop('checked', false);
    // }


    // onSave = () => {
    //     let formData = $('#formExample').serialize();
    //     let data = {};
    //     let lastMenuId = localStorage.getItem('menuId');
    //     let pairs = formData.split('&');
    //     for (let i = 0; i < pairs.length; i++) {
    //         let pair = pairs[i].split('=');
    //         let key = decodeURIComponent(pair[0]);
    //         let value = decodeURIComponent(pair[1]);
    //         data[key] = value;
    //     }

    //     let exampleId = $('[name="example_id"]').val();

    //     let route = exampleId ? 'update' : 'create';

    //     Swal.fire({
    //         title: 'Konfirmasi',
    //         text: 'Apakah kamu ingin melanjutkan?',
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: 'Ya',
    //         cancelButtonText: 'Tidak',
    //         customClass: {
    //             confirmButton: 'btn btn-primary',
    //             cancelButton: 'btn btn-secondary'
    //         },
    //         buttonsStyling: false
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: APP_URL + 'example/' + route,
    //                 method: 'POST',
    //                 data: {
    //                     _token: '{{ csrf_token() }}',
    //                     data,
    //                     example_active: $('#checkedStatus').is(':checked') ? 1 : 0,

    //                 },
    //                 success: function(response) {
    //                     Swal.fire({
    //                         text: 'Data saved successfully!',
    //                         icon: 'success',
    //                         buttonsStyling: false,
    //                         confirmButtonText: 'OK',
    //                         customClass: {
    //                             confirmButton: 'btn btn-primary'
    //                         },
    //                     }).then((result) => {
    //                         if (result.isConfirmed === true) {
    //                             $(`[data-con="${lastMenuId}"]`).trigger('click');
    //                             $('[data-bs-dismiss="modal"]').trigger('click');
    //                         }
    //                     })
    //                 },
    //                 error: function(xhr, status, error) {
    //                     Swal.fire({
    //                         text: 'Error saving data!',
    //                         icon: 'error',
    //                         buttonsStyling: false,
    //                         confirmButtonText: 'OK',
    //                         customClass: {
    //                             confirmButton: 'btn btn-primary'
    //                         }
    //                     });
    //                 }
    //             });
    //         }
    //     });
    // };
    // onDelete = (id = '') => {
    //     let lastMenuId = localStorage.getItem('menuId');

    //     Swal.fire({
    //         title: 'Konfirmasi',
    //         text: 'Apakah kamu ingin menghapus data ini?',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Ya',
    //         cancelButtonText: 'Tidak',
    //         customClass: {
    //             confirmButton: 'btn btn-danger',
    //             cancelButton: 'btn btn-secondary'
    //         },
    //         buttonsStyling: false
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: APP_URL + 'example/delete',
    //                 method: 'POST',
    //                 data: {
    //                     example_id: $('[name="example_id"]').val(),
    //                     _token: '{{ csrf_token() }}'
    //                 },
    //                 success: function(response) {
    //                     Swal.fire({
    //                         text: 'Data berhasil dihapus!',
    //                         icon: 'success',
    //                         buttonsStyling: false,
    //                         confirmButtonText: 'OK',
    //                         customClass: {
    //                             confirmButton: 'btn btn-primary'
    //                         }
    //                     });
    //                     $(`[data-con="${lastMenuId}"]`).trigger('click');
    //                     $('[data-bs-dismiss="modal"]').trigger('click');
    //                 },
    //                 error: function(xhr, status, error) {
    //                     Swal.fire({
    //                         text: 'Error menghapus data!',
    //                         icon: 'error',
    //                         buttonsStyling: false,
    //                         confirmButtonText: 'OK',
    //                         customClass: {
    //                             confirmButton: 'btn btn-primary'
    //                         }
    //                     });
    //                 }
    //             });
    //         }
    //     });
    // };
    loadchartatas = () => {
        var options = {
            series: [{
                name: 'Total Registered Applicants',
                data: [100, 200, 300, 400, 500, 600, 900]
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'month',
                categories: ["january", "February", "March", "April", "May", "June", "July", "August"]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#updraftcompany"), options);
        chart.render();
    }
</script>
