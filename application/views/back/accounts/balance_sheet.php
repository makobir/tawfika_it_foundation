<div class="card card-primary" style="width:100%;">
  <div class="card card-primary">
    <div class="card-body">
    	<div class="col-sm-12">				
        <table id="example1" class="table table-bordered table-striped" >
          <thead>
             <tr>
               <th>SL</th>
               <th>ID</th>
               <th>Name</th>
               <th>Mobile</th>
               <th>Fee</th>
               <th>Paid</th>
               <th>Due</th>
             </tr>
          </thead>
          <tbody>
            <?php 
              $id = 1;
               foreach ($this->Accounts_model->trainee() as $key => $value) {                     
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $value->regi ?></td>
              <td><?php echo $value->name ?></td>
              <td><?php echo $value->mobile ?></td>
              <td>
                <?php 
                  $fee = $this->Accounts_model->feedetails($value->regi);
                  $fee = $fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical+$fee->idcard ;
                  echo $fee; 
                ?>                  
              </td>
              <td>
                <?php 
                  $paid = $this->Accounts_model->paid($value->regi);
                  echo $paid->amount; 
                ?>                  
              </td>
              <td><?php echo $fee - $paid->amount ?></td>
            </tr>
            <?php $id++; } ?>
          </tbody>
        </table>
			</div>
    </div>
  </div>
</div>