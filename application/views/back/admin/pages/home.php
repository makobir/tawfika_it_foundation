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
    <!-- ./col -->
<div class="card card-primary" style="margin-top: 20px; width: 100%;">
  <div class="card-body"> 
    <div class="row">  
      <div class="col-sm-4">
        <div class="card card-primary">
          <div class="card-header">
            Balance on Wallet : 
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $disbursed = $this->Wallet_model->disbursed(); 
              $admin_balance = $this->Wallet_model->wallet_balance(); 
              $recharged_balance = $this->Wallet_model->recharged_wallet_balance(); 

              echo ($admin_balance->amount + $recharged_balance->amount ) - $disbursed->amount; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="card card-success">
          <div class="card-header">
            Wallet Balance Used : 
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
          </div>
          <div class="card-body">
            <h2> 
              <?php  
              $marchent_payments = $this->Wallet_model->marchent_payments(); 
              $total_earnings = $this->Wallet_model->total_earnings(); 
              echo $total_earnings->amount + $marchent_payments->amount; 
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
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $total_expanse = $this->Wallet_model->total_expanse(); 
              echo $total_earnings->amount + $marchent_payments->amount - $total_expanse->debit; 
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
              $earning = $total_earnings->amount + $marchent_payments->amount;
              $expanse = $total_expanse->debit;
              $credit = $total->credit;             
              echo  $earning + $credit - $expanse; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    