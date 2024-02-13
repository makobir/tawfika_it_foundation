
<style type="text/css">
    .text-danger {
        color: red;
    }
    .text-success {
        color: green;
    }
</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="sc_section accent_top bg_tint_light sc_bg1" data-animation="animated fadeInUp normal">
  <div class="sc_section_overlay">
    <div class="sc_section_content">
      <div class="sc_content content_wrap margin_top_2_5em_imp margin_bottom_2_5em_imp">
        <form method="post" action="<?= base_url() ?>authenticator/branch_register">
          <?php 
          echo "me". $this->session->userdata('message');
          $this->session->unset_userdata('message');
          ?> 
        <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
           <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
              <div class="form-group">
                 <label>Division</label>
                    <select  style="width: 100%; padding: 7px 0px;" class="form-control form-control-sm" name="division" id="division" equired>
                      <option>Division</option>
                      <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                        <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                      <?php } ?>
                    </select>
              </div>
           </div>
           <input type="hidden" id="srt" name="dcode" placeholder="get value on option select">
           <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
              <div class="form-group">
                 <label>District</label>
                    <select  style="width: 100%; padding: 7px 0px;" class="form-control form-control-sm" name="district" id="district"  onchange="run()" required>
                      <option>District</option>
                    </select>
              </div>
           </div>
           <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
              <div class="form-group">
                 <label>Upazila</label>
                    <select  style="width: 100%; padding: 7px 0px;" class="form-control form-control-sm" name="upazila" id="upazila" required>
                      <option>Upazila</option>
                    </select>
              </div>
           </div>
          <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
            <label for="fname">Institute Name</label><br>
            <input style="border:1px solid red; width: 100%;" type="text" id="institute" name="institute">
          </div>
          <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
            <label for="fname">CEO / Director Name</label><br>
            <input style="border:1px solid red; width: 100%;" type="text" id="director" name="director">
          </div>
          <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
            <label for="fname">Address</label><br>
            <input style="border:1px solid red; width: 100%;" type="text" id="address" name="address">
          </div>
<!-- 
                    <div class="form-group">
                        <label class="request" style="color: red;">*</label>
                        <label> Email</label>
                        <input type="text" name="email" id="email" class="form-control" required />  
                        <span id="email_result"></span> 
                    </div> 
                    <div class="form-group">
                        <label class="request" style="color: red;">*</label>
                        <label> Mobile Number </label>
                        <input type="text" name="mobile" id="mobile" class="form-control" minlength="11" maxlength="11" required> 
                        <span id="mobile_result"></span> 
                    </div>  -->

          <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
            <label for="fname">Email</label><br>
            <input style="border:1px solid red; width: 100%;" type="text" id="email" name="email">
            <span id="email_result"></span> 
          </div>
          <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
            <label for="fname">Mobile</label><br>
            <input style="border:1px solid red; width: 100%;" type="text" id="mobile" name="mobile" placeholder="017XXXXXXXX" minlength="11" maxlength="11" required>
            <span id="mobile_result"></span> 
          </div>

          <div class="sc_price_block_link" style="margin-top:10px;">
            <button type="submit" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_link sc_button_size_small">Submit Application</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script src="<?php echo base_url() ?>assets/back/plugins/jquery/jquery.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
          $('#division').change(function(){
           var division = $('#division').val();
           if(division != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_district",
             method:"POST",
             data:{division:division},
             success:function(data)
             {
              $('#district').html(data);
             }
            });
           }
           else
           {
            $('#district').html('<option value="">Select</option>');
           }
          });

          $('#district').change(function(){
           var district = $('#district').val();
           if(district != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_upazila",
             method:"POST",
             data:{district:district},
             success:function(data)
             {
              $('#upazila').html(data);
             }
            });
           }
           else
           {
            $('#upazila').html('<option value="">Select</option>');
           }
          });

          $('#upazila').change(function(){
           var upazila = $('#upazila').val();
           if(upazila != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_union",
             method:"POST",
             data:{upazila:upazila},
             success:function(data)
             {
              $('#union').html(data);
             }
            });
           }
           else
           {
            $('#union').html('<option value="">Select</option>');
           }
          });

          $('#union').change(function(){
           var union = $('#union').val();
           if(union != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_village",
             method:"POST",
             data:{union:union},
             success:function(data)
             {
              $('#village').html(data);
             }
            });
           }
           else
           {
            $('#village').html('<option value="">Select</option>');
           }
          });

          $('#union').change(function(){
           var union = $('#union').val();
           if(union != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_post",
             method:"POST",
             data:{union:union},
             success:function(data)
             {
              $('#post').html(data);
             }
            });
           }
           else
           {
            $('#post').html('<option value="">Select</option>');
           }
          });

         });
      </script>

<script>
    function run() {
        document.getElementById("srt").value = document.getElementById("district").value;
    }
</script>


<script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>authenticator/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  
 }); 
 $(document).ready(function(){  
      $('#mobile').change(function(){  
           var mobile = $('#mobile').val();  
           if(mobile != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>authenticator/check_mobile_avalibility",  
                     method:"POST",  
                     data:{mobile:mobile},  
                     success:function(data){  
                          $('#mobile_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  