<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/gambar/favicon.ico" type="image/x-icon">
  <title>PORTAL PORTOFOLIO ASDI</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/sticky-footer.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/costum.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" media="screen">
  <link href="<?php echo base_url(); ?>assets/custom.css" rel="stylesheet">
  <style type="text/css">
  body {
    padding-top: 70px;
    background: url("<?php echo base_url('assets/gambar/bg.png'); ?>") no-repeat center center fixed;
    background-size:100% auto;
  }
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }


  </style>
</head>
<body>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="imgcontainer">
       <img src="<?php echo base_url('assets/gambar/asdi.png'); ?>" alt="Avatar" class="avatar">
     </div>

    <h4 class="login-box-msg">PORTAL PORTOFOLIO</h4>
    <?php if ($this->session->flashdata('message')) { ?>
      <div class="alert alert-danger"><i class="glyphicon glyphicon-exclamation-sign"></i>
        <?php echo $this->session->flashdata('message');?>
      </div>
    <?php }?>
    <?php if ($this->session->flashdata('notif')) { ?>
      <div class="alert alert-info"><i class="glyphicon glyphicon-exclamation-sign"></i>
        <?php echo $this->session->flashdata('notif');?>
      </div>
    <?php }?>
    <form action="<?php echo site_url('login/proses');?>" method="post">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" id="password" placeholder="Kata Sandi" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
          <a href="<?php echo site_url('daftar'); ?>" class="btn btn-warning btn-block btn-flat"> daftar</a>
      </div>
    </form>
    <a href="<?php echo site_url('login/lupa_password');?>" class="text-center">Lupa password?</a>
    <a href="<?php echo base_url('/welcome'); ?>" class="text-danger pull-right"><b>HOME</b></a>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/collapse.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/transition.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

    <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
      $('.input-group.date').datetimepicker({
              language:  'id',
              weekStart: 1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 4,
              minView: 2,
              forceParse: 0
      });
    </script>

</body>
</html>
