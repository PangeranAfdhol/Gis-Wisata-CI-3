<div class="row">
<link rel="stylesheet" type="text/css" href="/publik/style.css">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <article class= "mb-5">
            <tbody>
            <tr><br>
            <center><b>
                <h1><th><?= $berita->nama_berita ?></th></center></b></h1>
            </tr>
            <h1>---------------------------------------------------------------------------------------------------------</h1>
                <center><img src="<?= base_url('gambar/'.$berita->gambar) ?>" width="70%"><br></center>
            <h1>---------------------------------------------------------------------------------------------------------</h1>
         <tr>
            <h4><th><?= $berita->link ?></th><h4><br>
         </tr>
         <tr>
         <a class="btn btn-sm btn-primary" href="<?= base_url('webgis/berita')?>">Kembali</a></h4>
         </tr>

            </tbody>

            
            </div>
        </div>
    </div>