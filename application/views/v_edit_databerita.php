<div class="col-sm-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Berita
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

            // notifikasi pesan berhasil disimpan

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
                
            }   

            echo form_open_multipart('berita/edit/'.$berita->id_berita);
            ?>

            <div class="form-group">
                <label>Berita</label>
                <input name="nama_berita" placeholder="Berita" value="<?= $berita->nama_berita ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" placeholder="Keterangan" value="<?= $berita->keterangan ?>"class="form-control" />
            </div> 
            
            <img src="<?= base_url('gambar/' . $berita->gambar) ?>" width="120px">

            <div class="form-group">
                <label>Ganti Gambar</label>
                <input type="file" name="gambar"  class="form-control" />
            </div>
            
            <div class="form-group">
                <label>Baca Selanjutnya</label>
                <input name="link" placeholder="Link" value="<?= set_value('link') ?>"class="form-control" />
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
