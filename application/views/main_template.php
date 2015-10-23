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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
        <div class="container konten">
            <div class="row" style="padding-top:50px;">
                <section>
                    <?php echo $content; ?>
                </section>
            </div>
        </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Desnet2015
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
