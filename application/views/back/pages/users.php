

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Users') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All Users</a>
         </li>
         <?php if ($title == 'Center Details') { ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Center Details') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#details" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">User Details</a>
         </li>
         <?php } ?>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent"> 
         <div class="tab-pane fade <?php if($title == 'Users') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="row" style="margin-top: 20px;">
                  <div class="col-sm-4" style="text-align:right;">  
                  </div>                  
                  <div class="col-sm-4" style="text-align:right;">   
                  </div>                 
                  <div class="col-sm-4" style="text-align:right;">                    
                    <div class="form-group">
                        <form method="post" action="<?= base_url() ?>super_admin/users">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <select name="type" class="form-control" onchange="javascript:this.form.submit()">
                           <option value="">Select User Type</option> 
                           <option value="branch">Branch</option>
                           <option value="trainee">Trainee</option>
                           <option value="admin">Admin</option>                         
                        </select>
                        </form>
                      </div>
                    </div> 
                  </div> 
               <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped" >
                <thead>
                      <tr>
                        <th>Code</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Email / Username</th>
                        <th>Passwords</th>
                      </tr>
                   </thead>
                   <tbody>
                     <?php 
                        $type = $this->input->post('type');                        
                        $user =$this->Super_admin_model->users($type);                        
                        foreach ($user as $key => $value) {
                     ?>
                     <tr>
                       <td><?php echo $value->code ?></td>
                       <td><?php echo $value->role ?></td>
                       <td><?php echo $value->name ?></td>
                       <td><?php echo $value->email ?></td>
                       <td><?php echo $value->password ?></td>
                     </tr>
                     <?php } ?>
                   </tbody>
                 </table>
            </div>
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
                           <tr>
                              <td> Password </td>
                              <td>:</td>
                              <td><?= $details->password; ?></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        Payments Details
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
                           <?php $ins = $this->Super_admin_model->checkinspayment($details->code); ?>
                           <button <?php if($ins != NULL) {echo 'disabled';} ?> type="submit" class="btn btn-info">Approve Now</button>
                        </form>
                       <?php } ?>
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



