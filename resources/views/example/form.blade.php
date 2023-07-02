<form action="javascript:onSave()" method="post" id="formProvinsi" name="formProvinsi" autocomplete="off" enctype="multipart/form-data">
    <div class="card card-bordered">
        <div class="card-body">
            <input type="hidden" name="provinsi_id">
            <div class="fv-row mb-5">
                <label for="" class="required form-label">Code</label>
                <input type="text" name="provinsi_kode" class="form-control form-control-sm form-control-solid" required/>
            </div>

            <div class="fv-row mb-5">
                <label for="" class="required form-label">Name</label>
                <input type="text" name="provinsi_nama" class="form-control form-control-sm form-control-solid" required/>
            </div>

            <div class="fv-row mb-5">
                <label for="" class="form-label">Status</label>
                <div class="form-check form-check-custom form-check-solid">
                    <input name="provinsi_active" class="form-check-input" type="checkbox" value="1" id="checkedStatus"/>
                    <label class="form-check-label" for="checkedStatus">
                        Active
                    </label>
                </div>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="button" onclick="onReset(this)" class="btn btn-sm btn-light btn-active-light-primary me-2 actCreate">
                <i class="las la-redo-alt fs-1"></i> Reset
            </button>
            <button type="submit" class="btn btn-primary btn-sm me-2 actCreate">
                <i class="las la-save fs-1"></i> Save
            </button>
            <button type="button" onclick="onDisplayEdit(this)" class="btn btn-warning btn-sm me-2 d-none actEdit">
                <i class="las la-edit fs-1"></i> Edit
            </button>
            <button type="button" onclick="onDelete(this)" class="btn btn-danger btn-sm me-2 d-none actEdit">
                <i class="las la-trash fs-1"></i> Delete
            </button>
        </div>
    </div>
</form>
