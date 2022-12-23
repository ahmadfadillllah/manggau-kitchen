<div class="modal fade" id="beforeProsess" aria-hidden="true" aria-labelledby="..." tabindex="-1">
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
                    <h4>Yakin prosess pesanan?</h4>
                    <p class="text-muted"> Jika sudah diproses, pesanan tidak dapat diubah..</p>
                    <!-- Toogle to second dialog -->
                    {{-- <a href="{{ route('order.proses') }}" type="button"  class="btn btn-success">Ya, Pesan</a> --}}
                    <button type="submit" class="btn btn-success">Ya, Pesan</button>
                </div>
            </div>
        </div>
    </div>
</div>
