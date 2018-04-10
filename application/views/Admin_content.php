<?php

if (isset($_GET['module']))
{
 $mod = $_GET['module'];
if($mod=='Beranda'){
	include "Admin_Beranda.php";
}elseif($mod=='Admin'){
	include "Admin_Admin.php";
} elseif($mod='Mahasiswa') {
	include "Admin_Mahasiswa.php";	
} elseif($mod='Perusahaan') {
	include "Admin_Perusahaan.php";	
} elseif($mod='Lowongan') {
	include "Admin_Lowongan.php";	
}
} else {
	include "Admin_Beranda.php";
}
?>