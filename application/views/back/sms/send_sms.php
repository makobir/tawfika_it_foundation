

<div class="card card-primary " style="width:100%;">
	<div class="card-header">
		Send SMS 
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-3" >
				Balance : <b> 
				<?php
				$homepage = file_get_contents('http://api.greenweb.com.bd/g_api.php?token=efadb35949fe4e34d9291c16f532023d&balance');
				$num = $homepage ;
				$int = (int)$num;
				$float = (float)$num;
				echo number_format ($float,2);
				?>TK = <?php echo number_format($float / 0.35); ?> SMS</b>
			</div>
			<div class="col-sm-3" >
				SMS Expired : <b> 
				<?php
				$homepage = file_get_contents('http://api.greenweb.com.bd/g_api.php?token=efadb35949fe4e34d9291c16f532023d&expiry');
				echo $homepage;
				?></b>
			</div>
			<div class="col-sm-3">
				SMS Sent : <b>
				<?php
				$homepage = file_get_contents('http://api.greenweb.com.bd/g_api.php?token=efadb35949fe4e34d9291c16f532023d&tokensms');
				echo $homepage;
				?></b>
			</div>
			<div class="col-sm-3">
				Total SMS Send :<b> 
				<?php
			$homepage = file_get_contents('http://api.greenweb.com.bd/g_api.php?token=efadb35949fe4e34d9291c16f532023d&totalsms');
				echo $homepage;
				?></b>
			</div>
		</div>		
		<!-- <iframe src="http://api.greenweb.com.bd/g_api.php?token=18677c9556a641c202072e06285856fa&expiry&rate&tokensms&totalsms"></iframe> -->
	</div>



