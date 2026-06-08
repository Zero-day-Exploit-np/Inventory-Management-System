<div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header d-lg-none border-bottom border-white-10 px-4 py-3">
        <div class="d-flex align-items-center gap-3">
            <div class="brand-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div>
                <h6 class="mb-0 text-white">Inventory SaaS</h6>
                <small class="text-muted">Admin panel</small>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body px-0 pt-3 pb-4 d-flex flex-column">
        <div class="sidebar-brand px-4 mb-4 d-none d-lg-flex align-items-center gap-3">
            <span class="brand-icon"><i class="bi bi-box-seam"></i></span>
            <div>
                <div class="fw-bold text-white">Inventory SaaS</div>
                <div class="small text-muted">Premium Dashboard</div>
            </div>
        </div>

        <nav class="nav flex-column px-3">
            <div class="sidebar-heading">Main</div>
            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
            <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ url('/categories') }}">
                <i class="bi bi-tags me-2"></i>Categories
            </a>
            <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                <i class="bi bi-box-seam me-2"></i>Products
            </a>
            <a class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}" href="{{ url('/suppliers') }}">
                <i class="bi bi-people me-2"></i>Suppliers
            </a>
            <a class="nav-link {{ request()->is('purchases*') ? 'active' : '' }}" href="{{ url('/purchases') }}">
                <i class="bi bi-cart-plus me-2"></i>Purchases
            </a>
            <a class="nav-link {{ request()->is('sales*') ? 'active' : '' }}" href="{{ url('/sales') }}">
                <i class="bi bi-currency-dollar me-2"></i>Sales
            </a>
            <a class="nav-link text-danger mt-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-door-closed me-2"></i>Logout
            </a>
        </nav>

        <div class="mt-auto px-3">
            <div class="card-soft p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-chat-left-text text-primary fs-4"></i>
                    </div>
                    <div>
                        <div class="text-white fw-semibold">Need help?</div>
                        <div class="small text-muted">Reach out to support</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>