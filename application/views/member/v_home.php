<style media="screen">
.container{
  padding:5%;
}
.container .img{
  text-align:center;
}
.container .details{
  border-left:3px solid green;
}
.container .details p{
  font-size:15px;
  font-weight:bold;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-graduation-cap"></i> Dashboard
     </h1>
    </section>
    <!-- Main content -->
<section class="content">
  <div class="container">
    <div class="col-md-11 img">
      <br>
      <?php
          $loc = base_url('uploads/alumni/'.$dataalumni[0]->foto);
          echo"<img class='img-rounded' height=250px src=$loc />";
      ?>
      <br><br>
        <p style="color:blue;">Hai  <b style="color:green;"> <?php echo $dataalumni[0]->nama; ?></b></p>
        <p><cite title="Source Title"><?php echo $dataalumni[0]->nim; ?> <i class="icon-map-marker"></i></cite></p>
      <p>
        (Selamat datang di Portal Portofolio Alumni<b style="color:green;">ASDI</b>)  <br>
        Berikan PORTOFOLIO terbaikmu
      </p>
    </div>
  </div>
    <!-- /.content -->
  </section class="content">
</div>
  <!-- /.content-wrapper -->
