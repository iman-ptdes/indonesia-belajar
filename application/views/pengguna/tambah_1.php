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
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom password harus diisi'
                        },
                        different: {
                            field: 'username',
                            message: 'Password tidak boleh sama dengan username'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom konfirmasi password harus diisi'
                        },
                        identical: {
                            field: 'password'
                        },
                        different: {
                            field: 'username',
                            message: 'Password tidak boleh sama dengan username'
                        }
                    }
                },
                group_pengguna: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom group pengguna harus diisi'
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
                telepon: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom telepon harus diisi'
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
        <h2>Daftar Pengguna</h2>
    </div>

    <?= form_open('pengguna/tambah_db', array('id' => 'Form', 'class' => 'form-horizontal', 'style' => 'margin-top: 20px;')) ?>


    <div class="tab-pane active" id="data_diri">
        <div class="form-group">
            <label class="col-lg-5 control-label">Nama</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="nama" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Email</label>
            <div class="col-lg-6">
                <input type="email" class="form-control" name="email" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Username</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="username" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Password</label>
            <div class="col-lg-6">
                <input type="password" class="form-control" name="password" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Konfirmasi Password</label>
            <div class="col-lg-6">
                <input type="password" class="form-control" name="confirm_password" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Jenis Pengguna</label>
            <div class="col-lg-3">
                <?= form_dropdown('group_pengguna', $group_pengguna, '', "class='form-control'") ?>
            </div>
            <div class="col-lg-3">
                <?= form_dropdown('jenis_pengguna', $jenis_pengguna, '', "class='form-control'") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Nomor telepon</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="telepon" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Alamat</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="alamat" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Kota</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="kota" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Provinsi</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="provinsi" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-5 control-label">Jenis Identitas</label>
            <div class="col-lg-6">
                <?= form_dropdown('jenis_identitas', $jenis_identitas, '', "class='form-control'") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-5 control-label">Nomor identitas</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="no_identitas" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-5 col-lg-offset-3">
                <button type="submit" class="btn btn-primary">Simpan</button>

            </div>
        </div>
        </form>
    </div>


