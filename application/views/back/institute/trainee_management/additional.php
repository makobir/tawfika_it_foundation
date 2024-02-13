
<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Trainee Details') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#basic" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Trainee Details</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Academic ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#academic" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Academic </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Payment ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#payment" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Payment </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Exam ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#exam" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Exam </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Result ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#result" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Result </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Certificate ') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#certificate" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Certificate </a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <div class="tab-pane fade <?php if($title == 'Trainee Details') { echo 'show active'; }?>" id="basic" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
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
                                    <?php echo $admit->address?>, <?php echo $admit->upazila?>, <?php echo $admit->district?>, <?php echo $admit->division?>
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
         <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="academic" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">
               <div class="card-body">                  
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                     <tbody>                       
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Batch</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap"><strong><?php echo $admit->batch ?></strong></td>
                        </tr>
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
                           <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $admit->session ?>/ <?php echo $admit->year ?></strong></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="payment" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
          Pyment
         </div>
         <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="exam" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">
               <div class="card-body">                               
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
                     <tbody>                       
                        <tr>
                           <td width="17%" align="left" nowrap="nowrap">Batch</td>
                           <td align="left" nowrap="nowrap">:</td>
                           <td align="left" nowrap="nowrap"><strong><?php echo $exam->batch ?></strong></td>
                        </tr>
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
                           <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $exam->session ?>/ <?php echo $admit->year ?></strong></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="result" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
          Result
         </div>
         <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="certificate" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
          certificate
         </div>
   </div>
</div>

