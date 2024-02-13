<style type="text/css">
	tr:hover {
		background-color: #e7defc !important;
	}
</style>

<div class="card card-primary" style="width:100%">
    <div class="card-body">
       <form method="post" action="<?= base_url() ?>institute/trainee_attendance">
          <div class="row">
          <div class="col-sm-2">
             <div class="form-group">
                <div class="input-group">
                   <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                      </span>
                   </div>
                   <select class="form-control " name="year" id="year" required>
                      <option value="">Year</option>
                      <?php $year = $this->input->post('year'); ?>                              
                      <option <?php if($year == '2022') { echo 'selected';} ?> value="2022">2022</option>
                      <option <?php if($year == '2021') { echo 'selected';} ?> value="2021">2021</option>
                      <option <?php if($year == '2020') { echo 'selected';} ?> value="2020">2020</option>
                      <option <?php if($year == '2019') { echo 'selected';} ?> value="2019">2019</option>
                      <option <?php if($year == '2018') { echo 'selected';} ?> value="2018">2018</option>
                      <option <?php if($year == '2017') { echo 'selected';} ?> value="2017">2017</option>
                      <option <?php if($year == '2016') { echo 'selected';} ?> value="2016">2016</option>
                      <option <?php if($year == '2015') { echo 'selected';} ?> value="2015">2015</option>
                      <option <?php if($year == '2014') { echo 'selected';} ?> value="2014">2014</option>
                      <option <?php if($year == '2013') { echo 'selected';} ?> value="2013">2013</option>
                      <option <?php if($year == '2012') { echo 'selected';} ?> value="2012">2012</option>
                      <option <?php if($year == '2011') { echo 'selected';} ?> value="2011">2011</option>
                      <option <?php if($year == '2010') { echo 'selected';} ?> value="2010">2010</option>
                      <option <?php if($year == '2009') { echo 'selected';} ?> value="2009">2009</option>                              
                      <option <?php if($year == '2008') { echo 'selected';} ?> value="2008">2008</option>                              
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
                   <select name="scode" class="form-control" required>
                      <option value="">Select Session</option>
                      <?php $session = $this->input->post('scode'); 
                      foreach ($this->Institute_model->session() as $key => $value) { ?>                              
                      <option <?php if($session == $value->scode) { echo 'selected';} ?> value="<?= $value->scode; ?>"><?= $value->session; ?></option>
                      <?php } ?>
                   </select>
                </div>
             </div>
          </div>
             <div class="col-md-3">
                <div class="form-group">
                   <select class="form-control " name="course_id" id="course_id" required>
                      <option value="">Select Course</option>
                      <?php $course = $this->input->post('course_id'); ?>
                      <?php foreach ($this->Institute_model->courses() as $key => $value) { ?>
                      <option <?php if($course == $value->id) {echo 'selected';}?>  value="<?php echo $value->id ;?>" > <?php echo $value->title ;?> </option>
                      <?php } ?>
                   </select>
                </div>
             </div>
             <div class="col-md-2">
                <div class="form-group">
                   <div class="input-group">
                      <div class="input-group-prepend">
                         <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <?php $date = $this->input->post('date'); ?>
                      <input name="date" id="date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" value="<?= $date; ?>" data-mask>
                   </div>
                </div>
             </div>
             <div class="col-sm-2">
                <div class="form-group">
                   <button type="submit" class="btn btn-info btn-block">Check </button>
                </div>
             </div>
          </div>
       </form>
    </div>
        
	<div class="card-body">
		<form method="post" action="<?= base_url(); ?>institute/trainee_attendance_save">
		<table class="table table-striped table-hover">
			<tr>
				<td>SL</td>
				<td>Photo</td>
				<td>Trainee Name</td>
				<td>ID</td>
				<td>Present</td>
				<td>Absent</td>
			</tr>
	         <?php $i=1; 
	            foreach ($this->Institute_model->all_trainee_attendance($year, $session, $course) as $key => $t) { ?>
			<tr>
				<td><?= $i; ?></td>
				<td><img width="40px;" src="<?= base_url() ?>upload/user/<?php echo $t->userfile; ?>"></td>
				<td><?php echo $t->name; ?></td>
				<td><?php echo $t->regi; ?></td>				
                <td> 
                    <input style="width:30px; height: 30px;"  type="checkbox" name="attendance[]" value="P">
                    <input style="width:30px; height: 30px;"  type="hidden" name="trainee_id[]" value="<?php echo $t->regi; ?>">
                    <input style="width:30px; height: 30px;"  type="hidden" name="date" value="<?php echo $date; ?>">
                </td>			
                <td>
                    <input style="width:30px; height: 30px;" type="checkbox" name="attendance[]" value="A">
                </td>
			</tr>
			<?php $i++; } ?>
			<tr>
				<td colspan="6">
					<button class="btn btn-info" type="submit">Save Now</button>
				</td>
			</tr>
		</table>
	</form>
	</div>
</div>
