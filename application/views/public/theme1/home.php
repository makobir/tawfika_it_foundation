    <div id="banner">
         <!-- Banner Slider Start -->
         <div class="banner-slider" data-pagination="true">
            <!-- Banner Item Start -->
            <div class="banner-item bg--overlay" data-bg-img="img/home-slider-img/slider-bg-01.html">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-4 col-xs-6">
                        <center>
                           <img src="<?= base_url() ?>assets/front/img/features-img/decision-letter-2-1.png" width="100" alt=""><br><br>
                           <h3 style="color:#fff;font-family: SolaimanLipiNormal; margin:0;">
                              সনদপত্র/প্রত্যয়ন আবেদন  
                              <hr style="margin:0;margin-top:10px;">
                           </h3>
                           <br>
                           <p> সনদের জন্য আবেদন করতে ফরমটি পুরণ করুন এবং আবেদনের অবস্থা দেখতে ‘যাচাই’ এ ক্লিক করুন । সনদ পেতে ইউনিয়ন পরিষদ অথবা উদ্যোক্তার সাথে যোগাযোগ করুন।<br><br></p>
                           <a class="btn btn-primary" href="<?php echo base_url() ?>home/apply" role="button"><i class="fa fa-edit"></i>  আবেদন </a>
                        </center>
                     </div>
                     <div class="col-sm-4 col-xs-6">
                        <center>
                           <img src="<?= base_url() ?>assets/front/img/features-img/certificate-flat.png" width="100" alt=""><br><br>
                           <h3 style="color:#fff;font-family: SolaimanLipiNormal; margin:0;">
                              সনদপত্র/প্রত্যয়ন যাচাই  
                              <hr style="margin:0;margin-top:10px;">
                           </h3>
                           <br>
                           <p> বিশ্বের যেকোন প্রান্ত থেকে সনদ/প্রত্যয়ন যাচাই করতে  পারবেন। যাচাই বাটনে ক্লিক করে পরবর্তী পেইজে আপনার ইউনিক আইডি অথবা সনদ নম্বর দিন।<br><br></p>
                           <a class="btn btn-primary" href="<?php echo base_url() ?>home/verify" role="button"><i class="fa fa-search"></i>  যাচাই </a>
                        </center>
                     </div>
                     <div class="col-sm-4 col-xs-6">
                        <center>
                           <img src="<?= base_url() ?>assets/front/img/features-img/decision-letter-2-1.png" width="100" alt=""><br><br>
                           <h3 style="color:#fff;font-family: SolaimanLipiNormal; margin:0;">
                              নিবন্ধন
                              <hr style="margin:0;margin-top:10px;">
                           </h3>
                           <br>
                           <p> ইউনিক আইডি নম্বর প্রাপ্তির জন্য আবেদন করুন।  ইউনিয়ন পরিষদ হতে প্রাপ্ত সকল সেবা ইউনিক আইডিতে জমা থাকবে এবং তা ভবিষ্যতে ব্যবহার করা যাবে। <br><br></p>
                           <a class="btn btn-primary" href="<?php echo base_url() ?>home/citizen_apply" role="button"><i class="fa fa-edit"></i> আবেদন করুন </a>
                        </center>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Banner Area End -->


      <div class="counter bg--overlay" data-bg-img="">
         <div class="container">
            <h1>  :: কিছু কথা :: </h1>
            <hr>
            <div class="row">
               <div class="col-sm-6"> 

                     <?php 
                        $ch = $this->Home_model->chairman_info();
                     ?>
                

                  <p style="text-align: justify;"><img style="float:left; width:150px; padding: 0px 10px 0px 0px;" src="<?= base_url() ?>upload/chairman/<?php echo $ch->cuserfile ?>">
                     <?php 
                     $cat = 'chairman';
                     $speech = $this->Home_model->speech($cat);
                     echo $speech->speech; ?>
                  </p>
                  <hr>
                  <p style="text-align: left;">                  
                     <?php echo $ch->name ?> <br>  
                     চেয়ারম্যান, <?php echo $ch->upname; ?>
                  </p>
               </div>
               <div class="col-sm-6">
                  <p style="text-align: justify;"><img style="float:right; width:150px; padding: 0px 10px 0px 10px;" src="<?= base_url() ?>upload/sochib/<?php echo $ch->suserfile ?>">
                      <?php 
                     $cat = 'secretary';
                     $speech = $this->Home_model->speech($cat);
                     echo $speech->speech; ?>
                  </p>
                  <hr>
                  <p style="text-align: right;">                  
                     <?php echo $ch->sname ?> <br>  
                     সচিব, <?php echo $ch->upname; ?>
                  </p>
               </div>
            </div>
         </div>
      </div>




    <div class="bg--overlay">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12" style="padding-top: 50px;padding-bottom: 50px;">           
            <h4 style="color: white; text-align: center;">by courtesy of :  <?php echo $ch->uname ?>  </h4>
            <hr style="border: 2px solid white; width: 250px;">
            <p style="text-align: justify; color: white; ">
             <img src="<?= base_url() ?>upload/uddokta/<?php echo $ch->uuserfile ?>" alt="" style="float:left; width: 200px; float: left; margin: 5px; border-radius: 3%;"><br><br> 
                      <?php 
                     $cat = 'entrepreneur';
                     $speech = $this->Home_model->speech($cat);
                     echo $speech->speech; ?>

            <p style="text-align: right; color: white;">                  
               <?php echo $ch->uname ?> <br>  
               উদ্যোক্তা, <?php echo $ch->upname; ?> ডিজিটাল সেন্টার
            </p>
          </div>
        </div>
      </div>
    </div>






      <!-- Counter Area Start -->
      <div class="counter bg--overlay" data-bg-img="">
         <div class="container">
            <div class="row">
               <div class="col-sm-3 col-xs-6">
                  <!-- Counter Item Start -->
                  <div class="counter-holder">
                     <div class="counter-icon"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                     <p class="counter-text">সর্বমোট সনদ প্রদান</p>
                     <div class="counter-number" data-counter-up="true">78901</div>
                  </div>
                  <!-- Counter Item End -->
               </div>
               <div class="col-sm-3 col-xs-6">
                  <!-- Counter Item Start -->
                  <div class="counter-holder">
                     <div class="counter-icon"><i class="fa fa-smile-o"></i></div>
                     <p class="counter-text">নিবন্ধিত নাগরিক সংখ্যা</p>
                     <div class="counter-number" data-counter-up="true">257</div>
                  </div>
                  <!-- Counter Item End -->
               </div>
               <div class="col-sm-3 col-xs-6">
                  <!-- Counter Item Start -->
                  <div class="counter-holder">
                     <div class="counter-icon"><i class="fa fa-smile-o"></i></div>
                     <p class="counter-text">সর্বমোট আবেদন সংখ্যা</p>
                     <div class="counter-number" data-counter-up="true">17</div>
                  </div>
                  <!-- Counter Item End -->
               </div>
               <div class="col-sm-3 col-xs-6">
                  <!-- Counter Item Start -->
                  <div class="counter-holder">
                     <div class="counter-icon"><i class="fa fa-user" aria-hidden="true"></i> </div>
                     <p class="counter-text">মোট ব্যবহারকারী</p>
                     <div class="counter-number" data-counter-up="true">274</div>
                  </div>
                  <!-- Counter Item End -->
               </div>
            </div>
         </div>
      </div>