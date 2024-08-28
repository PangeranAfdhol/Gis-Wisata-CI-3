<div  class="col-sm-16">
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
                <th>Berita</th>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Baca Selanjutnya</th>
                <?php if ($this->session->userdata('username') <> ""){ ?>
                <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($berita as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_berita ?></td>
                    <td><img src="<?= base_url('gambar/'.$value->gambar)?>" width="150px"></td>
                    <td><?= $value->keterangan ?></td>
                    <td><?= $value->link ?></td>
                    <td>
                        <a href="<?= base_url('berita/edit/'.$value->id_berita) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('berita/hapus/'.$value->id_berita) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Data Ingin Dihapus....?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>


</div>