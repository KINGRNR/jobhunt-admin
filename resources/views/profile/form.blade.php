<form action="javascript:onSave()" class="dataForm" method="post" id="formProfile" name="formProfile" autocomplete="off"
    enctype="multipart/form-data">
    <div class="card card-body">
        <input type="hidden" name="id">
        <div class="text-start">
            <h1 class="mb-4">Data Pribadi</h1>
            <h6>Profil Saya</h6>
        </div>
        <div class="d-flex mb-5">
            <div class="col-lg-8">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url(assets/media/avatars/blank.png)">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px"
                        style="background-image: url(assets/media/avatars/150-26.jpg)"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                <!--end:3:Hint-->
            </div>
        </div>
        <div class="row">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Username</label>
            <input type="text" name="username" id="username" class="form-control input-required"
                placeholder="Username">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="row">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Fullname</label>
            <input type="text" name="name" id="name" class="form-control input-required"
                placeholder="Fullname">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="row">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
            <input type="text" name="email" id="email" class="form-control input-required" placeholder="Email">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class=" d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-primary" style="background-color:#117CB2;""
                id="kt_account_profile_details_submit">Simpan</button>
        </div>
    </div>
</form>
