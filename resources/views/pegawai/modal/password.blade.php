<div class="modal fade" id="changePassword-{{ $p->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pegawai.change_password', $p->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Password baru
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input type="password" class="form-control" name="password" id="validationCustom01"
                                    placeholder="Masukkan Password" required>
                                <div class="invalid-feedback">
                                    Masukkan Password
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
