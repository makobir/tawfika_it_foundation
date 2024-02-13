
<div class="card card-primary" style="margin-top: 20px; width: 100%;">
  <form method="post" action="<?= base_url() ?>Wallet/pay">
  <div class="card-body"> 
    <div class="row">   
      <div class="col-sm-5">
        <b> <?php echo $center->site_name;?>'s</b> balance Now : <strong style="color:green;">
        <?php 
        echo $approved_balance->amount-$wallet_payments->amount; 
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