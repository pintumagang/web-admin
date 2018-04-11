<div class="judul">
    <h3 align="center">Data User Mahasiswa</h3>
</div>
<div id="toolbar" class="btn-group">
</div>
<div style="overflow-y:hidden;overflow-x:scroll;" >
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
      ?>

      <tr>
        <td><?php echo $mhs->id_mhs?></td>
        <td><?php echo $mhs->nama_depan," ",$mhs->nama_belakang?></td>
        <td><?php echo $mhs->username?></td>
        <td><?php echo $mhs->email_user?></td>
        <td><?php echo $mhs->perguruan_tinggi?></td>
        <td><?php echo $mhs->hp?></td>
        <td><?php echo $mhs->last_login?></td> 
        <td>
        
          <button onclick="document.getElementById('modal-wrapper-edit').style.display='block'" type="button" class="btn btn-default Tambah" >
              <i class="glyphicon glyphicon-pencil">Edit</i>
          </button>

          <div id="modal-wrapper-edit" class="modal">

            <form class="modal-content animate" action="<?php echo site_url('Admin/editmahasiswa/'.$mhs->id_user)?>" method="POST">
                  
              <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper-edit').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h3 style="text-align:center"><?php echo $mhs->id_user?></h3>
              </div>
              <div class="row">
                <div class="col-md-2">
              <div class="container">
                <input class="form-create" type="text" placeholder="Username" name="uname" value="<?php echo $mhs->username?>"><br>
                <input class="form-create" type="text" placeholder="Nama depan" name="nama_dpn" value="<?php echo $mhs->nama_depan?>"><br>
                <input class="form-create" type="text" placeholder="Nama belakang" name="nama_blkg" value="<?php echo $mhs->nama_belakang?>"><br>
                <input class="form-create" type="text" placeholder="Email" name="email_u" value="<?php echo $mhs->email_user?>" ><br>
                <input class="form-create" type="text" placeholder="Perguruan Tinggi" name="ptn" value="<?php echo $mhs->perguruan_tinggi?>" ><br>
                <input class="form-create" type="text" placeholder="Nomor Hp" name="hp" value="<?php echo $mhs->hp?>" ><br>      
                <button id="btn2" class="form-button" type="button">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Update</button>
                
              </div>  
              </div>
              
              </div>

            </form>
            
          </div>   

          <a href="<?php echo site_url('Admin/deletemahasiswa/'.$mhs->id_user)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash">Hapus</i>
          </button></a>
          
        </td>
       
      </tr>
     <?php }?>
     
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
      <input class="form-create" type="text" placeholder="Username" name="uname"><br>
      <input class="form-create" type="text" placeholder="Nama depan" name="nama_dpn"><br>
      <input class="form-create" type="text" placeholder="Nama belakang" name="nama_blkg"><br>
      <input class="form-create" type="text" placeholder="Email" name="email_u"><br>
      <input class="form-create" type="text" placeholder="Perguruan Tinggi" name="ptn"><br>
      <input class="form-create" type="text" placeholder="Nomor Hp" name="hp"><br>      
      <input class="form-create" type="password" placeholder="Password" name="psw"></input><br>
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
var modal = document.getElementById('modal-wrapper-edit');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>