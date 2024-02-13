<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>::: <?php echo $menu ?> :::</title>
      <link rel="stylesheet " href="<?php echo base_url() ?>assets/front/css/print.css">
   </head>
   <body>
      <div class="bt-div">
         <INPUT TYPE="button" class="button blue" title="Print" onClick="window.print()" value="প্রিন্ট">
         <INPUT TYPE="button" class="button blue" title="Print" onclick="goBack()" value="পিছনে যান">
         <hr>
         Page size: A4		
      </div>
      <div class="wraper">
      <table width="100%">
         <tr>
            <td width="20%" height="102">
               <a href="#">
               <img src="<?php echo base_url() ?>upload/logo/<?php echo $this->data['userfile'] ?>" class="img_div" width="100" height="100"  alt=""/></a>
            </td>
            <td width="60%" align="center">
               <h1 style="margin:0"> 
                  <?php echo $this->data['site'] ?>
               </h1>
               <h3 style="margin-bottom: 20px;">ইউনিক আইডি আবেদন ফরম
               </h3>

               <lable style="border: 1px solid black; padding: 5px; border-radius: 10px;"> আবেদনের সর্বশেষ অবস্থা : <b class="btn btn-primary"> <?= $citizen->status ?> </b> </lable>
            </td>
            
            <td  width="20%" align="center">
               <img height="80px" src="<?php echo base_url() ?>images/<?= $citizen->qr ?>"> <br>
               ইউনিক আইডি নং :<strong style="font-family:SutonnyMJ; font-size:18px;"><?= $citizen->id ?></strong> 
            </td>
         </tr>
      </table>
      <hr>
      <br>
      <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table"  >
         <thead>
         </thead>
         <tbody>
            <tr>
               <td width="12%" align="left" nowrap="nowrap">ইউনিক আইডি</td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap" style="font-family:SutonnyMJ; font-size:18px;"><strong><?= $citizen->id ?></strong></td><td width="17%" align="left" nowrap="nowrap">পরিবার প্রধান </td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong ><?= $citizen->holding_parent? $citizen->holding_parent:'নিজ';?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">আবেদনকারীর নাম</td>
               <td align="left" nowrap="nowrap">:</td>
               <td width="29%" align="left" nowrap="nowrap"><strong><?= $citizen->name ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">এনআইডি নম্বর</td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong style="font-family:SutonnyMJ; font-size:18px;"><?= $citizen->nid ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">পিতার নাম</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $citizen->father ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">মাতার নাম</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $citizen->mother ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">বাড়ির নাম</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $citizen->home_name ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">হোল্ডিং নম্বর</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $citizen->holding ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">গ্রাম</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $citizen->village ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">ওয়ার্ড নম্বর</td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap" style="font-family:SutonnyMJ; font-size:18px;"><strong><?= $citizen->word ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">ইউনিয়ন</td>
               <td align="left" nowrap="nowrap">:</td>
               <td width="29%" align="left" nowrap="nowrap"><strong><?= $citizen->union ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">উপজেলা</td>
               <td align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong><?= $citizen->upazila ?></strong></td>
            </tr>
            <tr>
               <td align="left" nowrap="nowrap">জেলা </td>
               <td align="left" nowrap="nowrap">:</td>
               <td align="left" nowrap="nowrap"><strong><?= $citizen->district ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">বিভাগ</td>
               <td align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong><?= $citizen->division ?></strong></td>
            </tr>
      
            <tr>
               <td width="12%" height="21" align="left" nowrap="nowrap">মোবাইল নম্বর</td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="29%" align="left" nowrap="nowrap"><strong style="font-family:SutonnyMJ; font-size:18px;"><?= $citizen->mobile ?></strong></td>
               <td width="17%" align="left" nowrap="nowrap">ইমেইল এড্রেস</td>
               <td width="1%" align="left" nowrap="nowrap">:</td>
               <td width="40%" align="left" nowrap="nowrap"><strong><?= $citizen->email ?></strong></td>
            </tr>
         </tbody>
      </table>
      <p>
      <center>
         <br>
         <hr>
         আপনার আবেদনটি সফলভাবে গ্রহন করা হয়েছে;  কিছুক্ষনের মধ্যে
         আপনার আবেদন নম্বরটি আপনার মোবাইল ফোনে পাঠানো হবে।
         আপনার আবেদনটি অনুমোদন হলে আপনার মোবাইলে একটি ম্যাসেজ যাবে। উক্ত আবেদন নম্বর অথবা এই পেইজটি প্রিন্ট করে সংশ্লিষ্ট ইউডিসি অথবা ইউনিয়ন পরিষদে যোগাযোগ করুন।
         <hr>
      </center>
      <br>
      </p>											
      <div class="footer-text">
         <center>
         কারিগরি সহযোগীতায়: সেবা২৪ (প্রাঃ) লিমিটেড 
         <center>
      </div>
      <script>
         function goBack() {
         	window.history.back();
         }
         
         
         	
      </script>