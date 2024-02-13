<div class="card card-primary" style="width:100%;">
  <div class="card card-primary">
    <div class="card-body">
    	<div class="col-sm-12">				
        <table id="example1" class="table table-bordered table-striped" >
          <thead>
             <tr>
               <th>SL</th>
               <th>Code</th>
               <th>Center</th>
               <th>Mobile</th>
               <th>Balance on Wallet</th>
               <th>Total</th>
               <th></th>
             </tr>
          </thead>
          <tbody>
            <?php 
              $id = 1;
              $total = 0;
               foreach ($this->Super_admin_model->centers() as $key => $value) { 
               $check = $this->Wallet_model->check_balance($value->code); 
               if($check->amount > 1) {                   
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $value->code ?></td>
              <td><?php echo $value->site_name ?></td>
              <td><?php echo $value->mobile ?></td>
              <td>
                <?php                   
                  echo $check->amount;
                ?>                  
              </td>
              <td>
                <?php 
                  $total += $check->amount;
                  echo $total ;
                ?>                  
              </td>
              <td><?php  ?></td>
            </tr>
            <?php $id++; } } ?>
          </tbody>
        </table>
			</div>
    </div>
  </div>
</div>