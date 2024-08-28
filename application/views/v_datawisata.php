<div  class="col-sm-12">
    <?php
    // Notifikasi Edit Berhasi
     if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
        
    }   

?>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Wisata</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Luas</th>
                <th>Gambar</th>
                <?php if ($this->session->userdata('username') <> ""){ ?>
                <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($wisata as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_objek_wisata ?></td>
                    <td><?= $value->desa ?></td>
                    <td><?= $value->kecamatan ?></td>
                    <td><?= $value->luas ?></td>
                    <td><img src="<?= base_url('gambar/'.$value->gambar)?>" width="150px"></td>
                    <td>
                        <a href="<?= base_url('wisata/edit/'.$value->id_wisata) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('wisata/hapus/'.$value->id_wisata) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Data Ingin Dihapus....?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>


</div>