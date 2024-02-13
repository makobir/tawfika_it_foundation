




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
  <style type="text/css">
    .login-box-msg, .img-responsive{
      color: green;     
      margin: 10px 0 0 10px;
      white-space: nowrap;
      overflow: hidden;
      width: 90%;
      animation: animtext 4s steps(80, end); 
      transition: all cubic-bezier(0.1, 0.7, 1.0, 0.1);
    }    
    .login-box-msg, .img-responsive2{
      color: green;     
      margin: 30px 0 0 10px;
      white-space: nowrap;
      overflow: hidden;
      width: 30%;
      animation: animtext 4s steps(80, end); 
      transition: all cubic-bezier(0.1, 0.7, 1.0, 0.1);
    }

    @keyframes animtext { 
      from {
         width: 0;
         transition: all 3s ease-in-out;
      } 
    }
  </style>
</head>
<body class="hold-transition login-page" style="
                        padding:5px;
                        background-image: url(<?= base_url(); ?>assets/certificate/bg.jpg);
                        background-size: 101%;
                        /* border-bottom: 12px solid green; */
                        ">
<div class="login-box" >
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="background: linear-gradient(90deg, rgba(52,41,231,1) 0%, rgba(167,106,9,0.31416316526610644) 51%, rgba(0,212,255,1) 100%) !important;">
  <!-- <div class="card card-outline card-primary" style="background-image: conic-gradient(red, yellow, green, blue, black); opacity: .2;"> -->
    <div class="card-header text-center">
      <div class="row">
         <div class="col-sm-4 d-none d-sm-block">
           <img class="img-responsive" width="100%" src="<?php echo base_url() ?>upload/logo/logo.png" >
         </div>
         <div class="col-sm-4 d-block d-sm-none d-md-none d-lg-none">
           <img class="img-responsive2" width="30%" src="<?php echo base_url() ?>upload/logo/logo.png" >
         </div>
         <div class="col-sm-8" style="font-family:Senilita;color:#d8830a;  text-shadow:1px 1px white">
           <a href="<?= base_url() ?>" class="h1"><b>Tawfika IT </b><span style="font-size:25pt"> Foundation </span></a>
         </div>
      </div>
      
    </div>
    <div class="card-body">
      <p  style="color: white; text-align:center;">Sign in to start your session.</p>
      <p>
        <?php 
        echo $this->session->userdata('message');
        if($this->session->userdata('message')!=NULL){
          //$this->session->unset_userdata('message');
        }                       
        echo $this->session->userdata('exception'); 
        if($this->session->userdata('exception')!=NULL){      
          //$this->session->unset_userdata('exception');
        }       
        //$this->session->unset_userdata('message'); ?>
      </p>
      <form action="<?php echo base_url() ?>authenticator/user_login_check" method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input  name="username" class="form-control" placeholder="User ID / Email">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" name="password"  id="user_password" class="form-control" placeholder="Password" data-toggle="password">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-eye"></i></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember" style="color:white !important">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1" >
        <a style="color:white !important" href="<?= base_url() ?>authenticator/forget">I forgot my password</a>
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

 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap-show-password.js"></script>
<script type="text/javascript">
