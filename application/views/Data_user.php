  <a class="btn btn-danger putih" style="color : white ; margin-bottom : 10px ;" data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus"></i> Add User</a>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data User</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>NAMA</th>
                            <th>DIVISI</th>
                            <th>DATEL</th>
                            <th>NO KTP</th>
                            <th>EMAIL</th>
                            <th>LEVEL</th>
                            <th>AKSI</th>
                        </tr>
                        </thead>
   <tbody>

                        <?php
                        $no = 1 ;

                        foreach ($data_user as $D) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$D->username.'</td>
                                    <td>'.$D->nama.'</td>
                                    <td>'.$D->divisi.'</td>
                                    <td>'.$D->datel.'</td>
                                    <td>'.$D->no_ktp.'</td>
                                    <td>'.$D->email.'</td>
                                    <td>'; 
                                    if($D->level == 1 )
                                    {
                                      echo '
                                          Biasa
                                      ';
                                     }else{
                                      echo '
                                          Spesial
                                      ';
                                    }
                                    echo '
                                    </td>
                                    <td>
                                        <a class="btn btn-danger putih" style="color : white ;" onclick="hapus_user('.$D->id_login.')"><i class="fa fa-trash"></i></a>
                                        <a class="btn btn-primary putih" style="color : white ;" data-toggle="modal" data-target="#modal_ubah" onclick="ubah_user('.$D->id_login.')"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>NAMA</th>
                            <th>DIVISI</th>
                            <th>NO KTP</th>
                            <th>EMAIL</th>
                            <th>AKSI</th>
                          </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

  </div>
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?php echo base_url('C_Login/create_user'); ?>" method="post">
             <div class="modal-header">
                <h4 class="modal-title" id="modal_addLabel">Add User</h4>
            </div>
             <div class="modal-body">
            <div class="row">  
              <div class="col-md-6">
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-12">
                              <label for="exampleInputName">NIK</label>
                              <input class="form-control" type="text"  name="nik" >
                              <input class="form-control" type="hidden"  name="id" >
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-12">
                              <label for="exampleInputName">Nama</label>
                              <input class="form-control" type="text" name="nama" >
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-12">
                              <label for="exampleInputName">NO KTP</label>
                              <input class="form-control" type="number" name="ktp" >
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-12">
                              <label for="exampleInputName">Email</label>
                              <input class="form-control" type="email" name="email" >
                          </div>
                      </div>
                  </div>
              </div>              
              <div class="col-md-6">
                  <div class="form-group">
                      <label>DIVISI</label>
                      <div class="form-line">
                          <select class="form-control" name="divisi" >
                              <option disabled selected value>-- Pilih DIVISI --</option>
                              <option value="HD MIGRASI">HD MIGRASI</option>
                              <option value="HD PROVISIONING">HD PROVISIONING</option>
                              <option value="HD ASSURANCE">HD ASSURANCE</option>
                              <option value="HD WIFI.ID">HD WIFI.ID</option>
                              <option value="HD CCAN">HD CCAN</option>
<!--                               <option value="other" >Other Option</option> -->
                          </select>
                      </div>
                  </div>
<!--                  <div class="form-group" >
                        <div class="form-row">
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="divisi" id="other" style="display : none ;" placeholder="Other Option">
                            </div>
                        </div>
                  </div> -->
                  <div class="form-group">
                      <label>DATEL</label>
                      <div class="form-line">
                          <select class="form-control " name="datel" >
                              <option disabled selected value>-- Pilih DATEL --</option>
                              <option value="KEDIRI">KEDIRI</option>
                              <option value="TULUNGAGUNG">TULUNGAGUNG</option>
                              <option value="BILTAR">BILTAR</option>
                              <option value="NGANJUK">NGANJUK</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>LEVEL USER</label>
                      <div class="form-line">
                          <select class="form-control " name="level" >
                              <option disabled selected value>-- Pilih LEVEL --</option>
                              <option value="1">BIASA</option>
                              <option value="3">SPESIAL</option>
                          </select>
                      </div>
                  </div>
              </div>              
            </div>
         </div>
          
          <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" name="submit" class="btn btn-danger" value="Simpan">
           </div>
        </form>
    </div>
</div>
</div>
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('index.php/C_Login/ubah_user'); ?>" enctype="multipart/form-data" method="post" >
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_addLabel">Change Profile</h4>
                </div>
                   <div class="modal-body">
                  <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exampleInputName">NIK</label>
                                    <input class="form-control" type="text"  name="nik" id="nik" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exampleInputName">Nama</label>
                                    <input class="form-control" type="text" name="nama" id="nama">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exampleInputName">NO KTP</label>
                                    <input class="form-control" type="number" name="ktp" id="ktp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exampleInputName">Email</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                            </div>
                        </div>
                    </div>              
                    <div class="col-md-6">
                                      <input class="form-control" type="hidden" name="divisi1" id="divisi1" placeholder="Other Option">
                                        <input class="form-control" type="hidden" name="datel1" id="datel1" placeholder="Other Option">
                                        <input class="form-control" type="hidden" name="level1" id="level1" placeholder="Other Option">
                        <div class="form-group">
                            <label>DIVISI</label>
                            <div class="form-line">
                                <select class="form-control " name="divisi" id="divisi">
                                    <option disabled selected value>-- Didn't Have Divition --</option>
                                    <option value="HD MIGRASI">HD MIGRASI</option>
                                    <option value="HD PROVISIONING">HD PROVISIONING</option>
                                    <option value="HD ASSURANCE">HD ASSURANCE</option>
                                    <option value="HD WIFI.ID">HD WIFI.ID</option>
                                    <option value="HD CCAN">HD CCAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>DATEL</label>
                            <div class="form-line">
                                <select class="form-control " name="datel" id="datel">
                                    <option disabled selected value>-- Didn't Have Datel --</option>
                                    <option value="KEDIRI">KEDIRI</option>
                                    <option value="TULUNGAGUNG">TULUNGAGUNG</option>
                                    <option value="BILTAR">BILTAR</option>
                                    <option value="NGANJUK">NGANJUK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>LEVEL</label>
                            <div class="form-line">
                                <select class="form-control " name="level" id="level">
                                    <option disabled selected value>-- Didn't Have Level --</option>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>              
                  </div>
               </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  </div>








