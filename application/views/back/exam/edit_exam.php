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
               <div class="col-sm-3">
                  <form method="post" action="<?php echo base_url(); ?>super_admin/update_exam" ><div class="form-group">
                     <label> Group: 
                     <?php
                        $gid = $exam->gid;
                        $s_group = $this->Super_admin_model->s_group($gid);
                        echo $s_group->groupTitle;
                     ?>
                     </label>
                     <select class="form-control" name="gid" id="group">
                        <option value="<?php echo $exam->gid; ?>" > Change Group </option>
                        <?php foreach ($this->Super_admin_model->exam_groups() as $key => $value) { ?>
                        <option value="<?php echo $value->id ;?>" > <?php echo $value->groupTitle ;?> </option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                      <label> Category: 
                        <?php
                            $cid = $exam->cid;
                            $s_cat = $this->Super_admin_model->s_category($cid);
                            echo $s_cat->catTitle;
                         ?>
                      </label>
                       <select class="form-control" name="cid" id="category">
                          <option value="<?php echo $exam->cid; ?>">Change Category</option>
                       </select>
                    </div>
                    <div class="form-group">
                       <label> Exam Title</label>
                       <input type="text" name="title" class="form-control" required="required" value="<?php echo $exam->title; ?>">
                    </div>
                    <div class="form-group">
                       <label> No of Questions </label>
                       <input type="text" name="ques_limit" class="form-control" placeholder="50" required="required" value="<?php echo $exam->ques_limit; ?>">
                    </div>
                    <div class="form-group">
                       <label> Duration </label>
                       <input type="text" name="duration" class="form-control" placeholder="30" required="required" value="<?php echo $exam->duration; ?>">
                    </div>
                    <div class="form-group">
                       <label> Held On (Date )</label>
                       <input type="text" name="helddate" class="form-control" placeholder="31-12-2020" required="required" value="<?php echo $exam->helddate; ?>">
                    </div>
                    <div class="form-group">
                       <label> Held at (Time) </label>
                       <input type="text" name="heldtime" class="form-control" placeholder="13:01:00" required="required" value="<?php echo $exam->heldtime; ?>">
                    </div>
                    <div class="form-group">
                      <label> Select Type</label>
                       <select class="form-control" name="type" required="required">
                          <option value="">Select</option>
                          <option value="Free" <?php if($exam->type == "Free"){echo "selected";} ?>> Free </option>
                        <option value="Premium" <?php if($exam->type == "Premium"){echo "selected";} ?>> Premium </option>
                       </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $exam->id; ?>">
                    <div class="form-group">
                       <div class="box-body pad">  
                          <input class="btn btn-info" type="submit" value="Update Now"> 
                       </div>
                    </div>
                 </div>
               <div class="col-sm-9">
                  <div class="table-responsive" >
                       <table class="table table-striped table-bordered table-hover datatable">
                          <thead>
                              <tr>
                                  <th>Sl</th>
                                  <th>Title</th>
                                  <th>Type</th>
                                  <th>Group</th>
                                  <th>Category</th>
                                  <th>Questions</th>
                                  <th>Limit</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              $count = 1;
                              $exam = $this->Super_admin_model->exam();
                              foreach ($exam as $exam) {
                                  ?> 

                                  <tr>
                                      <td><?php echo $count++ ?> </td>
                                      <td><?php echo $exam->title ?> </td>    
                                      <td><?php echo $exam->type ?></td>  
                                      <td><?php echo $exam->group_name ?></td>  
                                      <td><?php echo $exam->cat_name ?></td>  
                                      <td>
                                        <?php
                                          $exm_id = $exam->id; 
                                          $total_question = $this->Super_admin_model->total_question($exm_id);
                                          echo $total_question; 
                                        ?>
                                      </td>         
                                      <td><?php echo $exam->ques_limit ?></td>       
                                      <td> 
                                        <div class="btn-group">
                                          <a href="<?php echo base_url();?>super_admin/questions/<?php echo $exam->id ?>">
                                          <button type="button" class="btn btn-info"><i class="fa fa-book"> </i></button>
                                          </a>
                                          <a href="<?php echo base_url();?>super_admin/edit_exam/<?php echo $exam->id ?>">
                                            <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                          </a>
                                          <a href="<?php echo base_url();?>super_admin/examDelete/<?php echo $exam->id ?>">
                                          <button type="button" class="btn btn-danger" style="margin-top: 2px;"><i class="fa fa-trash"> </i></button>
                                          </a>
                                        </div>
                                      </td>
                                  </tr>   
                              <?php } ?>
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
  });

</script>

