@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        @include('auth.notif.index')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Produk</h4>
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link  ai-icon" href="javascript:void(0);" role="button"
                                data-bs-toggle="dropdown">
                                <button class="btn btn-info">Pesanan Saya</button>
                                <span class="badge light text-white bg-primary rounded-circle">{{ $cart }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                @foreach ($pesanan as $ps)
                                <div id="dlab_W_Notification1" class="widget-media dlab-scroll p-3"
                                style="height:100px;">
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2">
                                                <img alt="image" width="50"
                                                    src="{{ asset('dashboard/xhtml/images/card') }}/{{ $ps->produk->gambar }}">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">{{ $ps->produk->nama }}</h6>
                                                <small class="d-block">@currency($ps->produk->harga)</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                                @endforeach

                                <a class="all-notification" href="{{ route('order.checkout') }}">Lihat Pesanan<i
                                        class="ti-arrow-end"></i></a>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($produk as $p)
            <div class="col-lg-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-b-30">
                            <div class="col-md-5 col-xxl-12">
                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="{{ asset('dashboard/xhtml') }}/images/card/{{ $p->gambar }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-xxl-12">
                                <div class="new-arrival-content position-relative">
                                    <h4><a href="#">{{ $p->nama }}</a></h4>
                                    <div class="comment-review star-rating">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <p class="price">@currency($p->harga)</p>
                                    </div>
                                    <p>Availability: @if ($p->status == 'Tersedia')<span class="badge badge-lg light badge-primary">{{ $p->status }}</span>
                                        @else<span class="badge badge-lg light badge-warning">{{ $p->status }}</span>
                                        @endif</p>
                                    <p>Kategori: <span class="item">{{ $p->kategori->nama }}</span> </p>
                                    <p class="text-content">{{ $p->deskripsi }}</p>
                                </div>
                            </div>
                            @if ($p->status == 'Tersedia')
                            <div class="card-footer">
                                <a href="{{ route('order.add', $p->id) }}" type="button" class="btn btn-primary">Pesan</a>
                                {{-- @include('produk.modal.cart') --}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('layout.footer')
