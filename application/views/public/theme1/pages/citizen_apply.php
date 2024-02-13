<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
       else  
      {
        $("#load").hide();
        $("#sim").hide();
        $("#card").hide();
      }
    });
});
</script>


<div id="pageTitle" class="bg--overlay" data-bg-img="img/page-header-img/bg.jpg">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="section-title">
               <h2>নাগরিক নিবন্ধনের আবেদন</h2>
            </div>
         </div>
         <div class="col-md-6">
            <ul class="breadcrumb">
               <li><span>আপনি বর্তমানে আছেন:</span></li>
               <li><a href="<?= base_url() ?>">প্রচ্ছদ</a></li>
               <li class="active">নাগরিক নিবন্ধনের আবেদন</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- Page Title Area End -->
<!-- Blog Area Start -->

  <div class="container">
  </div>
<div class="container">
</div>


<form action="<?php echo base_url() ?>home/citizen_application_submission"  <?php echo form_open_multipart('upload/do_upload'); ?> 

<div id="blog" class="page">
   <div class="container">
      <div class="formstyle">
         <div class="row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>খানা প্রধান?</label> 
                    <select id='purpose' name="parent" class="form-control" required>
                      <option value="0">হ্যা</option>
                      <option value="1">না</option>
                    </select>
                  </div>
               </div>
               <div  style='display:none;' id='load' >
                  <div class="col-md-3">
                      <div class="form-group">
                        <label>খানা প্রধানের ইউনিক আইডি</label>
                            <input type='text' class='form-control' name='holding_parent' value size='20' />
                        </div>
       
                   </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <label>কততম সন্তান ?</label>                          
                          <select name="child" class="form-control">
                            <option value="1">১ম</option>
                            <option value="2">২য়</option>
                            <option value="3">৩য়</option>
                            <option value="4">৪র্থ</option>
                            <option value="5">৫ম</option>
                            <option value="6">৬ষ্ঠ</option>
                            <option value="7">৭ম</option>
                            <option value="8">৮ম</option>
                            <option value="9">৯ম</option>
                            <option value="10">১০ম</option>
                            <option value="11">১১তম</option>
                            <option value="12">১২তম</option>
                          </select>
                      </div>
                   </div>
                 </div>
                <hr>
                <hr>
                 <div class="col-md-4">
                    <div class="form-group">
                       <label>নাম</label>
                       <input type="text" name="name" id="name" class="form-control" required   >
                    </div>
                 </div>
                 <div class="col-md-2">
                    <div class="form-group">
                       <label> পিতা/স্বামী</label>
                       <select  name="fatherorhusband" id="fatherorhusband"  class="form-control" required>
                          <option value="" disabled="" selected="">----</option>
                          <option value="পিতা">পিতা</option>
                          <option value="স্বামী">স্বামী</option>
                       </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label> পিতা/স্বামী নাম</label>
                       <input  name="father" id="father"  class="form-control" required>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label> মাতার নাম</label>
                       <input type="text" name="mother" id="mother" class="form-control" required  >
                    </div>
                 </div>
              </div>
              <!--  Section 2  -->

              <div class="row">
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>বিভাগ</label>
                          <select class="form-control form-control-sm" name="division" id="division" required>
                            <option>Division</option>
                            <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                              <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                            <?php } ?>
                          </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>জেলা</label>
                          <select class="form-control form-control-sm" name="district" id="district" required>
                            <option>District</option>
                          </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>উপজেলা</label>
                          <select class="form-control form-control-sm" name="upazila" id="upazila" required>
                            <option>Upazila</option>
                          </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>ইউনিয়ন</label>
                          <select class="form-control form-control-sm" name="union" id="union" required>
                            <option>ইউনিয়ন</option>
                          </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>গ্রাম</label>
                          <select class="form-control form-control-sm" name="village" id="village" required>
                            <option>গ্রাম</option>
                          </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>ডাকঘর</label>
                          <select class="form-control form-control-sm" name="post" id="post"  required>
                            <option>ডাকঘর</option>
                          </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>ওয়ার্ড নম্বর</label>
                       <select name="word" class="form-control" required="">
                          <option value="" disabled selected="">----</option>
                          <option>ওয়ার্ড নির্বাচন করুন</option>
                          <option value="1">ওয়ার্ড নং ১</option>
                          <option value="2">ওয়ার্ড নং ২</option>
                          <option value="3">ওয়ার্ড নং ৩</option>
                          <option value="4">ওয়ার্ড নং ৪</option>
                          <option value="5">ওয়ার্ড নং ৫</option>
                          <option value="6">ওয়ার্ড নং ৬</option>
                          <option value="7">ওয়ার্ড নং ৭</option>
                          <option value="8">ওয়ার্ড নং ৮</option>
                          <option value="9">ওয়ার্ড নং ৯</option>
                       </select>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>হোল্ডিং নম্বর</label>
                       <input type="text" name="holding" id="holdingno" class="form-control" >
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>বাড়ীর নাম</label>
                       <input type="text" name="home_name" id="home_name" class="form-control"  >
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>জন্ম তারিখ</label>
                       <input type="text" name="dob" id="dob" class="form-control" placeholder="25-12-2021">
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>এনআইডি</label>
                       <input type="number" name="nid" id="nid" class="form-control" >
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>জন্ম সনদ নম্বর</label>
                       <input type="number" name="bid" id="bid" class="form-control" >
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>মোবাইল নম্বর</label>
                       <input type="text" name="mobile" id="mobile" class="form-control" placeholder="ইংরেজিতে লিখুন" required >
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>ইমেইল</label>
                       <input type="text" name="email" id="email" class="form-control" placeholder="ইংরেজিতে লিখুন" >
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label>ছবি (অপশনাল)</label>
                       <input name="userfile" id="userfile" type="file" class="form-control" accept=".jpg">
                    </div>
                 </div>
              </div>
              <center>
              <hr style="margin:0; margin-top:5px; padding:5px;">
              <button type="reset" class="btn btn-info" value="Reset">রিসেট</button>
              <button type="submit" name="submit" class="btn btn-success">সাবমিট</button>
              <center>
              <!-- <input type="submit" value="সাবমিট" class="btn btn-success"> -->
            </form>
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



















