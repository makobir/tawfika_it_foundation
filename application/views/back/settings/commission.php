<?php

$originalDate = date("d-m-Y");
$newDate = date("m-Y", strtotime($originalDate));
//echo $newDate;
?>

<style type="text/css">
  .car {
    padding: 5px 0px 5px 10px;
  }
</style>

<div class="card card-primary card-outline" style="width: 100%">
  <div class="card-body">
    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">     
      <li class="nav-item">
        <a class="nav-link <?php if($title == 'Set Commission') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#Disbursment" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Commission Settings</a>
      </li> 
    </ul>
    <div class="tab-content" id="custom-content-below-tabContent">
      <div class="tab-pane fade <?php if($title == 'Set Commission') { echo 'show active'; }?>" id="Disbursment" role="tabpanel">
         <div class="row">
            <div class="col-sm-4">
              <!-- form start -->
              <form method="post" action="<?= base_url() ?>super_admin/add_disbursment">
              <div class="card-primary">
                <div class="card-body"> 
                  <div class="form-group">
                    <label>Group</label>
                    <select name="did" class="form-control">
                      <option value="Robi">Robi Load</option>
                        <option value="SIM">Robi  SIM</option>
                        <option value="SIM">Robi MNP</option>
                        <option value="Airtel">Airtel Load</option>
                        <option value="SIM">Airtel SIM</option>
                        <option value="SIM">Airtel MNP</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select name="staff_id" class="form-control select2" style="width: 100%;">
                      <option value=""> Type of Product  </option>
                        <option value="load">Load</option>
                        <option value="Scratch Card">Scratch Card</option>
                        <option value="SIM">SIM</option>
                        <option value="Airtel SIM">Airtel SIM</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input autocomplete="false" name="amount" class="form-control" placeholder="500">
                  </div>
                  <div class="form-group">
                    <label>Remarks (Note)</label>
                    <textarea  autocomplete="false" name="remarks" class="form-control"> </textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              </form>
            </div>
            <div class="col-md-8" style="margin-top: 20px;">
              <div class="row">             
                <table class="table table-bordered">
                  <tr class="d-flex">
                    <th class="col-sm-4">Name </th>
                    <th class="col-sm-2">Lifting</th>
                    <th class="col-sm-2">Sales</th>
                    <th class="col-sm-2">C.</th>
                    <th class="col-sm-2">Action</th>
                  </tr>
                  <?php foreach ($this->Super_admin_model->product_list() as $key => $p) {?>
                  <form method="post" action="<?= base_url() ?>super_admin/product_update/<?php echo $p->id ; ?>">
                    <tr class="d-flex">
                      <td class="col-sm-4"><?php echo $p->name ; ?></td>
                      <td class="col-sm-2">
                        <input style="width: 75px" type="" name="purchase" value="<?php echo $p->purchase ; ?>"> 
                      </td>
                      <td class="col-sm-2">
                        <input style="width: 75px" type="" name="sales" value="<?php echo $p->sales ; ?>"> 
                      </td>                    
                      <td class="col-sm-2">
                        <?php if ($p->sales-$p->purchase != 0){echo number_format($p->sales-$p->purchase,2); } else { echo $p->purchase;} ; ?> 
                      </td>
                      <td class="col-sm-2">
                        <button type="submit">Set</button>
                        <button><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  </form>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
      </div>     
    </div>
  </div>
</div>
