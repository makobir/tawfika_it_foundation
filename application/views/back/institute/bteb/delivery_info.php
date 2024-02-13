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
							<tr>
								<td>BTEB Regi</td>
								<td><?= $bteb->registration; ?></td>
							</tr>
							<tr>
								<td>Result</td>
								<td><?= $bteb->result; ?></td>
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
					<form method="post" action="<?= base_url() ?>institute/save_delivery">
					<div class="card-body">
						<?php if($bteb->cert_deliver == NULL ) { ?>
						<div class="row">
							<input type="hidden" name="trainee_id" value="<?php echo $info->regi ?>">						
							<div class="col-sm-12">								
								<div class="form-group">
									<label>Received By</label>	
									<input class="form-control" type="" name="by" placeholder="Certificate Recieve by">
								</div>
							</div>						
							<div class="col-sm-12">								
								<div class="form-group">
									<label>Received Date</label>	
									<input class="form-control" type="" name="deliver_date" placeholder="date">
								</div>
							</div>						
							
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info">Save</button>
								</div>
							</div>						
						</div>	
						<?php } else {
							echo $bteb->cert_deliver . ' to '. $bteb->by . ' at ' .$bteb->deliver_date; 
						}?>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php } ?>