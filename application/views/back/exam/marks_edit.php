<div class="card card-primary">  
   <div class="card-body">
      <div style="margin-top: 0px;">
         <table  class="table table-bordered table-striped" >
            <thead>
               <?php 
               if($trainee->course_id == 1 || $trainee->course_id  == 2 || $trainee->course_id ==3 ) { ?>
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
                  echo $trainee->course_id;
                  $t = $trainee;
                  $em = $this->Exam_model->exam_mark($trainee->regi);
                                    
                  ?>
               <form method="post" action="<?= base_url() ?>exam/marksupdate">
               <?php if($trainee->course_id == 1 || $trainee->course_id  == 2 || $trainee->course_id == 3 ) { ?> 
               <tr class="text-center text-center">
                  <td>
                     <?= $i; ?>
                     <input style="width:30px; height: 30px;" type="hidden" name="trainee_id" value="<?php echo $t->regi; ?>">
                     <input style="width:30px; height: 30px;" type="hidden" name="course_id" value="<?php echo $t->course_id; ?>">
                  </td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->userfile; ?>"></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $em->mcq; ?> <a href="<?= base_url() ?>exam/mcq_edit" class="btn btn-default">Edit</a></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="attendance" value="<?php echo $em->attendance; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="typing" value="<?php echo $em->typing; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="viva" value="<?php echo $em->viva; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="practical" value="<?php echo $em->practical; ?>"></td>
                  <td><button class="btn btn-info btn-block" type="submit">Save</button></td>
               </tr>
               <?php } else { ?>


               <tr class="text-center text-center">
                  <td>
                     <?= $i; ?>
                     <input style="width:30px; height: 30px;" type="hidden" name="trainee_id" value="<?php echo $t->regi; ?>">
                     <input style="width:30px; height: 30px;" type="hidden" name="course_id" value="<?php echo $t->course_id; ?>">
                  </td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->userfile; ?>"></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $t->mcq; ?></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="attendance" value="<?php echo $t->attendance; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="viva" value="<?php echo $t->viva; ?>"></td>
                  <td><input class="form-control" style="width: 80px;" type="text" name="practical" value="<?php echo $t->practical; ?>"></td>
                  <td><button class="btn btn-info btn-block" type="submit">Save</button></td>
               </tr>


               </form>
               <?php  $i++; }          

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