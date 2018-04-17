<div class="judul">
    <h3 align="center">Data Administrator</h3>
</div>
<div id="toolbar" class="btn-group">
    
</div>
<table id="myTable" class="table table-striped table-bordered table-hover" >
     <thead>
      <tr>
        <th>No</th>
        <th>Nama Admin</th>
        <th>Username</th>
        <th>Email</th>
        <th>No Hp</th>
        <th>Last Login</th>
        <th>Action</th>
      </tr>
      </thead>
            <tbody>

      <?php 
      foreach ($admin as $ad) {
       $id_user  = $ad['id_user'];
       $id_admin  = $ad['id_admin'];
       $nama = $ad['nama'];
       $username   = $ad['username'];
       $email_user  = $ad['email_user'];
       $hp = $ad['phone'];
       $last_login = $ad['last_login'];
      

       echo "
      <tr>
        <td>$id_admin</td>
        <td>$nama</td>
        <td>$username</td>
        <td>$email_user</td>
        <td>$hp</td>
        <td>$last_login</td> 
        <td> " ;
        ?>


          <button onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='block'" type="button" class="btn btn-default Tambah" value="<?php echo $id_user?>" >
              <i class="glyphicon glyphicon-pencil"></i>
          </button>


          <div id="modal-wrapper-edit<?php echo $id_user?>" class="modal">
            <form class="modal-content animate" action="<?php echo site_url('Admin/editadmin/'.$id_user)?>" method="POST">
                  
              <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h3 style="text-align:center">Edit Admin</h3>
              </div>
              <div class="row">
                <div class="col-md-2">
              <div class="container">
                <input class="form-create" type="text" placeholder="Username" name="uname" value="<?php echo $username?>"><br>
                <input class="form-create" type="text" placeholder="Nama" name="nama" value="<?php echo $nama?>"><br>
                <input class="form-create" type="text" placeholder="Email" name="email_u" value="<?php echo $email_user?>" ><br>
                <input class="form-create" type="text" placeholder="No Hp " name="hp" value="<?php echo $hp?>"><br>
                <button id="btn2" class="form-button" type="button" onclick="window.top.close();" value="Close [x]">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Update</button>
                
              </div>  
              </div>
              
              </div>
              </div>

            </form>
            
          </div>
          
          <a href="<?php echo site_url('Admin/deleteadmin/'.$id_user)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"></i>
          </button></a>
          
        </td>
       
      </tr>
     <?php }?>
      </tbody>
    </table>

    <script type="text/javascript">
    var modal = document.getElementById('modal-wrapper-edit<?php echo $id_user?>');

      window.onclick = function(event) {
         var id = document.getElementById('edit'),
        if (event.target == modal) {
                 modal.style.display = "none";
         }
      } 
    </script>