<div class="card card-primary card-outline" style="width: 100%">
  <div class="card-body">
    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link <?php if($title == 'All Purchase') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#load" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All Purchase</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" id="custom-content-below-home-tab" href="<?= base_url() ?>purchase/purchase_report" >Print Report</a>
      </li>
    </ul>
    <div class="tab-content" id="custom-content-below-tabContent">
      <div class="tab-pane fade <?php if($title == 'All Purchase') { echo 'show active'; }?>" id="load" role="tabpanel">
        <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
          <thead>
          <tr>
            <th>SL</th>
            <th>Group</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Quantity</th>
            <th>Commission</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php $i =0; $bal =0;$com =0; $qua =0;  foreach ($this->Super_admin_model->all_purchase() as $key => $value) { 
            $i++; 
          $bal+= $value->price;
          $qua+= $value->qty;
          $com+= $value->commission;

            ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td>
              <?php
              $pid = $value->pid;
              $product = $this->Super_admin_model->product_info($pid);
               echo $product->name; 
               ?>            
            </td>
            <td>
              <?php echo $product->type;  ?>
            </td>
            <td><?php echo $value->price ?></td>
            <td><?php echo $value->qty ?></td>
            <td><?php echo $value->commission ?></td>
            <td><?php echo $value->date ?></td>
            <td> 
              <a href="<?= base_url ()?>purchase/edit_purchase/<?php echo $value->id ?>" class="btn btn-primary"> <i class="fa fa-edit"></i>  Edit</a>
              <?php if($this->session->userdata('usertype') == 'super_admin') { ?>
              <a href="<?= base_url ()?>purchase/delete_purchase/<?php echo $value->id ?>" class="btn btn-danger"> <i class="fa fa-trash"></i>  Delete</a>  <?php } ?>
            </td>
          </tr>
          <?php } ?>

          </tbody>
          <tfoot>
          <tr>
            <th colspan="3">Total</th>
            <th><?php echo $bal; ?></th>
            <th><?php echo $qua; ?></th>
            <th><?php echo $com; ?></th>
            <th></th>
            <th></th>
          </tr>
          </tfoot>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>

