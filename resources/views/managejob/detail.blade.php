
<div class="detail" style="display: none;">

</div>
<div class="verif container-fluid">

</div>
<div class="modal fade" id="modal_reject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px" id="modal_form">
        <div class="modal-content">

            <form action="javascript:rejectJob()" method="post" id="formReject" name="formReject"
                autocomplete="off" enctype="multipart/form-data">
                <div class="card card-bordered">
                    <div class="card-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="cond" id="cond" value="2">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="msg" id="msg"
                            value="Halo! Mohon maaf permintaan pendaftaran Job anda kami tolak, untuk alasan terkait ada di bawah ini!">
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