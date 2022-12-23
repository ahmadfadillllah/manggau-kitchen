<div class="modal fade" id="insertMeja">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Meja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('meja.insert') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Nama
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="name" id="validationCustom01"
                                    placeholder="Masukkan Nama" required>
                                <div class="invalid-feedback">
                                    Masukkan Nama
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Email
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukkan Email" required>
                                <div class="invalid-feedback">
                                    Masukkan Email
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">No.Handphone
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="no_hp"
                                    placeholder="Masukkan No.Handphone" required>
                                <div class="invalid-feedback">
                                    Masukkan No.Handphone
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
