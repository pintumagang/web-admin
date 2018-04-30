<div class="judul">
    <h3 align="center">Daftar Lowongan</h3>
</div>
<div id="toolbar" class="btn-group">
</div>


<table id="myTable" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Username</th>
        <th>Email</th>
        <th>Perguruan Tinggi</th>
        <th>No. Hp</th>
        <th>Last Login</th>
        <th><div>
                <button style="padding: 0;
border: none;
background: none;" type="button" data-toggle="modal" data-target="#m"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></button>

            </div>

            <div class="modal fade" id="m" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Lowongan</h4>
                        </div>
                        <div class="modal-body" >
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block">
                                            <form method="post" action="<?php echo site_url("Perusahaan/tambahLowongan")?>">

                                                <div class="form-group ">
                                                    <input class="form-control" id="name" name="namaLowongan" placeholder="Nama Lowongan" type="text"/>
                                                </div>

                                                <div class="form-group ">
                                                    <textarea class="form-control" cols="40" name="deskripsi" placeholder="Deskripsi Pekerjaan" id="textarea" name="textarea" rows="10"></textarea>
                                                </div>

                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar">
                                                            </i>
                                                        </div>
                                                        <input class="form-control" id="date" name="date" placeholder="YYYY-DD-MM" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <input class="form-control" id="name1" name="lokasi" placeholder="Lokasi" type="text"/>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label " for="select">
                                                        Select a Choice
                                                    </label>
                                                    <select class="select form-control" id="select" name="jenisMagang">
                                                        <option value="fulltime">
                                                            fulltime
                                                        </option>
                                                        <option value="part time">
                                                            part time
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label " for="select1">
                                                        Select a Choice
                                                    </label>
                                                    <select class="select form-control" id="select1" name="status">
                                                        <option value="aktif">
                                                            aktif
                                                        </option>
                                                        <option value="non aktif">
                                                            non aktif
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button class="btn btn-primary " name="submit" type="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>



        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($mahasiswa as $low) {
        ?>
        <tr><td><?php echo $low->id_mahasiswa?></td>
            <td><?php echo $low->nama_depan?></td>
            <td><?php echo $low->username?></td>
            <td><?php echo $low->email_user?></td>
            <td><?php echo $low->perguruan_tinggi?></td>
            <td><?php echo $low->hp?></td>
            <td><?php echo $low->last_login?></td>
            <td><form method="post" action="<?php echo site_url("Perusahaan/statusDaftarLowongan")?>">
                    <input name="id" type="hidden" value="<?php echo $low->id_lowongan?>">
                    <input name="periksa" type="hidden" value="<?php echo $low->status?>">
                    <button type="submit"><?php echo $low->status?></button>
                </form>

            </td>
                <div class="row">
                    <div class="col-sm-6">
                        <button style="padding: 0;
border: none;background: none;" type="button" data-toggle="modal" data-target="#<?php echo $low->id_lowongan?>"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></button>
                    </div>


                    <div class="container col-sm-6">

                        <button type="button" style="padding: 0;border: none;background: none;"  data-toggle="modal" data-target="#<?php echo $low->id_lowongan?>2">
                            <i class="fa fa-remove fa-2x" aria-hidden="true"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $low->id_lowongan?>2" role="dialog">
                            <div class="modal-dialog" style="width: 350px;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Warning!</h4>
                                    </div>
                                    <div class="modal-body">

                                        <h5>Apakah Anda Yakin ingin Menghapus Lowongan</h5>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <form method="post" action="<?php echo site_url("Perusahaan/hapusLowongan")?>">
                                                    <input name="id" type="hidden" value="<?php echo $low->id_lowongan?>">
                                                    <button style="padding: 0;border: none;background: none;" type="submit"><i class="fa fa-check fa-2x" aria-hidden="true"></i></button>
                                                </form>
                                            </div>

                                            <div class="col-sm-4">
                                                <button style="padding: 0;border: none;background: none;" type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            </div>

                                        </div>



                                    </div>
                                    <!--<div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                    -->            </div>

                            </div>
                        </div>

                    </div>


                </div>






            </td>
        </tr>
    <?php }?>

    </tbody>
</table>


<script>
    // If user clicks anywhere outside of the modal, Modal will close

    var modal = document.getElementById('modal-wrapper');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var modal = document.getElementById('modal-wrapper-edit');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })

</script>



