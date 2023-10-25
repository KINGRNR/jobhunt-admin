<script src="assets/js/quickact.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script type="text/javascript">
    APP_URL = "{{ getenv('APP_URL') }}/";
    var form = 'formExample';
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


    function initializeDataTables() {
        let table = $('#table-job').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: "{{ route('managejob.index') }}",
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

                        var badgeHTML = '<span class="badge ' + badgeColor + ' fw-bolder">' + badgeText +
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


    toggleDetail = () => {
        $(`[data-group="detail"]`).addClass('active');
        $(`[data-group="job"]`).removeClass('active');
        $('.table-user-ini').fadeOut();
        $('.detail').fadeIn();
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
        $('.table-user-ini').fadeIn();
        $('.detail').fadeOut();
    }

    onDetail = (id) => {
        blockPage();
        $.ajax({
            url: APP_URL + 'listuser/show',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: (response) => {
                console.log(response);
                const data = response.data;
                //proses format men format data ya ges ya
                const createdAt = data.created_at;
                const formattedDate = moment(createdAt).format('MMMM Do YYYY, h:mm:ss a');
                const numericId = data.id;
                const formattedId = String(numericId).padStart(4, '0');
                const gender = data.users_gender === 1 ? 'Woman' : 'Man';
                toggleDetail();

                //proses add data ini
                $(`#username`).text(data.name);
                $(`#fullname`).text(data.users_fullname);
                $(`#email`).text(data.email);
                $(`#join_date`).text(formattedDate);
                $('#id_user').text(formattedId);
                $('#gender').text(gender);
                $('#lulusan').text(data.users_lulusan);
                $('#kota').text(data.users_kota);
                $('#link_porto').text(data.users_portofolio_link);
                $('#pekerjaan_sekarang').text(data.users_posisi_kerja);
                $('#skills').text(data.users_skills);
                $('#negara').text("KAMU NANYA HAH?");
                $('#link_resume').text(data.users_resume_link);
                $('#profile_image').attr('src', data.photo_profile);
                const profileImageSrc = data.photo_profile ? data.photo_profile :
                    'assets/media/avatars/blank.png';
                $('#profile_image').attr('src', profileImageSrc);

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
</script>
