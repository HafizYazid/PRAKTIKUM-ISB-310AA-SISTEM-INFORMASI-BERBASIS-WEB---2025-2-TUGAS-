{{-- Navbar --}}
<nav class="navbar navbar-expand-lg fitzone-nav py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            FitZone<span style="color:#dc2626;">.</span>
        </a>

        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                style="color:#9ca3af;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Beranda</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                       href="{{ auth()->check() ? route('products.index') : route('login') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#paket">Paket</a>
                </li>
            </ul>

            {{-- Auth State --}}
            <div class="d-flex align-items-center gap-2">
                @guest
                    <a href="{{ route('login') }}"
                       class="btn btn-sm fw-semibold"
                       style="color:#9ca3af; border:1px solid #2f2f2f; border-radius:6px; padding:6px 16px; background:transparent;"
                       id="btn-login-nav">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                       class="btn btn-sm fw-semibold"
                       style="background:#dc2626; color:#fff; border:none; border-radius:6px; padding:6px 16px;"
                       id="btn-register-nav">
                        Daftar
                    </a>
                @else
                    <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle d-flex align-items-center gap-2"
                                style="background:#1f1f1f; border:1px solid #2f2f2f; color:#e5e7eb; border-radius:6px; padding:6px 14px;"
                                type="button" data-bs-toggle="dropdown" id="userDropdown">
                            @if(auth()->user()->profile_image)
                                <img src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                                     alt="Avatar" class="rounded-circle"
                                     width="24" height="24" style="object-fit:cover;">
                            @else
                                <span class="rounded-circle d-inline-flex align-items-center justify-content-center"
                                      style="width:24px; height:24px; background:#dc2626; color:#fff; font-size:0.65rem; font-weight:700;">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            @endif
                            <span class="d-none d-sm-inline" style="font-size:0.875rem;">{{ auth()->user()->name }}</span>
                            @if(auth()->user()->isAdmin())
                                <span style="font-size:0.65rem; background:#dc2626; color:#fff; padding:1px 6px; border-radius:3px; font-weight:700;">Admin</span>
                            @endif
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border" style="border-radius:8px; min-width:200px; border-color:#e5e7eb;">
                            <li class="px-3 py-2 border-bottom">
                                <div style="font-weight:600; font-size:0.875rem; color:#111;">{{ auth()->user()->name }}</div>
                                <div style="font-size:0.75rem; color:#6b6b6b;">{{ auth()->user()->email }}</div>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('dashboard') }}" style="font-size:0.875rem;" id="nav-dashboard">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('profile.edit') }}" style="font-size:0.875rem;" id="nav-profile">
                                    Profil Saya
                                </a>
                            </li>
                            @if(auth()->user()->isAdmin())
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('products.create') }}" style="font-size:0.875rem;" id="nav-add-product">
                                    Tambah Produk
                                </a>
                            </li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2 text-danger" style="font-size:0.875rem;" id="nav-logout">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
