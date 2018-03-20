<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login </title>
	<link href="<?=base_url();?>assets/css/login.css" rel="stylesheet" />
</head>
<body>		

			<div class="A" >
				<div class="container">
				<div class="title">Masuk</div>
					<form action="<?php echo site_url ('User/login') ?>" method="POST">

						<br>
						<br><div id="gagallogin"><?php echo $this->session->flashdata('error') ?></div>

						<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input" type="text" name="username" placeholder="Username"/>



						<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input" type="Password" name="pass" placeholder="Password"/>



						<br>
						<br><input id="button" type="submit" name="login" value="Login"/>
						<br>
						<div id="forgotpass"><a href="<?php echo site_url('welcome/LupaPass')?>">Lupa password?</a></div>
					</form>
			</div>
			</div>
			

</body>
</html>