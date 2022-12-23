<div class="modal fade" id="editgambarProduk-{{ $p->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Gambar Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('produk.update_gambar', $p->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Gambar Produk
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input type="file" class="form-control" name="gambar" id="validationCustom01"
                                    value="{{ $p->nama }}" required>
                                <div class="invalid-feedback">
                                    Masukkan Gambar
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
