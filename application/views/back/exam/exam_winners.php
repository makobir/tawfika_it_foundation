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
                  <form method="post" action="<?php echo base_url(); ?>super_admin/winner_info" >
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

               <?php if (isset($exam_winners) && !empty($exam_winners)) { ?>
                 <div class="col-sm-12">
                    <div class="text-center">
                      <ul style="list-style-type: none;">
                        <li>Exam Group: <b><?php echo $exam_group->groupTitle ?></b></li>
                        <li>Exam Category: <b><?php echo $exam_cat->catTitle ?></b></li>
                        <li>Exam Title: <b><?php echo $exm->title ?></b></li>
                      </ul>
                    </div>

                    <div class="table-responsive" >
                         <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Winner Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Winning Date</th>
                                    <th>Total Question</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                if (isset($exam_winners) && !empty($exam_winners)) {
                                foreach ($exam_winners as $exam_win) {
                                    ?> 

                                    <tr>
                                        <td><?php echo $count++ ?> </td>       
                                        <td><?php echo $exam_win->name ?> </td>      
                                        <td><?php echo $exam_win->email ?> </td>      
                                        <td><?php echo $exam_win->mobile ?> </td> 
                                        <td><?php echo $exam_win->district ?> <?php echo $exam_win->upozila ?>, <?php echo $exam_win->postOffice ?>-<?php echo $exam_win->postCode ?> </td>
                                        <td>
                                          <?php
                                            $res_date = date("d-m-Y", strtotime($exam_win->res_date)); 
                                            echo $res_date; 
                                          ?> 
                                        </td>
                                        <td><?php echo $exam_win->total_ques ?> </td>       
                                        <td><?php echo $exam_win->correct_ans ?> </td>
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