<div class="row">
<link rel="stylesheet" type="text/css" href="/publik/style.css">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Detail Budaya</div>
                <article class= "mb-5">
            <tbody>
            <tr><br>
            <center><b>
                <h1><th><?= $budaya->nama_budaya ?></th></center></b></h1>
            </tr>
            <h1>---------------------------------------------------------------------------------------------------------</h1>
                <img src="<?= base_url('gambar/'.$budaya->gambar) ?>" width="100%"><br>
            <h1>---------------------------------------------------------------------------------------------------------</h1>
         <tr>
            <h4><p><th><?= $budaya->keterangan ?></th></p><h4><br>
         </tr>
         <tr>
         <a class="btn btn-sm btn-primary" href="<?= base_url('webgis/list_budaya')?>">Kembali</a></h4>
         </tr>

            </tbody>

            
            </div>
        </div>
    </div>
