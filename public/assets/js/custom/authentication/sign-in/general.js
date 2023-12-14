"use strict";

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function(e) {
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'user_username': {
                        validators: {
                            notEmpty: {
                                message: 'Username address is required'
                            }
                        }
                    },
                    'user_password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // ajax request
                    $.ajax({
                        url: $('#kt_sign_in_form').attr('action'),
                        data:  $('#kt_sign_in_form').serialize(),
                        type: "POST",
                        success: (response) => {
                            // if (response.status == 'Success') {
                            //     // Hide loading indication
                            //     submitButton.removeAttribute('data-kt-indicator');
                            //     // Enable button
                            //     submitButton.disabled = false;

                            //     $('[name="username"]').val("");
                            //     $('[name="password"]').val("");

                            //     // redirect to main
                            //     //window.location.href = APP_URL + response.redirectTo;
                            location.reload();
                            // }else{
                            //     Swal.fire({
                            //         text: response.message,
                            //         icon: "error",
                            //         buttonsStyling: false,
                            //         confirmButtonText: "Ok, got it!",
                            //         customClass: {
                            //             confirmButton: "btn btn-primary"
                            //         }
                            //     }).then((result)=>{
                            //         location.reload();
                            //     });
                            // }
                        }
                    });

                } else {
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    // Hide loading indication
                    submitButton.removeAttribute('data-kt-indicator');
                    // Enable button
                    submitButton.disabled = false;
                }
            });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
