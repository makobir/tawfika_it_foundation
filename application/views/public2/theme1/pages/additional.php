
<div id="pageTitle" class="bg--overlay" data-bg-img="img/page-header-img/bg.jpg">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="section-title">
               <h2>নাগরিক সনদের আবেদন</h2>
            </div>
         </div>
         <div class="col-md-6">
            <ul class="breadcrumb">
               <li><span>আপনি বর্তমানে আছেন:</span></li>
               <li><a href="<?= base_url() ?>">প্রচ্ছদ</a></li>
               <li class="active">নাগরিক সনদের আবেদন</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- Page Title Area End -->

<!-- Blog Area Start -->
<div id="blog" class="page">
   <div class="container">
      	<div class="formstyle">
         	<div class="row">
		      <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table"  >
		         <thead>
		         	<tr >
		         		<th style="text-align: center;" colspan="6">আবেদনকারীর তথ্যছক :</th>
		         	</tr>
		         </thead>
		         <tbody>
		            <tr>
		               <td width="12%" align="left" nowrap="nowrap">ইউনিক আইডি</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap" style="font-family:SutonnyMJ; font-size:18px;"><strong><?= $application->id ?></strong></td><td width="17%" align="left" nowrap="nowrap">পরিবার প্রধান </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap"><strong ><?= $application->holding_parent? $application->holding_parent:'নিজ';?></strong></td>
		            </tr>
		            <tr>
		               <td align="left" nowrap="nowrap">আবেদনকারীর নাম</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap"><strong><?= $application->name ?></strong></td>
		               <td width="17%" align="left" nowrap="nowrap">এনআইডি নম্বর</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap"><strong style="font-family:SutonnyMJ; font-size:18px;"><?= $application->nid ?></strong></td>
		            </tr>
		            <tr>
		               <td align="left" nowrap="nowrap">পিতার নাম</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap"><strong><?= $application->father ?></strong></td>
		               <td width="17%" align="left" nowrap="nowrap">মাতার নাম</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap"><strong><?= $application->mother ?></strong></td>
		            </tr>
		            <tr>
		               <td align="left" nowrap="nowrap">বাড়ির নাম</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap"><strong><?= $application->home_name ?></strong></td>
		               <td width="17%" align="left" nowrap="nowrap">হোল্ডিং নম্বর</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap"><strong><?= $application->holding ?></strong></td>
		            </tr>
		            <tr>
		               <td align="left" nowrap="nowrap">গ্রাম</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap"><strong><?= $application->village ?></strong></td>
		               <td width="17%" align="left" nowrap="nowrap">ওয়ার্ড নম্বর</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap" style="font-family:SutonnyMJ; font-size:18px;"><strong><?= $application->word ?></strong></td>
		            </tr>
		            <tr>
		               <td align="left" nowrap="nowrap">ইউনিয়ন</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap"><strong><?= $application->union ?></strong></td>
		               <td width="17%" align="left" nowrap="nowrap">উপজেলা</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap"><strong><?= $application->upazila ?></strong></td>
		            </tr>
		            <tr>
		               <td align="left" nowrap="nowrap">জেলা </td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td align="left" nowrap="nowrap"><strong><?= $application->district ?></strong></td>
		               <td width="17%" align="left" nowrap="nowrap">বিভাগ</td>
		               <td align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap"><strong><?= $application->division ?></strong></td>
		            </tr>
		      
		            <tr>
		               <td width="12%" height="21" align="left" nowrap="nowrap">মোবাইল নম্বর</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap"><strong style="font-family:SutonnyMJ; font-size:18px;"><?= $application->mobile ?></strong></td>
		               <td width="17%" align="left" nowrap="nowrap">ইমেইল এড্রেস</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap"><strong><?= $application->email ?></strong></td>
		            </tr>
		         </tbody>
		      </table>
		      <br>
		       <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table" id="myTable" >
		       		<?php if ($this->session->userdata('type') == 'income') { ?>
		       		<form method="post" action="<?= base_url() ?>Home/additional_info">
		            <tr>
		               <td width="12%" height="21" align="left" nowrap="nowrap">বাৎসরিক আয়</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap">
		               		<input type="text" name="income" class="form-control" placeholder="বাৎসরিক আয়">
		               </td>
		               <td width="17%" align="left" nowrap="nowrap"></td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap"><strong></strong></td>
		            </tr>
		        	<?php } ?>
		       		<?php if ($this->session->userdata('type') == 'name') { ?>
		       		<form method="post" action="<?= base_url() ?>Home/additional_info">
		            <tr>
		               <td width="12%" height="21" align="left" nowrap="nowrap">ব্যবহৃত অন্য নাম</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap">
		               		<input type="text" name="dup_name" class="form-control" placeholder="ব্যবহৃত অন্য নামটি লিখুন">
		               </td>
		               <td width="17%" align="left" nowrap="nowrap"></td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap"><strong></strong></td>
		            </tr>
		        	<?php } ?>
		       		<?php if ($this->session->userdata('type') == 'trade') { ?>
		       		<form method="post" action="<?= base_url() ?>Home/additional_info">
		            <tr>
		               <td width="12%" height="21" align="left" nowrap="nowrap">ব্যবসা প্রতিষ্ঠানের ধরণ </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap">
		               		<select name="shop_type" class="form-control">
		               			<option value="মুদী মনোহারী"> মুদী মনোহারী</option>
		               			<option value="কাচামাল"> কাচামাল</option>
		               			<option value="ঔষধের দোকান"> ঔষধের দোকান</option>
		               		</select>
		               </td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">ওয়ার্ড নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap">
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
		               </td>
		            </tr>
		            <tr>
		               <td width="12%" height="21" align="left" nowrap="nowrap">ব্যবসা প্রতিষ্ঠানের নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="29%" align="left" nowrap="nowrap">
		               		<input type="text" name="shop_name" class="form-control" placeholder="ব্যবসা প্রতিষ্ঠানের নাম">
		               </td>
		               <td width="17%" align="left" nowrap="nowrap"> ঠিকানা</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="40%" align="left" nowrap="nowrap">
		               		<input type="" name="shop_address" class="form-control" placeholder="ব্যবসা প্রতিষ্ঠানের ঠিকানা">
		               	</td>
		            </tr>
		        	<?php } ?>
		       		<?php if ($this->session->userdata('type') == 'warishan') { ?>
		       		<form method="post" action="<?= base_url() ?>Home/additional_info">
		       		<tr> 
		       			<td colspan="8" style="font-size: 24px;"> ওয়ারিশানগণের নাম </td>
		       			<td> <button type="button" class="btn btn-primary" onclick="myFunction()"><i class="fa fa-plus"></i>  নতুন ওয়ারিশান যোগ করুন</button></td> 
		       		</tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		            <tr>
		               <td width="8%" height="21" align="left" nowrap="nowrap">নাম </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="wname[]" class="form-control" placeholder="ওয়ারিশানের নাম">
		               </td>
		               <td width="8%" align="left" nowrap="nowrap"> সম্পর্ক</td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="18%" align="left" nowrap="nowrap">
		               	<select name="relation[]" class="form-control">
		               		<option value="">সম্পর্ক নির্বাচন করুন </option>
		               		<option value="স্বামী">স্বামী </option>
		               		<option value="স্ত্রী">স্ত্রী </option>
		               		<option value="ছেলে">ছেলে </option>
		               		<option value="মেয়ে">মেয়ে </option>
		               	</select>		               		
		               	</td>
		               <td width="12%" height="21" align="left" nowrap="nowrap">জাতীয় পরিচয়পত্র নং </td>
		               <td width="1%" align="left" nowrap="nowrap">:</td>
		               <td width="20%" align="left" nowrap="nowrap">
		               		<input type="" name="nid[]" class="form-control" placeholder="জাতীয় পরিচয়পত্র নং">
		               </td>
		            </tr>
		        	<?php } ?>
		       </table>
		       <div class="container" align="center">
		       		<button type="submit" class="btn btn-success"> আবেদন জমা দিন</button>
		       </div>
		   	</form>
	    	</div>
		</div>
	</div>
</div>


<script>
function myFunction() {
  var table = document.getElementById("myTable");
  var row = table.insertRow(7);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  cell1.innerHTML = "নাম";
  cell2.innerHTML = ":";
  cell3.innerHTML = "<input  name='wname[]' class='form-control' placeholder='ওয়ারিশানের নাম'>";
  cell4.innerHTML = "সম্পর্ক";
  cell5.innerHTML = ":";
  cell6.innerHTML = "<select name='relation[]' class='form-control'><option value='স্বামী'>স্বামী </option><option value='স্ত্রী'>স্ত্রী  </option><option value='ছেলে'>ছেলে </option><option value='মেয়ে'>মেয়ে </option></select>";
}
</script>