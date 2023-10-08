<div class="detail" style="display: none;">
    <div class="container-fluid" id="kt_content_container">

        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

            <div class="card-header">

                <div class="card-title m-0 d-flex">
                    
                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                        <div class="flex-grow-1 me-2">
                            <h4 class="mb-3 m-0" id="id_user">Marketing Executive</h4>
                            <h4 class="fw-bolder m-0 text-gray-500 ">PT Neraca </h4>
                        </div>
                        <span class="badge text-white badge-warning mb-5">Request</span>
                    </div>
                </div>
                <div class="card-toolbar m-0">
                    <h4 class="fw-bolder m-0 text-gray-500">Company ID</h4>
                    <h4 class="ms-3 mt-2" id="id_user">0001</h4>
                </div>
            </div>

            <div class="card-body py-10">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">

                            <img src="assets/media/avatars/blank.png" alt="image" id="profile_image" class="img-fluid" style="border-radius: 50%;">


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
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""></i></label>

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
                                <button class="btn btn-light" onclick="toogleTable()">Back Here!</button>
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
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fs-6 me-2" id="negara">1997</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Description</label>
                            <div class="col-lg-8">
                                <span class="fs-6 me-2" id="negara">Menjunjung keuatamaan konsumen dan para pekerja kami</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <div class="card mb-5 mb-xl-10" id="job_history">
            @include('managecompany.detailcompany')
        </div>
    </div>
</div>
