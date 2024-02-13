<div class="row no-print" style="width: 100%">
  <div class="col-sm-12">                
    <div class="card card-primary" style="margin-top: 20px;">
      <div class="card-body">                    
        <form method="post" action="<?= base_url() ?>invoice/sales_report">
        <div class="row">
          <div class="col-sm-2">
            <select name="group" class="form-control">
              <option value="">Prduct Group </option>
              <option value="Robi">Robi </option>
              <option value="Airtel">Airtel </option>
            </select>
          </div>  
          <div class="col-sm-2">
            <select name="cat" class="form-control">
              <option value="">Sales Product </option>
              <option value="load">Load Sales </option>
              <option value="SIM">SIM Sales </option>
              <option value="Card">Card Sales </option>
            </select>
          </div> 
          <div class="col-sm-3">                                         
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-user"></i>
                  </span>
                </div>
                  <select name="sr_id" class="form-control select2">
                     <option value=""> House </option>
                     <?php foreach ($this->Super_admin_model->all_staff() as $key => $value) { ?>
                     <option value="<?php echo $value->id; ?>"><?php echo $value->card_no; ?> - <?php echo $value->name; ?> </option>
                     <?php } ?>
                  </select>
              </div>
            </div>
          </div>     
          <div class="col-sm-3">                    
            <div class="form-group">
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                    <input name="date" required type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div> 
          </div>
          <div class="col-sm-2">              
            <div class="form-group">
              <button class="btn btn-info">View Report </button>
            </div>
          </div>
        </div>                     
      </form>
      </div>
    </div>

    <div class="card card-primary">
      <div class="card-body">                    
         <form method="post" action="<?= base_url() ?>invoice/sales_report">
        <div class="row">  
          <div class="col-sm-2">
            <select name="group" class="form-control">
              <option value="">Prduct Group </option>
              <option value="Robi">Robi </option>
              <option value="Airtel">Airtel </option>
            </select>
          </div>  
          <div class="col-sm-2">
            <select name="cat" class="form-control">
              <option value="">Sales Product </option>
              <option value="load">Load Sales </option>
              <option value="SIM">SIM Sales </option>
              <option value="Card">Card Sales </option>
            </select>
          </div>
          <div class="col-sm-3">                                         
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-user"></i>
                  </span>
                </div>
                  <select name="sr_id" class="form-control select2">
                     <option value=""> House </option>
                     <?php foreach ($this->Super_admin_model->all_staff() as $key => $value) { ?>
                     <option value="<?php echo $value->id; ?>"><?php echo $value->card_no; ?> - <?php echo $value->name; ?> </option>
                     <?php } ?>
                  </select>
              </div>
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
    border:1px solid gray;
    font-size: 16px;
  }

</style>

