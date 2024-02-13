
<div class="card card-primary card-outline" style="width: 100%">   
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table  class="table table-bordered table-striped" >
            <thead>
               <tr class="text-center">
                  <th>
                    SL
                  </th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Regi</th>
                  <th>Roll</th>
                  <th>MCQ (60)</th>
                  <th>Attedence (20)</th>
                  <th>Typing Test (30)</th>
                  <th>Viva (20) </th>
                  <th>Practical (70)</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>                  
                  <?php
                   if($this->Exam_model->marks_entry() != NULL){ 
                     foreach ($this->Exam_model->marks_entry() as $key => $t) {
                        if ($t->mcq != NULL) {
                  ?>
               <form method="post" action="<?= base_url() ?>institute/marksentry">
               <tr class="text-center text-center">
                  <td>
                     <input style="width:30px; height: 30px;" type="hidden" name="trainee_id" value="<?php echo $t->regi; ?>">
                  </td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->trainee; ?>"></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $t->roll; ?></td>
                  <td><?php echo $t->mcq; ?></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="attendance" value="<?php echo $t->attendance; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="typing" value="<?php echo $t->typing; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="viva" value="<?php echo $t->viva; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="practical" value="<?php echo $t->practical; ?>"></td>
                  <td><button class="btn btn-info btn-block" type="submit">Save</button></td>
               </tr>
               </form>
               <?php } } }?>
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