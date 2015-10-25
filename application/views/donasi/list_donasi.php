<script type="text/javascript" src="<?= base_url('cssjs') ?>/jquery/jquery-1.9.1.min.js"></script>      
<script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<script>
    $(document).ready(function () {
        $('#data_donasi').DataTable({
            responsive: true
        });
    });
</script>

<div class="col-lg-12">
    <div class="page-header">
        <h2>Data Donasi</h2>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Donasi
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="data_donasi">
                        <thead>
                            <tr>
                                <th data-field="Donasi">Data Donasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($jumlah > 0) {
                                $no = 1;
                                foreach ($data as $row) {
                                    ?>
                                    <tr>
                                        <td>
                            <div class="col-lg-6">
                                <h4><?php echo isset($row->nama_anak) ? $row->nama_anak : ''; ?></h4>
                                <p style="font-size:12pt;">Tanggal Donasi : <?php echo isset($row->tgl_donasi) ? date('d-m-Y',strtotime($row->tgl_donasi)) : ''; ?><br/>
                                Jumlah Donasi : <?php echo isset($row->jumlah) ? number_format($row->jumlah,0,',','.') : ''; ?><br/>
                                Pesan : <?php echo isset($row->pesan) ? $row->pesan : ''; ?><br/>
                                Donatur : <?php echo isset($row->nama_donatur) ? $row->nama_donatur : ''; ?></p>
                                <p><a href="<?= base_url() ?>index.php/donasi/detail/<?= md5(sha1($row->id)) ?>" class="detail btn btn-primary" title="Detail"><img src="<?= base_url('images') ?>/detail.png" style="width:15px;height:15px;"> Detail</a>&nbsp;&nbsp;
                                            <?php if($row->status==0){ ?>
                                            <a href="<?= base_url() ?>index.php/donasi/edit/<?= md5(sha1($row->id)) ?>" class="edit btn btn-primary"  title="Edit"><img src="<?= base_url('images') ?>/edit.png" style="width:15px;height:15px;"> Ubah</a>&nbsp;&nbsp;&nbsp;
                                            <a href="<?= base_url() ?>index.php/donasi/delete/<?= md5(sha1($row->id)) ?>" class="delete btn btn-primary"  title="Delete" onclick="return confirm('Yakin hapus data?');"><img src="<?= base_url('images') ?>/delete.png" style="width:15px;height:15px;"> Hapus</a>
                                            <?php } ?></p>
                            </div> <div class="col-lg-3 thumbnail">
                                <?php
                                $hash_id = md5(sha1($row->id));
                                $filename = "images/donasi/" . $hash_id . ".jpg";
                                if (file_exists($filename)) {
                                        ?>
                                <a href="<?= base_url(); ?><?= $filename; ?>" alt="klik untuk melihat gambar" target="_blank">
                                        <img id="img"  class="img-rounded" src="<?= base_url(); ?><?= $filename; ?>" alt="Foto" style="height:200px;" class="img-thumbnail">                
                                </a>
                                        <?php
                                } else {
                                        ?>
                                        <img id="img"  class="img-rounded" src="<?= base_url(); ?>images/pengguna/noimage.jpg" alt="Foto" style="height:200px;" class="img-thumbnail">                                        
                                        <?php
                                }
                                ?>
                            </div>   </td>
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

