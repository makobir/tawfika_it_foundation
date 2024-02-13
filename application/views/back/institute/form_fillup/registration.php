<style type="text/css">
   .card-primary {
    height:297mm;
    width:210mm; 
    margin: 0mm 0mm 0mm 0mm;
}


</style>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/certificate/regi.css">

   <img src="<?= base_url() ?>assets/certificate/Registration.jpg" alt="Loading" style="height: 1500px; width: 100%; padding-bottom: 0px;">
   <div class="card-body" style="padding: 100px; background: ; margin-top:-1500px; margin-bottom:0px">

      <table width="100%">
         <tr>
            <td width="5%">
                <img width="100px" src="<?= base_url() ?>upload/logo/logo.png">
            </td>
            <td class="text-center">
                <h5>Approved by The Government of The People’s Republic of Bangladesh</h5>
               <h1 style="font-family:Senilita; font-size:37pt; color:#d8830a">TAWFIKA IT Foundation(TIF)</h1>
               <h3 style="color:#880606; font-size:22pt; font-weight:bold;">Govt. Registration No: S-13789</h3>
            </td>
            <td width="5%">
               
            </td>
         </tr>
      </table>
      <table width="100%">
         <tbody>
            <tr>
               <td colspan="2" width="100%" align="center">
                  <h1 style="margin-top: 5%;"></h1>
                  <lable style="border: 1px solid black;padding: 5px;border-radius: 10px;margin-bottom: 20px;font-weight: bold; font-size:20pt; background: #d8830a; color:white"> Registration Card <b>  </b>
                  </lable>
                  <h3 style="margin-bottom: -25px;margin-top: 40px;font-weight: 600; font-size:22pt;">
                     Skill Development Training Program
                  </h3>
               </td>
            </tr>
            <tr>
               <td width="50%" align="left">
                  <img width="120" src="<?php echo base_url() ?>images/<?php echo $admit->qr ?>"> <br>
               </td>
               <td width="50%" align="right">
                  <img width="120" src="<?php echo base_url() ?>upload/user/<?php echo $admit->userfile ?>"> <br>
               </td>
            </tr>
         </tbody>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" style="
         height: 500px;
         ">
         <tbody style="
            font-size: 17pt;
            ">
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Regi No </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong> <?php echo $admit->regi ?></strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Session </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong> <?php echo $admit->session ?></strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Year </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong><?php echo $admit->year ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Name of Course</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->course ?> </strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Duration</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->duration ?> Months </strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Name of Trainee</td>
               <td align="left" nowrap="nowrap">:</td>
               <td width="29%" align="left" nowrap="nowrap"><strong><?php echo $admit->name ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Father's Name </td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->father ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Mother's Name</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->mother ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Gender</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->gender ?></strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Date of Birth</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->dob ?></strong></td>
            </tr>
            <tr>
               <td width="15%" align="left" nowrap="nowrap">Institute Name &amp; Code </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong>  <?php echo $admit->institute ?> ( <?php echo $admit->code ?> ) </strong></td>
            </tr>
            <!-- 
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">Address</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong>Chandra, Pollibiddut</strong></td>
               </tr>
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">Upazila</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong>Upazila</strong></td>
               </tr> -->
            <tr>
               <td width="17%" align="left" nowrap="nowrap">District</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->district ?></strong></td>
            </tr>
            <!-- 
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">Batch</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong></strong></td>
               </tr> -->
         </tbody>
      </table>
      <table width="100%" style="margin-top: 100px; border:none !important; text-align: center;">
         <tbody>
            <tr style="border:none !important">
               <td width="20%" style="border:none !important; border-top: 1px solid black !important"> <b> SIgnature of Trainee </b></td>
               <td width="10%" style="border:none !important"></td>
               <td width="20%" style="border:none !important; border-top: 1px solid black !important"> <b> Signature of Head of the Institute </b></td>
               <td width="10%" style="border:none !important"></td>
               <td width="20%" style="border:none !important; border-top: 1px solid black !important">
                  <?php $site = $this->Authenticator_model->sys_info(); ?>
                  <img style="margin-top:-100px" width="200px" src="<?php echo base_url() ?>upload/logo/<?= $site->exam_controller; ?>">
                  <b> Controller of Examinations </b></td>
            </tr>
         </tbody>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;">
         <tbody>
            <tr>
               <td colspan="4">
                  1. This registration card is valid for 1 (One) year. <br>
                  2. For all communications with the foundation, institute code, registration number and session are to be mentioned. <br>
                  3. Scan the QR Code and follow the link in the QR Scanner to verify the registration card from http://tif.org.bd/
               </td>
            </tr>
            <tr>
               <td>Date of issue: <b><?php echo $admit->date ?> </b></td>
            </tr>
         </tbody>
      </table>
      <div style="margin: 20px 0px 0px 0px; text-align: right;">
         Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>        
      </div>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
         <div class="col-12">
            <button class="btn btn-primary float-right" style="margin: 50px" onclick="window.print()">Print this page</button>                 
         </div>
      </div>
  
