
    <section class="content" style="width: 100%; margin-top: 20px">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-sm-12" >
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <!-- <small class="float-right">Date: <?php echo date('d-m-Y')?></small>   -->              
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-2">                  
                </div>
                <div class="col-sm-8 invoice-col text-center">   
                  <img width="150px" src="<?= base_url() ?>upload/logo/<?= $site->userfile; ?>">               
                  <address>
                    <strong style="font-size:20pt;"><?= $site->site_name; ?></strong><br>
                    <?= $site->address; ?>,  <?= $site->upazila; ?> ,<?= $site->district; ?>.  <br>
                   
                    Phone: <?= $site->mobile; ?><br>
                    Email: <?= $site->email; ?>
                  </address>
                </div>
                <div class="col-sm-2">
                <img width="100px" src="<?= base_url() ?>upload/user/<?= $trainee->userfile  ?>">
                  <h4 style="margin-top: 10px;"> Invoice # <b><?= $paymentinfo->invoice; ?></b><h4>                                  
                </div>
                <!-- /.col -->
                <div class="col-sm-12 invoice-col">
                  <table class="table table-bordered">
                    <tr>
                      <td>Name</td>
                      <td><b><?= $trainee->name  ?></b></td>
                      <td>ID</td>
                      <td><b><?= $trainee->regi  ?></b></td>
                      <td>Course</td>
                      <td><b><?= $coursefee->title  ?></b></td>
                      <td>Session ID</td>
                      <td><b><?= $trainee->session  ?></b></td>
                    </tr>
                  </table>
                </div>

                <div class="col-sm-2">                  
                  <!--   <button class="btn btn-default" style="background: green; color: white"> Paid </button> -->
                </div>
                <div class="col-sm-2">                  
                  
                </div>
                <!-- /.col -->
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <hr style="background: black; border:1px solid black;">
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr style="border-top: 1px solid black !important;">
                      <th>Date</th>
                      <th>For</th>
                      <th>Amount</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php  ?>
                    <tr>
                      <td><?= $paymentinfo->date; ?></td>
                      <td>
                        <?php
                          if ($addiinfo->admission != NULL) {
                              echo 'Admission Fee <br>';
                          }if ($addiinfo->course != NULL) {
                              echo 'Course Fee <br>';
                          }if ($addiinfo->exam != NULL) {
                              echo 'Exam Fee <br>';
                          }if ($addiinfo->registration != NULL) {
                              echo 'Registration Fee <br>';
                          }if ($addiinfo->center != NULL) {
                              echo 'Center Fee <br>';
                          }if ($addiinfo->practical != NULL) {
                              echo 'Practical Fee <br>';
                          }if ($addiinfo->idcard != NULL) {
                              echo 'ID Card Fee <br>';
                          }if ($addiinfo->others != NULL) {
                              echo 'Others Fee <br>';
                          }

                        ?>
                        
                      </td>
                      <td><?= $paymentinfo->amount; ?></td>
                      <td><?= $paymentinfo->amount; ?></td>
                      
                    </tr>
                    <?php  ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                </div>
                <!-- /.col -->
                <div class="col-6">  
                  <div style="width: 100%;">
                    <table class="table">
                      <tr style="text-align: left;">
                        <th style="width:64%">Paid Today:</th>
                        <td><?= $paymentinfo->amount; ?></td>
                      </tr>
                      <tr style="text-align: left;">
                        <th>Total Course Fee</th>
                        <th><?php $fee = $coursefee->course_fee+$coursefee->admission+$coursefee->registration+$coursefee->exam+$coursefee->idcard+$coursefee->others+$coursefee->center+$coursefee->practical; echo $fee; ?></th>
                      </tr>
                      <tr style="text-align: left;">
                        <th>Total Paid </th>
                        <th><?php echo $paid->amount; ?></th>
                      </tr>
                      <tr style="text-align: left;">
                        <th>Due </th> 
                        <th><?php echo $fee - $paid->amount; ?></th>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            <table width="100%" style="margin-top: 100px; border:none !important; text-align: center;">
              <tr style="border:none !important">
                <td style="border:none !important; "><b> </b> <br> </td>
                <td style="border:none !important" width="30%"></td>    
                <td style="border:none !important; " ><b> </b> <br> </td>    
                <td style="border:none !important" width="30%"></td> 
                <td style="border:none !important;"><b>  </b> <br> </td>    
                <td style="border:none !important" width="10%"></td> 
                <td style="border:none !important; border-top: 1px solid black !important"><b>Accountant </b> <br> Signature</td>
              </tr>
            </table>
            <div style="margin: 20px 0px; text-align: right;">
              Print on : <?php echo date("l jS \of F Y h:i:s A"); ?>
            </div>
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <button class="btn btn-primary float-right" style="margin: 50px" class="no-print" onclick="window.print()">Print this page</button>                 
                  <!--
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->