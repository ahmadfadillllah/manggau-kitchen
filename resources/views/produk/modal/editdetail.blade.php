<div class="modal fade" id="editdetailProduk-{{ $p->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('produk.update_detail', $p->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Kategori
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <select class="default-select wide form-control" id="validationCustom05" name="kategori_id">
                                    <option {{ $p->kategori_id == $p->kategori_id ? "$p->kategori->nama" : ""}} Value="{{ $p->kategori_id }}">{{ $p->kategori->nama }}</option>
                                    @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Pilih salah satu
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Nama
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="nama" id="validationCustom01"
                                    value="{{ $p->nama }}" required>
                                <div class="invalid-feedback">
                                    Masukkan Nama Produk
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Harga
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="harga" id="rupee"
                                    value="@currency($p->harga)" required>
                                <div class="invalid-feedback">
                                    Masukkan Harga
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Status
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <select class="default-select wide form-control" id="validationCustom05" name="status">
                                    <option {{ $p->status == "Tersedia" ? "Tersedia" : ""}} Value="{{ $p->status }}">{{ $p->status }}</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Habis">Habis</option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih salah satu
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Deskripsi Produk
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <textarea class="form-control" id="validationCustom04"  rows="5" name="deskripsi" required>{{ $p->deskripsi }}</textarea>
                                <div class="invalid-feedback">
                                    Masukkan Deskripsi
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
<script type="text/javascript">
    var rupiah = document.getElementById('rupee');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
        // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp');
    });
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa             = split[0].length % 3,
        rupiah             = split[0].substr(0, sisa),
        ribuan             = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
    }
</script>
