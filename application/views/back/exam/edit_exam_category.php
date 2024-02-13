<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
            <form style="text-align: ; border: 1px" method="post" action="<?php echo base_url(); ?>super_admin/update_exam_cat" >
               <div class="col-sm-4">
                  <div class="form-group">
                    <label> Select Group</label>
                     <select class="form-control" name="gid" required="required">
                        <option value="" > Select </option>
                        <?php foreach ($this->Super_admin_model->exam_groups() as $key => $value) { ?>
                        <option value="<?php echo $value->id ;?>" <?php if($exam_cat->gid == $value->id){echo "selected";} ?>> <?php echo $value->groupTitle ;?> </option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label> Exam Category Title</label>
                     <input type="text" name="title" class="form-control" required="required" value="<?php echo $exam_cat->catTitle; ?>">
                  </div>
                  <div class="form-group">
                    <label> Select Type</label>
                     <select class="form-control" name="type" required="required">
                        <option value="" > Select </option>
                        <option value="Free" <?php if($exam_cat->type == "Free"){echo "selected";} ?>> Free </option>
                        <option value="Premium" <?php if($exam_cat->type == "Premium"){echo "selected";} ?>> Premium </option>
                     </select>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $exam_cat->id; ?>">
                  <div class="form-group">
                     <div class="box-body pad">  
                        <input class="btn btn-info" type="submit" value="Update Now">
                     </div>
                  </div>
               </div>
               <div class="col-sm-8">
                  <div class="table-responsive" >
                       <table class="table table-striped table-bordered table-hover datatable">
                          <thead>
                              <tr>
                                  <th>Serial</th>
                                  <th>Title</th>
                                  <th>Group</th>
                                  <th>Type</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              $count = 1;
                              $examCat = $this->Super_admin_model->examCat();
                              foreach ($examCat as $exam) {
                                  ?> 

                                  <tr>
                                      <td><?php echo $count++ ?> </td>
                                      <td><?php echo $exam->catTitle ?> </td>
                                      <td><?php echo $exam->group_name ?></td>    
                                      <td><?php echo $exam->type ?></td>       
                                      <td> 
                                        <div class="btn-group">
                                          <a href="<?php echo base_url();?>super_admin/edit_exam_cat/<?php echo $exam->id ?>">
                                          <button type="button" class="btn btn-info"><i class="fa fa-edit"> Edit </i></button> 
                                          </a>
                                          <a href="<?php echo base_url();?>super_admin/examCatDelete/<?php echo $exam->id ?>">
                                          <button type="button" class="btn btn-danger"><i class="fa fa-trash"> Delete </i></button>
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

