<script type="text/javascript">
    $(() => {
        init()

    })
    init = async () => {
        initializeDataTables();
        unblockPage();
    }

    // function initializeDataTables() {
    //     $('#table-example').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         clickAble: true,
    //         searchAble: true,
    //         destroyAble: true,
    //         ajax: {
    //             url: "{{ route('example.index') }}",
    //             type: "GET",
    //             dataType: "json",

    //         },
    //         // ajax: APP_URL + 'example/index',

    //         columns: [{
    //                 data: 'example_code',
    //                 name: 'example_code'
    //             },
    //             {
    //                 data: 'example_name',
    //                 name: 'example_name'
    //             },
    //             {
    //                 data: 'example_active',
    //                 name: 'example_active',
    //                 render: function(data, type, row) {
    //                     var badgeClass = data ? 'badge-success' : 'badge-danger';
    //                     var badgeText = data ? 'AKTIF' : 'TIDAK AKTIF';
    //                     return '<span class="badge ' + badgeClass + '">' + badgeText + '</span>';
    //                 }
    //             }, {

    //                 data: 'action',
    //                 name: 'action',
    //                 orderable: false,
    //                 searchable: false
    //             },

    //             // Add more columns if needed
    //         ]

    //     });
    //     // Event delegation for row click
    //     $('#table-example tbody').on('click', 'tr', function() {
    //         var rowData = table.row(this).data();
    //         if (rowData) {
    //             var exampleId = rowData.id; // Assuming the ID is stored in the 'id' property
    //             // Perform actions with the clicked row data
    //             console.log("Clicked Example ID: " + exampleId);
    //             // Redirect to detail page or display detail in a dialog, etc.
    //         }
    //     });

    // }
    function initializeDataTables() {
        var table = $('#table-example').DataTable({
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: "{{ route('example.index') }}",
                type: "GET",
                dataType: "json",
            },
            columns: [{
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
                $(`input, select`).attr('disabled', 'disabled');
            } else {
                onReset();
                $(`input, select`).attr('enable', 'enable');
                $('.actCreate').removeClass('d-none');
                $('.actEdit').addClass('d-none');
            }
        }).css('cursor', 'pointer');
    }

    onEdit = (id) => {
        blockPage();
        $.ajax({
            url: APP_URL + 'example/show',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                example_id: id
            },
            success: (response) => {
                // console.log(response);
                if (response.status == 'Success') {
                    $('#kt_modal_add_example').modal('show');

                    let data = response.data;

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
                unblockPage(500);
            }
        });
    }
    onDisplayEdit = () => {
        $(`input, select`).removeAttr('disabled', 'disabled');
        $('.actEdit').addClass('d-none');
        $('.actCreate').removeClass('d-none');
    }
    onReset = () => {
        let form = ".form_example";
        $(form).find('input[type="radio"]').prop('checked', false);
        $(form).find('input[type="checkbox"]').prop('checked', false);
        $(form).find('textarea, input:not([type="checkbox"]), select').val("");

        if (typeof editor !== 'undefined') {
            Object.keys(editor).forEach(function(key) {
                editor[key].value = '';
            });
        }
    }

    onSave = () => {
        // Get the form data
        let formData = $('#formExample').serialize();
        let data = {};
        let lastMenuId = localStorage.getItem('lastMenuId');

        let pairs = formData.split('&');
        for (let i = 0; i < pairs.length; i++) {
            let pair = pairs[i].split('=');
            let key = decodeURIComponent(pair[0]);
            let value = decodeURIComponent(pair[1]);
            data[key] = value;
        }

        let exampleId = $('[name="example_id"]').val();

        let route = exampleId ? 'update' : 'create';

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
                    url: APP_URL + 'example/' + route,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data
                    },
                    success: function(response) {
                        Swal.fire({
                            text: 'Data saved successfully!',
                            icon: 'success',
                            buttonsStyling: false,
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                        })
                        $(`[data-con="${lastMenuId}"]`).trigger('click');
                        $('.modal-backdrop').remove();
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            text: 'Error saving data!',
                            icon: 'error',
                            buttonsStyling: false,
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            }
                        });
                    }
                });
            }
        });
    };
    onDelete = (id) => {
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
                        url: APP_URL + 'example/delete',
                        method: 'POST',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                text: 'Data berhasil dihapus!',
                                icon: 'success',
                                buttonsStyling: false,
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                }
                            })
                            $(`[data-con="${lastMenuId}"]`).trigger('click');
                            $('.modal-backdrop').remove();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                text: 'Error menghapus data!',
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                }
                            });
                        }
                    });
                }
            });
        }

    
</script>










<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/js/custom/apps/customers/list/export.js"></script>
<script src="assets/js/custom/apps/customers/list/list.js"></script>
<script src="assets/js/custom/apps/customers/add.js"></script>
<script src="{!! asset('assets/js/custom/js.cookie.js') !!}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>
