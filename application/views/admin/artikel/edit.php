<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="box box-primary">
  <div class="box-header with-border">
    <form class="">
        <?php echo form_open_multipart('Admin/Artikel/edit');
           echo form_hidden('id_artikel',$artikel['id_artikel']);
        ?>
        <div>
            <div class="widget-header"> <i class="icon-th-list"></i>
                <b><h5>Judul Artikel</h5></b>
            </div>
            <div class="widget-content">
                <input type="text" required=""  value="<?php echo $artikel['judul'] ?>" name="judul" class="form-control">
            </div>
        </div>
        <div>
            <div class="widget-header"> <i class="icon-picture"></i>
                <b><h5>Gambar Artikel</h5></b>
            </div>
            <div class="widget-content">
                <input type="file" name="userfile"  class="form-control">
            </div>
        </div>
        <div>
            <div class="widget">
                <div class="widget-header"> <i class="icon-th-list"></i>
                    <b><h5>Kategori Artikel</h5></b>
                </div>
                <div class="widget-content">
                    <?php echo cmb_dinamis('id_kategori', 'kategori', 'nama_kategori', 'id_kategori',$artikel['id_artikel']) ?>
                </div>
            </div>
        </div>
        <div class="span8">
          <div class="widget">
              <div class="widget-header"> <i class="icon-th-list"></i>
                  <h3>Nulis Artikel</h3>
              </div>
              <div class="widget-content">
                 <textarea  name="isi_artikel" rows="12" cols="133" id="editor" ><?php echo $artikel['isi_artikel'] ?></textarea>
              </div>
              <div>

                  <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                  <?php echo anchor('Admin/Artikel', 'Kembali', array('class' => 'btn btn-success btn-sm"')) ?>
              </div>
          </div>
      </div>
      <?php echo form_close(); ?>
      </form>
    </div>
  </div>
</div>
  </section>
</div>
