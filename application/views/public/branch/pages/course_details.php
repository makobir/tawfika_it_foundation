<section class="sptb">
   <div class="container">
      <div class="row">
         <div class="col-xl-8 col-lg-8 col-md-12">
            <!--Coursed Description--> 
            <div class="card overflow-hidden">
               <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">BestSeller</span></div>
               <div class="card-body">
                  <div class="item-det mb-4">
                     <a href="#" class="text-dark">
                        <h3 class="font-weight-semibold"><?= $course->title; ?></h3>
                     </a>
                     <div class=" d-flex">
                        <ul class="d-flex mb-0">
                           <li class="mr-5"><a href="#" class="icons"><i class="icon icon-calendar text-muted mr-1"></i> 15 hours</a></li>
                           <li class="mr-5"><a href="#" class="icons"><i class="icon icon-people text-muted mr-1"></i> 765 Enrolled</a></li>
                        </ul>
                        <div class="rating-stars d-flex mr-5">
                           <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" id="rating-stars-value" value="4"> 
                           <div class="rating-stars-container mr-2">
                              <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                           </div>
                           4.0 
                        </div>
                        <div class="rating-stars d-flex">
                           <div class="rating-stars-container mr-2">
                              <div class="rating-star sm"> <i class="fa fa-heart"></i> </div>
                           </div>
                           135 
                        </div>
                     </div>
                  </div>
                  <div class="product-slider">
                     <ul class="list-unstyled video-list-thumbs">
                        <li class="mb-0">
                           <a data-toggle="modal" data-target="#homeVideo" class="class-video p-0">
                              <div class="arrow-ribbon bg-primary">0% off</div>
                              <img src="<?= base_url() ?>upload/course/<?php echo $course->userfile ; ?>" alt="img" class="img-responsive br-3"> <span class="fe fe-play-circle text-white class-icon"></span> 
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Description</h3>
               </div>
               <div class="card-body">
                  <div class="mb-4 description">
                    <?= $course->details; ?>
                  </div>
                  <!--
                  <h4 class="mb-4 font-weight-bold">Specifications</h4>
                  <div class="row">
                     <div class="col-xl-6 col-md-12">
                        <ul class="list-unstyled widget-spec mb-0">
                           <li class=""> <i class="fa fa-star text-muted w-5"></i>Free Demo </li>
                           <li class=""> <i class="fa fa-user text-muted w-5"></i> 100% job Assistance </li>
                           <li class=""> <i class="fa fa-times-circle-o  text-muted w-5"></i> Flexible Timing </li>
                           <li class=""> <i class="fa fa-file-word-o  text-muted w-5"></i> Realtime Project Work </li>
                           <li class=""> <i class="fa fa-users text-muted w-5"></i> Learn From Experts </li>
                           <li class="mb-xl-0"> <i class="fa fa-certificate  text-muted w-5"></i> Get Certified </li>
                        </ul>
                     </div>
                     <div class="col-xl-6 col-md-12">
                        <ul class="list-unstyled widget-spec mb-0">
                           <li class=""> <i class="fa fa-child  ild text-muted w-5"></i> Place your career </li>
                           <li class=""> <i class="fa fa-building-o text-muted w-5"></i> Reasonable fees </li>
                           <li class=""> <i class="fa fa-laptop text-muted w-5"></i> 24 Hours Lab Providing </li>
                           <li class=""> <i class="fa fa-star text-muted w-5"></i> high-quality content and class videos </li>
                           <li class=""> <i class="fa fa-futbol-o text-muted w-5"></i> Learning Management System </li>
                           <li class="mb-0"> <i class="fa fa-id-badge  text-muted w-5"></i> Full lifetime access </li>
                        </ul>
                     </div>
                  </div> -->
               </div>

        <!--        <div class="card-footer">
                  <div class="icons"> <a href="#" class="btn btn-primary mb-3 mb-xl-0"><i class="fe fe-credit-card mr-1"></i>Buy This Course</a> <a href="#" class="btn btn-secondary mb-3 mb-xl-0 icons"><i class="icon icon-share mr-1"></i> Share Course</a> <a href="#" class="btn btn-info mb-3 mb-xl-0 icons" data-toggle="modal" data-target="#report"><i class="icon icon-exclamation mr-1"></i> Report Abuse</a> <a href="#" class="btn btn-success icons"><i class="icon icon-heart  mr-1"></i> 678</a> <a href="#" class="btn btn-warning icons"><i class="icon icon-printer  mr-1"></i> Print</a> </div>
               </div> -->
            </div>
            <!--/Coursed Description--> <!--Comments--> 
            <!-- <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Rating And Reviews</h3>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-4">
                           <p class="mb-2"> <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i>5</span> </p>
                           <div class="progress progress-md mb-4 h-4">
                              <div class="progress-bar bg-success w-100">9,232</div>
                           </div>
                        </div>
                        <div class="mb-4">
                           <p class="mb-2"> <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i>4</span> </p>
                           <div class="progress progress-md mb-4 h-4">
                              <div class="progress-bar bg-info w-80">8,125</div>
                           </div>
                        </div>
                        <div class="mb-4">
                           <p class="mb-2"> <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i> 3</span> </p>
                           <div class="progress progress-md mb-4 h-4">
                              <div class="progress-bar bg-primary w-60">6,263</div>
                           </div>
                        </div>
                        <div class="mb-4">
                           <p class="mb-2"> <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i> 2</span> </p>
                           <div class="progress progress-md mb-4 h-4">
                              <div class="progress-bar bg-secondary w-30">3,463</div>
                           </div>
                        </div>
                        <div class="mb-5">
                           <p class="mb-2"> <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i> 1</span> </p>
                           <div class="progress progress-md mb-4 h-4">
                              <div class="progress-bar bg-orange w-20">1,456</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body p-0">
                  <div class="media mt-0 p-5">
                     <div class="d-flex mr-3"> <a href="#"><img class="media-object brround" alt="64x64" src="../assets/images/users/male/1.jpg"> </a> </div>
                     <div class="media-body">
                        <h4 class="mt-0 mb-1 font-weight-bold">Joanne Scott <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span> <span class="fs-14 ml-2"> 4.5 <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-half-o text-yellow"></i> </span> </h4>
                        <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st <i class=" ml-3 fa fa-clock-o"></i> 13.00 <i class=" ml-3 fa fa-map-marker"></i> Brezil</small> 
                        <p class="font-13  mb-2 mt-2"> Ut enim ad minim veniam, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et nostrud exercitation ullamco laboris commodo consequat. </p>
                        <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a> <a href="" class="mr-2" data-toggle="modal" data-target="#Comment"><span class="badge badge-default">Comment</span></a> <a href="" class="mr-2" data-toggle="modal" data-target="#report"><span class="badge badge-default">Report</span></a> 
                        <div class="media mt-5">
                           <div class="d-flex mr-3"> <a href="#"> <img class="media-object brround" alt="64x64" src="../assets/images/users/female/2.jpg"> </a> </div>
                           <div class="media-body">
                              <h4 class="mt-0 mb-1 font-weight-bold">Rose Slater <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span></h4>
                              <small class="text-muted"><i class="fa fa-calendar"></i> Dec 22st <i class=" ml-3 fa fa-clock-o"></i> 6.00 <i class=" ml-3 fa fa-map-marker"></i> Brezil</small> 
                              <p class="font-13  mb-2 mt-2"> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris commodo Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laboriosam, nisi ut aliquid ex ea commodi consequatur consequat. </p>
                              <a href="" data-toggle="modal" data-target="#Comment"><span class="badge badge-default">Comment</span></a> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="media p-5 border-top mt-0">
                     <div class="d-flex mr-3"> <a href="#"> <img class="media-object brround" alt="64x64" src="../assets/images/users/male/3.jpg"> </a> </div>
                     <div class="media-body">
                        <h4 class="mt-0 mb-1 font-weight-bold">Edward <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span> <span class="fs-14 ml-2"> 4 <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o text-yellow"></i> </span> </h4>
                        <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st <i class=" ml-3 fa fa-clock-o"></i> 16.35 <i class=" ml-3 fa fa-map-marker"></i> UK</small> 
                        <p class="font-13  mb-2 mt-2"> Ut enim ad minim veniam, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et nostrud exercitation ullamco laboris commodo consequat. </p>
                        <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a> <a href="" class="mr-2" data-toggle="modal" data-target="#Comment"><span class="badge badge-default">Comment</span></a> <a href="" class="mr-2" data-toggle="modal" data-target="#report"><span class="badge badge-default">Report</span></a> 
                     </div>
                  </div>
               </div>
            </div> -->
            <!--/Comments--> 
            <div class="card mb-lg-0">
               <div class="card-header">
                  <h3 class="card-title">Leave a reply</h3>
               </div>
               <div class="card-body">
                  <div>
                     <div class="form-group"> <input type="text" class="form-control" id="name1" placeholder="Your Name"> </div>
                     <div class="form-group"> <input type="email" class="form-control" id="email" placeholder="Email Coursedress"> </div>
                     <div class="form-group"> <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Comment"></textarea> </div>
                     <a href="#" class="btn btn-primary">Send Reply</a> 
                  </div>
               </div>
            </div>
         </div>
         <!--Right Side Content--> 
         <div class="col-xl-4 col-lg-4 col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="mb-5">
                     <div class="text-dark mb-2"><span class="text-dark font-weight-semibold h1">৳<?= $course->course_fee; ?></span> <!-- <span class="text-muted h3 font-weight-normal ml-1"><span class="strike-text">$155</span></span>  --></div>
                    <!--  <p class="text-danger"><i class="fe fe-clock mr-1"></i>5 days to left of this Price</p> -->
                  </div>
               <!--    <div class=""> <a href="#" class="btn btn-primary btn-lg btn-block">Buy Now</a> <a href="#" class="btn btn-secondary btn-lg btn-block">Coursed to Cart</a> <a href="#" class="btn btn-info btn-lg btn-block">Trail Now</a> </div> -->
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Course Instructor</h3>
               </div>
               <div class="card-body  item-user">
                  <div class="profile-pic mb-0">
                     <img src="../assets/images/users/female/25.jpg" class="brround avatar-xxl" alt="user"> 
                     <div>
                        <a href="userprofile.html" class="text-dark">
                           <h4 class="mt-3 mb-1 font-weight-semibold">Jacob Smith</h4>
                        </a>
                        <span class="text-muted">Member Since November 2008</span> 
                     </div>
                     <h6 class="mt-2 mb-0"> <a href="profile.html" class="btn btn-primary btn-sm">See All Course</a> <a href="#" class="btn btn-secondary btn-sm">1245 Views</a> <a href="#" class="btn btn-info btn-sm">850 Courses</a> </h6>
                  </div>
               </div>
               <div class="card-body item-user">
                  <h4 class="mb-4">Contact Info</h4>
                  <div>
                     <h6><span class="font-weight-semibold"><i class="fa fa-map-marker mr-2 mb-2"></i></span><a href="#" class="text-body"> 7981 Aspen Ave. Hammonton, USA</a></h6>
                     <h6><span class="font-weight-semibold"><i class="fa fa-envelope mr-2 mb-2"></i></span><a href="#" class="text-body"> smith@gmail.com</a></h6>
                     <h6><span class="font-weight-semibold"><i class="fa fa-phone mr-2  mb-2"></i></span><a href="#" class="text-body"> 0-235-657-24587</a></h6>
                     <h6><span class="font-weight-semibold"><i class="fa fa-link mr-2 "></i></span><a href="#" class="text-body">http://abcd.com/</a></h6>
                  </div>
                  <div class=" item-user-icons mt-4"> <a href="#" class="facebook-bg mt-0"><i class="fa fa-facebook"></i></a> <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a> <a href="#" class="google-bg"><i class="fa fa-google"></i></a> <a href="#" class="dribbble-bg"><i class="fa fa-dribbble"></i></a> </div>
               </div>
               <div class="card-footer">
                  <div class="text-left"> <a href="#" class="btn  btn-primary"><i class="fa fa-envelope"></i> Chat</a> <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#contact"><i class="fa fa-user"></i> Contact Me</a> <a href="#" class="btn  btn-danger"><i class="fa fa-share"></i> Share</a> </div>
               </div>
            </div>
