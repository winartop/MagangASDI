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

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div id="services" class="container-fluid">
      <h1 style="color:blue;">Data Portofolio Alumni</h1>
        <div id="content">
          <hr>
          <div class="box col-md-18">
              <?php if($datanya){ foreach($datanya as $row){?>
              <table border="0" width="650px">
                <td width="200px" >
                  <tr>
                    <td rowspan="5" width="70px"><?php $loc = base_url('uploads/alumni/'.$row->foto); echo"<img align='center' height=200px src=$loc style='margin-right:20px;' />";?></td>
                    <td width="200px">NIM<td> : <td><?php echo $row->nim ?></td>
                  </tr>
                  <tr>
                    <td>Nama<td> : <td><?php echo $row->nama ?></td>
                  </tr>
                  <tr>
                    <td>Prodi<td> : <td><?php echo $row->prodi ?></td>
                  </tr>
                  <tr>
                    <td>Angkatan<td> : <td><?php $x=$row->tahun_masuk+1; echo $row->tahun_masuk."/".$x; ?></td>
                  </tr>
                  <tr>
                    <td>Tgl Lulus<td> : <td><?php echo $row->tanggal_lulus ?></td>
                  </tr>
                </td>
                <a href="<?php echo site_url('data/lihat/'.$row->nim); ?>" class="btn btn-primary pull-right">Selengkapnya &raquo;</a>
              </table>

              <hr></hr>
            <?php  }}else{ echo "Data Tidak Tersedia"; } ?>
          </div>
          <?php if ($datanya) { ?>
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
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-2"></div>
</div>
<!-- Container (Services Section) -->

<footer class="footer">
  <b><hr></b>
        <p class="text-center">PORTAL PORTOFOLIO ASDI &copy; 2018 </p>
</footer>

</body>
</html>
