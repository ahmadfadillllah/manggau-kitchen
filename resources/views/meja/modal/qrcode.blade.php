<div class="modal fade" id="showQrCode-{{ $p->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Qr Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                {!! QrCode::size(300)->format('png')->generate($p->qrcode); !!}
                <a href="{{ asset('dashboard/xhtml/images/qrcode') }}/{{ $p->qrcode }}" class="btn btn-outline-secondary btn-rounded mt-3 px-5" target="_blank">Download QrCode</a>
            </div>
        </div>
    </div>
</div>
