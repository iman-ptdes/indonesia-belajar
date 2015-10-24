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
                        nama: {
                            validators: {
                                notEmpty: {
                                    message: 'Kolom nama harus diisi'
                                }
                            }
                        },
                        jenis_kelamin: {
                            validators: {
                                notEmpty: {
                                    message: 'Kolom jenis kelamin harus diisi'
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
                        status_tempat_tinggal: {
                            validators: {
                                notEmpty: {
                                    message: 'Kolom status tempat tinggal harus diisi'
                                }
                            }
                        },
                        status_bersekolah: {
                            validators: {
                                notEmpty: {
                                    message: 'Kolom status bersekolah harus diisi'
                                }
                            }
                        },
                        ayah: {
                            validators: {
                                notEmpty: {
                                    message: 'Kolom nama ayah harus diisi'
                                }
                            }
                        },
                        ibu: {
                            validators: {
                                notEmpty: {
                                    message: 'Kolom nama ibu harus diisi'
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

        $("#tanggal_lahir").datepicker({format: 'dd-mm-yyyy'});
    });
</script>

<div class="col-lg-10 col-lg-offset-1">
    <div class="page-header">
        <h2>Edit Data Anak</h2>
    </div>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#data_diri" data-toggle="tab">Data Diri<i class="fa"></i></a></li>
        <li><a href="#data_sekolah" data-toggle="tab">Data Sekolah<i class="fa"></i></a></li>
        <li><a href="#data_keluarga" data-toggle="tab">Data Keluarga<i class="fa"></i></a></li>
    </ul>
    <?= form_open('anak/edit_db', array('id' => 'form', 'class' => 'form-horizontal', 'style' => 'margin-top: 20px;')) ?>
    <div class="tab-content">
        <div class="tab-pane active" id="data_diri">
            <div class="form-group">
                <label class="col-lg-5 control-label">Nama</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="nama" value="<?= (isset($row->nama)) ? $row->nama : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Jenis kelamin</label>
                <div class="col-lg-6">
                    <?= form_dropdown('jenis_kelamin', $jenis_kelamin, (isset($row->jenis_kelamin)) ? $row->jenis_kelamin : '', "class='form-control'") ?>
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
                <label class="col-lg-5 control-label">Telepon</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="telepon" value="<?= (isset($row->telepon)) ? $row->telepon : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Tempat dan tanggal lahir</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" value="<?= (isset($row->tempat_lahir)) ? $row->tempat_lahir : '' ?>"/>
                </div>
                <div class="col-lg-3">
                    <?php $tanggal_lahir = date("d-m-Y", strtotime((isset($row->tanggal_lahir)) ? $row->tanggal_lahir : '')); ?>
                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal lahir" value="<?= $tanggal_lahir ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-5 control-label">Umur</label>
                <div class="col-lg-6">
                    <?php $umur = isset($row->tanggal_lahir) ? (date("Y") - (substr($row->tanggal_lahir, 0, 4))) : '' ?>
                    <input type="text" class="form-control" name="umur" value="<?= $umur ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Status tempat tinggal</label>
                <div class="col-lg-6">
                    <?= form_dropdown('status_tempat_tinggal', $status_tempat_tinggal, (isset($row->status_tempat_tinggal)) ? $row->status_tempat_tinggal : '', "class='form-control'") ?>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="data_sekolah">
            <div class="form-group">
                <label class="col-lg-5 control-label">Status bersekolah</label>
                <div class="col-lg-6">
                    <?= form_dropdown('status_bersekolah', $status_bersekolah, (isset($row->status_bersekolah)) ? $row->status_bersekolah : '', "class='form-control'") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Jenis sekolah terakhir</label>
                <div class="col-lg-6">
                    <?= form_dropdown('jenis_sekolah', $jenis_sekolah, (isset($row->jenis_sekolah)) ? $row->jenis_sekolah : '', "class='form-control'") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Tingkat sekolah terakhir</label>
                <div class="col-lg-6">
                    <?= form_dropdown('tingkat_sekolah', $tingkat_sekolah, (isset($row->tingkat_sekolah)) ? $row->tingkat_sekolah : '', "class='form-control'") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Nama sekolah terakhir</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="sekolah" value="<?= (isset($row->sekolah)) ? $row->sekolah : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Alamat sekolah terakhir</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="alamat_sekolah" value="<?= (isset($row->alamat_sekolah)) ? $row->alamat_sekolah : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Alasan tidak/putus sekolah</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="alasan" value="<?= (isset($row->alasan)) ? $row->alasan : '' ?>"/>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="data_keluarga">
            <div class="form-group">
                <label class="col-lg-5 control-label">Nama ayah</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="ayah" value="<?= (isset($row->ayah)) ? $row->ayah : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Pekerjaan ayah</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= (isset($row->pekerjaan_ayah)) ? $row->pekerjaan_ayah : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Pendidikan terakhir ayah</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pendidikan_ayah" value="<?= (isset($row->pendidikan_ayah)) ? $row->pendidikan_ayah : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Nama ibu</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="ibu" value="<?= (isset($row->ibu)) ? $row->ibu : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Pekerjaan ibu</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= (isset($row->pekerjaan_ibu)) ? $row->pekerjaan_ibu : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Pendidikan terakhir ibu</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pendidikan_ibu" value="<?= (isset($row->pendidikan_ibu)) ? $row->pendidikan_ibu : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Alamat orang tua (jika tidak tinggal bersama orang tua)</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="alamat_ortu" value="<?= (isset($row->alamat_ortu)) ? $row->alamat_ortu : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Pendapatan ayah dan ibu</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pendapatan" value="<?= (isset($row->pendapatan)) ? $row->pendapatan : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Saudara ke-</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="saudara_ke" value="<?= (isset($row->saudara_ke)) ? $row->saudara_ke : '' ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Jumlah saudara</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="jumlah_saudara" value="<?= (isset($row->jumlah_saudara)) ? $row->jumlah_saudara : '' ?>"/>
                </div>
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

