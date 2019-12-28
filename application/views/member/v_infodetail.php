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

								<p><?php echo $dataartikel[0]->isi_artikel; ?></p>

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
</div>
    </div>
  </section>
</div>
  <!-- /.content-wrapper -->
