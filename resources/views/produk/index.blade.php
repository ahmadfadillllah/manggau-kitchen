@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Produk</a></li>
            </ol>
        </div>
        <!-- row -->
        @include('auth.notif.index')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Produk</h4>
                        <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#insertProduk" style="float: right"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Tambah</button>
                        @include('produk.modal.insert')
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
                            <div class="card-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editdetailProduk-{{ $p->id }}">Edit Detail</button>
                                @include('produk.modal.editdetail')
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editgambarProduk-{{ $p->id }}">Edit Gambar</button>
                                @include('produk.modal.editgambar')
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#destroyProduk-{{ $p->id }}">Hapus</button>
                                @include('produk.modal.destroy')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('layout.footer')
