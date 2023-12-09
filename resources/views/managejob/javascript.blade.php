<script src="assets/js/quickact.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script type="text/javascript">
    APP_URL = "{{ getenv('APP_URL') }}/";
    var form = 'formExample';
    var filterDatatable = [];
    var jobTable = null;
    $(() => {
        init()

    })
    init = async () => {
        await initializeDataTables();
        await unblockPage(500);
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });


    function initializeDataTables(filterDatatable) {
        jobTable = $('#table-job').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: APP_URL + 'managejob/index',
                type: "POST",
                dataType: "json",
                data: filterDatatable,
            },
            order: [
                [1, 'desc']
            ],
            columns: [{
                    "targets": 0,
                    render: function(data, type, row, meta) {
                        return '<span class="ps-3">' + (meta.row + meta.settings._iDisplayStart + 1) +
                            '</span>';
                    }
                },
                {
                    data: 'job_requested_date',
                    name: 'job_requested_date',
                    render: function(data, type, row) {

                        var formattedDate = quick.convertDate(data);


                        return formattedDate;
                    }
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
                    data: 'job_id',
                    render: function(data, type, row) {
                        var btnHTML = `
                        <div class="me-0">
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" type="button" 
                                id="toggleDropdownTable" data-id="${data}" onclick="onDetail(this)">
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
        $('#search_job').on('input', function() {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });

        // $('#table-job tbody').on('click', 'tr', function() {
        //     let rowData = table.row(this).data();
        //     if (rowData) {
        //         let id = rowData.id;
        //         onDetail(id);
        //     } else {
        //         onReset();
        //         $('#formExample').find('input, select').removeAttr('disabled');
        //         $('.actCreate').removeClass('d-none');
        //         $('.actEdit').addClass('d-none');
        //     }
        // }).css('cursor', 'pointer');
    }


    toggleDetail = () => {
        $(`[data-group="detail"]`).addClass('active');
        $(`[data-group="job"]`).removeClass('active');
        $('.table-job').fadeOut();
        $('.detail, .verif').fadeIn();
    }
    toggleDetailUser = () => {
        $(`[data-group="detail"]`).addClass('active');
        $(`[data-group="job"]`).removeClass('active');
        $('#job_history').fadeOut();
        $('#kt_profile_details_view').fadeIn();
    }
    toggleJob = () => {
        $(`[data-group="detail"]`).removeClass('active');
        $(`[data-group="job"]`).addClass('active');
        $('#kt_profile_details_view').fadeOut();
        $('#job_history').fadeIn();
    }
    toggleTable = () => {
        $('.table-job').fadeIn();
        $('.detail').empty();
        $('.verif').empty();
        $('.verif').fadeOut();
        $('.detail').fadeOut();
    }

    onDetail = (a) => {
        $('.detail').empty();
        blockPage();
        var id = $(a).attr('data-id')
        $.ajax({
            url: APP_URL + 'managejob/show',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: (response) => {
                toggleDetail();
                templateJobDetail(response);
            },
            error: (xhr, status, error) => {
                let errorMessage = 'An error occurred while fetching data.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                });
            },
            complete: (response) => {
                unblockPage(500);
            }
        });
    }
    templateJobDetail = (data) => {
        var job = data.data[0];
        var status = [];
        var gender = [];
        var lulusan = [];
        var experience = [];

        switch (job.job_status) {
            case 1:
                status = `<span class="badge badge-light-success fw-bolder ms-2 fs-8 py-1 px-3">Approved</span>`
                break;
            case 2:
                status = `<span class="badge badge-light-danger fw-bolder ms-2 fs-8 py-1 px-3">Rejected</span>`
                break;
            case 3:
                status = `<span class="badge badge-light-warning fw-bolder ms-2 fs-8 py-1 px-3">Processing</span>`
            default:
                break;
        }

        switch (job.job_required_gender) {
            case 0:
                gender = "Perempuan";
                break;
            case 1:
                gender = "Laki - Laki";
                break;
            default:
                gender = "Semua Gender"
                break;
        }

        switch (job.job_education_level) {
            case 0:
                lulusan = "Lulusan SD/Sederajat"
                break;
            case 1:
                lulusan = "Lulusan SMP/Sederajat";
                break;
            case 2:
                lulusan = "Lulusan SMA/Sederajat";
                break;
            case 3:
                lulusan = "Lulusan S1";
                break;
            case 4:
                lulusan = "Lulusan S2";
                break;
            case 5:
                lulusan = "Lulusan S3";
                break;
            default:
                lulusan = "Tidak ada minimum pendidikan"
                break;
        }

        switch (job.job_work_experience) {
            case 0:
                experience = "Kurang dari 1 Tahun"
                break;
            case 1:
                experience = "1 - 5 Tahun"
                break;
            case 2:
                experience = "5 - 10 Tahun"
                break;
            case 3:
                experience = "10  - 20 Tahun"
                break;
            case 4:
                experience = "Lebih dari 20 Tahun"
                break;
            default:
                experience = "Tidak ada minimum pengalaman"
                break;
        }
        var button = [];
        $('#id').val(job.job_id)
        $('#user_id').val(job.company_user_id)
        if (job.job_status == 3) {
            button =
                `<button class="btn btn-danger btn-rejacc" data-bs-toggle="modal" data-bs-target="#modal_reject" data-id="${job.job_id}" data-user-id="${job.company_user_id}" fdprocessedid="hwqssm">Reject</button>
                    <button class="btn btn-success btn-rejacc" condition?="1" msg="Halo! Request Job anda sudah kami terima!" onclick="accJob(this)" data-id="${job.job_id}" data-user-id="${job.company_user_id}" fdprocessedid="9wmunn">Approve</button>`;
        } else if (job.job_status == 1) {
            button = `<button class="btn btn-primary btn-rejacc" condition?="3" msg="Mohon maaf untuk pekerjaan yang anda iklankan kami takedown untuk waktu yang tidak bisa ditentukan, oleh karena itu jika anda butuh untuk segera di iklankan lagi silahkan lakukan proses verifikasi ulang atau mungkin revisi beberapa hal yang ada di tawaran anda!" onclick="accJob(this)" data-id="${job.job_id}" data-user-id="${job.company_user_id}" fdprocessedid="9wmunn">Archive</button>`;
        } else if (job.job_status == 2) {
            button = `<button class="btn btn-primary btn-rejacc" condition?="3" msg="Kabar baik untuk anda, kami telah mengkaji ulang dan menyetujui permintaan pengiklanan tawaran pekerjaan anda!" onclick="accJob(this)" data-id="${job.job_id}" data-user-id="${job.company_user_id}" fdprocessedid="9wmunn">Review Again</button>`;
        }
        var header = `<div class="d-flex flex-column mt-2">
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">${job.job_name}</span>
                            ${status}
                        </div>
                        <div class="d-flex flex-wrap fw-bold fs-6 pe-2">
                            <span
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">${job.company_name}</span>
                        </div>
                    </div>`;

        var body = `<div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">

                     <svg width="141" height="136" viewBox="0 0 141 136" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect x="0.5" width="140.185" height="136" fill="url(#pattern0)"></rect>
                    <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_503_939" transform="matrix(0.0078125 0 0 0.00805288 0 -0.0153846)"></use>
                        </pattern>
                    <image id="image0_503_939" width="128" height="128" xlink:href="data:image/png;base64,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"></image>
                        </defs>
                        </svg>


                        </div>

                    </div>
                    <div class="flex-grow-1">

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Email</label>

                            <div class="col-lg-8">
                                <span class="fs-6">${job.email}</span>
                            </div>

                        </div>

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Gender</label>

                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6">${gender}</span>
                            </div>

                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Offered Salary</label>
                            <div class="col-lg-8">
                                <span class="fs-6 me-2">${job.job_expected_salary_range ?? 'Penawaran Saat Offering'} </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Company Phone Number</label>
                            <div class="col-lg-8">
                                <span class=" fs-6">${job.company_number}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Quallification</label>
                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6">${lulusan}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Website</label>
                            <div class="col-lg-8">
                                <span class=" fs-6">${job.company_website}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Experience</label>
                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6">${experience}</span>
                            </div>
                        </div>
                    </div>
                </div>`;

        var template = `<div class="container-fluid" id="kt_content_container">
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

                <div class="card-header">

                    <div class="card-title m-0 d-flex">
                        ${header}
                    </div>
                    <div class="card-toolbar m-0">
                        <h4 class="fw-bolder m-0 text-gray-500">Job ID</h4>
                        <h4 class="ms-3 mt-2">${job.job_code}</h4>
                    </div>
                </div>
                <div class="card-body py-10">

                ${body}

                <div class="desc-section mt-5">
                    <label class="col-lg-4 fw-bold text-muted">Job Description</label>
                    ${job.job_description}
                </div>
                <div class="map-section mt-5">
                    <label class="col-lg-4 fw-bold text-muted">Location</label>
                    <div id="map-job" style="width: 100%; height: 20%;>
                    </div
                </div>
            </div>
            </div>
            <div class="card mb-5 mb-xl-10" id="job_history" style="display: none;">
                @include('listuser.table')
            </div>
            </div>
            </div>
         `;

        $('.detail').append(template);
        $('.verif').html(`<div class="card mb-5 mb-xl-10 card-acc-reject">
        <div class="card-header py-4">
            <div class="card-title">
                <button class="btn btn-light" onclick="toggleTable()" fdprocessedid="73kb3f">Kembali</button>

            </div>
            <div class="card-toolbar">
                <div class="d-flex gap-4">
                    ${button}
                </div>
            </div>
        </div>`)
        initMap(job.job_map_latitude, job.job_map_longitude);
    }

    initMap = (lat, long) => {
        quick.leafletMapShowStatic('map-job', lat, long);
    }

    accJob = (data) => {

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
                    url: '/managejob/rejacc',
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
    rejectJob = () => {
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
                        url: '/managejob/rejacc',
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
</script>
