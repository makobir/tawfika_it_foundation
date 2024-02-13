<div style="height: auto;" class="card-body">
   <?php echo $this->session->userdata('message'); ?>
               <form method="post" action="<?php echo base_url() ?>admission/online_admission"  <?php echo form_open_multipart('upload/do_upload'); ?> 
               <input type="hidden" id="srt" name="type" placeholder="get value on option select">
               <div style="padding: 0px 20px;">
                  <div class="formstyle">
                     <div class="col-md-12" style="background: #9ea09f; padding:7px 10px; font-weight: bold; ">
                        Course Information 
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label></label>
                              <select class="form-control " name="session_id" id="course_id" required>
                                 <option value="">Session</option>
                                 <?php foreach ($this->Institute_model->session() as $key => $value) { 
                                    // $m = 10; //date('m');
                                    // // if($m == 1 or $m == 2 or $m == 3 or $m == 4 or $m == 5 or $m == 6 ){
                                    // //    $m =6;
                                    // // }
                                    // // elseif($m == 7 or $m == 8 or $m == 9 or $m == 10 or $m == 11 or $m == 12) {
                                    // //    $m = 12;
                                    // // }
                                    // if ($m <= $value->to) {
                                    //    if( $m >= $value->from ){
                                    ?>
                                 <option value="<?php echo $value->id ;?>" > <?php echo $value->session ;?> / <?php echo $value->year ;?>  </option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label></label>
                              <select class="form-control " name="course_id" id="course_id" required>
                                 <option value="">Select Course</option>
                                 <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
                                 <option value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label></label>
                              <select class="form-control " name="batch_id" id="batch_id" required>
                                 <option value="">Select Batch</option>
                                 <?php foreach ($this->Institute_model->batch() as $key => $value) { ?>
                                 <option <?php if ($value->status == 'Active') {echo 'selected';} ?> value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> <?php if ($value->status == 'Active') {echo '( Running )';} ?> </option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label> </label>
                              <!-- <input type="text" name="admission_date" id="admission_date" class="form-control" placeholder="Admission Date"   > -->
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12" style="background: #9ea09f; padding:7px 10px; font-weight: bold;margin-bottom: 7px;">
                        Personal Information 
                     </div>
                     <div class="row" >
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Name : </label>
                              <input type="text" name="name" id="name" class="form-control" required   >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Father's Name : </label>
                              <input type="text"  name="father" id="father"  class="form-control" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label> Mother's Name : </label>
                              <input type="text" name="mother" id="mother" class="form-control" required  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Date of Birth</label>
                              <input type="text" name="dob" id="dob" class="form-control" placeholder="25-12-2021">
                           </div>
                        </div>
                     </div>
                     <!--  Section 2  -->
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Division</label>
                              <select class="form-control " name="division" id="division">
                                 <option>Division</option>
                                 <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                                 <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>District</label>
                              <select class="form-control " name="district" id="district">
                                 <option>District</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Upazila</label>
                              <select class="form-control " name="upazila" id="upazila">
                                 <option>Upazila</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="address" id="address" class="form-control" required >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Mobile</label>
                              <input type="text" name="mobile" id="mobile" class="form-control"  minlength="11" maxlength="11" required >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" id="email" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>NID</label>
                              <input type="text" name="nid" id="nid" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Birth Registration</label>
                              <input type="text" name="birth" id="bid" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Gender</label>
                              <select class="form-control" name="gender" required>
                                 <option value="">Select</option>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12" style="background: #9ea09f; padding:7px 10px; font-weight: bold; margin-bottom: 7px;">
                           Academic Qualification 
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Select Exam</label>
                              <select class="form-control " name="exam[]" id="exam[]">
                                 <option value="SSC">PSC</option>
                                 <option value="SSC">JSC</option>
                                 <option value="SSC">SSC/Equivalent</option>
                                 <option value="HSC">HSC/Equivalent</option>
                                 <option value="Honors/Equivalent">Honors/Equivalent</option>
                                 <option value="Honors/Equivalent">Masters/Equivalent</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Roll</label>
                              <input type="text" name="roll[]" id="roll[]" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Board / University</label>
                              <select class="form-control" name="board[]">
                                 <option value="Dhaka">Dhaka</option>
                                 <option value="Rajshahi">Rajshahi</option>
                                 <option value="Comilla">Comilla</option>
                                 <option value="Jessore">Jessore</option>
                                 <option value="Chittagong">Chittagong</option>
                                 <option value="Barishal">Barishal</option>
                                 <option value="Sylhet">Sylhet</option>
                                 <option value="Dinajpur">Dinajpur</option>
                                 <option value="Mymensingh">Mymensingh</option>
                                 <option value="Madrasah">Madrasah</option>
                                 <option value="Technical">Technical</option>
                                 <option value="National University">National University</option>
                                 <option value="Others">Others</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Passing Year</label>
                              <input type="text" name="passing_year[]" id="passing_year[]" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Result</label>
                              <input type="text" name="result" id="result" class="form-control" placeholder="GPA"  >
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <select class="form-control " name="exam[]" id="exam[]">
                                 <option value="SSC">PSC</option>
                                 <option value="SSC">JSC</option>
                                 <option value="SSC">SSC/Equivalent</option>
                                 <option value="HSC">HSC/Equivalent</option>
                                 <option value="Honors/Equivalent">Honors/Equivalent</option>
                                 <option value="Honors/Equivalent">Masters/Equivalent</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <input type="number" name="roll[]" id="roll[]" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <select class="form-control" name="board[]">
                                 <option value="Dhaka">Dhaka</option>
                                 <option value="Rajshahi">Rajshahi</option>
                                 <option value="Comilla">Comilla</option>
                                 <option value="Jessore">Jessore</option>
                                 <option value="Chittagong">Chittagong</option>
                                 <option value="Barishal">Barishal</option>
                                 <option value="Sylhet">Sylhet</option>
                                 <option value="Dinajpur">Dinajpur</option>
                                 <option value="Madrasah">Madrasah</option>
                                 <option value="Technical">Technical</option>
                                 <option value="National University">National University</option>
                                 <option value="Others">Others</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <input type="text" name="passing_year[]" id="passing_year[]" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <input type="text" name="result[]" id="result[]" class="form-control" placeholder="GPA"  >
                           </div>
                        </div>
                        <div class="col-md-12" style="background: #9ea09f; padding:7px 10px; font-weight: bold;margin-bottom: 7px;">
                           Media Information
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>PP size Photo (< 100 KB)</label>
                              <input name="userfile" id="uploadFile" type="file" class="form-control" accept=".jpg">
                           </div>
                           <div id="imagePreview" class="well" ></div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>NID / Birth Regi (<200 KB)</label>
                              <input name="userfile2" id="uploadFile2" type="file" class="form-control" accept=".jpg">
                           </div>
                           <div id="imagePreview2" class="well" ></div>
                        </div>
                     </div>
                  </div>
                  <center>
                     <hr style="margin:0; margin-top:5px; padding:5px;">
                     <button type="reset" class="btn btn-info" value="Reset">Reset</button>
                     <button type="submit" name="submit" class="btn btn-success"> Admit Now</button>
                     <center>
                        <!-- <input type="submit" value="সাবমিট" class="btn btn-success"> -->
                     </center>
                  </center>
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