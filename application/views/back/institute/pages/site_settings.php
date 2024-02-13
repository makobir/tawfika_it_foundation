<?php
    $pro = $this->Authenticator_model->site(); ?>

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Site Settings') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#tab_1" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Basic</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#tab_3" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Contact Info</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#tab_4" role="tab" aria-controls="custom-content-below-home" aria-selected="true"> Logo</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#tab_6" role="tab" aria-controls="custom-content-below-home" aria-selected="true"> Signature</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#tab_5" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Change Password </a>
         </li>
      </ul>

<div class="box-body no-padding">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <form method="post" action="<?php echo base_url(); ?>institute/update_basic">   
            <input type="hidden" name="id" value="<?= $this->session->userdata('icode'); ?>">             
                <div class="form-group col-sm-6">
                    <label class="request" style="color: red;">*</label>
                    <label> System Name / Title : </label>
                    <input type="text" name="site_name" class="form-control" value="<?php echo  $pro->site_name ;?>">
                </div> 
                <div class="form-group col-sm-6">
                    <label class="request" style="color: red;">*</label>
                    <label> Site Tagline : (Optional) </label>
                    <input type="text" name="tagline" class="form-control" value="<?php echo  $pro->tagline ;?>">
                </div> 


                <div class="form-group">
                    <div class="box-body pad">  
                    <input class="btn btn-info" type="submit"; value="Update now"> 
                    <input class="btn btn-success" type="reset"; value="Reset"> 
                    </div>
                </div>
            </form>
        </div>
      <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">  
        <form method="post" action="<?php echo base_url(); ?>institute/updated_contact_info">
              <input type="hidden" name="id" value="<?= $this->session->userdata('icode'); ?>">
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> Address :</label>
                <input type="text" name="address" class="form-control"  value="<?php  echo  $pro->address ;?>">
            </div> 
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> System Email : </label>
                <input type="text" name="email" class="form-control"  value="<?php  echo  $pro->email ?>">
            </div> 
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> Mobile Number : </label>
                <input type="text" name="mobile" class="form-control"  value="<?php  echo  $pro->mobile    ;?>">
            </div> 
            <div class="form-group">
                <div class="box-body pad">  
                <input class="btn btn-info" type="submit"; value="Update now"> 
                <input class="btn btn-success" type="reset"; value="Reset"> 
                </div>
            </div> 
            </form>
      </div>
      <!-- /.tab-pane --><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_4">
            <form method="post" action="<?php echo base_url(); ?>institute/update_logo" <?php echo form_open_multipart('upload/do_upload');?>  
              <input type="hidden" name="id" value="<?= $this->session->userdata('icode'); ?>">      
                <div class="form-group col-sm-2">
                    <img style="height: 100px;" src="<?php echo base_url(); ?>upload/logo/<?php  echo  $pro->userfile ?>" class="img-responsive">
                </div> 
                <div class="form-group col-sm-6">
                    <input type="file" name="userfile" >
                </div> 
                <div class="form-group ">
                    <div class="box-body pad">  
                    <input class="btn btn-info" type="submit"; value="Update now"> 
                    <input class="btn btn-success" type="reset"; value="Reset"> 
                    </div>
                </div> 
            </form>
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_6">
            <form method="post" action="<?php echo base_url(); ?>institute/update_signature" <?php echo form_open_multipart('upload/do_upload');?>  
              <input type="hidden" name="id" value="<?= $this->session->userdata('icode'); ?>">      
                <div class="form-group col-sm-2">
                    <img style="height: 100px;" src="<?php echo base_url(); ?>upload/signature/<?php  echo  $pro->signature ?>" class="img-responsive">
                </div> 
                <div class="form-group col-sm-6">
                    <label>300px x 80px</label> <br>
                    <input type="file" name="userfile" >
                </div> 
                <div class="form-group ">
                    <div class="box-body pad">  
                    <input class="btn btn-info" type="submit"; value="Update now"> 
                    <input class="btn btn-success" type="reset"; value="Reset"> 
                    </div>
                </div> 
            </form>
        </div>
   
      <!-- /.tab-pane -->
        <div class="tab-pane row" id="tab_5"> 
        <form method="post" action="<?php echo base_url(); ?>institute/update_password">
              <input type="hidden" name="id" value="1">        
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> Current Password : </label>
                <input type="text" name="old" class="form-control"  >
            </div>       
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> New Password : </label>
                <input type="text" name="password" class="form-control" minlength="8">
            </div>       
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> Retype New Password : </label>
                <input type="text" name="password" class="form-control" minlength="8">
            </div>      
            <div class="form-group">
                <div class="box-body pad">  
                <input class="btn btn-info" type="submit"; value="Update now"> 
                <input class="btn btn-success" type="reset"; value="Reset"> 
                </div>
            </div> 
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- nav-tabs-custom -->
</div>