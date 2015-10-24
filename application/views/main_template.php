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

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#0c5684;">
         <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><img src="<?php echo base_url('images/logo.png')?>"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= base_url('') ?>">Home</a>
                        </li>
                        
                        <li>
                            <a class="page-scroll" href="<?= base_url('index.php') ?>/anak/tambah">Tambah Anak</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= base_url('index.php') ?>/anak/cari">Cari Anak</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= base_url('index.php') ?>/pengguna/lihat">Profil Pengguna</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        
        
<!--        <div class="container">
            <div class="row" >
                <div class="col-md-6">
                    <a href=""><img src="<?php echo base_url('images/logo.png');?>"></a>
                </div>
                <div class="col-md-6" style="padding-top:20px;">
                    <div class="col-md-5">
                        <?= form_open('login', array('id' => 'formLogin', 'class' => 'form-horizontal')) ?>
                            <div class="form-group">
                                <input placeholder="Username" type="text" class="form-control" name="username" />
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input placeholder="Password" type="password" class="form-control" name="password" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning"><b>Login</b></button>
                        </div>
                    </div>
                </div>
            </div>
             /.navbar-collapse 
        </div>-->
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
        <div class="container">
            <div class="row" style="padding-top:25px; padding-bottom: 25px;">
                <section>
                    <?php echo $content; ?>
                </section>
            </div>
        </div>

    <!-- Footer -->
    <footer class="text-center l-footer l-subfooter.at_bottom">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; TimDesember2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-freelancer-1.0.3/js/classie.js"></script>
    <script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-freelancer-1.0.3/js/cbpAnimatedHeader.js"></script>
    <script type="text/javascript" src="<?= base_url('cssjs') ?>/startbootstrap-freelancer-1.0.3/js/freelancer.js"></script>

   

</body>

</html>
