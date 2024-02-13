<style type="text/css">
	.col-sm-2 {
		margin-bottom: 10px;
	}
</style>
<div class="card card-primary card-outline" style="width: 100%">
	<div class="card-header">
		Course Registration
	</div>
	<div class="card-body">
		<form method="post" action="<?= base_url() ?>institute/update_course_registration_info">
		<div class="row">
			<div class="col-sm-4">
				<label>Course</label>
				<select class="form-control" name="course_id">
					<option value=""> Select Course </option>
					<?php foreach ($this->Institute_model->allcourses() as $key => $value) {
					 if($course->course_id == $value->id) {?>
					<option <?php if($course->course_id == $value->id) {echo 'selected'; }?> value="<?php echo $value->id; ?>"> <?php echo $value->title; ?> </option>
					<?php } } ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Course Fee</label>
				<input class="form-control" type="text" name="course_fee" placeholder="Course Fee" value="<?= $course->course_fee; ?>">
				<input type="hidden" name="id" value="<?= $course->id; ?>">
			</div>
			<div class="col-sm-2">
				<label>Admission Fee</label>
				<input class="form-control" type="text" name="admission" placeholder="Admission Fee"  value="<?= $course->admission; ?>">
			</div>
			<div class="col-sm-2">
				<label>Registration Fee</label>
				<input class="form-control" type="text" name="registration" placeholder="Registration Fee"  value="<?= $course->registration; ?>">
			</div>
			<div class="col-sm-2">
				<label>Center Fee</label>
				<input class="form-control" type="text" name="center" placeholder="Center Fee"  value="<?= $course->center; ?>">
			</div>
			<div class="col-sm-2">
				<label>ID Card Fee</label>
				<input class="form-control" type="text" name="idcard" placeholder="ID Card Fee"  value="<?= $course->idcard; ?>">
			</div>
			<div class="col-sm-2">
				<label>Exam Fee</label>
				<input class="form-control" type="text" name="exam" placeholder="Exam Fee"  value="<?= $course->exam; ?>">
			</div>
			<div class="col-sm-2">
				<label>Practical Fee</label>
				<input class="form-control" type="text" name="practical" placeholder="Practical Fee"  value="<?= $course->practical; ?>">
			</div>
			<div class="col-sm-2">
				<label>Others Fee For</label>
				<input class="form-control" type="text" name="others" placeholder="Others Fee For"  value="<?= $course->others; ?>">
			</div>
			<div class="col-sm-2">
				<label>.</label><br>
				<button type="submit" class="btn btn-info">Update Now</button>
			</div>
		</div>
		</form>
	</div>
</div>