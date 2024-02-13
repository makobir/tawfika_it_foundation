<style type="text/css">
	.select2-selection__arrow {
    	height: 35px !important;
	}
</style>
<?php if($title == "Student Add") { ?>
<div class="card card-primary" style="width:100%;">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="card card-primary card-outline">
					<div class="card-header">
						Student Info
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url() ?>institute/btebdetails">							
						<div class="row">
							<div class="col-sm-12">	
								<div class="form-group">						
									<select name="regi" class="form-control select2" required>
										<option value="">Select Student</option>
										<?php foreach ($this->Accounts_model->trainee() as $key => $value) {
											$result = $this->Institute_model->result_check($value->regi); 
												if($result->result == "") {
											?>						
											<option value="<?= $value->regi; ?>"><?= $value->regi; ?> : <?= $value->name; ?></option>
										<?php } } ?>
									</select>
								</div>
							</div>							
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info">Check</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } if($title == "Student Details") { ?>
<div class="card card-primary" style="width:100%;">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="card card-primary card-outline">
					<div class="card-header">
						Student Details
					</div>
					<div class="card-body">
						<table style="width:100%;">
							<tr>
								<td>Name</td>
								<td><?= $info->name; ?></td>
							</tr>
							<tr>
								<td>Regi</td>
								<td><?= $info->regi; ?></td>
							</tr>
							<tr>
								<td>Course</td>
								<td><?= $info->course; ?></td>
							</tr>
							<tr>
								<td>Session</td>
								<td><?= $info->session; ?></td>
							</tr>
							<tr>
								<td>Duration</td>
								<td><?= $info->duration; ?></td>
							</tr>
							<tr>
								<td>Year</td>
								<td><?= $info->year; ?></td>
							</tr>
						</table>
					</div>						
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card card-primary card-outline">
					<div class="card-header">
						Student Details
					</div>
						<form method="post" action="<?= base_url() ?>institute/save_bteb_info">
					<div class="card-body">
						<div class="row">
							<input type="hidden" name="trainee_id" value="<?php echo $info->regi ?>">
						
		                     <div class="col-md-6">
		                        <div class="form-group">
		                           <select class="form-control " name="course_id" required>
		                              <option value="">Select Course</option>
		                              <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
		                              <option <?php if($info->cid == $value->id) {echo 'selected';} ?> value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
		                              <?php } ?>
		                           </select>
		                        </div>
		                     </div>
		                     <div class="col-md-6">
		                        <div class="form-group">
		                           <select class="form-control " name="session_id"  required>
		                              <option value="">Session</option>
		                              <?php foreach ($this->Institute_model->session() as $key => $value) { ?>
		                              <option <?php if($info->scode == $value->scode) {echo 'selected';} ?> value="<?php echo $value->scode ;?>" > <?php echo $value->session ;?>  </option>
		                              <?php } ?>
		                           </select>
		                        </div>
		                     </div>
		                     <div class="col-sm-4">
		                        <div class="form-group">
		                           <label></label>
		                           <select class="form-control " name="year" id="year" required>
		                              <option>Year</option>
		                              <option  value="08">2008</option>
		                              <option  value="09">2009</option>
		                              <option  value="10">2010</option>
		                              <option  value="11">2011</option>
		                              <option  value="12">2012</option>
		                              <option  value="13">2013</option>
		                              <option  value="14">2014</option>
		                              <option  value="15">2015</option>
		                              <option  value="16">2016</option>
		                              <option  value="17">2017</option>
		                              <option  value="18">2018</option>
		                              <option  value="19">2019</option>
		                              <option  value="20">2020</option>
		                              <option selected value="21">2021</option>
		                              <option value="22">2022</option>
		                           </select>
		                        </div>
		                     </div>
							<div class="col-sm-4">								
								<div class="form-group">
									<label></label>	
									<input class="form-control" type="" name="registration" placeholder="Registration">
								</div>
							</div>
							<div class="col-sm-4">								
								<div class="form-group">
									<label></label>	
									<input class="form-control" type="" name="result" placeholder="Result">
								</div>
							</div>
							
							
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info">Save</button>
								</div>
							</div>
						</form>
					</div>
						
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>