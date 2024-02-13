
<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <form method="post" action="<?= base_url() ?>exam/examinee">
      <div class="row">
         <div class="col-md-3">
            <div class="form-group">
               <select class="form-control " name="course_id" id="course_id">
                  <option>Select Course</option>
                  <?php foreach ($this->Super_admin_model->course() as $key => $value) { ?>
                  <option value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                  <?php } ?>
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <select class="form-control " name="batch_id" id="batch_id">
                  <option>Select Batch</option>
                  <?php foreach ($this->Super_admin_model->session() as $key => $value) { ?>
                  <option <?php //if ($value->status == 'Active') {echo 'selected';} ?> value="<?php echo $value->scode ;?>" > <?php echo $value->session ;?> <?php if ($value->status == 'Active') {echo '( Running )';} ?> </option>
                  <?php } ?>
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <button class="btn btn-info" type="submit">Check List</button>
            </div>
         </div>
      </div>
      </form>
   </div>
</div>

<div class="card card-primary card-outline" style="width: 100%">   
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
            <thead>
               <tr class="text-center">
                  <th>SL</th>
                  <th>Photo</th>
                  <th>Regi</th>
                  <th>Roll</th>
                  <th>Name</th>
                  <th>Course </th>
                  <th>Result</th>
                  <th>Payment Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>                  
                  <?php
                  $course = $this->input->post('course_id');
                  $batch = $this->input->post('batch_id');

                   if($this->Exam_model->formfilluped($course,$batch) != NULL){ 
                     $i = 1; foreach ($this->Exam_model->formfilluped($course,$batch) as $key => $t) {
                        if ($t->eeid != NULL) {
                  ?>
               <tr class="text-center">  
                  <td><?php echo $i; ?></td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->trainee; ?>"></td>                
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $t->roll; ?></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->title; ?></td>
                  <td></td>
                  <td><?php echo $t->status; ?></td>
                  <td>
                     
                     <div class="dropdown show">
                       <a class="btn btn-default" href="<?= base_url() ?>exam/marksheet/<?php echo $t->regi; ?>">
                         <i class="fa fa-book"></i>
                       </a>
                       <a class="btn btn-default" href="<?= base_url() ?>exam/print_certificate/<?php echo $t->regi; ?>">
                         <i class="fa fa-certificate"></i>
                       </a>
                                        
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal<?php echo $t->regi ?>"><i style="color: red;" class="fa fa-trash"></i></button>

                     </div>
                  </td>                                    
               </tr>
               <?php } $i++; } }?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
   </div>
</div>




<?php 
   foreach ($this->Exam_model->formfilluped($course,$batch) as $key => $value) {
?>
<div class="modal fade" id="exampleModal<?php echo $value->regi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete this ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary left" data-dismiss="modal">No</button>
        <a href="<?= base_url() ?>exam/delete_examinee/<?php echo $t->eeid ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>