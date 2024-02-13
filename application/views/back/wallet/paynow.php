<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#Ultra').on('change', function() {
      if ( this.value == 'gateway')
      //.....................^.......
      {
           $("#sim").hide();
           $("#card").hide();
        $("#load").show();
      }
      else  if ( this.value == 'marchent')
      {
          $("#load").hide();
          $("#card").hide();
        $("#sim").show();
      }
      else  if ( this.value == 'wallet')
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
    <div class="row">   
      <div class="col-sm-5">
        <h4>Your payable amount is : 
          <strong>
            <?php 
              echo $info->amount;
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
      <input type="hidden" name="payment_id" value="<?= $info->sl; ?>">
      <div class="col-sm-3">
        <div class="form-group">
          <select name="method" class="form-control" id="Ultra" onchange="run()" >
             <option value="0">Payment Method</option>
             <option value="gateway">Payment Gateway</option>
             <option value="marchent">Marchent Payment</option>
             <option value="wallet">From Wallet</option>
          </select>
        </div>
      </div> 
      <div class="col-sm-9" style='display:none;' id='load'>
        <input type="hidden" id="srt" name="method" placeholder="get value on option select">
        <div class="row">
          <div class="col-sm-4">                                                      
            <div class="form-group">                        
               <button class="btn btn-primary">Pay Now</button> 
            </div>
          </div>
        </div>     
      </div>
      <form method="post" action="<?= base_url() ?>Wallet/pay">
      <div class="row col-sm-9" style='display:none;' id='sim'>    
        <?php if ($info->for == 'Institute Registration') { ?>          
        <input type="hidden" name="for" value="<?php echo $info->for; ?>">
        <?php } ?>
        <input type="hidden" name="payment_id" value="<?php echo $info->sl; ?>">
        <input type="hidden" id="srt2" name="method" placeholder="get value on option select">
        <div class="col-sm-3">                
          <div class="form-group">                        
            <input autocomplete="false" name="mobile" class="form-control" placeholder="Mobile Number"  minlength="11" maxlength="11" required>
          </div>
        </div>
        <div class="col-sm-3">                
          <div class="form-group">                        
            <input hidden autocomplete="false" name="amount" class="form-control" value="<?php echo $info->amount; ?>" placeholder="Amount" required >
            <input disabled="" autocomplete="false" name="" class="form-control" value="<?php echo $info->amount; ?>" placeholder="Amount"  >

          </div>
        </div>
        <div class="col-sm-3">                
          <div class="form-group">                        
            <input autocomplete="false" name="tnx" id="tnx" class="form-control" placeholder="TNX ID" required>
                  <span id="result"></span> 
          </div>
        </div>
        <div class="col-sm-3">                
          <div class="form-group">                        
           <button type="submit" class="btn btn-primary">Confirm Now</button>
          </div>
        </div>
        </form>
        <div class="col-sm-12" >
          <div class="row">
            <div class="col-sm-12">
             <ol>
              <li>
                <a href="https://shop.bkash.com/towfika-computer-training-cent/paymentlink" target="_blank">bKash Online Payment Link</a>
              </li>
              <li>OR</li>
             <li> Go to your Mobile Menu by dialing *247# / *167# / *322#</li>
             <li> Choose “Payment”</li>
             <li> Enter the Merchant bKash / Nagad / Rocket Marchent Number <strong>01910 108378</strong> </li>
             <li>Or</li>
             <li> Enter the Merchant bKash / Nagad Personal  Number <strong>01793 041355</strong> </li>
             <li> Enter Rocket Personal  Number <strong>01963 105328</strong> </li>
             <li> Enter the amount you want to pay</li>
             <li> Enter ( <strong><?php echo $this->session->userdata('icode'); ?> </strong>) a reference* against your payment </li>
             <li> Enter the Counter Number 1</li>
             <li> Now enter your bKash Mobile Menu PIN to confirm</li>
             </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-9" style='display:none;' id='card'> 
      <form method="post" action="<?= base_url() ?>wallet/payfromwallet"> 
        <?php if ($info->for == 'Course Registration') { ?>          
        <input type="hidden" name="for" value="<?php echo $info->for; ?>">
        <?php } ?>
        <?php if ($info->for == 'Form Fillup') { ?>          
        <input type="hidden" name="for" value="<?php echo $info->for; ?>">
        <?php } ?>
        <input type="hidden" id="srt3" name="method" placeholder="get value on option select">
        <input type="hidden" name="payment_id" value="<?php echo $info->sl; ?>">
        <input type="hidden" name="amount" value="<?php echo $info->amount; ?>">
        <div class="row">
          <div class="col-sm-4">
            After Payment balance will be : <?php echo ($balance->amount-($payments->amount+$paymentsa->amount)) - $info->amount; ?> TK
          </div>
          <div class="col-sm-4">                                                      
            <div class="form-group">                        
              <button type="submit" class="btn btn-primary" <?php if ($balance->amount < $info->amount) {echo 'disabled'; } ?>>Pay Now</button>
            </div>
          </div>
        </div>   
        </form>  
      </div>
    </div>
</div>
              

<script>
    function run() {
        document.getElementById("srt").value = document.getElementById("Ultra").value;
        document.getElementById("srt2").value = document.getElementById("Ultra").value;
        document.getElementById("srt3").value = document.getElementById("Ultra").value;
    }
</script> 



<script> 
 $(document).ready(function(){  
      $('#tnx').change(function(){  
           var tnx = $('#tnx').val();  
           if(tnx != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>authenticator/tnx_avalibility",  
                     method:"POST",  
                     data:{tnx:tnx},  
                     success:function(data){  
                          $('#result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  