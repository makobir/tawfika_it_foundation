<style type="text/css">
	.select2-selection__arrow {
    	height: 35px !important;
	}
</style>
<div class="card card-default" style="width:100%; padding: 20px">
  <div class="card card-success">
    <div class="card-header">
      <span style="font-size:25px;">This Month</span >
      <button class="btn btn-default float-right"> <a style="color:green;" href="<?php echo base_url(); ?>accounts/report">Print Report </a></button>
    </div>
    <div class="card-body">
      <div class="row">
      <!--   <div class="col-sm-2" style="font-size:20px;">
          Admission Fee : <br> <strong><?php
          $date = date('m-Y');          
          $fee = $this->Accounts_model->admissionfeedate($date); 
          $total = $fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical;
          echo $total; 
          ?></strong>
        </div> -->
        <div class="col-sm-3" style="font-size:20px;">
          Fee Collected :<br>  <strong>
            <?php 
              $collected = $this->Accounts_model->admissionfeecollecteddate($date); echo $collected->amount; 
            ?>
              </strong>
        </div>
        <div class="col-sm-3" style="font-size:20px;">          
          Others Income:<br>  <strong>
            <?php 
              $others = $this->Accounts_model->others_income($date);
              echo $others->credit;
            ?>              
           </strong>
        </div>
    <!--     <div class="col-sm-2" style="font-size:20px;">          
          Collection Due :<br>  <strong>
            <?php 
              echo $total - $collected->amount;
            ?>              
           </strong>
        </div> -->
        <div class="col-sm-3" style="font-size:20px;">          
          Debit: <br> <strong>
            <?php 
              echo $others->debit;
            ?>              
           </strong>
        </div>
        <div class="col-sm-3" style="font-size:20px;">          
          Balance: <br> <strong>
            <?php 
              
              echo ($others->credit+$collected->amount) - $others->debit;
            ?>              
           </strong>
        </div>
      </div>
    </div>
  </div>


  <div class="card card-primary">
    <div class="card-header">      
      <span style="font-size:25px;">This Year</span >
      <button class="btn btn-default float-right"> <a style="color:green;" href="<?php echo base_url(); ?>accounts/report">Print Report </a></button>
    </div>
    <div class="card-body">
      <div class="row">
        <!-- <div class="col-sm-2" style="font-size:20px;">
          Admission Fee : <br> <strong><?php
          $date = date('Y');          
          $fee = $this->Accounts_model->admissionfeedate($date); 
          $total = $fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical;
          echo $total; 
          ?></strong>
        </div> -->
        <div class="col-sm-3" style="font-size:20px;">
          Fee Collected :<br>  <strong>
            <?php 
              $collected = $this->Accounts_model->admissionfeecollecteddate($date); echo $collected->amount; 
            ?>
              </strong>
        </div>
        <div class="col-sm-3" style="font-size:20px;">          
          Others Income:<br>  <strong>
            <?php 
              $others = $this->Accounts_model->others_income($date);
              echo $others->credit;
            ?>              
           </strong>
        </div>
        <!-- <div class="col-sm-2" style="font-size:20px;">          
          Collection Due :<br>  <strong>
            <?php 
              echo $total - $collected->amount;
            ?>              
           </strong>
        </div> -->
        <div class="col-sm-3" style="font-size:20px;">          
          Debit: <br> <strong>
            <?php 
              echo $others->debit;
            ?>              
           </strong>
        </div>
        <div class="col-sm-3" style="font-size:20px;">          
          Balance: <br> <strong>
            <?php 
              
              echo ($others->credit+$collected->amount) - $others->debit;
            ?>              
           </strong>
        </div>
      </div>
    </div>
  </div>

  <div class="card card-info">
    <div class="card-header">      
      <span style="font-size:25px;">Lifetime</span >
      <button class="btn btn-default float-right"> <a style="color:green;" href="<?php echo base_url(); ?>accounts/report">Print Report </a></button>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2" style="font-size:20px;">
          Admission Fee : <br> <strong><?php
          $date = date('');          
          $fee = $this->Accounts_model->admissionfeedate($date); 
          $total = $fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical;
          echo $total; 
          ?></strong>
        </div>
        <div class="col-sm-2" style="font-size:20px;">
          Fee Collected :<br>  <strong>
            <?php 
              $collected = $this->Accounts_model->admissionfeecollecteddate($date); echo $collected->amount; 
            ?>
              </strong>
        </div>
        <div class="col-sm-2" style="font-size:20px;">          
          Others Income:<br>  <strong>
            <?php 
              $others = $this->Accounts_model->others_income($date);
              echo $others->credit;
            ?>              
           </strong>
        </div>
        <div class="col-sm-2" style="font-size:20px;">          
          Collection Due :<br>  <strong>
            <?php 
              echo $total - $collected->amount;
            ?>              
           </strong>
        </div>
        <div class="col-sm-2" style="font-size:20px;">          
          Debit: <br> <strong>
            <?php 
              echo $others->debit;
            ?>              
           </strong>
        </div>
        <div class="col-sm-2" style="font-size:20px;">          
          Balance: <br> <strong>
            <?php               
              echo ($others->credit+$collected->amount) - $others->debit;
            ?>              
           </strong>
        </div>
      </div>
    </div>
  </div>
</div>