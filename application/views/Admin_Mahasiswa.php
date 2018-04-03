<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Admin_Mahasiswa_Popup_create.css'); ?>">
<div class="judul">
    <h3 align="center">Data User Mahasiswa</h3>
</div>
<div id="toolbar" class="btn-group">
</div>
<table id="myTable" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Username</th>
        <th>Email</th>
        <th>Perguruan Tinggi</th>
        <th>No. Hp</th>
        <th>Alamat</th>
        <th><button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
        <i class="glyphicon glyphicon-plus">Tambah</i>
    </button></th>
      </tr>
      </thead>
            <tbody>
      <tr>
        <td><?php echo 1 ?></td>
        <td><?php echo 'Sul'?></td>
        <td><?php echo 'sul@gmail.com'?></td>
        <td><?php echo 'sulos'?></td>
        <td><?php echo 'Hari ini'?></td>
        <td><?php echo 'sulos'?></td>
        <td><?php echo 'Hari ini'?></td> 
        <td>
          <button type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-pencil"><a href="">Edit</a></i>
          </button> 
          
          <button type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"><a href="">Hapus</a></i>
          </button>
        </td>
       
      </tr>
     
      </tbody>
    </table>

<div id="modal-wrapper" class="modal">

  <form class="modal-content animate" action="/action_page.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <h3 style="text-align:center">Tambah Mahasiswa</h3>
    </div>
    <div class="row">
      <div class="col-md-2">
    <div class="container">
      <input class="form-create" type="text" placeholder="Enter Username" name="uname"><br>
      <input class="form-create" type="text" placeholder="Enter Username" name="uname"><br>
      <input class="form-create" type="text" placeholder="Enter Username" name="uname"><br>
      <input class="form-create" type="text" placeholder="Enter Username" name="uname"><br>
      <input class="form-create" type="text" placeholder="Enter Username" name="uname"><br>
      <input class="form-create" type="password" placeholder="Enter Password" name="psw"></input><br>
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

</script>
