<div class="judul">
    <h3 align="center">Data User Perusahaan</h3>
</div>
<div id="toolbar" class="btn-group">
</div>

<table id="myTable" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Username</th>
        <th>Email</th>
        <th>Website</th>
        <th>Alamat</th>
        <th>Deskripsi</th>
        <th>Status</th>
        <th>Last Login</th>
        <th><button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
        <i class="glyphicon glyphicon-plus">Tambah  </i>
    </button></th>
      </tr>
      </thead>
            <tbody>
     <?php 
      foreach ($perusahaan as $phs) {
      $id_user      = $phs['id_user'];
      $id_perusahaan = $phs['id_perusahaan'];
      $nama_perusahaan  = $phs['nama_perusahaan'];
      $username = $phs['username'];
      $email_user = $phs['email_user'];
      $link_website = $phs['link_website'];
      $alamat_perusahaan = $phs['alamat_perusahaan'];
      $deskripsi = $phs['deskripsi'];
      $status = $phs['status'];
      $last_login = $phs['last_login'];

      echo "
      <tr>
        <td>$id_perusahaan</td>
        <td>$nama_perusahaan</td>
        <td>$username</td>
        <td>$email_user</td>
        <td>$link_website</td>
        <td>$alamat_perusahaan</td>
        <td>$deskripsi</td>
        <td>$status</td>
        <td>$last_login</td> 
        <td> ";
        ?>


        <?php 

            if($status == 'Tidak Valid'){
              ?>
              <a href="<?php echo site_url('Admin/validasiperusahaan/'.$id_user)?>" >
              <button onclick="return confirm ('Validasi Perusahaan?')" type="button" class="btn btn-default">
                  <i class="glyphicon glyphicon-ok"></i>
              </button></a>
        <?php  
            } else {
              ?>
              <a href="<?php echo site_url('Admin/batalvalidasiperusahaan/'.$id_user)?>" >
              <button onclick="return confirm ('Batalkan Validasi Perusahaan?')" type="button" class="btn btn-default">
                  <i class="glyphicon glyphicon-ban-circle"></i>
              </button></a>
        <?php      
            }
        ?>

          <button onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='block'" type="button" class="btn btn-default Tambah" value="<?php echo $id_user?>" >
              <i class="glyphicon glyphicon-pencil"></i>
          </button>

          <div id="modal-wrapper-edit<?php echo $id_user?>" class="modal">

            <form class="modal-content animate" action="<?php echo site_url('Admin/editperusahaan/'.$id_user)?>" method="POST">
                  
              <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h3 style="text-align:center">Edit Perusahaan</h3>
              </div>
              <div class="row">
                <div class="col-md-2">
              <div class="container">
                <input class="form-create" type="text" placeholder="Username" name="uname" value="<?php echo $username?>"><br>
                <input class="form-create" type="text" placeholder="Nama Perusahaan" name="nama_phs" value="<?php echo $nama_perusahaan?>"><br>
                <input class="form-create" type="text" placeholder="Email" name="email_u" value="<?php echo $email_user?>" ><br>
                <input class="form-create" type="text" placeholder="Website" name="web" value="<?php echo $link_website?>" ><br>
                <input class="form-create" type="text" placeholder="Alamat" name="almt" value="<?php echo $alamat_perusahaan?>" ><br>
                <input class="form-create" type="text area" placeholder="Deksripsi" name="deks" value="<?php echo $deskripsi?>" ><br>
                <!--<input class="form-create" type="text" placeholder="Status" name="status" value="<?php echo $status?>" ><br>      -->
                <button id="btn2" class="form-button" type="button" onclick="window.top.close();" value="Close [x]">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Update</button>
                
              </div>  
              </div>
              
              </div>
              </div>

            </form>
            
          </div>   

          <a href="<?php echo site_url('Admin/deleteperusahaan/'.$id_user)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"></i>
          </button></a>
          
        </td>
       
      </tr>
     <?php }?>
     
      </tbody>
    </table>

<div id="modal-wrapper" class="modal">

  <form class="modal-content animate" action="<?php echo site_url('Admin/tambahperusahaan')?>" method="POST">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <h3 style="text-align:center">Tambah Perusahaan</h3>
    </div>
    <div class="row">
      <div class="col-md-2">
    <div class="container">
                <input class="form-create" type="text" placeholder="Username" name="uname" ><br>
                <input class="form-create" type="text" placeholder="Nama Perusahaan" name="nama_phs" ><br>
                <input class="form-create" type="text" placeholder="Email" name="email_u"><br>
                <input class="form-create" type="text" placeholder="Website" name="web"><br>
                <input class="form-create" type="text" placeholder="Alamat" name="almt"><br>
                <input class="form-create" type="text area" placeholder="Deksripsi" name="deks"><br>
                <input class="form-create" type="text" placeholder="Status" name="status"><br>
                <input class="form-create" type="password" placeholder="Password" name="psw"><br>        
                <button id="btn2" class="form-button" type="button" onclick="window.top.close();" value="Close [x]">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Tambah</button>
      
    </div>  
    </div>
    
    </div>
    </div>

  </form>
  
</div>
<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('modal-wrapper-edit<?php echo $id_user?>');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>