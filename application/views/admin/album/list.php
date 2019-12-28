<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="glyphicon glyphicon-cog"></i> Album
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
            <h3 class="box-title">Data Album</h3>
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
                              <th>Nama Album</th>
                              <th>Edit</th>
                              <th>Hapus</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $no=1;
                          foreach ($album as $row):
                              ?>
                              <tr>
                                  <td><?php echo $no ?></td>
                                  <td><?php echo $row->nama_album ?></td>
                                  <td><button type='button' class='btn btn-3d btn-danger btn-sm' data-toggle='modal' onclick=show_by_id(<?php echo $row->id_album; ?>) data-target='#Modal'>Edit</button></td>
                                  <td><?php echo anchor('Admin/Album/Hapus/' . $row->id_album, 'Hapus', array('class' => 'btn btn-3d btn-info btn-sm')) ?></td>
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
              <h3 class="box-title">Tambah Album</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  action="<?php echo site_url('admin/album/tambah');?>" method="post">
              <div class="box-body">
                <div class="form-group">
                      <label for="nama_prodi" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_album" class="form-control" placeholder="Masukan Nama Album" id="nama_album" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Rubah Nama Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <?php echo form_open('Admin/Album/edit') ?>
                    <div>
                        <input type="hidden" id="id_album" name="id_album">
                        <label class="icon-android">Nama Album</label>
                        <input type="text" id="nama_album" name="nama_album" required="" class="form-control">
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
    function show_by_id(id_album) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Admin/Album/show_by_id',
            data: 'id_album=' + id_album,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id_album").val(obj.id_album);
                $("#nama_album").val(obj.nama_album);
            }
        })
    }

</script>
