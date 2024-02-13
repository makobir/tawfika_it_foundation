<style type="text/css">
	.select2-selection__arrow {
    	height: 35px !important;
	}
</style>
<?php if($title == "Collect Student Fee") { ?>
<div class="card card-primary" style="width:100%;">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="card card-primary card-outline">
					<div class="card-header">
						Student Fee Payment 
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url() ?>accounts/feedetails">
							<input type="hidden" name="type" value="debit">
						<div class="row">
							<div class="col-sm-12">	
								<div class="form-group">						
									<select name="regi" class="form-control select2" required>
										<option value="">Select Student</option>
										<?php foreach ($this->Accounts_model->trainee() as $key => $value) { ?>						
											<option value="<?= $value->regi; ?>"><?= $value->regi; ?> : <?= $value->name; ?></option>
										<?php } ?>
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

<?php } if($title == "Student Fee Details") { ?>
<div class="card card-primary" style="width:100%;">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="card card-primary card-outline">
					<div class="card-header">
						Student Fee Payment 
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url() ?>accounts/pay/<?php echo $paid->trainee_id; ?>">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
						<div class="row">
							
							<div class="col-sm-6">
								<div class="form-group">
									<label>Total Course Fee : </label>	
									<?php echo $fee->course_fee; ?>	<br>
									<label>Others Fee : </label>
									<?php echo $fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical; ?> <br>				
								</div>
							</div>	
							<div class="col-sm-6">
								<div class="form-group" >
									<label style="color:green;">Total Fee Paid : </label>	
									<?php echo $paid->amount; ?> <br>
									<label style="color:red;">Due: </label>	
									<?php echo ($fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical )- $paid->amount; ?>
								</div>
							</div>
            	<div class="col-sm-12 row">
              <!-- checkbox -->
              	<div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="admission" type="checkbox" id="checkboxPrimary1">
                    <label for="checkboxPrimary1">
                    	Admission Fee
                    </label>
                  </div>
            		</div>
            		<div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="course" type="checkbox" id="checkboxPrimary8">
                    <label for="checkboxPrimary8">
                    	Course Fee
                    </label>
                  </div>
            		</div>
            		<div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="registration" type="checkbox" id="checkboxPrimary2">
                    <label for="checkboxPrimary2">
                    	Registration Fee
                    </label>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="exam" type="checkbox" id="checkboxPrimary3">
                    <label for="checkboxPrimary3">
                    	Exam Fee
                    </label>
                  </div>
              	</div>
               <div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="center" type="checkbox" id="checkboxPrimary4">
                    <label for="checkboxPrimary4">
                    	Center Fee
                    </label>
                  </div>
              	</div>
               <div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="practical" type="checkbox" id="checkboxPrimary5">
                    <label for="checkboxPrimary5">
                    	Practical Exam Fee
                    </label>
                  </div>
              	</div>
               <div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="idcard" type="checkbox" id="checkboxPrimary6">
                    <label for="checkboxPrimary6">
                    	ID Card Fee
                    </label>
                  </div>
              	</div>
               <div class="col-sm-6">
                  <div class="icheck-primary d-inline">
                    <input name="others" type="checkbox" id="checkboxPrimary7">
                    <label for="checkboxPrimary7">
                    	Others
                    </label>
                  </div>
              	</div>
            	</div>
							<div class="col-sm-12" style="margin-top:10px">
								<div class="form-group"><span style="color:red;">*</span>
                   <label> Payment Amount</label>	
									<input class="form-control" type="" name="amount" placeholder="Total Fee Recieved" required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Remarks</label>	
									<textarea class="form-control" type="" name="remarks"></textarea>
								</div>
							</div>
             <div class="col-md-12">
                <div class="form-group">
                   <label> Next Payment Date</label>
                   <div class="input-group">
                      <div class="input-group-prepend">
                         <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input name="payment_date" id="payment_date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                   </div>
                </div>
             </div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info">Save</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6">				
        <table id="" class="table table-bordered table-striped" >
          <thead>
             <tr>
               <th>Date</th>
               <th>Credit Amount</th>
               <th>Remarks</th>
             </tr>
          </thead>
          <tbody>
            <?php            
               foreach ($this->Accounts_model->allpayments($id) as $key => $value) {                     
            ?>
            <tr>
              <td><?php echo $value->date ?></td>
              <td><?php echo $value->amount ?></td>
              <td><?php echo $value->remarks ?></td>
              <td>
              	<a class="btn btn-default" href="<?= base_url() ?>accounts/invoice/<?php echo $value->trainee_id ?>/<?php echo $value->id ?>"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
          <tfoot>
          	<tr>
          		<td colspan="2">Total</td>
          		<td colspan="3"></td>
          	</tr>
          </tfoot>
        </table>
			</div>
		</div>
	</div>
</div>

<?php } ?>