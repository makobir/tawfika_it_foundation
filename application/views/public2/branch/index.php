

<head>
   <!-- Meta data --> 
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content=" Eudica - Online Education &amp; Learning Courses HTML CSS Responsive Template" name="description">
   <meta content="Spruko Technologies Private Limited" name="author">
   <meta name="keywords" content="html rtl, html dir rtl, rtl website template, bootstrap 4 rtl template, rtl bootstrap template, admin panel template rtl, admin panel rtl, html5 rtl, academy training course css template, classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, marketplace html template premium, learning management system jquery html, clean online course teaching directory template, online learning course management system, online course website template css html, premium lms training web template, training course responsive website">
   <!-- Favicon --> 
   <link rel="icon" href="<?php echo base_url() ?>assets/branch/images/brand/favicon.ico" type="image/x-icon">
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/branch/images/brand/favicon.ico">
   <!-- Title --> 
   <title><?php $site = $this->Authenticator_model->site();
   echo $title.' | ' .$site->site_name ; ?></title>
   <!-- Bootstrap css --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!-- Style css --> 
   <link href="<?php echo base_url() ?>assets/branch/style.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>assets/branch/skin-modes.css" rel="stylesheet">
   <!-- Font-awesome  css --> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/branch/fontawesome-free/css/all.min.css">

   <!--Select2 css --> 
   <link href="<?php echo base_url() ?>assets/branch/select2.min.css" rel="stylesheet">
   <!-- Cookie css --> 
   <link href="<?php echo base_url() ?>assets/branch/cookie.css" rel="stylesheet">
   <!-- Owl Theme css--> 
   <link href="<?php echo base_url() ?>assets/branch/owl.carousel.css" rel="stylesheet">
   <!-- Custom scroll bar css--> 
   <link href="<?php echo base_url() ?>assets/branch/jquery.mCustomScrollbar.css" rel="stylesheet">
   <!-- Switcher css --> 
   <link href="<?php echo base_url() ?>assets/branch/switcher.css" rel="stylesheet" id="switcher-css" type="text/css" media="all">
   <!-- Color Skin css --> 
   <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/branch/color6.css">
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/branch/demo.css">
 
   <meta http-equiv="imagetoolbar" content="no">
   <style type="text/css" media="print">
      <!-- body{display:none} -->
   </style>

