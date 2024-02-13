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
               <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-bars"></i></button>
               <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add New Course</a></li>
                  <li><a href="#">All Course</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View Calendar</a></li>
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
               <div class="col-sm-12">
                  <form method="post" action="<?php echo base_url(); ?>super_admin/result_info" >
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label> Select Group</label>
                         <select class="form-control" name="gid" id="group" required="required">
                            <option value="">Select</option>
                            <?php foreach ($this->Super_admin_model->examGroup() as $key => $value) { ?>
                            <option value="<?php echo $value->id ;?>" > <?php echo $value->groupTitle ;?> </option>
                            <?php } ?>
                         </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label> Select Category</label>
                         <select class="form-control" name="cid" id="category" required="required">
                            <option value="">Select</option>
                         </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                         <label>Select Exam </label>
                         <select class="form-control" name="exm_id" id="exam" required="required">
                            <option value="">Select</option>
                         </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                       <div class="box-body pad">  
                          <input class="btn btn-info" type="submit" value="Submit">
                       </div>
                    </div>
                  </form>
               </div>

               <?php if (isset($exam_results) && !empty($exam_results)) { ?>
                 <div class="col-sm-12">
                    <div class="text-center">
                      <ul style="list-style-type: none;">
                        <li>Exam Group: <b><?php echo $exam_group->groupTitle ?></b></li>
                        <li>Exam Category: <b><?php echo $exam_cat->catTitle ?></b></li>
                        <li>Exam Title: <b><?php echo $exm->title ?></b></li>
                      </ul>
                    </div>

                    <div class="table-responsive" >
                         <p>(Showing Results of last 7 days)</p>
                         <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>User Name</th>
                                    <th>Participation Date</th>
                                    <th>Total Question</th>
                                    <th>Score</th>
                                    <th>Status</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                if (isset($exam_results) && !empty($exam_results)) {
                                foreach ($exam_results as $exam_res) {
                                    ?> 

                                    <tr>
                                        <td><?php echo $count++ ?> </td>       
                                        <td><?php echo $exam_res->user_name ?> </td>      
                                        <td>
                                          <?php
                                            $res_date = date("d-m-Y", strtotime($exam_res->res_date)); 
                                            echo $res_date; 
                                          ?> 
                                        </td>       
                                        <td><?php echo $exam_res->total_ques ?> </td>       
                                        <td><?php echo $exam_res->correct_ans ?> </td>       
                                        <td><?php echo $exam_res->res_status ?> </td>       
                                        <td>
                                          <?php
                                            $uid = $exam_res->uid;
                                            $exm_id = $exam_res->exm_id;

                                            $position = $this->Super_admin_model->get_position($uid, $exm_id);

                                            if($exam_res->res_status == "Failed"){
                                              $position = "-";
                                              echo $position;
                                            }else{
                                              echo $position;
                                            }
                                          ?> 
                                        </td>       
                                        <td> 
                                          <div class="btn-group">
                                            <?php
                                                $uid = $exam_res->uid;
                                                $win_res = $this->Super_admin_model->win_res($uid);
                                                if($win_res == 1){
                                            ?>
                                                <b style="color: green;">Winner</b>
                                            <?php }elseif($win_res == 0 && $position == "1st"){ ?>
                                                <a href="<?php echo base_url();?>super_admin/exam_winner/<?php echo $exam_res->uid ?>/<?php echo $exam_res->exm_id ?>/<?php echo $exam_res->total_ques ?>/<?php echo $exam_res->correct_ans ?>">
                                                    <button type="button" class="btn btn-info"><i class="fa fa-check"> </i> Make Winner</button>
                                                </a>
                                            <?php }else{ ?>
                                                <b>-</b>
                                            <?php } ?>
                                          </div>
                                        </td>
                                    </tr>   
                                <?php } ?>
                                <?php }else{ ?>
                                  <td colspan="8" align="center">No Data Found!</td>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                 </div>
               <?php }else{ ?>
                  <p class="text-center"><b>No Data Found!</b></p>
               <?php } ?>

            <!-- Change Up -->
         </div>
      </div>
      <!-- /.box -->
   </div>
</section>



<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- page script -->

<script type="text/javascript">
    $('.datatable').dataTable();
</script>

<script type="text/javascript">
  $(document).ready(function(){
   $('#group').change(function(){
    var gid = $('#group').val();
    if(gid != '')
    {
     $.ajax({
      url:"<?php echo base_url(); ?>super_admin/fetch_exam_category",
      method:"POST",
      data:{gid:gid},
      success:function(data)
      {
       $('#category').html(data);
      }
     });
    }
    else
    {
     $('#category').html('<option value="">Select</option>');
    }
   });

   $('#category').change(function(){
    var cid = $('#category').val();
    if(cid != '')
    {
     $.ajax({
      url:"<?php echo base_url(); ?>super_admin/fetch_exam",
      method:"POST",
      data:{cid:cid},
      success:function(data)
      {
       $('#exam').html(data);
      }
     });
    }
    else
    {
     $('#exam').html('<option value="">Select</option>');
    }
   });
  });

</script>