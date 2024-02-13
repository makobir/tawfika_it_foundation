
    <section class="content" style="width: 100%; margin-top: 20px">
      <div class="container-flcode ">
        <div class="row">
          <div class="col-sm-12" >
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <small class="float-right">Date: <?php echo date('d-m-Y')?></small>                
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-2">                  
                  <img width="150px" src="<?= base_url() ?>assets/nudus.jpg">
                </div>
                <div class="col-sm-3 invoice-col">
                  From
                  <address>
                    <strong>Nidus Off Trade.</strong><br>
                    Iswergong<br>
                    Mymensingh<br>
                    Phone: (880) 123-125454<br>
                    Email: info@mail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 invoice-col">
                  To
                  <address>
                    <strong><?php echo $staff->card_no. ' - '. $staff->name; ?></strong><br>
                    Robi Mobile : <?php echo $staff->mobile1 ?> <br>
                    Airtel Mobile :  <?php echo $staff->mobile2 ?>.<br>
                    Phone: <br>
                    Email:
                  </address>
                </div>

                <div class="col-sm-2">                  
                  <h3 style="margin-top: 40px;"> Invoice # <b><?php echo $staff->invoice_id ?></b><h3> 
                </div>
                <div class="col-sm-2">                  
                  <img width="150px" src="<?= base_url() ?>assets/robi.jpg">
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
                      <th>SL</th>
                      <th>Product</th>
                      <th>Sales Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; $total = 0; foreach ($invoice as $key => $inv) { $i++;
                        $total +=$inv->price; ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $inv->name; ?></td>
                      <td><?php echo $inv->sales; ?></td>
                      <td><?php echo $inv->qty; ?></td>
                      <td><?php echo $inv->price; ?>৳</td>
                    </tr>
                    <?php } ?>
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
                  <div class="table-responsive">
                    <table class="table">
                      <tr style="text-align: center;">
                        <th style="width:50%">Total:</th>
                        <td><?php echo $total; ?></td>
                      </tr>
                      <tr style="text-align: center;">
                        <th>Net Payable</th>
                        <th><?php echo number_format($total-$inv->ret_com,2); ?></th>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            <table width="100%" style="margin-top: 100px; border:none !important; text-align: center;">
              <tr style="border:none !important">
                <td style="border:none !important; border-top: 1px solid black !important"><b>DSR </b> <br> SIgnature</td>
                <td style="border:none !important" width="10%"></td>    
                <td style="border:none !important; border-top: 1px solid black !important"><b>Supervisor </b> <br> SIgnature</td>    
                <td style="border:none !important" width="10%"></td> 
                <td style="border:none !important; border-top: 1px solid black !important"><b>DH Manager </b> <br> SIgnature</td>    
                <td style="border:none !important" width="10%"></td> 
                <td style="border:none !important; border-top: 1px solid black !important"><b>Accountant </b> <br> SIgnature</td>
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
      </div><!-- /.container-flcode -->
    </section>
    <!-- /.content -->