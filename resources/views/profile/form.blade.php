<form action="javascript:onSave()" class="dataForm" method="post" id="formProfile" name="formProfile" autocomplete="off"
    enctype="multipart/form-data">
    <div class="card card-body">
        <input type="hidden" name="id">
        <div class="text-start">
            <h1 class="mb-4">Data Pribadi</h1>
            <h6>Profil Saya</h6>
        </div>
        <div class="d-flex mb-5">
            <div class="image-input image-input-circle " id="kt_image_input_profile" data-kt-image-input="true"
                style="background-image: url(<?= url('/') ?>/assets/media/avatars/blank.png)">
                <div class="image-input-wrapper w-125px h-125px" id="photoPreview"
                    style="background-image: url(<?= url('/') ?>/assets/media/avatars/blank.png)"></div>

                <label
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Change File">
                    <i class="bi bi-pencil-fill fs-7"></i>

                    <input type="file" name="photo" accept=".png, .jpg, .jpeg, .svg" />
                    <input type="hidden" name="isremoved" />
                </label>

                <span
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow d-none"
                    data-action-remove="" data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                    data-bs-dismiss="click" title="Remove File">
                    <i class="bi bi-x fs-2 text-danger"></i>
                </span>
            </div>
        </div>
        <div class="row">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Username</label>
            <input type="text" name="username" id="username" class="form-control input-required"
                placeholder="Username">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="row">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
            <input type="text" name="name" id="name" class="form-control input-required" placeholder="Nama">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="row">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
            <input type="text" name="email" id="email" class="form-control input-required" placeholder="Email">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class=" d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-primary" style="background-color:#117CB2;"" id="kt_account_profile_details_submit">Simpan</button>
        </div>
    </div>
</form>
