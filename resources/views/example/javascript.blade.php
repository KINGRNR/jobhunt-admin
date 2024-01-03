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
    var form = 'formExample';
    $(() => {
        quick.blockPage();
        init()
    })
    init = async () => {
        await initializeDataTables();
        quick.unblockPage();
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });


    function initializeDataTables() {
        let table = $('#table-example').DataTable({
            // responsive: true,
            searchable: true,
            destroy: true,
            ajax: {
                url: API_URL + "getexamples",
                type: "GET",
                dataType: "json",
                error: function(xhr, status, error) {
                    if (xhr.status === 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tidak dapat terhubung ke server',
                            text: 'Mohon segera menghubungi developer.',
                            showCancelButton: true, 
                            confirmButtonText: 'Reload',
                            cancelButtonText: 'Lanjut', 
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan saat memuat data',
                            text: 'Status: ' + xhr.status + ' - ' + error,
                            confirmButtonText: 'Lanjut',
                        });
                    }
                }
            },
            columns: [{
                    orderable: false,
                    targets: 0,
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'example_code',
                    name: 'example_code'
                },
                {
                    data: 'example_name',
                    name: 'example_name'
                },
                {
                    data: 'example_active',
                    name: 'example_active',
                    render: function(data, type, row) {
                        var badgeClass = data ? 'badge-success' : 'badge-danger';
                        var badgeText = data ? 'AKTIF' : 'TIDAK AKTIF';
                        return '<span class="badge ' + badgeClass + '">' + badgeText + '</span>';
                    }
                },
            ]
        });

        $('#search_example').on('input', function() {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });

        $('#table-example tbody').on('click', 'tr', function() {
            let rowData = table.row(this).data();
            if (rowData) {
                let id = rowData.example_id;
                onEdit(id);
                $('.actCreate').addClass('d-none');
                $('.actEdit').removeClass('d-none');
                $('#formExample').find(`input, select`).attr('disabled', 'disabled');
            } else {
                onReset();
                $('#formExample').find('input, select').removeAttr('disabled');
                $('.actCreate').removeClass('d-none');
                $('.actEdit').addClass('d-none');
            }
        }).css('cursor', 'pointer');
    }

    onEdit = (id) => {
        quick.blockPage();
        $.ajax({
            url: API_URL + 'getexample/' + id,
            method: 'GET',
            success: (response) => {
                console.log(response.status);
                if (response.status == 'success') {
                    $('#kt_modal_add_example').modal('show');
                    $(`input, select`).removeClass('is-invalid');
                    let data = response.data;
                    console.log(data.example_active);

                    if (data.example_active === 1) {
                        $('#checkedStatus').prop('checked', true).attr('value', '1');
                    } else {
                        $('#checkedStatus').prop('checked', false).attr('value', '1');
                    }
                    $('[name]').each(function() {
                        let fieldName = $(this).attr('name');
                        if (fieldName in data) {
                            let fieldValue = data[fieldName];

                            $(this).val(fieldValue);
                        }
                    });

                } else {
                    Swal.fire({
                        text: "Error Pada System!",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            },
            complete: (response) => {
                quick.unblockPage();
            }
        });
    }
    onDisplayEdit = () => {
        $('#formExample').find('input, select').removeAttr('disabled');
        $('.actEdit').addClass('d-none');
        $('.actCreate').removeClass('d-none');
    }
    onForm = () => {
        onReset();
        $('.actEdit').addClass('d-none');
        $('.actCreate').removeClass('d-none');
        $(`input, select`).removeClass('is-invalid');
    }
    onReset = () => {
        $('#formExample').find('input, select').removeAttr('disabled');
        let form = $('#formExample');
        form.find('input[type="text"], input[type="email"], input[type="number"], input[type="hidden"]').val('');
        form.find('textarea').val('');
        form.find('select').prop('selectedIndex', 0);
        form.find('input[type="checkbox"]').prop('checked', false);
    }

    function generateRandomString() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        const charactersLength = characters.length;
        for (let i = 0; i < 16; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    onSave = () => {
        var validasi = 'true';
        $("#example_name, #example_active, #example_code").addClass('input-required');
        $(".input-required").each(function(i, obj) {
            // Menghapus spasi dari awal dan akhir nilai input
            let inputValue = $(this).val().trim();

            if (inputValue === "") {
                $(this).removeClass("is-valid").addClass("is-invalid");
                validasi = 'false-invalid';
            } else {
                $(this).removeClass("is-invalid");
                $(this).parent().find(".error_code").removeClass("invalid-feedback").text("").show();
            }
        });
        let lastMenuId = localStorage.getItem('menuId');

        var data = {
            "example_id": $('[name="example_id"]').val(),
            "example_code": $('[name="example_code"]').val(),
            "example_name": $('[name="example_name"]').val(),
            "example_active": $('#checkedStatus').is(':checked') ? 1 : 0,
        };


        let exampleId = data.example_id;

        let route = exampleId ? 'updateexample/' + exampleId : 'insertexamples/create';

        if (route === 'insertexamples/create') {
            const randomID = generateRandomString();
            data.example_id = randomID;
            console.log(randomID);
        } else if (route === 'update') {
            var id = exampleId;
        }

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
                        url: API_URL + route,
                        type: "POST",
                        data: JSON.stringify(data),
                        contentType: "application/json", // Set the content type to JSON
                        success: function(response) {
                            var parsedResponse = JSON.parse(response);
                            console.log(parsedResponse);
                            if (parsedResponse.status === "success") {
                                $(`[data-con="${lastMenuId}"]`).trigger(
                                    'click');
                                $('[data-bs-dismiss="modal"]').trigger('click');
                                Swal.fire({
                                    title: parsedResponse.title,
                                    text: parsedResponse.message,
                                    icon: (parsedResponse.success) ? 'success' :
                                        "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Oke!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    },


                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Terjadi Kesalahan Pada Sistem!',
                                    icon: 'error',
                                    confirmButtonText: "Oke!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    },
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $(`[data-con="${lastMenuId}"]`).trigger(
                                            'click');
                                        $('[data-bs-dismiss="modal"]').trigger('click');
                                    }
                                });
                            }
                        },
                        error: function(xhr, status, error) {}
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
    };

    onDelete = (id = '') => {
        let lastMenuId = localStorage.getItem('menuId');

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah kamu ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${API_URL}deleteexample/${id}`,
                    method: 'POST',
                    data: {
                        example_id: $('[name="example_id"]').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var parsedResponse = JSON.parse(response);
                        console.log(parsedResponse);
                        if (parsedResponse.status === "success") {
                            $(`[data-con="${lastMenuId}"]`).trigger(
                                'click');
                            $('[data-bs-dismiss="modal"]').trigger('click');
                            Swal.fire({
                                title: parsedResponse.title,
                                text: parsedResponse.message,
                                icon: (parsedResponse.success) ? 'success' : "error",
                                buttonsStyling: false,
                                confirmButtonText: "Oke!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },


                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi Kesalahan Pada Sistem!',
                                icon: 'error',
                                confirmButtonText: "Oke!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $(`[data-con="${lastMenuId}"]`).trigger(
                                        'click');
                                    $('[data-bs-dismiss="modal"]').trigger('click');
                                }
                            });
                        }
                    },
                });
            }
        });
    };
</script>
