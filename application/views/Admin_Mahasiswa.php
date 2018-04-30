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
        <th width="40">No</th>
        <th>Nama Mahasiswa</th>
        <th>Username</th>
        <th>Email</th>
        <th>Perguruan Tinggi</th>
        <th>No. Hp</th>
        <th>Last Login</th>
        <th><button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
        <i class="glyphicon glyphicon-plus">Tambah</i>
    </button></th>
      </tr>
      </thead>
            <tbody>
     <?php 
      foreach ($mahasiswa as $mhs) {
        $id_user  = $mhs['id_user'];
        $id_mhs   = $mhs['id_mhs'];
        $nama_depan = $mhs['nama_depan'];
        $nama_belakang = $mhs['nama_belakang'];
        $username   = $mhs['username'];
        $email_user  = $mhs['email_user'];
        $perguruan_tinggi = $mhs['perguruan_tinggi'];
        $hp = $mhs['hp'];
        $last_login = $mhs['last_login'];

      echo"
      <tr>
        <td> $id_mhs </td>
        <td> $nama_depan $nama_belakang</td>
        <td> $username</td>
        <td> $email_user</td>
        <td> $perguruan_tinggi</td>
        <td> $hp</td>
        <td> $last_login</td> 
        <td> ";
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

            nama_dpn: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Masukkan nama depan!'
                    }
                }
            },
             nama_blkg: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Masukkan nama belakang!'
                    }
                }
            },

            ptn: {
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
           var email = $('#email<?php echo $id_user?>').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url();?>index.php/Admin/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){
                       
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>'){
                            $('#email_result<?php echo $id_user?>').html(data);
                            $('#divemailluar<?php echo $id_user?>').removeClass('has-success');
                            $('#email<?php echo $id_user?>').addClass('input-error');
                            event.preventDefault()
                          } else {
                            $('#email_result<?php echo $id_user?>').html(data);
                            $('#email<?php echo $id_user?>').removeClass('input-error');
                            $('#email<?php echo $id_user?>').addClass('input-success');
                          }
                        $('#reg_form<?php echo $id_user?>').submit(function(event){
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
      $('#uname<?php echo $id_user?>').change(function(){  
           var uname = $('#uname<?php echo $id_user?>').val();  
           if(uname != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url();?>index.php/Admin/check_uname_avalibility",  
                     method:"POST",  
                     data:{uname:uname},  
                     success:function(data){   
                          if(data == '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="uname" class="help-block" style="display: block;">Username telah digunakan!</small>'){
                            $('#uname_result<?php echo $id_user?>').html(data);
                            $('#divunameluar<?php echo $id_user?>').removeClass('has-success');
                            $('#uname<?php echo $id_user?>').addClass('input-error');
                            e.preventDefault();
                          } else {
                            $('#uname_result<?php echo $id_user?>').html(data);
                            $('#uname<?php echo $id_user?>').removeClass('input-error');
                            $('#uname<?php echo $id_user?>').addClass('input-success');
                            e.preventDefault();
                          }
                        
                           $('#reg_form<?php echo $id_user?>').on('submit', function(e){
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
                                        
     <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/editmahasiswa/'.$id_user)?>" method="post" id="reg_form<?php echo $id_user?>" novalidate="novalidate">


    <fieldset>
      
      <!-- Form Name -->
            <legend> Edit Data Mahasiswa </legend>
    
      <!-- Text input-->
       <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" id="uname<?php echo $id_user?>" name="uname" placeholder="Username" class="form-control" type="text" data-bv-field="uname" value="<?php echo $username?>"><i class="form-control-feedback" data-bv-icon-for="uname" style="display: none;"></i>
          </div>
                <span id="uname_result<?php echo $id_user?>"></span>
        </div>
      </div>


      <div style="width: 100%" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="nama_dpn" placeholder="Nama Depan" class="form-control" type="text" data-bv-field="nama_dpn" value="<?php echo $nama_depan?>"><i class="form-control-feedback" data-bv-icon-for="nama_dpn" style="display: none;"></i>
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
            border-bottom-right-radius: 3px;" name="nama_blkg" placeholder="Nama Belakang" class="form-control" type="text" data-bv-field="nama_blkg" value="<?php echo $nama_belakang?>"><i class="form-control-feedback" data-bv-icon-for="nama_blkg" style="display: none;"></i>
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
            border-bottom-right-radius: 3px;" name="ptn" placeholder="Perguruan Tinggi" class="form-control" type="text" data-bv-field="ptn" value="<?php echo $perguruan_tinggi?>"><i class="form-control-feedback" data-bv-icon-for="ptn" style="display: none;"></i>
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
            border-bottom-right-radius: 3px;" name="hp" placeholder="08XX-XXXX-XXXX" class="form-control" type="text" data-bv-field="hp" value="<?php echo $hp?>"><i class="form-control-feedback" data-bv-icon-for="hp" style="display: none;"></i>
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

          <a href="<?php echo site_url('Admin/deletemahasiswa/'.$id_user)?>" >
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



  <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/tambahmahasiswa')?>" method="post" id="reg_form" novalidate="novalidate">
    <fieldset>
      
      <!-- Form Name -->
      <legend> Tambah Mahasiswa </legend>
    
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


      <div style="width: 100%;  " class="form-group has-feedback">
        <div style="width: 100%;  " class="col-md-6  inputGroupContainer">
          <div style="width: 100%; " class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="nama_dpn" placeholder="Nama Depan" class="form-control" type="text" data-bv-field="nama_dpn"><i class="form-control-feedback" data-bv-icon-for="nama_dpn" style="display: none;"></i>
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      <div style="width: 100%;  " class="form-group has-feedback">
        <div style="width: 100%;  " class="col-md-6  inputGroupContainer">
          <div style="width: 100%; " class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="nama_blkg" placeholder="Nama Belakang" class="form-control" type="text" data-bv-field="nama_blkg"><i class="form-control-feedback" data-bv-icon-for="nama_blkg" style="display: none;"></i>
          </div>

        </div>
      </div>


      <!-- Text input-->

      <div style="width: 100%;  " id="divemailluarx" class="form-group has-feedback">
        <div style="width: 100%;  " class="col-md-6  inputGroupContainer">
          <div style="width: 100%; " class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" id="emailx" name="email" placeholder="Email Address" class="form-control" type="text" data-bv-field="email"><i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
            
          </div>
          <span id="email_resultx"></span>
        </div>
      </div>

      <!-- Text input-->

      <div style="width: 100%; " class="form-group has-feedback">
        <div style="width: 100%; " class="col-md-6  inputGroupContainer">
          <div style="width: 100%; " class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="ptn" placeholder="Perguruan Tinggi" class="form-control" type="text" data-bv-field="ptn"><i class="form-control-feedback" data-bv-icon-for="ptn" style="display: none;"></i>
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div style="width: 100%; " class="form-group has-feedback">
        <div style="width: 100%; " class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 100%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" name="hp" placeholder="08XX-XXXX-XXXX" class="form-control" type="text" data-bv-field="hp"><i class="form-control-feedback" data-bv-icon-for="hp" style="display: none;"></i>
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
            border-bottom-right-radius: 3px;"class="form-control" type="password" placeholder="password" name="password" data-minlength="5" data-error="some error" required="" data-bv-field="password"><i class="form-control-feedback" data-bv-icon-for="password" style="display: none;"></i>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
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

            nama_dpn: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Masukkan nama depan!'
                    }
                }
            },
             nama_blkg: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Masukkan nama belakang!'
                    }
                }
            },

            ptn: {
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


                    
    password: {
            validators: {
                stringLength: {
                        min: 8,
                },
                notEmpty: {
                        message: 'Masukkan Password!'
                },
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