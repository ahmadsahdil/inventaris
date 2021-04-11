<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
    <img src="<?= base_url(); ?>assets/bp2mi.png" alt="BP2MI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">BP2MI Mataram</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">SIPITR3</li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-clipboard-list"></i>
            <p>
              Data-data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/sipitr3/kasus') ?>" class="nav-link">
                <i class="fa fa-headset nav-icon"></i>
                <p>Data Kasus</p>
              </a>
            </li>
            
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
