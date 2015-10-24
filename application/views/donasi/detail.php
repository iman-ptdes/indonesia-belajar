<style>
    .filename{display:none}
    .progress-striped{display:none}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $("#foto").pekeUpload({
            url: '<?= site_url('donasi/upload') ?>/' + '<?= $hash_id ?>',
            //url: '<?= site_url('anak/upload/') ?>',
            btnText: "Pilih foto ...",
            multi: true,
            allowedExtensions: "jpg",
            invalidExtError: "ekstensi file yang diijinkan jpg",
            theme: 'bootstrap',
            onFileSuccess: function (file, data) {
                var myImage = document.getElementById("img");
                myImage.src = "<?php echo base_url(); ?>/images/donasi/<?php echo $hash_id; ?>.jpg";
                myImage.width = 200;
                var newSrc = "<?php echo base_url(); ?>images/donasi/<?php echo $hash_id; ?>.jpg";

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
            $filename = "images/donasi/" . $hash_id . ".jpg";
            if (file_exists($filename)) {
                ?>
                <img id="img"  class="img-rounded img-responsive" src="<?= base_url(); ?><?= $filename; ?>" alt="Foto" style="height:200px;" class="img-thumbnail">
                <?php
            } else {
                ?>
                <img id="img"  class="img-rounded" src="<?= base_url(); ?>images/pengguna/noimage.jpg" alt="Foto" style="height:200px;" class="img-thumbnail">                                        
                <?php
            }
            ?>
        </div>
        <input type="file" id="foto" name="foto"></br>
        <a class="btn btn-success" href="<?= base_url() ?>index.php/donasi/">Semua Data Donasi</a>
        <a class="btn btn-success" href="<?= base_url() ?>index.php/donasi/edit/<?= $hash_id ?>">Edit Data Donasi</a>
       
    </div>
    
    <div class="col-lg-6 thumbnail">
        <label>Data Donasi</label>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr><td>Donasi untuk</td><td><b><?php echo isset($row->nama_anak)?$row->nama_anak:''?></b></td></tr>
            <tr><td>Tanggal Donasi</td><td> <?php echo isset($row->tgl_donasi)?date('d-m-Y',strtotime($row->tgl_donasi)):''; ?></td></tr>
            <tr><td>Jumlah</td><td><?php echo isset($row->jumlah)?number_format($row->jumlah,0,',','.'):''; ?></td></tr>
            <tr><td>Pesan</td><td><?php echo isset($row->pesan)?$row->pesan:''; ?></td></tr>
            <tr><td>Donatur</td><td><?php echo isset($row->nama_donatur) ? $row->nama_donatur : ''; ?></td></tr>
        </table>
    </div>
</div>




