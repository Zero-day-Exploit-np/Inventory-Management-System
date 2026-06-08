<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container-fluid px-3">
        <button class="btn btn-outline-secondary btn-icon d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <i class="bi bi-list"></i>
        </button>

        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/dashboard') }}">
            <span class="brand-icon"><i class="bi bi-box-seam"></i></span>
            <span class="fw-bold">Inventory SaaS</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTop">
            <form class="d-flex align-items-center me-auto my-2 my-lg-0 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted"><i class="bi bi-search"></i></span>
                <input class="form-control ps-5" type="search" placeholder="Search products, orders..." aria-label="Search">
            </form>

            <div class="d-flex align-items-center gap-2">
                <div class="d-none d-md-flex align-items-center text-muted small">
                    <i class="bi bi-calendar-event me-2"></i>
                    <span id="dashboardDateTime"></span>
                </div>

                <button class="btn btn-icon btn-outline-secondary position-relative" type="button" aria-label="Notifications">
                    <i class="bi bi-bell-fill"></i>
                    <span class="badge-notification"></span>
                </button>

                <div class="dropdown">
                    <button class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2" type="button" id="navbarUserMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:34px; height:34px;">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                        <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Administrator' }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="bi bi-person-circle me-2"></i>My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="bi bi-gear me-2"></i>Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>