<?php 
  if($this->input->post('month')!=NULL){
    $orgDate = date("d").'-'.$this->input->post('month').'-'.date("Y");  
    $date = date("m-Y", strtotime($orgDate));  
  } else {    
    $orgDate = $this->input->post('date');  
    $date = date("d-m-Y", strtotime($orgDate));
  }
    // echo $date;  
    $group = $this->input->post('group');
    $cat = $this->input->post('cat');
    $sr_id = $this->input->post('sr_id');
  

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
<?php   if ($sr_id == NULL) {
    if($cat == 'load') { ?>
        <tr  style=" background: #d7d6d6;"> 
        <td colspan="4" style="padding: 10px"><h4 style="text-align: left;"> Report of :<b> <?php echo $group.' '.$cat ;  ?> Sales </b> </h4></td>
        <td colspan="2">Report of : <b> 
          <?php   
          echo $date;  ?> </b>
        </td>
      </tr>
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 15%;">Date</th>
        <th style="width: 20%;">Group</th>
        <th style="width: 20%;">Sales Amount</th>
        <th style="width: 10%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $bal =0;$com =0;  foreach ($this->Report_model->sales_report($group,$cat,$date) as $key => $value) { 
        $i++; 
        $bal+= $value->price;
        $com+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <td colspan="3">Total</td>
        <td><?php echo $bal; ?></td>
        <td><?php echo $com; ?></td>
        <td></td>      
      </tr>

    <!-- ==================== END LOAD Sales ========================================-->
    <?php } elseif($cat == 'SIM') { // echo $group ?>
    <!-- ====================START SIM Sales ========================================-->

    
      <tr  style=" background: #d7d6d6;">
        <td colspan="5" style="padding: 10px"><h4 style="text-align: left;"> Report of :<b> <?php echo $group.' '. $cat ;  ?> Sales  </b> </h4></td>
        <td colspan="3">Report of : <b> 
          <?php   
          echo $date;  ?> </b>
        </td>
      </tr>
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 10%;">Group</th>
        <th style="width: 15%;">Type</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $bal =0;$com =0;$qua =0;  foreach ($this->Report_model->sales_report($group,$cat,$date) as $key => $value) { 
        $i++; 
        $bal+= $value->price;
        $qua+= $value->qty;
        $com+= $value->commission;

        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td><?php echo $value->cat ?></td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <td colspan="4">Total</td>
        <td><?php echo $qua; ?></td>
        <td><?php echo $bal; ?></td>
        <td><?php echo $com; ?></td>
        <td></td>
      
      </tr>

    <!-- ====================END SIM Sales ========================================-->

    <?php } elseif($cat == 'Card') { // echo $group ?>
    <!-- ====================START CARD Sales ========================================-->
   <?php  ?>
    <?php //echo $group ?> 
    <tr  style=" background: #d7d6d6;">
        <td colspan="5" style="padding: 10px"><h4 style="text-align: left;"> Report of :<b> <?php echo $group.' '. $cat ;  ?> Sales  </b> </h4></td>
        <td colspan="3">Report of : <b> 
          <?php   
          echo $date;  ?> </b>
        </td>
      </tr>
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 5%;">Group</th>
        <th style="width: 20%;">Type</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 20%;">Remarks</th>
      </tr>
      <?php
        $i =0; $bal =0;$com =0;$qua =0;  foreach ($this->Report_model->sales_report($group,$cat,$date) as $key => $value) { 
        $i++; 
        $bal+= $value->price;
        $qua+= $value->qty;
        $com+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <td colspan="4">Total</td>
        <td><?php echo $qua; ?></td>
        <td><?php echo $bal; ?></td>
        <td><?php echo $com; ?></td>
        <td></td>
      
      </tr>

<!-- ====================END CARD Slaes ========================================-->


<!-- ====================SR Report Start ====================================-->
<?php } } else { ?> 

      <tr style="text-align: left;   background: #d7d6d6;">
        <td style="padding: 10px" colspan="5">Report of : <b> 
          <?php $sr= $this->Super_admin_model->sr_info($sr_id); 
          echo $sr->card_no.' - ' .$sr->name;  ?> </b>
        </td>
        <td colspan="3" style="padding: 10px">
          Date : <?php echo $date; ?>
        </td>
      </tr>

  <?php  if($cat == 'load') { // echo $group ?>

      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 15%;">Date</th>
        <th style="width: 20%;">Group</th>
        <th style="width: 20%;">Sales Amount</th>
        <th style="width: 10%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $bal =0;$com =0;  foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $bal+= $value->price;
        $com+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <td colspan="3">Total</td>
        <td><?php echo $bal; ?></td>
        <td><?php echo $com; ?></td>
        <td></td>      
      </tr>

    <!-- ==================== END LOAD Sales ========================================-->
  <?php } elseif($cat == 'SIM') { // echo $group ?>
    <!-- ====================START SIM Sales ========================================-->
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 10%;">Group</th>
        <th style="width: 15%;">Type</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $bal =0;$com =0;$qua =0;  foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $bal+= $value->price;
        $qua+= $value->qty;
        $com+= $value->commission;

        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td><?php echo $value->cat ?></td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <td colspan="4">Total</td>
        <td><?php echo $qua; ?></td>
        <td><?php echo $bal; ?></td>
        <td><?php echo $com; ?></td>
        <td></td>
      
      </tr>

    <!-- ====================END SIM Sales ========================================-->
 <?php } elseif($cat == 'Card') { // echo $group ?>
   
    <!-- ====================START CARD Sales ========================================-->
   <?php  ?>
    <?php //echo $group ?> 
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 5%;">Group</th>
        <th style="width: 20%;">Type</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 20%;">Remarks</th>
      </tr>
      <?php
        $i =0; $bal =0;$com =0;$qua =0;  foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $bal+= $value->price;
        $qua+= $value->qty;
        $com+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <td colspan="4">Total</td>
        <td><?php echo $qua; ?></td>
        <td><?php echo $bal; ?></td>
        <td><?php echo $com; ?></td>
        <td></td>
      
      </tr>
<?php } } 

if ($cat=="" && $sr_id == "") { ?>
      <tr style="text-align: left; background: #d7d6d6;">
        <td colspan="5" style="padding:10px"> <b> House Sales ( <?php echo $group ?>) 
         </b>
        </td>
        <td colspan="3" style="padding:10px">
          <?php echo 'Date : '. $date; ?>
        </td>
      </tr>
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 15%;">Date</th>
        <th style="width: 20%;">Group</th>
        <th style="width: 20%;">Sales Amount</th>
        <th style="width: 10%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $lbal =0;$lcom =0; $cat ='load'; foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $lbal+= $value->price;
        $lcom+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <th colspan="3">Total</th>
        <th><?php echo $lbal; ?></th>
        <th><?php echo $lcom; ?></th>
        <th></th>      
      </tr>

    <!-- ==================== END LOAD Sales ========================================-->
 </table>
 <table style="margin-top: 10px; width: 100%">
    <!-- ====================START SIM Sales ========================================-->
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 10%;">Group</th>
        <th style="width: 20%;">Type</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $sbal =0;$scom =0;$squa =0; $cat='SIM'; foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $sbal+= $value->price;
        $squa+= $value->qty;
        $scom+= $value->commission;

        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <th colspan="4">Total</th>
        <th><?php echo $squa; ?></th>
        <th><?php echo $sbal; ?></th>
        <th><?php echo $scom; ?></th>
        <th></th>
      
      </tr>

    <!-- ====================END SIM Sales ========================================-->
 
   
    <!-- ====================START CARD Sales ========================================-->
      
     <tr>
       <td style="padding: 5px;" colspan="8"></td>
     </tr>

      <?php
        $i =0; $cbal =0;$ccom =0;$cqua =0; $cat='Card';  foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $cbal+= $value->price;
        $cqua+= $value->qty;
        $ccom+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  
        <th colspan="4">Total</th>
        <th><?php echo $cqua; ?></th>
        <th><?php echo $cbal; ?></th>
        <th><?php echo $ccom; ?></th>
        <th></th>      
      </tr>
    </table>
    <table style="width: 100%; margin-top: 20px;">
       <tr>
       
        <th rowspan="2" style="width: 10%;">Total</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 20%;">Remarks</th>
      </tr>
      <tr>  
        <th><?php echo $squa+$cqua; ?></th>
        <th><?php echo $lbal+$sbal+$cbal; ?></th>
        <th><?php echo $scom+$ccom; ?></th>
        <th>Remarks</th>      
      </tr>
    </table>
    <?php } if ($cat=="" && $group == "") { ?>
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 15%;">Date</th>
        <th style="width: 20%;">Group</th>
        <th style="width: 20%;">Sales Amount</th>
        <th style="width: 10%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $lbal =0;$lcom =0; $cat ='load'; foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $lbal+= $value->price;
        $lcom+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <th colspan="3">Total</th>
        <th><?php echo $lbal; ?></th>
        <th><?php echo $lcom; ?></th>
        <th></th>      
      </tr>

    <!-- ==================== END LOAD Sales ========================================-->
 </table>
 <table style="margin-top: 10px; width: 100%">
    <!-- ====================START SIM Sales ========================================-->
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 10%;">Group</th>
        <th style="width: 15%;">Type</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $sbal =0;$scom =0;$squa =0; $cat='SIM'; foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $sbal+= $value->price;
        $squa+= $value->qty;
        $scom+= $value->commission;

        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <th colspan="4">Total</th>
        <th><?php echo $squa; ?></th>
        <th><?php echo $sbal; ?></th>
        <th><?php echo $scom; ?></th>
        <th></th>
      
      </tr>

    <!-- ====================END SIM Sales ========================================-->
 
   
    <!-- ====================START CARD Sales ========================================-->
     
     <tr>
       <td style="padding: 5px;" colspan="8"></td>
     </tr>

      <?php
        $i =0; $cbal =0;$ccom =0;$cqua =0; $cat='Card';  foreach ($this->Report_model->sales_report($group,$cat,$date,$sr_id) as $key => $value) { 
        $i++; 
        $cbal+= $value->price;
        $cqua+= $value->qty;
        $ccom+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  
        <th colspan="4">Total</th>
        <th><?php echo $cqua; ?></th>
        <th><?php echo $cbal; ?></th>
        <th><?php echo $ccom; ?></th>
        <th></th>      
      </tr>
    </table>
    <table style="width: 100%; margin-top: 20px;">
       <tr>
       
        <th rowspan="2" style="width: 10%;">Total</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 20%;">Remarks</th>
      </tr>
      <tr>  
        <th><?php echo $squa+$cqua; ?></th>
        <th><?php echo $lbal+$sbal+$cbal; ?></th>
        <th><?php echo $scom+$ccom; ?></th>
        <th>Remarks</th>      
      </tr>
    </table>

<?php } if ($cat=="") { ?>

      <tr style="text-align: left; background: #d7d6d6;">
        <td style="padding: 10px;" colspan="4">Sales Report of : <b> <?php echo $group ?> </b></td>
        <td style="padding: 10px;" colspan="3">Date : <?php echo $date ?></td>
      </tr>

      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 15%;">Date</th>
        <th style="width: 20%;">Group</th>
        <th style="width: 20%;">Sales Amount</th>
        <th style="width: 10%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $lbal =0;$lcom =0; $cat ='load'; foreach ($this->Report_model->sales_report($group,$cat,$date) as $key => $value) { 
        $i++; 
        $lbal+= $value->price;
        $lcom+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <th colspan="3">Total</th>
        <th><?php echo $lbal; ?></th>
        <th><?php echo $lcom; ?></th>
        <th></th>      
      </tr>

    <!-- ==================== END LOAD Sales ========================================-->
 </table>
 <table style="margin-top: 10px; width: 100%">
    <!-- ====================START SIM Sales ========================================-->
      <tr>
        <th style="width:5%">SL</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 10%;">Group</th>
        <th style="width: 15%;">Type</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 40%;">Remarks</th>
      </tr>
      <?php
        $i =0; $sbal =0;$scom =0;$squa =0; $cat='SIM'; foreach ($this->Report_model->sales_report($group,$cat,$date) as $key => $value) { 
        $i++; 
        $sbal+= $value->price;
        $squa+= $value->qty;
        $scom+= $value->commission;

        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  

        <th colspan="4">Total</th>
        <th><?php echo $squa; ?></th>
        <th><?php echo $sbal; ?></th>
        <th><?php echo $scom; ?></th>
        <th></th>
      
      </tr>

    <!-- ====================END SIM Sales ========================================-->
 
   
    <!-- ====================START CARD Sales ========================================-->
     
     <tr>
       <td style="padding: 5px;" colspan="8"></td>
     </tr>
      <?php
        $i =0; $cbal =0;$ccom =0;$cqua =0; $cat='Card';  foreach ($this->Report_model->sales_report($group,$cat,$date) as $key => $value) { 
        $i++; 
        $cbal+= $value->price;
        $cqua+= $value->qty;
        $ccom+= $value->commission;
        ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->date ?></td>
        <td><?php echo $value->group ?></td>
        <td>
          <?php
          $pid = $value->pid;
          $product = $this->Super_admin_model->product_info($pid);
           echo $product->name; 
           ?>
          
        </td>
        <td><?php echo $value->qty ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->commission ?></td>
        <td><?php echo $value->remarks ?></td>
      </tr>
      <?php } ?>
      <tr>  
        <th colspan="4">Total</th>
        <th><?php echo $cqua; ?></th>
        <th><?php echo $cbal; ?></th>
        <th><?php echo $ccom; ?></th>
        <th></th>      
      </tr>
    </table>
    <table style="width: 100%; margin-top: 20px;">
       <tr>
       
        <th rowspan="2" style="width: 10%;">Total</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 15%;">Sales Amount</th>
        <th style="width: 15%;">Commission</th>
        <th style="width: 20%;">Remarks</th>
      </tr>
      <tr>  
        <th><?php echo $squa+$cqua; ?></th>
        <th><?php echo $lbal+$sbal+$cbal; ?></th>
        <th><?php echo $scom+$ccom; ?></th>
        <th>Remarks</th>      
      </tr>
    </table>
<?php } ?>
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
  </div>
</div>