<div class="row no-print" style="width: 100%">
 <div class="col-sm-12"> 
    <div class="card card-primary">
      <div class="card-body">                    
         <form method="post" action="<?= base_url() ?>super_admin/lose_profit">
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
    $group = $this->input->post('group');
   // $type = $this->input->post('type');
   //$sr_id = $this->input->post('sr_id');

?>





<div class="container" style="text-align: center; width: 100%">

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
      <tr  style=" background: #d7d6d6;">
        <td colspan="7" style="font-weight: bold;font-size: 20px;">
          Robi Profit
        </td>
      </tr>
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 15%;">Type</th>
        <th style="width: 20%;">Total Purchase Amount</th>
        <th style="width: 20%;">Total Sales Amount</th>
        <th style="width: 10%;">Balance</th>
        <th style="width: 20%;">Total Commission</th>
        <th style="width: 20%;">Remarks</th>
      </tr>
      
      <tr>
        <td>1</td>
        <td>Load</td>
        <td>        
          <?php $group = '';
                $cat = 'load';
                foreach ($this->Report_model->this_month_purchase($group,$cat,$date) as $key => $amount) { }
                echo number_format($amount->price,2);                      
                $load_purchase = $amount->price;
                $load_commission = $amount->commission;  ?> ৳
        </td>
        <td>          
          <?php $group = '';
                $cat = 'load';
                foreach ($this->Report_model->this_month_sales($group,$cat,$date) as $key => $amount) { }
                echo number_format($amount->price,2);                      
                $load_sales = $amount->price;  ?> ৳
        </td>
        <td>
          <?php echo number_format($load_purchase - $load_sales,2) ;?>
        </td>
        <td>
          <?php echo number_format($load_commission,2) ; ?>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>2</td>
        <td>SIM</td>
        <td>          
          <?php $group = '';
                $cat = 'SIM';
                foreach ($this->Report_model->this_month_purchase($group,$cat,$date) as $key => $amount) { }
                echo number_format($amount->price,2);                      
                $sim_purchase = $amount->price;  ?> ৳
        </td>
        <td>      
          <?php $group = '';
                $cat = 'SIM';
                foreach ($this->Report_model->this_month_sales($group,$cat,$date) as $key => $amount) { }
                echo number_format($amount->price,2);                      
                $sim_sales = $amount->price;
                $sim_commission = $amount->commission;  ?> ৳
        </td>
        <td>
          <?php echo $sim_purchase - $sim_sales ;?>
        </td>
        <td>
          <?php echo number_format($sim_commission,2) ; ?>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Scratch Card</td>
        <td>          
          <?php $group = '';
                $cat = 'Card';
                foreach ($this->Report_model->this_month_purchase($group,$cat,$date) as $key => $amount) { }
                echo number_format($amount->price,2);                      
                $card_purchase = $amount->price; ?> ৳
        </td>
        <td>          
          <?php $group = '';
                $cat = 'Card';
                foreach ($this->Report_model->this_month_sales($group,$cat,$date) as $key => $amount) { }
                echo number_format($amount->price,2);                      
                $card_sales = $amount->price;
                $card_commission = $amount->commission;  ?> ৳
        </td>
        <td>
          <?php echo number_format($card_purchase - $card_sales,2) ;?>
        </td>
        <td>
          <?php echo number_format($card_commission,2) ; ?>
        </td>
        <td></td>
      </tr>      
      <tr style="text-align: center;">  
        <th colspan="2">Total </th>
        <th>
          <?php echo number_format($load_purchase+$sim_purchase +$card_purchase,2);?>  
        </th>
        <th>
          <?php echo number_format($load_sales+$sim_sales+$card_sales,2);?>  
        </th>
        <th>
          <?php echo number_format(($load_purchase - $load_sales)+($sim_purchase - $sim_sales)+($card_purchase - $card_sales),2);?>  
        </th>
        <th><?php $commission = $load_commission + $sim_commission+$card_commission;
        echo number_format($commission,2) ; ?></th>
        <th></th>   
      </tr>
      <tr style="text-align: center;">

        <td colspan="5" >Total Expanse</td>
        <td>
          <?php
          $group = 'card';
          foreach ($this->Report_model->total_disbursment($date) as $key => $amount) { }
          echo number_format($amount->debit,2);                      
          $disbursment = $amount->debit; ?>
        </td>
      </tr>
      <tr style="text-align: center;">
        <td colspan="5">
          <?php if($commission > $disbursment ) {
              echo 'Net Profit';
            } else {
              echo "<b style='color:red'> Lose </b>";
            } 
          ?>
              
        </td>
        <td>
          <?php echo number_format($commission - $disbursment,2) ; ?>
        </td>
      </tr>
</table>
            <table width="100%" style="margin-top: 100px; border:none !important; text-align: center;">
              <tr style="border:none !important">  
                <td style="border:none !important; border-top: 1px solid black !important"><b>Supervisor </b> <br> Signature</td>    
                <td style="border:none !important" width="10%"></td> 
                <td style="border:none !important; border-top: 1px solid black !important"><b>DH Manager </b> <br> Signature</td>    
                <td style="border:none !important" width="10%"></td> 
                <td style="border:none !important; border-top: 1px solid black !important"><b>Accountant </b> <br> Signature</td>
                <td style="border:none !important" width="10%"></td>  
                <td style="border:none !important; border-top: 1px solid black !important"><b>Distributor Owner </b> <br> Signature</td>
              </tr>
            </table>
            <div style="margin: 20px 0px; text-align: right;">
              Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>
            </div>
<button style="margin: 50px" class="no-print btn btn-primary" onclick="window.print()">Print this page</button>
</div>