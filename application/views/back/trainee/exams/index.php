<div class="card card-info" style="width:100%;">
	<div class="card-header">
		Exams
	</div>
	<div class="card-body">
		<?php $exam_enroll = $this->Question_model->enroll_info($this->session->userdata('id')); 
			if($exam_enroll != NULL) {
		?>
		<div class="row">
			<div class="col-sm-3">				
				<div class="card card-primary card-outline">
					<div class="card-header">
						Communicative English
					</div>
					<div class="card-body">
						<a href="<?= base_url() ?>question/mcq/7"> Enroll Now</a>
					</div>
					<div class="card-footer">
						Marks Obtained : 
					</div>
				</div>
			</div>
			<?php 
			$course = $this->Question_model->enroll_info($this->session->userdata('id'));
			foreach ($this->Question_model->subjects($course->course_id) as $key => $sub) { ?>
			<div class="col-sm-3">				
				<div class="card card-primary card-outline">
					<div class="card-header">
						<?= $sub->title ?>
					</div>
					<div class="card-body">
						<?php $result = $this->Exam_model->result($sub->id);
						if($result != NULL ) { ?>
							<a href="<?= base_url() ?>question/mcq/<?= $sub->id ?>"> View Result</a>
						<?php } else { ?>
						<a href="<?= base_url() ?>question/mcq/<?= $sub->id ?>"> Enroll Now</a>
						<?php } ?>
					</div>
					<div class="card-footer">
						Result :
							<?php if(isset($result)){ 
								if($result->res_status == 'Passed') { ?>
									<b style="color:green"> Passed </b>
								<?php } else { ?>
									<b style="color:red"> Failed </b>
								<?php } } ?> 
						</b>					
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } else { ?>
			Form Fillup information not found. Please contact with Principal.
		<?php } ?>
	</div>
</div>