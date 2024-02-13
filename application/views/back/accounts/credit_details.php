<div class="row no-print" style="width: 100%">
   <div class="col-sm-12">
      <div class="card card-primary">
         <div class="card-body">
            <form method="post" action="<?= base_url() ?>accounts/report">
               <div class="row">
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
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                              </span>
                           </div>
                           <select name="myear" class="form-control">
                              <option value="">Select Year</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-1" style="text-align: center; margin-top: 5px; font-weight: bold;">
                     <div class="form-group">OR
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                              </span>
                           </div>
                           <select name="year" class="form-control">
                              <option value="">Select Year</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
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
   font-size: 18px;
   }
</style>
<?php 
   if ($this->input->post('date') != NULL) {
     $orgDate = $this->input->post('date');  
     $date = date("d-m-Y", strtotime($orgDate));  
   } elseif($this->input->post('month') != NULL) {
   $orgDate = date("d").'-'.$this->input->post('month').'-'.date("Y");  
   $date = date("m-Y", strtotime($orgDate)); 
   } elseif($this->input->post('year') != NULL) { 
      $date = $this->input->post('year');
   }else {
     $date = 0;
   }
  
   ?>
<div class="container" style="text-align: center; width: 100%;">
   <div class="row">
      <div class="col-sm-2">                  
         <img width="150px" src="<?= base_url() ?>upload/logo/<?= $site->userfile; ?>">
      </div>
      <div class="col-sm-8">
         <address>
           <strong style="font-size:25px;"><?= $site->site_name; ?></strong><br>
           <?= $site->address; ?> <br>
           <?= $site->district; ?><br>
           Phone: <?= $site->mobile; ?><br>
           Email: <?= $site->email; ?>
         </address>
      </div>
      <div class="col-sm-2">         
         <button style="margin: 50px" class="no-print btn btn-primary">Details</button>
      </div>
      <div class="col-sm-12">
         <h3>Accounts summery of : <b> <?php echo $date; ?> </b></h3>
      </div>
   </div>

   <table style="margin-left: 0px; width: 100%; font-size: 29px;">
      <!-- ====================START LOAD Sales ========================================-->
      <tr  style=" background: #d7d6d6;">
         <td colspan="4" style="font-weight: bold;font-size: 20px;">
            Lose / Profit
         </td>
      </tr>
      <tr>
         <th style="width:5%">SL</th>
         <th style="width:35%">Source</th>
         <th style="width: 15%;">Total</th>
         <th style="width: 35%;">Remarks</th>
      </tr>
      <tr>
         <td>1</td>
         <td>Income From Trainee </td>
         <td>        
            <?php $income = $this->Accounts_model->total_income($date); 
              echo $income->amount;
            ?> ৳
         </td>
         <td></td>
      </tr>
      <tr>
         <td>2</td>
         <td>Others Income </td>
         <td>     
                    
            <?php $credit = $this->Accounts_model->total_expence($date); 
              echo $credit->credit;
            ?> ৳
         </td>
         <td></td>
      </tr>
      <tr>
         <td>3</td>
         <td>Total Expanse </td>
         <td>     
                    
            <?php $debit = $this->Accounts_model->total_expence($date); 
              echo $debit->debit;
            ?> ৳
         </td>
         <td></td>
      </tr>
      <tr>
         <td colspan="2">Net Profit</td>
         <td>        
            <?php 
              echo $credit->credit+$income->amount - $debit->debit;
            ?> ৳
         </td>
         <td></td>
      </tr>
   </table>
   <table width="100%" style="margin-top: 100px; border:none !important; text-align: center;">
      <tr style="border:none !important">
         <td style="border:none !important; border-top: 1px solid black !important"><b>Accountant </b> <br> Signature</td>
         <td style="border:none !important" width="10%"></td>
         <td style="border:none !important; border-top: 1px solid black !important"><b></b> <br> </td>
         <td style="border:none !important" width="10%"></td>
         <td style="border:none !important; border-top: 1px solid black !important"><b> </b> <br> </td>
         <td style="border:none !important" width="10%"></td>
         <td style="border:none !important; border-top: 1px solid black !important"><b>Director </b> <br> Signature</td>
      </tr>
   </table>
   <div style="margin: 20px 0px; text-align: right;">
      Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>
   </div>
   <button style="margin: 50px" class="no-print btn btn-primary" onclick="window.print()">Print this page</button>
</div>