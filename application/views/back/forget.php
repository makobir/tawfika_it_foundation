
  <?php if ($this->session->userdata('id') != NULL) { 
    ?>
    <meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>super_admin"></meta>
    <?php } ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <?php include 'include/css.php'; ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <div class="row">
         <div class="col-sm-4">
           <img class="img-responsive" width="100%" src="<?php echo base_url() ?>upload/logo/logo.png">
         </div>
         <div class="col-sm-8">
           <a href="<?= base_url() ?>" class="h1"><b>Tawfika</b> IT Foundation</a>
         </div>
      </div>
      
    </div>
    <div class="card-body">
      <p class="login-box-msg">New password will send to your registered mobile number.</p>
      <p>
    
        <?php 
        echo $this->session->userdata('message');
        if($this->session->userdata('message')!=NULL){
          $this->session->unset_userdata('message');
        }                       
        echo $this->session->userdata('exception'); 
        if($this->session->userdata('exception')!=NULL){      
          $this->session->unset_userdata('exception');
        }       
        //$this->session->unset_userdata('message'); ?>
      </p>
      <form action="<?php echo base_url() ?>authenticator/resset_password" method="post">
        <div class="input-group mb-3">
          <input  name="username" class="form-control" placeholder="Email or Userid">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Resset now</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->
      <hr>

      <p class="mb-1">
        <a href="<?= base_url()?>login">Login</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php include 'include/js.php'; ?>
</body>
</html>
