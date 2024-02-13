<div class="sc_section " data-animation="animated fadeInUp normal">
  	<div class="sc_section_overlay">
    	<div class="content_wrap">
    		<form method="post" action="<?= base_url() ?>home/blood_donors">
    	<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4">
           <div class="column-1_4 sc_column_item sc_column_item_1 odd first">            
    			<a style="background: green; border: 1px solid red; padding:10px 10px; border-radius:10px; color:white; font-weight:bold; margin-top:5px; " href="<?= base_url(); ?>home/donor_registration">Donor Registration </a>
           </div> 
          
           <div class="column-1_4 sc_column_item sc_column_item_1 odd first">
              <div class="form-group">
                    <select  style="width: 100%; padding: 7px 0px;" class="form-control form-control-sm" name="division" id="division" >
                      <option>Division</option>
                      <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                        <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                      <?php } ?>
                    </select>
              </div>
           </div>
           <input type="hidden" id="srt" name="dcode" placeholder="get value on option select">
           <div class="column-1_4 sc_column_item sc_column_item_1 odd first">
              <div class="form-group">
                    <select  style="width: 100%; padding: 7px 0px;" class="form-control form-control-sm" name="district" id="district"  onchange="run()" >
                      <option>District</option>
                    </select>
              </div>
           </div>
           <div class="column-1_4 sc_column_item sc_column_item_1 odd first">
              <div class="form-group">
                    <select  style="width: 100%; padding: 7px 0px;" class="form-control form-control-sm" name="upazila" id="upazila" onchange="javascript:this.form.submit()">
                      <option>Upazila</option>
                    </select>
              </div>
           </div>
           </form> 
          </div>
    		<div class=" content_wrap  margin_bottom_2_5em_imp">
        		<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 margin_top_2_5em_imp"> 
			    	<table width="100%" style="border:1px solid black !important;">
						<tr>
							<td>SL</td>
							<td>Name</td>
							<td>Blood Group</td>
							<td>Location</td>
							<td>Mobile</td>
						</tr>
						<?php 
							$upazila = $this->input->post('upazila');
							$i= 1; foreach ($this->Home_model->blood_donors($upazila) as $notice) {?>
						<tr>
							<td><?= $i; ?></td>
							<td> <?= $notice->name ?> <a href="<?= base_url() ?>home/notice_detail/<?= $notice->id ?>" ></a></td>
							<td><?= $notice->group ?></td>
							<td><?= $notice->upazila ?></td>
							<td><?= $notice->mobile ?></td>
						</tr>
						<?php $i++; } ?>
					</table>
				</div>
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