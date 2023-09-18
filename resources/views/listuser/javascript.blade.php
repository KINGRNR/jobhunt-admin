<script src="assets/js/custom/apps/customers/list/export.js"></script>
<script src="assets/js/custom/apps/customers/list/list.js"></script>
<script src="assets/js/custom/apps/customers/add.js"></script>
<script src="{!! asset('assets/js/custom/js.cookie.js') !!}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>
<script type="text/javascript">
    APP_URL = "{{ getenv('APP_URL') }}/";
    var formSuspend = 'formSuspend';
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
        let table = $('#table-user').DataTable({
            searchable: true,
            destroy: true,
            serverSide: true,
            ajax: {
                url: "{{ route('listuser.index') }}",
                type: "GET",
                dataType: "json",
            },
            columns: [{
                "targets": 0,
                "render": function(data, type, row, meta) {
                    return '<span class="ps-3">' + (meta.row + meta.settings._iDisplayStart + 1) + '</span>';
                }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: null,
                    name: 'user_data',
                    render: function(data, type, row) {
                        var emails = data && data.email ? data.email : '-';
                        var photo = data && data.photo_url ? data.photo_profile : APP_URL + 'assets/media/avatars/blank.png';

                        return '<div class=""><img src="' + photo + '" alt="User Photo" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 5px;">' + ' <span>' + emails + '</span></div>';
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        var date = new Date(data);

                        var formattedDate = date.toLocaleString('en-US', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                        });

                        return formattedDate;
                    }
                },
                {
                    data: 'users_fullname',
                    name: 'users_fullname'
                },
            ]

        });
        $('#search_example').on('input', function() {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });

        $('#table-user tbody').on('click', 'tr', function() {
            let rowData = table.row(this).data();
            if (rowData) {
                let id = rowData.id;
                Swal.fire({
                    title: 'Action',
                    showCancelButton: true,
                    showDenyButton: true,
                    confirmButtonText: 'Details',
                    denyButtonText: `Suspend`,
                    customClass: {
                        popup: 'custom-swal-popup',
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        onDetail(id);
                        onDetailJob(id);
                    } else if (result.isDenied) {
                        toggleModalBanned(id);
                    }
                })
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
    toggleModalBanned = (id) => {
        $.ajax({
            url: APP_URL + 'listuser/show',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: (response) => {
                const data = response.data;
                $(`#selected_user`).val(data.users_fullname).attr('readonly' , 'readonly');
                $('#suspendModal').modal('show');
                $("#kt_daterangepicker_1").daterangepicker({
                    timePicker: true,
                    startDate: moment().startOf("hour"),
                    endDate: moment().startOf("hour").add(32, "hour"),
                    locale: {
                        format: "M/DD hh:mm A"
                    }
                });
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

    onSaveSuspend = () => {
        console.log('hai')
        var data = $('[name="' + formSuspend + '"]')[0];
        var formData = new FormData(data);
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
                        url: APP_URL + 'listuser/savesuspend',
                        type: "POST",
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
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "An error occurred. Please try again later.",
                                showConfirmButton: true,
                            }).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            });
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

                const completenessPercentage = calculateCompleteness(data);

                $('#completeness').text(completenessPercentage +"%");
                $('.progress-bar-completeness').attr('aria-valuenow', completenessPercentage).css('width', completenessPercentage +'%');

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
     function calculateCompleteness(data) {
        let completeness = 0;

        if (data.name) completeness += 10;
        if (data.users_fullname) completeness += 10;
        if (data.email) completeness += 10;
        if (data.created_at) completeness += 10;
        if (data.id) completeness += 10;
        if (data.users_gender !== undefined) completeness += 10;
        if (data.users_lulusan) completeness += 10;
        if (data.users_kota) completeness += 10;
        if (data.users_portofolio_link) completeness += 10;
        if (data.users_posisi_kerja) completeness += 10;
        if (data.users_skills) completeness += 10;
        if (data.users_resume_link) completeness += 10;
        if (data.photo_profile) completeness += 10;

        completeness = Math.min(completeness, 100);
    console.log(completeness)
        return completeness;
    }

    // onDetailJob = (id) => {
    //     blockPage();
    //     $.ajax({
    //         url: APP_URL + 'listuser/detailJob',
    //         method: 'POST',
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             id: id
    //         },
    //         success: (response) => {
    //             const data = response.data;
    //             console.log(data);
    //             // Clear existing rows in the table body

    //             $('#table-user tbody').empty();

    //             // Loop through the data and create rows
    //             for (let i = 0; i < data.length; i++) {
    //                 const item = data[i];
    //                 const newRow = $('<tr>');
    //                 newRow.append($('<td>').text(i + 1));
    //                 newRow.append($('<td>').text("km nanya?"));
    //                 newRow.append($('<td>').text(item.job_name));
    //                 newRow.append($('<td>').text(item.company_name));
    //                 let badgeText = '';
    //                 if (item.job_type === '1') {
    //                     badgeText = 'Full Time';
    //                     badgeColorClass = 'badge-success'; // Green color
    //                 } else if (item.job_type === '2') {
    //                     badgeText = 'Part Time';
    //                     badgeColorClass = 'badge-warning'; // Yellow color
    //                 } else if (item.job_type === '3') {
    //                     badgeText = 'Intern';
    //                     badgeColorClass = 'badge-info'; // Blue color
    //                 }
    //                 const badge = $('<span>').addClass('badge ' + badgeColorClass).text(badgeText);

    //                 newRow.append($('<td>').append(badge)); // Add the badge to the table cell


    //                 // ... Add other columns ...

    //                 $('#table-user tbody').append(newRow);
    //             }


    //         },
    //     });
    // }
    onDetailJob = (id) => {
        blockPage();
        $.ajax({
            url: APP_URL + 'listuser/detailJob',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: (response) => {
                // const data = response.data;
                console.log(response);
                if (response.data.length === 0) {
                    $("#card_table").addClass('d-none');
                    $("#callback").html('<div class="d-flex align-items-center justify-content-center" style="height: 100%;"><img src="storage/data/nodata.png" alt="Error" class="img-fluid" style="max-width: 100%; max-height: 100%; object-fit: contain;" /></div>');
                // Initialize DataTable
            } else {
                $("#card_table").removeClass('d-none');

                let table = $('#table-user_detail').DataTable({
                    destroy: true, // Destroy existing DataTable instance
                    data: response.data,
                    columns: [{
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1
                        },
                        {
                            data: null,
                            render: () =>
                                '<img src="" alt="f" width="50">'
                        },
                        {
                            data: 'job_name',
                            name: 'job_name'
                        },
                        {
                            data: 'company_name',
                            name: 'company_name'
                        },
                        {
                            data: 'job_type',
                            render: (data) => {
                                let badgeText = '';
                                let badgeColorClass = '';
                                if (data === '1') {
                                    badgeText = 'Full Time';
                                    badgeColorClass = 'badge-success';
                                } else if (data === '2') {
                                    badgeText = 'Part Time';
                                    badgeColorClass = 'badge-warning';
                                } else if (data === '3') {
                                    badgeText = 'Intern';
                                    badgeColorClass = 'badge-info';
                                }
                                return `<span class="badge ${badgeColorClass}">${badgeText}</span>`;
                            }
                        }
                    ]
                });
            }
                // Unblock the page
                unblockPage();
            }
        });
    }
</script>
