<!-- Menu Area End -->              <!-- Page Title Area Start -->
<div id="pageTitle" class="bg--overlay" data-bg-img="img/page-header-img/bg.html">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="section-title">
               <h2>সনদপত্র/প্রত্যয়ন যাচাই</h2>
            </div>
         </div>
         <div class="col-md-6">
            <ul class="breadcrumb">
               <li><span>আপনি বর্তমানে আছেন:</span></li>
               <li><a href="<?= base_url() ?>">প্রচ্ছদ</a></li>
               <li class="active">হোল্ডিং কর পরিশোধ</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- About Description Start -->
<div class="about-description">
   <div class="container">
      <div class="row row-vc"> 
         <div class="col-md-4">
            <div id="domainSearch">
               <div class="container">
                  <div class="row content">

                     <div class="col-md-12 right-content">
                        <!-- Domain Search Form Start -->
                        <div data-form-validation="true" >
                           <form action="<?= base_url() ?>home/holding_tex_info" id="domainSearchForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">                                       
                              <div class="row reset-gutter" >
                                 <div class="col-sm-12 text-center" style="color: red;">
                                   <?php echo $this->session->userdata('message');
                                    $this->session->unset_userdata('message') ?> 
                                 </div>                          
                                 <div class="col-sm-3">
                                 </div>
                                 <div class="col-sm-4">
                                    <input class="form-control" name="certificate_number" type="text" placeholder="ইউনিক আইডি/হোল্ডিং নম্বর দিন" required>
                                 </div>
                                 <div class="col-sm-2">
                                    <button class="btn submit-button-custom" type="submit"> <i class="fa fa-search"></i>   আরোপিত কর দেখুন </button>
                                 </div>
                             </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>