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
    });
</script>

<div class="col-lg-8 col-lg-offset-2">
    <div class="page-header">
        <h2>Donasi</h2>
    </div>
    <p id="age"></p>
 <?= form_open_multipart('donasi/tambah_db', array('id' => 'form', 'class' => 'form-horizontal')) ?>
		<div class="form-group">
			<label class="col-lg-5 control-label">Donasi untuk</label>
			<div class="col-lg-6">
				<strong><?php echo isset($nama_anak)?$nama_anak:''?></strong>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-5 control-label">Tanggal Donasi</label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="tanggal_donasi" id="tanggal_donasi" placeholder="Tanggal Donasi"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-5 control-label">Jumlah*</label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="jumlah" placeholder="Jumlah" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-5 control-label">Pesan</label>
			<div class="col-lg-6">
				<textarea class="form-control" name="pesan" placeholder="Pesan"></textarea>
			</div>
		</div>
		 <div class="form-group">
			<label class="col-lg-5 control-label">Upload Bukti Transfer</label>
			<div class="col-lg-6">
				<input type='file' name='donasi_file'  />
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-5" style='text-align:right'>* Harus diisi</div>
			<div class="col-lg-6">
			   <button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
    </form>
</div>


