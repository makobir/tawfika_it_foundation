
   <div class=" no-print"style="width: 100%" >
         <div class="card card-primary" >
            <div class="card-body">
               <form method="post" action="<?= base_url() ?>institute/marks_entry">
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
        


 
   <div class="card-body">
      <div style="margin-top: 0px;">
         <table  class="table table-bordered table-striped" >
            <thead>
               <?php 
               if($this->input->post('course_id') != NULL ){
               if($this->input->post('course_id') == 1 || $this->input->post('course_id') == 2 || $this->input->post('course_id') ==3 ) { ?>
               <tr class="text-center">
                  <th> SL </th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Regi</th>
                  <th>MCQ (60)</th>
                  <th>Attedence (20)</th>
                  <th>Typing Test (20)</th>
                  <th>Viva (20) </th>
                  <th>Practical (80)</th>
                  <th>Action</th>
               </tr>
            <?php } else { ?>

               <tr class="text-center">
                  <th> SL </th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Regi</th>
                  <th>MCQ (60)</th>
                  <th>Attedence (20)</th>
                  <th>Viva (20) </th>
                  <th>Practical (100)</th>
                  <th>Action</th>
               </tr>

            <?php } ?>
            </thead>
            <tbody>                  
                  <?php
                  $i = 1;
                   if($this->Exam_model->marks_entry($session,$course,$year) != NULL){ 
                     foreach ($this->Exam_model->marks_entry($session,$course,$year) as $key => $t) {
                        if ($t->mcq >= 30 ) {
                  ?>
               <form method="post" action="<?= base_url() ?>institute/marksentry">
               <?php if($this->input->post('course_id') == 1 || $this->input->post('course_id') == 2 || $this->input->post('course_id') == 3 ) { ?> 
               <tr class="text-center text-center">
                  <td>
                     <?= $i; ?>
                     <input style="width:30px; height: 30px;" type="hidden" name="trainee_id" value="<?php echo $t->regi; ?>">
                     <input style="width:30px; height: 30px;" type="hidden" name="course_id" value="<?php echo $t->course_id; ?>">
                  </td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->trainee; ?>"></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $t->mcq; ?></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="attendance" value="<?php echo $t->attendance; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="typing" value="<?php echo $t->typing; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="viva" value="<?php echo $t->viva; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="practical" value="<?php echo $t->practical; ?>"></td>
                  <td><button class="btn btn-info btn-block" type="submit">Save</button></td>
               </tr>
               <?php } else { ?>


               <tr class="text-center text-center">
                  <td>
                     <?= $i; ?>
                     <input style="width:30px; height: 30px;" type="hidden" name="trainee_id" value="<?php echo $t->regi; ?>">
                     <input style="width:30px; height: 30px;" type="hidden" name="course_id" value="<?php echo $t->course_id; ?>">
                  </td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->trainee; ?>"></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $t->mcq; ?></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="attendance" value="<?php echo $t->attendance; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="viva" value="<?php echo $t->viva; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="practical" value="<?php echo $t->practical; ?>"></td>
                  <td><button class="btn btn-info btn-block" type="submit">Save</button></td>
               </tr>

               <?php  } ?>

               </form>
               <?php } $i++; } }
               }else {
                  echo 'Please filter with dropdown.';
               }

               ?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>

   <!--    <hr style="width:100%;">
      </form>
         <div class="col-sm-3">
            <div class="form-group">
               <button class="btn btn-info btn-block" type="submit">Submit List</button>
            </div>
         </div>
      </div>

 -->