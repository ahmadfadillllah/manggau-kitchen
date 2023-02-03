<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('dashboard/xhtml') }}/images/profile/{{ Auth::user()->avatar }}" width="20" alt="" />
                            <div class="header-info ms-3">
                                <span class="font-w600 ">Hi,<b>{{ Auth::user()->name }}</b></span>
                                <small class="text-end font-w400">{{ Auth::user()->email }}</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            @if (Auth::user()->role != 'meja')
                            <a href="{{ route('profile.index') }}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ms-2">Profile </span>
                            </a>
                            @endif
                            <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>
                    @if (Auth::user()->role != 'meja')
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'meja')
                    <li>
                        <form action="{{ route('order.index') }}" method="get">
                            <input type="text" name="search" class="form-control" placeholder="Cari produk...">
                        </form>
                    </li>
                    <br>
                    <li>
                        <a href="{{ route('order.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Daftar Produk</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'owner' or Auth::user()->role == 'dapur')
                    <li>
                        <a href="{{ route('kategoriproduk.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Kategori Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Produk</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'owner')
                    <li>
                        <a href="{{ route('pegawai.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-086-star"></i>
                            <span class="nav-text">Pegawai</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'owner')
                    <li>
                        <a href="{{ route('meja.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-045-heart"></i>
                            <span class="nav-text">Meja</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'owner' or Auth::user()->role == 'dapur' or Auth::user()->role == 'kasir')
                    <li>
                        <a href="{{ route('pesanan.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Pesanan</span>
                        </a>
                    </li>
                    @endif

                    @if (Auth::user()->role == 'owner' or Auth::user()->role == 'kasir')
                    <li>
                        <a href="{{ route('pesananmasuk.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Pesanan Masuk</span>
                        </a>
                    </li>
                    @endif

                    @if (Auth::user()->role == 'owner' or Auth::user()->role == 'kasir')
                    <li>
                        <a href="{{ route('transaksi.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Transaksi</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
