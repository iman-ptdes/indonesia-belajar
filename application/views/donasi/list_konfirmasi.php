<script type="text/javascript" src="<?= base_url('cssjs') ?>/jquery/jquery-1.9.1.min.js"></script>      
<script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<script>
    $(document).ready(function () {
        $('#data_konfirmasi').DataTable({
            responsive: true
        });
        $('#data_donasi').DataTable({
            responsive: true
        });
    });
</script>

<div class="col-lg-12">
    <div class="page-header">
        <h2>Data Donasi</h2>
    </div>
    <ul class="nav nav-tabs">
        <li class="active" id ="tab1"><a href="#data_konfirmasi" data-toggle="tab">Konfirmasi Donasi<i class="fa"></i></a></li>
        <li id="tab2"  ><a href="#data_donasi" data-toggle="tab">Donasi Masuk<i class="fa"></i></a></li>
    </ul>
    <div class="tab-content">
            <div class="tab-pane active" id="data_konfirmasi">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="data_konfirmasi">
                        <thead>
                            <tr>
                                <th data-field="Nomor">No.</th>
                                <th data-field="Tanggal">Tanggal Donasi</th>
                                <th data-field="Anak">Nama Anak</th>
                                <th data-field="Jumlah">Jumlah</th>
                                <th data-field="Pesan">Pesan</th>
                                <th data-field="Donatur">Donatur</th>
                                <th data-field="Aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($jumlah1 > 0) {
                                $no = 1;
                                foreach ($data1 as $row) {
                                    ?>
                                    <tr>
                                        <td align="right"><?php echo $no; ?></td>
                                        <td align="center"><?php echo isset($row->tgl_donasi) ? date('d/m/Y',strtotime($row->tgl_donasi)) : ''; ?></td>
                                        <td><?php echo isset($row->nama_anak) ? $row->nama_anak : ''; ?></td>
                                        <td align="right"><?php echo isset($row->jumlah) ? number_format($row->jumlah,0,',','.') : ''; ?></td>
                                        <td><?php echo isset($row->pesan) ? $row->pesan : ''; ?></td>
                                        <td><?php echo isset($row->nama_donatur) ? $row->nama_donatur : ''; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() ?>index.php/donasi/detail/<?= md5(sha1($row->id)) ?>" class="detail"  title="Detail"><img src="<?= base_url('images') ?>/detail.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;
                                            <a href="<?= base_url() ?>index.php/donasi/diterima/<?= md5(sha1($row->id)) ?>" class="btn btn-primary">Sudah Diterima</a>&nbsp;&nbsp;&nbsp;
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
        <div class="tab-pane" id="data_donasi">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="data_donasi">
                        <thead>
                            <tr>
                                <th data-field="Nomor">No.</th>
                                <th data-field="Tanggal">Tanggal Donasi</th>
                                <th data-field="Anak">Nama Anak</th>
                                <th data-field="Jumlah">Jumlah</th>
                                <th data-field="Pesan">Pesan</th>
                                <th data-field="Donatur">Donatur</th>
                                <th data-field="Aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($jumlah2 > 0) {
                                $no = 1;
                                foreach ($data2 as $row) {
                                    ?>
                                    <tr>
                                        <td align="right"><?php echo $no; ?></td>
                                        <td align="center"><?php echo isset($row->tgl_donasi) ? date('d/m/Y',strtotime($row->tgl_donasi)) : ''; ?></td>
                                        <td><?php echo isset($row->nama_anak) ? $row->nama_anak : ''; ?></td>
                                        <td align="right"><?php echo isset($row->jumlah) ? number_format($row->jumlah,0,',','.') : ''; ?></td>
                                        <td><?php echo isset($row->pesan) ? $row->pesan : ''; ?></td>
                                        <td><?php echo isset($row->nama_donatur) ? $row->nama_donatur : ''; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() ?>index.php/donasi/detail/<?= md5(sha1($row->id)) ?>" class="detail"  title="Detail"><img src="<?= base_url('images') ?>/detail.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;
                                            <a href="<?= base_url() ?>index.php/donasi/dibatalkan/<?= md5(sha1($row->id)) ?>" class="btn btn-primary">Belum Diterima</a>&nbsp;&nbsp;&nbsp;
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
    </div>
    <!-- /.row (nested) -->
    <br />
</div>

