<?php
	$id = $this->session->userdata('id');
    $pro = $this->Institute_model->password($id); ?>

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Send SMS') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#tab_1" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Send SMS</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#tab_4" role="tab" aria-controls="custom-content-below-home" aria-selected="true"> Sent SMS</a>
         </li>
      </ul>

<div class="box-body no-padding">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="card card-primary " style="width:100%;">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3" >
						Balance : <b> 
						<?php
							$sent = $this->Institute_model->sms_count();
							$balance = $this->Institute_model->sms_balance();
						 	echo $balance->total - $sent->total;
						?> SMS</b>
					</div>
					<div class="col-sm-3" >
						SMS Expire at : <b> 
						<?php
						
						?></b>
					</div>
					<div class="col-sm-3">
						SMS Sent : <b>
						<?php
						 	$sent = $this->Institute_model->sms_count();
						 	echo number_format($sent->total,0);
						?></b>
					</div>
					<div class="col-sm-3">
						<b> 
						
						</b>
					</div>
				</div>		
				<!-- <iframe src="http://api.greenweb.com.bd/g_api.php?token=18677c9556a641c202072e06285856fa&expiry&rate&tokensms&totalsms"></iframe> -->
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<form method="post" action="<?= base_url() ?>institute/sms">
						<div class="card card-primary">
							<div class="card-body">						
								<div class="form-group">
									<label>To</label>
									<input class="form-control" type="" name="phone" placeholder="01713576258,01911143338,.....">
								</div>
								<div class="form-group">					
									<label>Message <span style="color:red;"> Please avoid Banglish SMS dd</span></label>
									<textarea  class="form-control"  type="text" name="message" id="give_me_the_lang"  onKeyDown="limitText(this.value);" onKeyUp="limitText(this.value);" maxlength="320"  required="required" placeholder="<?php echo $this->lang->line('sms'); ?>"><?php if(isset($message)){ echo $message->body;} ?></textarea>
								</div> 

								<textarea hidden name="lang" id="show_lang_in_here1"></textarea>
								<div id="show_lang_in_here"></div>
								<div id="show_lang_in_here"></div>
		                        <script type="text/javascript">
		                            document.getElementById("give_me_the_lang").addEventListener("keyup", function() {
		                            if (/^[a-zA-Z-' ',!-:;'"]+$/.test(this.value)) {
		                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : English";
		                            document.getElementById("show_lang_in_here1").innerHTML = "English";
		                            } else {
		                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : বাংলা";
		                            document.getElementById("show_lang_in_here1").innerHTML = "বাংলা";
		                            }
		                          });
		                        </script>
		                        
		                        <div class="help-block red" style="margin-bottom: 0;"> [N.B. If you use Bengali/ Unicode Text, it will count 70 character = 1 Messages] </div>
		                        <div class="help-block fn_countdown">Remaining :320</div>
								<div class="form-group">
									<?php if($balance->total > $sent->total){ ?>
									<button class="btn btn-info" type="submit">Send</button>
									<?php } else { ?>							
									<b style="color: darkred;"> <a href="<?= base_url() ?>institute/sms_purchase"> Please purchase sms first </a> </b>
									<?php } ?>
								</div>
							</div>
						</div>
						</form>
					</div>
					<div class="col-sm-6">
						<div class="card card-primary">
							<div class="card-body">	
								<form method="post" action="<?= base_url() ;?>institute/send_sms">
								<div class="row">
									<div class="form-group col-sm-4">
										<select name="session" class="form-control">
											<option value="">Select Session</option>
											<?php foreach ($this->Super_admin_model->session() as $key => $value) { ?>						
											<option value="<?php echo $value->scode; ?>" <?php if($this->input->post('session') == $value->scode) {echo 'selected';} ?>><?= $value->session; ?></option>
											<?php } ?>
										</select>
									</div>	
									<div class="form-group col-sm-4">
										<select name="year" class="form-control">
											<option value="">Select Year</option>
											<?php $year = $this->input->post('year'); ?>   
				                            <option <?php if($year == '2022') { echo 'selected';} ?> value="2022">2022</option>
				                            <option <?php if($year == '2021') { echo 'selected';} ?> value="2021">2021</option>
				                            <option <?php if($year == '2020') { echo 'selected';} ?> value="2020">2020</option>
				                            <option <?php if($year == '2019') { echo 'selected';} ?> value="2019">2019</option>
				                            <option <?php if($year == '2018') { echo 'selected';} ?> value="2018">2018</option>
				                            <option <?php if($year == '2017') { echo 'selected';} ?> value="2017">2017</option>
				                            <option <?php if($year == '2016') { echo 'selected';} ?> value="2016">2016</option>
				                            <option <?php if($year == '2015') { echo 'selected';} ?> value="2015">2015</option>
				                            <option <?php if($year == '2014') { echo 'selected';} ?> value="2014">2014</option>
				                            <option <?php if($year == '2013') { echo 'selected';} ?> value="2013">2013</option>
				                            <option <?php if($year == '2012') { echo 'selected';} ?> value="2012">2012</option>
				                            <option <?php if($year == '2011') { echo 'selected';} ?> value="2011">2011</option>
				                            <option <?php if($year == '2010') { echo 'selected';} ?> value="2010">2010</option>
				                            <option <?php if($year == '2009') { echo 'selected';} ?> value="2009">2009</option>
		                              		<option <?php if($year == '2008') { echo 'selected';} ?> value="2008">2008</option> 
										</select>
									</div>	
									<div class="form-group col-sm-4">
										<select name="course" class="form-control"  onchange="javascript:this.form.submit()">
											<option value="">Select Course</option>
											<?php foreach ($this->Super_admin_model->course() as $key => $value) { ?>						
											<option value="<?php echo $value->id; ?>" <?php if($this->input->post('course') == $value->id) {echo 'selected';} ?> ><?= $value->title; ?></option>
											<?php } ?>
										</select>
									</div>	
								</form>
								</div>									
								<div class="form-group">
								<form method="post" action="<?= base_url() ;?>institute/sms">
									<select  name="phone" class="form-control select2">
										<option>Select Recipient</option>
										<option value="<?php
										$session = $this->input->post('session');
										$course = $this->input->post('course');	
										$year = $this->input->post('year');									
										 foreach ($this->Super_admin_model->trainee_list_all($session,$course,$year) as $key => $value) { echo $value->mobile.',';}
										?>">All</option>
										<?php
										$session = $this->input->post('session');
										$course = $this->input->post('course');								
										$year = $this->input->post('year');								
										 foreach ($this->Super_admin_model->trainee_list_all($session,$course,$year) as $key => $v) { 
										?>						
										<option value="<?= $v->mobile ?>"><?= $v->name ?></option>
										<?php } ?>
									</select>
									
								</div>
								<div class="form-group">	
									<div class="form-group">					
									<label>Message <span style="color:red;"> Please avoid Banglish SMS</span></label>
									<textarea  class="form-control" type="text" name="message" id="give_me_the_lang2"  onKeyDown="limitText(this.value);" onKeyUp="limitText(this.value);" maxlength="210"  required="required" placeholder="<?php echo $this->lang->line('sms'); ?>"><?php if(isset($message)){ echo $message->body;} ?></textarea>
								</div> 
								<textarea hidden name="lang" id="show_lang_in_here22"></textarea>

								<div id="show_lang_in_here2"></div>
		                        <script type="text/javascript">
		                            document.getElementById("give_me_the_lang2").addEventListener("keyup", function() {
		                            if (/^[a-zA-Z-' ',!-:;'"]+$/.test(this.value)) {
		                            document.getElementById("show_lang_in_here2").innerHTML = "Detected language : English";
		                            document.getElementById("show_lang_in_here22").innerHTML = "English";
		                            } else {
		                            document.getElementById("show_lang_in_here2").innerHTML = "Detected language : বাংলা";
		                            document.getElementById("show_lang_in_here22").innerHTML = "বাংলা";
		                            }
		                          });
		                        </script>
		                        
		                        <div class="help-block red" style="margin-bottom: 0;"> [N.B. If you use Bengali/ Unicode Text, it will count 70 character = 1 Messages] </div>
		                        <div class="help-block fn_countdown">Remaining :320</div>
								</div>
								<div class="form-group">
									<?php if($balance->total > $sent->total){ ?>
									<button class="btn btn-info" type="submit">Send</button>
									<?php } else { ?>
									<b style="color: darkred;"> <a href="<?= base_url() ?>institute/sms_purchase"> Please purchase sms first </a></b>
									<?php } ?>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
      	</div>
      <!-- /.tab-pane --><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_4">
        	<style type="text/css">
        		.tdbreak {
						  word-break: break-all
						}
        	</style>
        	<div class="card card-primary">
        		<div class="card-body">
		        	<table id="example1" class="table table-bordered table-striped" >
		        		<thead>
			           		<tr>
			           			<td width="5%">ID</td>
			           			<td width="35%">Numbers</td>
			           			<td width="35%">SMS</td>
			           			<td width="10%">Total Numbers</td>
			           			<td width="10%">Total SMS sent</td>
			           		</tr>
			           	</thead>
			           	<tbody>
		           		<?php $i = 1;  foreach ($this->Institute_model->all_sent_sms() as $key => $value) { ?>           
		           		<tr>
		           			<td><?= $i ?></td>
		           			<td  class="tdbreak"><?= $value->numbers; ?></td>
		           			<td><?= $value->message; ?></td>
		           			<td><?= $value->total; ?></td>
		           			<td><?= $value->total_sms; ?></td>
		           		</tr>
		           		<?php $i++; } ?>
		           		</tbody>
		           </table>
		        </div>
       		</div>
        </div><!-- /.tab-pane -->
      <!-- /.tab-pane -->
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- nav-tabs-custom -->
</div>




<script type="text/javascript">
	     function limitText(text) {       
       $('.fn_countdown').text('Remaining :'+(320 - text.length));        
     }
     
</script>