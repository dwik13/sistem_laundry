<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-text mx-3">Sistem Laundry</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class=<?= $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == '' ? '"nav-item active"' : '"nav-item"' ?>>
      <a class="nav-link" href="<?= base_url('admin'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Manajemen Data Transaksi
    </div>

    <!-- Nav Item - Charts -->
    <li class=<?= $this->uri->segment(1) == 'transaksi' ? '"nav-item active"' : '"nav-item"' ?>>
      <a class="nav-link" href="<?= base_url('transaksi'); ?>">
        <i class="fas fa-fw fa-cash-register"></i>
        <span>Data Transaksi</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class=<?= $this->uri->segment(1) == 'pelanggan' ? '"nav-item active"' : '"nav-item"' ?>>
      <a class="nav-link" href="<?= base_url('pelanggan'); ?>">
        <i class="fas fa-fw fa-address-book"></i>
        <span>Data Pelanggan</span></a>
    </li>

    <!-- Nav Item - Tables
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Laporan</span></a>
      </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Manajemen Data Aplikasi
    </div>

    <!-- Nav Item - Charts -->
    <li class=<?= $this->uri->segment(1) == 'user' ? '"nav-item active"' : '"nav-item"' ?>>
      <a class="nav-link" href="<?= base_url('user'); ?>">
        <i class="fas fa-fw fa-user-cog"></i>
        <span>Data User</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class=<?= $this->uri->segment(1) == 'paket' ? '"nav-item active"' : '"nav-item"' ?>>
      <a class="nav-link" href="<?= base_url('paket'); ?>">
        <i class="fas fa-fw fa-box"></i>
        <span>Paket Laundry</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Log out</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->