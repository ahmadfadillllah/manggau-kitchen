@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @if (!$pesanan->isEmpty())
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 order-lg-2 mb-12">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Pesanan kamu</span>
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#gantiJumlah" >Ganti Jumlah Pesanan</button>
                                    @include('order.modal.jumlah')
                                </h4>
                                <form action="{{ route('order.proses') }}" method="post">
                                    @csrf
                                    <ul class="list-group mb-3">
                                        @php $total = 0 @endphp
                                        @foreach ($pesanan as $ps)
                                        <input type="text" name="id[]" value="{{ $ps->id }}" hidden>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <a href="{{ route('order.delete', $ps->id) }}"><span class="badge light badge-warning">X</span></a>
                                                <h6 class="my-0">{{ $ps->produk->nama }}</h6>
                                                <small class="text-muted">{{ $ps->produk->deskripsi }}</small>
                                                <p>Catatan: {{ $ps->catatan }}</p>
                                            </div>
                                            <span class="text-muted">@currency($ps->produk->harga) x {{ $ps->jumlah }}</span>
                                        </li>
                                        @php $total += $ps->produk->harga * $ps->jumlah @endphp
                                        @endforeach
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>Total</span>
                                            <strong>@currency($total)</strong>
                                        </li>
                                    </ul>
                                    <a type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#beforeProsess">Pesan</a>
                                    @include('order.modal.proses')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rincian Order</h4>
                        <a class="btn btn-info" href="{{ route('order.index') }}" >Pesan lagi</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Harga</strong></th>
                                        <th><strong>Jumlah</strong></th>
                                        <th><strong>Catatan</strong></th>
                                        <th><strong>Status</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total2 = 0 @endphp
                                    @foreach ($pesanan2 as $ps2)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $ps2->produk->nama }}</td>
                                        <td>@currency($ps2->produk->harga)</td>
                                        <td>{{ $ps2->jumlah }}</td>
                                        <td>{{ $ps2->catatan }}</td>
                                        <td>
                                            @if ($ps2->status == 'Pesanan Masuk')
                                            <span class="badge light badge-info">{{ $ps2->status }}</span>
                                            @elseif ($ps2->status == 'Pesanan Dalam Antrian')
                                            <span class="badge light badge-secondary">{{ $ps2->status }}</span>
                                            @elseif ($ps2->status == 'Pesanan Sedang Diolah')
                                            <span class="badge light badge-primary">{{ $ps2->status }}</span>
                                            @elseif ($ps2->status == 'Pesanan Diantar')
                                            <span class="badge light badge-dark">{{ $ps2->status }}</span>
                                            @elseif ($ps2->status == 'Pesanan Selesai')
                                            <span class="badge light badge-success">{{ $ps2->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @php $total2 += $ps2->produk->harga * $ps2->jumlah @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <strong><td>Total : @currency($total2)</td></strong>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
