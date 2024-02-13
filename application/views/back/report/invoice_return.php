<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// Update item quantity
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('invoice/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>

<?php if($invoice != NULL) { ?>

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
                <div class="col-sm-4 invoice-col">
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
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $staff->card_no. ' - '. $staff->name; ?></strong><br>
                    Robi Mobile : <?php echo $staff->mobile1 ?> <br>
                    Airtel Mobile :  <?php echo $staff->mobile2 ?>.<br>
                    Phone: <br>
                    Email:
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <br>
                  <b>Invoice #<?php echo $staff->invoice_id ?></b><br>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <form method="post" action="<?php echo base_url(); ?>invoice/invoice_update/<?php echo $staff->invoice_id; ?>" >
            <input type="hidden" name="invoice_id" value="<?php echo $staff->invoice_id; ?>">
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Product</th>
                      <th>Sales Price</th>
                      <th>Quantity</th>
                      <th>Return</th>
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
                      <td>
                        <input style="width: 100px" class="form-control" name="new_qty[]" value="<?php echo $inv->qty; ?>">
                      </td>
                      <td><?php echo $inv->price; ?>৳</td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?php echo $inv->id; ?>">
                    <input type="hidden" name="cat[]" value="<?php echo $inv->cat; ?>">
                    <input type="hidden" name="sales[]" value="<?php echo $inv->sales; ?>">
                    <input type="hidden" name="purchase[]" value="<?php echo $inv->purchase; ?>">
                    <input type="hidden" name="qty[]" value="<?php echo $inv->qty; ?>">
                    <input type="hidden" name="price[]" value="<?php echo $inv->price; ?>">
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
                      <tr style="text-align:center;padding-left:20px;">
                        <th style="width:50%">Total:</th>
                        <td style="padding-left: 68px;"><?php echo number_format($total,2) ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">  
                  <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Update Invoice
                  </button><!--
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </form>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-flcode -->
    </section>
<?php } else { ?>
  <div class="container" style="margin: 20px; font-size: 20px; color: red; text-align: center;">
    
   Nothings Found.
  </div>
<?php } ?>
    <!-- /.content -->