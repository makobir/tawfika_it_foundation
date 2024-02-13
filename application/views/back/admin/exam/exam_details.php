<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<style type="text/css">
  tr,th, td {
    border: 1px solid #ddd !important;
  }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script src="<?php echo base_url(); ?>assets/backend/bower_components/jquery/dist/jquery.min.js"></script>

<h4 style="text-align: center;"> </h4> 

<script type="text/javascript">
    $('.datatable').dataTable();
</script>

<section>
   <!-- Calendar -->
   <div class="box box-solid " style="padding: 10px 20px">
      <div class="box-header">
         <i class="fa fa-university"></i>
         <h3 class="box-title"> <?= $sub ?>   </h3>
         <!-- tools box -->
         <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            <div class="btn-group">
              <a href="<?php echo base_url(); ?>super_admin/add_exam">
               <button type="button" class="btn btn-success btn-sm">
               Go Back </button></a>
               <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new Course</a></li>
                  <li><a href="#">All Course</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
               </ul>
            </div>
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
            </button>
         </div>
         <h4 class="text-center" style="color: green">
            <?php
               $msg = $this->session->userdata('message');
               if ($msg) {
                   echo $msg;
                   //$this->session->unset_userdata('message');
               }
               ?>
         </h4>
         <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
         <div class="table-responsive" style="padding-top: 20px">
            <!--Form  Start here--> 
               <div class="col-sm-6">
                <?php
                 
                ?> 


                  <form method="post" action="<?php echo base_url(); ?>super_admin/update_exam_info" >
                    <div class="form-group">
                       <select class="form-control" name="id">
                          <?php $xmid = $exam_details->cid ;  
                          foreach ($this->Super_admin_model->examCatById($xmid) as $key => $value) { ?>

                          <option value="<?php echo $value->id ;?>" > <?php echo $value->catTitle ;?> </option>

                          <?php } ?>
                       </select>
                    </div>
                    <div class="form-group">
                       <label> Exam Title</label>
                      <input type="hidden" name="xmid" class="form-control" value="<?php echo $exam_details->id ?>">
                      <input type="text" name="title" class="form-control" value="<?php echo $exam_details->title ?>">
                    </div>
                    <div class="form-group">
                       <label> Duration </label>
                       <input type="text" name="duration" class="form-control" value="<?php echo $exam_details->duration ?>">
                    </div>
                    <div class="form-group">
                       <label> Held On - Date </label>
                       <input type="text" name="helddate" class="form-control" value="<?php echo $exam_details->helddate ?>">
                    </div>
                    <div class="form-group">
                       <label> Held at - Time </label>
                       <input type="text" name="heldtime" class="form-control" value="<?php echo $exam_details->heldtime ?>">
                    </div>
                    <div class="form-group">
                       <select class="form-control" name="type">
                          <option value="Free" <?php if ($exam_details->type == 'Free') {
                            echo 'selected'; } ?> > Free </option>
                          <option value="Premium" <?php if ($exam_details->type == 'Premium') {
                            echo 'selected'; } ?>  > Premium </option>
                       </select>
                    </div>
                    <div class="form-group">
                       <div class="box-body pad">  
                          <input class="btn btn-info" type="submit"; value="Update now"> 
                       </div>
                    </div>
                 </div>
               <div class="col-sm-6">
                  <div class="table-responsive" >
                       <table class="table table-striped table-bordered table-hover datatable">
                          <tbody>
                              <tr>
                                  <th>Total Enrolled</th>
                                  <th>120</th>
                              </tr>
                              <tr>
                                <?php $id = $exam_details->id; $t = 0; foreach ($this->Super_admin_model->questions($id) as $key => $ques) {  $t++; } ?>
                                <td> Total Questions </td>
                                <td> <?php echo $t ;?></td>
                              </tr>
                              <tr>
                                <td> High Score </td>
                                <td> 49 </td>
                              </tr>
                              <tr>
                                <td colspan="2"> 
                                  <a class="btn btn-primary" href="<?php echo base_url();?>super_admin/questions/<?php echo $exam_details->id ?> "> Add Questions</a>
                                </td>
                              </tr> 
                           
                          </tbody>
                      </table>
                  </div>
               </div>
            </form>
            <!-- Change Up -->
         </div>
      </div>
      <!-- /.box -->
   </div>
</section>

