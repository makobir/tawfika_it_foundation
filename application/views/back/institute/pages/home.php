<div class="col-sm-12" style="margin: 0px 0px 10px 0px; background : #c0e13a; font-size: 16pt; font-weight:bold;">
  <marquee s> <?php $site = $this->Authenticator_model->setting_data();
   echo 'Welcome '. $site->site_name ; ?> </b>
 </marquee>
</div>
<div class="col-sm-12">
  <div class="card card-default">
    <div class="row">
      <div class="col-sm-2">
          <img class="img-responsive" width="100%" src="<?= base_url()?>upload/user/<?= $this->session->userdata('userfile');?>">
      </div>
      <div class="col-sm-4" style="padding: 15px">
        Director Name : <strong><?= $this->session->userdata('name'); ?></strong> <br>
        Mobile : <strong><?= $this->session->userdata('mobile'); ?></strong><br>
        Email : <strong><?= $this->session->userdata('email'); ?></strong><br>
        Affiliation Status : <strong>Operational</strong>
      </div>
      <div class="col-sm-6">
          <div class="card card-primary" style="width: 100%">
            <div class="card-header">
              Notice from TIF
            </div>
            <div class="card-body">
              Dear Affiliate, We are updating our software, Please feel free to talk about any system issue to  <b> <a href="tel:+8801713576258">+8801713576258</a> </b> . <br> For approval <b><a href="tel:+8801716339782">+8801716339782</a></b>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<?php  $due = $this->Institute_model->dues(); if ($site->payment_id == NULL || $due->amount > 1 ) { ?>
<div class="col-sm-12">
  <div class="card card-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-1" style="font-size:20px; border-right: 2px solid green;">
          Task
        </div>
        <div class="col-sm-11" style="font-size:16px;">
          <?php if ($site->payment_id == NULL ) { ?> <a href="<?= base_url() ?>wallet/payfee">Registration Fee Payment </a> <?php } ?> | 
          <?php 
              $due = $this->Institute_model->dues();
              if($due->amount > 1) { ?>    
          <a href="<?= base_url(); ?>wallet/payfee"> Formfillup Fee Payments  </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="col-sm-12">
  <div class="card card-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4" style="font-size:20px;">
          Wallet Balance : <strong><?php 
        $payments = $this->Wallet_model->payments(); 
        $paymentsa = $this->Wallet_model->paymentsa(); 
        $balance = $this->Wallet_model->balance(); echo $balance->amount-($payments->amount+$paymentsa->amount); 
        ?></strong>TK <a class="btn btn-default" href="<?= base_url() ?>wallet/recharge">Refil Now</a>
        </div>
        <div class="col-sm-4" style="font-size:20px;">
          <?php 
              $due = $this->Institute_model->dues();             
              if($due->amount > 1) { ?>
              Payment Due : <strong>
              <?php  echo $due->amount; ?>
              </strong> 
             <a class="btn btn-primary" href="<?= base_url(); ?>wallet/payfee">Pay Now</a>
          <?php } ?>
        </div>
        <div class="col-sm-4">
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3>
        <?php echo $this->Institute_model->total_trainee(); ?>         
      </h3>
      <p>My Enrolled Trainee</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
  </div>
</div>
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>
        <?php echo $this->Institute_model->exam_enroll(); ?>
      </h3>
      <p>Total Enrolled Examinee</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>
        <?php echo $this->Institute_model->exam_passed(); ?>
      </h3>
      <p>Passed Examinee</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3>
        <?php          
          $fee = $this->Accounts_model->admissionfeepaid(); echo $fee->amount; 
          ?>TK
      </h3>
      <p>Formfillup Fee paid</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="card card-primary" style="width:100%;">
  <div class="card card-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4" style="font-size:20px;">
          Admission Fee : <strong><?php          
          $fee = $this->Accounts_model->admissionfee(); 
          $total = $fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical;
          echo $total; 
          ?></strong>TK <a class="btn btn-default" href="<?= base_url() ?>accounts/balance_sheet">Check Now</a>
        </div>
        <div class="col-sm-4" style="font-size:20px;">
          Fee Collected : <strong>
            <?php 
              $collected = $this->Accounts_model->admissionfeecollected(); echo $collected->amount; 
            ?>
              
            </strong>  <a class="btn btn-default" href="<?= base_url(); ?>accounts/balance_sheet">Check Now</a>
        </div>
        <div class="col-sm-4" style="font-size:20px;">          
          Collection Due : <strong>
            <?php 
              echo $total - $collected->amount;
            ?>              
            </strong>  <a class="btn btn-default" href="<?= base_url(); ?>accounts/due">Check Now</a>
        </div>
      </div>
    </div>
  </div>
</div>