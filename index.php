<?php
//tidak menyimpan cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


session_start();
include "conf/conn.php";
if(isset($_SESSION['kode_role'])==0){
    echo '<script>//alert("Anda Harus Login Terlebih Dahulu !!!");
    window.location.href="pages/login.php"</script>';
    }else{
      
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMASET RSU Islam Cawas</title>
  <link rel="icon" href="dist/img/logorsi.ico" type="image/gif" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- STYLE -->
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/index.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- DataTables Button -->
  <link rel="stylesheet" href="plugins/datatables/extensions/Button/buttons.dataTable.min.css">
  <!-- ChartJs -->
  <link rel="stylesheet" href="plugins/chartjs/Chart.min.css">
  <!-- Bootstrap Select-->
  <link rel="stylesheet" href="bootstrap/css/bootstrap-select.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    .nopadding {
      padding: 0 !important;
      margin: 0 !important;
    }
  </style>

<!-- SCRIPT -->
  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-3.5.1.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/input-mask/jquery.inputmask.js"></script>
  <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- DataTables Button -->
  <script src="plugins/datatables/extensions/Button/dataTable.buttons.min.js"></script>
  <script src="plugins/datatables/extensions/Button/buttons.html5.min.js"></script>
  <script src="plugins/datatables/extensions/Button/buttons.print.min.js"></script>
  <script src="plugins/datatables/extensions/Button/pdfmake.min.js"></script>
  <script src="plugins/datatables/extensions/Button/vfs_fonts.js"></script>
  <script src="plugins/datatables/extensions/Button/jszip.min.js"></script>
  <!--<script src="plugins/datatebles/extensions/Button/buttons.colVis.min.js"></script>-->
  <!-- ChartJs -->
  <script src="plugins/chartjs/Chart.min.js"></script>
  <!-- Bootstrap Select-->
  <script src="bootstrap/js/bootstrap-select.min.js"></script>
  <!-- tambahan javascript-->
  <script src="dist/js/index.js"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">ASET</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIMASET</b> RSUIC</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button --> 
          <li>
            <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print_r($_SESSION['nama_petugas']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li class="treeview">
        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> <span>Beranda</span></a></li>
      </li>
      <li class="header">KELOLA</li>
      <li class="treeview">
          <a href="index.php?page=data_aset">
            <i class="glyphicon glyphicon glyphicon-list-alt"></i> <span>Kelola Aset</span>
            <!--
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            -->
          </a>
          <!--
          <ul class="treeview-menu">
            <li><a href="index.php?page=data_aset"><i class="glyphicon glyphicon-education"></i> <span>Data Aset</span></a></li>
          </ul>
          -->
      </li>
      <li class="treeview">
          <a href="index.php?page=data_unit">
            <i class="glyphicon glyphicon glyphicon-home"></i> <span>Kelola Unit</span>
          </a>
      </li>
      <li class="treeview">
          <a href="index.php?page=data_ruangan">
            <i class="glyphicon glyphicon glyphicon-home"></i> <span>Kelola Ruangan</span>
          </a>
      </li>
      <li class="treeview">
          <a href="index.php?page=data_kategori">
            <i class="glyphicon glyphicon-tag"></i> <span>Kelola Kategori</span>
          </a>
      </li>
      <li class=treeview>
          <a href="index.php?page=data_jenis">
            <i class="glyphicon glyphicon glyphicon-tags"></i> <span>Kelola Jenis Aset</span>
          </a>
      </li>
      <li class="treeview">
          <a href="index.php?page=data_suplier">
            <i class="glyphicon glyphicon glyphicon-shopping-cart"></i> <span>Kelola Suplier</span>
          </a>
      </li>
      <li class="treeview">
          <a href="index.php?page=cetak_multi_label">
            <i class="glyphicon glyphicon glyphicon-print"></i> <span>Cetak Label</span>
          </a>
      </li>
      <li class="header">ASET RUSAK</li>
      <li class=treeview>
          <a href="index.php?page=data_pemeriksaan">
            <i class="glyphicon glyphicon glyphicon glyphicon-zoom-in"></i> <span>Pemerikasan/Perawatan Aset</span>
          </a>
      </li>
      <li class=treeview>
          <a href="index.php?page=data_kerusakan">
            <i class="glyphicon glyphicon glyphicon glyphicon-remove"></i> <span>Aset Rusak</span>
          </a>
      </li>
      <li class=treeview>
          <a href="index.php?page=data_perbaikan">
            <i class="glyphicon glyphicon glyphicon glyphicon-wrench"></i> <span>Perbaikan Aset</span>
          </a>
      </li>
      <li class="header">SETTING</li>
        <li class="treeview">
        <?php 
          if($_SESSION['kode_role']==1){
        ?>
            <li><a href="index.php?page=data_petugas"><i class="glyphicon glyphicon-user"></i> <span>Kelola Petugas</span></a></li>
        <?php
          }
        ?>
          <li><a href="pages/logout_process.php"><i class="glyphicon glyphicon-lock"></i> <span>Logout</span></a></li>
        </li>
      </ul>
    <!-- /.sidebar --> 
    </section>
  </aside>

  <!-- Content -->
    <?php include "conf/page.php"; ?>
  <!-- /Content -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#">RSU Islam Cawas</a></strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>

<?php } ?>