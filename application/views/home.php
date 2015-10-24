<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Indonesia Belajar</title>

        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/jquery-ui-1.11.4.custom/jquery-ui.min.css"/>
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/bootstrap-3.3.5-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/bootstrap-validator/css/bootstrapValidator.css"/>
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/bootstrap-datepicker/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-freelancer-1.0.3/css/freelancer.css"/>
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/pekeupload/custom.css"/>

        <script type="text/javascript" src="<?= base_url('cssjs') ?>/jquery/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?= base_url('cssjs') ?>/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= base_url('cssjs') ?>/bootstrap-validator/js/bootstrapValidator.js"></script>
        <script type="text/javascript" src="<?= base_url('cssjs') ?>/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?= base_url('cssjs') ?>/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>
        <script type="text/javascript" src="<?= base_url('cssjs') ?>/pekeupload/pekeUpload.min.js"></script>
            
        <script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/raphael/raphael-min.js"></script>
        <script src="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.min.js"></script>
        
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url('cssjs') ?>/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css" rel="stylesheet">


</head>

<body id="page-top" class="index">
    <script>
$(function() {
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '<?php echo $graph[0]['lokasi']?>',
            a: <?php echo $graph[0][0]?>,
            b: <?php echo $graph[0][1]?>,
            c: <?php echo $graph[0][2]?>,
            d: <?php echo $graph[0][3]?>
        }, {
            y: '<?php echo $graph[1]['lokasi']?>',
            a: <?php echo $graph[1][0]?>,
            b: <?php echo $graph[1][1]?>,
            c: <?php echo $graph[1][2]?>,
            d: <?php echo $graph[1][3]?>
        }, {
            y: '<?php echo $graph[2]['lokasi']?>',
            a: <?php echo $graph[2][0]?>,
            b: <?php echo $graph[2][1]?>,
            c: <?php echo $graph[2][2]?>,
            d: <?php echo $graph[2][3]?>
        }, {
            y: '<?php echo $graph[3]['lokasi']?>',
            a: <?php echo $graph[3][0]?>,
            b: <?php echo $graph[3][1]?>,
            c: <?php echo $graph[3][2]?>,
            d: <?php echo $graph[3][3]?>
        }, {
            y: '<?php echo $graph[4]['lokasi']?>',
            a: <?php echo $graph[4][0]?>,
            b: <?php echo $graph[4][1]?>,
            c: <?php echo $graph[4][2]?>,
            d: <?php echo $graph[4][3]?>
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c', 'd'],
        labels: ['SD dan Sederajat', 'SMP dan Sederajat', 'SMA dan Sederajat', 'Lainnya'],
        barColors: ["#B21516", "#1531B2", "#1AB244", "#B29215"],
        hideHover: 'auto',
        resize: true
    });
});
    </script>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#0c5684;">
        <div class="container">
            <div class="row" >
                <div class="col-md-6">
                    <a href=""><img src="<?php echo base_url('images/logo.png');?>"></a>
                </div>
				<?= form_open('pengguna/login', array('id' => 'formLogin')) ?>
                <div class="col-md-6" style="padding-top:20px;">
                    <div class="col-md-5">
                            <div class="form-group">
                                <input placeholder="Username" type="text" class="form-control" name="username" />
								<?php echo isset($username_error)?$username_error:''; ?>
                            </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input placeholder="Password" type="password" class="form-control" name="password" />
							<?php echo isset($password_error)?$password_error:''; ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning"><b>Login</b></button>
                        </div>
                    </div>
                </div>
				</form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header class="konten">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div style="margin-top:30px;">
                        <h4 class="font-biru">Total Donasi : <?php echo $total_donasi;?></h4>
                        <h4 class="font-biru">Jumlah Anak Putus Sekolah yang Terdata : <?php echo $total_anak;?></h4>
                        <h3 class="font-biru">"5 Daerah dengan jumlah anak putus sekolah terbanyak"</h3>
                        <div id="morris-bar-chart"></div>
                        <!-- <center><img class="img-responsive" src="<?php echo base_url('images/indonesia-belajar.png')?>"></center> -->
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#formDaftar').bootstrapValidator({
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

                            $('#formLogin').bootstrapValidator({
                                message: 'isian tidak valid',
                                feedbackIcons: {
                                    valid: 'glyphicon glyphicon-ok',
                                    invalid: 'glyphicon glyphicon-remove',
                                    validating: 'glyphicon glyphicon-refresh'
                                },
                                fields: {
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
                                            }
                                        }
                                    }
                                }
                            });
                            
                            $('#formPesan').bootstrapValidator({
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
                                            notEmpty: {
                                                message: 'Kolom email harus diisi'
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
                                     pesan: {
                                        validators: {
                                            notEmpty: {
                                                message: 'Kolom pesan harus diisi'
                                            }
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                    <div class="row">
                        <h2 class="section-heading">Sign Up</h2>
                        <!-- <h5 class="section-subheading" style="color:#2C3E50;">Sudah mendaftar? Masuk menu Login</h5> -->
                    </div>
                    <section id="signup">
                                <?= form_open('pengguna/tambah_db', array('id' => 'formDaftar', 'class' => 'form-horizontal')) ?>
                  
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Nama</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="nama" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Email</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" name="email" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Username</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="username" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" name="password" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Konfirmasi Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" name="confirm_password" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Jenis Pengguna</label>
                                        <div class="col-lg-3">
                                            <?= form_dropdown('group_pengguna', $group_pengguna, '', "class='form-control'") ?>
                                        </div>
                                        <div class="col-lg-3">
                                            <?= form_dropdown('jenis_pengguna', $jenis_pengguna, '', "class='form-control'") ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Nomor telepon</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="telepon" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Alamat</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="alamat" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Kota</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="kota" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Provinsi</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="provinsi" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-4 control-label font-biru">Identitas</label>
                                        <div class="col-lg-3">
                                            <?= form_dropdown('jenis_identitas', $jenis_identitas, '', "class='form-control'") ?>
                                        </div>
					<div class="col-lg-3">
                                            <input type="text" class="form-control" name="no_identitas" placeholder="no identitas"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-1 col-lg-offset-4">
                                            <button type="submit" class="btn btn-warning"><b>Daftar</b></button>

                                        </div>
                                    </div>
                                    </form>
                                </div>
                                                    </div>
                    </section>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="text-center l-footer l-subfooter.at_bottom">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <b>Tim Desember untuk Hackathon Merdeka 2.0</b>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-freelancer-1.0.3/js/classie.js"></script>
    <script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-freelancer-1.0.3/js/cbpAnimatedHeader.js"></script>
    <script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-freelancer-1.0.3/js/freelancer.js"></script>
	<?php echo isset($error)?$error:''; ?>
   

</body>

</html>
