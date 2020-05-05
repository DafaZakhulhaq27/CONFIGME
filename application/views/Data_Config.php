                            <?php
                              if($this->session->userdata('level') == 2 )
                              {
                              echo '<a class="btn btn-danger putih" style="color : white ; margin-bottom : 10px ; " data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus"></i> Add OLT</a>';
                              }  
                            ?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data OLT Area Kediri</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Datel</th>
                            <th>OLT</th>
                            <th>IP</th>
                            <th>Vlan Inet</th>
                            <th>Vlan Voip</th>
                            <th>Vlan IPTV</th>
                            <?php
                              if($this->session->userdata('level') == 2 )
                              {
                              echo '<th>Aksi</th>';
                              }  
                            ?>
                        </tr>
                        </thead>
   <tbody>

                        <?php
                        $no = 1 ;

                        foreach ($data_olt as $D) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$D->datel.'</td>
                                    <td>'.$D->device.'</td>
                                    <td>'.$D->ip.'</td>
                                    <td>'.$D->vlan_inet.'</td>
                                    <td>'.$D->vlan_voip.'</td>
                                    <td>'.$D->vlan_tv.'</td>
                                 ';
                              if($this->session->userdata('level') == 2 )
                              {
                                echo '
                                      <td><a class="btn btn-primary putih" style="color : white ;" data-toggle="modal" data-target="#modal_ubah" onclick="ubah_olt('.$D->id_device.')" ><i class="fa fa-pencil"></i></a>
                                          <a class="btn btn-danger putih" style="color : white ;" onclick="hapus_olt('.$D->id_device.')"><i class="fa fa-trash"></i></a>
                                      </td>
                                ' ;
                              }
                              echo '
                                </tr>
                            ';
                        }
                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Datel</th>
                            <th>OLT</th>
                            <th>IP</th>
                            <th>Vlan Inet</th>
                            <th>Vlan Voip</th>
                            <th>Vlan IPTV</th>
                            <?php
                              if($this->session->userdata('level') == 2 )
                              {
                              echo '<th>Aksi</th>';
                              }  
                            ?>
                          </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Last Update : <?php echo $last_update ; ?></div>
        </div>

    </div>
</div>

  </div>
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?php echo base_url('C_Config/create_olt'); ?>" method="post">
             <div class="modal-header">
                <h4 class="modal-title" id="modal_addLabel">Add Profile</h4>
            </div>
             <div class="modal-body">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">Datel</label>
                        <input class="form-control" type="text"  name="datel">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">OLT</label>
                        <input class="form-control" type="text" name="device">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">IP</label>
                        <input class="form-control" type="text" name="ip">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">VLAN INET</label>
                        <input class="form-control" type="text" name="vlan_inet">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">VLAN VOICE</label>
                        <input class="form-control" type="text" name="vlan_voip">
                    </div>
                </div>
            </div>

               
         </div>
 
          <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                    <input type="submit" name="submit" class="btn btn-danger" value="Save">
           </div>
                           </form>
    </div>
</div>
</div>



