<div class="card card-primary card-outline" style="width: 100%">   
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
            <thead>
               <tr class="text-center">
                  <th>SL</th>
                  <th>Course</th>
                  <th>Admitted Student</th>
                  <th>Exam Enrolled </th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>   

                  <?php
                  $id = 1;
                     foreach ($this->Institute_model->my_courses() as $key => $t) { 
                  ?>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $t->title; ?></td>
                  <td class="text-center">
                     <?php 
                        echo $this->Institute_model->admitted_students($t->id);
                     ?>
                  </td>
                  <td class="text-center">                     
                     <?php 
                        echo $this->Institute_model->exam_enrolled($t->id);
                     ?>
                  </td>
                  <td>
                     <a href="<?= base_url() ?>institute/course_edit/<?= $t->id; ?>"><i class="fa fa-edit"></i> Edit</a>
                  </td>
                                    
               </tr>
               <?php $id++; } ?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
      </form>
      </div>
   </div>
</div>
