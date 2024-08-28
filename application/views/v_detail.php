<div class="row">
<link rel="stylesheet" type="text/css" href="/publik/style.css">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Lokasi Wisata</div>
                <div class="panel-body">

                <div id="mapid" style="height: 700px;"></div>

            </div>
        </div>
    </div>

    <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Gambar Wisata</div>
                <div class="panel-body">

            <img src="<?= base_url('gambar/'.$wisata->gambar) ?>" width="100%" height="500px">
            </div>
        </div>
    </div>

    <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Wisata</div>
                <div class="panel-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="200px">Nama Objek Wisata</th>
                                <th width="20px">:</th>
                                <th><?= $wisata->nama_objek_wisata ?></th>
                            </tr>
                            <tr>
                                <th>Desa</th>
                                <th>:</th>
                                <th><?= $wisata->desa ?></th>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <th>:</th>
                                <th><?= $wisata->kecamatan ?></th>
                            </tr>
                            <tr>
                                <th>Luas</th>
                                <th>:</th>
                                <th><?= $wisata->luas ?></th>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <th>:</th>
                                <th><?= $wisata->latitude ?></th>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <th>:</th>
                                <th><?= $wisata->longitude ?></th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>:</th>
                                <th><?= $wisata->keterangan ?></th>
                            </tr>
                        </thead>
                    </table>


            </div>
        </div>
    </div>
</div>

<script>
    var mymap = L.map('mapid').setView([<?= $wisata->latitude ?>,<?= $wisata->longitude ?>], 20);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
}).addTo(mymap);

var icon_sekolah = L.icon({
    iconUrl: '<?= base_url('icon/sekolah.png') ?>',
    iconSize:     [35, 45],
});

		L.marker([<?= $wisata->latitude ?>, <?= $wisata->longitude ?>],{icon:icon_sekolah}).addTo(mymap)
		.bindPopup("<img src=' <?= base_url('gambar/'.$wisata->gambar) ?>' width='100%'>"+
        "<b>Nama Objek Wisata : <?= $wisata->nama_objek_wisata ?></b></br>"+
		"Desa : <?= $wisata->desa ?></br>"+
		"kecamatan : <?= $wisata->kecamatan ?></br>"+
		"luas : <?= $wisata->luas ?></br>"+
		"keterangan : <?= $wisata->keterangan ?></br>").openPopup();
</script>