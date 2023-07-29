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
        await showConfig('app', true);
        await unblockPage(500);
    }
    showConfig = (group = '', init = false) => {
        var group = (init) ? group : $(group).data('group');

        $(`.tabConfig`).removeClass('active');
        $(`[data-group="${group}"]`).addClass('active');

        return new Promise((resolve) => {
            blockPage();
            $.ajax({
                url: APP_URL + 'config/getConfig',
                data: {
                    group: group
                },
                type: "POST",
                success: (response) => {
                    resolve(true)
                    var html = [];
                    $.each(response.data.config, (i, v) => {
                        html.push(createTemplates(v));
                    });
                    $('#contentConfig').html('').html(html.join(''));
                },
                complete: (response) => {
                    // $.each(response.data.config, (i, v) => {
                    //     if (v.config_type == 'file') {
                    //         uploadFileOnChange(v.config_id);
                    //         // set logo
                    //         if (v.config_code == 'app.logo') {
                    //             $('#logoApp').attr('src',
                    //                 '/files/uploads-logos-origins-' +
                    //                 v.config_value);
                    //         }
                    //     }
                    //     $(`[id="${v.config_code}"]`).text(v.config_value);
                    // });

                    // $('#dataConfiguration').removeClass('d-none');
                    unblockPage(500);
                }
            })
        });
    }
    createTemplates = (value) => {

        switch (value.config_type) {
            case 'text':
                return createTypeText(value);
                break;
            case 'file':
                return createTypeFile(value);
                break;
            case 'textarea':
                return createTypeTextarea(value);
                break;
            case 'password':
                return createTypePassword(value);
                break;
            default:
                return '';
                break;
        }
    }

    createTypeText = (value) => {
        return `
        <div class="row">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">${value.config_title}</label>
                     <input type="text" name="${value.config_id}" class="form-control" placeholder="${value.config_title}" value="${value.config_value}">
                      <div class="fv-plugins-message-container invalid-feedback"></div></div>
		`;
    }
    createTypeTextarea = (value, withysiwyg = false) => {
        if (!withysiwyg) {
            return `
            <div class="row">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">${value.config_title}</label>
                     <input type="text" name="${value.config_id}" class="form-control" placeholder="${value.config_title}" value="${value.config_value}">
                      <div class="fv-plugins-message-container invalid-feedback"></div></div>
			`;
        }
    }
    save  = () => {
        var formData = $("#configForm").serialize();

        $.ajax({
            url: APP_URL + 'config/save',
            type: "POST",
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Data saved successfully!",
                    showConfirmButton: true,
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "An error occurred. Please try again later.",
                    showConfirmButton: true            
                });
            }
        });
    }
</script>
