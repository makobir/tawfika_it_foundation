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
</script>   <style >
       fieldset{
          background-repeat:no-repeat;
          background-position:left;
          background-size:cover;
          padding: 5px;
        }
       p#innerPara{padding:20px ;}
       legend{ 
        width:245px; 
        padding:2px 20px;
        }
       table { width: 100%; }
       .border {        
          border: 1px solid #0d2888 !important;
       }
       input { 
   text-transform: capitalize;
   }
   ::-webkit-input-placeholder { 
       text-transform: none;
   }
   :-moz-placeholder { 
       text-transform: none;
   }
   ::-moz-placeholder { 
       text-transform: none;
   }
   :-ms-input-placeholder { 
       text-transform: none;
   }
    </style>
<style type="text/css">

    #imagePreview,#imagePreview2 {
        width: 100px;
        height:100px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    </style>

<div class="card card-primary card-outline" style="width: 100%">
<div class="card-body">
<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
   <li class="nav-item">
      <a class="nav-link <?php if($title == 'Admission') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Admission</a>
   </li>
   <li class="nav-item">
      <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-home" aria-selected="true">All Trainee</a>
   </li>

   <?php if($title == 'Edit Trainee') { ?> 
   <li class="nav-item">
      <a class="nav-link <?php if($title == 'Edit Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#edit" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Edit Trainee</a>
   </li>
   <?php } ?>
