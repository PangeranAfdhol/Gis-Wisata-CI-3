<div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">List Budaya</div>
                <div class="panel-body">


                <table class="table table-responsive table-bordered" id="dataTables-example">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($budaya as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><img src="<?= base_url('gambar/'.$value->gambar)?>" width="100%"></td>
                    <td><?= $value->keterangan ?></td>
                    <td><a href="<?= base_url('webgis/detailbudaya/'.$value->id_budaya)?>" class="btn btn-sm btn-success">Detail Budaya</a></td>
                </tr>
        <?php } ?>
    </tbody>
    </table>

                </div>
            </div>
       </div>
    </div>