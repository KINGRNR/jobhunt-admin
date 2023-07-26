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
    var form = 'formExample';
    $(() => {
        init()

    })
    init = async () => {
        await unblockPage(500);
    }
    $('#modal_form').on('hidden.bs.modal', function() {
        $(`input, select`).removeAttr('disabled');
    });

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
    toogleTable = () => {
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
                console.log(response.data);
                const data = response.data;
                //proses format men format data ya ges ya
                const createdAt = data.created_at;
                const formattedDate = moment(createdAt).format('MMMM Do YYYY, h:mm:ss a');
                const numericId = data.id;
                const formattedId = String(numericId).padStart(4, '0');
                const gender = data.gender === 1 ? 'Woman' : 'Man';
                toggleDetail();

                //proses add data ini
                $(`#username`).text(data.name);
                $(`#fullname`).text(data.fullname);
                $(`#email`).text(data.email);
                $(`#join_date`).text(formattedDate);
                $('#id_user').text(formattedId);
                $('#gender').text(gender);
                $('#lulusan').text(data.lulusan);
                $('#kota').text(data.kota);
                $('#link_porto').text(data.portofolio_link);
                $('#pekerjaan_sekarang').text(data.posisi_kerja);
                $('#skills').text(data.skills);
                $('#negara').text("KAMU NANYA HAH?");
                $('#link_resume').text(data.resume_link);
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
