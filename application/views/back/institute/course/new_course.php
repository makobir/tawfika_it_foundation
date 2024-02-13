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
		<form method="post" action="<?= base_url() ?>institute/course_registration_info">
		<div class="row">
			<div class="col-sm-4">
				<label>Select Course</label>
				<select class="form-control" name="course_id">
					<option value=""> Select Course </option>
					<?php foreach ($this->Institute_model->allcourses() as $key => $value) { 
						$enrolled_course = $this->Institute_model->enrolled_course($value->id);
						if($value->id != $enrolled_course->course_id) {
					?>
					<option value="<?php echo $value->id; ?>"> <?php echo $value->title; ?> </option>
					<?php } } ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Course Fee</label>
				<input class="form-control" type="text" name="course_fee" placeholder="Course Fee" required>
			</div>
			<div class="col-sm-2">
				<label>Admission Fee</label>
				<input class="form-control" type="text" name="admission" placeholder="Admission Fee" required>
			</div>
			<div class="col-sm-2">
				<label>Registration Fee</label>
				<input class="form-control" type="text" name="registration" placeholder="Registration Fee" required>
			</div>
			<div class="col-sm-2">
				<label>Center Fee</label>
				<input class="form-control" type="text" name="center" placeholder="Center Fee" required>
			</div>
			<div class="col-sm-2">
				<label>ID Card Fee</label>
				<input class="form-control" type="text" name="idcard" placeholder="ID Card Fee" required>
			</div>
			<div class="col-sm-2">
				<label>Exam Fee</label>
				<input class="form-control" type="text" name="exam" placeholder="Exam Fee" required>
			</div>
			<div class="col-sm-2">
				<label>Practical Fee</label>
				<input class="form-control" type="text" name="practical" placeholder="Practical Fee" required>
			</div>
			<div class="col-sm-2">
				<label>Others Fee For</label>
				<input class="form-control" type="text" name="others" placeholder="Others Fee For" required>
			</div>
			<div class="col-sm-2">
				<label>.</label><br>
				<button type="submit" class="btn btn-info">Apply</button>
			</div>
		</div>
		</form>
	</div>
</div>