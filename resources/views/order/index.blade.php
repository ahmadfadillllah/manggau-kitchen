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
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M3.88552 6.2921C1.95571 6.54135 0.439911 8.19656 0.439911 10.1896V10.7253C0.439911 12.8874 2.21812 14.6725 4.38019 14.6725H12.7058V24.9768H7.01104C5.77451 24.9768 4.82009 24.0223 4.82009 22.7858V18.4039C4.84523 16.6262 2.16581 16.6262 2.19096 18.4039V22.7858C2.19096 25.4334 4.36345 27.6059 7.01104 27.6059H21.0331C23.6807 27.6059 25.8532 25.4334 25.8532 22.7858V13.9981C26.9064 13.286 27.6042 12.0802 27.6042 10.7253V10.1896C27.6042 8.17115 26.0501 6.50077 24.085 6.28526C24.0053 0.424609 17.6008 -1.28785 13.9827 2.48534C10.3936 -1.60185 3.7545 1.06979 3.88552 6.2921ZM12.7058 5.68103C12.7058 5.86287 12.7033 6.0541 12.7058 6.24246H6.50609C6.55988 2.31413 11.988 1.90765 12.7058 5.68103ZM21.4559 6.24246H15.3383C15.3405 6.05824 15.3538 5.87664 15.3383 5.69473C15.9325 2.04532 21.3535 2.18829 21.4559 6.24246ZM4.38019 8.87502H12.7058V12.0382H4.38019C3.62918 12.0382 3.06562 11.4764 3.06562 10.7253V10.1896C3.06562 9.43859 3.6292 8.87502 4.38019 8.87502ZM15.3383 8.87502H23.6656C24.4166 8.87502 24.9785 9.43859 24.9785 10.1896V10.7253C24.9785 11.4764 24.4167 12.0382 23.6656 12.0382H15.3383V8.87502ZM15.3383 14.6725H23.224V22.7858C23.224 24.0223 22.2696 24.9768 21.0331 24.9768H15.3383V14.6725Z" fill="#4f7086"></path>
                                </svg>
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

                                <a class="all-notification" href="{{ route('order.checkout') }}">Check Out<i
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
