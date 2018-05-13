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
<script src="<?php echo base_url('assets/css/bootstrapvalidator.min.js.download'); ?>"></script>
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
        <th style="width: 90px;">Status</th>
        <th>Last Login</th>
        <th style="width: 70px;"><button style="margin-right: 5px" onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
        <i class="glyphicon glyphicon-plus">Tambah  </i>
    </button></th>
      </tr>
      </thead>
            <tbody>
     <?php 
      foreach ($perusahaan['perusahaan'] as $phs) {
      $id_user      = $phs['id_user'];
      $id_perusahaan = $phs['id_perusahaan'];
      $nama_perusahaan  = $phs['nama_perusahaan'];
      $username = $phs['username'];
      $email_user = $phs['email_user'];
      $link_website = $phs['link_website'];
      $alamat_perusahaan = $phs['alamat_perusahaan'];
      $status = $phs['status'];
      $last_login = $phs['last_login'];
      $id_provinsi = $phs['id_provinsi'];
      $id_kabkot = $phs['id_kota'];
      $kodepos  =$phs['kodepos'];
      $nama_provinsi =$phs['nama_provinsi'];
      $nama_kabkot  =$phs['nama_kabkot'];

      ?>
      <tr>
        <td><?php echo $id_perusahaan ?></td>
        <td><?php echo $nama_perusahaan ?></td>
        <td><?php echo $username?></td>
        <td><?php echo $email_user?></td>
        <td><?php echo $link_website?></td>
        <td><?php echo $alamat_perusahaan?></td>
        <td>
            <?php 

            if($status == 0){
              ?>
              <a href="<?php echo site_url('Admin/validasiperusahaan/'.$id_user)?>" >
              <button style="font-size: 12px;" onclick="return confirm ('Validasi Perusahaan?')" type="button" class="btn btn-default">
                  Belum Verifikasi
              </button></a>
        <?php  
            } else if ($status == 1){
              ?>
              <a style="margin-left: 18px" href="<?php echo site_url('Admin/batalvalidasiperusahaan/'.$id_user)?>" >
              <button style="font-size: 12px; "onclick="return confirm ('Batalkan Validasi Perusahaan?')" type="button" class="btn btn-default">
                  Verifikasi
              </button></a>
        <?php      
            }
        ?>

        </td>
        <td><?php echo $last_login?></td> 
        <td> 

          <button onclick="document.getElementById('modal-wrapper-edit<?php echo $id_user?>').style.display='block'" type="button" class="btn btn-default Tambah" value="<?php echo $id_user?>" >
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

           nama_phs: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Minimal 6 karakter!'
                    }
                }
            },


            almt: {
                validators: {
                     stringLength: {
                        min: 3,
                    },
                    notEmpty: {
                        message: 'Masukkan Perguruan tinggi!'
                    }
                }
            },

            web: {
                validators: {
                     stringLength: {
                        min: 3,
                    },
                    notEmpty: {
                        message: 'Masukkan Perguruan tinggi!'
                    }
                }
            },
           


            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },

            city: {
                validators: {
                    stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },

            state: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },

        comment: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description about yourself'
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
                    
    // password: {
    //         validators: {
    //             identical: {
    //                 field: 'confirmPassword',
    //                 message: 'Confirm your password below - type same password please'
    //             }
    //         }
    //     },

    //     confirmPassword: {
    //         validators: {
    //             identical: {
    //                 field: 'password',
    //                 message: 'The password and its confirm are not the same'
    //             }
    //         }
    //      },
            
            
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
           if(email != '')  
           {  
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
                          } else {
                            $('#email<?php echo $id_user?>').removeClass('input-error');
                            $('#email<?php echo $id_user?>').addClass('input-success');
                          }

                        $('#reg_form<?php echo $id_user?>').submit(function(event){
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>'){
                            event.preventDefault()
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

                                        
     <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/editperusahaan/'.$id_user)?>" method="post" id="reg_form<?php echo $id_user?>" novalidate="novalidate">


    <fieldset>
      
      <!-- Form Name -->
            <legend> Edit Data Perusahaan </legend>


      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="nama_phs" placeholder="Nama Perusahaan" class="form-control" type="text" data-bv-field="nama_phs" value="<?php echo $nama_perusahaan?>"><i class="form-control-feedback" data-bv-icon-for="nama_phs" style="display: none;"></i>
          </div>
        </div>
      </div>
      
      <!-- Text input-->

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="web" placeholder="Website" class="form-control" type="text" data-bv-field="web" value="<?php echo $link_website?>"><i class="form-control-feedback" data-bv-icon-for="web" style="display: none;"></i>
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
            border-bottom-right-radius: 3px;" name="almt" placeholder="Alamat Perusahaan" class="form-control" type="text" data-bv-field="almt" value="<?php echo $alamat_perusahaan?>"><i class="form-control-feedback" data-bv-icon-for="almt" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" id="divprovluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id='provinsi' name="provinsi" data-bv-field="provinsi" >
            <?php 
            
            foreach($provinsi['provinsi'] as $row)
            { 
                if($id_provinsi !=''){
                  if($id_provinsi == $row['id_provinsi']){
                    echo '<option value="'.$row['id_provinsi'].'" selected="selected" >'.$row['nama_provinsi'].'</option>';
                  } else {
                    echo '<option value="'.$row['id_provinsi'].'">'.$row['nama_provinsi'].'</option>';
                  }
                }else{
                echo '<option value="'.$row['id_provinsi'].'">'.$row['nama_provinsi'].'</option>';
                }
            }
            ?>
            </select>
            <i class="form-control-feedback" data-bv-icon-for="provinsi" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" id="divkabkotluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id="kabkot" name="kabkot" data-bv-field="kabkot">
            <?php 
            
            foreach($kabkot['kabkot'] as $row)
            { 
                if($id_kabkot !=''){
                  if($id_kabkot == $row['id_kabkot']){
                    echo '<option value="'.$row['id_kabkot'].'" selected="selected" >'.$row['nama_kabkot'].'</option>';
                  } else {
                    echo '<option value="'.$row['id_kabkot'].'">'.$row['nama_kabkot'].'</option>';
                  }
                }else{
                echo '<option value="'.$row['id_kabkot'].'">'.$row['nama_kabkot'].'</option>';
                }
            }
            ?>
            </select>
                <i class="form-control-feedback" data-bv-icon-for="kabkot" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="kodepos" placeholder="Kode Pos" class="form-control" type="text" data-bv-field="kodepos" value="<?php echo $kodepos?>"> ><i class="form-control-feedback" data-bv-icon-for="kodepos" style="display: none;"></i>
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

          <a href="<?php echo site_url('Admin/deleteperusahaan/'.$id_user)?>" >
          <button onclick="return confirm ('Apakah anda yakin?')" type="button" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"></i>
          </button></a>
          
        </td>
       
      </tr>
     <?php }?>
     
      </tbody>
    </table>


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



  <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/tambahperusahaan')?>" method="post" id="reg_form" novalidate="novalidate">
    <fieldset>
      
      <!-- Form Name -->
      <legend> Tambah Perusahaan </legend>
    
      <!-- Text input-->
      <div style="width: 100%;  " id="divunameluarx" class="form-group has-feedback">
        <div style="width: 100%;  " class="col-md-6  inputGroupContainer">
          <div style="width: 100%; " class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" id="unamex" name="uname" placeholder="Username" class="form-control" type="text" data-bv-field="uname" ><i class="form-control-feedback" data-bv-icon-for="uname" style="display: none;"></i>
          </div>
          <span id="uname_resultx"></span>
        </div>
      </div>


       <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="nama_phs" placeholder="Nama Perusahaan" class="form-control" type="text" data-bv-field="nama_phs"><i class="form-control-feedback" data-bv-icon-for="nama_phs" style="display: none;"></i>
          </div>
        </div>
      </div>
      
      <!-- Text input-->

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="web" placeholder="Website" class="form-control" type="text" data-bv-field="web" ><i class="form-control-feedback" data-bv-icon-for="web" style="display: none;"></i>
          </div>
        </div>
      </div>


      <!-- Text input-->

      <div style="width: 100%" id="divemailluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" id="emailx" name="email" placeholder="Email Address" class="form-control" type="text" data-bv-field="email"><i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
          </div>
              <span id="email_resultx"></span>
        </div>
      </div>


      <!-- Text input-->

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="almt" placeholder="Alamat Perusahaan" class="form-control" type="text" data-bv-field="almt" ><i class="form-control-feedback" data-bv-icon-for="almt" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="web" placeholder="Website Perusahaan" class="form-control" type="text" data-bv-field="web" ><i class="form-control-feedback" data-bv-icon-for="web" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" id="divprovluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id='provinsi' name="provinsi" data-bv-field="provinsi" >
            <?php 

            foreach($provinsi['provinsi'] as $row)
            { 
              echo '<option value="'.$row['id_provinsi'].'">'.$row['nama_provinsi'].'</option>';
            }
            ?>
            </select>
            <i class="form-control-feedback" data-bv-icon-for="provinsi" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" id="divkabkotluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id="kabkot" name="kabkot" data-bv-field="kabkot">
            <?php 

            foreach($kabkot['kabkot'] as $row)
            { 
              echo '<option value="'.$row['id_kabkot'].'">'.$row['nama_kabkot'].'</option>';
            }
            ?>
            </select>
                <i class="form-control-feedback" data-bv-icon-for="kabkot" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="kodepos" placeholder="Kode Pos" class="form-control" type="text" data-bv-field="kodepos" ><i class="form-control-feedback" data-bv-icon-for="kodepos" style="display: none;"></i>
          </div>
        </div>
      </div>
      
      

      <!--Password-->

      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" class="form-control" type="password" placeholder="password" name="password" data-minlength="5" data-error="some error" required="" data-bv-field="password"><i class="form-control-feedback" data-bv-icon-for="password" style="display: none;"></i>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
                </div>
        </div>
  
      <!-- Button -->
      <div  style="width: 100%; margin-top : 40px;" class="form-group">
        <label class="col-md-6 control-label"></label>
        <div  style="width: 100%" class="col-md-4">
          <button style="margin-left: 45%;" id="btnsubmit" type="submit" class="btn btn-primary">Tambah</button>
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

<script src="<?php echo base_url('assets/css/bootstrapvalidator.min.js.download'); ?>"></script>





<script type="text/javascript">

$(document).ready(function() {
    $('#reg_form').bootstrapValidator({
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

            nama_phs: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Masukkan nama depan!'
                    }
                }
            },
             web: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Masukkan website perusahaan!'
                    }
                }
            },

            almt: {
                validators: {
                     stringLength: {
                        min: 3,
                    },
                    notEmpty: {
                        message: 'Masukkan Perguruan tinggi!'
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

            kodepos: {
                validators: {
                     stringLength: {
                        min: 5,
                    },
                    notEmpty: {
                        message: 'Masukkan Kode Pos!'
                    }
                }
            },

            city: {
                validators: {
                    stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },

            state: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },

        comment: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description about yourself'
                    }
                    }
                 }, 

        email: {
                validators: {
                    notEmpty: {
                        message: 'Masukkan email!'
                    },
                emailAddress: {
                        message: 'Email tidak valid!'
                    }
                }
            },


                    
    password: {
            validators: {
                stringLength: {
                        min: 8,
                },
                notEmpty: {
                        message: 'Masukkan Password!'
                }
            }
        },

    //     confirmPassword: {
    //         validators: {
    //             identical: {
    //                 field: 'password',
    //                 message: 'The password and its confirm are not the same'
    //             }
    //         }
    //      },
            
            
            }
        })
        
    
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#reg_form').data('bootstrapValidator').resetForm();

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
                             $("#btnsubmit").prop('disabled', true);
                          } else {
                            $('#email_resultx').html(data);
                            $('#emailx').removeClass('input-error');
                            $('#emailx').addClass('input-success');
                            $("#btnsubmit").prop('disabled', false);
                          }
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
                            $("#btnsubmit").prop("disabled", true);
                          } else {
                            $('#uname_resultx').html(data);
                            $('#unamex').removeClass('input-error');
                            $('#unamex').addClass('input-success');
                            $("#btnsubmit").prop('disabled', false);
                          }
                        
                     }  
                });  
           }  
      });  
 });  
 </script> 
 <script>  
 $(document).ready(function(){  
      $('#provinsi').change(function(){  
           if($('#provinsi').val() == -1)  
           { 
                $('#divprovluarx').removeClass('has-success');
                $('#provinsi').removeClass('input-success');
                $('#provinsi').addClass('input-error');
                $("#btnsubmit").prop("disabled", true);
           } else {
                $('#divprovluarx').addClass('has-success');
                $('#provinsi').removeClass('input-error');
                $('#provinsi').addClass('input-success');
                $("#btnsubmit").prop('disabled', false);
           }
      });  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#kabkot').change(function(){    
           if($('#kabkot').val() == -2)  
           { 
                $('#divkabkotluarx').removeClass('has-success');
                $('#kabkot').removeClass('input-success');
                $('#kabkot').addClass('input-error');
                $("#btnsubmit").prop("disabled", true);
           } else {
                $('#divkabkotluarx').addClass('has-success');
                $('#kabkot').removeClass('input-error');
                $('#kabkot').addClass('input-success');
                $("#btnsubmit").prop('disabled', false);
           }
      });  
 });  
 </script> 