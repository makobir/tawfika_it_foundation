
<?php if($this->session->userdata('usertype') == 'branch') { ?>         
<div class="card card-primary" style="margin-top: 20px; width: 100%;">
  <form method="post" action="<?= base_url() ?>Wallet/pay">
  <div class="card-body"> 
    <div class="row">   
      <div class="col-sm-5">
        Your wallet balance : <strong style="color:green;">
        <?php 
        $payments = $this->Wallet_model->payments(); 
        $paymentsa = $this->Wallet_model->paymentsa(); 
        $balance = $this->Wallet_model->balance(); echo $balance->amount-($payments->amount+$paymentsa->amount); 
        ?>
        </strong> TK <a href="<?= base_url() ?>wallet/recharge" class="btn btn-info">Recharge Wallet Now</a>
      </div> 
      <div class="col-sm-5">
        Pending for clearence : <strong style="color:red;">
          <?php $balance = $this->Wallet_model->clearence(); echo $balance->amount; ?>
        </strong> TK 
      </div>   
      <hr style="border: 1px solid black; width:100%;">
    </div>
  </div>
</form>
</div>

<?php } if($this->session->userdata('usertype') == 'super_admin') { ?>  
     
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
            Net Earnings :
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $total_earnings = $this->Wallet_model->total_earnings(); 
              $marchent_payments = $this->Wallet_model->marchent_payments(); 
              echo $total_earnings->amount +  $marchent_payments->amount; 
              ?> TK
            </h2>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-danger">
          <div class="card-header">
            Total Earnings: 
          </div>
          <div class="card-body">
            <h2> 
              <?php 
              $total_earnings = $this->Wallet_model->total_earnings(); 
              echo $total_earnings->amount + $marchent_payments->amount; 
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
              echo $total->credit - $total->debit; 
              ?> TK 
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<?php } ?>