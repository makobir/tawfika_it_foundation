

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All TNX') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All Approved TNX</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'TNX Approval') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#approval" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Payment TNX  <span class="badge badge-warning"><?php echo $this->Super_admin_model->tnx_pending_for_approval(); ?></span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Wallet Balance Approval') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#wallet" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Wallet TNX  <span class="badge badge-warning"><?php echo $this->Super_admin_model->wallet_pending_for_approval(); ?></span></a>
         </li>
         <?php if ($title == 'TNX Details') { ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'TNX Details') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#details" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">TNX Details</a>
         </li>
         <?php } ?>
         <?php if ($title == 'Wallet TNX Details') { ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Wallet TNX Details') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#wdetails" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Wallet TNX Details</a>
         </li>
         <?php } ?>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent"> 
         <div class="tab-pane fade <?php if($title == 'Approval') { echo 'show active'; } ?>" id="approval" role="tabpanel" aria-labelledby="    custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example2" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>ID</th>
                     <th>ID</th>
                     <th>ID</th>
                     <th>Mobile</th>
                     <th>Method</th>
                     <th>TNX ID</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Wallet_model->alltnxapproval() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->sl ?></td>
                    <td><?php echo $value->code ?></td>
                    <td>
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php $center = $this->Super_admin_model->center($value->code); echo $center->site_name; ?>
                     </a>
                     </td>
                    <td><?php echo $value->mobile ?></td>
                    <td><?php echo $value->method ?></td>
                    <td><?php echo $value->tnxid ?></td>
                    <td><?php echo $value->amount ?></td>
                    <td><?php echo $value->date ?></td>
                    <td>                     
                    	   <form method="post" action="<?= base_url() ?>wallet/checktnx">
                        <div class="btn-group">
               			   <input type="hidden" name="mobile" value="<?php echo $value->tnxid ?>" />
                       	   <button type="submit" class="btn btn-default" >Check</button>                      
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $value->sl ?>"><i class="fa fa-trash"></i></button>                   
                        </div>
                    	   </form>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
         <div class="tab-pane fade <?php if($title == 'Wallet Balance Approval') { echo 'show active'; } ?>" id="wallet" role="tabpanel" aria-labelledby="    custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example2" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>ID</th>
                     <th>ID</th>
                     <th>ID</th>
                     <th>Mobile</th>
                     <th>Method</th>
                     <th>TNX ID</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Wallet_model->walletalltnxapproval() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->code ?></td>
                    <td>
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php $center = $this->Super_admin_model->center($value->code); echo $center->site_name; ?>
                     </a>
                     </td>
                    <td><?php echo $value->mobile ?></td>
                    <td><?php echo $value->method ?></td>
                    <td><?php echo $value->tnx ?></td>
                    <td><?php echo $value->amount ?></td>
                    <td><?php echo $value->date ?></td>
                    <td>
                     <div class="btn-group">
                        <form method="post" action="<?= base_url() ?>wallet/checkwtnx">
                           <input type="hidden" name="mobile" value="<?php echo $value->tnx ?>" />
                           <button type="submit" class="btn btn-default" >Check</button>
                        </form>                        
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $value->id ?>"><i class="fa fa-trash"></i></button>                   
                        </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
         </div> 
         <div class="tab-pane fade <?php if($title == 'Refferal TNX') { echo 'show active'; } ?>" id="refferal" role="tabpanel" aria-labelledby="    custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example2" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>ID</th>
                     <th>ID</th>
                     <th>ID</th>
                     <th>Mobile</th>
                     <th>Method</th>
                     <th>TNX ID</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Wallet_model->refferaltnxapproval() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->code ?></td>
                    <td>
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php $center = $this->Super_admin_model->center($value->code); echo $center->site_name; ?>
                     </a>
                     </td>
                    <td><?php echo $value->mobile ?></td>
                    <td><?php echo $value->method ?></td>
                    <td><?php echo $value->tnx ?></td>
                    <td><?php echo $value->amount ?></td>
                    <td><?php echo $value->date ?></td>
                    <td>
                     <div class="btn-group">
                        <form method="post" action="<?= base_url() ?>wallet/checkwtnx">
                           <input type="hidden" name="mobile" value="<?php echo $value->tnx ?>" />
                           <button type="submit" class="btn btn-default" >Check</button>
                        </form>                        
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $value->id ?>"><i class="fa fa-trash"></i></button>                   
                        </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'All TNX') { echo 'show active'; } ?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                   <tr>
                     <th>ID</th>
                     <th>Code</th>
                     <th>Center Name</th>
                     <th>Mobile</th>
                     <th>Method</th>
                     <th>TNX ID</th>
                     <th>Amount</th>
                     <th>For</th>
                     <th>Date</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Wallet_model->alltnx() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->sl ?></td>
                    <td><?php echo $value->code ?></td>
                    <td>
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>"><?php $center = $this->Super_admin_model->center($value->code); echo $center->site_name; ?>
                     </a>
                 	</td>
                    <td>
                     <?php echo $value->mobile ?>
                     </td>
                    <td><?php echo $value->method ?></td>
                    <td><?php echo $value->tnxid ?></td>
                    <td><?php echo $value->amount ?></td>
                    <td><?php echo $value->for ?>( <?php echo $value->examinee ?>)</td>
                    <td><?php echo $value->date ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'TNX Details') { echo 'show active'; } ?>" id="details" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="row" style="margin-top: 20px;">
               <?php if(isset($info)) { ?>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Center Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td> Center Code </td>
                              <td>:</td>
                              <td><?= $info->code; ?></td>
                           </tr>
                           <?php $center = $this->Super_admin_model->center($info->code); ?>
                           <tr>
                              <td> Site Name </td>
                              <td>:</td>
                              <td><?= $center->site_name; ?></td>
                           </tr>
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $center->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Email </td>
                              <td>:</td>
                              <td><?= $center->email; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $center->status; ?></td>
                           </tr>
                           <tr>
                              <td> Address </td>
                              <td>:</td>
                              <td><?= $center->address; ?>, <?= $center->upazila; ?>, <?= $center->district; ?>, <?= $center->division; ?></td>
                           </tr>
                        </table>
                        </div>
                    </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Transection Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $info->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Banking Method </td>
                              <td>:</td>
                              <td><?= $info->method; ?></td>
                           </tr>
                           <tr>
                              <td> Amount </td>
                              <td>:</td>
                              <td style="color:red;"><?= $info->amount; ?> TK</td>
                           </tr>
                           <tr>
                              <td> TNX ID </td>
                              <td>:</td>
                              <td><?= $info->tnxid; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $info->status; ?></td>
                           </tr>
                        </table>
                     </div>
                     <div class="card-footer">   
                        <form method="post" action="<?= base_url() ?>wallet/approve_now/<?= $info->sl; ?>">
                           <input type="hidden" name="amount" value="<?= $info->amount; ?>">
                           <input type="hidden" name="mobile" value="<?= $center->mobile; ?>">
                           <textarea name="remarks" class="form-control" placeholder="Admin Note"></textarea> <br>
                           <button type="submit" class="btn btn-info">Approve Now</button>   
                        </form>                 
                     </div>
                  </div>
               </div>
               <?php } else { ?>
                  <div class="col-sm-6 card card-primary">
                     <?php echo $mobile;?>
                     <h3> Nothing Found</h3>
                  </div>
               <?php } ?>
            </div>
         </div>
         <div class="tab-pane fade <?php if($title == 'Wallet TNX Details') { echo 'show active'; } ?>" id="wdetails" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="row" style="margin-top: 20px;">
               <?php if(isset($info)) { ?>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Center Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td> Center Code </td>
                              <td>:</td>
                              <td><?= $info->code; ?></td>
                           </tr>
                           <?php $center = $this->Super_admin_model->center($info->code); ?>
                           <tr>
                              <td> Site Name </td>
                              <td>:</td>
                              <td><?= $center->site_name; ?></td>
                           </tr>
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $center->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Email </td>
                              <td>:</td>
                              <td><?= $center->email; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $center->status; ?></td>
                           </tr>
                           <tr>
                              <td> Address </td>
                              <td>:</td>
                              <td><?= $center->address; ?>, <?= $center->upazila; ?>, <?= $center->district; ?>, <?= $center->division; ?></td>
                           </tr>
                        </table>
                        </div>
                    </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <?php if ($info->type == 'refferal') { 
                        $center = $this->Super_admin_model->center($info->remarks);
                     ?>

                        <div class="card-body">
                           <table>
                              <tr>
                                 <td width="40%">Refferal Institute </td>
                                 <td><?= $center->site_name; ?> </td>
                              </tr>
                              <tr>
                                 <td>Address </td>
                                 <td><?= $center->address; ?> </td>
                              </tr>
                              <tr>
                                 <td>Mobile </td>
                                 <td><?= $center->mobile; ?> </td>
                              </tr>
                              <tr>
                                 <td>Email </td>
                                 <td><?= $center->email; ?> </td>
                              </tr>
                              <tr>
                                 <td>Amount </td>
                                 <td><?= $info->amount; ?> TK </td>
                              </tr>
                           </table>
                        </div>
                     <?php } else { ?>
                     <div class="card-header">
                        Transection Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $info->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Banking Method </td>
                              <td>:</td>
                              <td><?= $info->method; ?></td>
                           </tr>
                           <tr>
                              <td> Amount </td>
                              <td>:</td>
                              <td style="color:red;"><?= $info->amount; ?> TK</td>
                           </tr>
                           <tr>
                              <td> TNX ID </td>
                              <td>:</td>
                              <td><?= $info->tnx; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $info->status; ?></td>
                           </tr>
                        </table>
                     </div>
                     <?php } ?>
                     <div class="card-footer">   
                        <form method="post" action="<?= base_url() ?>wallet/wtnxapprove_now/<?= $info->id; ?>">
                           <textarea name="remarks" class="form-control" placeholder="Admin Note"></textarea> <br>
                           <button type="submit" class="btn btn-info">Approve Now</button>   
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
         
        <!--  
         <div class="tab-pane fade <?php if($title == 'Wallet TNX Details') { echo 'show active'; } ?>" id="wdetails" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;" class="row">
               <?php if(isset($info)) { ?>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Center Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td> Center Code </td>
                              <td>:</td>
                              <td><?= $info->code; ?></td>
                           </tr>
                           <?php $center = $this->Super_admin_model->center($info->code); ?>
                           <tr>
                              <td> Site Name </td>
                              <td>:</td>
                              <td><?= $center->site_name; ?></td>
                           </tr>
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $center->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Email </td>
                              <td>:</td>
                              <td><?= $center->email; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $center->status; ?></td>
                           </tr>
                           <tr>
                              <td> Address </td>
                              <td>:</td>
                              <td><?= $center->address; ?>, <?= $center->upazila; ?>, <?= $center->district; ?>, <?= $center->division; ?></td>
                           </tr>
                        </table>
                        </div>
                    </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Transection Details
                     </div>
                     <div class="card-body">
                        <table style="width: 100%;">
                           <tr>
                              <td> Mobile </td>
                              <td>:</td>
                              <td><?= $info->mobile; ?></td>
                           </tr>
                           <tr>
                              <td> Banking Method </td>
                              <td>:</td>
                              <td><?= $info->method; ?></td>
                           </tr>
                           <tr>
                              <td> Amount </td>
                              <td>:</td>
                              <td style="color:red;"><?= $info->amount; ?> TK</td>
                           </tr>
                           <tr>
                              <td> TNX ID </td>
                              <td>:</td>
                              <td><?= $info->tnx; ?></td>
                           </tr>
                           <tr>
                              <td> Status </td>
                              <td>:</td>
                              <td><?= $info->status; ?></td>
                           </tr>
                        </table>
                     </div>
                     <div class="card-footer">   
                        <form method="post" action="<?= base_url() ?>wallet/wtnxapprove_now/<?= $info->id; ?>">
                           <textarea name="remarks" class="form-control" placeholder="Admin Note"></textarea> <br>
                           <button type="submit" class="btn btn-info">Approve Now</button>   
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
         </div> -->
    </div>
</div>



<?php 
   foreach ($this->Wallet_model->alltnxapproval() as $key => $value) {
?>
<div class="modal fade" id="exampleModal<?php echo $value->sl ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table>
            <tr>
               <tr>   
                    <td colspan="2">
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php $center = $this->Super_admin_model->center($value->code); echo $center->site_name; ?>
                     </a>
                     </td>
               </tr> 
               <tr>   
                  <td>Mobile </td>
                    <td><?php echo $value->mobile ?></td>
               </tr> 
               <tr>  
                  <td>Method </td> 
                    <td><?php echo $value->method ?></td>
               </tr> 
               <tr>   
                  <td>TNX ID </td>
                    <td><?php echo $value->tnxid ?></td>
               </tr> 
               <tr>   

                  <td>Amount </td>
                    <td><?php echo $value->amount ?></td>
               </tr> 
               <tr>   
                  <td>Date </td>
                    <td><?php echo $value->date ?></td>  
               </tr> 
               <tr>                   
            </tr>
         </table>
      </div>
      <div class="modal-footer">
        Do you want to delete this ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary left" data-dismiss="modal">No</button>
        <a href="<?= base_url() ?>wallet/delete_tnx/<?php echo $value->sl ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php 
   foreach ($this->Wallet_model->walletalltnxapproval() as $key => $value) {
?>
<div class="modal fade" id="exampleModal<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table>
            <tr>
               <tr>   
                    <td colspan="2">
                     <a href="<?php echo base_url() ?>super_admin/centerdetails/<?php echo $value->code ?>">
                     <?php $center = $this->Super_admin_model->center($value->code); echo $center->site_name; ?>
                     </a>
                     </td>
               </tr> 
               <tr>   
                  <td>Mobile </td>
                    <td><?php echo $value->mobile ?></td>
               </tr> 
               <tr>  
                  <td>Method </td> 
                    <td><?php echo $value->method ?></td>
               </tr> 
               <tr>   
                  <td>TNX ID </td>
                    <td><?php echo $value->tnx ?></td>
               </tr> 
               <tr>   

                  <td>Amount </td>
                    <td><?php echo $value->amount ?></td>
               </tr> 
               <tr>   
                  <td>Date </td>
                    <td><?php echo $value->date ?></td>  
               </tr> 
               <tr>                   
            </tr>
         </table>
      </div>
      <div class="modal-footer">
        Do you want to delete this ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary left" data-dismiss="modal">No</button>
        <a href="<?= base_url() ?>wallet/delete_w_tnx/<?php echo $value->id ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php 
   foreach ($this->Wallet_model->refferaltnxapproval() as $key => $value) {
?>
<div class="modal fade" id="exampleModal<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php
                        $center = $this->Super_admin_model->center($value->remarks);
                     ?>

                        <div class="card-body">
                           <table>
                              <tr>
                                 <td width="40%">Refferal Institute </td>
                                 <td><?= $center->site_name; ?> </td>
                              </tr>
                              <tr>
                                 <td>Address </td>
                                 <td><?= $center->address; ?> </td>
                              </tr>
                              <tr>
                                 <td>Mobile </td>
                                 <td><?= $center->mobile; ?> </td>
                              </tr>
                              <tr>
                                 <td>Email </td>
                                 <td><?= $center->email; ?> </td>
                              </tr>
                              <tr>
                                 <td>Amount </td>
                                 <td><?= $info->amount; ?> TK </td>
                              </tr>
                           </table>
      </div>
      <div class="modal-footer">
        Do you want to delete this ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary left" data-dismiss="modal">No</button>
        <a href="<?= base_url() ?>wallet/delete_tnx/<?php echo $value->id ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>