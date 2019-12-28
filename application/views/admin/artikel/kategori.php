<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="glyphicon glyphicon-cog"></i> Kategori Artikel
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

      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border"><i class="icon-th-list"></i>
            <h3 class="box-title">Data Kategori artikel</h3>
          </div>
          <!-- /.box-header -->
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
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <div class="widget-content">
                  <table id="example" class="table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Kategori Artikel</th>
                              <th>Edit</th>
                              <th>Hapus</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $no=1;
                          foreach ($kategori as $row):
                              ?>
                              <tr>
                                  <td><?php echo $no ?></td>
                                  <td><?php echo $row->nama_kategori ?></td>
                                  <td><button type='button' class='btn btn-3d btn-danger btn-sm' data-toggle='modal' onclick=show_by_id(<?php echo $row->id_kategori; ?>) data-target='#Modal'>Edit</button></td>
                                  <td><?php echo anchor('Admin/artikel/Hapus_kategori/' . $row->id_kategori, 'Hapus', array('class' => 'btn btn-3d btn-info btn-sm')) ?></td>
                              </tr>
                          <?php  $no++; ?>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>

            </div>

          </form>
        </div>
      </div>

      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kategori Artikel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  action="<?php echo site_url('admin/artikel/tambah_kategori');?>" method="post">
              <div class="box-body">
                <div class="form-group">
                      <label for="nama_prodi" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_kategori" class="form-control" placeholder="Masukan Nama Kategori" id="nama_kategori" required>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Tambah</button>
              </div>
            </form>
          </div>
        </div>
          <!-- general form elements -->



          <!-- general form elements -->




  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Modal for edit -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rubah Nama Kategori artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <?php echo form_open('Admin/artikel/edit_kategori') ?>
                    <div>
                        <input type="hidden" id="id_kategori" name="id_kategori">
                        <label class="icon-android">Nama Artikel</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" required="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal for edit -->

<script type="text/javascript">
    function show_by_id(id_kategori) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Admin/artikel/show_by_id_kategori',
            data: 'id_kategori=' + id_kategori,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id_kategori").val(obj.id_kategori);
                $("#nama_kategori").val(obj.nama_kategori);
            }
        })
    }

</script>
