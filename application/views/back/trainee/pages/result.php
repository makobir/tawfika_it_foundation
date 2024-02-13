
<div class="card card-primary card-outline" style="width: 100%">   
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
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
                  <th>Result</th>
               </tr>
            </thead>
            <tbody>                  
                  <?php
                   if($this->Exam_model->marks_entry() != NULL){ 
                     $sl = 1;
                     foreach ($this->Exam_model->marks_entry() as $key => $t) {
                        if ($t->mcq != NULL) {
                  ?>
               <tr class="text-center text-center">
                  <td>
                    <?php echo $sl; ?>
                  </td>
                  <td> <img width="50px;" src="<?= base_url() ?>upload/user/<?php echo $t->trainee; ?>"></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->regi; ?></td>
                  <td><?php echo $t->roll; ?></td>
                  <td><?php echo $t->mcq; ?></td>
                  <td><?php echo $t->attendance; ?></td>
                  <td><?php echo $t->typing; ?></td>
                  <td><?php echo $t->viva; ?></td>
                  <td><?php echo $t->practical; ?></td>
                  <td>
                     <?php 
                        $total_mark = $t->mcq + $t->attendance + $t->typing +  $t->viva + $t->practical;
                        if($total_mark >= 180 ) { echo 'A+';}
                        elseif($total_mark >= 160 ) { echo 'A';}
                        elseif($total_mark >= 140 ) { echo 'A-';}
                        elseif($total_mark >= 120 ) { echo 'B';}
                        elseif($total_mark <= 119 ) { echo 'Failed';}
                     ?>
                  </td>
               </tr>
               <?php } $sl++; } }?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
<!--       <hr style="width:100%;">
      </form>
         <div class="col-sm-3">
            <div class="form-group">
               <button class="btn btn-info btn-block" type="submit">Submit List</button>
            </div>
         </div>
      </div>

 -->