</ul>
<div class="tab-content" id="custom-content-below-tabContent">
   <?php if($title == 'Admission') { ?> 
   <div class="tab-pane fade <?php if($title == 'Admission') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
      <div class="card card-primary" style="margin-top: 20px; width: 100%;">
         <?php if ($this->Authenticator_model->payments_status() != NULL) { ?>
         <div class="card-body">
            <form method="post" action="<?php echo base_url() ?>admission/admission_info"  <?php echo form_open_multipart('upload/do_upload'); ?> 
            <input type="hidden" id="srt" name="type" placeholder="get value on option select">
            <div style="padding: 0px 20px;">
               <div class="formstyle">
                  <div class="col-md-12" style="background:#dea8e0; padding:7px 10px; font-weight: bold; ">
                     Course Information 
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Session : </label>
                           <select class="form-control " name="session_id" required>
                              <option value="">Session</option>
                              <?php foreach ($this->Institute_model->session() as $key => $value) { ?>
                              <option  <?php if ($this->session->userdata('asession') == $value->scode ) { echo 'selected'; } ?>  value="<?php echo $value->scode ;?>" > <?php echo $value->session ;?>  </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">                           
                           <label><span style="color:red;">*</span> Session Year : </label>
                           <select class="form-control" name="year" id="year" required>
                              <option>Year</option>
                              <option <?php if ($this->session->userdata('ayear') == '2024') { echo 'selected'; } ?>  value="2024">2024</option>
                              <option <?php if ($this->session->userdata('ayear') == '2023') { echo 'selected'; } ?>  value="2023">2023</option>
                              <option <?php if ($this->session->userdata('ayear') == '2022') { echo 'selected'; } ?>  value="2022">2022</option>
                              <option <?php if ($this->session->userdata('ayear') == '2021') { echo 'selected'; } ?>  value="2021">2021</option>
                              <option <?php if ($this->session->userdata('ayear') == '2020') { echo 'selected'; } ?>  value="2020">2020</option>
                              <option <?php if ($this->session->userdata('ayear') == '2019') { echo 'selected'; } ?>  value="2019">2019</option>
                              <option <?php if ($this->session->userdata('ayear') == '2018') { echo 'selected'; } ?>  value="2018">2018</option>
                              <option <?php if ($this->session->userdata('ayear') == '2017') { echo 'selected'; } ?>  value="2017">2017</option>
                              <option <?php if ($this->session->userdata('ayear') == '2016') { echo 'selected'; } ?>  value="2016">2016</option>
                              <option <?php if ($this->session->userdata('ayear') == '2015') { echo 'selected'; } ?>  value="2015">2015</option>
                              <option <?php if ($this->session->userdata('ayear') == '2014') { echo 'selected'; } ?>  value="2014">2014</option>
                              <option <?php if ($this->session->userdata('ayear') == '2013') { echo 'selected'; } ?>  value="2013">2013</option>
                              <option <?php if ($this->session->userdata('ayear') == '2012') { echo 'selected'; } ?>  value="2012">2012</option>
                              <option <?php if ($this->session->userdata('ayear') == '2011') { echo 'selected'; } ?>  value="2011">2011</option>
                              <option <?php if ($this->session->userdata('ayear') == '2010') { echo 'selected'; } ?>  value="2010">2010</option>
                              <option <?php if ($this->session->userdata('ayear') == '2009') { echo 'selected'; } ?>  value="2009">2009</option>
                              <option <?php if ($this->session->userdata('ayear') == '2008') { echo 'selected'; } ?>  value="2008">2008</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">                           
                           <label><span style="color:red;">*</span> Course Name : </label>
                           <select class="form-control " name="course_id" id="course_id" required>
                              <option value="">Select Course</option>
                              <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
                              <option <?php if ($this->session->userdata('acourse') == $value->id ) { echo 'selected'; } ?>  value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label> Admission Date : </label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                              </div>
                              <input value="<?php echo $this->session->userdata('aadmission_date'); ?>" name="admission_date" id="admission_date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12" style="background: #83cea8; padding:7px 10px; font-weight: bold;margin-bottom: 7px;">
                     Personal Information 
                  </div>
                  <div class="row" >
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Name : </label>
                           <input type="text" name="name" id="name" class="form-control" value="<?php echo $this->session->userdata('aname'); ?>" required   >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Father's Name : </label>
                           <input type="text"  name="father" id="father"  class="form-control" value="<?php echo $this->session->userdata('afather'); ?>" required>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Mother's Name : </label>
                           <input type="text" name="mother" id="mother" class="form-control" value="<?php echo $this->session->userdata('amother'); ?>" required   >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Date of Birth</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                              </div>
                              <input value="<?php echo $this->session->userdata('adob'); ?>" name="dob" id="dob" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>NID</label>
                           <input type="number" name="nid" id="nid" class="form-control" value="<?php echo $this->session->userdata('anid'); ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Birth Registration</label>
                           <input type="number" name="birth" id="bid" class="form-control"  value="<?php echo $this->session->userdata('abirth'); ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Gender</label>
                           <select class="form-control" name="gender" required>
                              <option value="">Select</option>
                              <option <?php if ($this->session->userdata('agender') == 'Male' ) { echo 'selected'; } ?> value="Male">Male</option>
                              <option <?php if ($this->session->userdata('agender') == 'Female' ) { echo 'selected'; } ?> value="Female">Female</option>
                              <option <?php if ($this->session->userdata('agender') == 'Third Gender' ) { echo 'selected'; } ?> value="Third Gender">Third Gender</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span>Religion</label>
                           <select class="form-control" name="religion" required>
                              <option value="">Select</option>
                              <option <?php if ($this->session->userdata('areligion') == 'Islam' ) { echo 'selected'; } ?> value="Islam">Islam</option>
                              <option <?php if ($this->session->userdata('areligion') == 'Hinduism' ) { echo 'selected'; } ?> value="Hinduism">Hinduism</option>
                              <option <?php if ($this->session->userdata('areligion') == 'Christian' ) { echo 'selected'; } ?> value="Christian">Christian</option>
                              <option <?php if ($this->session->userdata('areligion') == 'Buddhism' ) { echo 'selected'; } ?> value="Buddhism">Buddhism</option>
                              <option <?php if ($this->session->userdata('areligion') == 'Others' ) { echo 'selected'; } ?> value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Blood Group</label>
                           <select class="form-control" name="blood">
                              <option value="">Select</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'A(+)' ) { echo 'selected'; } ?> value="A(+)">A(+)</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'A(-)' ) { echo 'selected'; } ?> value="A(-)">A(-)</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'B(+)' ) { echo 'selected'; } ?> value="B(+)">B(+)</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'B(-)' ) { echo 'selected'; } ?> value="B(-)">B(-)</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'AB(+)' ) { echo 'selected'; } ?> value="AB(+)">AB(+)</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'AB(-)' ) { echo 'selected'; } ?> value="AB(-)">AB(-)</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'O(+)' ) { echo 'selected'; } ?> value="O(+)">O(+)</option>
                              <option  <?php if ($this->session->userdata('ablood') == 'O(-)' ) { echo 'selected'; } ?> value="O(-)">O(-)</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Register as Blood Donor ?</label>
                           <select class="form-control" name="donor">
                              <option value="">Select</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                           </select>
                        </div>
                     </div>       <!--  Section 2  -->
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Mobile</label>
                           <input type="text" name="mobile" id="mobile" class="form-control"  minlength="11" maxlength="11" value="<?php echo $this->session->userdata('amobile'); ?>" required >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email" id="email" class="form-control" value="<?php echo $this->session->userdata('aemail'); ?>" >
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Gurdian Name</label>
                           <input type="text" name="gurdian" id="gurdian" class="form-control" value="<?php echo $this->session->userdata('agurdian'); ?>">
                        </div>
                     </div>                     
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Relation with trainee</label>                           
                           <select class="form-control" name="relation">
                              <option value="">Select</option>
                              <option  <?php if ($this->session->userdata('arelation') == 'Father' ) { echo 'selected'; } ?> value="Father">Father</option>
                              <option <?php if ($this->session->userdata('arelation') == 'Mother' ) { echo 'selected'; } ?> value="Mother">Mother</option>
                              <option <?php if ($this->session->userdata('arelation') == 'Spouse' ) { echo 'selected'; } ?> value="Spouse">Spouse</option>
                              <option <?php if ($this->session->userdata('arelation') == 'Brother / Sister' ) { echo 'selected'; } ?> value="Brother / Sister">Brother / Sister</option>
                              <option <?php if ($this->session->userdata('arelation') == 'Others' ) { echo 'selected'; } ?> value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Mobile</label>
                           <input type="text" name="gurdian_mobile" id="mobile" class="form-control"  minlength="11" maxlength="11" required value="<?php echo $this->session->userdata('agurdian_mobile'); ?>">
                        </div>
                     </div>                     
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>BTEB Student ?</label>
                           <select class="form-control" name="bteb">
                              <option value="">Select</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="col-md-12" style="background: #c4c455; padding:7px 10px; font-weight: bold; margin-bottom: 7px;">
                           Permanent Address
                        </div>                        
                        <div class="row">                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><span style="color:red;">*</span> Division</label>
                                 <select class="form-control " name="pdivision" id="division">
                                    <option>Division</option>
                                    <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                                    <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><span style="color:red;">*</span> District</label>
                                 <select class="form-control " name="pdistrict" id="district">
                                    <option>District</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><span style="color:red;">*</span> Upazila</label>
                                 <select class="form-control " name="pupazila" id="upazila">
                                    <option>Upazila</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Village/House</label>
                                 <input type="text" name="pvillage" id="address" class="form-control" value="<?php echo $this->session->userdata('avillage'); ?>" required >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Office</label>
                                 <input type="text" name="ppost" id="address" class="form-control" value="<?php echo $this->session->userdata('apost'); ?>" required >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Code</label>
                                 <input type="text" name="ppost_code" id="address" class="form-control" value="<?php echo $this->session->userdata('apost_code'); ?>"  >
                              </div>
                           </div> 
                        </div>
                     </div>
                     <div class="col-sm-6">                        
                        <div class="col-md-12" style="background: #c4c455; padding:7px 10px; font-weight: bold; margin-bottom: 7px;">
                           Present Address
                        </div>   
                        <div class="row"> 
                           <div class="col-md-4">
                               <label> Same as present </label> <br>
                               <input style="width:30px; height: 30px;" type="checkbox" name="same" value="1">
                           </div>                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Division</label>
                                 <select class="form-control " name="prdivision" id="division2">
                                    <option>Division</option>
                                    <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                                    <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>District</label>
                                 <select class="form-control " name="prdistrict" id="district2">
                                    <option>District</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Upazila</label>
                                 <select class="form-control " name="prupazila" id="upazila2">
                                    <option>Upazila</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Village/House</label>
                                 <input type="text" name="prvillage" id="address" class="form-control" value="<?php echo $this->session->userdata('avillage'); ?>"  >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Office</label>
                                 <input type="text" name="prpost" id="address" class="form-control" value="<?php echo $this->session->userdata('apost'); ?>"  >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Code</label>
                                 <input type="text" name="prpost_code" id="address" class="form-control" value="<?php echo $this->session->userdata('apost_code'); ?>" >
                              </div>
                           </div> 
                        </div>                     
                     </div>  
                     <div class="col-md-12" style="background: #c4c455; padding:7px 10px; font-weight: bold; margin-bottom: 7px;">
                        Academic Qualification 
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Select Exam</label>
                           <select class="form-control " name="exam" >
                              <option <?php if ($this->session->userdata('aexam') == 'PSC' ) { echo 'selected'; } ?> value="PSC">PSC</option>
                              <option <?php if ($this->session->userdata('aexam') == 'JSC' ) { echo 'selected'; } ?> value="JSC">JSC</option>
                              <option <?php if ($this->session->userdata('aexam') == 'SSC' ) { echo 'selected'; } ?> value="SSC">SSC/Equivalent</option>
                              <option <?php if ($this->session->userdata('aexam') == 'HSC' ) { echo 'selected'; } ?> value="HSC">HSC/Equivalent</option>
                              <option <?php if ($this->session->userdata('aexam') == 'Honors/Equivalent' ) { echo 'selected'; } ?> value="Honors/Equivalent">Honors/Equivalent</option>
                              <option <?php if ($this->session->userdata('aexam') == 'Masters/Equivalent' ) { echo 'selected'; } ?> value="Masters/Equivalent">Masters/Equivalent</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Roll</label>
                           <input type="number" name="roll" id="roll[]" class="form-control" value="<?php echo $this->session->userdata('aroll'); ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Board / University</label>
                           <select class="form-control" name="board">
                              <option  <?php if ($this->session->userdata('aboard') == 'Dhaka' ) { echo 'selected'; } ?> value="Dhaka">Dhaka</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Rajshahi' ) { echo 'selected'; } ?> value="Rajshahi">Rajshahi</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Comilla' ) { echo 'selected'; } ?> value="Comilla">Comilla</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Jessore' ) { echo 'selected'; } ?> value="Jessore">Jessore</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Chittagong' ) { echo 'selected'; } ?> value="Chittagong">Chittagong</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Barishal' ) { echo 'selected'; } ?> value="Barishal">Barishal</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Sylhet' ) { echo 'selected'; } ?> value="Sylhet">Sylhet</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Dinajpur' ) { echo 'selected'; } ?> value="Dinajpur">Dinajpur</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Mymensingh' ) { echo 'selected'; } ?> value="Mymensingh">Mymensingh</option>
                              <option <?php if ($this->session->userdata('aboard') == 'BOU' ) { echo 'selected'; } ?> value="BOU">BOU</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Madrasah' ) { echo 'selected'; } ?> value="Madrasah">Madrasah</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Technical' ) { echo 'selected'; } ?> value="Technical">Technical</option>
                              <option <?php if ($this->session->userdata('aboard') == 'National University' ) { echo 'selected'; } ?> value="National University">National University</option>
                              <option  <?php if ($this->session->userdata('aboard') == 'Others' ) { echo 'selected'; } ?> value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Passing Year</label>
                           <input type="number" name="passing_year" id="passing_year[]" class="form-control" value="<?php echo $this->session->userdata('apassing_year'); ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Result</label>
                           <input type="text" name="result" id="result" class="form-control" placeholder="GPA" value="<?php echo $this->session->userdata('aresult'); ?>"  >
                        </div>
                     </div>
                     
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Select Exam</label>
                           <select class="form-control " name="exam2" >
                              <option <?php if ($this->session->userdata('aexam') == 'PSC' ) { echo 'selected'; } ?> value="PSC">PSC</option>
                              <option <?php if ($this->session->userdata('aexam') == 'JSC' ) { echo 'selected'; } ?> value="JSC">JSC</option>
                              <option <?php if ($this->session->userdata('aexam') == 'SSC' ) { echo 'selected'; } ?> value="SSC">SSC/Equivalent</option>
                              <option <?php if ($this->session->userdata('aexam') == 'HSC' ) { echo 'selected'; } ?> value="HSC">HSC/Equivalent</option>
                              <option <?php if ($this->session->userdata('aexam') == 'Honors/Equivalent' ) { echo 'selected'; } ?> value="Honors/Equivalent">Honors/Equivalent</option>
                              <option <?php if ($this->session->userdata('aexam') == 'Masters/Equivalent' ) { echo 'selected'; } ?> value="Masters/Equivalent">Masters/Equivalent</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Roll</label>
                           <input type="number" name="roll2" id="roll[]" class="form-control" value="<?php echo $this->session->userdata('aroll'); ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Board / University</label>
                           <select class="form-control" name="board2">
                              <option  <?php if ($this->session->userdata('aboard') == 'Dhaka' ) { echo 'selected'; } ?> value="Dhaka">Dhaka</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Rajshahi' ) { echo 'selected'; } ?> value="Rajshahi">Rajshahi</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Comilla' ) { echo 'selected'; } ?> value="Comilla">Comilla</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Jessore' ) { echo 'selected'; } ?> value="Jessore">Jessore</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Chittagong' ) { echo 'selected'; } ?> value="Chittagong">Chittagong</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Barishal' ) { echo 'selected'; } ?> value="Barishal">Barishal</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Sylhet' ) { echo 'selected'; } ?> value="Sylhet">Sylhet</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Dinajpur' ) { echo 'selected'; } ?> value="Dinajpur">Dinajpur</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Mymensingh' ) { echo 'selected'; } ?> value="Mymensingh">Mymensingh</option>
                              <option <?php if ($this->session->userdata('aboard') == 'BOU' ) { echo 'selected'; } ?> value="BOU">BOU</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Madrasah' ) { echo 'selected'; } ?> value="Madrasah">Madrasah</option>
                              <option <?php if ($this->session->userdata('aboard') == 'Technical' ) { echo 'selected'; } ?> value="Technical">Technical</option>
                              <option <?php if ($this->session->userdata('aboard') == 'National University' ) { echo 'selected'; } ?> value="National University">National University</option>
                              <option  <?php if ($this->session->userdata('aboard') == 'Others' ) { echo 'selected'; } ?> value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Passing Year</label>
                           <input type="number" name="passing_year2" id="passing_year[]" class="form-control" value="<?php echo $this->session->userdata('apassing_year'); ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Result</label>
                           <input type="text" name="result2" id="result" class="form-control" placeholder="GPA" value="<?php echo $this->session->userdata('aresult'); ?>"  >
                        </div>
                     </div>
                     <div class="col-md-12" style="background: #989dfc; padding:7px 10px; font-weight: bold;margin-bottom: 7px;">
                        Media Information
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> 200px X 200px</label>
                           <input name="userfile" id="uploadFile" type="file" class="form-control" accept=".jpg">
                        </div>
                        <div id="imagePreview" class="well" ></div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>NID / Birth Regi (<200 KB)</label>
                           <input name="userfile2" id="uploadFile2" type="file" class="form-control" accept=".jpg">
                        </div>
                        <div id="imagePreview2" class="well"></div>
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
            </form>
         </div>
         <?php } else { ?>
         <div class="card-body">               
            <a href="<?= base_url() ?>wallet/payfee">Please pay Registration Fee for activated ! <span class="btn btn-info">Pay Now</span> </a>
         </div>
         <?php } ?>  
      </div>
   </div>
   <?php } ?>
   <div class="tab-pane fade <?php if($title == 'All Trainee') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
      Transfered to Manu
   </div>
   <?php if($title == 'Edit Trainee') { ?> 
   <div class="tab-pane fade <?php if($title == 'Edit Trainee') { echo 'show active'; }?>" id="edit" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
      <div class="card card-primary" style="margin-top: 20px; width: 100%;">       
         <div class="card-body">
            <form method="post" action="<?php echo base_url() ?>admission/update_info"  <?php echo form_open_multipart('upload/do_upload'); ?> 
            <input type="hidden" name="regi" value="<?php echo $trainee->regi ;?>" >
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
                              <?php foreach ($this->Institute_model->session() as $key => $value) { ?>
                              <option <?php if($trainee->session == $value->scode) {echo 'selected';}?> value="<?php echo $value->scode ;?>" > <?php echo $value->session ;?>  </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label></label>
                           <select class="form-control " name="year" id="year" required>
                              <option>Year</option>
                              <option <?php if($trainee->year == '2008') {echo 'selected';}?> value="2008">2008</option>
                              <option <?php if($trainee->year == '2009') {echo 'selected';}?> value="2009">2009</option>
                              <option <?php if($trainee->year == '2010') {echo 'selected';}?> value="2010">2010</option>
                              <option <?php if($trainee->year == '2011') {echo 'selected';}?> value="2011">2011</option>
                              <option <?php if($trainee->year == '2012') {echo 'selected';}?> value="2012">2012</option>
                              <option <?php if($trainee->year == '2013') {echo 'selected';}?> value="2013">2013</option>
                              <option <?php if($trainee->year == '2014') {echo 'selected';}?> value="2014">2014</option>
                              <option <?php if($trainee->year == '2015') {echo 'selected';}?> value="2015">2015</option>
                              <option <?php if($trainee->year == '2016') {echo 'selected';}?> value="2016">2016</option>
                              <option <?php if($trainee->year == '2017') {echo 'selected';}?> value="2017">2017</option>
                              <option <?php if($trainee->year == '2018') {echo 'selected';}?> value="2018">2018</option>
                              <option <?php if($trainee->year == '2019') {echo 'selected';}?> value="2019">2019</option>
                              <option <?php if($trainee->year == '2020') {echo 'selected';}?> value="2020">2020</option>
                              <option <?php if($trainee->year == '2021') {echo 'selected';}?> value="2021">2021</option>
                              <option <?php if($trainee->year == '2022') {echo 'selected';}?> value="2022">2022</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label></label>
                           <select class="form-control " name="course_id" id="course_id" required>
                              <option value="">Select Course</option>
                              <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
                              <option <?php if($trainee->course_id == $value->id) {echo 'selected';}?>  value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label> </label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                              </div>
                              <input name="admission_date" id="admission_date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask value="<?= $trainee->admission_date; ?>">
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12" style="background: #9ea09f; padding:7px 10px; font-weight: bold;margin-bottom: 7px;">
                     Personal Information 
                  </div>
                  <div class="row" >
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Name : </label>
                           <input type="text" name="name" id="name" class="form-control" value="<?= $trainee->name; ?>"   >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Father's Name : </label>
                           <input type="text"  name="father" id="father"  class="form-control" value="<?= $trainee->father; ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Mother's Name : </label>
                           <input type="text" name="mother" id="mother" class="form-control" value="<?= $trainee->mother; ?>"  >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Date of Birth</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                              </div>
                              <input name="dob" id="dob" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask value="<?= $trainee->dob; ?>">
                           </div>
                        </div>
                     </div><div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Mobile</label>
                           <input type="text" name="mobile" id="mobile" class="form-control"  minlength="11" maxlength="11" required value="<?= $trainee->mobile; ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email" id="email" class="form-control" value="<?= $trainee->email; ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>NID</label>
                           <input type="number" name="nid" id="nid" class="form-control" value="<?= $trainee->nid; ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Birth Registration</label>
                           <input type="number" name="birth" id="bid" class="form-control" value="<?= $trainee->birth; ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Gender</label>
                           <select class="form-control" name="gender" required>
                              <option value="">Select</option>
                              <option <?php if($trainee->gender == 'Male') {echo 'selected';}?> value="Male">Male</option>
                              <option <?php if($trainee->gender == 'Female') {echo 'selected';}?> value="Female">Female</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span>Religion</label>
                           <select class="form-control" name="religion" required>
                              <option value="">Select</option>
                              <option <?php if($trainee->religion == 'Islam') {echo 'selected';}?>  value="Islam">Islam</option>
                              <option <?php if($trainee->religion == 'Hinduism') {echo 'selected';}?>  value="Hinduism">Hinduism</option>
                              <option <?php if($trainee->religion == 'Christian') {echo 'selected';}?>  value="Christian">Christian</option>
                              <option <?php if($trainee->religion == 'Buddhism') {echo 'selected';}?>  value="Buddhism">Buddhism</option>
                              <option <?php if($trainee->religion == 'Others') {echo 'selected';}?>  value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Blod Groups</label>
                           <select class="form-control" name="blood">
                              <option value="">Select</option>
                              <option <?php if($trainee->blood == 'A(+)') {echo 'selected';}?>  value="A(+)">A(+)</option>
                              <option <?php if($trainee->blood == 'A(-)') {echo 'selected';}?>  value="A(-)">A(-)</option>
                              <option <?php if($trainee->blood == 'B(+)') {echo 'selected';}?>  value="B(+)">B(+)</option>
                              <option <?php if($trainee->blood == 'B(-)') {echo 'selected';}?>  value="B(-)">B(-)</option>
                              <option <?php if($trainee->blood == 'AB(+)') {echo 'selected';}?>  value="AB(+)">AB(+)</option>
                              <option <?php if($trainee->blood == 'AB(-)') {echo 'selected';}?>  value="AB(-)">AB(-)</option>
                              <option <?php if($trainee->blood == 'O(+)') {echo 'selected';}?>  value="O(+)">O(+)</option>
                              <option <?php if($trainee->blood == 'O(-)') {echo 'selected';}?>  value="O(-)">O(-)</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Register as Blood Donor</label>
                           <select class="form-control" name="donor">
                              <option value="">Select</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                           </select>
                        </div>
                     </div>      
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Gurdian</label>
                           <input type="text" name="gurdian" id="gurdian" class="form-control"  value="<?= $trainee->gurdian; ?>">
                        </div>
                     </div>                     
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Relation with trainee</label>                           
                           <select class="form-control" name="relation">
                              <option value="">Select</option>
                              <option <?php if($trainee->relation == 'Father') {echo 'selected';}?> value="Father">Father</option>
                              <option <?php if($trainee->relation == 'Mother') {echo 'selected';}?> value="Mother">Mother</option>
                              <option <?php if($trainee->relation == 'Spouse') {echo 'selected';}?> value="Spouse">Spouse</option>
                              <option <?php if($trainee->relation == 'Brother / Sister') {echo 'selected';}?> value="Brother / Sister">Brother / Sister</option>
                              <option <?php if($trainee->relation == 'Others') {echo 'selected';}?> value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> Mobile</label>
                           <input type="text" name="gurdian_mobile" id="mobile" class="form-control"  minlength="11" maxlength="11"  value="<?= $trainee->gurdian_mobile; ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> email</label>
                           <input type="text" name="email" id="mobile" class="form-control"  minlength="11" maxlength="11"  value="<?= $trainee->email; ?>" >
                        </div>
                     </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                        <div class="col-md-12" style="background: #c4c455; padding:7px 10px; font-weight: bold; margin-bottom: 7px;">
                           Permanent Address (Avoid if no changes)
                        </div>                        
                        <div class="row">                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><span style="color:red;">*</span> Division</label>
                                 <select class="form-control " name="pdivision" id="division">
                                    <option>Division</option>
                                    <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                                    <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><span style="color:red;">*</span> District</label>
                                 <select class="form-control " name="pdistrict" id="district">
                                    <option>District</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><span style="color:red;">*</span> Upazila</label>
                                 <select class="form-control " name="pupazila" id="upazila">
                                    <option>Upazila</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Village/House</label>
                                 <input type="text" name="pvillage" id="address" class="form-control"  value="<?= $trainee->village; ?>"  >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Office</label>
                                 <input type="text" name="ppost" id="address" class="form-control"  value="<?= $trainee->post; ?>"  >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Code</label>
                                 <input type="text" name="ppost_code" id="address" class="form-control"  value="<?= $trainee->post_code; ?>"  >
                              </div>
                           </div> 
                        </div>
                     </div>
                     <div class="col-sm-6">                        
                        <div class="col-md-12" style="background: #c4c455; padding:7px 10px; font-weight: bold; margin-bottom: 7px;">
                           Present Address (Avoid if no changes)
                        </div>   
                        <div class="row"> 
                           <div class="col-md-4">
                               <label> Same as present </label> <br>
                               <input style="width:30px; height: 30px;" type="checkbox" name="same" value="1">
                           </div>                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Division</label>
                                 <select class="form-control " name="prdivision" id="division2">
                                    <option>Division</option>
                                    <?php foreach ($this->Home_model->get_divisions() as $key => $value) { ?>
                                    <option value="<?php echo $value->division ;?>" > <?php echo $value->division ;?> </option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>District</label>
                                 <select class="form-control " name="prdistrict" id="district2">
                                    <option>District</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Upazila</label>
                                 <select class="form-control " name="prupazila" id="upazila2">
                                    <option>Upazila</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Village/House</label>
                                 <input type="text" name="prvillage" id="address" class="form-control"  value="<?= $trainee->pvillage; ?>"  >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Office</label>
                                 <input type="text" name="prpost" id="address" class="form-control"  value="<?= $trainee->ppost; ?>" >
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Post Code</label>
                                 <input type="text" name="prpost_code" id="address" class="form-control"  value="<?= $trainee->ppost_code; ?>" >
                              </div>
                           </div> 
                        </div>                     
                     </div>
                     
                   
                     <div class="col-md-12" style="background: #c4c455; padding:7px 10px; font-weight: bold; margin-bottom: 7px;">
                        Academic Qualification 
                     </div>
                        <?php $edu = $this->Institute_model->education($trainee->regi); ?>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Select Exam</label>
                           <select class="form-control " name="exam" >
                              <option <?php if ($edu->exam == 'PSC' ) { echo 'selected'; } ?> value="PSC">PSC</option>
                              <option <?php if ($edu->exam == 'JSC' ) { echo 'selected'; } ?> value="JSC">JSC</option>
                              <option <?php if ($edu->exam == 'SSC' ) { echo 'selected'; } ?> value="SSC">SSC/Equivalent</option>
                              <option <?php if ($edu->exam == 'HSC' ) { echo 'selected'; } ?> value="HSC">HSC/Equivalent</option>
                              <option <?php if ($edu->exam == 'Honors/Equivalent' ) { echo 'selected'; } ?> value="Honors/Equivalent">Honors/Equivalent</option>
                              <option <?php if ($edu->exam == 'Masters/Equivalent' ) { echo 'selected'; } ?> value="Masters/Equivalent">Masters/Equivalent</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Roll</label>
                           <input type="number" name="roll"  class="form-control" value="<?php echo $edu->roll; ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Board / University</label>
                           <select class="form-control" name="board">
                              <option <?php if ($edu->board == 'Dhaka' ) { echo 'selected'; } ?> value="Dhaka">Dhaka</option>
                              <option <?php if ($edu->board == 'Rajshahi' ) { echo 'selected'; } ?> value="Rajshahi">Rajshahi</option>
                              <option <?php if ($edu->board == 'Comilla' ) { echo 'selected'; } ?> value="Comilla">Comilla</option>
                              <option <?php if ($edu->board == 'Jessore' ) { echo 'selected'; } ?> value="Jessore">Jessore</option>
                              <option <?php if ($edu->board == 'Chittagong' ) { echo 'selected'; } ?> value="Chittagong">Chittagong</option>
                              <option <?php if ($edu->board == 'Barishal' ) { echo 'selected'; } ?> value="Barishal">Barishal</option>
                              <option <?php if ($edu->board == 'Sylhet' ) { echo 'selected'; } ?> value="Sylhet">Sylhet</option>
                              <option <?php if ($edu->board == 'Dinajpur' ) { echo 'selected'; } ?> value="Dinajpur">Dinajpur</option>
                              <option <?php if ($edu->board == 'Mymensingh' ) { echo 'selected'; } ?> value="Mymensingh">Mymensingh</option>
                              <option <?php if ($edu->board == 'BOU' ) { echo 'selected'; } ?> value="BOU">BOU</option>
                              <option <?php if ($edu->board == 'Madrasah' ) { echo 'selected'; } ?> value="Madrasah">Madrasah</option>
                              <option <?php if ($edu->board == 'Technical' ) { echo 'selected'; } ?> value="Technical">Technical</option>
                              <option <?php if ($edu->board == 'National University' ) { echo 'selected'; } ?> value="National University">National University</option>
                              <option  <?php if ($edu->board == 'Others' ) { echo 'selected'; } ?> value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Passing Year</label>
                           <input type="number" name="passing_year" class="form-control" value="<?php echo $edu->passing_year; ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Result</label>
                           <input type="text" name="result" id="result" class="form-control" placeholder="GPA" value="<?php echo $edu->result ?>"  >
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Select Exam</label>
                           <select class="form-control " name="exam2" >
                              <option <?php if ($edu->exam2 == 'PSC' ) { echo 'selected'; } ?> value="PSC">PSC</option>
                              <option <?php if ($edu->exam2== 'JSC' ) { echo 'selected'; } ?> value="JSC">JSC</option>
                              <option <?php if ($edu->exam2 == 'SSC' ) { echo 'selected'; } ?> value="SSC">SSC/Equivalent</option>
                              <option <?php if ($edu->exam2 == 'HSC' ) { echo 'selected'; } ?> value="HSC">HSC/Equivalent</option>
                              <option <?php if ($edu->exam2 == 'Honors/Equivalent' ) { echo 'selected'; } ?> value="Honors/Equivalent">Honors/Equivalent</option>
                              <option <?php if ($edu->exam2 == 'Masters/Equivalent' ) { echo 'selected'; } ?> value="Masters/Equivalent">Masters/Equivalent</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Roll</label>
                           <input type="number" name="roll2" id="roll[]" class="form-control" value="<?php echo $edu->roll2; ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Board / University</label>
                           <select class="form-control" name="board2">
                              <option  <?php if ($edu->board2 == 'Dhaka' ) { echo 'selected'; } ?> value="Dhaka">Dhaka</option>
                              <option <?php if ($edu->board2 == 'Rajshahi' ) { echo 'selected'; } ?> value="Rajshahi">Rajshahi</option>
                              <option <?php if ($edu->board2 == 'Comilla' ) { echo 'selected'; } ?> value="Comilla">Comilla</option>
                              <option <?php if ($edu->board2 == 'Jessore' ) { echo 'selected'; } ?> value="Jessore">Jessore</option>
                              <option <?php if ($edu->board2 == 'Chittagong' ) { echo 'selected'; } ?> value="Chittagong">Chittagong</option>
                              <option <?php if ($edu->board2 == 'Barishal' ) { echo 'selected'; } ?> value="Barishal">Barishal</option>
                              <option <?php if ($edu->board2 == 'Sylhet' ) { echo 'selected'; } ?> value="Sylhet">Sylhet</option>
                              <option <?php if ($edu->board2 == 'Dinajpur' ) { echo 'selected'; } ?> value="Dinajpur">Dinajpur</option>
                              <option <?php if ($edu->board2 == 'Mymensingh' ) { echo 'selected'; } ?> value="Mymensingh">Mymensingh</option>
                              <option <?php if ($edu->board2 == 'BOU' ) { echo 'selected'; } ?> value="BOU">BOU</option>
                              <option <?php if ($edu->board2 == 'Madrasah' ) { echo 'selected'; } ?> value="Madrasah">Madrasah</option>
                              <option <?php if ($edu->board2 == 'Technical' ) { echo 'selected'; } ?> value="Technical">Technical</option>
                              <option <?php if ($edu->board2 == 'National University' ) { echo 'selected'; } ?> value="National University">National University</option>
                              <option  <?php if ($edu->board == 'Others' ) { echo 'selected'; } ?> value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label>Passing Year</label>
                           <input type="number" name="passing_year2" class="form-control" value="<?php echo $edu->passing_year2; ?>" >
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Result</label>
                           <input type="text" name="result2" id="result" class="form-control" placeholder="GPA" value="<?php echo $edu->result2 ?>"  >
                        </div>
                     </div>

                     <div class="col-md-12" style="background: #9ea09f; padding:7px 10px; font-weight: bold;margin-bottom: 7px;">
                        Media Information
                     </div>    
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><span style="color:red;">*</span> PP size Photo (< 100 KB)</label>
                           <input name="userfile" id="uploadFile" type="file" class="form-control" accept=".jpg">
                        </div>
                        <div id="imagePreview" class="well" > <img width="50px" src="<?php echo base_url() ?>upload/user/<?= $trainee->userfile; ?>"></div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>NID / Birth Regi (<200 KB)</label>
                           <input name="userfile2" id="uploadFile2" type="file" class="form-control" accept=".jpg">
                        </div>
                        <div id="imagePreview2" class="well" ><img width="50px" src="<?php echo base_url() ?>upload/document/<?= $trainee->userfile2; ?>"></div>
                     </div>
                  </div>
               </div>
               <center>
                  <hr style="margin:0; margin-top:5px; padding:5px;">
                  <button type="submit" name="submit" class="btn btn-success"> Update Now</button>
                  <center>
                     <!-- <input type="submit" value="সাবমিট" class="btn btn-success"> -->
                  </center>
               </center>
            </div>
            </form>
         </div> 
      </div>
   </div> 
   <?php } ?>
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
<script type="text/javascript">
   $(document).ready(function(){
    $('#division2').change(function(){
     var division = $('#division2').val();
     if(division != '')
     {
      $.ajax({
       url:"<?php echo site_url()?>home/fetch_district",
       method:"POST",
       data:{division:division},
       success:function(data)
       {
        $('#district2').html(data);
       }
      });
     }
     else
     {
      $('#district2').html('<option value="">Select</option>');
     }
    });
   
    $('#district2').change(function(){
     var district = $('#district2').val();
     if(district != '')
     {
      $.ajax({
       url:"<?php echo site_url()?>home/fetch_upazila",
       method:"POST",
       data:{district:district},
       success:function(data)
       {
        $('#upazila2').html(data);
       }
      });
     }
     else
     {
      $('#upazila2').html('<option value="">Select</option>');
     }
    });
   
    $('#upazila2').change(function(){
     var upazila = $('#upazila2').val();
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
       document.getElementById("srt").value = document.getElementById("Ultra").value;
   }
</script>

    <script type="text/javascript">
        $(function () {
            $("#uploadFile").on("change", function ()
            {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function () { // set image data as background of div
                        $("#imagePreview").css("background-image", "url(" + this.result + ")");
                    }
                }
            });
        });
    </script>    
    <script type="text/javascript">
        $(function () {
            $("#uploadFile2").on("change", function ()
            {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function () { // set image data as background of div
                        $("#imagePreview2").css("background-image", "url(" + this.result + ")");
                    }
                }
            });
        });
    </script>

