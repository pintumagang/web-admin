<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="<?=base_url();?>assets/css/Admin_Home_Navbar.css" rel="stylesheet" />
</head>
<body>

<div class="container base">
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
          <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="" target="_blank"><i class="fa fa-user"></i>Sulaiman osman</a></li>
                <li><a href=""><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                </ul>
          </div>  
      </nav>
    </div>
  <div class="container content">
    <div class="row div">
      <div class="col-md-3">
      <div class="list-group">
        <a href="" class="list-group-item active"><i class="fa fa-home tab10" aria-hidden="true"></i> Beranda</a>
        <a href="" class="list-group-item "><i class="fa fa-plus-circle tab10" aria-hidden="true"></i> Admin </a>
        <a href="" class="list-group-item "><i class="fa fa-file-o tab10" aria-hidden="true"></i> Mahasiswa</a>
        <a href="" class="list-group-item "><i class="fa fa-file-text-o tab10" aria-hidden="true"></i> Perusahaan</a>
        
      </div>
      </div>
      <div class="col-md-9">
      <div>
       <div class="row">
      
            <div class="col-xs-6 col-md-3 productbox">
              <a href="#" class="thumbnail clearfix">
                <img src="<?php echo base_url('assets\images\icons\admin.png'); ?>" width="120px" height="80px" class="img-responsive">
                <div class="producttitle">Admin</div>
              </a>
            </div>

            <div class="col-xs-6 col-md-3 productbox">
              <a href="#" class="thumbnail clearfix">
                <img src="<?php echo base_url('assets\images\icons\mahasiswa.png'); ?>" width="120px" height="80px" class="img-responsive">
                <div class="producttitle">Mahasiswa</div>
              </a>
            </div>

            <div class="col-xs-6 col-md-3 productbox">
              <a href="#" class="thumbnail clearfix">
                <img src="<?php echo base_url('assets\images\icons\company.png'); ?>" width="120px" height="80px" class="img-responsive">
                <div class="producttitle">Perusahaan</div>
              </a>
            </div> 

       </div>
      </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
