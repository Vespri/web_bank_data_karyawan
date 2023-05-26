<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url('dashboard_view') ?>" class="text-nowrap logo-img">
                <img src="<?= base_url() ?>assets/others/logonew.png" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard_view' ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard_view' ? 'active' : '' ?>" href="<?= base_url('dashboard_view') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Data Karyawan</span>
                </li>
                <li class="sidebar-item <?= $this->uri->segment(1) == 'karyawan_view' || $this->uri->segment(1) == 'create_view' || $this->uri->segment(1) == 'update_view' ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= $this->uri->segment(1) == 'karyawan_view' || $this->uri->segment(1) == 'create_view' || $this->uri->segment(1) == 'update_view' ? 'active' : '' ?>" href="<?= base_url('karyawan_view') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Karyawan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->