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
              $month = date('Y');
               foreach ($this->Super_admin_model->all_payments($month) as $key => $value) { 
               $cen = $this->Wallet_model->center($value->code); 
                             
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $cen->code ?></td>
              <td><?php echo $cen->site_name ?></td>
              <td><?php echo $cen->mobile ?></td>
              <td>
                <?php                   
                  echo $value->amount;
                ?>                  
              </td>
              <td>
                <?php 
                  $total += $value->amount;
                  echo $total ;
                ?>                  
              </td>
              <td><?php  ?></td>
            </tr>
            <?php $id++; } ?>
          </tbody>
        </table>
			</div>
    </div>
  </div>
</div>