<!--


<script type="text/javascript">
   $(document).ready(function () {
   
       /*Get the country list */
   
       $.ajax({
           type: "GET",
           url: "<?php echo base_url(); ?>home/get_division",
           data: {id: $(this).val()},
           beforeSend: function () {
               $('.division').find("option:eq(0)").html("Please wait..");
           },
           success: function (data) {
               /*get response as json */
               $('.division').find("option:eq(0)").html("Select Division");
               var obj = jQuery.parseJSON(data);
               $(obj).each(function ()
               {
                   var option = $('<option />');
                   option.attr('value', this.value).text(this.label);
                   $('.division').append(option);
               });
   
               /*ends */
   
           }
       });
   
       /*Get the state list */
   
       $('.division').change(function () {
           $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>home/get_district",
               data: {id: $(this).val()},
               beforeSend: function () {
                   $('.district').find("option:eq(0)").html("Please wait..");
   
               },
               success: function (data) {
                   /*get response as json */
                   $('.district').find("option:eq(0)").html("Select District");
                   var obj = jQuery.parseJSON(data);
                   $(obj).each(function ()
                   {
                       var option = $('<option />');
                       option.attr('value', this.value).text(this.label);
                       $('.district').append(option);
                   });
   
                   /*ends */
   
               }
           });
       });
   
       /*Get the state list */
   
       $('.district').change(function () {
           $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>home/get_upazila",
               data: {id: $(this).val()},
               beforeSend: function () {
   
                   $('.upazila').find("option:eq(0)").html("Please wait..");
   
               },
               success: function (data) {
                   /*get response as json */
                   $('.upazila').find("option:eq(0)").html("Select Upazila");
   
                   var obj = jQuery.parseJSON(data);
                   $(obj).each(function ()
                   {
                       var option = $('<option />');
                       option.attr('value', this.value).text(this.label);
                       $('.upazila').append(option);
                   });
   
                   /*ends */
               }
           });
       });


       /*Get the Union list */
   
       $('.upazila').change(function () {
           $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>home/get_union",
               data: {id: $(this).val()},
               beforeSend: function () {
                   $('.union').find("option:eq(0)").html("Please wait..");
   
               },
               success: function (data) {
                   /*get response as json */
                   $('.union').find("option:eq(0)").html("Select UP");
   
                   var obj = jQuery.parseJSON(data);
                   $(obj).each(function ()
                   {
                       var option = $('<option />');
                       option.attr('value', this.value).text(this.label);
                       $('.union').append(option);
                   });
   
                   /*ends */
               }
           });
       });
    /*Get the Union list */
   
       $('.union').change(function () {
           $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>home/get_village",
               data: {id: $(this).val()},
               beforeSend: function () {
                   $('.village').find("option:eq(0)").html("Please wait..");
   
               },
               success: function (data) {
                   /*get response as json */
                   $('.village').find("option:eq(0)").html("Select Union");
   
                   var obj = jQuery.parseJSON(data);
                   $(obj).each(function ()
                   {
                       var option = $('<option />');
                       option.attr('value', this.value).text(this.label);
                       $('.village').append(option);
                   });
   
                   /*ends */
               }
           });
       });



   });

   </script> 

   -->