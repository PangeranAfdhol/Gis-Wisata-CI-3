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
                <th>Gambar</th>
                <th>Keterangan</th>
                <?php if ($this->session->userdata('username') <> ""){ ?>
                <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($budaya as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><img src="<?= base_url('gambar/'.$value->gambar)?>" width="100%"></td>
                    <td><?= $value->keterangan ?></td>
                    <td>
                        <a href="<?= base_url('budaya/edit/'.$value->id_budaya) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('budaya/hapus/'.$value->id_budaya) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Data Ingin Dihapus....?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>


</div>