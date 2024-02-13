<style type="text/css">
   tabbed-content{
    height:297mm;
    width:210mm;
}
@media print{@page {size: landscape}}
.card {
      height: 8.5cm;
      width: 5.5cm;
      border: 1px solid black;
      margin-right: 10px;
   }

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}   



.break-after {
    display: block;
    page-break-after: always;
    position: relative;
}

.break-before {
    display: block;
    page-break-before: always;
    position: relative;
}
   .break-after:last-child {
   clear: both;      
   page-break-before: avoid !important;
   padding-top: 15px;
   }

span  {
  display: block;
  margin-bottom: -18px; /** Change this value to whatever you wish **/
  margin-top: -9px; /** Change this value to whatever you wish **/
}

label {
   display: block;
  margin-bottom: -18px; /** Change this value to whatever you wish **/
  margin-top: -9px; 
}
</style>



<div class="well" style="margin :20px;" >
     <section class="tabs">
         <div class="tabbed-content" > 
            <table>                  
               <tr>
           
                  <td>
                     <div class="card center" style="
                        padding:5px;
                        background-color: rgba(210,130,240, 0.3) !important;
                        background-image: url(<?= base_url(); ?>upload/logo/id.jpg);
                        background-size: 101%;
                        /* border-bottom: 12px solid green; */
                        ">
                        <img class="center" width="44px" src="<?php echo base_url();?>upload/logo/<?php echo $site->userfile; ?>">
                        <div class="text-center" style="color: darkgoldenrod; text-transform: uppercase; ">
                           <div style="text-align:center; font-size:10pt; line-height: 10pt; background:#052988; color: white; padding: 2px 0px"><b> <?php echo $site->site_name; ?>  </b></div>
                           <div style="text-align:center; font-size:9pt; background:green; color: yellow;margin-top:2px"><b>Code : <?php echo $site->code; ?></b></div>
                        </div>
                        <img style="margin-top: 5px;border-radius: 12%;width: 65px;height: 72px;" class="center" width="70px" src="<?php echo base_url();?>upload/user/<?php echo $t->userfile; ?>">
                        <div style="font-size:10pt; line-height:13pt">
                           Name : <b> <?php echo $t->name; ?></b> <br>
                           Session : <b> <?php echo $t->session; ?></b> <br>
                           Year : <b> <?php echo $t->year; ?></b> <br>
                           St. ID : <b><?php echo $t->regi; ?></b> <br>
                           Course : <b> <?php echo $t->course; ?><br>
                           </b>
                        </div>
                        <b>
                           <div style="text-align:right">
                              <img style="margin-top: -25px;margin-bottom: 15px;" width="80px" src="<?= base_url() ?>upload/signature/<?= $site->signature; ?>">
                              <span style="font-size:10px; display: block; margin-bottom: 0px; margin-top: -20px;">Authorise Signature</span>
                           </div>
                        </b>
                     </div>
                  </td>
                  <td style="padding-left:5px;">
                     <div class="card second" style="
                        padding:5px;
                        background-color: rgba(210,130,240, 0.3) !important;
                        background-image: url(<?= base_url(); ?>upload/logo/id.jpg);
                        background-size: 101%;
                        /* border-bottom: 12px solid green; */
                        ">
                        <div style=" padding:0px;">
                        <p style="text-align:center; margin-bottom: 0px; "><img width="50px" src="https://tif.org.bd/upload/logo/logo.png"><br>
                           This institute is affiliated by <br></p>
                        <p style="text-align:center;color: #f5f6f8;font-size: 12pt;background-color: green;margin-bottom: 0px;font-weight: bold; letter-spacing: -.8px; ">  TAWFIKA IT FOUNDATION (TIF) </p>
                        
                        <p style="text-align:center; font-size:10pt; line-height: 10pt; background:#052988; color: white; padding: 2px 0px; margin-top:2px;margin-bottom: 2px;"> https://tif.org.bd</p>
                        <p style="margin-bottom: 6px; text-align: center;"> Issue Date : <b> <?php echo $t->admission_date; ?></b>
                           <br>
                           <!--
                           Valid Till : <?php 
                           if($t->session == 'January-March') {$date = '31-3-'.$t->year; };
                           if($t->session == 'April-June') {$date = '30-06-'.$t->year; };
                           if($t->session == 'July-September') {$date = '30-9-'.$t->year; };
                           if($t->session == 'October-December') {$date = '31-12-'.$t->year; };
                           if($t->session == 'January-June') {$date = '30-6-'.$t->year; };
                           if($t->session == 'July-December') {$date = '31-12-'.$t->year; };
                           // $new_date = date('d-m-Y', strtotime('+1 months', strtotime($date)));
                           $new_date = date('d-m-Y', strtotime($date));?>
                            <b><?php echo $new_date; ?></b> -->
                        </p>
                        <p style="font-size: 9pt; text-align: center; margin-bottom: 7px; ">
                           If found this card please return to
                        </p>
                        <p style="text-align:center;">
                           <span style="font-size:11pt; font-weight: bold; line-height: 12pt;"> <?php echo $site->site_name; ?> </span> <br>
                           <span style="font-size:9.5pt;line-height: 10pt; margin-top:-4px;"><?php echo $site->address; ?>, <?php echo $site->upazila; ?>, <?php echo $site->district; ?> </span><br>
                           <span style="font-size:9.5pt;">Mobile : <?php echo $site->mobile; ?> </span><br>
                           <span style="font-size:9.5pt;">Web : <?php echo $site->domain; ?> </span><br>
                           <!-- <span style="font-size:9.5pt">Email : orbittrainings@gmail.com</span><br>    -->                 
                        </p>
                        </div>
                     </div>
                  </td>     
                  </tr>  
     
            </table>
       
             <!-- <div class="break-before">Page 2</div> -->
            </div>
            <button style="margin: 0px" class="no-print btn btn-primary" onclick="window.print()">Print this page</button>
     </section>
</div>
           



