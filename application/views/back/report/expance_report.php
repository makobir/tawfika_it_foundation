<div class="row no-print" style="width: 100%">
 <div class="col-sm-12"> 
    <div class="card card-primary">
      <div class="card-body">                    
         <form method="post" action="<?= base_url() ?>super_admin/expance_report">
        <div class="row"> 
          <div class="col-sm-4">                    
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

          <div class="col-sm-4">                    
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
   // $type = $this->input->post('type');
   //$sr_id = $this->input->post('sr_id');

?>

<style type="text/css">
  .body >tr,td,th {
    border:1px solid gray !important; 
  }
</style>



<div class="container" style="text-align: center; width: 100%">
  <table class="head" width="100%" >
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

  <table class="body" style="margin-left: 0px; width: 100%">
                  <tr>
                    <th width="10%">SL</th>
                    <th>Category</th>
                    <th>Amount</th>
                  </tr>
                  <?php $i = 0; foreach ($this->Super_admin_model->disbursment_list() as $key => $value) { $i++?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td style="text-align: left; padding-left: 20px;"><?php echo $value->title ; ?></td>
                    <td>
                      <?php
                      $id = $value->id ; 
                      foreach ($this->Super_admin_model->total_disbursment($id,$date) as $key => $amount) { } $am = ($amount->debit);
                      echo number_format($am,2); ?> ৳
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <th colspan="2"> Total</th>
                    <th> <?php 
                    $bal = 0;  foreach ($this->Super_admin_model->total_disburs($date) as $key => $va) { }
                    $bal+= $va->debit;
                    echo number_format($bal,2); ?></th>
                  </tr>
                  <tr>
                    <td colspan="3" class="no-print">
                      <button class="btn  btn-primary"> View details </button>
                    </td>
                  </tr>
                </table>
          </table>
          <table width="100%" style="margin-top: 100px; border:none !important">
            <tr style="border:none !important">
              <td style="border:none !important; border-top: 1px solid black !important"><b>DSR </b> <br> SIgnature</td>
              <td style="border:none !important" width="10%"></td>    
              <td style="border:none !important; border-top: 1px solid black !important"><b>Supervisor </b> <br> SIgnature</td>    
              <td style="border:none !important" width="10%"></td> 
              <td style="border:none !important; border-top: 1px solid black !important"><b>DH Manager </b> <br> SIgnature</td>    
              <td style="border:none !important" width="10%"></td> 
              <td style="border:none !important; border-top: 1px solid black !important"><b>Accountant </b> <br> SIgnature</td>
            </tr>
          </table>
          <div style="margin: 20px 0px; text-align: right;">
            Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>
          </div>
          <button style="margin: 50px" class=" btn btn-primary no-print" onclick="window.print()">Print this page</button>
</div>