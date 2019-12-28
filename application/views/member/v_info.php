<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-graduation-cap"></i> Lowongan Pekerjaan
   </h1>
   <br>
   <div class="widget-header"><?php echo anchor('member/info/tambah_artikel', 'Tambah Artikel', array('class' => 'btn btn-success btn-sm"')) ?>
  </section>
  <!-- Main content -->
  <section class="content">
  <?php if ($this->session->flashdata('msg_success')) { ?>
          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <i class="glyphicon glyphicon-info-sign"></i> <?php echo $this->session->flashdata('msg_success');?>
          </div>
      <?php } ?>
      <?php if (validation_errors()) {?>
                  <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo validation_errors();?>
                </div>
      <?php } ?>

      <?php if ($dataartikel) {
          foreach ($dataartikel as $artikel) { ?>
      <!-- Default box -->
      <div class="box box-warning">
          <div class="box-body">
              <div class="box-tools pull-right">
                 <a href="<?php echo site_url('member/info/detail/'.$artikel->id_artikel); ?>"><i class="glyphicon glyphicon-check text-primary"></i></a>
              </div>
              <table>
                  <tr>
                      <td>

                          <?php
                              $loc = base_url('uploads/artikel/'.$artikel->foto);
                              echo"<img align='center' height=150px width=300px src=$loc />";
                          ?>
                      </td>
                      <td class="col-md-9">
                        <table>
                            <tr>
                                <td style="color:#009aea"><strong>tanggal posting</strong> </td>
                                <td>: <?php echo $artikel->tanggal; ?></td>
                            </tr>
                            <tr>
                                <td style="color:#009aea"><strong>konten</strong> </td>
                                <td>: <?php echo $artikel->judul; ?></td>
                            </tr>
                            <tr>
                                <td style="color:#009aea"><strong>isi konten</strong> </td>
                                <td>:
                                <p><?php $isi=$artikel->isi_artikel; ?>
                                   <?php echo $isi=character_limiter($isi,200); ?>
                                </p>
                                </td>
                            </tr>
                        </table>
                      </td>
                  </tr>
              </table>
          </div>
         <!-- /.box-body -->
      </div>
        <!-- /.box -->
      <?php
          }
      }else{ ?>
          <div class="alert alert-warning">
             <i class="glyphicon glyphicon-remove"></i> Data tidak tersedia.
          </div>
      <?php } ?>
    <?php if ($dataartikel) { ?>
      <div class="clearfix text-center">
          <ul class="pagination pagination-md no-margin">
              <?php
                  echo $this->pagination->create_links();
              ?>
          </ul>
      </div>
      <?php
          }
       ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
