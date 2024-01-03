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
    var form = 'form_config';
    $(() => {
        init()

    })
    init = async () => {
        await showConfig('app', true);
        quick.unblockPage()
    }
    showConfig = (group = '', init = false) => {
        var group = (init) ? group : $(group).data('group');

        $(`.tabConfig`).removeClass('active');
        $(`[data-group="${group}"]`).addClass('active');

        return new Promise((resolve) => {
            quick.blockPage();
            var csrf = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: APP_URL + 'config/getConfig',
                data: {
                    group: group
                },
                type: "POST",
                success: (response) => {
                    resolve(true);
                    console.log(response.config);
                    $.each(response.config, (i, v) => {
                        $(`[id="${v.config_code}"]`).text(v.config_value);
                    });
                    var html = [];
                    $.each(response.config, (i, v) => {

                    });
                    $('#contentConfig').html('').html(html.join(''));

                },
                complete: (response) => {
                    quick.unblockPage();
                }
            });
        });
    }

    createTypeText = (value) => {
        return `
        <div class="row">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">${value.config_title}</label>
                     <input type="${value.config_type}" name="${value.config_id}" id="${value.config_id}" class="form-control input-required" placeholder="${value.config_title}" value="${value.config_value}">
                      <div class="fv-plugins-message-container invalid-feedback"></div></div>
		`;
    }
    // createTypeTextarea = (value, withysiwyg = false) => {
    //     if (!withysiwyg) {
    //         return `
    //         <div class="row">
    //                  <label class="col-lg-4 col-form-label required fw-bold fs-6">${value.config_title}</label>
    //                  <input type="text" name="${value.config_id}" id="${value.config_id}" class="form-control input-required" placeholder="${value.config_title}" value="${value.config_value}">
    //                   <div class="fv-plugins-message-container invalid-feedback"></div></div>
	// 		`;
    //     }
    // }
    // createTypeFile = (value, isImage = true) => {
    //     if (isImage) {
    //         let img = 'storage/profile/' + value.config_value;
    //         let html = `
	// 			<div class="row mb-6">
	// 				<label class="col-lg-3 col-form-label fw-bold fs-6">${value.config_title}</label>
	// 				<div class="col-lg-9">

	// 					<div class="image-input image-input-circle dataFile${value.config_id}" id="${value.config_id}" data-kt-image-input="true" style="background-image: url(${img})">
	// 				    <div class="image-input-wrapper w-125px h-125px dataFile${value.config_id}" style="background-image: url(${img})"></div>

	// 				    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
	// 				        data-kt-image-input-action="change"
	// 				        data-bs-toggle="tooltip"
	// 				        data-bs-dismiss="click"
	// 				        title="Change File">
	// 				         <i class="bi bi-pencil-fill fs-7"></i>

	// 				         <input type="file" name="${value.config_id}" accept=".png, .jpg, .jpeg, .svg" />
	// 				         <input type="hidden" name="hide_${value.config_id}" />
	// 				    </label>

	// 				    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow d-none"
	// 				    	data-action-remove="${value.config_id}"
	// 				        data-kt-image-input-action="remove"
	// 				        data-bs-toggle="tooltip"
	// 				        data-bs-dismiss="click"
	// 				        title="Remove File">
	// 				         <i class="bi bi-x fs-2 text-danger"></i>
	// 				    </span>
	// 				</div>
	// 				</div>
	// 			</div>
	// 		`;
    //         return html;
    //     }

    // }



    save = () => {
        var validasi = 'true';
        $(".input-required").each(function(i, obj) {
            let inputValue = $(this).val().trim();

            // if (inputValue === "") {
            //     $(this).removeClass("is-valid").addClass("is-invalid");
            //     validasi = 'false-invalid';
            // } else {
            //     $(this).removeClass("is-invalid");
            //     $(this).parent().find(".error_code").removeClass("invalid-feedback").text("").show();
            // }
        });
        var data = $('[name="' + form + '"]')[0];
        var formData = new FormData(data);
        // if (validasi === 'true') {
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
                        url: APP_URL + 'config/save',
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
        // } else if (validasi === 'false-invalid') {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Oops...',
        //         text: 'Lengkapi Form Terlebih Dahulu!',
        //         confirmButtonClass: 'swal2-confirm btn btn-primary',
        //     });
        // }
    }
    toggleAdmin = () => {
        $('#configAdmin').fadeIn();
        $('#configUser').fadeOut();
        $('#configCompany').fadeOut();          
        $('.toglcompany').removeClass('active');
        $('.togluser').removeClass('active');
        $('.togladmin').addClass('active');
    }
    toggleUser = () => {
        $('#configAdmin').fadeOut();
        $('#configCompany').fadeOut();
        $('.toglcompany').removeClass('active');
        $('.togluser').addClass('active');
        $('.togladmin').removeClass('active');
        $('#configUser').fadeIn();
    }
    toggleCompany = () => {
        $('#configAdmin').fadeOut();
        $('#configUser').fadeOut();
        $('#configCompany').fadeIn();
        $('.toglcompany').addClass('active');
        $('.togluser').removeClass('active');
        $('.togladmin').removeClass('active');


    }
</script>
