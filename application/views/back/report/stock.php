<div class="row no-print" style="width: 100%">
 <div class="col-sm-12"> 
    <div class="card card-primary">
      <div class="card-body">                    
         <form method="post" action="<?= base_url() ?>super_admin/stock">
        <div class="row">  
          <div class="col-sm-2">
            <select name="group" class="form-control">
              <option value="">Prduct Group </option>
              <option value="Robi">Robi </option>
              <option value="Airtel">Airtel </option>
            </select>
          </div> 
          <div class="col-sm-3">                    
            <div class="form-group">
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                    <input name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div> 
          </div>
          <div class="col-sm-1" style="text-align: center; margin-top: 5px; font-weight: bold;">                    
            <div class="form-group">OR
            </div>
          </div>

          <div class="col-sm-3">                    
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <select name="month" class="form-control">
                  <option value="">Select Month</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
            </div> 
          </div> 
          <div class="col-sm-2">              
            <div class="form-group">
               <button type="submit" class="btn btn-info">View Report </button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<style type="text/css">
	table,th,td,tr {
		border:1px solid black;
		font-size: 16px;
	}

</style>

<?php 
      if ($this->input->post('date') != NULL) {
        $orgDate = $this->input->post('date');  
        $date = date("d-m-Y", strtotime($orgDate));  
      } elseif($this->input->post('month') != NULL) {
      $orgDate = date("d").'-'.$this->input->post('month').'-'.date("Y");  
      $date = date("m-Y", strtotime($orgDate)); 
      } else {
        $date = 0;
      }
    //  echo $date;  
    $group = $this->input->post('type');
   // $type = $this->input->post('type');
   //$sr_id = $this->input->post('sr_id');

?>





<div class="container" style="text-align: center; width: 100%">
  <table class="head" width="100%" style="border:none !important" >
    <tr style="border:none !important">
      <td style="border:none !important; text-align: left">
        <img width="150px" src="<?= base_url() ?>assets/nudus.jpg">
      </td>
      <td style="border:none !important">              
        <h1> Nidus Off Trade</h1>
        <p>Ishwargonj, Mymensing </p>
      </td>
      <td style="border:none !important;  text-align: right;">
         <img width="150px" src="<?= base_url() ?>assets/robi.jpg">
      </td>
    </tr>
  </table>


  <table style="margin-left: 0px; width: 100%">
<!-- ====================START LOAD Sales ========================================-->
      <tr>
        <td colspan="6" style="font-weight: bold;font-size: 20px;">
          Robi Profit
        </td>
      </tr>
      <tr>
        <th style="width:5%">ID</th>
        <th style="width: 20%;">Name</th>
        <th style="width: 10%;">Stock</th>
        <th style="width: 10%;">Price</th>
        <th style="width: 20%;">Remarks</th>
      </tr>
      <tr>
        <td colspan="5">
          Load
        </td>
      </tr>
      
      <?php $group = '';
            $type = 'load';
            foreach ($this->Super_admin_model->physical_product($type) as $key => $product) { ?>      
      <tr>
        <td><?php echo $product->id ?></td>
        <td><?php echo $product->name ?></td>
        <td>        
          <?php $id = $product->id ;
            $sales = $this->Super_admin_model->sales($id,$date);
            $purchase = $this->Super_admin_model->purchase($id,$date); 
           // echo ($purchase->qty -$sales->qty ); 
          ?>
        </td>
        <td>
          <?php  echo ($purchase->price - $sales->price ); ?> ৳
        </td>
        <td>          
          
        </td>
      </tr>
      <?php  } ?>
      <tr>
        <td colspan="5">
          SIM Stock
        </td>
      </tr>
      <?php $group = '';
            $type = 'SIM';
            foreach ($this->Super_admin_model->physical_product($type) as $key => $product) { ?>      
      <tr>
        <td><?php echo $product->id ?></td>
        <td><?php echo $product->name ?></td>
        <td>        
          <?php $id = $product->id ;
            $sales = $this->Super_admin_model->sales($id,$date);
            $purchase = $this->Super_admin_model->purchase($id,$date); 
            echo ($sales->qty - $purchase->qty ); 
          ?> 
        </td>
        <td>
          <?php  echo number_format(($purchase->qty - $sales->qty)*$product->purchase,2 ); ?> ৳
        </td>
        <td>          
          
        </td>
      </tr>
      <?php  } ?>
      <tr>
        <td colspan="5">
          Card Stock
        </td>
      </tr>
      <?php $group = '';
            $type = 'Card';
            foreach ($this->Super_admin_model->physical_product($type) as $key => $product) { ?>      
      <tr>
        <td><?php echo $product->id ?></td>
        <td><?php echo $product->name ?></td>
        <td>        
          <?php $id = $product->id ;
            $sales = $this->Super_admin_model->sales($id,$date);
            $purchase = $this->Super_admin_model->purchase($id,$date); 
            echo ($purchase->qty - $sales->qty); 
          ?> 
        </td>
        <td>
          <?php  echo number_format(($purchase->qty - $sales->qty)*$product->purchase,2 ); ?> ৳
        </td>
        <td>          
          
        </td>
      </tr>
      <?php  } ?>
</table>

  <table width="100%" style="margin-top: 100px; border:none !important; text-align: center;">
    <tr style="border:none !important">
      <td style="border:none !important; border-top: 1px solid black !important"><b>Supervisor </b> <br> SIgnature</td>    
      <td style="border:none !important" width="10%"></td> 
      <td style="border:none !important; border-top: 1px solid black !important"><b>DH Manager </b> <br> SIgnature</td>    
      <td style="border:none !important" width="10%"></td> 
      <td style="border:none !important; border-top: 1px solid black !important"><b>Accountant </b> <br> SIgnature</td>
      <td style="border:none !important" width="10%"></td>   
      <td style="border:none !important; border-top: 1px solid black !important"><b>Distributor Owner </b> <br> SIgnature</td>
      
    </tr>
  </table>
  <div style="margin: 20px 0px; text-align: right;">
    Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>
  </div>
  <div >    
      <button class="btn btn-primary no-print" style="margin: 50px" class="no-print" onclick="window.print()">Print this page</button>
  </div>
<button style="margin: 50px" class="no-print" onclick="window.print()">Print this page</button>
</div>