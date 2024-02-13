<div class="card card-primary" style="width:100%;">
  <div class="card card-primary">
    <div class="card-body">
    	<div class="col-sm-12">				
        <table id="example1" class="table table-bordered table-striped" >
          <thead>
             <tr>
               <th>SL</th>
               <th>Type</th>
               <th>Head</th>
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
              foreach ($this->Super_admin_model->all_debits($month) as $key => $value) { 
              $cen = $this->Wallet_model->center($value->for);                            
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $value->type ?></td>
              <td><?php echo $value->head ?></td>
              <td><?php echo $cen->site_name ?></td>
              <td><?php echo $cen->mobile ?></td>
              <td>
                <?php                   
                  echo $value->debit;
                ?>                  
              </td>
              <td>
                <?php 
                  $total += $value->debit;
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