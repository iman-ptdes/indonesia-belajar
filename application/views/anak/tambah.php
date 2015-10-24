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

        $("#btn2").click(function () {
            $("#tab1").removeClass("active");
            $("#tab2").addClass("active");
        });
        $("#btn3").click(function () {
            $("#tab1").removeClass("active");
            $("#tab2").removeClass("active");
            $("#tab3").addClass("active");
        });

    });
</script>

<div class="col-lg-10 col-lg-offset-1">
    <div class="page-header">
        <h2>Pendataan Anak</h2>
    </div>
    <p id="age"></p>
    <ul class="nav nav-tabs">
        <li class="active" id ="tab1"><a href="#data_diri" data-toggle="tab">Data Diri<i class="fa"></i></a></li>
        <li id ="tab2"  ><a href="#data_sekolah" data-toggle="tab">Data Sekolah<i class="fa"></i></a></li>
        <li id ="tab3"><a href="#data_keluarga" data-toggle="tab">Data Keluarga<i class="fa"></i></a></li>
    </ul>
 <?= form_open_multipart('anak/tambah_db', array('id' => 'form', 'class' => 'form-horizontal')) ?>
        <div class="tab-content">
            <div class="tab-pane active" id="data_diri">
                <div class="form-group">
                    <label class="col-lg-5 control-label">Nama*</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="nama" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Nomor Induk Kependudukan (Kartu Keluarga)</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="nik" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Jenis kelamin*</label>
                    <div class="col-lg-6">
                        <?= form_dropdown('jenis_kelamin', $jenis_kelamin, '', "class='form-control'") ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Alamat*</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="alamat" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Kota*</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="kota" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Provinsi*</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="provinsi" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Telepon</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="telepon" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Tempat dan tanggal lahir</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir"/>
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal lahir"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Umur</label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="umur" id="umur"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Status tempat tinggal*</label>
                    <div class="col-lg-6">
                        <?= form_dropdown('status_tempat_tinggal', $status_tempat_tinggal, '', "class='form-control'") ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-5 control-label">Upload foto</label>
                    <div class="col-lg-6">
                        <input type='file' name='user_file'  />
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-5" style='text-align:right'>* Harus diisi</div>
                    <div class="col-lg-6">
                        <a href="#data_sekolah" class="btn btn-primary" id="btn2" data-toggle="tab">Selanjutnya</a>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="data_sekolah">
                <div class="form-group">
                    <label class="col-lg-5 control-label">Status bersekolah*</label>
                    <div class="col-lg-6">
                        <?= form_dropdown('status_bersekolah', $status_bersekolah, '', "class='form-control'") ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Jenis sekolah terakhir</label>
                    <div class="col-lg-6">
                        <?= form_dropdown('jenis_sekolah', $jenis_sekolah, '', "class='form-control'") ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Tingkat sekolah terakhir</label>
                    <div class="col-lg-6">
                        <?= form_dropdown('tingkat_sekolah', $tingkat_sekolah, '', "class='form-control'") ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Nama sekolah terakhir</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="sekolah" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Alamat sekolah terakhir</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="alamat_sekolah" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Alasan tidak/putus sekolah</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="alasan" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-5" style='text-align:right'>* Harus diisi</div>
                    <div class="col-lg-6">
                        <a href="#data_keluarga" class="btn btn-primary" id="btn3" data-toggle="tab">Selanjutnya</a>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="data_keluarga">
                <div class="form-group">
                    <label class="col-lg-5 control-label">Nama ayah*</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="ayah" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Pekerjaan ayah</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="pekerjaan_ayah" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Pendidikan terakhir ayah</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="pendidikan_ayah" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Nama ibu*</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="ibu" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Pekerjaan ibu</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="pekerjaan_ibu" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Pendidikan terakhir ibu</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="pendidikan_ibu" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Alamat orang tua (jika tidak tinggal bersama orang tua)</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="alamat_ortu" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Pendapatan ayah dan ibu</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="pendapatan" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Saudara ke-</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="saudara_ke" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Jumlah saudara</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="jumlah_saudara" />
                    </div>
                </div>
                
               
                
                 <div class="form-group">
                    <div class="col-lg-5" style='text-align:right'>* Harus diisi</div>
                    <div class="col-lg-6">
                       <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


