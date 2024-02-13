

<div class="card card-primary card-outline" style="width:100%;">
	<div class="card-header">
		Send SMS 
	</div>
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
			<div class="col-sm-12">
				<div class="card card-primary">
					<div class="card-body">	
						<form method="post" action="<?= base_url() ;?>institute/send_due_sms">
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
						<form method="post" action="<?= base_url() ;?>institute/sms_due">

								<?php
								$session = $this->input->post('session');
								$course = $this->input->post('course');	
								$year = $this->input->post('year');									
								foreach ($this->Super_admin_model->trainee_list_all_due($session,$course,$year) as $key => $value) { 
								//== Check due ==============
							 	$f = $this->Institute_model->fee($value->regi);
							 	$fee = $f->course_fee+$f->admission+$f->registration+$f->center+$f->exam+$f->idcard+$f->practical;
							 	$paid = $this->Institute_model->paid($value->regi);
							 	if($fee > $paid->amount){
							 	?>

								  <input type="" name="name[]" value="<?= $value->name;?>"> 
								  <input type="" name="trainee_id[]" value="<?= $value->regi;?>"> 
								  <input type="" name="mobile[]" value="<?= $value->mobile;?>"> 
								  <input type="" name="due[]" value="<?= $fee - $paid->amount;?>"> <br> 
								<?php } }?>
								<br>
								<label>Payment Date</label>
								<input type="" name="date" value="" placeholder="12-12-2022" required>
													
						</div>
						
						<div class="form-group">
							<?php if($balance->total > $sent->total){ ?>
							<button class="btn btn-info" type="submit">Send</button>
							<?php } else { ?>
							<b style="color: darkred;"> Please purchase sms first </b>
							<?php } ?>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	     function limitText(text) {       
       $('.fn_countdown').text('Remaining :'+(320 - text.length));        
     }
     
</script>