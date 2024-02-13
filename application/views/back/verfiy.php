<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>upload/logo/logo.jpg" />
      <title>CMS</title>
     <?php include 'include/css.php'; ?>
   </head>
<?php // echo $this->session->userdata('icode'); ?>
   <body class="hold-transition lockscreen">
   	<div class="container">
      	<div class="row">
         	<div class="col-lg-12">
               <!-- Automatic element centering -->
               <div class="lockscreen-wrapper">
                  <div class="lockscreen-logo">
                    
                     <a href="#"><b><?php echo $site->site_name ?></b> Verify Email</a>
                     <p style="font-size: 14pt !important;">
                        <?php echo $this->session->userdata('message'); 
                         $this->session->unset_userdata('message');
                         //echo $this->session->userdata('icode'); 
                         ?>
                      </p>
                  </div>
                  <div class="lockscreen-item">
                     <div class="lockscreen-image">
                        <?php if ($this->session->userdata('userfile') == NULL) { ?>
                           <img src="<?php echo base_url(); ?>upload/logo/logo.jpg" class="img-circle" alt="Image">
                         <?php }
                         else { ?>
                          <img src="<?php echo base_url(); ?>upload/user/<?php echo $this->session->userdata('userfile'); ?>" class="img-circle" alt="Image">
                         <?php } ?>
                     </div>
                     <form method="post" class="lockscreen-credentials" action="<?php echo base_url(); ?>authenticator/verify_otp" >
                        <div class="input-group">
                           <input type="text" name="otp" class="form-control" placeholder="OTP" required>
                        </div>
                  </div>
                  <div class="help-block text-center">
                     <input class="btn btn-info" type="submit" value="Verify Now" name="submit">
                  </div>
                </form>
                <hr>
                  <div class="text-center">
                     <a href="<?= base_url(); ?>login">Or sign in as a different user</a>
                  </div>
                  <div class="lockscreen-footer text-center">
                     Copyright &copy; 2020 - <b><a href="<?php echo base_url(); ?>" class="text-black"><?php echo $site->site_name ?></a></b><br>
                     All rights reserved.
                  </div>
               </div>
        	  </div>
     	  </div>
  	  </div>
     <?php include 'include/js.php'; ?>
   </body>
</html>