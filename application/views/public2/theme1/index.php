<?php 
   $id = $this->session->userdata('uid');
   $site = $this->Home_model->site($id);
?>

<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>      
      <meta charset="utf-8">
      <title> সনদপত্র ব্যবস্থাপনা সিস্টেম :: <?=  $site->site_name ?></title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- ==== Favicons ==== -->
      <?php include 'css.php' ?>
   </head>
   <body>
      <?php if ($menu == 'Home') { ?>
      <div id="fakeLoader"></div>
      <?php } ?>
      <div id="menu">
         <!-- Promo Area Start --
            <div id="promo" class="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="container">
                        <p><strong>Cyber Monday! </strong>Up To<strong> 98% Off</strong> All Of Your New Order. Coupon Code: "<strong>cm98</strong>". Time Left: <strong data-counter-down="2021/11/29">00:00:00</strong></p>
                        <a href="#" class="btn btn-custom">Click Here</a>
            </div>
            </div>
            !--	Promo Area End --
            Primary Menu Start -->
         <!-- Primary Menu End -->
         <!-- Secondary Menu Start -->
         <nav id="secondaryMenu" class="navbar" data-sticky="true">
            <div class="container">
               <div class="navbar-header">
                  <!-- Logo Start -->
                  <a href="<?= base_url() ?>" class="navbar-brand">
                    <div style ="color:#E91E63; font-size:27px; margin-top: 0px;"> 
                     <img width="50px" src="<?php echo base_url() ?>upload/logo/<?=  $site->userfile ?>"> 
                     <?=  $site->site_name ?>
                  </div>
                  </a>
                  <!-- Logo End -->
               </div>
               <!-- Off-Canvas Menu Toggle Button Start -->
               <button class="btn menu-toggle-btn">
               <i class="fa fa-navicon"></i>
               </button>
               <!-- Off-Canvas Menu Toggle Button End -->
               <!-- Secondary Menu Links Start -->
               <div id="secondaryNavbar" class="navbar-right reset-padding hidden-sm hidden-xs">
                  <ul class="secondary-menu-links nav navbar-nav">
                     <li><a href="<?= base_url() ?>">প্রচ্ছদ</a></li>
                     <li><a href="<?= base_url() ?>home/about">আমাদের কথা</a></li>
                     <li><a href="<?= base_url() ?>home/instruction">নির্দেশনা</a></li>             
                     <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">আবেদন <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="<?= base_url() ?>home/apply">প্রত্যয়নের জন্য আবেদন </a></li>
                           <li><a href="<?= base_url() ?>home/citizen_apply">নাগরিক সনদের আবেদন </a></li>
                        </ul>
                     </li>
                     <li><a href="<?= base_url() ?>home/holding">হোল্ডিং কর</a></li>
                     <li><a href="<?= base_url() ?>home/verify">যাচাই</a></li>
                     <li><a href="<?= base_url() ?>home/contact">যোগাযোগ</a></li>
                     <li><a href="<?= base_url() ?>admin" class="dropdown-toggle" data-toggle="dropdown">লগইন</a></li>
                  </ul>
               </div>
               <!-- Secondary Menu Links End -->
            </div>
         </nav>
         <!-- Secondary Menu End -->
         <!-- Off-Canvas Menu Start -->
         <div class="off-canvas-menu">
            <!-- Off-Canvas Menu Close Button Start -->
            <button type="button" class="off-canvas-menu--close-btn"><i class="fa fa-close"></i></button>
            <!-- Off-Canvas Menu Close Button End -->
            <!-- Off-Canvas Menu Logo Start -->
            <div class="off-canvas-menu-logo">
               <a href="index.html">
                  <div style ="color:#FFEB3B; font-size:18px; margin-top: 10px;"> <samp style="color:#fff;font-family: SolaimanLipiNormal;"><?=  $site->site_name ?></samp></div>
               </a>
            </div>
            <!-- Off-Canvas Menu Logo End -->
            <!-- Off-Canvas Menu Links Start -->
            <ul class="nav nav-pills nav-stacked">
               <li><a href="<?= base_url() ?>">প্রচ্ছদ</a></li>
               <li><a href="#">আমাদের কথা</a></li>
               <li><a href="#">নির্দেশনা</a></li>
               <li><a href="#">আবেদন</a></li>
               <li><a href="#">যাচাই</a></li>
               <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">লগইন </a></li>
               <li><a href="#">যোগাযোগ</a></li>
            </ul>
            <!-- Off-Canvas Menu Links End -->
         </div>
         <div class="off-canvas-menu-overlay"></div>
         <!-- Off-Canvas Menu End -->
      </div>
      <!-- Menu Area End -->				
      <!-- Banner Area Start -->
  		<?php echo $public; ?>
      <!-- Testimonial Area End -->    
      <!-- Copyright Area Start -->
      <div id="copyright">
         <div class="container">
            <!-- Copyright Text Start -->
            <p class="left">&copy; ২০২১,   <a href="#"></a> <?=  $site->site_name ?></p>
            <!---  <p class="left">&copy; ২০১৮,   <a href="#"></a> বাস্তবায়নে : উপজেলা প্রশাসন, লক্ষীপুর সদর।</p> --->
            <!-- Copyright Text End -->
            <p class="right">কারিগরি সহযোগিতায়:  <a href="http://seba24.com.bd/">সেবা২৪ (প্রাঃ) লিমিটেড</a> </p>
         </div>
      </div>
      <!-- Copyright Area End -->
      <!-- Back To Top Button Start -->
      <div id="backToTop">
         <a href="body.html" data-animate-scroll="true"><i class="fa fa-angle-up"></i></a>
      </div>

      <?php include 'js.php' ?>
   </body>
   <!-- Mirrored from ucms.eservicebd.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Sep 2021 18:06:54 GMT -->
</html>