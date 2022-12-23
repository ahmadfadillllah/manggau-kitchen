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
                                        @foreach ($pesanan as $ps)
                                        <input type="text" name="id[]" value="{{ $ps->id }}" hidden>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <a href="{{ route('order.delete', $ps->id) }}"><span class="badge light badge-warning">X</span></a>
                                                <h6 class="my-0">{{ $ps->produk->nama }}</h6>
                                                <small class="text-muted">{{ $ps->produk->deskripsi }}</small>
                                            </div>
                                            <span class="text-muted">@currency($ps->produk->harga) x {{ $ps->jumlah }}</span>
                                        </li>
                                        @endforeach
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>Total</span>
                                            <strong>@currency($ps->produk->harga * $ps->jumlah)</strong>
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
                                        <th><strong>Status</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan2 as $ps)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $ps->produk->nama }}</td>
                                        <td>@currency($ps->produk->harga)</td>
                                        <td>{{ $ps->jumlah }}</td>
                                        <td>
                                            @if ($ps->status == 'Pesanan Masuk')
                                            <span class="badge light badge-info">{{ $ps->status }}</span>
                                            @elseif ($ps->status == 'Pesanan Dalam Antrian')
                                            <span class="badge light badge-secondary">{{ $ps->status }}</span>
                                            @elseif ($ps->status == 'Pesanan Sedang Diolah')
                                            <span class="badge light badge-primary">{{ $ps->status }}</span>
                                            @elseif ($ps->status == 'Pesanan Diantar')
                                            <span class="badge light badge-dark">{{ $ps->status }}</span>
                                            @elseif ($ps->status == 'Pesanan Selesai')
                                            <span class="badge light badge-success">{{ $ps->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
