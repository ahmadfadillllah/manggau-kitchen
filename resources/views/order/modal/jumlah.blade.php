<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="gantiJumlah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jumlah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('order.update_jumlah') }}" method="post">
                @csrf
                <div class="modal-body">
                    @foreach ($pesanan as $ps)
                    <input type="text" name="id[]" value="{{ $ps->id }}" hidden>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control" value="{{ $ps->produk->nama }}" readonly>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah[]" min="0" value="{{ $ps->jumlah }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Catatan</label>
                            <input type="text" class="form-control" name="catatan[]" value="{{ $ps->catatan }}">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
