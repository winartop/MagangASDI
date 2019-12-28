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

<style media="screen">
.btn-facebook {
  background: #3B5998;
  border-radius: 0;
  color: #fff;
  border-width: 1px;
  border-style: solid;
  border-color: #263961;
}
.btn-facebook:link, .btn-facebook:visited {
  color: #fff;
}
.btn-facebook:active, .btn-facebook:hover {
  background: #263961;
  color: #fff;
}
</style>
  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
<section class="content">
    <div class="container">
      <div class="container">
    <section id="wrapper">
				<div class="row">
					<div class="col-md-12">
						<div class="masthead well well-sm">
							<h3>
								<span class="light text-primary">Lowongan</span>
                <span style="font-family: Lato, sans-serif; font-weight: 200; text-decoration: none; rgb(45,137,239);">|</span>
                <span class="dark text-primary"><?php echo $dataartikel[0]->judul; ?></span>
							</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="article">
							<h3><?php echo $dataartikel[0]->judul; ?></h3>
							<ul class="list-unstyled list-inline">
								<li><i class="fa fa-calendar"></i> <?php echo $dataartikel[0]->tanggal; ?></li>
								<li><i class="fa fa-user"></i> asdi</li>
							</ul>
              <br>
							<div class="article-content">
                <div class="text-center">
                  <?php
                      $loc = base_url('uploads/artikel/'.$dataartikel[0]->foto);
                      echo"<img class='img-rounded' height=300px width=600px src=$loc />";
                  ?>
                </div>
                <br>
								<p class="text-justify"><?php echo $dataartikel[0]->isi_artikel; ?></p>
							</div>
              <!--
              <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large" data-mobile-iframe="false">
              Share : <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" title="Facebook" class="btn btn-facebook btn-sm">
              <i class="fa fa-facebook fa-fw"></i> Facebook
              </a>
              </div>
            -->
						</div>
					</div>
				</div>
		</section>



<footer class="footer">
  <b><hr></b>
        <p class="text-center">PORTAL PORTOFOLIO ASDI &copy; 2018 </p>
</footer>

</body>
</html>
