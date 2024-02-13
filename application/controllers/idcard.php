<style type="text/css">
	.card {
		height: 8.5cm;
		width: 5.5cm;
		border: 1px solid black;
		margin-right: 10px;
	}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}   



.break-after {
    display: block;
    page-break-after: always;
    position: relative;
}

.break-before {
    display: block;
    page-break-before: always;
    position: relative;
}
   .break-after:last-child {
   clear: both;      
   page-break-before: avoid !important;
   padding-top: 5px;
   }

span  {
  display: block;
  margin-bottom: -18px; /** Change this value to whatever you wish **/
  margin-top: -9px; /** Change this value to whatever you wish **/
}

label {
	display: block;
  margin-bottom: -18px; /** Change this value to whatever you wish **/
  margin-top: -9px; 
}
</style>

            <div class="card-body">
               <form method="post" action="<?= base_url() ?>institute/all">
                  <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                              </span>
                           </div>
                           <select class="form-control " name="year" id="year" required>
                              <option value="">Year</option>
                              <?php $year = $this->input->post('year'); ?>
                              <option <?php if($year == '2008') { echo 'selected';} ?> value="2008">2008</option>
                              <option <?php if($year == '2009') { echo 'selected';} ?> value="2009">2009</option>
                              <option <?php if($year == '2010') { echo 'selected';} ?> value="2010">2010</option>
                              <option <?php if($year == '2011') { echo 'selected';} ?> value="2011">2011</option>
                              <option <?php if($year == '2012') { echo 'selected';} ?> value="2012">2012</option>
                              <option <?php if($year == '2013') { echo 'selected';} ?> value="2013">2013</option>
                              <option <?php if($year == '2014') { echo 'selected';} ?> value="2014">2014</option>
                              <option <?php if($year == '2015') { echo 'selected';} ?> value="2015">2015</option>
                              <option <?php if($year == '2016') { echo 'selected';} ?> value="2016">2016</option>
                              <option <?php if($year == '2017') { echo 'selected';} ?> value="2017">2017</option>
                              <option <?php if($year == '2018') { echo 'selected';} ?> value="2018">2018</option>
                              <option <?php if($year == '2019') { echo 'selected';} ?> value="2019">2019</option>
                              <option <?php if($year == '2020') { echo 'selected';} ?> value="2020">2020</option>
                              <option <?php if($year == '2021') { echo 'selected';} ?> value="2021">2021</option>
                              <option <?php if($year == '2022') { echo 'selected';} ?> value="2022">2022</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="fas fa-book"></i>
                              </span>
                           </div>
                           <select name="scode" class="form-control" required>
                              <option value="">Select Session</option>
                              <?php $session = $this->input->post('scode'); 
                              foreach ($this->Institute_model->session() as $key => $value) { ?>                              
                              <option <?php if($session == $value->scode) { echo 'selected';} ?> value="<?= $value->scode; ?>"><?= $value->session; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <select class="form-control " name="course_id" id="course_id" required>
                              <option value="">Select Course</option>
                              <?php $course = $this->input->post('course_id'); ?>
                              <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
                              <option <?php if($course == $value->id) {echo 'selected';}?>  value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="form-group">
                           <button type="submit" class="btn btn-info">View List </button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
        

    <div class="well" style="margin :30px;" >
        <section class="tabs">
            <div class="tabbed-content" >
            	<?php 
					$course = $this->input->post('course_id');
					$session = $this->input->post('session');
					$year = $this->input->post('year');
					$counter=1; foreach ($this->Institute_model->all_trainee($year, $session,$course) as $key => $t) { ?>
					<table >
						<tr>
							<td>								
								<div class="card center" style="padding:5px;">									
									<img class="center" width="40px" src="<?php echo base_url();?>upload/logo/<?php echo $site->userfile; ?>">
									<div class="text-center" style="color: darkgoldenrod; text-transform: uppercase; ">
										<div style="text-align:center; font-size:10pt; line-height: 10pt; background:#052988; color: white;"><b> <?php echo $site->site_name; ?> </b></div>
										<div style="text-align:center; font-size:9pt; background:#98c1f0;"><b>Code : <?php echo $site->code; ?></b></div>
									</div>									
									<img class="center" width="70px" src="<?php echo base_url();?>upload/user/<?php echo $t->userfile; ?>">
									<div style="font-size:10pt">
									Name : <b> <?php echo $t->name; ?></b> <br>
									Session : <b> <?php echo $t->session; ?></b> <br>
									Year : <b> <?php echo $t->year; ?></b> <br>
									St. ID : <b><?php echo $t->regi; ?></b> <br>
									Course : <b> <?php echo $t->course; ?><br>
									</div>
									<div style="text-align:right">
										<span style="font-size:10px; display: block; margin-bottom: 0px; margin-top: 10px;">Authorise Signature</span>
									</div>									
								</div>

							</td>
							<td>
								<div class="card second">
									
									<div style="padding:5px;">		
										<p style="text-align:center; font-size: 11pt; margin-bottom: 0px; "><img width="50px" src="<?= base_url(); ?>upload/logo/logo.png"><br>
											This institute is affiliated by <br>
											<b style="font-size: 13pt;color:darkgoldenrod; letter-spacing: -1.3px;">TAWFIKA IT FOUNDATION (TIF)</b>
                                 <br>
                                 Web : tif.org.bd
										</p>
                              
										<p style="margin-bottom: 6px;"> Issue Date : <b> <?php echo $t->admission_date; ?></b>
											<?php $new_date = date('d-m-Y', strtotime('+2 years', strtotime($t->admission_date)));?><br>
											Valid Till : <b><?php echo $new_date; ?></b></p>	
										<p style="font-size: 9pt; text-align: center; margin-bottom: 6px; ">
											If found this card please return to
										</p>
										<p style="text-align:center;">
											<span style="font-size:11pt; font-weight: bold;"> <?php echo $site->site_name; ?> </span> <br>
											<span style="font-size:9.5pt"><?php echo $site->address; ?>, <?php echo $site->upazila; ?>, <?php echo $site->district; ?>. </span><br>
											<span style="font-size:9.5pt;">Mobile : <?php echo $site->mobile; ?> </span><br>
											<span style="font-size:9.5pt">Email : <?php echo $site->email; ?></span><br>							
                                 <span style="font-size:9.5pt">Web : <?php echo $site->domain; ?></span>                   
										</p>
									</div>								
								</div>									
							</td>						
						</tr>
					</table>
					<?php if($counter%4== 0) { ?>
                	<div class="break-after"></div>
					<?php } 
					$counter++; } ?>
          
                <!-- <div class="break-before">Page 2</div> -->
            	</div>
            </div>
        </section>
    </div>





