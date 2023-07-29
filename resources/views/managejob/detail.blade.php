<div class="detail" style="display: none;">
    <div class="container-fluid" id="kt_content_container">

        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

            <div class="card-header cursor-pointer">

                <div class="card-title m-0">
                    <h4 class="fw-bolder m-0 text-gray-500">Member ID</h4>
                    <h4 class="ms-3" id="id_user">0001</h4>
                </div>

            </div>

            <div class="card-body py-10">
                <div class="row mb-10">

                    <div class="col-md-6 pb-10 pb-lg-0">

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Gender</label>

                            <div class="col-lg-8">
                                <span class="fs-6" id="gender">Man</span>
                            </div>

                        </div>

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Quallification</label>

                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6" id="lulusan">S1 Teknik Informatika</span>
                            </div>

                        </div>

                        <div class="row mb-7">

                            <label class="col-lg-4 fw-bold text-muted">Location
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Phone number must be active"></i></label>

                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fs-6 me-2" id="kota">Malang City</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Portfolio</label>
                            <div class="col-lg-8">
                                <a href="#" class="fs-6 text-hover-primary"
                                    id="link_porto">http://g.drive/JSH0yadn932hdSDO7f</a>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-lg-8">
                                <button class="btn btn-light" onclick="toggleTable()">Back Here!</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Position Now</label>
                            <div class="col-lg-8">
                                <span class=" fs-6" id="pekerjaan_sekarang">UI/UX Designer</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Skills</label>
                            <div class="col-lg-8 fv-row">
                                <span class=" fs-6" id="skills">HTML | CSS | Java OOP | User Interface | User
                                    Experience |
                                    Figma</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Region
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Phone number must be active"></i></label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fs-6 me-2" id="negara">Indonesia</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Resume or CV</label>
                            <div class="col-lg-8">
                                <a href="#" class=" fs-6 text-hover-primary"
                                    id="link_resume">http://g.drive/JSH0yadn932hdSDO7f</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="card mb-5 mb-xl-10" id="job_history" style="display: none;">
            @include('listuser.table')
        </div>
    </div>
</div>
