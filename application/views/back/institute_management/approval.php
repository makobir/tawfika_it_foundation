
<style type="text/css">
   td {
      word-wrap: break-word;
   }
</style>

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Approval') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#approval" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Waiting for Approval <span class="badge badge-warning"><?php echo $this->Super_admin_model->pending_for_approval(); ?></span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Centers') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All Centers</a>
         </li>
         <?php if ($title == 'Center Details') { ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Center Details') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#details" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Center Details</a>
         </li>
         <?php } if ($title == 'Edit Center') { ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Edit Center') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#edit" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Edit Center</a>
         </li>
         <?php } ?>
         <?php if ($title == 'Terminated Centers') { ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Terminated Centers') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#terminated" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Terminated Centers</a>
         </li>
         <?php } ?>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent"> 
         <div class="tab-pane fade <?php if($title == 'Approval') { echo 'show active'; }?>" id="approval" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example2" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>Code</th>
                     <th>Name</th>
                     <th>Address</th>
                     <th>Mobile</th>
                     <th>Email</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Super_admin_model->approvalcenters() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->code ?></td>
                    <td>
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php echo $value->site_name ?>
                     </a>
                     </td>
                    <td><?php echo $value->address ?></td>
                    <td><?php echo $value->mobile ?></td>
                    <td><?php echo $value->email ?></td>
                    <td>
                    <div class="btn-group">    
                     <a href="<?= base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>   
                     <a href="<?= base_url() ?>super_admin/edit_center/<?php echo $value->code ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $value->code ?>"><i class="fa fa-trash"></i></button>
                     </div>
                     </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
         <div class="tab-pane fade <?php if($title == 'All Centers') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>Code</th>
                     <th>Name</th>
                     <th>Address</th>
                     <th>Mobile</th>
                     <th  width="5%">Email</th>
                     <th>Admitted</th>
                     <th>Exam Enrolled</th>
                     <th>Referral</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Super_admin_model->allcenters() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->code ?></td>
                    <td>
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php echo $value->site_name ?>
                     </a>
                     </td>
                    <td><?php echo $value->address ?></td>
                    <td><?php echo $value->mobile ?></td>
                    <td width="10%"><?php echo $value->email ?></td>
                    <td>
                     <?php $id = $value->code;
                     $enrolled = $this->Super_admin_model->tcenrolled($id); 
                     echo $enrolled;
                     ?> 
                     </td>
                    <td>
                     <?php $id = $value->code;
                     $enrolled = $this->Super_admin_model->tcexaminee($id); 
                     echo $enrolled;
                     ?>                        
                    </td>
                    <td><?php $cen = $this->Super_admin_model->center($value->refferal); echo $cen->site_name."(".$value->refferal.")";?></php> 
                    <td>
                        <?php if($this->session->userdata('usertype') == 'super_admin') { ?>
                        <a href="<?= base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                        <a href="<?= base_url() ?>super_admin/terminate/<?php echo $value->code; ?>" class="btn btn-default" title="Delete / Terminate"> <i style="color:red;" class="fa fa-sign-out-alt"></i></a>
                        <?php } ?>
                     </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

         <div class="tab-pane fade <?php if($title == 'Terminated Centers') { echo 'show active'; }?>" id="terminated" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>Code</th>
                     <th>Name</th>
                     <th>Address</th>
                     <th>Mobile</th>
                     <th>Email</th>
                     <th>Enrolled</th>
                     <th>Passed</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Super_admin_model->terminatedcenters() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->code ?></td>
                    <td>
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php echo $value->site_name ?>
                     </a>
                     </td>
                    <td><?php echo $value->address ?></td>
                    <td><?php echo $value->mobile ?></td>
                    <td><?php echo $value->email ?></td>
                    <td>
                     <?php $id = $value->id;
                     $enrolled = $this->Super_admin_model->cenrolled($id); 
                     echo $enrolled;
                     ?> 
                     </td>
                    <td>
                     <?php $id = $value->id;
                     $enrolled = $this->Super_admin_model->cexaminee($id); 
                     echo $enrolled;
                     ?>                        
                    </td>
                    <td>
                        <?php if($this->session->userdata('usertype') == 'super_admin') { ?>
                        <a href="<?= base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                        <a href="<?= base_url() ?>super_admin/activecenter/<?php echo $value->code; ?>" class="btn btn-default" title="Delete / Terminate"> <i style="color:red;" class="fa fa-sign-in-alt"></i></a>
                        <?php } ?>
                     </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
         <div class="tab-pane fade <?php if($title == 'Center Details') { echo 'show active'; }?>" id="details" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;" class="row">
               <?php if(isset($details)) { ?>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Center Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td width="30%"> Center Name </td>
                              <td>:</td>
                              <td><?= $details->site_name; ?></td>
                           </tr>
                           <tr>
                              <td> Code </td>
                              <td>:</td>
                              <td><?= $details->code; ?></td>
                           </tr>
                           <tr>
                              <td> District </td>
                              <td>:</td>
                              <td><?= $details->district; ?></td>
                           </tr>
                           <tr>
                              <td> Address </td>
                              <td>:</td>
                              <td><?= $details->address; ?>, <?= $details->upazila; ?>, <?= $details->district; ?>, <?= $details->division; ?>.</td>
                           </tr>
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $details->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Email </td>
                              <td>:</td>
                              <td><?= $details->email; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $details->status; ?></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        User Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td>Name </td>
                              <td>:</td>
                              <td><?= $details->uname; ?></td>
                           </tr>
                           <tr>
                              <td> District </td>
                              <td>:</td>
                              <td><?= $details->district; ?></td>
                           </tr>
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $details->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Email </td>
                              <td>:</td>
                              <td><?= $details->email; ?></td>
                           </tr>
                           <!-- <tr>
                              <td> Password </td>
                              <td>:</td>
                              <td><?= $details->password; ?></td>
                           </tr> -->
                           <tr>
                              <td> Apply Date </td>
                              <td>:</td>
                              <td><?= $details->date; ?></td>
                           </tr>
                           <tr>
                              <td> Approved Date </td>
                              <td>:</td>
                              <td><?= $details->approved_date; ?></td>
                           </tr>
                           <?php
                              $id = $details->refferal;
                              $cen = $this->Super_admin_model->center($id);
                           if($cen != NULL) {  ?>
                           <tr>
                              <td> Reffered By </td>
                              <td>:</td>
                              <td><?php echo $cen->site_name; ?></td>
                           </tr>
                           <tr>
                              <td> Reffered Code </td>
                              <td>:</td>
                              <td><?php 
                               echo $cen->code; ?></td>
                           </tr>
                        <?php } ?>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                       Last Payments Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <?php if (isset($payment)) { ?>
                           <tr>
                              <td>Method </td>
                              <td>:</td>
                              <td><?php if(isset($payment->method)) echo $payment->method; ?></td>
                           </tr>
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $payment->pmobile; ?></td>
                           </tr>
                           <tr>
                              <td> TNX ID </td>
                              <td>:</td>
                              <td><?= $payment->tnxid; ?></td>
                           </tr>
                           <tr>
                              <td> Amount </td>
                              <td>:</td>
                              <td><?= $payment->amount; ?></td>
                           </tr>
                           <tr>
                              <td> Date </td>
                              <td>:</td>
                              <td><?= $payment->time; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $payment->status; ?></td>
                           </tr>
                           <?php } ?>
                        </table>
                     </div>
                     <div class="card-footer" align="right">
                        <a class="btn btn-default" href="<?= base_url() ?>wallet/all_transactions/<?= $details->code; ?>">All Transactions</a>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Approval
                     </div>
                     <div class="card-body">
                        <?php if ($details->status == 'Approved') { ?>
                           <button class="btn btn-success">Approved</button>
                        <?php } else { ?>
                        <form method="post" action="<?= base_url() ?>super_admin/approve_now">
                           <input type="hidden" name="id" value="<?= $details->code; ?>">
                           <?php if ($payment != NULL ) { ?>
                           <input type="hidden" name="payment_id" value="<?= $payment->payment_id; ?>">
                           <?php } ?>
                           <textarea name="remarks" class="form-control" placeholder="Admin Note"></textarea> <br>
                           <?php $ins = $this->Super_admin_model->checkinspayment($details->code); 
                              if(isset($ins)) {
                           ?>
                           <button <?php if($ins->status != 'Approved') {echo 'disabled';} ?> type="submit" class="btn btn-info">Approve Now</button>
                        </form>
                       <?php } } ?>
                     </div>
                  </div>
               </div>
               <?php } else { ?>
                  <div class="col-sm-6 card card-primary">
                     <h3> Nothing Found</h3>
                  </div>
               <?php } ?>
            </div>
         </div>    
         <div class="tab-pane fade <?php if($title == 'Edit Center') { echo 'show active'; }?>" id="edit" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;" class="row">
               <?php if(isset($details)) { ?>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Center Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td width="30%"> Center Name </td>
                              <td>:</td>
                              <td><?= $details->site_name; ?></td>
                           </tr>
                           <tr>
                              <td> Code </td>
                              <td>:</td>
                              <td><?= $details->code; ?></td>
                           </tr>
                           <tr>
                              <td> District </td>
                              <td>:</td>
                              <td><?= $details->district; ?></td>
                           </tr>
                           <tr>
                              <td> Address </td>
                              <td>:</td>
                              <td><?= $details->address; ?>, <?= $details->upazila; ?>, <?= $details->district; ?>, <?= $details->division; ?>.</td>
                           </tr>
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $details->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Email </td>
                              <td>:</td>
                              <td><?= $details->email; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $details->status; ?></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Fee Details
                     </div>
                     <?php 
                        $aff = $this->Super_admin_model->center($details->refferal); 
                        if($aff != NULL) {
                      ?>
                     <div class="card-body">
                        <form method="post" action="<?= base_url() ?>super_admin/update_refferal_code">
                        <table style="width: 100%;">
                           <tr>
                              <td>Reffered by  </td>
                              <td>:</td>
                              <td><?php 
                                 $aff = $this->Super_admin_model->center($details->refferal);
                               echo $aff->site_name; ?>
                                  
                               </td>
                           </tr>
                           <tr>
                              <td> Code </td>
                              <td>:</td>
                              <td><?php                                 
                               echo $aff->code; ?></td>
                           </tr>
                           <tr>
                              <td> Change Refferal Code to </td>
                              <td>:</td>
                              <td><?php 
                               ?>
                                    <input class="form-control" type="hidden" name="code" value="<?= $details->code;?>">
                                    <input class="form-control" type="text" name="refferal" value="<?= $details->refferal;?>">
                                 </td>
                           </tr>
                           <tr>
                              <td>
                                 <button type="submit" class="btn btn-info">Update Refferal Code</button>
                              </td>
                              
                           </tr>
                        </table>
                     </form>
                     </div>
                     <?php } ?>
                     <div class="card-body">
                        <form method="post" action="<?= base_url() ?>super_admin/update_aff_fee">
                        <table style="width: 100%;">
                           
                           <tr>
                              <td> Affiliation Fee </td>
                              <td>:</td>
                              <td><?php 
                                 $fee = $this->Super_admin_model->fee_check($details->code);
                               ?>
                                    <input class="form-control" type="hidden" name="code" value="<?= $details->code;?>">
                                    <input class="form-control" type="text" name="aff_fee" value="<?= $fee->amount;?>">
                                 </td>
                           </tr>
                           <tr>
                              <td>
                                 <button type="submit" class="btn btn-info">Update Affiliation Fee</button>
                              </td>
                              
                           </tr>
                        </table>
                     </form>
                     </div>
                  </div>
               </div>
               <?php } else { ?>
                  <div class="col-sm-6 card card-primary">
                     <h3> Nothing Found</h3>
                  </div>
               <?php } ?>
            </div>
         </div>
    </div>
</div>



<?php 
   foreach ($this->Super_admin_model->approvalcenters() as $key => $value) {
?>
<div class="modal fade" id="exampleModal<?php echo $value->code ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete this @ <?php echo $value->site_name; ?> ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary left" data-dismiss="modal">No</button>
        <a href="<?= base_url() ?>super_admin/delete_institute/<?php echo $value->code ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>



