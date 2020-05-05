  <a class="btn btn-danger putih" style="color : white ; margin-bottom : 10px ; " data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus"></i> Add Profile</a>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Profile</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name Profile</th>
                            <th>UP</th>
                            <th>DOWN</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                     <tbody>
                        <?php
                        $no = 1 ;

                        foreach ($data_profil as $D) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$D->name.' Mbps</td>
                                    <td>'.$D->up.'</td>
                                    <td>'.$D->down.'</td>
                                    <td>
                                        <a class="btn btn-danger putih" style="color : white ;" onclick="hapus_profile('.$D->id_profile.')"><i class="fa fa-trash"></i></a>
                                        <a class="btn btn-primary putih" style="color : white ;" data-toggle="modal" data-target="#modal_ubah" onclick="ubah_profile('.$D->id_profile.')" ><i class="fa fa-pencil"></i></a>                                    
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name Profile</th>
                            <th>UP</th>
                            <th>DOWN</th>
                            <th>Action</th>
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
        <form action="<?php echo base_url('C_Config/create_profile'); ?>" method="post">
             <div class="modal-header">
                <h4 class="modal-title" id="modal_addLabel">Add Profile</h4>
            </div>
             <div class="modal-body">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">Name</label>
                        <input class="form-control" type="text"  name="name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">Up</label>
                        <input class="form-control" type="text" name="up">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">Down</label>
                        <input class="form-control" type="text" name="down">
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
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('index.php/C_Config/ubah_profile'); ?>" enctype="multipart/form-data" method="post" >
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_addLabel">Change Profile</h4>
                </div>
                  <div class="modal-body">
                    <div class="col-md-12">
                            <input type="hidden" name="edit_id" class="form-control" id="edit_id" required>
                      <div class="form-group">
                          <label>Name Profile</label>
                          <div class="form-line">
                            <input type="text" name="name" class="form-control" id="edit_name" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>UP</label>
                          <div class="form-line">
                            <input type="text" name="up" class="form-control" id="edit_up" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>DOWN</label>
                          <div class="form-line">
                            <input type="text" name="down" class="form-control" id="edit_down" required>
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










