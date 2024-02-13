
<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <form method="post" action="<?= base_url() ?>institute/formfillup">
      <div class="row">
         <div class="col-md-3">
            <div class="form-group">
               <select class="form-control " name="course_id" id="course_id">
                  <option value="">Select Course</option>
                  <?php $course = $this->input->post('course_id'); ?>
                  <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
                  <option <?php if($course == $value->id) {echo 'selected';}?>  value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                  <?php } ?>
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <select class="form-control " name="session_id" id="session_id">                  
                  <option value="">Select Session</option>
                  <?php $session = $this->input->post('session_id'); 
                  foreach ($this->Institute_model->session() as $key => $value) { ?>                              
                  <option <?php if($session == $value->scode) { echo 'selected';} ?> value="<?= $value->scode; ?>"><?= $value->session; ?></option>
                  <?php } ?>
               </select>
            </div>
         </div>
     <!--     <div class="col-sm-2">
            <div class="form-group">
               <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text">
                     <i class="far fa-calendar-alt"></i>
                     </span>
                  </div>
                  <select name="month" class="form-control">
                     <option value="">Select Month</option>
                     <?php $month = $this->input->post('month'); ?>
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
         </div> -->
         <div class="col-md-3">
            <div class="form-group">
               <select class="form-control" name="year" id="year" required>
                  <option value="">Select Exam Year</option>
                 <?php $year = $this->input->post('year'); ?>
                  <option <?php if($year == '2021') { echo 'selected';} ?> value="2021">2021</option>
                  <option <?php if($year == '2022') { echo 'selected';} ?> value="2022">2022</option>
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <button class="btn btn-info btn-block" type="submit">Check List</button>
            </div>
         </div>
      </div>
      </form>
   </div> 
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div style="margin-top: 0px;">
         <table id="example1" class="table table-bordered table-striped" >
                  <?php
                  $course = $this->input->post('course_id');
                  $session = $this->input->post('session_id');
                  $year = $this->input->post('year');
                  if( $this->input->post('month') != NULL){
                     $orgDate = date("d").'-'.$this->input->post('month').'-'.$year;  
                     $month = date("m-Y", strtotime($orgDate));   
                  }else {
                     $month ="";
                  }
                   ?>
                  <tr>
                     <td>Session ID :</td>
                     <td> <input class="form-control" type="text" name="session_id" value="<?php echo $session; ?>" required></td>
                     <td>Course ID :</td>
                     <td><input class="form-control" type="text" name="course_id" value="<?php echo $course; ?>" required>
                     <td>Exam Year :</td>
                     <td><input class="form-control" type="text" name="year" value="<?php echo $year; ?>" required></td>
                  </tr>
               </table>
           
         <table id="example1" class="table table-bordered table-striped" >       
            <thead>
               <tr class="text-center">
                  <th>
                     
                  </th>
                  <th>Photo</th>
                  <th>Regi</th>
                  <th>Name</th>
                  <th>Father's Name</th>
                  <th>Mothers Name</th>
                  <th>Course </th>
                  <th>Session </th>
                  <th>Mobile</th>
               </tr>
            </thead>
            <tbody>   

                   
                  <hr>
                  <?php
                   if($this->Institute_model->formfillup($course,$session,$year) != NULL){ 
                     foreach ($this->Institute_model->formfillup($course,$session,$year) as $key => $t) {
                        if ($t->eeid == NULL) {
                  ?>
               <tr class="text-center">
                  <td>
                     <input style="width:30px; height: 30px;" type="checkbox" name="trainee_id[]" value="<?php echo $t->regi; ?>">
                     <input type="hidden" name="session_id" value="<?= $t->scode; ?>">
                  </td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->trainee; ?>"></td>
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->father; ?></td>
                  <td><?php echo $t->mother; ?></td>
                  <td><?php echo $t->title; ?></td>
                  <td><?php echo $t->session; ?></td>
                  <td><?php echo $t->mobile; ?></td>
                                    
               </tr>
               <?php } } }?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
      <hr style="width:100%;">
      <div class="row">
         <div class="col-sm-3">
            <div class="form-group">
               <button class="btn btn-info btn-block" type="submit">Submit List</button>
            </div>
         </div>
      </form>
      </div>
   </div>
</div>
