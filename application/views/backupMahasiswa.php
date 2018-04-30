<div class="judul">
    <h3 align="center">Data User Mahasiswa</h3>
</div>
<div id="toolbar" class="btn-group">
</div>
<div onload="myFunction()" style="margin:0;" style="overflow-y:hidden;overflow-x:scroll;" >
<table id="myTable" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Username</th>
        <th>Email</th>
        <th>Perguruan Tinggi</th>
        <th>No. Hp</th>
        <th>Last Login</th>
        <th><button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
        <i class="glyphicon glyphicon-plus">Tambah</i>
    </button></th>
      </tr>
      </thead>
            <tbody>
     <?php 
      foreach ($mahasiswa as $mhs) {
        $id_user  = $mhs['id_user'];
        $id_mhs   = $mhs['id_mhs'];
        $nama_depan = $mhs['nama_depan'];
        $nama_belakang = $mhs['nama_belakang'];
        $username   = $mhs['username'];
        $email_user  = $mhs['email_user'];
        $perguruan_tinggi = $mhs['perguruan_tinggi'];
        $hp = $mhs['hp'];
        $last_login = $mhs['last_login'];

      echo"
      <tr>
        <td> $id_mhs </td>
        <td> $nama_depan $nama_belakang</td>
        <td> $username</td>
        <td> $email_user</td>
        <td> $perguruan_tinggi</td>
        <td> $hp</td>
        <td> $last_login</td> 
        <td> ";
        ?>
        
          
          <button onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='block'" type="button" class="btn btn-default Tambah" value="<?php echo $id_user?>" >
              <i class="glyphicon glyphicon-pencil"></i>
          </button>

    <div id="modal-wrapper-edit<?php echo $id_user?>" class="modal">
          <form class="modal-content animate" action="<?php echo site_url('Admin/editmahasiswa/'.$id_user)?>" method="POST">
                  
              <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h3 style="text-align:center">Edit Mahasiswa</h3>
              </div>
              <div class="row">
                <div class="col-md-2">
              <div class="container">
                <input class="form-create" type="text" placeholder="Username" name="uname" value="<?php echo $username?>"><br>
                <input class="form-create" type="text" placeholder="Nama depan" name="nama_dpn" value="<?php echo $nama_depan?>"><br>
                <input class="form-create" type="text" placeholder="Nama belakang" name="nama_blkg" value="<?php echo $nama_belakang?>"><br>
                <input class="form-create" type="text" placeholder="Email" name="email_u" value="<?php echo $email_user?>" ><br>
                <input class="form-create" type="text" placeholder="Perguruan Tinggi" name="ptn" value="<?php echo $perguruan_tinggi?>" ><br>
                <input class="form-create" type="text" placeholder="Nomor Hp" name="hp" value="<?php echo $hp?>" ><br>      
                <button id="btn2" class="form-button" type="button">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Update</button>
                
              </div>  
              </div>
              
              </div>

            </form> 
     </div> 

          <a href="<?php echo site_url('Admin/deletemahasiswa/'.$id_user)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"></i>
          </button></a>
          
        </td>
       
      </tr>
     <?php }
     ?>
     
      </tbody>
    </table>
  </div>  

<div id="modal-wrapper" class="modal">

  <form class="modal-content animate" action="<?php echo site_url('Admin/tambahmahasiswa')?>" method="POST">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <h3 style="text-align:center">Tambah Mahasiswa</h3>
    </div>
    <div class="row">
      <div class="col-md-2">
    <div class="container">
      <input required class="form-create" type="text" placeholder="Username" name="uname"><br>
      <input required class="form-create" type="text" placeholder="Nama depan" name="nama_dpn"><br>
      <input required class="form-create" type="text" placeholder="Nama belakang" name="nama_blkg"><br>
      <input required class="form-create" type="text" placeholder="Email" name="email_u"><br>
      <input required class="form-create" type="text" placeholder="Perguruan Tinggi" name="ptn"><br>
      <input required class="form-create" type="text" placeholder="Nomor Hp" name="hp"><br>      
      <input required id="validationServer01" class="form-create" type="password" placeholder="Password" name="psw"></input><br>
      <button id="btn2" class="form-button" type="submit">Batalkan</button>
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
</script>

<script type="text/javascript">
    var modal = document.getElementById('modal-wrapper-edit<?php echo $id_user?>');

      window.onclick = function(event) {
         var id = document.getElementById('edit'),
        if (event.target == modal) {
                 modal.style.display = "none";
         }
      } 
</script>