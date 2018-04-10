<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Admin_Mahasiswa_Popup_create.css'); ?>">
<div class="judul">
    <h3 align="center">Data Administrator</h3>
</div>
<div id="toolbar" class="btn-group">
    
</div>
<table id="myTable" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th>No</th>
        <th>Nama Admin</th>
        <th>Email</th>
        <th>Username</th>
        <th>No Hp</th>
        <th>Last Login</th>
        <th>Action</th>
      </tr>
      </thead>
            <tbody>

      <?php 
      foreach ($admin as $ad) {
      ?>

      <tr>
        <td><?php echo $ad->id_user ?></td>
        <td><?php echo $ad->nama?></td>
        <td><?php echo $ad->email_user?></td>
        <td><?php echo $ad->username?></td>
        <td><?php echo $ad->phone?></td>
        <td><?php echo $ad->last_login?></td> 
        <td>


          <button onclick="document.getElementById('modal-wrapper-edit').style.display='block'" type="button" class="btn btn-default Tambah" >
              <i class="glyphicon glyphicon-pencil">Edit</i>
          </button>


          <div id="modal-wrapper-edit" class="modal">

            <form class="modal-content animate" action="<?php echo site_url('Admin/editadmin/'.$ad->id_user)?>" method="POST">
                  
              <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper-edit').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h3 style="text-align:center">Edit Admin</h3>
              </div>
              <div class="row">
                <div class="col-md-2">
              <div class="container">
                <input class="form-create" type="text" placeholder="Username" name="uname" value="<?php echo $ad->username?>"><br>
                <input class="form-create" type="text" placeholder="Nama" name="nama" value="<?php echo $ad->nama?>"><br>
                <input class="form-create" type="text" placeholder="Email" name="email_u" value="<?php echo $ad->email_user?>" ><br>
                <input class="form-create" type="text" placeholder="No Hp " name="hp" value="<?php echo $ad->phone?>"><br>
                <button id="btn2" class="form-button" type="button" onclick="window.top.close();" value="Close [x]">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Update</button>
                
              </div>  
              </div>
              
              </div>
              </div>

            </form>
            
          </div>
          
          <a href="<?php echo site_url('Admin/deleteadmin/'.$ad->id_user)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash">Hapus</i>
          </button></a>
          
        </td>
       
      </tr>
     <?php }?>
      </tbody>
    </table>