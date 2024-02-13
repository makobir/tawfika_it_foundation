<div class="card card-info" style="width:100%;">
	<div class="card-header">
		Result
	</div>
	<div class="card-body">
		<?php
          if($this->Exam_model->results() != NULL){ 
          $t = $this->Exam_model->results()                   
         ?>
         Your Result is : <b>
            
            <?php 
               if($t->mcq >= 36) {
                  $total_mark = $t->mcq + $t->attendance + $t->typing +  $t->viva + $t->practical;
                  if($total_mark >= 180 ) { echo 'A+';}
                  elseif($total_mark >= 160 ) { echo 'A';}
                  elseif($total_mark >= 140 ) { echo 'A-';}
                  elseif($total_mark >= 120 ) { echo 'B';}
                  elseif($total_mark <= 119 ) { echo 'Failed';}
               }else {
                  echo "Failed";
               }
            ?>               
         <?php }else { echo 'No Results Found!';} ?> </b>
	</div>
</div>