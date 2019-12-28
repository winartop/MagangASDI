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
        <li><a href="<?php echo site_url('about');?>">ABOUT</a></li> <!--profilKampus-->
        <li><a href="<?php echo site_url('/data');?>">PORTOFOLIO</a></li> <!-- data alumni-->
        <li><a href="<?php echo site_url('/event');?>">EVENT</a></li> <!--pengumuman-->
        <li><a href="<?php echo site_url('kontak');?>">KONTAK</a></li>
        <li><a href="<?php echo site_url('/login');?>" target="_blank">LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<section class="Material-contact-section section-padding section-dark">
  <div class="container">
      <div class="row">
          <h1 style="color:blue;">Data Portofolio Alumni</h1>
          <hr>
          <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
              <h3 class="section-title">Akademi Seni dan Desain Indonesia Surakarta</h3>
          </div>
      </div>
      <div class="row">
          <!-- Section Titile -->
          <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
            <div class="find-widget">
             Kampus:  <a href="https://asdi.ac.id">Akademi Seni dan Desain Indonesia Surakarta</a>
            </div>
            <div class="find-widget">
             Alamat: <a href="#">Jl. Garuda Mas No.3, Pabelan, Kartasura, Surakarta 57162</a>
            </div>
            <div class="find-widget">
            Nomer Telepon:  <a href="#">081234318017</a>
            </div>

            <div class="find-widget">
              Website:  <a href="https://asdi.ac.id">www.asdi.ac.id</a>
            </div>
          </div>
          <!-- contact form -->
          <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
            <form class="form-main" name="ajax-form" id="ajax-form" action="#" method="post">
              <center>
                <h3>Ada Yang Bisa Dibantu Langsung:</h3>
                  <a href="https://api.whatsapp.com/send?phone=6281234318017&amp;text=Hai%20,%20ada yang%20bisa di%20bantu....." target="_blank">
                  <img src="https://lh3.googleusercontent.com/-N23V4qsFKs8/WMV9mGK5x5I/AAAAAAAAAPQ/BcC6qzLzJtcqKUWAX5TXX8KxuwDX5JXAgCLcB/h90/Button%2BChat%2Bvia%2BWhatsapp.png" style="max-width: 100%;"//></a>
              </center>
            </form>
          </div>
      </div>
  </div>
</section>

<br><br><br><br>
<footer class="footer">
  <b><hr></b>
        <p class="text-center">PORTAL PORTOFOLIO ASDI &copy; 2018 </p>
</footer>

</body>
</html>
