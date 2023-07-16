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
            processing: true,
            serverSide: true,
            clickable: true,
            searchAble: true,
            searching: true,
            destroyAble: true,
            ajax: {
                url: "{{ route('listuser.index') }}",
                type: "GET",
                dataType: "json",
            },
            columns: [{
                    "targets": 0,
                    "render": function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                }, {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role_name',
                    name: 'role_name',
                    render: function(data, type, row) {
                        var badgeClass = data === 'admin' ? 'badge-success' : 'badge-danger';
                        var badgeText = data === 'admin' ? 'Admin' : 'User';
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

    // onEdit = (id) => {
    //     blockPage();
    //     $.ajax({
    //         url: APP_URL + 'example/show',
    //         method: 'POST',
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             example_id: id
    //         },
    //         success: (response) => {
    //             // console.log(response);
    //             if (response.status == 'Success') {
    //                 $('#kt_modal_add_example').modal('show');
    //                 let data = response.data;
    //                 console.log(data.example_active);

    //                 if (data.example_active === 1) {
    //                     $('#checkedStatus').prop('checked', true).attr('value', '1');
    //                 } else {
    //                     $('#checkedStatus').prop('checked', false).attr('value', '1');
    //                 }
    //                 $('[name]').each(function() {
    //                     let fieldName = $(this).attr('name');
    //                     if (fieldName in data) {
    //                         let fieldValue = data[fieldName];

    //                         $(this).val(fieldValue);
    //                     }
    //                 });

    //             } else {
    //                 Swal.fire({
    //                     text: "Error Pada System!",
    //                     icon: "error",
    //                     buttonsStyling: false,
    //                     confirmButtonText: "Ok, got it!",
    //                     customClass: {
    //                         confirmButton: "btn btn-primary"
    //                     }
    //                 });
    //             }
    //         },
    //         complete: (response) => {
    //             unblockPage(500);
    //         }
    //     });
    // }
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
