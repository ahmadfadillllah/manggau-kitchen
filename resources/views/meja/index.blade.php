@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Meja</a></li>
            </ol>
        </div>
        <!-- row -->
        @include('auth.notif.index')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Meja</h4>
                        <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#insertMeja" style="float: right"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Tambah</button>
                        @include('meja.modal.insert')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($meja as $p)
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="profile-photo">
                                <img src="{{ asset('dashboard/xhtml') }}/images/profile/{{ Auth::user()->avatar }}" width="100" class="img-fluid rounded-circle" alt="">
                            </div>
                            <h3 class="mt-4 mb-1">{{ $p->name }}</h3>
                            <a class="btn btn-outline-primary btn-rounded mt-3 px-5" data-bs-toggle="modal" data-bs-target="#changeDetail-{{ $p->id }}">Detail</a>
                            @include('meja.modal.edit')
                            <a class="btn btn-outline-secondary btn-rounded mt-3 px-5" data-bs-toggle="modal" data-bs-target="#showQrCode-{{ $p->id }}">Lihat QrCode</a>
                            @include('meja.modal.qrcode')
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('layout.footer')