</div>















<!-- <style type="text/css">
   .wraper {
   background-image: url("<?php echo base_url() ?>upload/border.png"); /* The image used */
   background-color: #cccccc; /* Used if the image is unavailable */
   background-position: center; /* Center the image */
   background-repeat: no-repeat; /* Do not repeat the image */
   background-size: cover; /* Resize the background image to cover the entire container */
   }
</style>
   <div class="card card-primary" style="width:100%;" he >  
      <img src="<?php echo base_url() ?>assets/certificate/regi.png" alt="Snow" style="height: 1500px; padding-bottom: 100px;">
      <div class="card-body" style="padding: 100px; background: ; margin-top:-1400px;">
         <table width="100%" >
            <tr style="margin-bottom:30px;">
               <td colspan="2" width="100%" align="center">
                  <a href="#">
                  <img src="<?php echo base_url() ?>upload/logo/logo.jpg" class="img_div" width="100" height="100"  alt=""/></a>
               </td>
            </tr>
            <tr>
               <td colspan="2" width="100%" align="center">
                  <h1 style="margin:0"> 
                     Tawfika IT Foundation
                  </h1>
                  <h3 style="margin-bottom: 10px;">
                     Skill Development Training
                  </h3>
                  <lable style="border: 1px solid black; padding: 5px; border-radius: 10px; margin-bottom: 30px; font-weight: bold; "> Registration Card <b>  </b> </lable>
               </td>
            </tr>
            <tr>
               <td  width="50%" align="left">
                  <img  width="120" src="<?php echo base_url() ?>images/<?php echo $admit->qr ?>"> <br>
               </td>
               <td  width="50%" align="right">
                  <img  width="120" src="<?php echo base_url() ?>upload/user/<?php echo $admit->userfile ?>"> <br>
               </td>
            </tr>
         </table>
         <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; "  >
            <tbody>
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
                  <td align="left" nowrap="nowrap">Name of Course</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong><?php echo $admit->course ?> </strong></td>
               </tr>
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">Duration</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap" ><strong><?php echo $admit->duration ?> Months </strong></td>
               </tr>
               <tr>
                  <td align="left" nowrap="nowrap">Name of Trainee</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td width="29%" align="left" nowrap="nowrap"><strong><?php echo $admit->name ?></strong></td>
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
                  <td width="15%" align="left" nowrap="nowrap">Institute Name & Code </td>
                  <td width="1%" align="left" nowrap="nowrap">:</td>
                  <td width="40%" align="left" nowrap="nowrap"><strong> <?php echo $admit->institute ?> ( <?php echo $admit->code ?> ) </strong></td>
               </tr><!-- 
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">Address</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong><?php echo $admit->address ?></strong></td>
               </tr>
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">Upazila</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong><?php echo $admit->upazila ?></strong></td>
               </tr> --
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">District</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong><?php echo $admit->district ?></strong></td>
               </tr><!-- 
               <tr>
                  <td width="17%" align="left" nowrap="nowrap">Batch</td>
                  <td align="left" nowrap="nowrap">:</td>
                  <td align="left" nowrap="nowrap"><strong><?php echo $admit->batch ?></strong></td>
               </tr> --
            </tbody>
         </table>
         <table width="100%" style="margin-top: 100px; border:none !important; text-align: center;">
            <tr style="border:none !important">
               <td width="20%" style="border:none !important; border-top: 1px solid black !important"> SIgnature of Trainee</td>
               <td width="10%" style="border:none !important" ></td>
               <td width="20%" style="border:none !important; border-top: 1px solid black !important"> Signature of Head of the Institute</td>
               <td width="10%" style="border:none !important" ></td>
               <td width="20%" style="border:none !important; border-top: 1px solid black !important"><b> Controller of Examinations </b></td>
            </tr>
         </table>
         <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;"  >
               <tr>
                  <td colspan="4">
                     1. This registration card is valid for 1 (One) year. <br>
                     2. For all correspondence with the Foundation, Institute code, registration number and session are to be mentioned..  <br>
                     3. Scan the QR Code and follow the link in the QR Scanner to verify the registration card from http://tawfika.edu.bd 
                  </td>
               </tr>
               <tr>
                  <td>Date of issue: <b><?php echo $admit->date ?> </b></td>
               </tr>
         </table>
         <div style="margin: 20px 0px; text-align: right;">
            Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>
         </div>
         <!-- this row will not appear when printing --
         <div class="row no-print">
            <div class="col-12">
               <button class="btn btn-primary float-right" style="margin: 50px" class="no-print" onclick="window.print()">Print this page</button>                 
            </div>
         </div>
      </div>
   </div>
 -->