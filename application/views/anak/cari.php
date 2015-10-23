<script type="text/javascript" src="<?= base_url('cssjs') ?>/jquery/jquery-1.9.1.min.js"></script>      
<script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<script>
    $(document).ready(function () {
        $('#data_anak').DataTable({
            responsive: true
        });
    });
</script>

<div class="col-lg-12">
    <div class="page-header">
        <h2>Data Anak</h2>
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
                <button type="submit" class="btn btn-primary" formaction="download2" name="submit2">&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;</button>

            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Data Tabel Anak
        </div>

        <div class="panel-body">
            <div class="dataTable_wrapper" style="overflow: auto">
                <table class="table table-striped table-bordered table-hover" id="data_anak">
                    <thead>
                        <tr>
                            <th data-field="Nomor">No.</th>
                            <th data-field="Nama">Nama</th>
                            <th data-field="JenisKelamin">Jenis Kelamin</th>
                            <th data-field="Nama">Umur</th>
                            <th data-field="Sekolah">Sekolah</th>
                            <th data-field="Alamat">Alamat</th>
                            <th data-field="Kota">Kota</th>
                            <th data-field="Provinsi">Provinsi</th>
                            <th data-field="Status">Status bersekolah</th>
                            <th data-field="Jenis">Jenis sekolah terakhir</th>
                            <th data-field="Tingkat">Tingkat sekolah terakhir</th>
                            <th data-field="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlah > 0) {
                            $no = 1;
                            foreach ($data as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo isset($row->nama) ? $row->nama : ''; ?></td>
                                    <td><?php echo isset($row->jenis_kelamin) ? $row->jenis_kelamin : ''; ?></td>
                                    <?php $umur = isset($row->tanggal_lahir) ? (date("Y") - (substr($row->tanggal_lahir, 0, 4))): '';?>
                                    <td><?= $umur ?></td>
                                    <td><?php echo isset($row->sekolah) ? $row->sekolah : ''; ?></td>
                                    <td><?php echo isset($row->alamat) ? $row->alamat : ''; ?></td>
                                    <td><?php echo isset($row->kota) ? $row->kota : ''; ?></td>
                                    <td><?php echo isset($row->provinsi) ? $row->provinsi : ''; ?></td>
                                    <td><?php echo isset($row->status_bersekolah) ? $row->status_bersekolah : ''; ?></td>
                                    <td><?php echo isset($row->jenis_sekolah) ? $row->jenis_sekolah : ''; ?></td>
                                    <td><?php echo isset($row->tingkat_sekolah) ? $row->tingkat_sekolah : ''; ?></td>
                                    <td align="center">
                                        <a href="<?= base_url() ?>index.php/anak/detail/<?= md5(sha1($row->id_anak)) ?>" class="detail"  title="Detail"><img src="<?= base_url('images') ?>/detail.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;
                                        <a href="<?= base_url() ?>index.php/anak/edit/<?= md5(sha1($row->id_anak)) ?>" class="edit"  title="Edit"><img src="<?= base_url('images') ?>/edit.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;&nbsp;
                                        <a href="<?= base_url() ?>index.php/anak/hapus/<?= md5(sha1($row->id_anak)) ?>" class="delete"  title="Delete" onclick="return confirm('Yakin hapus data?');"><img src="<?= base_url('images') ?>/delete.png" style="width:15px;height:15px;"></a>
                                    </td> 
                                </tr>
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

