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
        <h1 style="color:blue;">Data Portofolio Alumni
          <a href="<?php echo site_url('data/'); ?>" class="btn btn-primary pull-right">Kembali</a>
        </h1>
        <div id="content">
          <div class="box col-md-18">
            <table class="table">
                <tr>
                  <td rowspan="5" width="70px"><?php $loc = base_url('uploads/alumni/'.$dataalumni[0]->foto); echo"<img align='center' height=200px src=$loc style='margin-right:10px;' />";?></td>
                  <td>NIM<td> : <td><?php echo $dataalumni[0]->nim ?></td>
                </tr>
                <tr>
                  <td>Nama<td> : <td><?php echo $dataalumni[0]->nama ?></td>
                </tr>
                <tr>
                  <td>Agama<td> : <td><?php echo $dataalumni[0]->agama ?> / Jenis Kelamin: <?php echo $dataalumni[0]->jenis_kelamin; ?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir<td> : <td><?php echo $dataalumni[0]->tempat_lahir ?></td>
                </tr>
                <tr>
                  <td>Tgl Lahir<td> : <td><?php echo $dataalumni[0]->tanggal_lahir ?></td>
                </tr>
              </table>
              <strong style="color:#FF6600;">Kontak</strong>
              <table class="table">
                <tr>
                  <td>No HP<td> : <td><?php echo $dataalumni[0]->no_hp ?></td>
                </tr>
                <tr>
                  <td>Email<td> : <td><?php echo $dataalumni[0]->email ?></td>
                </tr>
                <tr>
                  <td>Alamat<td> : <td><?php echo $dataalumni[0]->alamat; ?> RT <?php echo $dataalumni[0]->RT; ?> / RW <?php echo $dataalumni[0]->RT; ?> Kel. <?php echo $dataalumni[0]->kelurahan; ?> Kec. <?php echo $dataalumni[0]->kecamatan; ?> - <?php echo $dataalumni[0]->kota; ?></td>
                </tr>
              </table>
              <strong style="color:#FF6600;">Akademik</strong>
              <table class="table">
                <tr>
                  <td>Prodi<td> : <td><?php echo $dataalumni[0]->prodi ?></td>
                </tr>
                <tr>
                  <td>Angkatan<td> : <td><?php echo $dataalumni[0]->tahun_masuk ?></td>
                </tr>
                <tr>
                  <td>IPK<td> : <td><?php echo $dataalumni[0]->IPK ?></td>
                </tr>
                <tr>
                  <td>No. Transkrip<td> : <td><?php echo $dataalumni[0]->no_transkrip ?></td>
                </tr>
                <tr>
                  <td>No. Ijazah<td> : <td><?php echo $dataalumni[0]->no_ijazah ?></td>
                </tr>
                <tr>
                  <td>Judul Skripsi/TA<td> : <td><?php echo $dataalumni[0]->judul_ta ?></td>
                </tr>
              </table >
              <?php if ($datapekerjaan): ?>
                <strong style="color:#FF6600;">Pekerjaan</strong>
                <table class="table">
                  <tr>
                    <td>Profesi<td> : <td><?php echo $datapekerjaan[0]->jabatan ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Kerja<td> : <td><?php echo $datapekerjaan[0]->nama_kantor ?></td>
                  </tr>
                  <tr>
                    <td>Alamat<td> : <td><?php echo $datapekerjaan[0]->alamat; ?> - <?php echo $datapekerjaan[0]->kota; ?></td>
                  </tr>
                </table>
              <?php endif ?>
          </div>
        </div>
</div>
    </div>
</div>



<footer class="footer">
  <b><hr></b>
        <p class="text-center">PORTAL PORTOFOLIO ASDI &copy; 2018 </p>
</footer>

</body>
</html>
