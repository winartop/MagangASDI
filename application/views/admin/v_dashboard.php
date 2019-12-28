<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="assets/back/gambar/favicon.ico" type="image/x-icon">
  <title>PORTAL PORTOFOLIO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo base_url('assets/back/img/favicon.ico'); ?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/table-fixed-header.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/morris.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/back/css/bootstrap-datetimepicker.min.css" media="screen">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/costum.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/back/css/skins/_all-skins.min.css'); ?>">
      <!-- JavaScript Includes -->
  <script src="<?php echo base_url('assets/back/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/back/js/jquery.js'); ?>"></script>

  <script src="<?php echo base_url('assets/back/js/morris.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/back/js/raphael.min.js'); ?>"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue ">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-graduation-cap"></i> PORLIO-ALUMNI</span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?php echo $datauser; ?></li>
        <li>
          <a href="<?php echo site_url('admin/pratinjau');?>">
            <i class="fa fa-tachometer text-red"></i> <span>Dashboard</span> <!-- pertinjau-->
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/alumni');?>">
            <i class="fa fa-graduation-cap text-green"></i> Portofolio</a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/prodi');?>">
            <i class="fa fa-user text-orange"></i> prodi</a> <!-- Program Studi -->
        </li>
		 <li>
          <a href="#">
            <i class="fa fa-newspaper-o text-fuchsia"></i> Artikel
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo site_url('Admin/artikel/kategori');?>"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
            <li class="active"><a href="<?php echo site_url('Admin/artikel/data');?>"><i class="fa fa-circle-o"></i> Data Artikel</a></li>
            <li><a href="<?php echo site_url('Admin/artikel/tambah');?>"><i class="fa fa-circle-o"></i> Tambah Artikel</a></li>

          </ul>
        </li>
        <li>
          <a href="<?php echo site_url('admin/gallery');?>">
            <i class="fa fa-camera-retro text-aqua"></i> Galleri</a> <!-- Program Studi -->
        </li>
        <li>
          <a href="<?php echo site_url('admin/pengurus');?>">
            <i class="fa fa-user text-red"></i> Pengurus</a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/laporan');?>">
            <i class="glyphicon glyphicon glyphicon-print text-aqua"></i> Cetak Laporan</a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/pengaturan');?>">
            <i class="glyphicon glyphicon-cog text-yellow"></i> Pengaturan</a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/pengaturan/logout');?>">
            <i class="glyphicon glyphicon-remove text-red"></i> Keluar</a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <?php $this->load->view($page) ?>

  <!-- =============================================== -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0 BETA
    </div>
    <strong>Copyright &copy; 2016 Kelompok <b class="text-aqua">PORTAL PORTOFOLIO ALUMNI ASDI</b></strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url('assets/back/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo $path; ?>/jquery.min.js"></script>
  <script>
        $(document).ready(function(){
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('admin/alumni/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
        });
    </script>
<script src="<?php echo base_url('assets/back/js/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/back/js/transition.js'); ?>"></script>
<script src="<?php echo base_url('assets/back/js/dropdown.js'); ?>"></script>
<script src="<?php echo base_url('assets/back/js/collapse.js'); ?>"></script>
<script src="<?php echo base_url('assets/back/js/modal.js'); ?>"></script>
<script src="<?php echo base_url('assets/back/js/alert.js'); ?>"></script>
<script src="<?php echo base_url('assets/back/js/table-fixed-header.js'); ?>"></script>
<script src="<?php echo base_url('assets/back/js/bootstrap-hover-dropdown.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/back/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/back/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
    <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
        $(function () {
            var date = new Date();
            date.setDate(date.getDate());

            $('#lahir').datetimepicker({
              language:  'id',
              weekStart: 1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 4,
              minView: 2,
              forceParse: 0
            });

            $('#lapor').datetimepicker({
              language:  'id',
              weekStart: 1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 4,
              minView: 2,
              forceParse: 0
            });
        });
    </script>
    <script language='javascript' type='text/javascript'>
      $(document).ready(function(){
      $('.table-fixed-header').fixedHeader();
      });
    </script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/back/js/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/back/js/app.min.js'); ?>"></script>
</body>
</html>
