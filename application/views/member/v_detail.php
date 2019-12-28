  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Detail Pekerjaan
                <a href="<?php echo site_url('member/pekerjaan'); ?>" class="btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
        <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
     </h1>
     <!-- Modal suspend -->
                                <div class="modal modal-danger fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="labelhapus" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelhapus">Hapus</h4>
                                            </div>
                                            <div class="modal-body" align="center">
                                                <?php echo form_open('member/pekerjaan/hapus/');
                                                echo form_hidden('id_pekerjaan', $datapekerjaan[0]->id_pekerjaan);
                                                ?>
                                                Anda ingin menghapus riwayat pekerjaan?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-outline" name='simpan' value='simpan'>Hapus</button>
                                                <?php echo form_close() ?>
                                            </div>
                                         </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
    </section>

    <!-- Main content -->
    <section class="content">
          <!-- Horizontal Form -->
          <?php if ($this->session->flashdata('msg_error')) {?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('msg_error');?>
                  </div>
          <?php } ?>
          <?php if (validation_errors()) {?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors();?>
                  </div>
          <?php } ?>
          <!-- form start -->
          <!-- /.box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Kontak & Alamat</h3><a href="#" data-toggle="modal" data-target="#kontak" class="pull-right text-orange"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table>
                    <tr>
                      <td style="color:#F39C12"><strong>No. Telepon</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->no_telepon; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>No Fax</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->no_fax; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Email</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->email; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Website</strong> </td>
                      <td>: <?php if ($datapekerjaan[0]->website){ echo $datapekerjaan[0]->website; }else{ echo "-"; }  ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Alamat </strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->alamat.". ".$datapekerjaan[0]->kota; ?>
                      <!-- Modal Ganti Email -->
                                <div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="labelkontak" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelkontak">Ubah Kontak & Alamat</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pekerjaan/editkon');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="<?php echo $datapekerjaan[0]->id_pekerjaan;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_telepon" class="col-sm-3 control-label">No. Telepon</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?php echo $datapekerjaan[0]->no_telepon; ?>" placeholder="Masukan No. telepon" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_fax" class="col-sm-3 control-label">No. Fax</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_fax" class="form-control" id="no_fax" value="<?php echo $datapekerjaan[0]->no_fax; ?>" placeholder="Masukan No. Fax" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="email" class="col-sm-3 control-label">Email</label>
                                          <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $datapekerjaan[0]->email; ?>" placeholder="Masukan Email" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="website" class="col-sm-3 control-label">Website</label>
                                          <div class="col-sm-8">
                                            <input type="website" name="website" class="form-control" id="website" value="<?php echo $datapekerjaan[0]->website; ?>" placeholder="Masukan Website">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="Alamat" class="col-sm-3 control-label">Alamat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $datapekerjaan[0]->alamat; ?>" placeholder="Masukan Alamat" required>
                                            <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Isikan nama jalan/dusun saja.</small>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="provinsi" class="col-sm-3 control-label">Propinsi</label>
                                          <div class="col-sm-8">
                                            <div class="input-group">
                                              <input class="form-control" type="text" disabled="TRUE" value="<?php echo $datapekerjaan[0]->propinsi; ?>">
                                              <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#kota">Ubah</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kota" class="col-sm-3 control-label">Kabupaten/Kota</label>
                                          <div class="col-sm-8">
                                            <div class="input-group">
                                              <input class="form-control" type="text" disabled="TRUE" value="<?php echo $datapekerjaan[0]->kota; ?>">
                                              <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#kota">Ubah</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Ubah</button>

                                                <button class="btn btn-danger pull-left" data-dismiss="modal" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-remove"></i> Hapus
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Batal</button>
                                       </form>
                                         </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!-- Modal Ganti Email -->
                                <div class="modal fade" id="kota" tabindex="-1" role="dialog" aria-labelledby="labelkota" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelkota">Ubah Provinsi & Kota/Kabupaten</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pekerjaan/editkota');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="<?php echo $datapekerjaan[0]->id_pekerjaan;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="provinsi" class="col-sm-3 control-label">Propinsi</label>
                                          <div class="col-sm-8">
                                            <select name="propinsi" class="form-control" id="provinsi">
                                              <option>- Select Provinsi -</option>
                                              <?php foreach($provinsi as $prov){
                                                echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                                              } ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kota" class="col-sm-3 control-label">Kabupaten/Kota</label>
                                          <div class="col-sm-8">
                                            <select name="kota" class="form-control" id="kabupaten">
                                              <option value=''>Select Kabupaten</option>
                                            </select>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Batal</button>
                                       </form>
                                         </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal --></td>
                    </tr>
                  </table>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
