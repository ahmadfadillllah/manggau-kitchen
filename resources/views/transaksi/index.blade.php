@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('auth.notif.index')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Order</th>
                                        <th class="align-middle pe-7">Tanggal</th>
                                        <th class="align-middle" style="min-width: 12.5rem;">Produk</th>
                                        <th class="align-middle text-end">Harga</th>
                                        <th class="align-middle text-end">Jumlah</th>
                                        <th class="align-middle text-end">Status</th>
                                        <th class="align-middle text-end">Total</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="orders">
                                    @foreach ($pesanan as $ps)
                                    <tr class="btn-reveal-trigger">
                                        <td class="py-2"><strong>{{ $ps->user->name }}</strong></td>

                                        <td class="py-2">{{ $ps->updated_at }}</td>
                                        <td class="py-2">{{ $ps->produk->nama }}</td>
                                        <td class="py-2">@currency($ps->produk->harga)</td>
                                        <td class="py-2">{{ $ps->jumlah }}</td>
                                        <td class="py-2 text-end">
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
                                            @endif

                                        </td>
                                        <td class="py-2 text-end">@currency($ps->produk->harga * $ps->jumlah)
                                        </td>
                                        @if ($ps->status != 'Pesanan Berakhir')
                                        <td class="py-2 text-end">
                                            <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="{{ route('pesanan.pesanan_dalam_antrian', $ps->id) }}">Pesanan Dalam Antrian</a>
                                                        <a class="dropdown-item" href="{{ route('pesanan.pesanan_sedang_diolah', $ps->id) }}">Pesanan Sedang Diolah</a>
                                                        <a class="dropdown-item" href="{{ route('pesanan.pesanan_diantar', $ps->id) }}">Pesanan Diantar</a>
                                                        <a class="dropdown-item" href="{{ route('pesanan.pesanan_selesai', $ps->id) }}">Pesanan Selesai</a>
                                                        <a class="dropdown-item" href="{{ route('pesanan.pesanan_berakhir', $ps->id) }}" onclick="return confirm('Yakin mengakhir pesanan?')">Pesanan Berakhir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
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
