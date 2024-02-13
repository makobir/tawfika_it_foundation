
<script>
$(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
           $("#sim").hide();
           $("#card").hide();
        $("#load").show();
      }
      else  if ( this.value == '2')
      {
          $("#load").hide();
          $("#card").hide();
        $("#sim").show();
      }
      else  if ( this.value == '3')
      {
          $("#load").hide();
          $("#sim").hide();
        $("#card").show();
      }
       else  
      {
        $("#load").hide();
        $("#sim").hide();
        $("#card").hide();
      }
    });
});
</script>
        
<div class="card card-primary" style="margin-top: 20px; width: 100%;">
  <div class="card-body"> 
  <form method="post" action="<?= base_url() ?>purchase/addToCart">
 <!--  <form method="post" action="<?= base_url() ?>purchase/purchase">  -->
    <div class="row">   
      <div class="col-sm-5">
        <h4>Your Total Billable amount is : 
          <strong>
            <?php 
              $due = $this->Institute_model->dues();
              echo $due->amount;
            ?>
          </strong> TK
        </h4>
      </div>   
      <div class="col-sm-2">
        
      </div>
      <div class="col-sm-5 text-right">
        Your wallet balance : <strong> <?php 
        $payments = $this->Wallet_model->payments(); 
        $paymentsa = $this->Wallet_model->paymentsa(); 
        $balance = $this->Wallet_model->balance(); echo $balance->amount-($payments->amount+$paymentsa->amount); 
        ?></strong> TK <a href="<?= base_url() ?>wallet/recharge" class="btn btn-info">Recharge Wallet Now</a>
      </div>  
      <hr style="border: 1px solid black; width:100%;">

      <div class="col-sm-12">
        <table class="table table-striped table-bordered">
          <tr>
            <td>For</td>
            <td>Examinee</td>
            <td>Amount</td>
            <td>Remarks</td>
            <td>Action</td>
          </tr>
          <?php foreach ($this->Institute_model->alldues() as $key => $value): ?>

          <tr>
            <td><?= $value->for; ?></td>
            <td><?= $value->examinee; ?></td>
            <td><?= $value->amount; ?></td>
            <td><?= $value->remarks; ?></td>
            <td>
              <a class="btn btn-default" href="#">Pay From Wallet</a> 
              <a class="btn btn-primary" href="<?= base_url() ?>wallet/paynow/<?= $value->sl; ?>">Pay Now</a>
            </td>
          </tr> 
          <?php endforeach ?>
        </table>
      </div>


<div class="col-sm-12 text-center" style="color:red;">
  Pending for Approval :<?php $pending = $this->Wallet_model->pending_approval(); echo $pending->amount;?> BDT
</div>

<!--

      <div class="col-sm-3">
        <div class="form-group">
          <select id='purpose' name="product" class="form-control">
             <option value="0">Payment Method</option>
             <option value="1">Payment Gateway</option>
             <option value="2">Marchent Payment</option>
             <option value="3">From Wallet</option>
          </select>
        </div>
      </div> 
      <div class="col-sm-9" style='display:none;' id='load'>  
        <div class="row">
          <div class="col-sm-4">
            Amount : 10000 TK
          </div>
          <div class="col-sm-4">                                                      
            <div class="form-group">                        
              <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
          </div>
        </div>     
      </div>
      <div class="row col-sm-9" style='display:none;' id='sim'>
        <div class="col-sm-3">                
          <div class="form-group">                        
            <input autocomplete="false" name="amount" class="form-control" placeholder="Mobile Number">
          </div>
        </div>
        <div class="col-sm-3">                
          <div class="form-group">                        
            <input autocomplete="false" name="amount" class="form-control" placeholder="Amount">
          </div>
        </div>
        <div class="col-sm-3">                
          <div class="form-group">                        
            <input autocomplete="false" name="sserial" class="form-control" placeholder="TNX ID">
          </div>
        </div>
        <div class="col-sm-3">                
          <div class="form-group">                        
           <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <div class="col-sm-12" >
          <div class="row">
            <div class="col-sm-8">
              <ol>
                <li> Go to your bKash Mobile Menu by dialing *247#</li>
                <li> Choose “Payment”</li>
                <li> Enter the Merchant bKash Account Number <strong>01713576258</strong> </li>
                <li> Enter the amount you want to pay</li>
                <li> Enter ( <strong><?php echo $this->session->userdata('code'); ?> </strong>) a reference* against your payment </li>
                <li> Enter the Counter Number 1</li>
                <li>Now enter your bKash Mobile Menu PIN to confirm</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-9" style='display:none;' id='card'>  
        <div class="row">
          <div class="col-sm-4">
            Wallet Balance : 10000 TK
          </div>
          <div class="col-sm-4">                                                      
            <div class="form-group">                        
              <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
          </div>
        </div>     
      </div> -->
    </div>
  </form>
</div>
              