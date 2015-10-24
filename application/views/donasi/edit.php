<script type="text/javascript">
    $(document).ready(function () {
        $('#form')
                .bootstrapValidator({
                    excluded: [':disabled'],
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        jumlah: {
                            validators: {
                                notEmpty: {
                                    message: 'Kolom jumlah harus diisi'
                                }, 
                                stringLength: { 
                                    min: 1, 
                                    max: 20,
                                    message: 'Maximal 20 Digit'
                                }
                            }
                        }
                    }
                })
                .on('status.field.bv', function (e, data) {
                    var $form = $(e.target),
                            validator = data.bv,
                            $tabPane = data.element.parents('.tab-pane'),
                            tabId = $tabPane.attr('id');

                    if (tabId) {
                        var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');

                        // Add custom class to tab containing the field
                        if (data.status == validator.STATUS_INVALID) {
                            $icon.removeClass('fa-check').addClass('fa-times');
                        } else if (data.status == validator.STATUS_VALID) {
                            var isValidTab = validator.isValidContainer($tabPane);
                            $icon.removeClass('fa-check fa-times')
                                    .addClass(isValidTab ? 'fa-check' : 'fa-times');
                        }
                    }
                });
				
        $("#tanggal_donasi").datepicker({format: 'dd-mm-yyyy'});
        $("#jumlah").on("input", function() {
            // allow numbers, a comma or a dot
            var v= $(this).val(), vc = v.replace(/[^0-9,\.]/, '');
            vc = vc.toString().replace(/\./g,'');
            vc = vc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            if (v !== vc)        
               $(this).val(vc);
        });
        $("#jumlah").trigger('input');
    });
</script>

<div class="col-lg-8 col-lg-offset-2">
    <div class="page-header">
        <h2>Donasi</h2>
    </div>
    <p id="age"></p>
 <?= form_open_multipart('donasi/edit_db/', array('id' => 'form', 'class' => 'form-horizontal')) ?>
		<div class="form-group">
			<label class="col-lg-5 control-label">Donasi untuk</label>
			<div class="col-lg-6">
				<strong><?php echo isset($nama_anak)?$nama_anak:''?></strong>
                                <input type="hidden" name="hash_id" value="<?php echo isset($hash_id)?$hash_id:''?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-5 control-label">Tanggal Donasi</label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="tanggal_donasi" id="tanggal_donasi" placeholder="Tanggal Donasi" value="<?php echo isset($row->tgl_donasi)?date('d-m-Y',strtotime($row->tgl_donasi)):''; ?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-5 control-label">Jumlah*</label>
			<div class="col-lg-6">
				<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah"  value="<?php echo isset($row->jumlah)?$row->jumlah:''; ?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-5 control-label">Pesan</label>
			<div class="col-lg-6">
				<textarea class="form-control" name="pesan" placeholder="Pesan"><?php echo isset($row->pesan)?$row->pesan:''; ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-5" style='text-align:right'>* Harus diisi</div>
			<div class="col-lg-6">
                            <a class="btn btn-success" href="<?= base_url() ?>index.php/donasi/">Kembali</a>
			   <button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
    </form>
</div>


