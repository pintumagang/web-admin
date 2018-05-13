<style type="text/css">
            small{
              font-size: 12px;
              margin: 20px;
              color : #FF0000;
            }
             .input-group {
              margin-top: 10px;
              margin-bottom: 10px;
             }
             .input-error {      
                border-color: #a94442;
             }
             .form-control .input-error:focus {
                border-color: #a94442;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
             }

             .input-success {      
                border-color: #3c763d;
             }
             .form-control .input-succes:focus {
                border-color: #3c763d;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
              }

</style>
<div class="judul">
    <h3 align="center">Data Program Studi</h3>
</div>
<div id="toolbar" class="btn-group">
</div>
<div >
<table id="myTable" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th width="40">No</th>
        <th>Nama Prodi</th>
        <th>Logo</th>
        <th width="80"><button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
        <i class="glyphicon glyphicon-plus">Tambah</i>
    </button></th>
      </tr>
      </thead>
            <tbody>
     <?php 
      foreach ($prodi as $prd) {
        $id_prodi = $prd['id_prodi'];
        $nama_prodi = $prd['nama_prodi'];
        $logo  = $prd['logo_prodi'];

      ?>
      <tr>
        <td><?php echo $id_prodi?></td>
        <td><?php echo $nama_prodi?> </td>
        <td>
            <?php 
                if($logo != ''){
                  ?>
                  <a style="margin-left: 135px" href="<?php echo $logo?>" >
                  <button style="font-size: 12px; " type="button" class="btn btn-default">
                     Lihat logo
                  </button></a>
            <?php  
                } else{
                  ?>
                  <button style="font-size: 12px; margin-left: 122px" type="button" class="btn btn-default">
                      Tidak Ada logo
                  </button>
            <?php      
                }
            ?>

            
          
        </td>
        <td>
        
          
          <button onclick="document.getElementById('modal-wrapper-edit<?php echo $id_prodi?>').style.display='block'" type="button" class="btn btn-default Tambah">
              <i class="glyphicon glyphicon-pencil"></i>
          </button>


        <div id="modal-wrapper-edit<?php echo $id_prodi?>" class="modal">

      <div class="modal-dialog-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="document.getElementById('modal-wrapper-edit<?php echo $id_prodi?>').style.display='none'" class="close" title="Close PopUp">&times;</span>
                        </div>
                        <div class="modal-body" >
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block">
                                       
     <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/editprodi/'.$id_prodi)?>" method="POST" enctype="multipart/form-data" novalidate="novalidate">

    <fieldset>
      
      <!-- Form Name -->
            <legend> Edit Data Prodi </legend>


      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="nama_prodi" class="form-control" type="text" data-bv-field="nama_prodi" value="<?php echo $nama_prodi?>"><i class="form-control-feedback" data-bv-icon-for="nama_prodi" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="gambar" class="form-control" type="file"><i class="form-control-feedback" data-bv-icon-for="fotofile" value="<?php echo $logo?>" style="display: none;"></i>
          </div>
        </div>
      </div>
      <!-- Button -->
      <div  style="width: 100%" class="form-group">
        <label class="col-md-6 control-label"></label>
        <div  style="width: 100%" class="col-md-4">
          <button style="margin-left: 45%;" type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </fieldset>
  <input type="hidden" value=""></form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

     </div> 

          <a href="<?php echo site_url('Admin/deleteprodi/'.$id_prodi)?>" >
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

                         <div class="modal-dialog-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                        </div>
                        <div class="modal-body" >
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block">



 <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/tambahprodi/')?>" method="POST" enctype="multipart/form-data" id="reg_form" novalidate="novalidate">
    <fieldset>
      
      <!-- Form Name -->
      <legend> Tambah Program Studi </legend>

      <div style="width: 100%;  " class="form-group has-feedback">
        <div style="width: 100%;  " class="col-md-6  inputGroupContainer">
          <div style="width: 100%; " class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" required name="nama_prodi" placeholder="Nama Prodi" class="form-control" type="text" data-bv-field="nama_prodi"><i class="form-control-feedback" data-bv-icon-for="nama_prodi" style="display: none;"></i>
          </div>
        </div>
      </div>

    <!-- Logo Prodi -->

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="gambar" placeholder="File foto..." class="form-control" type="file" size="20">
          </div>
        </div>
      </div>
      
  
      <!-- Button -->
      <div  style="width: 100%; margin-top : 40px;" class="form-group">
        <label class="col-md-6 control-label"></label>
        <div  style="width: 100%" class="col-md-4">
          <button style="margin-left: 45%;" type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </fieldset>
  <input type="hidden" value="">
  </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  
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
         //var id = document.getElementById('edit'),
        if (event.target == modal) {
                 modal.style.display = "none";
         }
      } 

</script>

<script type="text/javascript">
    var modal = document.getElementById('modal-wrapper-upload<?php echo $id_user?>');
      window.onclick = function(event) {
         //var id = document.getElementById('edit'),
        if (event.target == modal) {
                 modal.style.display = "none";
         }
      } 

</script>

<script src="<?php echo base_url('assets/css/bootstrapvalidator.min.js.download'); ?>"></script>



<script>  
 $(document).ready(function(){  
      $('#emailx').change(function(){  
           var email = $('#emailx').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url();?>index.php/Admin/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){
                       
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>'){
                            $('#email_resultx').html(data);
                            $('#divemailluarx').removeClass('has-success');
                            $('#emailx').addClass('input-error');
                            event.preventDefault()
                          } else {
                            $('#email_resultx').html(data);
                            $('#emailx').removeClass('input-error');
                            $('#emailx').addClass('input-success');
                          }
                        $('#reg_form').submit(function(event){
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>'){
                            event.preventDefault()
                          } else {

                          }
                        });
                     } 
                });  
           }  
      });  
 });  
 </script>


<script>  
 $(document).ready(function(){  
      $('#unamex').change(function(){  
           var uname = $('#unamex').val();  
           if(uname != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url();?>index.php/Admin/check_uname_avalibility",  
                     method:"POST",  
                     data:{uname:uname},  
                     success:function(data){   
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="uname" class="help-block" style="display: block;">Username telah digunakan!</small>'){
                            $('#uname_resultx').html(data);
                            $('#divunameluarx').removeClass('has-success');
                            $('#unamex').addClass('input-error');
                            e.preventDefault();
                          } else {
                            $('#uname_resultx').html(data);
                            $('#unamex').removeClass('input-error');
                            $('#unamex').addClass('input-success');
                            e.preventDefault();
                          }
                        
                           $('#reg_form').on('submit', function(e){
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="uname" class="help-block" style="display: block;">Username telah digunakan!</small>'){
                            e.preventDefault();
                          } else {
                            
                          }
                        });
                     }  
                });  
           }  
      });  
 });  
 </script> 