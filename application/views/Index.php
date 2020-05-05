<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url() ; ?>assets/configme123123123.png" />

  <title>CONFIGME</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url() ; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ; ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ; ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="<?php echo base_url() ; ?>assets/css/sb-admin3.css" rel="stylesheet">
  
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Chart -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/amstock.js"></script>
</head>

 <style>
   .hide{
     visibility : hidden ;
   }
   .hoho{
     background-color : #343a40 ;
   }
   .hoho:hover{
     background-color : #343a50 ;
   }

 </style>
  <?php
    $notif = $this->session->flashdata('notif');
    $type = $this->session->flashdata('type');
  
    if($type == 'config')
    {
      echo '<body class="fixed-nav sticky-footer" id="page-top" onload="copy_script()">' ;
    }else{
      echo '<body class="fixed-nav sticky-footer" id="page-top">' ;
    }
      
        ?>

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color : #F44336">
    <a class="navbar-brand" href="<?php echo base_url() ; ?>C_Config">CONFIGME</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <?php 
        if($this->session->userdata('level') == '2')
        {
          echo '
          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_Config/Dashboard">
                  <i class="fa fa-fw fa-home"></i>
                  <span class="nav-link-text">Dashboard</span>
              </a>
          </li>

          ' ;
        }
        ?>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-dashboard"></i>
            <span>Config</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="position : static ; background-color: #343a40;">
            <a class="dropdown-item hoho" href="<?php echo base_url() ; ?>C_Config/config" style="color : white">Config Reguler</a>
            <a class="dropdown-item hoho" href="<?php echo base_url() ; ?>C_Config/config_unreg" style="color : white">Config Unreguler</a>
          </div>
        </li>
        <?php 
        if($this->session->userdata('level') == '2')
        {
          echo '
          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_Config/data_config">
                  <i class="fa fa-fw fa-table"></i>
                  <span class="nav-link-text">Data OLT</span>
              </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_Config/data_profil">
                  <i class="fa fa-fw fa-align-justify"></i>
                  <span class="nav-link-text">Data Profile</span>
              </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_history">
                  <i class="fa fa-fw fa-cloud"></i>
                  <span class="nav-link-text">History Config</span>
              </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manajemen User">
              <a class="nav-link" href="'.base_url().'C_Login/data_user">
                  <i class="fa fa-fw fa-User"></i>
                  <span class="nav-link-text">Manajemen User</span>
              </a>
          </li>

          ' ;
        }elseif($this->session->userdata('level') == '3'){
          echo '
          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_Config/data_config">
                  <i class="fa fa-fw fa-table"></i>
                  <span class="nav-link-text">Data OLT</span>
              </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_history/history_user">
                  <i class="fa fa-fw fa-cloud"></i>
                  <span class="nav-link-text">History Config</span>
              </a>
          </li>
          ' ;
        }else
        {
          echo '
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_history/history_user">
                  <i class="fa fa-fw fa-table"></i>
                  <span class="nav-link-text">Data History</span>
              </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data OLT">
              <a class="nav-link" href="'.base_url().'C_Config/data_config_user">
                  <i class="fa fa-fw fa-table"></i>
                  <span class="nav-link-text">Data OLT</span>
              </a>
          </li>
          ' ;
          
        }
        
        ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
