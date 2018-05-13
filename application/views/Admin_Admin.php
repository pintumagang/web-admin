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
    <h3 align="center">Data User Mahasiswa</h3>
</div>
<div id="toolbar" class="btn-group">
</div>
<div >
<table id="myTable" class="table table-striped table-bordered table-hover">
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
        
          
          <button onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='block'" type="button" class="btn btn-default Tambah">
              <i class="glyphicon glyphicon-pencil"></i>
          </button>


        <div id="modal-wrapper-edit<?php echo $id_user?>" class="modal">

      <div class="modal-dialog-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='none'" class="close" title="Close PopUp">&times;</span>
                        </div>
                        <div class="modal-body" >
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block">
<script type="text/javascript">
$(document).ready(function() {
    $('#reg_form<?php echo $id_user?>').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
               fields: {

           uname: {
                validators: {
                    stringLength: {
                        min: 6,
                    },
                        notEmpty: {
                        message: 'Minimal 6 karakter!'
                    }
                }
            },

            nama: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Masukkan nama depan!'
                    }
                }
            },
             
           
            hp: {
                validators: {
                    stringLength: {
                        min: 12,
                    },
                    notEmpty: {
                        message: 'Masukkan nomer hp!'
                    }
                }
            },


        email: {
                validators: {
                    notEmpty: {
                        message: 'Masukkan email!'
                    },
                    
                }
            },
                              
            }
        })
        
    
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#reg_form<?php echo $id_user?>').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
 </script>

 <script> 

 $(document).ready(function(){ 

      $('#email<?php echo $id_user?>').change(function(){ 
           var prev = this.defaultValue;
           var email = $('#email<?php echo $id_user?>').val();
           if(email != '') {
              if (email != prev) {
                $.ajax({  
                     url:"<?php echo base_url();?>index.php/Admin/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){
                       
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>'){
                            $('#email_result<?php echo $id_user?>').html(data);
                            $('#divemailluar<?php echo $id_user?>').removeClass('has-success');
                            $('#email<?php echo $id_user?>').addClass('input-error');
                           // event.preventDefault()
                          } else {
                           // $('#email_result<?php echo $id_user?>').html(data);
                            $('#email<?php echo $id_user?>').removeClass('input-error');
                            $('#email<?php echo $id_user?>').addClass('input-success');
                          }

                        $('#reg_form<?php echo $id_user?>').submit(function(event){
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>'){
                            event.preventDefault();
                            //$('#btnsubmit<?php echo $id_user?>').prop("disabled", false);
                          }
                        });
                     } 
                });
             } else if(email == prev) {
                $('#reg_form<?php echo $id_user?>').unbind( "submit" );
                $('#btnsubmit<?php echo $id_user?>').prop("disabled", false);
             }
        }   
             
      });  
 });  
 </script>

                                        
     <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/editadmin/'.$id_user)?>" method="post" id="reg_form<?php echo $id_user?>" novalidate="novalidate">


    <fieldset>
      
      <!-- Form Name -->
            <legend> Edit Data Mahasiswa </legend>


      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="nama" placeholder="Nama Lengkap" class="form-control" type="text" data-bv-field="nama" value="<?php echo $nama?>"><i class="form-control-feedback" data-bv-icon-for="nama" style="display: none;"></i>
          </div>
        </div>
      </div>
      

      <!-- Text input-->

      <div style="width: 100%" id="divemailluar<?php echo $id_user?>" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" id="email<?php echo $id_user?>" name="email" placeholder="Email Address" class="form-control" type="text" data-bv-field="email" value="<?php echo $email_user?>"><i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
          </div>
              <span id="email_result<?php echo $id_user?>"></span>
        </div>
      </div>


      <!-- Text input-->
      
      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="hp" placeholder="08XX-XXXX-XXXX" class="form-control" type="text" data-bv-field="hp" value="<?php echo $hp?>"><i class="form-control-feedback" data-bv-icon-for="hp" style="display: none;"></i>
          </div>
        </div>
      </div>

      <!-- Button -->
      <div  style="width: 100%" class="form-group">
        <label class="col-md-6 control-label"></label>
        <div  style="width: 100%" class="col-md-4">
          <button id="btnsubmit<?php echo $id_user?>" style="margin-left: 45%;" type="submit" class="btn btn-primary">Simpan</button>
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

          <a href="<?php echo site_url('Admin/deleteadmin/'.$id_user)?>" >
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

<script src="<?php echo base_url('assets/css/bootstrapvalidator.min.js.download'); ?>"></script>



