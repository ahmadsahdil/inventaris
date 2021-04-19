<!-- 
Programmer : Ahmad
Programmer Support : Muhammad (ketikanmd.tech)
Support by www.ketikanmd.tech
 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
<link rel="shortcut icon" href="<?php echo base_url('assets/JKS-192x192.png') ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/sweetalert2.min.css">
  <script src="<?php echo base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

   
</head>
  
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('admin')?>" class="logo">
      <span class="logo-mini"><b>JKS NTB</b></span>
      <span class="logo-lg"><b>DATA JKS NTB</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Nusa Tenggara Barat</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url() ?>" title="Dasbor" >
          <i class="fa fa-home"></i>Beranda</a></li>
          <li class="dropdown user user-menu" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
          <span class="hidden-xs"><?php echo ucwords($this->session->userdata('_username')) ?>  </span>
            </a>
            <ul class="dropdown-menu">
               <li class="user-footer" >
                
                <div class="pull-right">
                  <a href="<?php echo base_url('user/user_edit') ?>" class="btn btn-success btn-flat"><i class="fa fa-user"></i> Profile</a>
                  <a href="<?php echo base_url('login/logout') ?>" class="btn btn-success btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        
        </ul>
      </div>
    </nav>
  </header>
  <body class="hold-transition skin-green sidebar-mini">
  <aside class="main-sidebar">
  <section class="sidebar">

 <div class="user-panel">
 <div class="pull-left image">  
<img src="  <?php  echo base_url() ?>assets/JKS-192x192.png" class="img-circle"> 
 </div>
 <div class="pull-left info">  
  <p> <?php echo ucwords($this->session->userdata('_username')) ?></p>
<i class="fa fa-circle text-success"> </i> Online


 </div>  

 </div>
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span><?php echo ucwords($this->session->userdata('_username')) ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li>  <a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Sign out</a></li>
           
            
          </ul>
        </li>  
        <?php if($this->session->userdata('_status')!=="Pelanggan") {?>
             <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i> <span>Infrastruktur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url('admin/infrastruktur') ?>"><i class="fa fa-plus"></i> Infrastruktur</a></li> 
            <li><a href="<?php echo base_url('admin/wilayah') ?>"><i class="fa fa-table"></i> Wilayah</a></li>
           
            
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url('admin/barang') ?>"><i class="fa fa-plus"></i> Barang</a></li> 
            <li><a href="<?php echo base_url('admin/total_barang') ?>"><i class="fa fa-table"></i> Total Masuk/Keluar</a></li>
           
            
          </ul>
        </li>
            <li class="<?php if($page == 'barang_masuk/home_barang_masuk'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>admin/barang_masuk">
                <i class="fa fa-medkit"></i> <span>Barang Masuk</span>
              </a>
            </li>

            <li class="<?php if($page == 'barang_keluar/home_barang_keluar'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>admin/barang_keluar">
                <i class="fa fa-ambulance"></i> <span>Barang Keluar</span>
              </a>
            </li>
            <?php }; ?>
             <?php if($this->session->userdata('_status')=="Admin") {?>
             <li class="<?php if($page == 'user/manage_user'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>user">
                <i class="fa fa-user-plus"></i> <span>User</span>
              </a>
            </li>
             <li class="<?php if($page == 'log/log'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>log">
                <i class="fa fa-hard"></i> <span>Log</span>
              </a>
            </li>
             
            <?php }; ?>
           
            
          </ul>

        </li>  
</section>
      </aside>
 
      
  <?php $this->load->view('admin/'.$page); ?>  

      <p>&nbsp;</p>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; <?php echo date('Y') ?> .</strong> All rights reserved.
      </footer>
    </div>

  <script src="<?php echo base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url()?>/assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>/assets/dist/js/demo.js"></script>
<script src="<?php echo base_url()?>/assets/toastr.min.js"></script>
<script src="<?php echo base_url()?>/assets/sweetalert2.min.js"></script>
<!-- <script src="<?php echo base_url()?>/assets/print.js"></script> -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'dom': 'Bfrtip',
        'buttons': [
            'print'
        ]
    })
  })
var status = "<?= $this->session->flashdata('status')?>";
  if (status == "success") {
 Swal.fire({
              icon: 'success',
              title: '<?= $this->session->flashdata('msg')?>',
              showConfirmButton: false,
              timer: 2500
            })

  }else if(status == "error"){
    Swal.fire({
              icon: 'error',
              title: '<?= $this->session->flashdata('msg')?>',
              showConfirmButton: false,
              timer: 2500
            })}
</script>
</body>
</html>