CONFIGME          </a>
          
        </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color : white ;">
                  <i class="fa fa-fw fa-User"></i> <?php echo $this->session->userdata("nama") ; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" data-toggle="modal" data-target="#change_pass">Change Profile</a>
            <a class="dropdown-item" href="<?php echo base_url() ; ?>C_Login/logout">Logout</a>
          </div>

      </ul>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- <div class="row">
        <div class="col-12">
          <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div> -->
      
      <?php
          $this->load->view($main_view);
      ?>
      <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('index.php/C_Login/ubah_pass'); ?>" enctype="multipart/form-data" method="post" >
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_addLabel">Change Profile</h4>
                </div>
                  <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Old Password</label>
                          <div class="form-line">
                            <input type="password" name="old" class="form-control"  >
                          </div>
                      </div>
                      <div class="form-group">
                          <label>New Password</label>
                          <div class="form-line">
                            <input type="password" name="new" class="form-control"  >
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Confirm New Password</label>
                          <div class="form-line">
                            <input type="password" name="pass" class="form-control"  >
                          </div>
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Name</label>
                          <div class="form-line">
                            <input type="text" name="nama" class="form-control"  value="<?php echo $this->session->userdata("nama") ; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <div class="form-line">
                            <input type="email" name="email" class="form-control" value="<?php echo $this->session->userdata("email") ; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <label>NO. KTP</label>
                          <div class="form-line">
                            <input type="number" name="no_ktp" class="form-control"  value="<?php echo $this->session->userdata("no_ktp") ; ?>">
                          </div>
                      </div>
                      
                    </div>
                      
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                    <input type="submit" name="submit" class="btn btn-danger" value="Save">
                </div>
            </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>COPYRIGHT &copy; TELKOM AKSES KEDIRI</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url() ; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ; ?>assets/vendor/jquery-easing/jquery1.easing.min.js"></script>
      <script src="<?php echo base_url() ; ?>assets/vendor/datatables/jquery.dataTables.js"></script>
      <script src="<?php echo base_url() ; ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

     <script src="<?php echo base_url() ; ?>assets/vendor/clipboard/clipboard.js"></script>
      <script src="<?php echo base_url() ; ?>assets/vendor/clipboard/clipboard.min.js"></script>
      <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ; ?>assets/js/sb-admin1.min.js"></script>
      <script src="<?php echo base_url() ; ?>assets/js/sb-admin-datatables.min.js"></script>
<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
          <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

  </div>
    
      <script type="text/javascript">
    $(document).ready(function() {
            $("#ZTE").hide();
            $("#HWT").hide();
            $("#ALC").hide();
            $("#default").show();
            $('.export').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );            
// Chart History      
        if("<?php echo $this->uri->segment(4) ?>"  == "HWT"){
            $("#HWT").show();
            $("#ZTE").hide();
            $("#ALC").hide();
            $("#default").hide();
//                     document.getElementById("copy").click();

        } else if("<?php echo $this->uri->segment(4) ?>"  == "ZTE") {
            $("#ZTE").show();
            $("#HWT").hide();
            $("#ALC").hide();
            $("#default").hide();
//                     document.getElementById("copy").click();

        }else if("<?php echo $this->uri->segment(4) ?>"  == "ALC") {
            $("#ZTE").hide();
            $("#HWT").hide();
            $("#ALC").show();
            $("#default").hide();
//                     document.getElementById("copy").click();

        }
        if("<?php echo $this->session->userdata("password") ; ?>" == "c06aabdfcc2d95babf20d54c4c6840be"){
             swal("Your Password Still Default", "For Security Reason, Please Change Your Password", "warning");

        }
        if("<?php echo $type ; ?>" == "success"){
             swal("SUCCESS", "<?php echo $notif ; ?>", "success");
        }else if("<?php echo $type ; ?>" == "error"){
             swal("FAILED", "<?php echo $notif ; ?>", "error");
        }
        $('.js-example-basic-single').select2();


    });
//     $("#copy").click(function(){
//         $("textarea").select();
//         document.execCommand('copy');
//         swal({
//              title: "SUKSES",
//              text : "script sudah tercopy",
//              type :"success",
//               timer: 2000,
//               button: false
//         });

//     });
 
    function copy_script()
    {   
     var copyText = document.getElementById("<?php echo $this->uri->segment(4) ; ?>");

        copyText.select();
             var ok = document.execCommand('copy');

             if (ok) 
                   swal({
                       title: "SUCCESS",
                       text : "script sudah tercopy " ,
                      closeOnClickOutside: false,
                        button: false
                      });
             else
                  swal({
                       title: "SUCCESS",
                       text : "Press CTRL + C " ,
                      closeOnClickOutside: false,
                        button: false
                  });
                

            $(document).keydown(function(e) {
              e = e || window.event;
              var key = e.which || e.keyCode; 
              var ctrl = e.ctrlKey ? e.ctrlKey : ((key === 17) ? true : false); 
                if ( key == 67 && ctrl ) {
                      swal.close() ;
                      swal({
                           icon: "success",
                           title: "SUCCESS",
                           text : "Your Script Has Been Copied" ,
                            closeOnClickOutside: false,
                            timer : 2000 ,
                            button: false
                      });

                }
            });
            
    }
    function ubah_vlan(id)
    {
        $('#voip').empty();
        $.getJSON('<?php echo base_url(); ?>C_Config/get_vlan_by_id/' + id, function(data){
            $('#voip').val(data.vlan_voip);
        });
    }
