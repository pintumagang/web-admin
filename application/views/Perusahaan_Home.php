<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?=base_url();?>assets/css/CSS_Admin_Home.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>


</head>
<body>

<div class="container base">
    <div>
        <h1 align="center">Pintu Magang</h1>
    </div>
    <div class="row div">
        <div class="container top">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="" target="_blank" style="color:white;"><i class=""></i><?php echo $_SESSION['user'];?></a></li>
                        <li><a href="<?php echo site_url('User/logout') ?>" style="color:white;" ><i class="glyphicon glyphicon-log-out" style="color:white;"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container content">
            <div class="row div">
                <div class="col-md-3">
                    <div class="content">

                        <?php include 'Perusahaan_Navbar.php'; ?>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content">

                        <?php include 'Perusahaan_content.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
