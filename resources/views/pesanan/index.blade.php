@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            @foreach ($pesanan as $ps)
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-primary text-black">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">No. Antrian: {{ $loop->iteration }}</span></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Order: </span><strong>{{ $ps->user->name }}</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Tanggal: </span><strong>{{ $ps->updated_at }}</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Produk: </span><strong>{{ $ps->produk->nama }}</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Jumlah: </span><strong>{{ $ps->jumlah }}</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Harga: </span><strong>@currency($ps->produk->harga)</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Catatan: </span><strong>{{ $ps->catatan }}</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Status: </span><strong>
                            @if ($ps->status == 'Pesanan Masuk')
                            <span class="badge badge-info">{{ $ps->status }}</span>
                            @elseif ($ps->status == 'Pesanan Dalam Antrian')
                            <span class="badge badge-secondary">{{ $ps->status }}</span>
                            @elseif ($ps->status == 'Pesanan Sedang Diolah')
                            <span class="badge badge-primary">{{ $ps->status }}</span>
                            @elseif ($ps->status == 'Pesanan Diantar')
                            <span class="badge badge-dark">{{ $ps->status }}</span>
                            @elseif ($ps->status == 'Pesanan Selesai')
                            <span class="badge badge-success">{{ $ps->status }}</span>
                            @elseif ($ps->status == 'Pesanan Berakhir')
                            <span class="badge badge-success">{{ $ps->status }}</span>
                            @endif</strong>
                        </li>
                        <button type="button" class="btn btn-info light sharp" data-bs-toggle="dropdown">
                            <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('pesanan.pesanan_dalam_antrian', $ps->id) }}">Pesanan Dalam Antrian</a>
                            <a class="dropdown-item" href="{{ route('pesanan.pesanan_sedang_diolah', $ps->id) }}">Pesanan Sedang Diolah</a>
                            <a class="dropdown-item" href="{{ route('pesanan.pesanan_diantar', $ps->id) }}">Pesanan Diantar</a>
                            <a class="dropdown-item" href="{{ route('pesanan.pesanan_selesai', $ps->id) }}">Pesanan Selesai</a>
                            <a class="dropdown-item" href="{{ route('pesanan.pesanan_berakhir', $ps->id) }}" onclick="return confirm('Yakin mengakhir pesanan?')">Pesanan Berakhir</a>
                        </div>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('layout.footer')
