<style>
    .filename{display:none}
    .progress-striped{display:none}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $("#foto").pekeUpload({
            url: '<?= site_url('anak/upload') ?>/' + '<?= $hash_id ?>',
            //url: '<?= site_url('anak/upload/') ?>',
            btnText: "Pilih foto ...",
            multi: true,
            allowedExtensions: "jpg",
            invalidExtError: "ekstensi file yang diijinkan jpg",
            theme: 'bootstrap',
            onFileSuccess: function (file, data) {
                //$("#foto").hide();
                var nama = $('#id_anak').val() + '.jpg';
                var myImage = document.getElementById("img");
                myImage.src = "<?php echo base_url(); ?>/images/anak/<?php echo $hash_id; ?>.jpg";
                myImage.width = 200;
                //location.href='<?= site_url('pengguna/form_upload/') ?>/'+$('#id_klien').val();
                var newSrc = "<?php echo base_url(); ?>images/anak/<?php echo $hash_id; ?>.jpg";
                // or change filename:
                // var newSrc = path+"/"+fileName.replace(".jpg","-large.jpg"); // re-assemble   

                $(this).attr(myImage.src, newSrc);
                $("#foto").hide();
            }
        });

        $('.progress-pekeupload').hide();

    });
</script> 

<div class="col-lg-10 ">
    <div class="page-header">
        <h4><?php echo isset($row->nama) ? $row->nama : ''; ?></h4>
    </div>

    <div class="col-lg-5 ">
        <div class="form-group">
            <?php
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
        <?php if (($this->session->userdata('id_pengguna_group') == 2) OR ($this->session->userdata('id_pengguna_group') == 1)) { ?>
        <input type="file" id="foto" name="foto"></br>
        <a class="btn btn-success" href="<?= base_url() ?>index.php/anak/edit/<?= $hash_id ?>">Edit Data Anak</a>
        <? } ?>
        <?php if ($this->session->userdata('id_pengguna_group') == 3)  { ?>
        <a class="btn btn-success" href="<?= base_url() ?>index.php/donasi/form/<?= $hash_id ?>">Donasi</a>
        <? } ?>
       
    </div>
    <div class="col-lg-6 thumbnail">
        <label>Data Diri</label>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr><td>Nama</td><td><b><?php echo isset($row->nama) ? $row->nama : ''; ?></b></td></tr>
            <tr><td>Jenis kelamin</td><td><?php echo isset($row->jenis_kelamin) ? $row->jenis_kelamin : ''; ?></td></tr>
            <tr><td>Alamat</td><td><?php echo isset($row->alamat) ? $row->alamat : ''; ?></td></tr>
            <tr><td>Kota</td><td><?php echo isset($row->kota) ? $row->kota : ''; ?></td></tr>
            <tr><td>Provinsi</td><td><?php echo isset($row->provinsi) ? $row->provinsi : ''; ?></td></tr>
            <tr><td>Telepon</td><td><?php echo isset($row->telepon) ? $row->telepon : ''; ?></td></tr>
            <?php $tanggal_lahir = date("d-m-Y", strtotime((isset($row->tanggal_lahir)) ? $row->tanggal_lahir : '')); ?>
            <tr><td>Tempat & tanggal lahir</td><td><?php echo isset($row->tempat_lahir) ? $row->tempat_lahir : ''; ?>, <?=$tanggal_lahir; ?></td></tr>
            <?php $umur = isset($row->tanggal_lahir) ? (date("Y") - (substr($row->tanggal_lahir, 0, 4))): ''?>
            <tr><td>Umur</td><td><?=$umur?></td></tr>
        </table>
    </div>
    <div class="col-lg-6 thumbnail">
        <label>Data Keluarga</label>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr><td>Nama ayah</td><td><?= isset($row->ayah) ? $row->ayah : '' ?></td></tr>
            <tr><td>Pekerjaan ayah</td><td><?= isset($row->pekerjaan_ayah) ? $row->pekerjaan_ayah : '' ?></td></tr>
            <tr><td>Pendidikan terakhir ayah</td><td><?= isset($row->pendidikan_ayah) ? $row->pendidikan_ayah : '' ?></td></tr>
            <tr><td>Nama ibu</td><td><?= isset($row->ibu) ? $row->ibu : '' ?></td></tr>
            <tr><td>Pekerjaan ibu</td><td><?= isset($row->pekerjaan_ibu) ? $row->pekerjaan_ibu : '' ?></td></tr>
            <tr><td>Pendidikan terakhir ibu</td><td><?= isset($row->pendidikan_ibu) ? $row->pendidikan_ibu : '' ?></td></tr>
            <tr><td>Alamat orang tua</td><td><?= isset($row->alamat_ortu) ? $row->alamat_ortu : '' ?></td></tr>
            <tr><td>Pendapatan ayah dan ibu</td><td><?= isset($row->pendapatan) ? $row->pendapatan : '' ?></td></tr>
            <tr><td>Saudara ke-</td><td><?= isset($row->saudara_ke) ? $row->saudara_ke : '' ?></td></tr>
            <tr><td>Jumlah saudara</td><td><?= isset($row->jumlah_saudara) ? $row->jumlah_saudara : '' ?></td></tr>
        </table>
    </div>

    <div class="col-lg-6 thumbnail">
        <label>Data Sekolah</label>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr><td>Status bersekolah</td><td><?= isset($row->status_bersekolah) ? $row->status_bersekolah : '' ?></td></tr>
            <tr><td>Jenis sekolah terakhir</td><td><?= isset($row->jenis_sekolah) ? $row->jenis_sekolah : ''; ?></td></tr>
            <tr><td>Tingkat sekolah terakhir</td><td><?= isset($row->tingkat_sekolah) ? $row->tingkat_sekolah : ''; ?></td></tr>
            <tr><td>Nama sekolah terakhir</td><td><?= isset($row->sekolah) ? $row->sekolah : ''; ?></td></tr>
            <tr><td>Alamat sekolah terakhir</td><td><?= isset($row->alamat_sekolah) ? $row->alamat_sekolah : ''; ?></td></tr>
            <tr><td>Alasan tidak/putus sekolah</td><td><?= isset($row->alasan) ? $row->alasan : ''; ?></td></tr>
        </table>
    </div>
    <div class="col-lg-6 thumbnail">
        <label>Data Pengentri</label>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr><td>Nama</td><td><?= isset($row->nm) ? $row->nm : '' ?></td></tr>
           <tr><td>Group/Jenis Pengentri</td><td><?= $this->convertion->pengguna_group(isset($row->id_pengguna_group) ? $row->id_pengguna_group : ''); ?>, <?php echo isset($row->jenis_pengguna) ? $row->jenis_pengguna : ''; ?></td></tr>
        </table>
         <a class="btn btn-success" href="<?= base_url() ?>index.php/pengguna/detail/<?= md5(sha1($row->id_pengguna)) ?>">Lihat Data Pengentri</a>
    </div>
</div>