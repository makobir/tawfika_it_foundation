   <div class=" no-print"style="width: 100%" >
         <div class="card card-primary" >
            <div class="card-body">
               <form method="post" action="<?= base_url() ?>institute/all">
                  <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                              </span>
                           </div>
                           <select class="form-control " name="year" id="year" required>
                              <option value="">Year</option>
                              <?php $year = $this->input->post('year'); ?>                              
                              <option <?php if($year == '2022') { echo 'selected';} ?> value="2022">2022</option>
                              <option <?php if($year == '2021') { echo 'selected';} ?> value="2021">2021</option>
                              <option <?php if($year == '2020') { echo 'selected';} ?> value="2020">2020</option>
                              <option <?php if($year == '2019') { echo 'selected';} ?> value="2019">2019</option>
                              <option <?php if($year == '2018') { echo 'selected';} ?> value="2018">2018</option>
                              <option <?php if($year == '2017') { echo 'selected';} ?> value="2017">2017</option>
                              <option <?php if($year == '2016') { echo 'selected';} ?> value="2016">2016</option>
                              <option <?php if($year == '2015') { echo 'selected';} ?> value="2015">2015</option>
                              <option <?php if($year == '2014') { echo 'selected';} ?> value="2014">2014</option>
                              <option <?php if($year == '2013') { echo 'selected';} ?> value="2013">2013</option>
                              <option <?php if($year == '2012') { echo 'selected';} ?> value="2012">2012</option>
                              <option <?php if($year == '2011') { echo 'selected';} ?> value="2011">2011</option>
                              <option <?php if($year == '2010') { echo 'selected';} ?> value="2010">2010</option>
                              <option <?php if($year == '2009') { echo 'selected';} ?> value="2009">2009</option>                              
                              <option <?php if($year == '2008') { echo 'selected';} ?> value="2008">2008</option>                              
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="fas fa-book"></i>
                              </span>
                           </div>
                           <select name="scode" class="form-control" required>
                              <option value="">Select Session</option>
                              <?php $session = $this->input->post('scode'); 
                              foreach ($this->Institute_model->session() as $key => $value) { ?>                              
                              <option <?php if($session == $value->scode) { echo 'selected';} ?> value="<?= $value->scode; ?>"><?= $value->session; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <select class="form-control " name="course_id" id="course_id" required>
                              <option value="">Select Course</option>
                              <?php $course = $this->input->post('course_id'); ?>
                              <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
                              <option <?php if($course == $value->id) {echo 'selected';}?>  value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="form-group">
                           <button type="submit" class="btn btn-info">View List </button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>       
    
      <div class="card card-primary">
         <div class="card-body">
            <div style="margin-top: 20px;">
               <table id="example1" class="table table-bordered table-striped" >
                  <thead>
                     <tr class="text-center">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Regi</th>
                        <th>Roll</th>
                        <th>Course</th>
                        <th>Mobile</th>
                        <th>Result</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i=1; 
                        foreach ($this->Institute_model->all_trainee($year, $session, $course) as $key => $t) { ?>
                     <tr class="text-center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $t->name; ?></td>
                        <td><?php echo $t->regi; ?></td>
                        <td><?php echo $t->roll; ?></td>
                        <td><?php echo $t->course; ?></td>
                        <td><?php echo $t->mobile; ?></td>
                        <td><?php echo $t->result; ?></td>
                        <td>
                           <div class="btn-group">
                              <a title="View Profile" href="<?= base_url() ?>institute/trainee/<?php echo $t->regi; ?>" class="btn btn-default"> <i class="fa fa-eye"></i> </a>
                              <a title="Print Admission Form" href="<?= base_url() ?>admission/print_preview/<?php echo $t->regi; ?>" class="btn btn-default"> <i class="fa fa-book"></i> </a>
                              <a title="ID Card" href="<?= base_url() ?>institute/id/<?php echo $t->regi; ?>" class="btn btn-default"> <i class="fa fa-id-card"></i></a>
                              <?php $check = $this->Institute_model->exam_enroll_check($t->regi); ?>
                              <a title="Edit Now" href="<?= base_url() ?>institute/edit/<?php echo $t->regi; ?>" class="btn btn-default <?php if($check != NULL) { echo 'disabled';} ?>" > <i class="fa fa-edit"></i></a>
                              <a title="Registration Card" href="<?= base_url() ?>institute/registration/<?php echo $t->regi; ?>" class="btn btn-default"> <i class="fa fa-certificate"></i></a>
                             <!--  <button type="button" class="btn btn-danger disabled <?php if($check != NULL) { echo 'disabled';} ?>" data-toggle="modal" data-target="#exampleModal<?php echo $t->regi ?>"><i class="fa fa-trash"></i></button>   -->     
                           </div>
                        </td>
                     </tr>
                     <?php $i++;  } ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>

   

<?php 
   foreach ($this->Institute_model->all_trainee($year, $session,$course) as $key => $value) {
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
        <?php $check = $this->Institute_model->exam_enroll_check($value->regi); ?>
        <a href="<?= base_url() ?>institute/delete_trainee/<?php echo $value->regi ?>" type="button" class="btn btn-danger <?php if($check != NULL) { echo 'disabled';} ?>">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>