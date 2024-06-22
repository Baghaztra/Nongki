<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/admin" class="text-nowrap logo-img">
                <img src="/media/frontend/icons/favicon.png" width="35" alt="" />
                <span class="fs-6" style="font-weight: bold; color:black">Admin Simarasok</span>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin"
                        aria-expanded="false">
                        <span data-feather="home" class="align-text-bottom"></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('admin/destinasipariwisata*') ? 'active' : '' }}"
                        href="{{ route('destinasipariwisata.index') }}" aria-expanded="false">
                        <span data-feather="map" class="align-text-bottom"></span>
                        <span class="hide-menu">Destinasi Wisata</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('admin/homestay*') ? 'active' : '' }}"
                        href="{{ route('homestay.index') }}" aria-expanded="false">
                        <span data-feather="moon" class="align-text-bottom"></span>
                        <span class="hide-menu">Homestay</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('admin/booking*') ? 'active' : '' }}"
                        href="{{ route('booking.index') }}" aria-expanded="false">
                        <span data-feather="book" class="align-text-bottom"></span>
                        <span class="hide-menu">Booking</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('admin/umkm*') ? 'active' : '' }}"
                        href="{{ route('umkm.index') }}" aria-expanded="false">
                        <span data-feather="shopping-cart" class="align-text-bottom"></span>
                        <span class="hide-menu">UMKM</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('admin/category*') ? 'active' : '' }}"
                        href="{{ route('category.index') }}" aria-expanded="false">
                        <span data-feather="list" class="align-text-bottom"></span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('admin/user*') ? 'active' : '' }}"
                        href="{{ route('user.index') }}" aria-expanded="false">
                        <span data-feather="users" class="align-text-bottom"></span>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUTH</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/sign-out" aria-expanded="false">
                        <span data-feather="log-out" class="align-text-bottom"></span>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
