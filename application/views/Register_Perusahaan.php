<html>
<head>
    <title>Register</title>
   <!--
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
       -->
    <!--<link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script> -->


    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?=base_url();?>assets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/main.css">
    <!--===============================================================================================-->



</head>

<body>

<div class="container container-login100">
    <div class="col-lg-12 wrap-register100">
        <h3 class="well">Form pendaftaran Perusahaan</h3>
        <br>
        <div class="row">
            <form method="POST" action="<?php echo site_url('Perusahaan/register')?>>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nama Perusahaan</label>
                            <input name="nama_perusahaan" type="text" placeholder="input nama perusahaan disini" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7 form-group">
                            <label>Alamat Perusahaan</label>
                            <input name = "nama_jalan" type="text" placeholder="Nama jalan" class="form-control">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 form-group">
                            <label for="selectProvinsi">Provinsi</label>
                            <select name = "provinsi" class="form-control" id="selectProvinsi">
                                <option>Lampung</option>
                                <option>Bandung</option>
                                <option>Jakarta Selatan</option>
                                <option>Lampung Timur</option>
                                <option>Palembang</option>
                            </select>
                        </div>

                        <div class="col-sm-5 form-group">
                            <label for="selectkota">kota</label>
                            <select name = "kota" class="form-control" id="selectkota">
                                <option>Bandar Lampung</option>
                                <option>Bandung</option>
                                <option>Jakarta Selatan</option>
                                <option>Lampung Timur</option>
                                <option>Palembang</option>
                            </select>
                        </div>
                        <div class="col-sm-5 form-group">
                            <label>Negara</label>
                            <input name ="negara" type="text" placeholder="Input Negara disini..." class="form-control">
                        </div>
                        <div class="col-sm-5 form-group">
                            <label>kode pos</label>
                            <input name="kode_pos" type="text" placeholder="Input Kode Pos" class="form-control">
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Title</label>
                            <input type="text" placeholder="Enter Designation Here.." class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Company</label>
                            <input type="text" placeholder="Enter Company Name Here.." class="form-control">
                        </div>
                    </div>
                    -->
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Phone Number</label>
                            <input name="no_tlp" type="text" placeholder="Enter Phone Number Here.." class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Email Address</label>
                            <input name ="email_daftar" type="text" placeholder="Enter Email Address Here.." class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Username</label>
                            <input name = "username_daftar"type="text" placeholder="Enter Email Address Here.." class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Password</label>
                            <input name="password_daftar" type="password" placeholder="Enter Email Address Here.." class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="exampleFormControlSelect2">Industri</label>
                            <select name ="jenis_industri" class="form-control" id="exampleFormControlSelect2">
                                <option>Kesehatan</option>
                                <option>keuangan</option>
                                <option>Pertanian</option>
                                <option>Teknologi</option>
                                <option>lainya</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Website</label>
                            <input name="website" type="text" placeholder="Enter Website Name Here.." class="form-control">
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" >
                            Register
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-90">
                    <a class="txt1" href="<?php echo site_url ('/') ?>">
                        <h5>Sudah punya akun?</h5>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="<?=base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?=base_url();?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?=base_url();?>assets/vendor/bootstrap/js/popper.js"></script>
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?=base_url();?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?=base_url();?>assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?=base_url();?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?=base_url();?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?=base_url();?>assets/js/main.js"></script>


</body>
</html>