<style type="text/css">
 
table {
  border-collapse: collapse;
}



</style>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/certificate/regi.css">
<div class="card card-primary" style="width:100%;">    

   <img src="<?= base_url() ?>assets/certificate/admit.jpg" alt="Loading" style="height: 750px; padding-bottom: 100px;">
	<div class="card-body" style=" margin-top:-750px; padding: 30px 40px;"> 
      <table width="100%">
         <tr style="margin-bottom:30px;">
            <td width="10%" height="102">
               <a href="#">
               <img src="<?php echo base_url() ?>upload/logo/logo.jpg" class="img_div" width="100" height="100"  alt=""/></a>
            </td>
            <td width="60%" align="center">
               <h5>Approved by The Government of The People’s Republic of Bangladesh</h5>
               <h1 style="font-family:Senilita; font-size:37pt; color:#d8830a; margin-top: -10px;">TAWFIKA IT Foundation(TIF)</h1>
               <h3 style="color:#880606; font-size:22pt; font-weight:bold; margin-top: -10px;">Govt. Registration No: S-13789</h3> 
            </td>
            <td  width="10%" align="center">
               <img height="80px" src="<?php echo base_url() ?>upload/user/<?php echo $admit->userfile ?>"> <br>
            </td>
         </tr>         
         <tr>
            <td width="100%" colspan="3" style="text-align:center;">
               <lable style="border: 1px solid black;padding: 5px;border-radius: 10px;margin-bottom: 5px;font-weight: bold; font-size:18pt; background: #d8830a; color:white"> Admit Card <b>  </b>
               </lable>
               <h3 style="margin-bottom: -25px;margin-top: 10px;font-weight: 600; font-size:19pt; padding-bottom:20px">
                  Skill Development Training Program
               </h3>
            </td>
         </tr>
      </table>

      <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; padding: 10px 60px"  >
         <tbody>
            <tr>
               <td width="15%" align="left" nowrap="nowrap"> Institute Name & Code</td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong><?php echo $admit->institute ?> ( <?php echo $admit->code ?> ) </strong></td>
               <td width="17%" align="left" nowrap="nowrap">Roll No </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="30%" align="left" nowrap="nowrap"><strong ><?php echo $admit->roll ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Name of the Examinee</td>
               <td align="left" nowrap="nowrap">:</td>
               <td width="29%" align="left" nowrap="nowrap"><strong><?php echo $admit->name ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">Regi No </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong > <?php echo $admit->regi ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Father's Name </td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $admit->father ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">Session</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->session ?> (<?php echo $admit->scode ?>)</strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">Mother's Name</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $admit->mother ?></strong></td>
               <td align="left" nowrap="nowrap">Trade Course</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->course ?> (<?php echo $admit->ccode ?>) </strong></td>


            </tr>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Date of Birth</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?php echo $admit->dob ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">Duration</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap" ><strong><?php echo $admit->duration ?> Months </strong></td>
            </tr>
         </tbody>
      </table>

      <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:0px;"  >
         <tbody>
            <tr>
               <td width="17%" align="left" nowrap="nowrap">Subjects</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong></strong></td>
               <td width="17%" align="left" nowrap="nowrap"></td>
               <td align="left" nowrap="nowrap"></td>
               <td align="left" nowrap="nowrap" ><strong> </strong></td>
            </tr>
            <tr>
               <td colspan="4" align="left" nowrap="nowrap">
               	<div class="container" style="width:100%">
                     <div class="row">
                  		<div class="col-sm-2">
                  			
                  		</div>
                  		<div class="col-sm-8">
                  			<div class="row">
                  				<?php $i = 1; foreach ($this->Exam_model->subjects($admit->regi) as $key => $value) { ?>
                  				<div class="col-sm-6">
                  					<?= $i .' : '. $value->title; ?>
                  				</div>
                  				<?php $i++; } ?>
                  			</div>
                  		</div>
                     </div>
               	</div>
               </td>
            </tr>

            <tr>
                <td colspan="5" style="text-align: right; padding-top: 10px; padding-right: 100px;">
                  <?php $site = $this->Authenticator_model->sys_info(); ?>
                  <img  width="150px" src="<?php echo base_url() ?>upload/logo/<?= $site->exam_controller; ?>">
                  <hr style="border: 0.5px solid black; width: 180px; margin-right: -55px; margin-bottom: 0px;">
                    <b> Exam Controller </b>
                </td>
            </tr>

            <tr>
                <td colspan="4">1. The examinee must bring the Registration Card along with the admit card in the examination hall. <br>
                2. The examinee must sign in the attendance sheet, otherwise examinee will be traeted as absent in the exam.  <br>
                3. Examnee must abide by the rules stated overleaf. </td>
            </tr>
        </table>
    </div>
         <!-- this row will not appear when printing -->
         <div class="row no-print">
            <div class="col-12">
               <button class="btn btn-primary float-right" style="margin: 50px" class="no-print" onclick="window.print()">Print this page</button>                 
            </div>
         </div>
</div>




