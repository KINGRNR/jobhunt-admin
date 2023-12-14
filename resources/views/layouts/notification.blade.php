<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
    <!--begin::Heading-->
    <div class="d-flex flex-column bgi-no-repeat rounded-top"
        style="background-image:url('assets/media/misc/pattern-1.jpg')">
        <!--begin::Title-->
        <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifikasi
            <span class="fs-8 opacity-75 ps-3">10 notifikasi baru</span>
        </h3>
        <!--end::Title-->
        <!--begin::Tabs-->
        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab"
                    href="#kt_topbar_notifications_1" aria-selected="true" role="tab">Notifikasi Baru</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 " data-bs-toggle="tab"
                    href="#kt_topbar_notifications_2" aria-selected="false" tabindex="-1" role="tab">Telah
                    Dibaca</a>
            </li>
        </ul>
        <!--end::Tabs-->
    </div>
    <!--end::Heading-->
    <!--begin::Tab content-->
    <div class="tab-content">
        <!--begin::Tab panel-->
        <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
            <div class="scroll-y mh-325px px-8">
                <a href="javascript:void(0);" onclick="onRead(null, 'FOV4Qtgi5lcQ9kCY')"
                    class="btn btn-outline btn-outline-default mt-5 mb-2 w-100">Tandai
                    semua telah dibaca</a>
            </div>
            <!--begin::Items-->
            <div class="scroll-y mh-325px my-5 px-8 unread overflow-auto">
            </div>
            <!--end::Items-->
            <!--begin::View more-->
            <div class="py-3 text-center border-top">
                <a href="../../demo17/dist/pages/profile/activity.html"
                    class="btn btn-color-gray-600 btn-active-color-primary">Lihat
                    Semua
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                    <span class="svg-icon svg-icon-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                transform="rotate(-180 18 13)" fill="black">
                            </rect>
                            <path
                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </div>
            <!--end::View more-->
        </div>
        <div class="tab-pane fade " id="kt_topbar_notifications_2" role="tabpanel">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column px-9 readed overflow-auto">
                <!--end::Illustration-->
            </div>
            <!--end::Wrapper-->
        </div>
    </div>
    <!--end::Tab content-->
</div>

