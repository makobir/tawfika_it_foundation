<?php
	$id = $this->session->userdata('id');
    $pro = $this->Institute_model->password($id); ?>

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Profile') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#tab_1" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Profile</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#tab_4" role="tab" aria-controls="custom-content-below-home" aria-selected="true"> Photo</a>
         </li>
      </ul>

<div class="box-body no-padding">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <form method="post" action="<?php echo base_url(); ?>institute/update_user_basic">   
            <input type="hidden" name="id" value="<?= $this->session->userdata('id'); ?>">             
                <div class="form-group col-sm-6">
                    <label class="request" style="color: red;">*</label>
                    <label> Director Name : </label>
                    <input type="text" name="name" class="form-control" value="<?php echo  $pro->name ;?>">
                </div>       

            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> Email : </label>
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
            <form method="post" action="<?php echo base_url(); ?>institute/update_user_photo" <?php echo form_open_multipart('upload/do_upload');?>  
              <input type="hidden" name="id" value="<?= $this->session->userdata('id'); ?>">      
                <div class="form-group col-sm-2">
                    <img style="height: 100px;" src="<?php echo base_url(); ?>upload/user/<?php  echo  $pro->userfile ?>" class="img-responsive">
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
      <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_5"> 
        <form method="post" action="<?php echo base_url(); ?>institute/update_password">
              <input type="hidden" name="id" value="1">        
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> Present Password : </label>
                <input type="text" name="old" class="form-control"  >
            </div>       
            <div class="form-group col-sm-6">
                <label class="request" style="color: red;">*</label>
                <label> New Password : </label>
                <input type="text" name="password" class="form-control" >
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