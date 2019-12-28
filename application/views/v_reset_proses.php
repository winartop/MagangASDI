<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
    <title>PORLIO-ALUMNI | <?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sticky-footer.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/costum.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" media="screen">
    <style type="text/css">
    body {
      padding-top: 70px;
      background: url("<?php echo base_url('assets/img/bglogin.jpg'); ?>") no-repeat center center fixed;
      background-size:100% auto;
    }

    </style>
</head>
<body>

  <script>
    function select_data($username,$password) {
      $('#username').val($username);
      $('#password').val($password);
    }

    function refresh() {
      $('#username').val("");
      $('#password').val("");
    }
  </script>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3 class="login-box-msg"><i class="fa fa-graduation-cap"></i> PORLIO-ALUMNI</h3>
    <?php if ($this->session->flashdata('message')) { ?>
      <div class="alert alert-danger"><i class="glyphicon glyphicon-exclamation-sign"></i>
        <?php echo $this->session->flashdata('message');?>
      </div>
    <?php }?>
    <p class="login-box-msg text-center">Silahkan hubungi <b>admin</b> <br>
      PORTOFOLIO PORTOFOLIO ALUMNI, dengan cara klik tombol <b>whatsapp<b> dibawah ini.</p>
    <form class="form-main" name="ajax-form" id="ajax-form" action="#" method="post">
      <center>
          <a href="https://api.whatsapp.com/send?phone=6281234318017&amp;text=PESAN%20RESET%20PASSWORD LOGIN%20PORTAL%20alumni di%20dengan%20NIM: " target="_blank">
          <img src="https://lh3.googleusercontent.com/-N23V4qsFKs8/WMV9mGK5x5I/AAAAAAAAAPQ/BcC6qzLzJtcqKUWAX5TXX8KxuwDX5JXAgCLcB/h90/Button%2BChat%2Bvia%2BWhatsapp.png" style="max-width: 100%;"//></a>
      </center>
    </form>

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
