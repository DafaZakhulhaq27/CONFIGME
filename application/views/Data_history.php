<div class="row">

    <div class="col-md-12 col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> HISTORY CONFIG</div>
            <div class="card-body">
              <div class="row" style="margin-bottom : 30px ;">
              <div class="col-md-3">
                <form action="<?php echo base_url('C_history/filter_history'); ?>" method="post">
                   <div class="form-group">
                            <div class="form-line">
                                <select class="form-control " name="bulan" id="bulan" required>
                                    <option disabled selected value>-- Filter By Month --</option>
                                    <option value="1">JANUARY</option>
                                    <option value="2">FEBRUARY</option>
                                    <option value="3">MARCH</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MAY</option>
                                    <option value="6">JUNE</option>
                                    <option value="7">JULY</option>
                                    <option value="8">AUGUST</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OCTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DECEMBER</option>
                                </select>
                            </div>
                        </div>
              </div>
              <div class="col-md-2">
                   <div class="form-group">
                            <div class="form-line">
                                <select class="form-control " name="tahun" id="tahun" required>
                                    <option disabled selected value>-- By Year --</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-info" value="Filter">
                                 </form>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="form-group">
                     <a class="btn btn-danger putih" style="color : white ;" onclick="hapus_history()"><i class="fa fa-trash"></i> RESET DATA</a>
                  </div>
              </div>
              </div>
                <div class="table-responsive">
                    <table class="table table-bordered export" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>JENIS CONFIG</th>
                            <th>USER</th>
                            <th>OLT</th>
                            <th>SN</th>
                            <th>PORT</th>
                            <th>USERNAME INET</th>
                            <th>PASSWORD INET</th>
                            <th>USERNAME VOIP</th>
                            <th>PASSWORD VOIP</th>
                            <th>VLAN VOIP</th>
                            <th>PROFILE</th>
                            <th>NAMA PELANGGAN</th>
                            <th>ALAMAT PELANGGAN</th>
                            <th>DATE</th>
                        </tr>
                        </thead>
                     <tbody>
                        <?php
                        $no = 1 ;

                        foreach ($history as $D) {
                            echo '
                                <tr>
                                    <td>'.$no++.'</td>
                                    <td>'.$D->jenisconfig.'</td>
                                    <td>'.$D->nama.'</td>
                                    <td>'.$D->device.'</td>
                                    <td>'.$D->interface_history.'</td>
                                    <td>'.$D->port.'</td>
                                    <td>'.$D->username_inet.'</td>
                                    <td>'.$D->password_inet.'</td>
                                    <td>'.$D->username_voip.'</td>
                                    <td>'.$D->password_voip.'</td>
                                    <td>'.$D->vlan_voip.'</td>
                                    <td>'.$D->profile.' Mbps</td>
                                    <td>'.$D->namapelanggan.'</td>
                                    <td>'.$D->alamatpelanggan.'</td>
                                    <td>'.$D->date.'</td>
                                </tr>
                            ';
                        }
                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>JENIS CONFIG</th>
                            <th>USER</th>
                            <th>OLT</th>
                            <th>SN</th>
                            <th>PORT</th>
                            <th>USERNAME INET</th>
                            <th>PASSWORD INET</th>
                            <th>USERNAME VOIP</th>
                            <th>PASSWORD VOIP</th>
                            <th>VLAN VOIP</th>
                            <th>PROFILE</th>
                            <th>NAMA PELANGGAN</th>
                            <th>ALAMAT PELANGGAN</th>
                            <th>DATE</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>









