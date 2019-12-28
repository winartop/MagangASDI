<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
    <title>PORLIO-ALUMNI</title>
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
      background: url("<?php echo base_url('assets/img/bglogin.jpg'); ?>") no-repeat center center fixed;
      background-size:100% auto;
    }
    .imgcontainer {
      text-align: center;
      margin: 10px 0 5px 0;
    }

    img.avatar {
      width: 15%;
      border-radius: 25%;
    }

    </style>
</head>
<body>


        <section class="content col-5">
              <!-- Horizontal Form -->
              <?php if (validation_errors()) {?>
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo validation_errors();?>
                      </div>
              <?php } ?>
              <!-- form start -->
                <?php echo form_open_multipart('daftar', 'class="form-horizontal" role="form"'); ?>
              <div class="box box-primary ">
                <div class="imgcontainer">
                   <img src="<?php echo base_url('assets/gambar/asdi.png'); ?>" alt="Avatar" class="avatar">
                 </div>
                <div class="box-header with-border text-center">
                  <h4 class="box-title">REGISTRASI ALUMNI <br> <b>PORTAL PORTOFOLIO ALUMNI</b>  </h4>
                </div>
                <!-- /.box-header -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nim" class="col-sm-2 control-label">NIM : </label>
                      <div class="col-sm-12">
                        <input type="text" name="username" class="form-control" id="username" value="<?php echo set_value('username');?>" placeholder="Masukan NIM" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo set_value('nama');?>" placeholder="Masukan Nama" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="container">
                        <div class="row">
                          <div class="col">Angkatan <br>
                            <div class="col-sm-12">
                              <input type="text" name="tahun_masuk" class="form-control" id="tahun_masuk" value="<?php echo set_value('tahun_masuk');?>" placeholder="Tahun Masuk " required>
                            </div>
                          </div>
                          <div class="col">Tanggal Lulus <br>
                            <div class="col-sm-12">
                              <input type="date" name="tanggal_lulus" class="form-control" id="tanggal_lulus" value="<?php echo set_value('tanggal_lulus');?>" placeholder="Tahun Lulus" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">email</label>
                      <div class="col-sm-12">
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email');?>" placeholder="Masukan email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nomer Telepon</label>
                      <div class="col-sm-12">
                        <input type="number" name="no_hp" class="form-control" id="no_hp" value="<?php echo set_value('no_hp');?>" placeholder="Masukan no_hp" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-12">
                        <input type="password" name="password" class="form-control" id="password" value="<?php echo set_value('password');?>" placeholder="Masukan Password" required>
                        <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Masukan kombinasi antara 6-12 karakter.</small>
                      </div>
                      <div class="col-sm-12">
                        <input type="password" name="password2" class="form-control" id="password2" value="<?php echo set_value('password2');?>" placeholder="Konfirmasi Password" required>
                      </div>
                    </div>

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?php echo site_url('login'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-share-alt"></i> Batal</a>
                    <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Daftar</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
              <!-- /.box -->
        </section>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Bootstrap Core JavaScript -->


    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url('assets/js/collapse.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/transition.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>


    <script type="text/javascript">
    $('#tambah').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
    </script>


</body>
</html>
