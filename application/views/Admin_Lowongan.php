<div class="judul">
    <h3 align="center">Data User Perusahaan</h3>
</div>
<div id="toolbar" class="btn-group">
</div>

<table id="myTable" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th>No</th>
        <th>Nama Lowongan</th>
        <th>Nama Perusahaan</th>
        <th>Lokasi</th>
        <th>Waktu_input</th>
        <th>Batas Lamar</th>
        <th>Jenis Magang</th>
        <th style="width: 60px;">Status</th>
        <th style="width: 70px;"><button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
        <i class="glyphicon glyphicon-plus">Tambah  </i>
    </button></th>
      </tr>
      </thead>
            <tbody>
     <?php 
      foreach ($lowongan as $lwg) {
      $id_lowongan      = $lwg['id_lowongan'];
      $id_perusahaan    = $lwg['id_perusahaan'];
      $nama_lowongan    = $lwg['nama_lowongan'];
      $nama_perusahaan  = $lwg['nama_perusahaan'];
      $waktu_input      = $lwg['waktu_input'];
      $batas_lamar      = $lwg['deadline_submit'];
      $status           = $lwg['status'];
      $lokasi           = $lwg['lokasi'];
      $jenis_magang     = $lwg['jenis_magang'];

      ?>
      <tr>
        <td><?php echo $id_lowongan ?></td>
        <td><?php echo $nama_lowongan ?></td>
        <td><?php echo $nama_perusahaan?></td>
        <td><?php echo $lokasi?></td>
        <td><?php echo $waktu_input?></td>
        <td><?php echo $batas_lamar?></td>
        <td><?php echo $jenis_magang?></td>
        <td>
        <?php 

            if($status == 1){
              ?>
              <a style="margin-left: 18px" href="<?php echo site_url('Admin/aktif/'.$id_lowongan)?>" >
              <button style="font-size: 12px;" onclick="return confirm ('Non aktifkan Lowongan?')" type="button" class="btn btn-default">
                  Aktif
              </button></a>
        <?php  
            } else if ($status == 0){
              ?>
              <a href="<?php echo site_url('Admin/nonaktif/'.$id_lowongan)?>" >
              <button style="font-size: 12px; "onclick="return confirm ('Aktifkan lowongan?')" type="button" class="btn btn-default">
                  Tidak Aktif
              </button></a>
        <?php      
            }
        ?>

        </td>
        <td> 

          <button onclick="document.getElementById('modal-wrapper-edit<?php echo $id_lowongan?>').style.display='block'" type="button" class="btn btn-default Tambah" value="<?php echo $id_lowongan?>" >
              <i class="glyphicon glyphicon-pencil"></i>
          </button>

          <div id="modal-wrapper-edit<?php echo $id_lowongan?>" class="modal">

            <form class="modal-content animate" action="<?php echo site_url('Admin/editlowongan/'.$id_lowongan)?>" method="POST">
                  
              <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper-edit<?php echo $id_lowongan?>').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h3 style="text-align:center">Edit Perusahaan</h3>
              </div>
              <div class="row">
                <div class="col-md-2">
              <div class="container">
                <input class="form-create" type="text" placeholder="Nama Lowongan" name="nama_lowongan" value="<?php echo $nama_lowongan?>"><br>
                <input class="form-create" type="text" placeholder="Nama Perusahaan" name="nama_perusahaan" value="<?php echo $nama_perusahaan?>"><br>
                <input class="form-create" type="text" placeholder="Lokasi" name="lokasi" value="<?php echo $lokasi?>" ><br>
                <input class="form-create" type="text" placeholder="Waktu input" name="waktu_input" value="<?php echo $waktu_input?>" ><br>
                <input class="form-create" type="text" placeholder="Batas lamar" name="batas_lamar" value="<?php echo $batas_lamar?>" ><br>
                <input class="form-create" type="text" placeholder="Jenis Magang" name="jenis_magang" value="<?php echo $jenis_magang?>" ><br>
                <button id="btn2" class="form-button" type="button" onclick="window.top.close();" value="Close [x]">Batalkan</button>
                <button id="btn1" class="form-button" type="submit">Update</button>
                
              </div>  
              </div>
              
              </div>
              </div>

            </form>
            
          </div>   

          <a href="<?php echo site_url('Admin/deletelowongan/'.$id_lowongan)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"></i>
          </button></a>
          
        </td>
       
      </tr>
     <?php }?>
     
      </tbody>
    </table>

<div id="modal-wrapper" class="modal">

  <form class="modal-content animate" action="<?php echo site_url('Admin/tambahlowongan')?>" method="POST">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <h3 style="text-align:center">Tambah Perusahaan</h3>
    </div>
    <div class="row">
      <div class="col-md-2">
    <div class="container">
                <input class="form-create" type="text" placeholder="Nama Lowongan" name="nama_lowongan" ><br>
                <input class="form-create" type="text" placeholder="Lokasi" name="lokasi"  ><br>
                <input class="form-create" type="text" placeholder="Waktu input" name="waktu_input" ><br>
                <input class="form-create" type="text" placeholder="Batas lamar" name="batas_lamar"  ><br>
                <input class="form-create" type="text" placeholder="Jenis Magang" name="jenis_magang" ><br>        
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
var modal = document.getElementById('modal-wrapper-edit<?php echo $id_lowongan?>');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>