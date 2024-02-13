<div class="col-sm-12" style="margin-top: 10px;">
  <marquee> <?php $site = $this->Authenticator_model->setting_data();
   echo 'Welcome <b>'. $this->session->userdata('name') ?> </b></marquee>
</div>
<div class="col-sm-12">
<div class="card card-primary" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs no-print" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Home') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#basic" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Details</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Gurdian Details') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#gurdian" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Guardian Details</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Academic ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#academic" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Academic </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Payment') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#payment" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Payment </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Exam ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#exam" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Exam </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Result ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#result" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Result </a>
         </li><!-- 
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Certificate ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#certificate" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Certificate </a>
         </li> -->
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <div class="tab-pane fade <?php if($title == 'Home') { echo 'show active'; }?>" id="basic" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
           <div class="card card-primary ">
              <div class="card-body">
                 <div class="row">
                    <div class="col-sm-10">
                       <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                        <tbody>
                           <tr>
                              <td width="29%"align="left" nowrap="nowrap">Name of the Trainee</td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td  align="left" nowrap="nowrap"><strong><?php echo $admit->name ?></strong></td>
                           </tr>
                           <tr>
                              <td align="left" nowrap="nowrap">Father's Name </td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td align="left" nowrap="nowrap"><strong><?= $admit->father ?></strong></td>
                           </tr>
                           <tr>
                              <td align="left" nowrap="nowrap">Mother's Name</td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td align="left" nowrap="nowrap"><strong><?= $admit->mother ?></strong></td>
                           </tr>
                           <tr>
                              <td align="left" nowrap="nowrap">Gender</td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td align="left" nowrap="nowrap"><strong><?= $admit->gender ?></strong></td>
                           </tr>
                           <tr>
                              <td width="17%" align="left" nowrap="nowrap">Date of Birth</td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td align="left" nowrap="nowrap"><strong><?php echo $admit->dob ?></strong></td>
                           </tr>
                           <tr>
                              <td width="17%" align="left" nowrap="nowrap">Address</td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td align="left" nowrap="nowrap">
                                 <strong>
                                    <?php echo $admit->village?>, <?php echo $admit->post?> -  <?php echo $admit->post_code?>, <?php echo $admit->upazila?>, <?php echo $admit->district?>, <?php echo $admit->division?>
                                 </strong>
                              </td>
                           </tr>
                           <tr>
                              <td width="17%" align="left" nowrap="nowrap">Mobile</td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td align="left" nowrap="nowrap"><strong><?php echo $admit->mobile ?></strong></td>
                           </tr>
                           <tr>
                              <td width="17%" align="left" nowrap="nowrap">Email</td>
                              <td align="left" nowrap="nowrap">:</td>
                              <td align="left" nowrap="nowrap"><strong><?php echo $admit->email ?></strong></td>
                           </tr>
                        </tbody>
                     </table>
                    </div>
                    <div class="col-sm-2">
                        <img  width="120" src="<?php echo base_url() ?>upload/user/<?php echo $admit->userfile ?>">
                    </div>
                 </div>
              </div>
           </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'Gurdian') { echo 'show active'; }?>" id="gurdian" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">
               <div class="card-body">                  
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                     <tbody>   
                        <tr>
                           <td align="left" nowrap="nowrap">Guardian Name</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap"><strong><?php echo $admit->gurdian ?> </strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Relation with Trainee</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap" ><strong><?php echo $admit->relation ?> </strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Mobile No </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $admit->gurdian_mobile ?></strong></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'Academic') { echo 'show active'; }?>" id="academic" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">
               <div class="card-body">                  
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                     <tbody>   
                        <tr>
                           <td align="left" nowrap="nowrap">Trade Course</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap"><strong><?php echo $admit->course ?> </strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Duration</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap" ><strong><?php echo $admit->duration ?> Months </strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Regi No </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $admit->regi ?></strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Session </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $admit->session ?></strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Year </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong ><?php echo $admit->year ?></strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Admission Date </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong ><?php echo $admit->date ?></strong></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'Payment') { echo 'show active'; }?>" id="payment" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-6">        
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                           <tbody>                       
                              <tr>
                                 <td width="17%" align="left" nowrap="nowrap">Course</td>
                                 <td align="left" nowrap="nowrap">:</td>
                                 <td align="left" nowrap="nowrap"><strong><?php echo $course->title ?></strong></td>
                              </tr>
                              <tr>
                                 <td width="17%" align="left" nowrap="nowrap">Duration</td>
                                 <td align="left" nowrap="nowrap">:</td>
                                 <td align="left" nowrap="nowrap" ><strong><?php echo $admit->duration ?> Months </strong></td>
                              </tr>
                            
                           </tbody>
                        </table>
                     </div>
                     <div class="col-sm-6">        
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                           <tbody>                       
                              <tr>
                                 <td width="17%" align="left" nowrap="nowrap">Paid</td>
                                 <td align="left" nowrap="nowrap">:</td>
                                 <td align="left" nowrap="nowrap"><strong><?php echo $payment->amount ?>TK</strong></td>
                              </tr>
                                                          <tr>
                                 <td width="17%" align="left" nowrap="nowrap"></td>
                                 <td align="left" nowrap="nowrap"></td>
                               </td>
                              </tr>
                              </form>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="exam" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">
               <div class="card-body">                               
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                     <tbody>    
                        <tr>
                           <td align="left" nowrap="nowrap">Trade Course</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap"><strong><?php echo $exam->course ?> </strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Duration</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap" ><strong><?php echo $exam->duration ?> Months </strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Regi No </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $exam->regi ?></strong></td>
                        </tr>
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Session </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $exam->session ?></strong></td>
                        </tr>   
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Year </td>
                           <td width="1%" align="left" nowrap="nowrap">:</td>
                           <td width="40%" align="left" nowrap="nowrap"><strong ><?php echo $admit->year ?></strong></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="result" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
          <div class="card card-primary">
             <div class="card-body">                
               <?php
                   if($this->Exam_model->resultss($admit->regi) != NULL){ 
                   $t = $this->Exam_model->resultss($admit->regi);                   
                  ?>
                  Your Result is : <b>
                     
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
                  <?php }else { echo 'No Results Found!';} ?> </b>
             </div>
          </div>
         </div>
</div>


  </div>
</div>
<div class="col-sm-12">
  <div class="card card-primary">
    <div class="card-body">
      <div class="row">         
        <div class="col-sm-4" style="font-size:20px;">
          Payment Due : <strong>
            <?php 
              $due = $this->Institute_model->treaineepaid();
              $fee = $this->Institute_model->treaineefee();
              echo $fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical; - $due->amount;
            ?>
              
            </strong>  
            ||
              <?php 
              $due = $this->Institute_model->treaineepaid();
              echo $due->amount;
            ?>
              

        </div>
        <div class="col-sm-4">
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./col -->
