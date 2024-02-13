
<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <form method="post" action="<?= base_url() ?>exam/examinee">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <select  class="form-control select2" name="center">
               <option value="0">Center</option>  
               <?php 
               $center = $this->input->post('center');
               foreach ($this->Super_admin_model->centers() as $key => $value) { ?>
               <option  <?php if($center == $value->code) {echo 'selected';}?>  value="<?= $value->code; ?>"><?= $value->site_name; ?> - <?= $value->code; ?></option>
               <?php } ?>
            </select>
          </div>
        </div> 
         <div class="col-md-2">
            <div class="form-group">
               <select class="form-control " name="course_id" id="course_id">
                  <option value="">Course</option>
                  <?php $course = $this->input->post('course_id'); ?>
                  <?php foreach ($this->Institute_model->allcourses() as $key => $value) { ?>
                  <option <?php if($course == $value->id) {echo 'selected';}?>  value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                  <?php } ?>
               </select>
            </div>
         </div>
         <div class="col-md-2">
            <div class="form-group">
               <select class="form-control " name="session_id" id="session_id">                  
                  <option value="">Session</option>
                  <?php $session = $this->input->post('session_id'); 
                  foreach ($this->Institute_model->session() as $key => $value) { ?>                              
                  <option <?php if($session == $value->scode) { echo 'selected';} ?> value="<?= $value->scode; ?>"><?= $value->session; ?></option>
                  <?php } ?>
               </select>
            </div>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text">
                     <i class="far fa-calendar-alt"></i>
                     </span>
                  </div>
                  <select name="month" class="form-control">
                     <?php $month = $this->input->post('month'); ?>
                     <option value="">Month</option>
                     <option <?php if($month == '1') { echo 'selected';} ?> value="1">January</option>
                     <option <?php if($month == '2') { echo 'selected';} ?> value="2">February</option>
                     <option <?php if($month == '3') { echo 'selected';} ?> value="3">March</option>
                     <option <?php if($month == '4') { echo 'selected';} ?> value="4">April</option>
                     <option <?php if($month == '5') { echo 'selected';} ?> value="5">May</option>
                     <option <?php if($month == '6') { echo 'selected';} ?> value="6">June</option>
                     <option <?php if($month == '7') { echo 'selected';} ?> value="7">July</option>
                     <option <?php if($month == '8') { echo 'selected';} ?> value="8">August</option>
                     <option <?php if($month == '9') { echo 'selected';} ?> value="9">September</option>
                     <option <?php if($month == '10') { echo 'selected';} ?> value="10">October</option>
                     <option <?php if($month == '11') { echo 'selected';} ?> value="11">November</option>
                     <option <?php if($month == '12') { echo 'selected';} ?> value="12">December</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="form-group">
               <select class="form-control" name="year" id="year">
                  <option value="">Exam Year</option>
                 <?php $year = $this->input->post('year'); ?>
                  <option <?php if($year == '2021') { echo 'selected';} ?> value="2021">2021</option>
                  <option <?php if($year == '2022') { echo 'selected';} ?> value="2022">2022</option>
               </select>
            </div>
         </div>
         <div class="col-md-1">
            <div class="form-group">
               <button class="btn btn-info btn-block" type="submit">Check</button>
            </div>
         </div>
      </div>
      </form>
   </div>   
   <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
      <li class="nav-item">
         <a class="nav-link <?php if($title == 'Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Trainee</a>
      </li>
      <?php if($title == 'Trainee Edit') { ?>
      <li class="nav-item">
         <a class="nav-link <?php if($title == 'Trainee Edit') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#e" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Trainee Edit</a>
      </li>
      <?php } ?>
   </ul>
   <div class="tab-content" id="custom-content-below-tabContent">
      <div class="tab-pane fade <?php if($title == 'Trainee') { echo 'show active'; }?>" id="f" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
         <form method="post" action="<?= base_url() ?>institute/formfillupnow">
         <div class="card-body">
            <div style="margin-top: 0px;">
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
                           $center = $this->input->post('center');
                           $course = $this->input->post('course_id');
                           $year = $this->input->post('year');
                           $session = $this->input->post('session_id');
                           if( $this->input->post('month') != NULL){
                              $orgDate = date("d").'-'.$this->input->post('month').'-'.$year;  
                              $month = date("m-Y", strtotime($orgDate));   
                           }else {
                              $month ="";
                           }

                         if($this->Exam_model->formfilluped($center,$course,$year,$session,$month) != NULL){ 
                           $i = 1; foreach ($this->Exam_model->formfilluped($center,$course,$year,$session,$month) as $key => $t) {
                           $tt = $this->Exam_model->exam_mark($t->regi);
                           $cert_check = $this->Exam_model->cert_check($t->regi);
                           if ($t->eeid != NULL) {
                        ?>
                     <tr class="text-center">  
                        <td><?php echo $i; ?></td>
                        <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->trainee; ?>"></td>                
                        <td><?php echo $t->regi; ?></td>
                        <td><?php echo $t->roll; ?></td>
                        <td><?php echo $t->name; ?></td>
                        <td><?php echo $t->title; ?></td>
                        <td> <?php 
                            if($tt != NULL){                   
                           ?>
                            <b>                                                         
                              <?php 
                                 if($tt->mcq >= 30) {
                                 $total_mark = $tt->mcq + $tt->attendance + $tt->typing +  $tt->viva + $tt->practical;
                                 if($total_mark >= 160 ) { echo 'A+';}
                                 elseif($total_mark >= 140 ) { echo 'A';}
                                 elseif($total_mark >= 120 ) { echo 'A-';}
                                 elseif($total_mark >= 100 ) { echo 'B';}
                                 elseif($total_mark <= 99 ) { echo 'Failed';}
                              }else {
                                 echo "Failed";
                              }
                                
                              } else { echo 'No Results Found!';} ?>
                           </b>
                        </td>
                        <td><?php echo $t->status; ?></td>
                        <td>
                           
                           <div class="dropdown show btn-group">
                             <a class="btn btn-default" href="<?= base_url() ?>exam/trainee_edit/<?php echo $t->regi; ?>">
                               <i class="fa fa-edit"></i>
                             </a>
                             <a class="btn btn-default" href="<?= base_url() ?>exam/marksheet/<?php echo $t->regi; ?>">
                               <i class="fa fa-book"></i>
                             </a>
                    <!--                           
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal<?php echo $t->regi ?>"><i style="color: red;" class="fa fa-trash"></i></button> -->

                           </div>
                        </td>                                    
                     </tr>
                     <?php } $i++; } }?>
                  </tbody>
               </table>
            </div>
         </div>
         </form>
      </div>
      <?php if($title == 'Trainee Edit') { ?>
      <div class="tab-pane fade <?php if($title == 'Trainee Edit') { echo 'show active'; }?>" id="e" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
         <div class="card card-default">
            <div class="card-header">
               Edit Trainee info Edit
            </div>
            <div class="card-body">
               <form method="post" action="<?= base_url() ?>exam/update_trainee/<?= $trainee->regi; ?>">
                  <div class="row">                  
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Name : </label>
                           <input type="text" name="name" id="name" class="form-control" value="<?= $trainee->name; ?>"   >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Father's Name : </label>
                           <input type="text"  name="father" id="father"  class="form-control" value="<?= $trainee->father; ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Mother's Name : </label>
                           <input type="text" name="mother" id="mother" class="form-control" value="<?= $trainee->mother; ?>"  >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label style="color: white;">.</label>
                           <button class="btn btn-info form-control">Update Now</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
       </div>
      <?php } ?>
   </div>
</div>


<!-- 

<?php 
   foreach ($this->Exam_model->formfilluped($center,$course,$year,$session,$month) as $key => $value) {
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
<?php } ?> -->