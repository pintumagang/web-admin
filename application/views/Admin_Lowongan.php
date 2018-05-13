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
            .input-group-addon{
              margin-right: 0;
            }

</style>
<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
      foreach ($lowongan['lowongan'] as $lwg) {
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



  <form class="form-horizontal bv-form" action="<?php echo site_url('Admin/tambahlowongan')?>" method="post" id="reg_form" novalidate="novalidate">
    <fieldset>
      
      <!-- Form Name -->
      <legend> Tambah Lowongan </legend>
    
      <!-- Text input-->
      <div style="width: 100%;  " id="divunameluarx" class="form-group has-feedback">
        <div style="width: 100%;  " class="col-md-6  inputGroupContainer">
          <div style="width: 100%; " class="input-group">
            <input style="width: 98%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" placeholder="Nama Lowongan" name="nama_lowongan" class="form-control" type="text" data-bv-field="nama_lowongan" ><i class="form-control-feedback" data-bv-icon-for="nama_lowongan" style="display: none;"></i>
          </div>
          <span id="uname_resultx"></span>
        </div>
      </div>

       <div style="width: 100%" id="divphsluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 98%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id='nama_phs' name="nama_phs" data-bv-field="nama_phs" >
            <?php 

            foreach($perusahaan['perusahaan'] as $row)
            { 
              echo '<option value="'.$row['id_perusahaan'].'">'.$row['nama_perusahaan'].'</option>';
            }
            ?>
            </select>
            <i class="form-control-feedback" data-bv-icon-for="nama_phs" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" id="divprodi luarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 98%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id='prodi' name="prodi" data-bv-field="prodi"  value="" >
            <?php 
            
              

              foreach($prodi['prodi'] as $row)
              { 
                echo '<option value="'.$row['id_prodi'].'">'.$row['nama_prodi'].'</option>';
              }
            
            ?>
            </select>
            <i class="form-control-feedback" data-bv-icon-for="nama_prodi" style="display: none;"></i>
          </div>
        </div>
      </div>
      <!-- Text input-->

      <div style="width: 100%"  class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <input style="width: 98%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;" id="datepicker" placeholder="Batas lamar" name="batas_lamar" class="form-control" type="datepicker" data-bv-field="batas_lamar" >
          </div>
        </div>
      </div>


      <div style="width: 100%" id="divujmluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 98%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id='jenis_magang' name="jenis_magang" data-bv-field="jenis_magang" >
            <option value="-1">Jenis Magang</option>
            <option value="Full time">Full time</option>
            <option value="Part time">Part time</option>
            <option value="Project Based">Project base</option>
            </select>
            <i class="form-control-feedback" data-bv-icon-for="web" style="display: none;"></i>
          </div>
        </div>
      </div>

      <div style="width: 100%" id="divprovluarx" class="form-group has-feedback">
        <div style="width: 100%" class="col-md-6  inputGroupContainer">
          <div style="width: 100%;" class="input-group">
            <select style="width: 98%;
            margin-left: 15px;
            border-top-right-radius: 3px; 
            border-bottom-right-radius: 3px;
            font-family: arial;" class="form-control" id='lokasi' name="lokasi" data-bv-field="lokasi" >
            <?php 

            foreach($provinsi['provinsi'] as $row)
            { 
              echo '<option value="'.$row['nama_provinsi'].'">'.$row['nama_provinsi'].'</option>';
            }
            ?>
            </select>
            <i class="form-control-feedback" data-bv-icon-for="provinsi" style="display: none;"></i>
          </div>
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

          nama_lowongan: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Masukkan nama lowongan!'
                    }
                }
            },

            lokasi: {
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

            nama_phs: {
                validators: {
                     stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Masukkan Perguruan tinggi!'
                    }
                }
            },
           
            prodi: {
                validators: {
                    stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Masukkan program studi yang bersangkuta'
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
      $('#lokasi').change(function(){  
           if($('#lokasi').val() == -1)  
           { 
                $('#divprovluarx').removeClass('has-success');
                $('#lokasi').removeClass('input-success');
                $('#lokasi').addClass('input-error');
                $("#btnsubmit").prop("disabled", true);
           } else {
                $('#divprovluarx').addClass('has-success');
                $('#lokasi').removeClass('input-error');
                $('#lokasi').addClass('input-success');
                $("#btnsubmit").prop('disabled', false);
           }
      });  
 });  
 </script>

  <script>  
 $(document).ready(function(){  
      $('#jenis_magang').change(function(){  
           if($('#jenis_magang').val() == -1)  
           { 
                $('#divjmluarx').removeClass('has-success');
                $('#jenis_magang').removeClass('input-success');
                $('#jenis_magang').addClass('input-error');
                $("#btnsubmit").prop("disabled", true);
           } else {
                $('#divjmluarx').addClass('has-success');
                $('#jenis_magang').removeClass('input-error');
                $('#jenis_magang').addClass('input-success');
                $("#btnsubmit").prop('disabled', false);
           }
      });  
 });  
 </script>
 
<script type="text/javascript">
$(document).ready(function () {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap'
    });
});
</script>