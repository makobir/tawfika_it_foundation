<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>upload/logo/logo.jpg" />
  <title>CMS Authentication</title>
  <?php include 'include/css.php'; ?>
  <style type="text/css">
      #container {
          margin: 20px;
          width: 400px;
          height: 8px;
          position: relative;
        }
  </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b><?php echo $site->site_name ?></b> Admin Panel</a>
  </div>

    <?php if ($this->session->userdata('usertype') == 'trainee') { 
    ?>
    <meta http-equiv="refresh" content="2;URL=<?php echo base_url(); ?>trainee"></meta>
    <?php }

   if ($this->session->userdata('usertype') == 'super_admin') { 
    ?>
    <meta http-equiv="refresh" content="2;URL=<?php echo base_url(); ?>super_admin"></meta>
    <?php }
   if ($this->session->userdata('usertype') == 'branch') { 
    ?>
    <meta http-equiv="refresh" content="2;URL=<?php echo base_url(); ?>institute"></meta>
   <?php }
   if ($this->session->userdata('usertype') == 'admin') { 
    ?>
    <meta http-equiv="refresh" content="2;URL=<?php echo base_url(); ?>admin"></meta>
    <?php }
   if ($this->session->userdata('usertype') == 'cert') { 
    ?>
    <meta http-equiv="refresh" content="2;URL=<?php echo base_url(); ?>cert"></meta>
    <?php } ?>



  <div class="lockscreen-name" > You will redirect within short time.</div>
  <div class="lockscreen-name" > <img style="background: white; padding: 2px;" src="<?php echo base_url();?>assets/back/loader.gif"></div>
  <div class="lockscreen-item">
    <div class="lockscreen-image">
       <?php if ($this->session->userdata('userfile') == NULL) { ?>
         <img src="<?php echo base_url(); ?>upload/logo/logo.jpg" class="img-circle" alt="Image">
       <?php }
       elseif($this->session->userdata('usertype') == 'trainee') { ?>
        <img src="<?php echo base_url(); ?>upload/user/<?php echo $this->session->userdata('userfile'); ?>" class="img-circle" >
       <?php }elseif($this->session->userdata('usertype') == 'branch') { ?>
        <img src="<?php echo base_url(); ?>upload/user/<?php  echo  $site->userfile ?>" class="img-circle" >
      <?php } ?>
    </div>
    <form class="lockscreen-credentials">
      <div class="input-group">
        <div class="form-control">
            <?php echo $this->session->userdata('name'); ?>
        </div>
        <div class="input-group-btn">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
  </div>
  <div class="help-block text-center">
    
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2020-2021 <b><a href="https://adminlte.io" class="text-black"><?php echo $site->site_name ?></a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->
  <?php include 'include/js.php'; ?>
</body>
</html>









