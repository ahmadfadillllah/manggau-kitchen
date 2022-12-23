<div class="modal fade" id="changeRole-{{ $p->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pegawai.change_role', $p->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Role
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <select class="default-select wide form-control" id="validationCustom05" name="role">
                                    <option {{ $p->role == "dapur" ? "Dapur" : ""}} Value="{{ $p->role }}">{{ $p->role }}</option>
                                    <option value="dapur">Dapur</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih salah satu
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