<body>
  <div class="cover-image bg-background3" data-image-src="<?= base_url() ?>upload/slider/2.jpg" style="background: url(&quot;<?= base_url() ?>upload/slider/2.jpg&quot;) center center;">
   <div class="header-main">
      <div class="top-bar">
         <div class="container">
            <div class="row">
               <div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                  <div class="top-bar-left d-flex">
                     <div class="clearfix">
                        <ul class="socials">
                           <li> <a class="social-icon text-dark" href="#"><i class="fa fa-facebook"></i></a> </li>
                           <li> <a class="social-icon text-dark" href="#"><i class="fa fa-twitter"></i></a> </li>
                           <li> <a class="social-icon text-dark" href="#"><i class="fa fa-linkedin"></i></a> </li>
                           <li> <a class="social-icon text-dark" href="#"><i class="fa fa-google-plus"></i></a> </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                  <div class="top-bar-right">
                     <ul class="custom">
                        <?php if ($this->session->userdata('id') == NULL ) { ?>
                        <li> <a href="register.html" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Register</span></a> </li>
                        <li> <a href="login.html" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Login</span></a> </li>
                        <?php } else { ?>
                        <li class="dropdown">
                           <a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> My Dashboard<i class="fa fa-caret-down text-white ml-1"></i></span></a> 
                           <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> <a href="mydash.html" class="dropdown-item"> <i class="dropdown-icon icon icon-user"></i> My Profile </a> <a class="dropdown-item" href="#"> <i class="dropdown-icon icon icon-speech"></i> Inbox </a> <a class="dropdown-item" href="#"> <i class="dropdown-icon icon icon-bell"></i> Notifications </a> <a href="mydash.html" class="dropdown-item"> <i class="dropdown-icon  icon icon-settings"></i> Account Settings </a> <a class="dropdown-item" href="#"> <i class="dropdown-icon icon icon-power"></i> Log out </a> </div>
                        </li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/Topbar--> <!--Header--> 
      <header class="header-search header-logosec p-2">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-12">
                  <div class="header-search-logo d-none d-lg-block"> 
                     <a class="header-logo" href="<?= base_url() ?>"> 
                     <img src="<?= base_url() ?>upload/logo/<?php echo $site->userfile ; ?>" class="header-brand-img" alt=" logo"> 
                     <img src="<?= base_url() ?>upload/logo/<?php echo $site->userfile ; ?>" class="header-brand-img header-white" alt="logo"> </a> 
                     <span style="color: white; font-size: 30px;"> <?php echo $site->site_name ; ?></span>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!--/Header--> <!-- Mobile Header --> 
      <div class="sticky" style="margin-bottom: 0px;">
         <div class="horizontal-header clearfix ">
            <div class="container"> 
               <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a> 
               <span class="smllogo">
                  <img src="<?= base_url() ?>upload/logo/<?php echo $site->userfile ; ?>" width="40" alt="img"></span> 
                  <span class="smllogo-white">
                     <img src="<?= base_url() ?>upload/logo/<?php echo $site->userfile ; ?>" width="40" alt="img">
                  </span> 
                  <a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a> 
               </div>
         </div>
      </div>
      <div class="jumps-prevent" style="padding-top: 0px;"></div>
      <!-- /Mobile Header --> <!--Horizontal-main --> 
      <div id="sticky-wrapper" class="sticky-wrapper" style="height: 50.9896px;">
         <div class="header-style horizontal-main bg-dark-transparent clearfix" style="width: 1498.89px;">
            <div class="horizontal-mainwrapper container clearfix">
               <nav class="horizontalMenu clearfix d-md-flex">
                  <div class="horizontal-overlapbg"></div>
                  <ul class="horizontalMenu-list">
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>" class="<?php if($title == 'Home') {echo 'active'; }?>">Home</a>
                     </li>
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>home/about" class="<?php if($title == 'About Us') {echo 'active'; }?>">About Us</a>
                     </li>
                     <li aria-haspopup="true">
                        <span class="horizontalMenu-click">
                           <i class="horizontalMenu-arrow fa fa-angle-down"></i>
                        </span>
                        <a class="<?php if($menu == 'Courses') {echo 'active'; }?>" href="#" >Courses<span class="fe fe-chevron-down m-0"></span></a> 
                        <ul class="sub-menu">
                           <li><a href="register.html">Register</a></li>
                           <li><a href="login.html">Login</a></li>
                        </ul>
                     </li>
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>home/admission" class="<?php if($title == 'Admission') {echo 'active'; }?>">Admission</a>
                     </li>
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>home/notice" class="<?php if($title == 'Notice') {echo 'active'; }?>">Notice</a>
                     </li>
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>home/news" class="<?php if($title == 'News') {echo 'active'; }?>">News</a>
                     </li>
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>home/events" class="<?php if($title == 'Events') {echo 'active'; }?>">Events</a>
                     </li>
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>home/gallery" class="<?php if($title == 'Gallery') {echo 'active'; }?>">Gallery</a>
                     </li>
                     <li aria-haspopup="true" class="">
                        <a href="<?= base_url() ?>home/contact" class="<?php if($title == 'Contact') {echo 'active'; }?>">Contact</a>
                     </li>

                     <li aria-haspopup="true" class="d-lg-none mt-5 pb-5 mt-lg-0"> <span><a class="btn btn-info" href="ad-posts.html">Register Now</a></span> </li>
                  </ul>
                  <ul class="mb-0">
                     <li aria-haspopup="true" class="d-none d-lg-block "> <span><a class="btn btn-primary  ad-post" href="ad-posts.html">Enroll Now</a></span> </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>

<?php if ($title != 'Home') { ?>
   <!--/Horizontal-main --> <!--Section--> 
   <section>
      <div class="sptb-2 bannerimg">
         <div class="header-text mb-0">
            <div class="container">
               <div class="text-center text-white ">
                  <h1 class=""><?= $title; ?></h1>
                  <ol class="breadcrumb text-center">
                     <li class="breadcrumb-item"><a href="#"><?= $menu; ?></a></li>
                     <li class="breadcrumb-item active text-white" aria-current="page"><?= $title; ?></li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--/Section--> 
<?php } ?>
</div>

         <!--/Horizontal-main --> <!--Section--> 
      <?php echo $public; ?>
      <section>
         <footer class="bg-dark text-white">
            <div class="footer-main">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 col-md-12">
                        <h6>About</h6>
                        <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis exercitation ullamco laboris</p>
                        <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                     </div>
                     <div class="col-lg-2 col-md-12">
                        <h6>Our Services</h6>
                        <hr class="deep-purple text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul class="list-unstyled mb-0">
                           <li><a href="javascript:;">Our Team</a></li>
                           <li><a href="javascript:;">Contact US</a></li>
                           <li><a href="javascript:;">About</a></li>
                           <li><a href="javascript:;">Services</a></li>
                           <li><a href="javascript:;">Blog</a></li>
                           <li><a href="javascript:;">Terms and Services</a></li>
                        </ul>
                     </div>
                     <div class="col-lg-3 col-md-12">
                        <h6>Contact</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul class="list-unstyled mb-0">
                           <li> <a href="#"><i class="fa fa-home mr-3 text-primary"></i> New York, NY 10012, US</a> </li>
                           <li> <a href="#"><i class="fa fa-envelope mr-3 text-primary"></i> info12323@example.com</a></li>
                           <li> <a href="#"><i class="fa fa-phone mr-3 text-primary"></i> + 01 234 567 88</a> </li>
                           <li> <a href="#"><i class="fa fa-print mr-3 text-primary"></i> + 01 234 567 89</a> </li>
                        </ul>
                        <ul class="list-unstyled list-inline mt-3">
                           <li class="list-inline-item"> <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-facebook"></i> </a> </li>
                           <li class="list-inline-item"> <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-twitter"></i> </a> </li>
                           <li class="list-inline-item"> <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-google-plus"></i> </a> </li>
                           <li class="list-inline-item"> <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-linkedin"></i> </a> </li>
                        </ul>
                     </div>
                     <div class="col-lg-4 col-md-12">
                        <h6>Subscribe</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <div class="clearfix"></div>
                        <div class="input-group w-100">
                           <input type="text" class="form-control br-tl-3  br-bl-3 " placeholder="Email"> 
                           <div class="input-group-append "> <button type="button" class="btn btn-primary br-tr-3  br-br-3"> Subscribe </button> </div>
                        </div>
                        <h6 class="mb-0 mt-5">Payments</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-2 mt-3 d-inline-block mx-auto">
                        <div class="clearfix"></div>
                        <ul class="footer-payments">
                           <li class="pl-0"><a href="javascript:;"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
                           <li><a href="javascript:;"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
                           <li><a href="javascript:;"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a></li>
                           <li><a href="javascript:;"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></a></li>
                           <li><a href="javascript:;"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-dark  text-white p-0">
               <div class="container">
                  <div class="row d-flex">
                     <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center "> Copyright © 2019 <a href="#" class="fs-14 text-primary">Eudica</a>. Offlineed by <a href="#" class="fs-14 text-primary"> Spruko Technologies Pvt.Ltd </a> All rights reserved. </div>
                  </div>
               </div>
            </div>
         </footer>
      </section>
      <!--/Footer Section--> <!-- Back to top --> <a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-long-arrow-up"></i></a> <!-- JQuery js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/jquery-3.2.1.min.js"></script><script type="text/javascript"><!--
         uybo("@$i)>84.y!00?KkWa;e(Slz");
         -->
      </script> <!-- Bootstrap js --> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/popper.min.js"></script><script type="text/javascript"><!--
         uybo("@");
         -->
      </script> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/bootstrap.min.js"></script><script type="text/javascript"><!--
         uybo("@$i)>j<:G-6rP_CGLb8w&-Ep©=#G");
         -->
      </script> <!--JQuery Sparkline js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/jquery.sparkline.min.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8ZRq6sL_I>!C/nRN-Ep©=#G");
         -->
      </script> <!-- Circle Progress js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/circle-progress.min.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8ObF-BUN6\'#C4IRS<Ov");
         -->
      </script> <!-- Star Rating js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/jquery.rating-stars.js"></script><script type="text/javascript"><!--
         uybo("@$i)>Ms:©!/v6kgf2&$T");
         -->
      </script> <!--Counters js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/counterup.min.js"></script><script type="text/javascript"><!--
         uybo("@");
         -->
      </script> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/waypoints.min.js"></script><script type="text/javascript"><!--
         uybo("@");
         -->
      </script> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/numeric-counter.js"></script><script type="text/javascript"><!--
         uybo("@$i)>PHmx95vg©,Vg4IRq<Jj?");
         -->
      </script> <!--Owl Carousel js --> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/owl.carousel.js"></script><script type="text/javascript"><!--
         uybo("@$i)>0sTNuAOiKAWqQmoq6C$©o>");
         -->
      </script> <!--Horizontal Menu js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/horizontal-menu/horizontal-menu.js"></script><script type="text/javascript"><!--
         uybo("@$i)>j<:G-6rub=5!.FUT:z, =lXY");
         -->
      </script> <!--JQuery TouchSwipe js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/jquery.touchSwipe.min.js"></script><script type="text/javascript"><!--
         uybo("@$i)>l)mG6Ij_H,W2&$T");
         -->
      </script> <!--Select2 js --> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/select2.full.min.js"></script><script type="text/javascript"><!--
         uybo("@");
         -->
      </script> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/select2.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8bbN6?E_H,n2Je");
         -->
      </script> <!-- sticky js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/sticky.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8OgN!EA\")7bF4:(=-");
         -->
      </script> <!-- Switcher js --> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/switcher.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8Z.yvCL_H,W2&$T");
         -->
      </script> <!-- Cookie js --> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/jquery.ihavecookies.js"></script><script type="text/javascript"><!--
         uybo("@");
         -->
      </script> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/cookie.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8Z:!!A!_E;GIbaT+ZVvf@lOP/");
         -->
      </script> <!-- Custom scroll bar js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/jquery.mCustomScrollbar.concat.min.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8OgNx/rAEQn<4");
         -->
      </script> <!-- Swipe js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/swipe.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8O0qK306kgf2&$T");
         -->
      </script> <!-- Scripts js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/owl-carousel.js"></script><script type="text/javascript"><!--
         uybo("@$i)>8Z:!!A!_H,n2Je");
         -->
      </script> <!-- Custom js--> 
      <noscript>
         <p>To display this page you need a browser that supports JavaScript.</p>
      </noscript>
      <script src="<?php echo base_url() ?>assets/branch/custom.js"></script>
   </div>
</body>