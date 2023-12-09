<div class="detail" style="display: none;">
    <div class="container-fluid" id="kt_content_container">

        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <div class="loading-overlay d-none"
                style="position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;">
                <div class="loader"
                    style=" border: 5px solid #f3f3f3;
                border-top: 5px solid #3498db;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                animation: spin 2s linear infinite; @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
                }">
                </div>
            </div>
            <div class="card-header" id="header_detail_comp">

                {{-- <div class="card-title m-0 d-flex">

                    <div class="d-flex flex-column mt-2">
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">PT Neraca Abadi</span>
                            <span class="badge badge-light-warning fw-bolder ms-2 fs-8 py-1 px-3">Request</span>
                        </div>
                        <div class="d-flex flex-wrap fw-bold fs-6 pe-2">
                            <span
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">Perusahaan
                                IT</span>
                        </div>
                    </div>
                </div>
                <div class="card-toolbar m-0">
                    <h4 class="fw-bolder m-0 text-gray-500">Company ID</h4>
                    <h4 class="ms-3 mt-2" id="id_company">0001</h4>
                </div> --}}
            </div>

            <div class="card-body py-10" id="body_detail_comp">
                {{-- <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">

                            <img src="assets/media/avatars/blank.png" alt="image" id="profile_image"
                                class="img-fluid" style="border-radius: 50%;">


                        </div>

                    </div>
                    <div class="flex-grow-1">

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Email</label>

                            <div class="col-lg-8">
                                <span class="fs-6" id="gender">neraca.abadi@neracaabadi.co.id</span>
                            </div>

                        </div>

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Company Phone Number</label>

                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6" id="lulusan">+622917473324</span>
                            </div>

                        </div>

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Website
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title=""></i></label>

                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fs-6 me-2" id="kota">neracaabadi.com</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Address</label>
                            <div class="col-lg-8">
                                <span class="fs-6 me-2" id="kota">Jl Bunga Anggrek Blok B no 29</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-lg-8">
                                <button class="btn btn-light" onclick="toogleTable()">Kembali</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Date Request</label>
                            <div class="col-lg-8">
                                <span class=" fs-6" id="pekerjaan_sekarang">29 Desember 2022</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">LinkedIn Account</label>
                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6" id="skills">Neraca Abadi</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Since
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Phone number must be active"></i></label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fs-6 me-2" id="negara">1997</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Description</label>
                            <div class="col-lg-8">
                                <span class="fs-6 me-2" id="negara">Menjunjung keuatamaan konsumen dan para pekerja
                                    kami</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card mb-5 mb-xl-10" id="job_history">
            @include('managecompany.detailcompany')
        </div>
        <div class="card mb-5 mb-xl-10" id="job_all">
            @include('managecompany.detailjob')
        </div>
        <div class="card mb-5 mb-xl-10 card-acc-reject">
            <!--begin::Card header-->
            <div class="card-header py-4">
                <div class="card-title">
                    <div class="input-group ms-2">
                        {{-- <button class="btn btn-outline-primary" onclick="toogleTable()">Kembali</button> --}}


                        {{-- <span class="input-group-text" id="basic-addon1">
                        </span> --}}
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex gap-4 btn-acc">
                        {{-- <button class="btn btn-danger btn-rejacc" data-bs-toggle="modal"
                            data-bs-target="#modal_reject">Reject</button>
                        <button class="btn btn-success btn-rejacc" condition?="1"
                            msg="Halo! Company request anda sudah kami terima, Selamat memakai full fitur yang kami sediakan!"
                            onclick="accCompany(this)">Approve</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_reject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px" id="modal_form">
        <div class="modal-content">

            <form action="javascript:rejectCompany()" method="post" id="formReject" name="formReject"
                autocomplete="off" enctype="multipart/form-data">
                <div class="card card-bordered">
                    <div class="card-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="cond" id="cond" value="2">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="msg" id="msg"
                            value="Halo! Mohon maaf permintaan pendaftaran company anda kami tolak, untuk alasan terkait ada di bawah!">
                        <div class="fv-row mb-5">
                            <label for="" class="required form-label">Reason</label>
                            <input type="text" name="alasan" id="alasan"
                                class="form-control form-control-sm form-control-solid input-required" />
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary btn-sm me-2 actCreate">
                            <i class="las la-save fs-1"></i> Save Changes
                        </button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
