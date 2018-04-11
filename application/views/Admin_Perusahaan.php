<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Admin_Mahasiswa_Popup_create.css'); ?>">
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
        <i class="glyphicon glyphicon-plus">Tambah</i>
    </button></th>
      </tr>
      </thead>
            <tbody>
     <?php 
      foreach ($perusahaan as $phs) {
      ?>

      <tr>
        <td><?php echo $phs->id_perusahaan?></td>
        <td><?php echo $phs->nama_perushaan?></td>
        <td><?php echo $phs->username?></td>
        <td><?php echo $phs->email_user?></td>
        <td><?php echo $phs->link_website?></td>
        <td><?php echo $phs->alamat_perusahaan?></td>
        <td><?php echo $phs->deksripsi?></td>
        <td><?php echo $phs->status?></td>
        <td><?php echo $phs->last_login?></td> 
        <td>

          <button onclick="document.getElementById('modal-wrapper-edit').style.display='block'" type="button" class="btn btn-default Tambah" >
              <i class="glyphicon glyphicon-pencil">Edit</i>
          </button>


          <div id="modal-wrapper-edit" class="modal">

            <form class="modal-content animate" action="<?php echo site_url('Admin/editperusahaan/'.$phs->id_user)?>" method="POST">
                  
              <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper-edit').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h3 style="text-align:center">Edit Perusahaan</h3>
              </div>
              <div class="row">
                <div class="col-md-2">
              <div class="container">
                <input class="form-create" type="text" placeholder="Username" name="uname" value="<?php echo $phs->username?>"><br>
                <input class="form-create" type="text" placeholder="Nama Perusahaan" name="nama_phs" value="<?php echo $phs->nama_depan?>"><br>
                <input class="form-create" type="text" placeholder="Email" name="email_u" value="<?php echo $phs->email_user?>" ><br>
                <input class="form-create" type="text" placeholder="Website" name="web" value="<?php echo $phs->link_website?>" ><br>
                <input class="form-create" type="text" placeholder="Alamat" name="almt" value="<?php echo $phs->alamat_perusahaan?>" ><br>
                <input class="form-create" type="text area" placeholder="Deksripsi" name="deks" value="<?php echo $phs->deskripsi?>" ><br>
                <input class="form-create" type="text" placeholder="Status" name="status" value="<?php echo $phs->status?>" ><br>      
                <button id="btn2" class="form-button" type="button" onclick="window.top.close();" value="Close [x]">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Update</button>
                
              </div>  
              </div>
              
              </div>
              </div>

            </form>
            
          </div>   

          <a href="<?php echo site_url('Admin/deleteperusahaan/'.$phs->id_user)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash">Hapus</i>
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
var modal = document.getElementById('modal-wrapper-edit');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>