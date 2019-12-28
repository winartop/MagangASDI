<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <link rel="shortcut icon" href="assets/gambar/favicon.ico" type="image/x-icon">
  <title>PORTAL PORTOFOLIO ASDI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/custom.css" rel="stylesheet">
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand active" href="<?php echo site_url('/welcome');?>">PORTAL PORTOFOLIO ASDI</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('/about');?>">ABOUT</a></li> <!--profilKampus-->
        <li><a href="<?php echo site_url('/data');?>">PORTOFOLIO</a></li> <!-- data alumni-->
        <li><a href="<?php echo site_url('/event');?>">EVENT</a></li> <!--pengumuman-->
        <li><a href="<?php echo site_url('kontak');?>">KONTAK</a></li>
        <li><a href="<?php echo site_url('/login');?>" target="_blank">LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<br><br>


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <section class="content">
  <?php if ($this->session->flashdata('msg_success')) { ?>
          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <i class="glyphicon glyphicon-info-sign"></i> <?php echo $this->session->flashdata('msg_success');?>
          </div>
      <?php } ?>
      <?php if (validation_errors()) {?>
                  <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo validation_errors();?>
                </div>
      <?php } ?>

      <?php if ($dataartikel) {
          foreach ($dataartikel as $artikel) { ?>
      <!-- Default box -->
      <div class="box box-warning">
          <div class="box-body">
              <div class="box-tools pull-right">
                 <a href="<?php echo site_url('/event/detail/'.$artikel->id_artikel); ?>">Detail</a>
              </div>
              <table>
                  <tr>
                      <td>

                          <?php
                              $loc = base_url('uploads/artikel/'.$artikel->foto);
                              echo"<img align='center' height=150px width=300px src=$loc />";
                          ?>
                      </td>
                      <td class="col-md-9">
                        <table>
                            <tr>
                                <td style="color:#009aea" width="120px"><strong>tanggal posting </strong> </td>
                                <td>: <?php echo $artikel->tanggal; ?></td>
                            </tr>
                            <tr>
                                <td style="color:#009aea"><strong>konten</strong> </td>
                                <td>: <?php echo $artikel->judul; ?></td>
                            </tr>
                            <tr>
                                <td style="color:#009aea"><strong>isi konten</strong> </td>
                                <td> :
                                <?php $isi=$artikel->isi_artikel; ?>
                                   <?php echo $isi=character_limiter($isi,200); ?>

                                </td>
                            </tr>
                        </table>
                      </td>
                  </tr>
              </table>
              <br>
          </div>
         <!-- /.box-body -->
      </div>
        <!-- /.box -->
      <?php
          }
      }else{ ?>
          <div class="alert alert-warning">
             <i class="glyphicon glyphicon-remove"></i> Data tidak tersedia.
          </div>
      <?php } ?>
    <?php if ($dataartikel) { ?>
      <div class="clearfix text-center">
          <ul class="pagination pagination-md no-margin">
              <?php
                  echo $this->pagination->create_links();
              ?>
          </ul>
      </div>
      <?php
          }
       ?>
  </section>
</div>
</div>

<footer class="footer">
  <b><hr></b>
        <p class="text-center">PORTAL PORTOFOLIO ASDI &copy; 2018 </p>
</footer>

</body>
</html>
