<script type="text/javascript" src="<?= base_url('cssjs') ?>/jquery/jquery-1.9.1.min.js"></script>      
<script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<script>
    $(document).ready(function () {
        $('#data_pengguna').DataTable({
            responsive: true
        });
    });
</script>

<div class="col-lg-10 col-lg-offset-1">
    <div class="page-header">
        <h2>Data Pengguna</h2>
    </div>
    <?= form_open('') ?>	
    <div class="row" style="padding-left:20px;padding-right:20px">

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" id="nama" value="<?= isset($nama) ? $nama : ''; ?>">

                        <label>Username</label>
                        <input class="form-control" name="username" id="nama" value="<?= isset($username) ? $username : ''; ?>">

                        <?php if ($this->input->post('group_pengguna') == 1) { ?>
                            <label>Group Pengguna</label>
                            <?= form_dropdown('group_pengguna', $group_pengguna, isset($isi_group_pengguna) ? $isi_group_pengguna : '', "class='form-control'") ?>	
                        <?php } ?>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php if ($this->session->userdata('id_pengguna_group') == 1) { ?>
                        <label>Status</label>
                        <?= form_dropdown('status_pengguna', $status_pengguna, isset($isi_status_pengguna) ? $isi_status_pengguna : '', "class='form-control'") ?>
                        <?php } ?>
                        <label>Jenis Pengguna</label>
                        <?= form_dropdown('jenis_pengguna', $jenis_pengguna, isset($isi_jenis_pengguna) ? $isi_jenis_pengguna : '', "class='form-control'") ?>	
                        </br>
                        <input type="hidden" name="cari"  value="cari">
                        <button type="submit" class="btn btn-primary" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>												
           </form>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Data Tabel Anak
        </div>
            <!-- /.row (nested) -->
            <div class="panel-body">
                
                <div class="dataTable_wrapper">
                    <table class="table table-hover" id="data_pengguna">
                        <thead>
                            <tr>
                                <th data-field="Anak"></th>
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
                                            
                                            <div class="col-lg-2 thumbnail">
                                                <?php
                                                $hash_id = md5(sha1($row->id_pengguna));
                                                $filename = "images/pengguna/" . $hash_id . ".jpg";
                                                if (file_exists($filename)) {
                                                    ?>
                                                    <img id="img"  class="img-rounded" src="<?= base_url(); ?><?= $filename; ?>" alt="Foto" style="height:150px;" class="img-thumbnail">                
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img id="img"  class="img-rounded" src="<?= base_url(); ?>images/pengguna/noimage.jpg" alt="Foto" style="height:150px;" class="img-thumbnail">                                        
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <h4><?php echo isset($row->nama) ? $row->nama : ''; ?></h4>
                                                
                                                <p style="font-size:12pt;">
                                                    <?php echo isset($row->alamat) ? $row->alamat : ''; ?>
                                                </p>
                                                <p style="font-size:12pt;">
                                                    <?php echo isset($row->kota) ? $row->kota . ', ' : ''; ?><?php echo isset($row->provinsi) ? $row->provinsi : ''; ?><br/>
                                                </p>
                                                
                                                <p>
                                                    <a href="<?= base_url() ?>index.php/pengguna/detail/<?= md5(sha1($row->id_pengguna)) ?>" class="btn btn-primary">Detail</a>&nbsp;
                                                    <?php if ($this->session->userdata('id_pengguna_group') == 1) { ?>
                                                        <a href="<?= base_url() ?>index.php/pengguna/edit/<?= md5(sha1($row->id_pengguna)) ?>" class="btn btn-primary" >Edit</a>&nbsp;
                                                        <?php
                                                        $status = isset($row->status) ? $row->status : '';
                                                        if ($status == 1) { ?>
                                                            <a href="<?= base_url() ?>index.php/pengguna/nonaktif/<?= md5(sha1($row->id_pengguna)) ?>" class="btn btn-primary" onclick="return confirm('Anda ingin menonaktifkan pengguna?');">Non Aktifkan Pengguna</a>&nbsp;
                                                            <?php } else { ?>	
                                                            <a href="<?= base_url() ?>index.php/pengguna/aktif/<?= md5(sha1($row->id_pengguna)) ?>" class="btn btn-primary" onclick="return confirm('Anda ingin menonaktifkan pengguna?');">Aktifkan Pengguna</a>&nbsp;
                                                            <a href="<?= base_url() ?>index.php/anak/hapus/<?= md5(sha1($row->id_pengguna)) ?>" class="btn btn-primary" onclick="return confirm('Yakin hapus data?');">Hapus</a>&nbsp;
                                                        <?php } ?>
                                                            <a href="<?= base_url() ?>index.php/anak/hapus/<?= md5(sha1($row->id_pengguna)) ?>" class="btn btn-primary" onclick="return confirm('Yakin hapus data?');">Hapus</a>&nbsp;
                                                    <?php } ?>
                                                </p>
                                            </div>
                                                </div>
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
                
                
<!--                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="data_pengguna">
                        <thead>
                            <tr>
                                <th data-field="Nomor">No.</th>
                                <th data-field="Nama">Nama</th>
                                <?php if ($this->input->post('group_pengguna') == 1) { ?>
                                    <th data-field="Alamat">Username (Status)</th>
                                    <th data-field="Alamat">Group Pengguna</th>
                                <?php } ?>
                                <th data-field="Alamat">Jenis Pengguna</th>
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
                                        <?php
                                        if ($this->session->userdata('id_pengguna') == 1) {
                                            $status = isset($row->status) ? $row->status : '';
                                            if ($status == 1) {
                                                ?>
                                                <td style="color:green"><?php echo isset($row->username) ? $row->username : ''; ?> (aktif)</td>
                                            <?php } else { ?>	
                                                <td style="color:red"><?php echo isset($row->username) ? $row->username : ''; ?> (tidak aktif)</td>
                                            <?php } ?>	

                                            <td><?= $this->convertion->pengguna_group(isset($row->id_pengguna_group) ? $row->id_pengguna_group : ''); ?></td>
                                        <?php } ?>
                                        <td><?php echo isset($row->jenis_pengguna) ? $row->jenis_pengguna : ''; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() ?>index.php/pengguna/detail/<?= md5(sha1($row->id_pengguna)) ?>" class="detail"  title="Detail"><img src="<?= base_url('images') ?>/detail.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php if ($this->session->userdata('id_pengguna') == 1) { ?>
                                                <a href="<?= base_url() ?>index.php/pengguna/edit/<?= md5(sha1($row->id_pengguna)) ?>" class="edit"  title="Edit"><img src="<?= base_url('images') ?>/edit.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?php if ($status == 1) {
                                                    ?>
                                                    <a href="<?= base_url() ?>index.php/pengguna/nonaktif/<?= md5(sha1($row->id_pengguna)) ?>" class="delete"  title="Non Aktifkan Pengguna" onclick="return confirm('Anda ingin menonaktifkan pengguna?');"><img src="<?= base_url('images') ?>/delete.png" style="width:15px;height:15px;"></a>
                                                    <?php } else { ?>	
                                                    <a href="<?= base_url() ?>index.php/pengguna/aktif/<?= md5(sha1($row->id_pengguna)) ?>" class="delete"  title="Aktifkan Pengguna" onclick="return confirm('Anda ingin mengaktifkan pengguna?');"><img src="<?= base_url('images') ?>/aktif.png" style="width:15px;height:15px;"></a>
                                                    <?php } ?>	
                                            <?php } ?>	
                                        </td> 
                                    </tr>
                                    <?php $no++; ?>    
                                    <?php
                                }
                            }
                            ?>									
                        </tbody>
                    </table>
                </div>-->
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.row (nested) -->
    <br />
</div>

