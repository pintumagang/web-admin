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
        <th>Last Login</th>
        <th><button type="button" class="btn btn-default">
        <i class="glyphicon glyphicon-plus"><a href="">Tambah</a></i>
    </button></th>
      </tr>
      </thead>
            <tbody>

      <?php 
      $no = 1;
      foreach ($admin as $ad) {
      ?>

      <tr>
        <td><?php echo $ad->id_admin ?></td>
        <td><?php echo $ad->nama;?></td>
        <td><?php echo $ad->email;?></td>
        <td><?php echo $ad->username?></td>
        <td><?php echo $ad->last_login?></td> 
        <td>

          <button type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-pencil"><a href="">Edit</a></i>
          </button> 
          
          <button type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"><a href="">Hapus</a></i>
          </button>
          
        </td>
       
      </tr>
     <?php }?>
      </tbody>
    </table>