<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Send SMS') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#a" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Single SMS</a>
         </li>         
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Edit Notice') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#b" role="tab" aria-controls="custom-content-below-home" aria-selected="true"> Session/Course SMS</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Notice') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#c" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"> Institute all Trainee</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Notice') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#d" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">SMS to Institute</a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <div class="tab-pane fade <?php if($title == 'Send SMS') { echo 'show active'; }?>" id="a" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
          <div class="card card-primary">
             
			<div class="col-sm-12">
				<form method="post" action="<?= base_url() ?>super_admin/sms">
				<div class="card card-primary">
					<div class="card-body">						
						<div class="form-group">
							<label>To</label>
							<input class="form-control" type="" name="phone" placeholder="01713576258,01911143338,.....">
						</div>
						<div class="form-group">					
							<label>Message <span style="color:red;"> Please avoid Banglish SMS</span></label>
							<textarea  class="form-control" name="message" id="give_me_the_lang"  onKeyDown="limitText(this.value);" onKeyUp="limitText(this.value);" maxlength="320"  required="required" placeholder="<?php echo $this->lang->line('sms'); ?>"><?php if(isset($message)){ echo $message->body;} ?></textarea>
						</div> 

						<textarea hidden name="lang" id="show_lang_in_here1"></textarea>
						<div id="show_lang_in_here"></div>
						<div id="show_lang_in_here"></div>
                        <script type="text/javascript">
                            document.getElementById("give_me_the_lang").addEventListener("keyup", function() {
                          if (/^[a-zA-Z-' ',!-:;'"]+$/.test(this.value)) {
                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : English";
                            document.getElementById("show_lang_in_here1").innerHTML = "English";
                            } else {
                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : বাংলা";
                            document.getElementById("show_lang_in_here1").innerHTML = "বাংলা";
                            }
                          });
                        </script>
                        
                        <div class="help-block red" style="margin-bottom: 0;"> [N.B. If you use Bengali/ Unicode Text, it will count 70 character = 1 Messages] </div>
                        <div class="help-block fn_countdown">Remaining :320</div>
						<div class="form-group">
							<button class="btn btn-info" type="submit">Send</button>
						</div>
					</div>
				</div>
				</form>
			</div>
          </div>   
         </div>         
        <div class="tab-pane fade <?php if($title == 'Edit Notice') { echo 'show active'; }?>" id="b" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
          <div class="card card-primary">	            
				<div class="col-sm-12">
					<div class="card card-primary">
						<div class="card-body">	
							<form method="post" action="<?= base_url() ;?>super_admin/send_sms">
							<div class="row">
								<div class="form-group col-sm-4">
									<select name="session" class="form-control">
										<option value="">Select Session</option>
										<?php foreach ($this->Super_admin_model->session() as $key => $value) { ?>						
										<option value="<?php echo $value->scode; ?>" <?php if($this->input->post('session') == $value->scode) {echo 'selected';} ?>><?= $value->session; ?></option>
										<?php } ?>
									</select>
								</div>	
								<div class="form-group col-sm-4">
									<select name="year" class="form-control">
										<option value="">Select Year</option>
										<option value='2021'>2021</option>
										<option value='2022'>2022</option>
									</select>
								</div>	
								<div class="form-group col-sm-4">
									<select name="course" class="form-control"  onchange="javascript:this.form.submit()">
										<option value="">Select Course</option>
										<?php foreach ($this->Super_admin_model->course() as $key => $value) { ?>						
										<option value="<?php echo $value->id; ?>" <?php if($this->input->post('course') == $value->id) {echo 'selected';} ?> ><?= $value->title; ?></option>
										<?php } ?>
									</select>
								</div>	
							</form>
							</div>									
							<div class="form-group">
							<form method="post" action="<?= base_url() ;?>super_admin/sms">
								<select  name="phone" class="form-control">
									<option>Select Recipient</option>
									<option value="<?php
									$session = $this->input->post('session');
									$course = $this->input->post('course');	
									$year = $this->input->post('year');									
									 foreach ($this->Super_admin_model->trainee_list($session,$course,$year) as $key => $value) { echo $value->mobile.',';}
									?>">All</option>
									<?php
									$session = $this->input->post('session');
									$course = $this->input->post('course');								
									$year = $this->input->post('year');								
									 foreach ($this->Super_admin_model->trainee_list($session,$course,$year) as $key => $v) { 
									?>						
									<option value="<?= $v->mobile ?>"><?= $v->name ?></option>
									<?php } ?>
								</select>
								
							</div>
							<div class="form-group">					
								<label>Message <span style="color:red;"> Please avoid Banglish SMS</span></label>
								<textarea  class="form-control" name="message" id="give_me_the_lang"  onKeyDown="limitText(this.value);" onKeyUp="limitText(this.value);" maxlength="320"  required="required" placeholder="<?php echo $this->lang->line('sms'); ?>"><?php if(isset($message)){ echo $message->body;} ?></textarea>
							</div> 

							<textarea hidden name="lang" id="show_lang_in_here1"></textarea>
							<div id="show_lang_in_here"></div>
							<div id="show_lang_in_here"></div>
	                        <script type="text/javascript">
	                            document.getElementById("give_me_the_lang").addEventListener("keyup", function() {
	                            if (/^[a-zA-Z-' ',!-:;'"]+$/.test(this.value)) {
	                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : English";
	                            document.getElementById("show_lang_in_here1").innerHTML = "English";
	                            } else {
	                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : বাংলা";
	                            document.getElementById("show_lang_in_here1").innerHTML = "বাংলা";
	                            }
	                          });
	                        </script>
	                        
	                        <div class="help-block red" style="margin-bottom: 0;"> [N.B. If you use Bengali/ Unicode Text, it will count 70 character = 1 Messages] </div>
	                        <div class="help-block fn_countdown">Remaining :320</div>
							<div class="form-group">
								<button class="btn btn-info" type="submit">Send</button>
							</div>
							</form>
						</div>
					</div>
				</div> 
          </div>   
         </div>
         
         <div class="tab-pane fade <?php if($title == 'All Notice') { echo 'show active'; }?>" id="c" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">            	
				<div class="col-sm-12">
					<div class="card card-primary">
						<div class="card-body">	
							<form method="post" action="<?= base_url() ;?>super_admin/send_sms">
							<div class="row">							
								<div class="form-group col-sm-12">
									<select name="code" class="form-control"  onchange="javascript:this.form.submit()">
										<option value="">Select Course</option>
										<?php foreach ($this->Super_admin_model->centers() as $key => $value) { ?>						
										<option value="<?php echo $value->code; ?>" <?php if($this->input->post('code') == $value->code) {echo 'selected';} ?> ><?= $value->site_name; ?></option>
										<?php } ?>
									</select>
								</div>	
							</form>
							</div>									
							<div class="form-group">
							<form method="post" action="<?= base_url() ;?>super_admin/sms">
								<select  name="phone" class="form-control">
									<option>Select Recipient</option>
									<option value="<?php
									$code = $this->input->post('code');							
									 foreach ($this->Super_admin_model->center_trainee_list($code) as $key => $value) { echo $value->mobile.',';}
									?>">All</option>
									<?php	
									 $code = $this->input->post('code');								
									 foreach ($this->Super_admin_model->center_trainee_list($code) as $key => $v) { 
									?>						
									<option value="<?= $v->mobile ?>"><?= $v->name ?></option>
									<?php } ?>
								</select>
								
							</div>
							<div class="form-group">					
								<label>Message <span style="color:red;"> Please avoid Banglish SMS</span></label>
								<textarea  class="form-control" name="message" id="give_me_the_lang"  onKeyDown="limitText(this.value);" onKeyUp="limitText(this.value);" maxlength="320"  required="required" placeholder="<?php echo $this->lang->line('sms'); ?>"><?php if(isset($message)){ echo $message->body;} ?></textarea>
							</div> 

							<textarea hidden name="lang" id="show_lang_in_here1"></textarea>
							<div id="show_lang_in_here"></div>
							<div id="show_lang_in_here"></div>
	                        <script type="text/javascript">
	                            document.getElementById("give_me_the_lang").addEventListener("keyup", function() {
	                           if (/^[a-zA-Z-' ',!-:;'"]+$/.test(this.value)) {
	                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : English";
	                            document.getElementById("show_lang_in_here1").innerHTML = "English";
	                            } else {
	                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : বাংলা";
	                            document.getElementById("show_lang_in_here1").innerHTML = "বাংলা";
	                            }
	                          });
	                        </script>
	                        
	                        <div class="help-block red" style="margin-bottom: 0;"> [N.B. If you use Bengali/ Unicode Text, it will count 70 character = 1 Messages] </div>
	                        <div class="help-block fn_countdown">Remaining :320</div>
							<div class="form-group">
								<button class="btn btn-info" type="submit">Send</button>
							</div>
							</form>
						</div>
					</div>
				</div>
            </div>
          </div>

         <div class="tab-pane fade <?php if($title == 'All Notice') { echo 'show active'; }?>" id="d" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">            	
				<div class="col-sm-12">
					<div class="card card-primary">
						<div class="card-body">									
							<div class="form-group">
							<form method="post" action="<?= base_url() ;?>super_admin/sms">
								<select  name="phone" class="form-control">
									<option>Select Recipient</option>
									<option value="<?php
									$code = $this->input->post('code');							
									 foreach ($this->Super_admin_model->centers() as $key => $value) { echo $value->mobile.',';}
									?>">All</option>
									<?php							
									 foreach ($this->Super_admin_model->centers() as $key => $v) { 
									?>						
									<option value="<?= $v->mobile ?>"><?= $v->site_name ?></option>
									<?php } ?>
								</select>
								
							</div>
						
							<div class="form-group">					
								<label>Message <span style="color:red;"> Please avoid Banglish SMS</span></label>
								<textarea  class="form-control" name="message" id="give_me_the_lang"  onKeyDown="limitText(this.value);" onKeyUp="limitText(this.value);" maxlength="320"  required="required" placeholder="<?php echo $this->lang->line('sms'); ?>"><?php if(isset($message)){ echo $message->body;} ?></textarea>
							</div> 

							<textarea hidden name="lang" id="show_lang_in_here1"></textarea>
							<div id="show_lang_in_here"></div>
							<div id="show_lang_in_here"></div>
	                        <script type="text/javascript">
	                            document.getElementById("give_me_the_lang").addEventListener("keyup", function() {
	                           if (/^[a-zA-Z-' ',!-:;'"]+$/.test(this.value)) {
	                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : English";
	                            document.getElementById("show_lang_in_here1").innerHTML = "English";
	                            } else {
	                            document.getElementById("show_lang_in_here").innerHTML = "Detected language : বাংলা";
	                            document.getElementById("show_lang_in_here1").innerHTML = "বাংলা";
	                            }
	                          });
	                        </script>
	                        
	                        <div class="help-block red" style="margin-bottom: 0;"> [N.B. If you use Bengali/ Unicode Text, it will count 70 character = 1 Messages] </div>
	                        <div class="help-block fn_countdown">Remaining :320</div>
							<div class="form-group">
								<button class="btn btn-info" type="submit">Send</button>
							</div>
							</form>
						</div>
					</div>
				</div>
            </div>
          </div>
          
    </div>
</div>





<script type="text/javascript">
	     function limitText(text) {       
       $('.fn_countdown').text('Remaining :'+(320 - text.length));        
     }
     
</script>