<!--             <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Keywords</h3>
               </div>
               <div class="card-body product-filter-desc">
                  <div class="product-tags clearfix">
                     <ul class="list-unstyled mb-0">
                        <li><a href="#">Classes</a></li>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Courses</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Shares</h3>
               </div>
               <div class="card-body product-filter-desc">
                  <div class="product-filter-icons text-center"> <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a> <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a> <a href="#" class="google-bg"><i class="fa fa-google"></i></a> <a href="#" class="dribbble-bg"><i class="fa fa-dribbble"></i></a> <a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a> </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Map location</h3>
               </div>
               <div class="card-body">
                  <div class="map-header">
                     <div class="map-header-layer" id="map2" style="position: relative; overflow: hidden;">
                        <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                           <div class="gm-err-container">
                              <div class="gm-err-content">
                                 <div class="gm-err-icon"><img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" alt="" draggable="false" style="user-select: none;"></div>
                                 <div class="gm-err-title">Oops! Something went wrong.</div>
                                 <div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript console for technical details.</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Search Classes</h3>
               </div>
               <div class="card-body">
                  <div class="form-group"> <input type="text" class="form-control" id="text2" placeholder="What are you looking for?"> </div>
                  <div class="form-group">
                     <select name="country" id="select-countries" class="form-control custom-select select2-show-search select2-hidden-accessible" data-select2-id="select-countries" tabindex="-1" aria-hidden="true">
                        <option value="1" selected="" data-select2-id="5">All Categories</option>
                        <option value="2" data-select2-id="19">Private</option>
                        <option value="3" data-select2-id="20">Software</option>
                        <option value="4" data-select2-id="21">Banking</option>
                        <option value="5" data-select2-id="22">Finaces</option>
                        <option value="6" data-select2-id="23">Carporate</option>
                        <option value="7" data-select2-id="24">Driving</option>
                        <option value="8" data-select2-id="25">Sales</option>
                     </select>
                     <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="26" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-select-countries-container"><span class="select2-selection__rendered" id="select2-select-countries-container" role="textbox" aria-readonly="true" title="All Categories">All Categories</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> 
                  </div>
                  <div class=""> <a href="#" class="btn  btn-primary">Search</a> </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Popular Classes</h3>
               </div>
               <div class="card-body">
                  <div class="product-tags clearfix">
                     <ul class="list-unstyled mb-0">
                        <li><a href="#">Web Designing</a></li>
                        <li><a href="#">Unix Classes</a></li>
                        <li><a href="#">Networking</a></li>
                        <li><a href="#">Python Classes</a></li>
                        <li><a href="#">Data Science</a></li>
                        <li><a href="#">.Net</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">Java</a></li>
                        <li><a href="#">SQL</a></li>
                        <li><a href="#">Photoshop</a></li>
                        <li><a href="#" class="mb-0">Autocad</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="card mb-0">
               <div class="card-header">
                  <h3 class="card-title">Latest Technologies</h3>
               </div>
               <div class="card-body pb-5">
                  <ul class="vertical-scroll" style="overflow-y: hidden; height: 356px;">
                     <li style="" class="news-item">
                        <table>
                           <tbody>
                              <tr>
                                 <td><img src="../assets/images/png/6.png" alt="img" class="w-8 border mr-2"></td>
                                 <td class="pl-3">
                                    <h4 class="mb-1 font-weight-semibold">HTML</h4>
                                    <a href="#" class="btn-link">View Details</a><span class="float-right font-weight-bold">$17</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </li>
                     <li style="" class="news-item">
                        <table>
                           <tbody>
                              <tr>
                                 <td><img src="../assets/images/png/8.png" alt="img" class="w-8 border mr-2"></td>
                                 <td class="pl-3">
                                    <h4 class="mb-1 font-weight-semibold">Frame works</h4>
                                    <a href="#" class="btn-link">View Details</a><span class="float-right font-weight-bold">$17</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </li>
                     <li style="" class="news-item">
                        <table>
                           <tbody>
                              <tr>
                                 <td><img src="../assets/images/png/1.png" alt="img" class="w-8 border mr-2"></td>
                                 <td class="pl-3">
                                    <h4 class="mb-1 font-weight-semibold">Data Science</h4>
                                    <a href="#" class="btn-link">View Details</a><span class="float-right font-weight-bold">$17</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </li>
                     <li style="" class="news-item">
                        <table>
                           <tbody>
                              <tr>
                                 <td><img src="../assets/images/png/2.png" alt="img" class="w-8 border mr-2"></td>
                                 <td class="pl-3">
                                    <h4 class="mb-1 font-weight-semibold">Java Script</h4>
                                    <a href="#" class="btn-link">View Details</a><span class="float-right font-weight-bold">$17</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </li>
                     <li style="display: none;" class="news-item">
                        <table>
                           <tbody>
                              <tr>
                                 <td><img src="../assets/images/png/3.png" alt="img" class="w-8 border mr-2"></td>
                                 <td class="pl-3">
                                    <h4 class="mb-1 font-weight-semibold ">Angular</h4>
                                    <a href="#" class="btn-link">View Details</a><span class="float-right font-weight-bold">$17</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </li>
                     <li style="display: none;" class="news-item">
                        <table>
                           <tbody>
                              <tr>
                                 <td><img src="../assets/images/png/4.png" alt="img" class="w-8 border mr-2"></td>
                                 <td class="pl-3">
                                    <h4 class="mb-1 font-weight-semibold">Jquery</h4>
                                    <a href="#" class="btn-link">View Details</a><span class="float-right font-weight-bold">$17</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </li>
                     <li style="display: none;" class="news-item">
                        <table>
                           <tbody>
                              <tr>
                                 <td><img src="../assets/images/png/5.png" alt="img" class="w-8 border mr-2"></td>
                                 <td class="pl-3">
                                    <h4 class="mb-1 font-weight-semibold ">Autocad</h4>
                                    <a href="#" class="btn-link">View Details</a><span class="float-right font-weight-bold">$17</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </li>
                  </ul>
               </div>
            </div> -->
         </div>
         <!--Right Side Content--> 
      </div>
   </div>
</section>