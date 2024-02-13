        <div class="n-notice-bg">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                 <div class="latest-m">
                    <marquee direction="left" onmouseover="stop()" onmouseout="start()" scrolldelay="120">
                      <?php foreach ($this->Home_model->front_notice() as $key => $value) { ?>
                       <i class="fas fa-caret-right"></i>&nbsp; <a href="<?= base_url() ?>home/notice_detail/<?= $value->id; ?>"><?= $value->title; ?></a>
                       <?php } ?>
                    </marquee>
                 </div>
              </div>
           </div>
         </div>
         </div>
         <section>
            <div class="sptb-2 sptb-tab">
               <div class="phn-slider header-text mb-0">
                  <div class="">
                     <div id="myCarousel" class="carousel slide" data-ride="carousel" style=" margin: -110px 0px;height: 400px;">
                     <!-- Indicators -->                        
                          <ol class="carousel-indicators">
                           <?php $i = 0; foreach ($this->Home_model->slider() as $key => $value) { ?>
                            <li data-target="#myCarousel" data-slide-to="<?= $i ; ?>" class="<?php if($i == 0) {echo 'active';} ?>"></li>
                            <?php $i++; } ?>
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" style="height: 430px;">
                           <?php $i = 0; foreach ($this->Home_model->slider() as $key => $sl) { ?>
                            <div class="item <?php if($i == 0) {echo 'active';} ?>">
                              <img src="<?= base_url() ?>upload/slider/<?= $sl->userfile; ?>" alt="<?= $sl->title; ?>">
                            </div>
                            <?php $i++; } ?>
                          </div>
                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                  </div>
               </div>
            </div>
         </section>
         <!--/Section--> 
      </div>
        <section class="notice-area">
           <div class="container">
              <div class="row">
                 <div class="col-lg-8 col-sm-12 col-md-7 ">
                    <div class="notice-background">
                       <div class="notice-header">
                          <h3>Notice Board</h3>
                          <hr>
                       </div>
                       <div class="row">
                          <div class="col-lg-2 col-sm-2 notice-img">
                             <img src="https://malijhikandahs.com/assets/images/notice-board-img.png" alt="headmaster">
                          </div>
                          <div class="col-lg-10 col-sm-10">
                             <div class="notice-list pt-2">
                                 <ul>
                                    <?php foreach ($this->Home_model->front_notice() as $key => $value) { ?>
                                    <li>
                                       <i class="fas fa-caret-right icon-color"></i> 
                                       <a href="<?= base_url() ?>home/notice_detail/<?= $value->id; ?>"><?= $value->title; ?></a>
                                    </li>
                                    <?php } ?>
                                 </ul>
                            
                                <a class="btn btn-dark notice-btn" href="<?= base_url() ?>home/notice">All Notice</a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-lg-4 col-md-12">
                     <div class="important-li-area notice-background notice-header">
                        <h3>Important Link</h3>
                        <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul class="list-unstyled mb-0">
                           <li> <a href="#"><i class="fa fa-caret-right mr-3 text-primary"></i> BTEB </a> </li>
                           <li> <a href="#"><i class="fa fa-caret-right mr-3 text-primary"></i> Board Result </a></li>
                           <li> <a href="#"><i class="fa fa-caret-right mr-3 text-primary"></i> Education Ministry </a> </li>
                           <li> <a href="#"><i class="fa fa-caret-right mr-3 text-primary"></i> Tawfika IT Foundation</a> </li>
                        </ul>
                    </div>
                 </div
              </div>
           </div>
        </section>
        
    <section class="sptb ">
        <div class="container">
            <div class="row">
                 <div class="col-lg-12 col-sm-12 col-md-7 ">
                    <div class="admission-background">
                       <div class="row">
                          <div class="col-lg-6 col-sm-6 admission-img">
                             <img src="<?= base_url() ?>assets/front/img/admission.png" alt="headmaster">
                          </div>
                          <div class="col-lg-6 col-sm-6">
                             <div class="pt-2 admission-text" >
                                 <h3 style="text-align: center; color: #fff;">....Be Skilled Go Ahead.....</h3>
                                <h2 style="text-align: center; color: #fff;">Admission Going On</h2>
                                <a class="btn admission-btn" href="<?= base_url() ?>home/admission">Apply Now</a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
                
        
        
      <section class="sptb ">
         <div class="container">
            <div class="section-title center-block text-center">
               <h2>Popular Courses</h2>
               <span class="sectiontitle-design"><span class="icons"></span></span> 
               <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div id="myCarousel1" class="owl-carousel owl-carousel-icons2 owl-loaded owl-drag">
               <div class="owl-stage-outer">
                  <div class="owl-stage" style="transform: translate3d(-1201px, 0px, 0px); transition: all 0.25s ease 0s; width: 3904px;">
                     <?php foreach ($this->Home_model->allcourses() as $key => $value) { ?>
                     
                     <div class="owl-item cloned" style="width: 275.252px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
                              <div class="item-card2-img">
                                 <a href="<?= base_url(); ?>home/course_details/<?= $value->id; ?>"></a> <img src="<?= base_url() ?>upload/course/<?= $value->userfile; ?>" alt="img" class="cover-image"> 
                                 <div class="item-tag">
                                    <h4 class="mb-0"><?= $value->course_fee; ?></h4>
                                 </div>
                                 <div class="item-overly-trans">
                                    <div class="rating-stars d-flex">
                                       <span class="text-white mr-1 pl-1">4.3</span> <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4"> 
                                       <div class="rating-stars-container">
                                          <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                          <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                          <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                          <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                          <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item-card2-icons"> <a href="#" class="item-card2-icons-l"> <i class="fa fa-share-alt"></i></a> <a href="<?= base_url(); ?>home/course_details/<?= $value->id; ?>" class="item-card2-icons-l "> <i class="fa fa-heart-o"></i></a> </div>
                              <div class="card-body">
                                 <div class="item-card2">
                                    <div class="item-card2-desc">
                                       <div class="item-card2-text mb-3">
                                          <a href="<?= base_url(); ?>home/course_details/<?= $value->id; ?>" class="text-dark">
                                             <h4 class="mb-2"><?= $value->title; ?></h4>
                                          </a>
                                       </div>
                                       <p class=""><?= $value->short; ?> </p>                                       
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <div class="item-card2-footer"> <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> <?= $value->duration; ?> Months</a> <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a> </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <?php } ?>
                  </div>
               </div>
               <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
               <div class="owl-dots disabled"></div>
            </div>
         </div>
      </section>
      <!--/Section--> <!--Section--> 
      <section>
         <div class="about-1 cover-image sptb bg-background-color" data-image-src="<?= base_url() ?>upload/teacher/banner5.jpg" style="background: url(&quot;<?php echo base_url() ?>assets/branch/images/banners/banner5.jpg&quot;) center center;">
            <div class="content-text mb-0 text-white info">
               <div class="container">
                  <div class="row text-center">
                     <div class="col-lg-3 col-md-6">
                        <div class="counter-status md-mb-0">
                           <div class="counter-icon"> <i class="typcn typcn-group-outline"></i> </div>
                           <h5>Total Learners</h5>
                           <h2 class="counter mb-0">2569</h2>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="counter-status status-1 md-mb-0">
                           <div class="counter-icon text-warning"> <i class="typcn typcn-mortar-board"></i> </div>
                           <h5>Total Graduates</h5>
                           <h2 class="counter mb-0">1765</h2>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="counter-status status md-mb-0">
                           <div class="counter-icon text-primary"> <i class="typcn typcn-globe-outline"></i> </div>
                           <h5>Total Countries</h5>
                           <h2 class="counter mb-0">846</h2>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="counter-status status">
                           <div class="counter-icon text-success"> <i class="typcn typcn-news"></i> </div>
                           <h5>Total Courses</h5>
                           <h2 class="counter mb-0">7253</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--/Section--> <!--Section--> 
      
      <!--/Section--> <!--Section--> 
      <!--<section>
         <div class="cover-image sptb bg-background-color text-white" data-image-src="<?php echo base_url() ?>assets/branch/images/banners/banner3.jpg" style="background: url(&quot;<?php echo base_url() ?>assets/branch/images/banners/banner3.jpg&quot;) center center;">
            <div class="content-text mb-0">
               <div class="container">
                  <div class="section-title center-block text-center">
                     <h2>Our Courses</h2>
                     <span class="sectiontitle-design"><span class="icons"></span></span> 
                     <p class="text-white-50">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="widgets-cards mb-5">
                                 <div class="d-flex">
                                    <div class="widgets-cards-icons">
                                       <div class="wrp counter-icon1 mr-5"> <i class="fe fe-wifi"></i> </div>
                                    </div>
                                    <div class="widgets-cards-data">
                                       <div class="text-wrapper">
                                          <h4><a href="#" class="text-white fs-25">Learn Online Classes</a></h4>
                                          <p class="text-white mt-2 mb-0">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="widgets-cards mb-5">
                                 <div class="d-flex">
                                    <div class="widgets-cards-icons">
                                       <div class="wrp counter-icon1 mr-5"> <i class="fe fe-wifi-off"></i> </div>
                                    </div>
                                    <div class="widgets-cards-data">
                                       <div class="text-wrapper">
                                          <h4><a href="#" class="text-white fs-25">Learn Offline Classes</a></h4>
                                          <p class="text-white mt-2 mb-0">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="widgets-cards">
                                 <div class="d-flex">
                                    <div class="widgets-cards-icons">
                                       <div class="wrp counter-icon1 mr-5"> <i class="fe fe-book-open"></i> </div>
                                    </div>
                                    <div class="widgets-cards-data">
                                       <div class="text-wrapper">
                                          <h4><a href="#" class="text-white fs-25">Buy Books Online/Offline</a></h4>
                                          <p class="text-white mt-2 mb-0">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 mrt-sm-2">
                        <div class="clients-img "> <img src="<?php echo base_url() ?>assets/branch/images/media/0-7.jpg" alt="img" class="bg-white br-3 p-1"> <img src="<?php echo base_url() ?>assets/branch/images/media/0-2.jpg" alt="img" class="bg-white br-3 p-1"> <img src="<?php echo base_url() ?>assets/branch/images/media/0-3.jpg" alt="img" class="bg-white br-3 p-1"> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>-->
      <!--/Section--> <!--Section--> 
      <!--<section class="sptb bg-white">
         <div class="container">
            <div class="section-title center-block text-center">
               <h2>Our Sponsors</h2>
               <span class="sectiontitle-design"><span class="icons"></span></span> 
               <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div id="small-categories" class="owl-carousel client-carousel owl-loaded owl-drag">
               <div class="owl-stage-outer">
                  <div class="owl-stage" style="transform: translate3d(-1681px, 0px, 0px); transition: all 0.25s ease 0s; width: 4324px;">
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/4.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/5.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/6.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/7.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/8.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/1.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/2.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/3.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/4.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/5.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/6.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/7.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/8.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/1.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/2.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/3.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/4.png" alt="img"> </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 215.202px; margin-right: 25px;">
                        <div class="item">
                           <div class="client-img"> <img src="<?php echo base_url() ?>assets/branch/images/clients/5.png" alt="img"> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
               <div class="owl-dots disabled"></div>
            </div>
         </div>
      </section>-->
      <!--/Section--> <!--Section--> 
      <!--<section class="sptb">
         <div class="container">
            <div class="section-title center-block text-center">
               <h2>Best Rated Locations</h2>
               <span class="sectiontitle-design"><span class="icons"></span></span> 
               <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="row">
               <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                  <div class="row">
                     <div class="col-sm-12 col-lg-6 col-md-6 ">
                        <div class="item-card overflow-hidden">
                           <div class="item-card-desc">
                              <div class="card text-center overflow-hidden">
                                 <div class="card-img"> <img src="<?php echo base_url() ?>assets/branch/images/media/locations/3.jpg" alt="img" class="cover-image"> </div>
                                 <div class="item-tags">
                                    <div class="bg-primary tag-option"><i class="fa fa fa-heart-o mr-1"></i> 689 </div>
                                 </div>
                                 <div class="item-card-text">
                                    <h4 class="">44,327</h4>
                                    <span><i class="fa fa-map-marker mr-1 text-primary"></i>GERMANY</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-6 col-md-6 ">
                        <div class="item-card overflow-hidden">
                           <div class="item-card-desc">
                              <div class="card text-center overflow-hidden">
                                 <div class="card-img"> <img src="<?php echo base_url() ?>assets/branch/images/media/locations/6.jpg" alt="img" class="cover-image"> </div>
                                 <div class="item-tags">
                                    <div class="bg-primary tag-option"><i class="fa fa fa-heart-o mr-1"></i> 491 </div>
                                 </div>
                                 <div class="item-card-text">
                                    <h4 class="">52,145</h4>
                                    <span><i class="fa fa-map-marker mr-1 text-primary"></i> LONDON</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-6 col-md-6 ">
                        <div class="item-card overflow-hidden">
                           <div class="item-card-desc">
                              <div class="card text-center overflow-hidden mb-xl-0">
                                 <div class="card-img"> <img src="<?php echo base_url() ?>assets/branch/images/media/locations/1.jpg" alt="img" class="cover-image"> </div>
                                 <div class="item-tags">
                                    <div class="bg-primary tag-option"><i class="fa fa fa-heart-o mr-1"></i> 729 </div>
                                 </div>
                                 <div class="item-card-text">
                                    <h4 class="">63,263</h4>
                                    <span><i class="fa fa-map-marker text-primary mr-1"></i>AUSTERLIA</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-6 col-md-6 ">
                        <div class="item-card overflow-hidden">
                           <div class="item-card-desc">
                              <div class="card text-center overflow-hidden mb-xl-0">
                                 <div class="card-img"> <img src="<?php echo base_url() ?>assets/branch/images/media/locations/2.jpg" alt="img" class="cover-image"> </div>
                                 <div class="item-tags">
                                    <div class="bg-primary tag-option"><i class="fa fa fa-heart-o mr-1"></i> 567 </div>
                                 </div>
                                 <div class="item-card-text">
                                    <h4 class="">36,485</h4>
                                    <span><i class="fa fa-map-marker text-primary mr-1"></i>CHICAGO</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12 col-xl-6 col-sm-12">
                  <div class="row">
                     <div class="col-lg-12 col-xl-12">
                        <div class="item-card overflow-hidden">
                           <div class="item-card-desc">
                              <div class="card overflow-hidden mb-0">
                                 <div class="card-img"> <img src="<?php echo base_url() ?>assets/branch/images/media/locations/7.jpg" alt="img" class="cover-image"> </div>
                                 <div class="item-tags">
                                    <div class="bg-primary tag-option"><i class="fa fa fa-heart-o mr-1"></i> 209 </div>
                                 </div>
                                 <div class="item-card-text">
                                    <h4 class="">64,825</h4>
                                    <span><i class="fa fa-map-marker text-primary mr-1"></i>CANADA</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>-->
      <!--/Section--> <!--Section--> 
      <section class="sptb position-relative pattern">
         <div class="container">
            <div class="section-title center-block text-center">
               <h2 class="text-white position-relative">Best Trainers</h2>
               <span class="sectiontitle-design"><span class="icons"></span></span> 
               <p class="text-white position-relative">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="owl-carousel testimonial-owl-carousel owl-loaded owl-drag">
                     <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-2402px, 0px, 0px); transition: all 0s ease 0s; width: 8408px;">
                           <div class="owl-item cloned" style="width: 1176.01px; margin-right: 25px;">
                              <div class="item text-center">
                                 <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                       <div class="testimonia">
                                          <div class="owl-controls clickable">
                                             <div class="owl-pagination">
                                                <div class="owl-page "> <span class=""></span> </div>
                                                <div class="owl-page active"> <span class=""></span> </div>
                                                <div class="owl-page"> <span class=""></span> </div>
                                             </div>
                                          </div>
                                          <div class="testimonia-data">
                                             <h3 class="title">williamson</h3>
                                             <span class="post">Web Developer</span> 
                                             <div class="rating-stars mb-3">
                                                <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3"> 
                                                <div class="rating-stars-container">
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <p class="text-white-80"><i class="fa fa-quote-left"></i>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>
                                          <a href="testimonial.html" class="btn btn-primary btn-lg">View all Testimonials</a> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="owl-item cloned" style="width: 1176.01px; margin-right: 25px;">
                              <div class="item text-center">
                                 <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                       <div class="testimonia">
                                          <div class="owl-controls clickable">
                                             <div class="owl-pagination">
                                                <div class="owl-page "> <span class=""></span> </div>
                                                <div class="owl-page"> <span class=""></span> </div>
                                                <div class="owl-page active"> <span class=""></span> </div>
                                             </div>
                                          </div>
                                          <div class="testimonia-data">
                                             <h3 class="title">Sophie Carr</h3>
                                             <span class="post">Web Developer</span> 
                                             <div class="rating-stars mb-3">
                                                <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3"> 
                                                <div class="rating-stars-container">
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <p class="text-white-80"><i class="fa fa-quote-left"></i>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                          <a href="testimonial.html" class="btn btn-primary btn-lg">View all Testimonials</a> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="owl-item active" style="width: 1176.01px; margin-right: 25px;">
                              <div class="item text-center">
                                 <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                       <div class="testimonia">
                                          <div class="owl-controls clickable">
                                             <div class="owl-pagination">
                                                <div class="owl-page active"> <span class=""></span> </div>
                                                <div class="owl-page "> <span class=""></span> </div>
                                                <div class="owl-page"> <span class=""></span> </div>
                                             </div>
                                          </div>
                                          <h3 class="title">Elizabeth</h3>
                                          <span class="post">Web Developer</span> 
                                          <div class="rating-stars mb-3">
                                             <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4"> 
                                             <div class="rating-stars-container">
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                             </div>
                                          </div>
                                          <p class="text-white-80"> <i class="fa fa-quote-left text-white-80"></i>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                          <a href="testimonial.html" class="btn btn-primary btn-lg">View all Testimonials</a> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="owl-item" style="width: 1176.01px; margin-right: 25px;">
                              <div class="item text-center">
                                 <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                       <div class="testimonia">
                                          <div class="owl-controls clickable">
                                             <div class="owl-pagination">
                                                <div class="owl-page "> <span class=""></span> </div>
                                                <div class="owl-page active"> <span class=""></span> </div>
                                                <div class="owl-page"> <span class=""></span> </div>
                                             </div>
                                          </div>
                                          <div class="testimonia-data">
                                             <h3 class="title">williamson</h3>
                                             <span class="post">Web Developer</span> 
                                             <div class="rating-stars mb-3">
                                                <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3"> 
                                                <div class="rating-stars-container">
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <p class="text-white-80"><i class="fa fa-quote-left"></i>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>
                                          <a href="testimonial.html" class="btn btn-primary btn-lg">View all Testimonials</a> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="owl-item" style="width: 1176.01px; margin-right: 25px;">
                              <div class="item text-center">
                                 <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                       <div class="testimonia">
                                          <div class="owl-controls clickable">
                                             <div class="owl-pagination">
                                                <div class="owl-page "> <span class=""></span> </div>
                                                <div class="owl-page"> <span class=""></span> </div>
                                                <div class="owl-page active"> <span class=""></span> </div>
                                             </div>
                                          </div>
                                          <div class="testimonia-data">
                                             <h3 class="title">Sophie Carr</h3>
                                             <span class="post">Web Developer</span> 
                                             <div class="rating-stars mb-3">
                                                <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3"> 
                                                <div class="rating-stars-container">
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <p class="text-white-80"><i class="fa fa-quote-left"></i>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                          <a href="testimonial.html" class="btn btn-primary btn-lg">View all Testimonials</a> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="owl-item cloned" style="width: 1176.01px; margin-right: 25px;">
                              <div class="item text-center">
                                 <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                       <div class="testimonia">
                                          <div class="owl-controls clickable">
                                             <div class="owl-pagination">
                                                <div class="owl-page active"> <span class=""></span> </div>
                                                <div class="owl-page "> <span class=""></span> </div>
                                                <div class="owl-page"> <span class=""></span> </div>
                                             </div>
                                          </div>
                                          <h3 class="title">Elizabeth</h3>
                                          <span class="post">Web Developer</span> 
                                          <div class="rating-stars mb-3">
                                             <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4"> 
                                             <div class="rating-stars-container">
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                             </div>
                                          </div>
                                          <p class="text-white-80"> <i class="fa fa-quote-left text-white-80"></i>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                          <a href="testimonial.html" class="btn btn-primary btn-lg">View all Testimonials</a> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="owl-item cloned" style="width: 1176.01px; margin-right: 25px;">
                              <div class="item text-center">
                                 <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                       <div class="testimonia">
                                          <div class="owl-controls clickable">
                                             <div class="owl-pagination">
                                                <div class="owl-page "> <span class=""></span> </div>
                                                <div class="owl-page active"> <span class=""></span> </div>
                                                <div class="owl-page"> <span class=""></span> </div>
                                             </div>
                                          </div>
                                          <div class="testimonia-data">
                                             <h3 class="title">williamson</h3>
                                             <span class="post">Web Developer</span> 
                                             <div class="rating-stars mb-3">
                                                <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3"> 
                                                <div class="rating-stars-container">
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                   <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <p class="text-white-80"><i class="fa fa-quote-left"></i>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>
                                          <a href="testimonial.html" class="btn btn-primary btn-lg">View all Testimonials</a> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                     <div class="owl-dots disabled"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--/Section--> <!--Section--> 
      <!--<section class="sptb bg-white">
         <div class="container">
            <div class="section-title center-block text-center">
               <h2>News</h2>
               <span class="sectiontitle-design"><span class="icons"></span></span> 
               <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons owl-loaded owl-drag">
               <div class="owl-stage-outer">
                  <div class="owl-stage" style="transform: translate3d(-2402px, 0px, 0px); transition: all 0.25s ease 0s; width: 4805px;">
                     <div class="owl-item cloned" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-4.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Dec-03-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>4 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Excepteur occaecat cupidatat</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/15.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Royal Hamblin</a> <small class="d-block text-muted">10 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-5.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-28-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>2 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Sed ut perspiciatis iste</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/female/5.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Rosita Chatmon</a> <small class="d-block text-muted">10 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-6.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-19-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>8 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">At vero accusamus et iusto</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/6.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Loyd Nolf</a> <small class="d-block text-muted">15 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-1.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Dec-03-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>4 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Nemo enim ipsam voluptatem</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/5.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Joanne Nash</a> <small class="d-block text-muted">1 day ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-2.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-28-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>2 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Sed ut perspiciatis unde iste</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/7.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Tanner Mallari</a> <small class="d-block text-muted">2 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-3.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-19-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>8 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">At vero eos et accusamus</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/female/15.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Aracely Bashore</a> <small class="d-block text-muted">5 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-4.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Dec-03-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>4 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Excepteur occaecat cupidatat</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/15.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Royal Hamblin</a> <small class="d-block text-muted">10 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-5.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-28-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>2 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Sed ut perspiciatis iste</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/female/5.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Rosita Chatmon</a> <small class="d-block text-muted">10 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item active" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-6.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-19-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>8 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">At vero accusamus et iusto</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/6.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Loyd Nolf</a> <small class="d-block text-muted">15 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-1.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Dec-03-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>4 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Nemo enim ipsam voluptatem</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/5.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Joanne Nash</a> <small class="d-block text-muted">1 day ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-2.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-28-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o mr-2"></i>2 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">Sed ut perspiciatis unde iste</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/male/7.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Tanner Mallari</a> <small class="d-block text-muted">2 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item cloned" style="width: 375.337px; margin-right: 25px;">
                        <div class="item">
                           <div class="card mb-0">
                              <div class="item7-card-img"> <a href="#"></a> <img src="<?php echo base_url() ?>assets/branch/images/media/0-3.jpg" alt="img" class="cover-image"> </div>
                              <div class="card-body p-4">
                                 <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o mr-2"></i>Nov-19-2018</a> 
                                    <div class="ml-auto"> <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>8 Comments</a> </div>
                                 </div>
                                 <a href="blog-details.html" class="text-dark">
                                    <h3 class="font-weight-semibold">At vero eos et accusamus</h3>
                                 </a>
                                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
                                 <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="<?php echo base_url() ?>assets/branch/images/users/female/15.jpg" class="avatar brround avatar-md mr-3" alt="avatar-img"> 
                                    <div> <a href="profile.html" class="text-default">Aracely Bashore</a> <small class="d-block text-muted">5 days ago</small> </div>
                                    <div class="ml-auto text-muted"> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a> <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fa fa-thumbs-o-up"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
               <div class="owl-dots disabled"></div>
            </div>
         </div>
      </section>-->
      <!--/Section--> <!--Section--> 
      <!--<section class="sptb">
         <div class="container">
            <div class="section-title center-block text-center">
               <h2>Download</h2>
               <span class="sectiontitle-design"><span class="icons"></span></span> 
               <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center text-wrap">
                     <div class="btn-list"> <a href="#" class="btn btn-primary btn-lg mb-sm-0"><i class="fa fa-apple fa-1x mr-2"></i> App Store</a> <a href="#" class="btn btn-secondary btn-lg mb-sm-0"><i class="fa fa-android fa-1x mr-2"></i> Google Play</a> <a href="#" class="btn btn-info btn-lg mb-0"><i class="fa fa-windows fa-1x mr-2"></i> Windows</a> </div>
                  </div>
               </div>
            </div>
         </div>
      </section>-->
      <!--/Section--> <!--Footer Section--> 
