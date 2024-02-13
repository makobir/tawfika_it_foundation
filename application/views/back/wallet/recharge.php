
<script>
$(document).ready(function(){
    $('#Ultra').on('change', function() {
      if ( this.value == 'gateway')
      //.....................^.......
      {
           $("#marchent").hide();
           $("#wallet").hide();
        $("#load").show();
      }
      else  if ( this.value == 'marchent')
      {
          $("#load").hide();
          $("#wallet").hide();
        $("#marchent").show();
      }
      else  if ( this.value == 'wallet')
      {
          $("#load").hide();
          $("#marchent").hide();
        $("#wallet").show();
      }
       else  
      {
        $("#load").hide();
        $("#marchent").hide();
        $("#wallet").hide();
      }
    });
});
</script>


<?php if($this->session->userdata('usertype') == 'branch') { ?>       
<div class="card card-primary" style="margin-top: 20px; width: 100%;">
   <div class="card-body">
      <div class="row">
         <div class="col-sm-5">
            Your wallet balance : <strong>0</strong> TK 
         </div>
         <hr style="border: 1px solid black; width:100%;">
         <div class="col-sm-3">
            <div class="form-group">
               <select  class="form-control" id="Ultra" onchange="run()">
                  <option value="0">Payment Method</option>
                  <option value="gateway">Payment Gateway</option>
                  <option value="marchent">Marchent Payment</option>
               </select>
            </div>
         </div>
         <div class="col-sm-9" style='display:none;' id='load'>
            <input type="hidden" id="srt" name="method" placeholder="get value on option select">
            <div class="row">
               <div class="col-sm-4">
                  <div class="form-group">                        
                     <button type="submit" class="btn btn-primary">Recharge Now</button>
                  </div>
               </div>
            </div>
         </div>
         <form method="post" action="<?= base_url() ?>Wallet/recharge_info">
            <div class="row col-sm-9" style='display:none;' id='marchent'>
               <input type="hidden" id="srt2" name="method" placeholder="get value on option select">
               <div class="col-sm-3">
                  <div class="form-group">                        
                     <input autocomplete="false" name="mobile" class="form-control" placeholder="Mobile Number"  minlength="11" maxlength="11">
                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="form-group">                        
                     <input autocomplete="false" name="amount" class="form-control" placeholder="Amount">
                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="form-group">                        
                     <input autocomplete="false" name="tnx"  id="tnx" class="form-control" placeholder="TNX ID">
                     <span id="result"></span> 
                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="form-group">                        
                     <button type="submit" class="btn btn-primary">Confirm Now</button>
                  </div>
               </div>
            </div>
         </form>
         <div class="col-sm-12" >
           <div class="row">
             <div class="col-sm-8">
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
         <div class="col-sm-9" style='display:none;' id='card'>
            <input type="hidden" id="srt3" name="method" placeholder="get value on option select"> 
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
         </div>
      </div>
   </div>
    </form>
</div>

<?php } elseif($this->session->userdata('usertype') == 'super_admin'){ ?>

<div class="card card-primary" style="margin-top: 20px; width: 100%;">
   <div class="card-body">
      <div class="col-sm-5">
         Your wallet balance : <strong>0</strong> TK 
      </div>
      <hr style="border: 1px solid black; width:100%;">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <select  class="form-control select2" id="Ultra2" onchange="run2()" required>
               <option value="0">Select Center</option>  
               <?php foreach ($this->Super_admin_model->centers() as $key => $value) { ?>
               <option value="<?= $value->code; ?>"><?= $value->site_name; ?></option>
               <?php } ?>
            </select>
          </div>
        </div> 
        <div class="col-sm-3">
           <div class="form-group">
              <select  class="form-control" id="Ultra" onchange="run()">
                 <option value="0">Payment Method</option>
                 <option value="marchent">Marchent Payment</option>
                 <option value="wallet">Wallet Payment</option>
              </select>
           </div>
        </div>
      </div>
      <form method="post" action="<?= base_url() ?>Wallet/wrecharge_info">
         <div class="row col-sm-9" style='display:none;' id='marchent'>
            <input type="hidden" id="srt2" name="method" placeholder="get value on option select">
            <input type="hidden" id="sr" name="code" placeholder="get value on option select">
            <div class="col-sm-3">
               <div class="form-group">                        
                  <input autocomplete="false" name="mobile" class="form-control" placeholder="Mobile Number">
               </div>
            </div>
            <div class="col-sm-3">
               <div class="form-group">                        
                  <input autocomplete="false" name="amount" class="form-control" placeholder="Amount">
               </div>
            </div>
            <div class="col-sm-3">
               <div class="form-group">                        
                  <input autocomplete="false" name="tnx" id="tnx" class="form-control" placeholder="TNX ID">
                  <span id="result"></span> 
               </div>
            </div>
            <div class="col-sm-3">
               <div class="form-group">                        
                  <button type="submit" class="btn btn-primary btn-block">Confirm Now</button>
               </div>
            </div>
            </form>
          </div>
      <form method="post" action="<?= base_url() ?>Wallet/wrecharge_info">
         <div class="col-sm-12" style='display:none;' id='wallet'>
            <div class="row">            
               <input type="hidden" id="srt" name="method" placeholder="get value on option select">
               <input type="hidden" id="sr2" name="code" placeholder="get value on option select">
               <div class="col-sm-4">
                  <div class="form-group">            
                     <input  name="amount" class="form-control" placeholder="Amount">
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="form-group">            
                     <input  name="remarks" class="form-control" placeholder="Remarks">
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="form-group">                        
                     <button type="submit" class="btn btn-primary">Recharge</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>







<?php } ?>                      

<script>
    function run() {
        document.getElementById("srt").value = document.getElementById("Ultra").value;
        document.getElementById("srt2").value = document.getElementById("Ultra").value;
        document.getElementById("srt3").value = document.getElementById("Ultra").value;
    }
</script> 
<script>
    function run2() {
        document.getElementById("sr").value = document.getElementById("Ultra2").value;
        document.getElementById("sr2").value = document.getElementById("Ultra2").value;
        document.getElementById("sr3").value = document.getElementById("Ultra2").value;
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