//     function ubah_input(sn)
//     {
//       var vsn = sn ;
//       var tsn = vsn.trim() ;
//       var snstr = tsn.substr(25, 3);
//       if(snstr == 'ZTE'){
//             $("#zt").show();
//       }         

//     }
    function ubah_olt(id)
    {
        $('#edit_id').empty();
        $('#edit_voip').empty();
        $.getJSON('<?php echo base_url(); ?>C_Config/get_vlan_by_id/' + id, function(data){
            $('#edit_id').val(data.id_device);
            $('#edit_voip').val(data.vlan_voip);
        });
    }
    function ubah_profile(id)
    {
        $('#edit_name').empty();
        $('#edit_up').empty();
        $('#edit_down').empty();
        $('#edit_id').empty();
        $.getJSON('<?php echo base_url(); ?>C_Config/get_profile_by_id/' + id, function(data){
          $('#edit_name').val(data.name);
          $('#edit_up').val(data.up);
          $('#edit_down').val(data.down);
          $('#edit_id').val(data.id_profile);
        });
    }
    function ubah_user(id)
    {
        $('#id').empty();
        $('#nik').empty();
        $('#nama').empty();
        $('#ktp').empty();
        $('#email').empty();
        $('#divisi1').empty();
        $('#datel1').empty();
        $('#level1').empty();
        $.getJSON('<?php echo base_url(); ?>C_Login/get_user_by_id/' + id, function(data){
          $('#id').val(data.id_login);
          $('#nik').val(data.username);
          $('#nama').val(data.nama);
          $('#ktp').val(data.no_ktp);
          $('#email').val(data.email);
          $('#divisi1').val(data.divisi);
          $('#datel1').val(data.datel);
          $('#level1').val(data.level);
          divisi = $('#divisi1').val();
          datel = $('#datel1').val();
          level = $('#level1').val();
//           alert(divisi) ;
            $('#divisi option').filter(function () { return $(this).html() == divisi }).attr('selected', true);
            $('#datel option').filter(function () { return $(this).html() == datel }).attr('selected', true);
            $('#level option').filter(function () { return $(this).html() == level }).attr('selected', true);
        });
    }
    function hapus_olt(id)
    {
        swal({
          title: "Are you sure to delete OLT ?",
          text: "Once delete, Data will Deleted Permanent ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "<?php echo base_url() ?>C_Config/hapus_olt/" + id;

          }
        });       

    }
    function hapus_user(id)
    {
        swal({
          title: "Are you sure to delete User ?",
          text: "Once delete, Data will Deleted Permanent ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "<?php echo base_url() ?>C_Login/hapus_user/" + id;

          }
        });       

    }
    function hapus_history()
    {
        swal({
          title: "Are you sure to reset history ?",
          text: "Once delete, Data will Deleted Permanent.Make sure you have backed up",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "<?php echo base_url() ?>C_history/hapus_history";

          }
        });       

    }
        
    function hapus_profile(id)
    {
        swal({
          title: "Are you sure to delete Profile ?",
          text: "Once delete, Data will Deleted Permanent ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "<?php echo base_url() ?>C_Config/hapus_profil/" + id;

          }
        });       

    }
        
    function optionvalue(name) {

        var input = document.getElementById("other");
        var divisi = document.getElementById("divisi");

        if (name == 'other') {
            divisi.style.display = "none";
            input.style.display = "";
        } else {
            input.style.display = "none";
            divisi.style.display = "";
        }
    }


</script>


</body>
</html>
