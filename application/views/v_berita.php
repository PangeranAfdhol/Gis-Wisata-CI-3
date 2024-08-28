<div class="row">
        <div class="col-sm-12">
        <link rel="stylesheet" type="text/css" href="/publik/style.css">
            <div class="panel panel-primary">
                <div class="panel-heading">List Berita</div>
            <div class="container mt-4">            
                <article class= "mb-5">
 
        <tbody>
            <?php $no=1; foreach ($berita as $key => $value) { ?>
                <tr><br>
                <h2><b><td>⭐<?= $value->nama_berita ?></td><br></b></h2>
                    <h1>-----------------------------------------------------------------------------------------------</h1>
                    <center><td><img src="<?= base_url('gambar/'.$value->gambar)?>" width="50%"></td><br></center>
                    <h1>-----------------------------------------------------------------------------------------------</h1>
                    <p><td><?= $value->keterangan ?></td></p><br>
                    <td><a href="<?= base_url('webgis/detailberita/'.$value->id_berita)?>" class="btn-list">Baca Selanjutnya</a></td>
                    <h1>-----------------------------------------------------------------------------------------------</h1>
                </tr>
        <?php } ?>
    </tbody>
    </table>
            </div>
        </artikel>
                </div>
            </div>
       </div>
    </div>
    </div>
                </div>
            </div>