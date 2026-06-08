<div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header d-lg-none border-bottom border-white-10 px-4 py-3">
        <div class="d-flex align-items-center gap-3">
            <div class="brand-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div>
                <h6 class="mb-0 text-white">Inventory Pro</h6>
                <small class="text-muted">Admin panel</small>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body px-0 pt-3 pb-4 d-flex flex-column">
        <div class="sidebar-brand px-4 mb-4 d-none d-lg-flex align-items-center gap-3">
            <span class="brand-icon"><i class="bi bi-box-seam"></i></span>
            <div>
                <div class="fw-bold text-white">Inventory Pro</div>
                <div class="small text-muted">Management System</div>
            </div>
        </div>

        <nav class="nav flex-column px-3">
            <div class="sidebar-heading">Dashboard</div>
            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>

            <div class="sidebar-heading mt-3">Inventory</div>
            <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ url('/categories') }}">
                <i class="bi bi-tags me-2"></i>Categories
            </a>
            <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                <i class="bi bi-box-seam me-2"></i>Products
            </a>
            <a class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}" href="{{ url('/suppliers') }}">
                <i class="bi bi-people me-2"></i>Suppliers
            </a>

            <div class="sidebar-heading mt-3">Transactions</div>
            <a class="nav-link {{ request()->is('purchases*') ? 'active' : '' }}" href="{{ url('/purchases') }}">
                <i class="bi bi-cart-plus me-2"></i>Purchases
            </a>
            <a class="nav-link {{ request()->is('sales*') ? 'active' : '' }}" href="{{ url('/sales') }}">
                <i class="bi bi-currency-dollar me-2"></i>Sales
            </a>

            <div class="sidebar-heading mt-3">Business</div>
            <a class="nav-link {{ request()->is('reports*') ? 'active' : '' }}" href="{{ url('/reports') }}">
                <i class="bi bi-bar-chart me-2"></i>Reports & Analytics
            </a>
            <a class="nav-link {{ request()->is('activity-logs*') ? 'active' : '' }}" href="{{ url('/activity-logs') }}">
                <i class="bi bi-clock-history me-2"></i>Activity Logs
            </a>

            <div class="sidebar-heading mt-3">Account</div>
            <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="bi bi-person-circle me-2"></i>Profile Settings
            </a>
            <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-door-closed me-2"></i>Logout
            </a>
        </nav>

        <div class="mt-auto px-3">
            <div class="card-soft p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-info-circle text-primary fs-4"></i>
                    </div>
                    <div>
                        <div class="text-white fw-semibold small">System Status</div>
                        <div class="small text-muted">All systems operational</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>