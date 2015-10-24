<script type="text/javascript">
    $(document).ready(function () {
        $('#Form').bootstrapValidator({
            message: 'isian tidak valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nama_bank: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom nama bank harus diisi'
                        }
                    }
                },
                no_rekening: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom nomor rekening harus diisi'
                        }
                    }
                }
            }
        });
    });
</script>


<div class="col-lg-8 col-lg-offset-2">
    <div class="page-header">
        <h2>Data Rekening</h2>
    </div>

    <?= form_open('pengguna/rekening_db', array('id' => 'Form', 'class' => 'form-horizontal')) ?>


    <div class="tab-pane active" id="data_diri">
        <div class="form-group">
            <label class="col-lg-5 control-label">Nama bank</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="nama_bank" value="<?= (isset($row->nama_bank)) ? $row->nama_bank : '' ?>"/>
            </div>
        </div>
       
        <div class="form-group">
            <label class="col-lg-5 control-label">Nomor Rekening</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="no_rekening" value="<?= (isset($row->no_rekening)) ? $row->no_rekening : '' ?>"/>
            </div>
        </div>
       

        <div class="form-group">
            <div class="col-lg-5 col-lg-offset-3">
                <button type="submit" class="btn btn-primary">Simpan</button>

            </div>
        </div>
        </form>
    </div>


