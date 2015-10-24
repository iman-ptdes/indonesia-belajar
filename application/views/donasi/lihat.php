<script type="text/javascript" src="<?= base_url('cssjs') ?>/jquery/jquery-1.9.1.min.js"></script>      
<script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
.caption-btm{
	background: rgba(0,0,0,0.6);
	width: 98%;
	height: 30px;
	padding-left: 10px;
	position: absolute;
	bottom: 4px;
	color: #fff;
}
.caption {
	display: none;
	position: absolute;
	top: 0;
	left: 0;
	background: rgba(0, 0, 0, 0.4);
	width: 100%;
	height: 100%;
	color:#fff !important;
}
.caption p {
	padding:6px;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
        $('#data_anak').DataTable({
            responsive: true
        });
	$('.thumbnail').hover(
		function () {
			$(this).find('.caption').slideDown(250);
			$(this).find('.caption-btm').hide(250);
		},
		function () {
			$(this).find('.caption').slideUp(250);
			$(this).find('.caption-btm').show(250);
	});
});
</script>
<div class="col-lg-12">
    <div class="page-header">
        <h2>Data Anak</h2>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Anak Tidak / Putus Sekolah
            </div>
            <?= form_open('') ?>	
    <div class="row" style="padding-left:20px;padding-right:20px">
        <div class="col-lg-3">
            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="nama" id="nama" value="<?= isset($nama) ? $nama : ''; ?>">
                <label class="col-lg-12" style="padding-left: 0px">Umur</label>
                <div class="col-lg-4" style="padding-left: 0px;padding-right: 0px">
                    <input class="form-control" name="umur_awal" id="umur_awal" value="<?= isset($umur_awal) ? $umur_awal : ''; ?>" >
                </div>
                <div class="col-lg-4" style="padding-left: 0px;padding-right: 0px">&nbsp;&nbsp;sampai&nbsp;&nbsp;</div>
                <div class="col-lg-4" style="padding-left: 0px;padding-right: 0px">
                    <input class="form-control" name="umur_akhir" id="umur_akhir" value="<?= isset($umur_akhir) ? $umur_akhir : ''; ?>" >
                </div>
                <label>Jenis Kelamin</label>
                <?= form_dropdown('jenis_kelamin', $jenis_kelamin, isset($isi_jenis_kelamin) ? $isi_jenis_kelamin : '', "class='form-control'") ?>
                <label>Sekolah Terakhir</label>
                <input class="form-control" name="sekolah" id="sekolah" value="<?= isset($sekolah) ? $sekolah : ''; ?>">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" name="alamat" id="alamat" value="<?= isset($alamat) ? $alamat : ''; ?>">
                <label>Kota</label>
                <input class="form-control" name="kota" id="kota" value="<?= isset($kota) ? $kota : ''; ?>">
                <label>Provinsi</label>
                <input class="form-control" name="provinsi" id="provinsi" value="<?= isset($provinsi) ? $provinsi : ''; ?>">                        
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Status bersekolah</label>
                <?= form_dropdown('status_bersekolah', $status_bersekolah, isset($isi_status_bersekolah) ? $isi_status_bersekolah : '', "class='form-control'") ?>

                <label>Jenis sekolah terakhir</label>
                <?= form_dropdown('jenis_sekolah', $jenis_sekolah, isset($isi_jenis_sekolah) ? $isi_jenis_sekolah : '', "class='form-control'") ?>	

                <label>Tingkat sekolah terakhir</label>
                <?= form_dropdown('tingkat_sekolah', $tingkat_sekolah, isset($isi_tingkat_sekolah) ? $isi_tingkat_sekolah : '', "class='form-control'") ?>	
                </br>
                <input type="hidden" name="cari"  value="cari">
                <button type="submit" class="btn btn-primary" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
    </div>
</form>
            <!-- /.row (nested) -->
            <br />
            <br />

            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-hover" id="data_anak">
                        <thead>
                            <tr>
                                <th data-field="Anak">Data Anak</th>
                            </tr>
                        </thead>
                        <tbody>
					<?php
					if ($jumlah > 0) {
						$no = 1;
						foreach ($data as $row) {
							?>
                        <tr><td>
                            <div class="col-lg-3 thumbnail">
                                <?php
                                $hash_id = md5(sha1($row->id_anak));
                                $filename = "images/anak/" . $hash_id . ".jpg";
                                if (file_exists($filename)) {
                                        ?>
                                        <img id="img"  class="img-rounded" src="<?= base_url(); ?><?= $filename; ?>" alt="Foto" style="height:200px;" class="img-thumbnail">                
                                        <?php
                                } else {
                                        ?>
                                        <img id="img"  class="img-rounded" src="<?= base_url(); ?>images/pengguna/noimage.jpg" alt="Foto" style="height:200px;" class="img-thumbnail">                                        
                                        <?php
                                }
                                ?>
                            </div>
                            <div class="col-lg-6">
                                <h4><?php echo isset($row->nama) ? $row->nama : ''; ?></h4>
                                <?php echo isset($row->jenis_kelamin) ? $row->jenis_kelamin.', ' : ''; ?><?php $umur = isset($row->tanggal_lahir) ? (date("Y") - (substr($row->tanggal_lahir, 0, 4))): ''; echo $umur.' th'?><br/>
                                <p style="font-size:12pt;"><?php echo isset($row->alamat) ? $row->alamat : ''; ?><br/>
                                <?php echo isset($row->kota) ? $row->kota.', ' : ''; ?><?php echo isset($row->provinsi) ? $row->provinsi : ''; ?><br/>
                                Alasan Tidak Bersekolah : <?php echo isset($row->alasan) ? $row->alasan : ''; ?></p>
                                <p><a href="<?= base_url() ?>index.php/anak/detail/<?= md5(sha1($row->id_anak)) ?>" class="btn btn-primary">Detail</a></p>
                            </div>    
                            </td></tr>
							<?php $no++; ?>    
							<?php
						}
					}
					?>
                        </tbody>
                        </table>
                    </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.row (nested) -->
    <br />
</div>

