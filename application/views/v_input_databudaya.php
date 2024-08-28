
<div class="col-sm-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Data Budaya
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

            echo form_open_multipart('budaya/input');
            ?>

            <div class="form-group">
                <label>Nama Budaya</label>
                <input name="nama_budaya" placeholder="Nama Budaya" value="<?= set_value('nama_budaya') ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" required />
            </div> 

            <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan') ?>"class="form-control" />
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