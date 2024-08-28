<div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">List Wisata</div>
                <div class="panel-body">


                <table class="table table-responsive table-bordered" id="dataTables-example">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Nama Wisata</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Luas</th>
                <th>Keterangan</th>
                <th>Action</th>
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
                    <td><?= $value->keterangan ?></td>
                    <td><a href="<?= base_url('webgis/detail/'.$value->id_wisata)?>" class="btn btn-sm btn-success">Detail</a></td>
                </tr>
        <?php } ?>
    </tbody>
    </table>

                </div>
            </div>
       </div>
    </div>