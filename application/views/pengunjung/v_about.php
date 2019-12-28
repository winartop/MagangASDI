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
<div class="col-md-12 text-center">
  <h1 style="color:blue;">VISI dan MISI</h1><p>Akademi Seni dan Desain Indonesia Surakarta</p><hr>

</div>

<div id="about" class="container-fluid">
  <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-4">
    <h2 class="text-center">VISI <br><br>
      <img src="<?php echo base_url('assets/gambar/visi.png'); ?>" height=100px />
    </h2>
    <p class="text-justify">Akademi Seni dan Desain Indonesia Surakarta (ASDI) menjadi Perguruan Tinggi yang
      mengutamakan kualitas pelayanan pendidikan dan berperan aktif dalam pelestarian
      budaya nusantara melalui bidang seni dan desain.</p>
  </div>
  <div class="col-sm-4">
    <h2 class="text-center">MISI <br><br>
      <img src="<?php echo base_url('assets/gambar/Misi.png'); ?>" height=100px />
    </h2>
    <p class="text-justify">Akademi Seni dan Desain Indonesia Surakarta (ASDI) membawa misi sebagai perguaruan
       tinggi yang mengedepankan profesionalisme dalam memberikan pelayanan pedidikan
        kepada masyarakat dan ikut serta mengambil bagian dalam melestarikan warisan budaya bangsa.</p>
    <br>
  </div>
</div>

<footer class="footer">
  <b><hr></b>
        <p class="text-center">PORTAL PORTOFOLIO ASDI &copy; 2018 </p>
</footer>

</body>
</html>
