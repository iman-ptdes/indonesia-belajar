<script type="text/javascript">
    $(document).ready(function () {
        $("#foto").pekeUpload({
            url: '<?= site_url('pengguna/upload') ?>/' + '<?= $hash_id ?>',
            //url: '<?= site_url('pengguna/upload/') ?>',
            btnText: "Pilih foto ...",
            multi: true,
            allowedExtensions: "jpg",
            invalidExtError: "ekstensi file yang diijinkan jpg",
            theme: 'bootstrap',
            onFileSuccess: function (file, data) {
                $("#file").hide();
                var nama = $('#id_pengguna').val() + '.jpg';
                var myImage = document.getElementById("img");
                myImage.src = "<?php echo base_url(); ?>/images/pengguna/<?php echo $hash_id; ?>.jpg";
                myImage.width = 200;
                //location.href='<?= site_url('pengguna/form_upload/') ?>/'+$('#id_klien').val();
                var newSrc = "<?php echo base_url(); ?>images/pengguna/<?php echo $hash_id; ?>.jpg";
                // or change filename:
                // var newSrc = path+"/"+fileName.replace(".jpg","-large.jpg"); // re-assemble   

                $(this).attr(myImage.src, newSrc);
            }
        });

    });
</script> 

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


<div class="col-lg-10 ">
    <div class="page-header">
        <h4><?php echo isset($row->nama) ? $row->nama : ''; ?></h4>
    </div>
    <div class="row">
        <div class="col-lg-3 ">

            <div class="form-group">
                <?php
                $filename = "images/pengguna/" . $hash_id . ".jpg";
                if (file_exists($filename)) {
                    ?>
                    <img id="img"  class="img-rounded" src="<?= base_url(); ?><?= $filename; ?>" alt="Foto" style="width:200px;height:200px;" class="img-thumbnail">                
                    <?php
                } else {
                    ?>
                    <img id="img"  class="img-rounded" src="<?= base_url(); ?>images/pengguna/noimage.jpg" alt="Foto" style="width:200px;height:200px;" class="img-thumbnail">                                        
                    <?php
                }
                ?>
            </div>
            <?php
            $id_pengguna = isset($row->id_pengguna) ? $row->id_pengguna : '';
            if (($this->session->userdata('id_pengguna') == $id_pengguna ) OR ( $this->session->userdata('id_pengguna_group') == 1)) {
                ?>
                <input type="file" id="foto" name="foto"></br>
                <?php if ($this->session->userdata('id_pengguna_group') == 2) { ?>
                    <a class="btn btn-success" href="<?= base_url() ?>index.php/pengguna/rekening">Edit Data Rekening</a></br></br>
                <?php } ?>
<?php } ?>

        </div>

        <div class="col-lg-6 ">

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <tr><td>Email</td><td><?= isset($row->email) ? $row->email : '' ?></td></tr>
                <?php
                $id_pengguna = isset($row->id_pengguna) ? $row->id_pengguna : '';
                if (($this->input->post('group_pengguna') == 1) OR ( $this->session->userdata('id_pengguna') == $id_pengguna )) {
                    ?>
                    <tr><td>Username</td><td><?= isset($row->username) ? $row->username : '' ?></td></tr>
                    <tr><td>Group Pengguna</td><td><?= $this->convertion->pengguna_group(isset($row->id_pengguna_group) ? $row->id_pengguna_group : ''); ?></td></tr>
                        <?php } ?>
                    <tr><td>Jenis Pengguna</td><td><?= isset($row->jenis_pengguna) ? $row->jenis_pengguna : '' ?></td></tr>
                    <tr><td>Nomor telepon</td><td><?= isset($row->telepon) ? $row->telepon : '' ?></td></tr>
                    <tr><td>Alamat</td><td><?= isset($row->alamat) ? $row->alamat : '' ?></td></tr>
                    <tr><td>Kota</td><td><?= isset($row->kota) ? $row->kota : '' ?></td></tr>
                    <tr><td>Provinsi</td><td><?= isset($row->provinsi) ? $row->provinsi : '' ?></td></tr>
                    <tr><td>Jenis Identitas</td><td><?= isset($row->jenis_identitas) ? $row->jenis_identitas : '' ?></td></tr>
                    <tr><td>Nomor Identitas</td><td><?= isset($row->no_identitas) ? $row->no_identitas : '' ?></td></tr>
                    <?php if ($this->session->userdata('id_pengguna_group') == 2) { ?>
                    <tr><td>Nama Bank</td><td><?= isset($row->nama_bank) ? $row->nama_bank : '' ?></td></tr>
                    <tr><td>Nomor Rekening</td><td><?= isset($row->no_rekening) ? $row->no_rekening : '' ?></td></tr>
            <?php } ?>

            </table>
            <?php
            $id_pengguna = isset($row->id_pengguna) ? $row->id_pengguna : '';
            if (($this->session->userdata('id_pengguna') == $id_pengguna ) OR ( $this->session->userdata('id_pengguna_group') == 1)) {
                ?>
                <a class="btn btn-success" href="<?= base_url() ?>index.php/pengguna/edit/<?= $hash_id ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>

        <?php } ?>
        </div>

        <?php if ($this->session->userdata('id_pengguna_group') != 2) { ?>
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Anak yang Diinput
                    </div>

                    <div class="panel-body">

                        <div class="dataTable_wrapper">
                            <table class="table table-hover" id="data_anak">
                                <thead>
                                    <tr>
                                        <th data-field="Anak"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $row2) {
                                        ?>
                                        <tr>
                                            <td>

                                                <div class="col-lg-2 thumbnail">
                                                    <?php
                                                    $hash_id = md5(sha1($row2->id_anak));
                                                    $filename = "images/anak/" . $hash_id . ".jpg";
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
                                                    <div class="col-lg-4">
                                                        <h4><?php echo isset($row2->nama) ? $row2->nama : ''; ?></h4>
                                                        <p style="font-size:12pt;">
                                                            <?php echo isset($row2->jenis_kelamin) ? $row2->jenis_kelamin . ', ' : ''; ?><?php $umur = isset($row2->tanggal_lahir) ? (date("Y") - (substr($row2->tanggal_lahir, 0, 4))) : '';
                                                            echo $umur . ' th'
                                                            ?>
                                                        </p>
                                                        <p style="font-size:12pt;">
                                                            <?php echo isset($row2->alamat) ? $row2->alamat : ''; ?>
                                                        </p>
                                                        <p style="font-size:12pt;">
                                                            <?php echo isset($row2->kota) ? $row2->kota . ', ' : ''; ?><?php echo isset($row2->provinsi) ? $row2->provinsi : ''; ?><br/>
                                                        </p>
                                                        <p style="font-size:12pt;">
                                                            Alasan Tidak Bersekolah : <?php echo isset($row2->alasan) ? $row2->alasan : '-'; ?>
                                                        </p>

                                                    </div>    
                                                    <div class="col-lg-5">
                                                        <p style="font-size:12pt;">
                                                            Status bersekolah : <?php echo isset($row2->status_bersekolah) ? $row2->status_bersekolah : '-'; ?><br/>
                                                        </p>
                                                        <p style="font-size:12pt;">
                                                            Jenis sekolah terakhir : <?php echo isset($row2->jenis_sekolah) ? $row2->jenis_sekolah : '-'; ?><br/>
                                                        </p>
                                                        <p style="font-size:12pt;">
                                                            Tingkat sekolah terakhir : <?php echo isset($row2->tingkat_sekolah) ? $row2->tingkat_sekolah : '-'; ?><br/>
                                                        </p>

                                                    </div>    
                                                    <div class="col-lg-4">
                                                        <p>
                                                            <a href="<?= base_url() ?>index.php/anak/detail/<?= md5(sha1($row2->id_anak)) ?>" class="btn btn-primary">Detail</a>&nbsp;&nbsp;&nbsp;
                                                            <?php if  ( $this->session->userdata('id_pengguna_group') == 1) { ?>
                                                                <a href="<?= base_url() ?>index.php/anak/edit/<?= md5(sha1($row2->id_anak)) ?>" class="btn btn-primary" >Edit</a>&nbsp;&nbsp;&nbsp;
                                                                <a href="<?= base_url() ?>index.php/anak/hapus/<?= md5(sha1($row2->id_anak)) ?>" class="btn btn-primary" onclick="return confirm('Yakin hapus data?');">Hapus</a>
                                                            <?php } ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        <?php } ?>
    </div>
</div>