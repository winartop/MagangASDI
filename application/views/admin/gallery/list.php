<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="glyphicon glyphicon-cog"></i> Gallery
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
      <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo $this->session->flashdata('message');?>
        </div>
      <?php } ?>



  <!-- /.content -->
  <?php
  if ($this->session->flashdata('berhasil')) {
      echo "<div class='alert alert-info'>";
      echo $this->session->flashdata('berhasil');
      echo "</div>";
  } elseif ($this->session->flashdata('edit')) {
      echo "<div class='alert alert-warning'>";
      echo $this->session->flashdata('edit');
      echo "</div>";
  } elseif ($this->session->flashdata('hapus')) {
      echo "<div class='alert alert-danger'>";
      echo $this->session->flashdata('hapus');
      echo "</div>";
  }
  ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <div class="row">
    <?php foreach ($gallery as $row): ?>
        <div class="col-md-3">
            <div class="widget">

                <div class="widget-content">
                    <div class="thumbnail">
                        <img src="<?php echo base_url() ?>uploads/artikel/<?php echo $row->foto ?>" height="300" width="300" alt="...">
                        <div class="caption">
                            <b><p>Nama Foto</b>: <?php echo $row->foto ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php endforeach; ?>
</div>
    </div>
  </div>


<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php echo $pagination; ?>

    </ul>
</nav>



</section>
<!-- Modal for edit -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    function show_by_id(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Admin/Gallery/show_by_id',
            data: 'id=' + id,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id").val(obj.id);
                $("#nama_foto").val(obj.nama_foto);
                $("#foto").val(obj.foto);
            }
        })
    }

</script>
