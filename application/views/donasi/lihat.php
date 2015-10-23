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
                
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" id="nama" value="<?= isset($nama)?$nama:''; ?>">

                        <label>Status bersekolah</label>
                        <?= form_dropdown('status_bersekolah', $status_bersekolah, isset($isi_status_bersekolah)?$isi_status_bersekolah:'', "class='form-control'") ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Jenis sekolah terakhir</label>
                        <?= form_dropdown('jenis_sekolah', $jenis_sekolah, isset($isi_jenis_sekolah)?$isi_jenis_sekolah:'', "class='form-control'") ?>	

                        <label>Tingkat sekolah terakhir</label>
                        <?= form_dropdown('tingkat_sekolah', $tingkat_sekolah, isset($isi_tingkat_sekolah)?$isi_tingkat_sekolah:'' , "class='form-control'") ?>						
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <button type="submit" class="btn btn-primary" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>														
			</form>
            <!-- /.row (nested) -->
            <br />
            <br />

            <div class="panel-body">
				<div class="row" style="padding-left:20px;padding-right:20px">	
					<?php
					if ($jumlah > 0) {
						$no = 1;
						foreach ($data as $row) {
							?>				
					<div class="col-lg-3 thumbnail">
						<div class="caption">
                             <h4 align="center"><?php echo isset($row->nama) ? $row->nama : ''; ?></h4>

                            <p align="center" style="font-size:11pt;"><?php echo isset($row->tanggal_lahir) ? (date('Y')-substr($row->tanggal_lahir,0,4)).' th' : ''; ?><br/>
							<?php echo isset($row->kota) ? $row->kota.', ' : ''; ?><?php echo isset($row->provinsi) ? $row->provinsi : ''; ?><br/>
							<?php echo isset($row->tingkat_sekolah) ? $row->tingkat_sekolah : ''; ?><br/>
							</p>
							<p align="center"><a href="<?= base_url() ?>index.php/anak/detail/<?= md5(sha1($row->id_anak)) ?>" class="btn btn-primary">Detail</a></p>

                            </p>
                        </div>
                        <div class="caption-btm"><strong><?php echo isset($row->nama) ? strtoupper($row->nama) : ''; ?></strong>, 
						<?php echo isset($row->tanggal_lahir) ? (date('Y')-substr($row->tanggal_lahir,0,4)).' th' : ''; ?></div>
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
						</table>
					</div>
							<?php $no++; ?>    
							<?php
						}
					}
					?>
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

