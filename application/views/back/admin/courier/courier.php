
<?php if ($title == 'Send') { ?>

<div class="card card-primary card-outline" style="margin-top: 20px; width: 100%;">
   <div class="row">
      <div class="col-sm-12">
         <div class="card card-primary">
            <div class="card-body">
               <div class="col-md-12" style="background: #9ea09f; padding:7px 10px; font-weight: bold;margin-bottom: 7px;">
                  Courier Information 
               </div>
               <form method="post" action="<?= base_url() ?>admin/send_to/<?= $id; ?>">
               <div class="row" >
                 <div class="col-sm-6">
                   <div class="form-group">
                        <label></label>
                     <select class="form-control select2" name="code" onchange="if (this.value) window.location.href=this.value">
                        <option value="0">Select Center</option>  
                        <?php foreach ($this->Super_admin_model->centers() as $key => $value) { ?>
                        <option <?php if($value->code == $id) {echo "selected";} ?> value="<?= base_url().'admin/send/'.$value->code; ?>"><?= $value->site_name; ?> - <?= $value->code; ?></option>
                        <?php } ?>
                     </select>
                   </div>
                 </div> 
                  <div class="col-md-6">
                     <div class="form-group">
                        <label></label>
                        <input type="text" name="name" id="name" class="form-control" required placeholder="Courier Name & SL.No"   >
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="row">
                        <label></label> 
                        <?php foreach ($documents as $key => $value) { ?> 
                           <div class="col-sm-2">                            
                             <div class="input-group" style="width: 250px;">
                               <div class="input-group-prepend">
                                 <span class="input-group-text">
                                  <input style="width:20px; height: 20px;" type="checkbox" name="trainee_id[]" value="<?= $value->trainee_id; ?>">
                                 </span>
                               </div>            
                                 <div class="input-group-append">
                                     <div class="input-group-text" >
                                       <?= $value->trainee_id; ?>
                                     </div>
                                 </div>          
                             </div>  
                           </div>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label></label>
                        <textarea name="details" rows="5" class="form-control" placeholder="Courier Details"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">                        
                        <button type="submit" class="btn btn-primary">Send</button>
                     </div>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>



<?php } if ($title == 'Report') { ?>

<div class="card card-primary card-outline" style="width: 100%">   
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
            <thead>
               <tr class="text-center">
                  <th>SL</th>
                  <th>Code</th>
                  <th>Center</th>
                  <th>Date</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>                  
                  <?php $i = 1;                  
                     foreach ($this->Courier_model->report() as $key => $t) {
                  ?>
               <tr class="text-center">  
                  <td><?php echo $i; ?></td>               
                  <td><?php echo $t->code; ?></td>
                  <td><?php
                  $id = $t->code;
                  $center = $this->Courier_model->center($id);
                   echo $center->site_name; 
                  ?></td>
                  <td><?php echo $t->date; ?></td>
                  <td><?php echo $t->status; ?></td>                                  
               </tr>
               <?php $i++;}  ?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<?php } ?>

<?php if ($title == 'Receive') { ?>

<div class="card card-primary card-outline" style="width: 100%">   
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
            <thead>
               <tr class="text-center">
                  <th>SL</th>
                  <th>Date</th>
                  <th>Courier Name & ID</th>
                  <th>Details</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>                  
                  <?php $i = 1;                  
                     foreach ($this->Courier_model->arrived() as $key => $t) {
                  ?>
               <tr class="text-center">  
                  <td><?php echo $i; ?></td>      
                  <td><?php echo $t->date; ?></td>
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->details; ?></td>
                  <td>
                     <a class="btn btn-default" href="<?= base_url() ?>courier/details/<?php echo $t->sl; ?>">View</a>
                     <a class="btn btn-info" href="<?= base_url() ?>courier/receive_now/<?php echo $t->sl; ?>">Receive Now</a>
                  </td>                                  
               </tr>
               <?php $i++;}  ?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<?php } ?><?php if ($title == 'History'  && $this->session->userdata('usertype') == 'super_admin') { ?>

<div class="card card-primary card-outline" style="width: 100%">   
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
            <thead>
               <tr class="text-center">
                  <th>SL</th>
                  <th>Code</th>
                  <th>Center</th>
                  <th>Send Date</th>
                  <th>Recieved Date</th>
               </tr>
            </thead>
            <tbody>                  
                  <?php  $i = 1;               
                     foreach ($this->Courier_model->received() as $key => $t) {  
                  ?>
               <tr class="text-center">  
                  <td><?php echo $i; ?></td>               
                  <td><?php echo $t->code; ?></td>
                  <td><?php
                  $id= $t->code;
                  $center = $this->Courier_model->center($id);
                   echo $center->site_name; 
                  ?></td>
                  <td><?php echo $t->date; ?></td>
                  <td><?php echo $t->received_date; ?></td>                                  
               </tr>
               <?php $i++;}  ?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<?php } ?>
<?php if ($title == 'History' && $this->session->userdata('usertype') == 'branch') { ?>

<div class="card card-primary card-outline" style="width: 100%">   
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div style="margin-top: 20px;">
         <table id="example1" class="table table-bordered table-striped" >
            <thead>
               <tr class="text-center">
                  <th>SL</th>
                  <th>Courier & Tracking ID</th>
                  <th>Message</th>
                  <th>Send Date</th>
                  <th>Recieved Date</th>
               </tr>
            </thead>
            <tbody>                  
                  <?php  $i = 1;               
                     foreach ($this->Courier_model->received() as $key => $t) {  
                  ?>
               <tr class="text-center">  
                  <td><?php echo $i; ?></td>               
                  <td><?php echo $t->name; ?></td>
                  <td><?php echo $t->details; ?></td>
                  <td><?php echo $t->date; ?></td>
                  <td><?php echo $t->received_date; ?></td>                                  
               </tr>
               <?php $i++;}  ?>
            </tbody>
            <tfoot>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<?php } ?>