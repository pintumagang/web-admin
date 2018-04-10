<?php

if (isset($_GET['module']))
{
    $mod = $_GET['module'];
    if($mod=='BerandaPerusahaan'){
        include "Perusahaan_Beranda.php";
    }elseif($mod=='EditProfil'){
        include "Perusahaan_EditProfil.php";
    } elseif($mod=='Pendaftar') {
        include "Perusahaan_Pendaftar.php";
    } elseif($mod=='TambahLowongan') {
        include "Perusahaan_TambahLowongan.php";
    }
} else {
    include "Perusahaan_Beranda.php";
}
?>