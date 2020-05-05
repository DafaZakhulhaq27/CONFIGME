<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CONFIGME</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ; ?>assets/configme123123123.png" />
  <link href="<?php echo base_url() ; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template--> 
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ; ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ; ?>assets/css/sb-admin3.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
  <?php
    $notif = $this->session->flashdata('notif');
    $type = $this->session->flashdata('type');
        ?>

<body style="background-color : #dc3545 ;">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">CONFIGME || LOGIN</div>
      <div class="card-body">
        <form action="<?php echo base_url('index.php/C_Login/do_login'); ?>"method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Username" name="username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required>
          </div>
           <input type="submit" name="submit" class="btn btn-danger" value="Login">
          <a name="submit" class="btn btn-primary" style="color : white ;" data-toggle="modal" data-target="#modal_forgotpass"><i class="fa fa-lock"></i> Forgot Password</a>
        </form>
      </div>
    </div>
  </div>
  
  
  <div class="modal fade" id="modal_forgotpass" tabindex="-1" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?php echo base_url('C_forgotpass/send_mail'); ?>" method="post">
             <div class="modal-header">
                <h4 class="modal-title" id="modal_addLabel">Forgot Password</h4>
            </div>
             <div class="modal-body">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">NIK</label>
                        <input class="form-control" type="number" name="nik">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">Nomor KTP</label>
                        <input class="form-control" type="number"  name="no_ktp">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="exampleInputName">Email</label>
                        <input class="form-control" type="email"  name="email">
                    </div>
                </div>
            </div>
         </div>
          <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                    <input type="submit" name="submit" class="btn btn-danger" value="Submit">
           </div>
                           </form>
    </div>
</div>





  <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ; ?>assets/vendor/jquery/jquery1.min.js"></script>
  <script src="<?php echo base_url() ; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
      <script type="text/javascript">
            $(document).ready(function() {
        if("<?php echo $type ; ?>" == "success"){
             swal("SUCCESS", "<?php echo $notif ; ?>", "success");
        }else if("<?php echo $type ; ?>" == "error"){
             swal("FAILED", "<?php echo $notif ; ?>", "error");
        }

    });

  </script>
</html>
