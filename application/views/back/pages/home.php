<div class="col-sm-12" style="margin-top: 10px;">
  <marquee> <?php $site = $this->Authenticator_model->setting_data();
   echo 'Welcome '. $this->session->userdata('name') . ' <b>'. $site->site_name ; ?> </b></marquee>
</div>

<!-- 
<div class="col-sm-12">
  <div class="card card-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4" style="font-size:20px;">
          Wallet Balance : <strong>15000</strong> <a class="btn btn-default" href="">Refil Now</a>
        </div>
        <div class="col-sm-4" style="font-size:20px;">
          Payment Due : <strong>
            <?php 
             // $due = $this->Institute_model->dues();
             // echo $due->amount;
            ?>
              
            </strong>  <a class="btn btn-primary" href="<?= base_url(); ?>wallet/payfee">Pay Now</a>
        </div>
        <div class="col-sm-4">
          
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- ./col -->
<div class="card card-primary" style="width:100%">
  <div class="row card-body">
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3> <?php echo $this->Super_admin_model->totalcenters(); ?>  </h3>
          <p> Total Training Centers <p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>
            <?php echo $this->Super_admin_model->total_trainee(); ?>       
          </h3>
          <p>Total Trainee</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>
            <?php echo $this->Super_admin_model->exam_enrolled(); ?>  </h3>
          <p> Exam Enrolled <p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if($this->session->userdata('usertype') == 'super_admin') { ?>

    <!-- ./col -->
<div class="card card-primary" style="margin-top: 20px; width: 100%;">
  <div class="card-body"> 
    <div class="row">  
      <div class="col-sm-4">
        <div class="card card-primary">
          <div class="card-header">
            Institute Balance: 
            <span style="border: 1px solid white; padding:1px 10px; border-radius:5px;" class="float-right"> 
              <a href="<?= base_url() ;?>wallet/balance_sheet">View</a>  
            </span>
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $disbursed = $this->Wallet_model->disbursed(); 

              $admin_balance = $this->Wallet_model->wallet_balance(); 
              $recharged_balance = $this->Wallet_model->recharged_wallet_balance(); 
              $starting = $this->Wallet_model->starting_wallet_balance(); 
              $referral = $this->Wallet_model->referral_wallet_balance(); 
              $referral_c = $this->Wallet_model->referral_continues_wallet_balance(); 

              echo ($admin_balance->amount + $recharged_balance->amount+$starting->amount+$referral->amount+$referral_c->amount ) - $disbursed->amount; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="card card-success">
          <div class="card-header">
            Wallet Used : 
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $disbursed = $this->Wallet_model->disbursed(); 
              echo $disbursed->amount; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-info">
          <div class="card-header">
            Wallet Funded by Admin (Debit): 
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              echo $admin_balance->amount; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-success">
          <div class="card-header">
            Total Earnings :
            <span style="border: 1px solid white; padding:1px 10px; border-radius:5px;" class="float-right"> 
              <a href="<?= base_url() ;?>super_admin/total_earnings">View</a>  </span>
          </div>
          <div class="card-body">
            <h2> 
              <?php  
              $marchent_payments = $this->Wallet_model->marchent_payments(); 
              $wallet_payments = $this->Wallet_model->wallet_payments_all(); 
              $total_earnings = $this->Wallet_model->total_earnings();


              echo $wallet_payments->amount+$marchent_payments->amount; 
              // $total_earnings = $this->Wallet_model->total_earnings(); 
               
              // echo $total_earnings->amount +  $marchent_payments->amount; 
              ?> TK
            </h2>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-danger">
          <div class="card-header">
            Total Expanse: 
            <span style="border: 1px solid white; padding:1px 10px; border-radius:5px;" class="float-right"> 
              <a href="<?= base_url() ;?>super_admin/total_expanse">View</a>  
            </span>
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $total_expanse = $this->Wallet_model->total_expanse(); 
              echo $total_expanse->debit; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-dark">
          <div class="card-header">
            Account Balance: 
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $total = $this->Wallet_model->account_balance();
              $earning = $total_earnings->amount ;
              $expanse = $total_expanse->debit;
              $credit = $total->credit;             
              echo  ($wallet_payments->amount + $credit + $marchent_payments->amount) - ($expanse); 
              ?> TK 
            </h2>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-info">
          <div class="card-header">
            Charity Fund: 
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $total = $this->Wallet_model->charity_fund_balance();
              echo  $total->amount ; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
<?php } ?>