<script>
    $(() => {
        showNotif()
        // initFirebaseMessagingRegistration();
    })

    // showNotif = () => {
    //     $.ajax({
    //         url: "{{ route('notification.index') }}",
    //         // type: 'POST',
    //         // data: {
    //         //     _token: '{{ csrf_token() }}',
    //         //     id: id
    //         // },
    //         dataType: 'json',
    //         success: function(response) {
    //             $('.timeline').empty()
    //             $('#badge_notif').addClass('d-none');
    //             let unread = 0;

    //             response.data.forEach((item) => {
    //                 if (item.notification_read == 0) {
    //                     unread++;
    //                 }
    //             });

    //             if (unread != 0) {
    //                 $('#badge_notif').removeClass('d-none').text(unread);
    //             }
    //             $.each(response.data, (i, v) => {
    //                 let timestamp = new Date(v.notification_created_at);
    //                 let hour = timestamp.getHours();
    //                 let minute = timestamp.getMinutes();
    //                 html = `<div class="timeline-item">
    //                 <!--begin::Timeline line-->
    //                 <div class="timeline-line w-40px"></div>
    //                 <!--end::Timeline line-->
    //                 <!--begin::Timeline icon-->
    //                 <div class="timeline-icon symbol symbol-circle symbol-40px">
    //                     <div class="symbol-label bg-light">
    //                         ${
    //     v.notification_jenis == 1
    //         ? `                            <span class="svg-icon svg-icon-2 svg-icon-gray-500">
    //                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
    //                                 viewBox="0 0 24 24" fill="none">
    //                                 <path opacity="0.3"
    //                                     d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
    //                                     fill="black" />
    //                                 <path
    //                                     d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
    //                                     fill="black" />
    //                             </svg>
    //                         </span>`
    //         : v.notification_jenis == 2
    //         ? `										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
    // 										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    // 											<path d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z" fill="black"></path>
    // 											<path opacity="0.3" d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z" fill="black"></path>
    // 										</svg>
    // 									</span>`
    //         : ''
    // }
    //                     </div>
    //                 </div>
    //                 <!--end::Timeline icon-->
    //                 <!--begin::Timeline content-->
    //                 <div class="timeline-content mb-10 border rounded" style="border-color: #ced4da; padding: 10px;">
    //     <!--begin::Timeline heading-->
    //     <div class="overflow-auto pe-3">
    //         <!--begin::Title-->
    //         ${
    //     v.notification_jenis == 1
    //         ? `<div class="fs-5 fw-bold badge badge-light-warning">${v.notification_title}</div>`
    //         : v.notification_jenis == 2
    //         ? `<div class="fs-5 fw-bold badge badge-light">${v.notification_title}</div>`
    //         : ''
    // }
    //         <div class="fs-5 mb-2">${v.notification_message}</div>
    //         <!--end::Title-->
    //         <!--begin::Description-->
    //         <div class="d-flex align-items-center mt-1 fs-6">
    //             <!--begin::Info-->
    //             <div class="text-muted me-2 fs-7">Sent at ${hour}:${minute} by </div><span class="text-bold">${v.notification_by}</span>
    //             <!--end::Info-->
    //             <!--begin::User-->
    //         </div>
    //         ${v.notification_read == 0 ? '<button class="btn btn-light btn-sm" data-id="' + v.notification_id + '" onclick="onRead(this)">Read</button> <span class="ms-2 badge badge-light-danger fw-bolder">Belum di Baca</span>' : '<span class=" badge badge-light-success fw-bolder">Sudah di Baca</span>'}

    //         <!--end::Description-->
    //     </div>
    //     <!--end::Timeline heading-->
    // </div>
    //                 <!--end::Timeline content-->
    //             </div>`;
    //                 $('.timeline').append(html);
    //             })

    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    // }
    showNotif = () => {
        $.ajax({
            url: "{{ route('notification.index') }}",
            // type: 'POST',
            // data: {
            //     _token: '{{ csrf_token() }}',
            //     id: id
            // },
            dataType: 'json',
            success: function(response) {
                $('.unread, .readed').empty();
                $('#badge_notif').addClass('d-none');
                let unread = 0;

                // response.data.forEach((item) => {
                //     if (item.notification_read == 0) {
                //         unread++;
                //     }
                // });

                // if (unread != 0) {
                //     $('#badge_notif').removeClass('d-none').text(unread);
                // }

                $.each(response.data.unread, (i, v) => {
                    // let timestamp = new Date(v.notification_created_at);
                    // console.log(v)
                    // let hour = timestamp.getHours();
                    // let minute = timestamp.getMinutes();
                    unread = `<div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Title-->
                            <div class="mb-0 me-2">
                                <a href="javascript:void(0);" onclick="showDetail('${v.notification_id}')" class="fs-6 text-gray-800 text-hover-primary fw-bolder">${v.notification_title}</a>
                                <div class="text-gray-400 fs-7">${v.notification_message}</div>
                            </div>
                            <!--end::Title-->
                        </div>
                    </div>`;
                    $('.unread').append(unread);
                })
                if (response.data.read) {
                    $.each(response.data.read, (i, v) => {
                        read = `
            <div class="d-flex flex-stack py-4">
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Title-->
                    <div class="mb-0 me-2">
                        <a href="javascript:void(0);" onclick="showDetail('${v.notification_id}')" class="fs-6 text-gray-800 text-hover-primary fw-bolder">${v.notification_title}</a>
                        <div class="text-gray-400 fs-7">${v.notification_message}</div>
                    </div>
                    <!--end::Title-->
                </div>
            </div>
        `;
                        $('.readed').append(read);
                    });
                } else {
                    kucing = `<span>andwoawniodn</span>`;
                    $('.readed').append(kucing);
                }

            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    onRead = (id, role) => {
        // var notification = $(id).attr('data-id');
        $.ajax({
            url: '/notification/read',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                role: role
            },
            dataType: 'json',
            success: function(response) {
                $('.unread, .readed').empty();
                showNotif();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function showDetail(v) {
        $.ajax({
            url: "{{ route('notification.index') }}",
            success: (response) => {
                console.log(v)

                $('#modal_notif').modal('show');
                const matchingDataUnread = response.data.unread.find(item => item.notification_id == v);
                const matchingDataRead = response.data.read.find(item => item.notification_id == v);
                console.log(matchingDataUnread)

                if (matchingDataUnread) {
                    $('.read-btn').remove();
                    $('.modal-title').text(matchingDataUnread.notification_title);
                    if (matchingDataUnread.notification_title) {
                        $('#nama_pengirim_notif').text('Dari: ' + matchingDataUnread.notification_by +
                            ' • ' +
                            moment(matchingDataUnread.notification_created_at).format(
                                "DD MMM YYYY HH:mm")
                        );
                    } else {
                        $('#nama_pengirim_notif').text(moment(matchingDataUnread.notification_created_at)
                            .format(
                                "DD MMM YYYY HH:mm"));
                    }

                    $('#tanggal_notif').text('Tanggal: ' + matchingDataUnread.notification_created_at);
                    $('#deskripsi_notif').text(matchingDataUnread.notification_message);
                    onRead(matchingDataUnread.notification_id);
                } else {
                    $('.modal-title').text(matchingDataRead.notification_title);
                    if (matchingDataRead.notification_title) {
                        $('#nama_pengirim_notif').text('Dari: ' + matchingDataRead.notification_by +
                            ' • ' +
                            moment(matchingDataRead.notification_created_at).format("DD MMM YYYY HH:mm")
                        );
                    } else {
                        $('#nama_pengirim_notif').text(moment(matchingDataRead.notification_created_at)
                            .format(
                                "DD MMM YYYY HH:mm"));
                    }
                    $('#tanggal_notif').text('Tanggal: ' + matchingDataRead.notification_created_at);
                    $('#deskripsi_notif').text(matchingDataRead.notification_message);
                    $('.read-btn').remove();

                }
            }
        });
    }

    var firebaseConfig = {
        apiKey: "AIzaSyDjvY68HJ_BjHDhOrq9UywsD5ANlvZhYkQ",
        authDomain: "job-hunt-391903.firebaseapp.com",
        projectId: "job-hunt-391903",
        storageBucket: "job-hunt-391903.appspot.com",
        messagingSenderId: "383683688519",
        appId: "1:383683688519:web:5170d7590c74f231865962",
        measurementId: "G-ML8YNH37W5"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('save-token') }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        alert('Token saved successfully.');
                    },
                    error: function(err) {
                        console.log('User Chat Token Error' + err);
                        console.log(token);

                    },
                });

            }).catch(function(err) {
                console.log('User Chat Tokeno Error' + err);
            });
    }

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
</script>
