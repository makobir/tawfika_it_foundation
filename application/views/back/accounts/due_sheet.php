<div class="row no-print" style="width: 100%">
   <div class="col-sm-12">
      <div class="card card-primary">
         <div class="card-body">
            <form method="post" action="<?= base_url() ?>accounts/due">
               <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                              </span>
                           </div>
                           <select class="form-control " name="year" id="year" required>
                              <option>Year</option>
                              <?php $year = $this->input->post('year'); ?>
                              <option <?php if($year == '2008') { echo 'selected';} ?> value="2008">2008</option>
                              <option <?php if($year == '2009') { echo 'selected';} ?> value="2009">2009</option>
                              <option <?php if($year == '2010') { echo 'selected';} ?> value="2010">2010</option>
                              <option <?php if($year == '2011') { echo 'selected';} ?> value="2011">2011</option>
                              <option <?php if($year == '2012') { echo 'selected';} ?> value="2012">2012</option>
                              <option <?php if($year == '2013') { echo 'selected';} ?> value="2013">2013</option>
                              <option <?php if($year == '2014') { echo 'selected';} ?> value="2014">2014</option>
                              <option <?php if($year == '2015') { echo 'selected';} ?> value="2015">2015</option>
                              <option <?php if($year == '2016') { echo 'selected';} ?> value="2016">2016</option>
                              <option <?php if($year == '2017') { echo 'selected';} ?> value="2017">2017</option>
                              <option <?php if($year == '2018') { echo 'selected';} ?> value="2018">2018</option>
                              <option <?php if($year == '2019') { echo 'selected';} ?> value="2019">2019</option>
                              <option <?php if($year == '2020') { echo 'selected';} ?> value="2020">2020</option>
                              <option <?php if($year == '2021') { echo 'selected';} ?> value="2021">2021</option>
                              <option <?php if($year == '2022') { echo 'selected';} ?> value="2022">2022</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="fas fa-book"></i>
                              </span>
                           </div>
                           <select name="scode" class="form-control" onchange="javascript:this.form.submit()">
                              <option value="">Select Session</option>
                              <?php $scode = $this->input->post('scode'); 
                              foreach ($this->Institute_model->session() as $key => $value) { ?>                              
                              <option <?php if($scode == $value->scode) { echo 'selected';} ?> value="<?= $value->scode; ?>"><?= $value->session; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <button type="submit" class="btn btn-info">View Report </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php 
   if ($this->input->post('scode') != NULL) {
     $scode = $this->input->post('scode');     
   } 
   else {
     $scode = '';
   }; 
   if ($this->input->post('year') != NULL) {
     $year = $this->input->post('year');     
   }
   else {
     $year = '';
   }
  
   ?>


   <div class="card card-primary" style="width:100%;">
  <div class="card card-primary">
    <div class="card-body">
    	<div class="col-sm-12">				
        <table id="example1" class="table table-bordered table-striped" >
          <thead>
             <tr>
               <th>SL</th>
               <th>ID</th>
               <th>Name</th>
               <th>Mobile</th>
               <th>Fee</th>
               <th>Paid</th>
               <th>Due</th>
             </tr>
          </thead>
          <tbody>
            <?php 
              $id = 1;
               foreach ($this->Accounts_model->trainee($scode,$year) as $key => $value) {  
                $paid = $this->Accounts_model->paid($value->regi); 
                $fee = $this->Accounts_model->feedetails($value->regi);
                $total = $fee->course_fee+$fee->admission+$fee->registration+$fee->center+$fee->exam+$fee->others+$fee->practical ;
                if($total > $paid->amount ) {                  
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $value->regi ?></td>
              <td><?php echo $value->name ?></td>
              <td><?php echo $value->mobile ?></td>
              <td>
                <?php 
                  echo $total; 
                ?>                  
              </td>
              <td>
                <?php 
                  echo $paid->amount; 
                ?>                  
              </td>
              <td><?php echo $total - $paid->amount ?></td>
            </tr>
            <?php $id++; } } ?>
          </tbody>
        </table>
			</div>
    </div>
  </div>
</div>