<div class="modal fade" id="destroyProduk-{{ $p->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon
                    src="https://cdn.lordicon.com/tdrtiskw.json"
                    trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189"
                    style="width:130px;height:130px">
                </lord-icon>
                <div class="mt-4 pt-4">
                    <h4>Yakin menghapus produk?</h4>
                    <p class="text-muted"> Data yang dihapus tidak akan bisa dikembalikan lagi!!!</p>
                    <!-- Toogle to second dialog -->
                    <a href="{{ route('produk.destroy', $p->id) }}" type="button"  class="btn btn-warning">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
