@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        @include('auth.notif.index')
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('dashboard/xhtml') }}/images/profile/{{ Auth::user()->avatar }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
                                    <p>{{ Auth::user()->role }}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show">Tentang Saya</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                                    </li>
                                    <li class="nav-item"><a href="#change-password" data-bs-toggle="tab" class="nav-link">Password</a>
                                    </li>
                                    <li class="nav-item"><a href="#change-avatar" data-bs-toggle="tab" class="nav-link">Avatar</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="about-me" class="tab-pane fade pt-3 active show">
                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Personal Information</h4>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Nama <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{ Auth::user()->name }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">No.Handphone <span class="pull-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{ Auth::user()->no_hp }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>
                                                <form action="{{ route('profile.update') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama</label>
                                                        <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">No. Handphone</label>
                                                        <input type="text" value="{{ Auth::user()->no_hp }}" name="no_hp" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="change-password" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Ganti Password</h4>
                                                <form action="{{ route('profile.change_password') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Password Lama</label>
                                                        <input type="password" name="password_lama" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Password Baru</label>
                                                        <input type="password" name="password_baru" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Ganti</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="change-avatar" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Ganti Avatar</h4>
                                                <form action="{{ route('profile.change_avatar') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Avatar</label>
                                                        <input type="file" name="avatar" class="form-control">
                                                    </div>

                                                    <button class="btn btn-primary" type="submit">Ganti</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="replyModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Post Reply</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <textarea class="form-control" rows="4">Message</textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
                                            <button type="button" class="btn btn-primary">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
