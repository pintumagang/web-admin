<style>
img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 100%;
    height: 100%;
}

.containers{
    height: 90%;
    width: 90%;
    margin-left: 5%;
    margin-right: 5%;
    margin-top: 10px;
    margin-bottom: 10px;
}

.frame{
  margin-top: 10px;
  margin-bottom: 10px;
}

img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>

<div class="containers">

  <?php 
      foreach ($slider as $key) {
        $id_slider = $key['id_slider'];
  ?>
            <div class="frame">
              
              <a target="_blank" href="<?php echo $key['foto_slider']; ?>">
                <img src="<?php echo $key['foto_slider'];?>" style="width:100%">
              </a>
              <div class="action" style="margin-left: 50%;">
                 <a href="<?php echo site_url('Admin/deleteslider/'.$id_slider)?>" >
                  <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
                      <i class="glyphicon glyphicon-trash"></i>
                  </button>
              </div>
            </div>        
  <?php
      }
  ?>

</div>