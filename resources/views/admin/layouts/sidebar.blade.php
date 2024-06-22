<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}" href="/admin/dashboard">
                <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ request()->is('admin/corner*') ? 'active' : '' }}" href="/admin/corner">
                <div class="sb-nav-link-icon"><i class="fas fa-mug-saucer"></i></div>
                Corner
            </a>
            <a class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}" href="/admin/categories">
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                Categories
            </a>
            <a class="nav-link {{ request()->is('admin/facilities*') ? 'active' : '' }}" href="/admin/facilities">
                <div class="sb-nav-link-icon"><i class="fas fa-wifi"></i></div>
                Facilities
            </a>
            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="/admin/users">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Users
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
