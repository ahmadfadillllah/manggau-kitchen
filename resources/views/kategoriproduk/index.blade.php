@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kategori Produk</a></li>
            </ol>
        </div>
        <!-- row -->
        @include('auth.notif.index')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kategori Produk</h4>
                        <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#insertKategori" style="float: right"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Tambah</button>
                        @include('kategoriproduk.modal.insert')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Aksi</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $k)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $k->nama }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#editKategori-{{ $k->id }}">Edit</button>
                                            @include('kategoriproduk.modal.edit')
                                            <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#destroyKategori-{{ $k->id }}">Hapus</button>
                                            @include('kategoriproduk.modal.destroy')
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
