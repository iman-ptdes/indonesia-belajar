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
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom nama harus diisi'
                        }
                    }
                },
                email: {
                    validators: {
                        emailAddress: {
                            message: 'isi alamat email dengan benar'
                        },
                        notEmpty: {
                            message: 'Kolom email harus diisi'
                        }
                    }
                },
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom username harus diisi'
                        }
                    }
                },
                telepon: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom telepon harus diisi'
                        }
                    }
                },
                jenis_pengguna: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom jenis pengguna harus diisi'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom alamat harus diisi'
                        }
                    }
                },
                kota: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom kota harus diisi'
                        }
                    }
                },
                provinsi: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom provinsi harus diisi'
                        }
                    }
                },
                jenis_identitas: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom jenis identitas harus diisi'
                        }
                    }
                },
                no_identitas: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom nomor identitas harus diisi'
                        }
                    }
                }
            }
        });
    });
</script>


<div class="col-lg-8 col-lg-offset-2">
    <div class="page-header">
        <h2>Edit Pengguna</h2>
    </div>
    <?= form_open('pengguna/edit_db', array('id' => 'Form', 'class' => 'form-horizontal', 'style' => 'margin-top: 20px;')) ?>

    <div class="tab-pane active" id="data_diri">
        <div class="form-group">
            <label class="col-lg-5 control-label">Nama</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="nama" value="<?= (isset($row->nama)) ? $row->nama : '' ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Email</label>
            <div class="col-lg-6">
                <input type="email" class="form-control" name="email" value="<?= (isset($row->email)) ? $row->email : '' ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Username</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="username" value="<?= (isset($row->username)) ? $row->username : '' ?>"/>
                <input type="hidden" name="username_lama" value="<?= (isset($row->username)) ? $row->username : '' ?>"/>
            </div>
        </div>
         <div class="form-group">
            <label class="col-lg-5 control-label">Jenis Pengguna</label>
            <div class="col-lg-6">
                <?= form_dropdown('jenis_pengguna', $jenis_pengguna, (isset($row->jenis_pengguna)) ? $row->jenis_pengguna : '', "class='form-control'") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Nomor telepon</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="telepon" value="<?= (isset($row->telepon)) ? $row->telepon : '' ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Alamat</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="alamat" value="<?= (isset($row->alamat)) ? $row->alamat : '' ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Kota</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="kota" value="<?= (isset($row->kota)) ? $row->kota : '' ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Provinsi</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="provinsi" value="<?= (isset($row->provinsi)) ? $row->provinsi : '' ?>"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-5 control-label">Jenis Identitas</label>
            <div class="col-lg-6">
                <?= form_dropdown('jenis_identitas', $jenis_identitas, (isset($row->jenis_identitas)) ? $row->jenis_identitas : '', "class='form-control'") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Nomor identitas</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="no_identitas" value="<?= (isset($row->no_identitas)) ? $row->no_identitas : '' ?>"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-5 col-lg-offset-3">
                <input type="hidden" name="hash_id" value="<?= (isset($hash_id)) ? $hash_id : '' ?>"/>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </div>
        </div>
        </form>
    </div>
</div>


