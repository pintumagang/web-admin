
<div class="list-group-sm">
        <a <?php if(@$_GET['module'] == 'Beranda' || @$_GET['module'] == Null ) { ?> class='list-group-item active' <?php } ?>  href="<?php echo site_url('Admin/View_Beranda')?>?module=Beranda" class="list-group-item "><i class="fa fa-home tab10" aria-hidden="true"></i> Beranda</a>
        <a <?php if(@$_GET['module'] == 'Admin') { ?> class='list-group-item active' <?php } ?> href="<?php echo site_url('Admin/View_Admin')?>?module=Admin" class="list-group-item "><i class="fa fa-file-o tab10" aria-hidden="true"></i> Admin </a>
        <a <?php if(@$_GET['module'] == 'Mahasiswa') { ?> class='list-group-item active' <?php } ?> href="<?php echo site_url('Admin/View_Mahasiswa')?>?module=Mahasiswa" class="list-group-item "><i class="fa fa-file-o tab10" aria-hidden="true"></i> Mahasiswa</a>
        <a <?php if(@$_GET['module'] == 'Perusahaan') { ?> class='list-group-item active' <?php } ?> href="<?php echo site_url('Admin/View_Perusahaan')?>?module=Perusahaan" class="list-group-item "><i class="fa fa-file-text-o tab10" aria-hidden="true"></i> Perusahaan</a>
        <a <?php if(@$_GET['module'] == 'Lowongan') { ?> class='list-group-item active' <?php } ?> href="<?php echo site_url('Admin/View_Lowongan')?>?module=Lowongan" class="list-group-item "><i class="fa fa-file-text-o tab10" aria-hidden="true"></i> Lowongan</a>    
</div>