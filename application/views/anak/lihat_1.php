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
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Tabel Anak <style="float:right">d</style>
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
                <a class="btn btn-primary" href="<?= base_url() ?>index.php/anak/tambah">&nbsp;Tambah Data&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" formaction="download" name="submit2">&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;</button>
            </div>														
</form>
            <!-- /.row (nested) -->
            <br />
            <br />

            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="data_anak">
                        <thead>
                            <tr>
                                <th data-field="Nomor">No.</th>
                                <th data-field="Nama">Nama</th>
                                <th data-field="Sekolah">Sekolah</th>
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
                                        <td><?php echo isset($row->sekolah) ? $row->sekolah : ''; ?></td>
                                        <td><?php echo isset($row->status_bersekolah) ? $row->status_bersekolah : ''; ?></td>
                                        <td><?php echo isset($row->jenis_sekolah) ? $row->jenis_sekolah : ''; ?></td>
                                        <td><?php echo isset($row->tingkat_sekolah) ? $row->tingkat_sekolah : ''; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() ?>index.php/anak/detail/<?= md5(sha1($row->id_anak)) ?>" class="detail"  title="Detail"><img src="<?= base_url('images') ?>/detail.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;
                                            <a href="<?= base_url() ?>index.php/anak/edit/<?= md5(sha1($row->id_anak)) ?>" class="edit"  title="Edit"><img src="<?= base_url('images') ?>/edit.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;&nbsp;
                                            <a href="<?= base_url() ?>index.php/anak/delete/<?= md5(sha1($row->id_anak)) ?>" class="delete"  title="Delete" onclick="return confirm('Yakin hapus data?');"><img src="<?= base_url('images') ?>/delete.png" style="width:15px;height:15px;"></a>
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

