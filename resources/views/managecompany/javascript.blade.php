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
<script type="text/javascript">
    var form = 'formExample';
    $(() => {
        init()
    })
    init = async () => {
        await initializeDataTables();
        await unblockPage();
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });

    function initializeDataTables() {
        let table = $('#table-company').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: "{{ route('managecompany.index') }}",
                type: "GET",
                dataType: "json",
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

                        var badgeHTML = '<span class="badge ' + badgeColor + ' fw-bolder">' + badgeText +
                            '</span>';
                        return badgeHTML;
                    }
                },
                {
                    data: 'company_id',
                    render: function(data, type, row) {
                        var id = row.id; // Ambil ID dari data atau sumber lain sesuai kebutuhan
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
            table.search(searchValue).draw();
        });

        $('#table-user tbody').on('click', 'tr', function() {
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

    toggleDetail = () => {
        loadchartatas()
        $(`[data-group="detail"]`).addClass('active');
        $(`[data-group="job"]`).removeClass('active');
        $('.table-user-ini').fadeOut();
        $('.detail').fadeIn();
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
        $('.table-user-ini').fadeIn();
        $('.detail').fadeOut();
    }
    toggleMenu = (id) => {
        console.log(id);
        Swal.fire({
            title: 'Action',
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: 'Details',
            customClass: {
                popup: 'custom-swal-popup',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                onDetail(id);
            }
        })
    }
    onDetail = (id) => {
        blockPage();
        $.ajax({
            url: APP_URL + 'managecompany/show',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: (response) => {
                var data = response.data
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
                toggleDetail();
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
                                <span class=" fs-6">${data.created_at}</span>
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
                $('#header_detail_comp').empty().append(headerDetail);
                $('#body_detail_comp').empty().append(bodyDetail);
            },
            complete: (response) => {
                unblockPage(500);
            }
        });
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
                categories: ["january","February","March","April","May","June","July","August"
                ]
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
