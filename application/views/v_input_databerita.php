<div class="col-sm-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Data Berita
        </div>
        <div class="panel-body">
            <?php
            // Notifikasi Gagal Upload
            if(isset($error_upload)){
                echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$error_upload.'</div>';
            }

            // validasi data tidak boleh kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

            // notifikasi pesan berhasil ditambahkan
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
                
            }   

            echo form_open_multipart('berita/input');
            ?>

            <div class="form-group">
                <label>Berita</label>
                <input name="nama_berita" placeholder="Berita" value="<?= set_value('nama_berita') ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" required />
            </div> 

            <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" placeholder="Keterangan"  value="<?= set_value('keterangan') ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Baca Lengkap</label>
                <input name="link" placeholder="Berita Lengkap" value="<?= set_value('link') ?>"class="form-control" />
            </div>
            
            <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <button type="reset" class="btn btn-sm btn-success">Reset</button>
            </div>




            <?php echo form_close(); ?>


        </div>
    </div>
</div>