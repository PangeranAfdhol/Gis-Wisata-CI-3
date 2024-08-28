<div id="mapid" style="height: 700px;"></div>

<script>

var mymap = L.map('mapid').setView([0.861767, 100.295157], 14);
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

	<?php foreach ($wisata as $key => $value) { ?>
		L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>],{icon:icon_sekolah}).addTo(mymap)
		.bindPopup("<b>Nama Objek Wisata : <?= $value->nama_objek_wisata ?></b></br>"+
		"Desa : <?= $value->desa ?></br>"+
		"kecamatan : <?= $value->kecamatan ?></br>"+
		"luas : <?= $value->luas ?></br>"+
		"keterangan : <?= $value->keterangan ?></br>");
	<?php } ?>

</script>