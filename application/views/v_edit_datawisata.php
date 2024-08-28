<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Lokasi Wisata
        </div>
        <div class="panel-body">
            
        <div id="mapid" style="height: 500px;"></div>


        </div>
    </div>
</div>


<div class="col-sm-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Data
        </div>
        <div class="panel-body">
            <?php
            // Notifikasi Gagal Upload
            if(isset($error_upload)){
                echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$error_upload.'</div>';
            }
            
            // validasi data tidak boleh kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

            // notifikasi pesan berhasil disimpan

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
                
            }   

            echo form_open_multipart('wisata/edit/'.$wisata->id_wisata);
            ?>

            <div class="form-group">
                <label>Nama Objek Wisata</label>
                <input name="nama_objek_wisata" placeholder="Nama Objek Wisata" value="<?= $wisata->nama_objek_wisata ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Desa</label>
                <input name="desa" placeholder="Desa" value="<?= $wisata->desa ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Kecamatan</label>
                <input name="kecamatan" placeholder="Kecamatan" value="<?= $wisata->kecamatan ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Luas</label>
                <input name="luas" placeholder="Luas" value="<?= $wisata->luas ?>"class="form-control" />
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input id="Latitude" name="latitude" placeholder="Latitude" value="<?= $wisata->latitude ?>"class="form-control" readonly />
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input id="Longitude" name="longitude" placeholder="Longitude" value="<?= $wisata->longitude ?>"class="form-control" readonly />
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" placeholder="Keterangan" value="<?= $wisata->keterangan ?>"class="form-control" />
            </div> 
            
            <img src="<?= base_url('gambar/' . $wisata->gambar) ?>" width="120px">

            <div class="form-group">
                <label>Ganti Gambar</label>
                <input type="file" name="gambar"  class="form-control" />
            </div> 

            <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <button type="reset" class="btn btn-sm btn-success">Reset</button>
            </div>




            <?php echo form_close(); ?>


        </div>
    </div>
</div>

<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[<?= $wisata->latitude ?>, <?= $wisata->longitude ?>];	
}

var mymap = L.map('mapid').setView([<?= $wisata->latitude ?>, <?= $wisata->longitude ?>], 14);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
}).addTo(mymap);

mymap.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	mymap.panTo(position);
});
mymap.addLayer(marker);

</script>