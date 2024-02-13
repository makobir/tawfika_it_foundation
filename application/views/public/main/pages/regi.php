<style type="text/css">
   .card-primary {
    height:297mm;
    width:210mm; 
    margin: 0mm 0mm 0mm 0mm;
}


</style>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/certificate/regi.css">

   <!-- <img src="<?= base_url() ?>assets/certificate/Registration.jpg" alt="Loading" style="height: 1500px; width: 100%; padding-bottom: 0px;"> -->
   <div class="card-body" style="padding: 100px; background: ;  margin-bottom:0px">

      <table width="100%">
         <tr>
            <td width="20%">
                <img width="300px" src="<?= base_url() ?>upload/logo/logo.png">
            </td>
            <td class="text-center" style="text-align:center;">
                <h5>Approved by The Government of The People’s Republic of Bangladesh</h5>
               <h1 style="font-family:Senilita; font-size:37pt; color:#d8830a">TAWFIKA IT Foundation(TIF)</h1>
               <h3 style="color:#880606; font-size:22pt; font-weight:bold;">Govt. Registration No: S-13789</h3>
            </td>
            <td width="5%">
               
            </td>
         </tr>
      </table>
      <table width="100%" border="none">
         <tbody>
            <tr>
               <td colspan="2" width="100%" align="center">
                  <h1 style="margin-top: 5%;"></h1>
                  <lable style="border: 1px solid black;padding: 5px;border-radius: 10px;margin-bottom: 20px;font-weight: bold; font-size:20pt; background: #d8830a; color:white"> Registration Card <b>  </b>
                  </lable>
                  <h3 style="margin-bottom: 5px;margin-top: 40px;font-weight: 600; font-size:22pt;">
                     Skill Development Training Program
                  </h3>
               </td>
            </tr>
            <tr>
               <td width="50%" align="left">
                  <img width="120" src="<?php echo base_url() ?>images/<?php echo $trainee->qr ?>"> <br>
               </td>
               <td width="50%" align="right">
                  <img width="120" src="<?php echo base_url() ?>upload/user/<?php echo $trainee->userfile ?>"> <br>
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
               <td width="40%" align="left" nowrap="nowrap"><strong> <?php echo $trainee->regi ?></strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Session </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong> <?php echo $trainee->session ?></strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Year </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong><?php echo $trainee->year ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Name of Course</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $trainee->title ?> </strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Duration</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $trainee->duration ?> Months </strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Name of Trainee</td>
               <td align="left" nowrap="nowrap">:</td>
               <td width="29%" align="left" nowrap="nowrap"><strong><?php echo $trainee->name ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Father's Name </td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $trainee->father ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Mother's Name</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $trainee->mother ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Gender</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong>Male</strong></td>
            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Date of Birth</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $trainee->dob ?></strong></td>
            </tr>
            <tr>
               <td width="15%" align="left" nowrap="nowrap">Institute Name &amp; Code </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong>  <?php echo $trainee->institute ?> ( <?php echo $trainee->code ?> ) </strong></td>
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
               <td align="left" nowrap="nowrap"><strong><?php echo $trainee->district ?></strong></td>
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
                  <img style="margin-top:-60px" width="200px" src="<?php echo base_url() ?>upload/logo/<?= $site->exam_controller; ?>">
                  <br> Controller of Examinations </td>
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
               <td>Date of issue: <b><?php echo $trainee->date ?> </b></td>
            </tr>
         </tbody>
      </table>
  
</div>


