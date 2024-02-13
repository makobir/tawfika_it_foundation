<div class="card card-primary" style="width:100%;">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<div class="card card-primary card-outline">
					<div class="card-header">
						Add Credit Transections 
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url() ?>super_admin/addactnx">
							<input type="hidden" name="type" value="credit">
						<div class="row">
							<div class="col-sm-12">	
								<div class="form-group">	
									<label>Select Source</label>						
									<select class="form-control">
										<option></option>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Income Head</label>	
									<input class="form-control" type="" name="title">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Amount</label>	
									<input class="form-control" type="" name="amount">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Remarks</label>	
									<textarea class="form-control" type="" name="remarks"></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-8">				
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>Date</th>
                     <th>Income Head</th>
                     <th>Credit Amount</th>
                     <th>Remarks</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                  	 $total = 0;
                     foreach ($this->Super_admin_model->allactnx() as $key => $value) {
                     	if ($value->credit > 1 ) {
                     		$total += $value->credit;
                  ?>
                  <tr>
                    <td><?php echo $value->date ?></td>
                    <td><?php echo $value->title ?></td>
                    <td><?php echo $value->credit ?></td>
                    <td><?php echo $value->remarks ?></td>
                    <td>
                    	<a class="btn btn-default" href="<?= base_url() ?>accounts/delete_credit/<?php echo $value->id ?>"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php } } ?>
                </tbody>
                <tfoot>
                	<tr>
                		<td colspan="2">Total</td>
                		<td colspan="3"><?php echo $total ?> </td>
                	</tr>
                </tfoot>
              </table>
			</div>
		</div>
	</div>
</div>