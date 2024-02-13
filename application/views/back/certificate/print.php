<div class="card card-primary no-print">
   <div class="card-body" style="color:red;">
      For print your certificate please Use paper size <b>A4</b>  & set margin to <b>None</b>, Scale <b>Default</b>  . <button style="margin: 0px" class="no-print btn btn-primary" onclick="window.print()">Print This Certificat</button>
   </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/certificate/style.css">
<div class="containe">
  <!--  <img src="<?php echo base_url() ?>assets/certificate/final.png" alt="" style="width:100%; height: 100%;">   -->
<?php $cer = $this->Certificates_model->certificates_id($admit->regi); ?>
  <img class="qrcoad" src="<?php echo base_url() ?>images/<?php echo $cer->qr ?>" alt="qr code">
      <?php $site = $this->Authenticator_model->sys_info(); 
         if($site->ex_ctrl_status == 'Active') {
      ?>
      <img  class="sign" src="<?php echo base_url() ?>upload/logo/<?= $site->exam_controller; ?>">
      <?php } if($site->chairman_status == 'Active') { ?> 
      <img  class="chairman" src="<?php echo base_url() ?>upload/logo/<?= $site->chairman; ?>">
      <?php } ?>
    <div class="Serial-No"><?php echo $cer->id ?></div>
    <div class="roll"><?php echo $exam->roll ?></div>
    <div class="session"><?php echo $exam->session ?>, <?php echo $exam->year ?></div>
    <div class="reg"><?php echo $admit->regi ?></div>
    <div class="subject"><?php echo $admit->course ?> </div>
    <div class="name"><?php echo $admit->name ?></div>
    <div class="fathersname"><?php echo $admit->father ?></div>
    <div class="mothersname"><?php echo $admit->mother ?></div>
    <div class="month">
      <?php 
          
         if($admit->duration == 3 ) {
            echo 'Three';
         }elseif($admit->duration == 6){
            echo 'Six';
         }elseif($admit->duration == 12){
            echo 'One Year';
         }

      ?>         
    </div>
    <div class="form-to"><?php echo $admit->from ?></div>
    <div class="left-at"><?php echo $admit->to ?></div>
    <div class="right-at"><?php echo $admit->site_name ?></div>
    <div class="gpa">
    <?php
       if($this->Exam_model->resultss($admit->regi) != NULL){ 
       $t = $this->Exam_model->resultss($admit->regi);                   
      ?>
     <b>
         
         <?php 
            if($t->mcq >= 30) {
               $total_mark = $t->mcq + $t->attendance + $t->typing +  $t->viva + $t->practical;
               if($total_mark >= 160 ) { echo 'A+';}
               elseif($total_mark >= 140 ) { echo 'A';}
               elseif($total_mark >= 120 ) { echo 'A-';}
               elseif($total_mark >= 100 ) { echo 'B';}
               elseif($total_mark <= 99 ) { echo 'Failed';}
            }else {
               echo "Failed";
            }
         ?>
      </b>               
   <?php }else { echo 'No Results Found!';} ?>
   </div>
    <div class="issue"><?php echo $cer->date ?></div>
     <?php 
         
            $total_mark = $t->mcq + $t->attendance + $t->typing +  $t->viva + $t->practical;
            if($total_mark >= 160 ) { echo '<span class="tik1">&#252;</span>';}
            elseif($total_mark >= 140 ) { echo '<span class="tik2">&#252;</span>';}
            elseif($total_mark >= 120 ) { echo '<span class="tik3">&#252;</span>';}
            elseif($total_mark >= 100 ) { echo '<span class="tik4">&#252;</span>';}
         
        
      ?>    
   
</div> 
   
<div class="no-print"><br>
   <a class="btn btn-success" href="<?= base_url() ?>certificates/print_complet/<?= $admit->regi; ?>">Print Complete</a>
</div>
   
