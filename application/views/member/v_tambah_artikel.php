<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="box box-primary">
        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/artikel/tambah');?>" method="post">
            <div>
                <div class="widget-header"> <i class="icon-th-list"></i>
                    <h3>Judul Artikel</h3>
                </div>
                <div class="widget-content">
                    <input type="text" required=""  name="judul" class="form-control">
                </div>
            </div>
            <div>
                <div class="widget-header"> <i class="icon-picture"></i>
                    <h3>Gambar Artikel</h3>
                </div>
                <?php echo form_open_multipart('Admin/artikel/add') ?>
                <div class="widget-content">
                    <input type="file" name="userfile" class="form-control">
                </div>
            </div>

                <div class="widget">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Kategori Artikel</h3>
                    </div>
                    <div class="widget-content">
                        <?php echo cmb_dinamis('id_kategori', 'kategori', 'nama_kategori', 'id_kategori') ?>
                    </div>
                </div>


                <div class="widget">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Nulis Artikel</h3>
                    </div>
                    <div class="widget-content">

                        <textarea  name="isi_artikel" rows="12" cols="133"  id="editor" ></textarea>
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-primary pull-right">Tambah</button>
                        <?php echo anchor('Admin/Artikel', 'Kembali', array('class' => 'btn btn-success btn-sm"')) ?>
                    </div>
                </div>

            <?php echo form_close(); ?>

      </form>
    </div>
  </section>
</div>
