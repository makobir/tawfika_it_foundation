<head>
   <style >
       fieldset{
          background-repeat:no-repeat;
          background-position:left;
          background-size:cover;
          padding-left: 25px;
          margin-right:10px;
          margin-bottom: 10px;
        }

       p#innerPara{padding:20px ;}
       legend{ 
        width:280px; 
        padding:2px 20px;
        background-color: #dcc5db;
        font-weight: bold;
        }
       table { width: 100%; }
       .border {        
          border: 2px solid #0d2888 !important;
       }

    .container {
        height:297mm;
        width:210mm; 
        margin: 0mm 0mm 0mm 0mm;
         }

    </style>
 </head>
<?php $site = $this->Authenticator_model->site(); ?>

<img src="<?= base_url() ?>assets/certificate/Registration.jpg" alt="Loading" style="height: 1500px; width: 100%; padding-bottom: 0px;">
<div style="font-size: 18pt; margin-top:-1440px; margin-left:80px;margin-right:85px; line-height:20pt">   
    
   <div class="col-sm-12 text-center row">
      <div class="col-sm-2">                  
         <img width="150px" src="<?= base_url() ?>upload/logo/<?= $site->userfile; ?>">
      </div>
      <div class="col-sm-8">
         <address style="line-height:20pt">
           <strong style="font-size:30px;"><?= $site->site_name; ?></strong><br>
           <?= $site->address; ?>, <?= $site->upazila; ?>, <?= $site->district; ?>
           <?= $site->division; ?><br>
           Phone: <?= $site->mobile; ?>
           Email: <?= $site->email; ?> <br>
           Web: <?= $site->domain; ?>
         </address>
      </div>
      <div class="col-sm-2">
        <img class="center" width="100px" src="<?php echo base_url();?>upload/user/<?php echo $admit->userfile; ?>">
      </div>
      <div class="col-sm-12" style="margin:10px 0px 15px 0px">
         <span style="border: 1px solid black; border-radius: 10px; padding: 5px 10px; background: #d8830a; color:white; font-weight: bold; ">Admission Form <b>  </b></span>
      </div>
   </div>
   <div class="col-sm-12">
        <fieldset class="border">
           <legend>Academic Information</legend>
           <table width="100%">
               <tr>
                   <td width="30%">Session</td>
                   <td width="2%">:</td>
                   <th><?= $admit->session; ?></th>
                   <td rowspan="5"> </td>
               </tr>
               <tr>
                   <td width="30%">Year</td>
                   <td width="2%">:</td>
                   <th><?= $admit->year; ?></th>
               </tr>
               <tr>
                   <td width="30%">Registration No</td>
                   <td width="2%">:</td>
                   <th><?= $admit->regi; ?></th>
               </tr>
               <tr>
                   <td width="30%">Course</td>
                   <td width="2%">:</td>
                   <th><?= $admit->course; ?></th>
               </tr>
               <tr>
                   <td width="30%">Admission Date</td>
                   <td width="2%">:</td>
                   <th><?= $admit->admission_date; ?></th>
               </tr>
            </table> 
        </fieldset>
    </div>
    
   <div class="col-sm-12">
        <fieldset class="border" >
           <legend>Personal Information</legend>
           <table width="100%">
               <tr>
                   <td width="30%">Name</td>
                   <td width="2%">:</td>
                   <th><?= $admit->name; ?></th>
               </tr>
               <tr>
                   <td width="30%">Father's Name</td>
                   <td width="2%">:</td>
                   <th><?= $admit->father; ?></th>
               </tr>
               <tr>
                   <td width="30%">Mother's Name</td>
                   <td width="2%">:</td>
                   <th><?= $admit->mother; ?></th>
               </tr>
               <tr>
                   <td width="30%">Date of Birth</td>
                   <td width="2%">:</td>
                   <th><?= $admit->dob; ?></th>
               </tr>
               <tr>
                   <td width="30%">Religion</td>
                   <td width="2%">:</td>
                   <th><?= $admit->religion; ?></th>
               </tr>
               <tr>
                   <td width="30%">Gender</td>
                   <td width="2%">:</td>
                   <th><?= $admit->gender; ?></th>
               </tr>
               <tr>
                   <td width="30%">Blood Group</td>
                   <td width="2%">:</td>
                   <th><?= $admit->blood; ?></th>
               </tr>
               <tr>
                   <td width="30%">Permanent Address</td>
                   <td width="2%">:</td>
                   <th>Village / House & Post : <?= $admit->village; ?>, Upazila : <?= $admit->upazila; ?>, District : <?= $admit->district; ?>, Division : <?= $admit->division; ?> </th>
               </tr>
               <tr>
                   <td width="30%">Present Address</td>
                   <td width="2%">:</td>
                   <th>Village / House & Post : <?= $admit->pvillage; ?>, Upazila : <?= $admit->pupazila; ?>, District : <?= $admit->pdistrict; ?>, Division : <?= $admit->pdivision; ?> </th>
               </tr>
            </table> 
        </fieldset>
    </div>
    <?php $edu = $this->Institute_model->education($admit->regi); 
        if($edu != NULL) {
    ?>
   <div class="col-sm-12">
        <fieldset class="border" >
           <legend>Educational Info</legend>
           <table width="100%" border="1" style="margin-left:-15px;">
               <tr>
                   <th width="20%">Exam</th>
                   <th width="30%">Board</th>
                   <th width="10%">Roll</th>
                   <th width="20%">Passing Year</th>
                   <th width="20%">Result</th>
               </tr>
               <?php if($edu->exam != NULL) { ?>
               <tr>
                   <td><?= $edu->exam; ?></td>
                   <td><?= $edu->board; ?></td>
                   <td><?= $edu->roll; ?></td>
                   <td><?= $edu->passing_year; ?></td>
                   <td><?= $edu->result; ?></td>
               </tr>
               <?php } if($edu->exam != NULL) { ?>
               <tr>
                   <td><?= $edu->exam2; ?></td>
                   <td><?= $edu->board2; ?></td>
                   <td><?= $edu->roll2; ?></td>
                   <td><?= $edu->passing_year2; ?></td>
                   <td><?= $edu->result2; ?></td>
               </tr>
           <?php } ?>
            </table> 
            <br>        
        </fieldset>
    </div>
    <?php } ?>
   <div class="col-sm-12">
        <fieldset class="border" >
           <legend>Contact Information</legend>
           <table width="100%">
               <tr>
                   <td width="30%">Gurdian</td>
                   <td width="2%">:</td>
                   <th><?= $admit->gurdian; ?></th>
               </tr>
               <tr>
                   <td width="30%">Relation</td>
                   <td width="2%">:</td>
                   <th><?= $admit->relation; ?></th>
               </tr>
               <tr>
                   <td width="30%">Guardian Mobile</td>
                   <td width="2%">:</td>
                   <th><?= $admit->gurdian_mobile; ?></th>
               </tr>
               <tr>
                   <td width="30%">Trainee Mobile</td>
                   <td width="2%">:</td>
                   <th><?= $admit->mobile; ?></th>
               </tr>
               <tr>
                   <td width="30%">Trainee Email</td>
                   <td width="2%">:</td>
                   <th><?= $admit->email; ?></th>
               </tr>            
            </table>         
        </fieldset>
    </div>
   <div class="col-sm-12">
        <fieldset class="border" >
           <legend>Login Crediantial</legend>
           <table width="100%">
               <tr>
                   <td width="30%">Username</td>
                   <td width="2%">:</td>
                   <th><?= $admit->em; ?></th>
               </tr>
               <tr>
                   <td width="30%">Password</td>
                   <td width="2%">:</td>
                   <th><?= $admit->password; ?></th>
               </tr>
            </table>         
        </fieldset>
    </div>
    <br><br><br>
    <div class="col-sm-12">
        <table style="width: 100%;">            
               <tr>
                   <td width="50%"><p> Trainee Signature</p></td>
                   <td style="text-align: right;"><p>Director</p></td>
               </tr>
        </table>
    </div>
    <div style="margin: 0px 0px; text-align: right;">
      Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>
   </div>
   <div class="col-sm-12" style="margin-bottom:0px">
       
   <a href="<?= base_url() ?>institute/edit/<?php echo $admit->regi; ?>" style="margin: 0px" class="no-print btn btn-success">Edit Now</a>
   <button style="margin: 0px" class="no-print btn btn-primary" onclick="window.print()">Print this page</button>
   </div>
</div>
