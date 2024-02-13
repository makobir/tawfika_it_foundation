<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institute extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Institute_model', '', TRUE);
        $this->load->model('Exam_model', '', TRUE);
        $this->load->model('Wallet_model', '', TRUE);
        $this->load->model('Accounts_model', '', TRUE);
        $this->load->model('Super_admin_model', '', TRUE);
        $this->load->library('bdbulk');
        $admin_id = $this->session->userdata('id');
        if ($admin_id == NULL) {
            redirect('authenticator', 'refresh');
        }
        elseif ($this->session->userdata('usertype') == 'super_admin') {
            redirect('super_admin', 'refresh');
        }
        elseif ($this->session->userdata('usertype') == 'trainee') {
            redirect('trainee', 'refresh');
        }
        $site = $this->Authenticator_model->site();
       	$sdata['icode'] = $site->code;
       $this->session->set_userdata($sdata);
        $this->data = array(
            'site_name' => $site->site_name,
            'language' => $site->lang
        );
            //  $this->lang->load('language',$this->data['language']);


		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		
		//echo date('y');
		//$x=11;
		//$value = str_pad($x,2,"0",STR_PAD_LEFT);
		//echo $value;
		//echo $this->session->userdata('icode').'<br>';
		//echo $this->session->userdata('id');
		//echo '<pre>'; print_r($this->session->all_userdata());exit;

		// $dateOfBirth = '25-12-2007';
		// $today = date('Y-m-d');
		// $diff = date_diff(date_create($dateOfBirth), date_create($today));
		// echo 'Age is '.$diff->format('%y');
		$this->payment_notification();

    }


	public function index()
	{
		$data = array();
		$data['menu'] = "";
		$data['title'] = "Home";
		$data['private'] = $this->load->view('back/institute/pages/home',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function payment_notification() {
		$numbers = $this->Institute_model->check_payment_notification();
		if (isset($numbers)) {
		$bal = $this->Institute_model->sms_balance();
		if($bal->total > 1 ) {
			foreach ($numbers as $key => $value) {
				$trainee = $this->Super_admin_model->trainee($value->trainee_id);
				if (isset($trainee)) {
				$paid = $this->Institute_model->paid($value->trainee_id);
				
				$due = ($trainee->course_fee+$trainee->admission+$trainee->registration+$trainee->center+$trainee->exam+$trainee->idcard+$trainee->practical+$trainee->others) - $paid->amount;
				$phone = $trainee->mobile;
	        	$message = 'Reminder:
Dear '.$trainee->name.',
Your total due is : '.$due.'TK & committed date for payment is : '.$value->date.'.
Thanks.
'.$this->data['site_name'] ; 
        	//echo $message;  
	        	$this->bdbulk->sendSMS($phone,$message);  

	        	$data['code'] = $this->session->userdata('icode');
	        	$data['message'] = $message;
	        	$data['numbers'] = $phone;
		    	$data['total'] = 1;
		   	 	$data['total_sms'] = 1;
	        	$this->db->insert('sms',$data);

	        	$id = $value->id;
	        	$dat['send'] = 'Ok';         	
	        	$dat['msent'] = date('d-m-Y h:m:sA'); 
	        	$this->db->where('id',$id);
	        	$this->db->update('next_payment_date',$dat);        	
			}
		}
		}
		}
	}








	public function admission()
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "Admission";
		$data['private'] = $this->load->view('back/institute/trainee_management/trainee',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function trainee_attendance()
	{
		$data = array();
		$data['menu'] = "Attendance";
		$data['title'] = "Trainee Attendance";
		$data['private'] = $this->load->view('back/institute/attendance/index',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function trainee_attendance_save()
	{
		if($this->input->post('trainee_id[]') != NULL) {
				$data = array();
				$code = $this->session->userdata('icode');
				$date = $this->input->post('date');
				$day = date("d", strtotime($date));   
				$month = date("m", strtotime($date));   
				$year = date("Y", strtotime($date));   
				$trainee_id = $this->input->post('trainee_id[]');
				$attendance = $this->input->post('attendance[]');
		        $value = array();
		        for($i = 0; $i < count($trainee_id); $i++) { 		        	
		            $value[$i] = array (		               
		                'month'		=>$month,
		                'year'		=>$year,
		                'code'		=>$code,
		                'trainee_id'=>$trainee_id[$i],
		                'day_'.$day	=>$attendance[$i]
		            );            			     	
	        	}
	        	
	        	//============== Check month =========================
	        	$month = $this->Institute_model->month_check($month);
	        	if($month != NULL) {
					if ($this->db->update_batch('trainee_attendances',$value,'trainee_id') == TRUE)
					{
						redirect('institute/trainee_attendance');
						//echo $this->db->affected_rows();
					   	//echo ' Updated' ; // generate an error... or use the log_message() function to log your error
					} else {

						$this->db->insert_batch('trainee_attendances',$value);
						//echo 'ddd' .$this->db->affected_rows();
						redirect('institute/trainee_attendance');
					}
				} else {
					$this->db->insert_batch('trainee_attendances',$value);					
					redirect('institute/trainee_attendance');
				}

	        	//$result = $this->Institute_model->trainee_attendance_save($value);
	        	//echo $result;
	        	// if($result == false) {
	        	// 	$this->db->insert_batch('trainee_attendances',$value);
	        	// } 
	
				//redirect('institute/trainee_attendance');
	    }
		
	
	}

	public function all()
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "All Trainee";
		$data['private'] = $this->load->view('back/institute/trainee_management/all_trainee',$data,true);	
		$this->load->view('back/institute/index',$data);
	}	


	public function idcard()
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "ID Card";
        $data['site'] = $this->Authenticator_model->site();
		$data['private'] = $this->load->view('back/institute/trainee_management/id_filter',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function print_idcard()
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "ID Card";
        $data['site'] = $this->Authenticator_model->site();
		$data['private'] = $this->load->view('back/institute/trainee_management/idcard',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function id($id)
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = $id." : ID Card";
        $data['site'] = $this->Authenticator_model->site();
		$data['t'] = $this->Institute_model->single_trainee($id);
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['private'] = $this->load->view('back/institute/trainee_management/id',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function edit($id)
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "Edit Trainee";
		$data['trainee'] = $this->Institute_model->edit_trainee($id);
		$data['private'] = $this->load->view('back/institute/trainee_management/trainee',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function delete_trainee($id) { 
		$this->db->like('regi',$id);
		$this->db->delete('trainee');
		$this->delete_enroll($id);
	}

	public function delete_enroll($id) { 
		$this->db->like('trainee_id',$id);
		$this->db->delete('course_enroll');
		$this->delete_user($id);
	}

	public function delete_user($id) { 
		$this->db->like('trainee_id',$id);
		$this->db->delete('users');
		redirect('institute/all');
	}


	public function active_student($id) { 
		$data['status'] = 'Active'; 
		$this->db->where('regi',$id);
		$this->db->update('trainee',$data);
		redirect('institute/trainee/'.$id);
	}
	public function deactive_student($id) { 
		$data['status'] = 'Deactive'; 
		$this->db->where('regi',$id);
		$this->db->update('trainee',$data);
		redirect('institute/trainee/'.$id);
	}

	public function formfillup()
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Form Fillup";
		$data['private'] = $this->load->view('back/institute/form_fillup/formfillup',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function formfillupnow()
	{
		if($this->input->post('trainee_id[]') != NULL) {
				$data = array();					
				$course_id = $this->input->post('course_id',TRUE);
            	$fee = $this->Institute_model->course($course_id);
				$fee = $fee->fee;
				$code = $this->session->userdata('icode');
				$trainee_id = $this->input->post('trainee_id[]');
				$course_id = $this->input->post('course_id',TRUE);
				$batch_id = $this->input->post('batch_id',TRUE);
				$sid = $this->input->post('session_id',TRUE);
				$year = $this->input->post('year',TRUE);
				$session = $this->Institute_model->sessions($sid);

				for($i = 0; $i < count($trainee_id); $i++) { }; 
        		$data['code'] = $this->session->userdata('icode');       			     
		        $data['for'] = 'Form Fillup';
		        if($code == '33001' || $code == '33002' || $code == '33003' || $code == '89001') {
 					$data['amount'] = 100*$i;
		        } elseif($code == '33004') {
 					$data['amount'] = 0;
		        }
		        else {
		        	 $data['amount'] = $fee*$i;
		        }
		        $data['examinee'] = $i;
		       	$payment_id = $this->Institute_model->feeadd($data); 

		       	//========= generate Roll ==========================================
		       	$lroll = $this->Institute_model->last_roll($sid,$year);
		       	if ($lroll == NULL) {		       	
		       		$roll = $session->scode.'0000';
		       	}else {
		       		foreach ($lroll as $key => $last_roll ) {	};
		       		$roll = $last_roll->roll;
		       	}

		        $value = array();
		        for($i = 0; $i < count($trainee_id); $i++) { 
		        	$roll = $roll+1;
		            $value[$i] = array (
		                'session_id'=>$sid,
		                'roll'		=>$roll,
		                'year'		=>$year,
		                'payment_id'=>$payment_id,
		                'code' 		=>$code,
		                'course_id' =>$course_id,		               
		                'date' 		=>date('d-m-Y'),		               
		                'trainee_id'=>$trainee_id[$i],
		                'fee' 		=>$fee
		            );            			     	
	        	} $roll++;
	        	$this->Institute_model->formfillupnow($value);	

		        $ddata = array();
		        for($i = 0; $i < count($trainee_id); $i++) { 
		        	$roll = $roll;
		            $ddata[$i] = array (
		                'trainee_id'=>$trainee_id[$i]
		            );            			     	
	        	} 
	        	$roll++;
	        	$this->Institute_model->exammarks($ddata);	

	    } else {
	    	$sdata['message'] = 'Please select all field';
	    	$this->session->set_userdata($sdata);	
	    }		
		redirect('wallet/paynow/'.$payment_id);
	
	}

	public function examinee()
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Examinee";
		$data['private'] = $this->load->view('back/institute/form_fillup/examinee',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	
	public function trainee($id)
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "Trainee Details";
		$data['payment'] = $this->Institute_model->payment($id);
		$data['course'] = $this->Institute_model->courseinfo($id);
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['exam'] = $this->Exam_model->admitinfo($id);
		$data['private'] = $this->load->view('back/institute/trainee_management/details',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	


	public function admit($id)
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "Admit";
		$data['admit'] = $this->Exam_model->admitinfo($id);
		$data['course'] = $this->Institute_model->courseinfo($id);
		$data['private'] = $this->load->view('back/institute/form_fillup/admit',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	


	public function registration($id)
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = $id." : Registration Card";
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['private'] = $this->load->view('back/institute/form_fillup/registration',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	

	public function certificate($id)
	{
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "Print Certificate";
		$data['payment'] = $this->Institute_model->payment($id);
		$data['course'] = $this->Institute_model->courseinfo($id);
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['exam'] = $this->Exam_model->admitinfo($id);
		$data['check'] = $this->Certificates_model->check_certificate($id); 
		$data['private'] = $this->load->view('back/certificate/index',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	


	public function system_settings()
	{
		$data = array();
		$data['menu'] = "Settings";
		$data['title'] = "Site Settings";
		$data['private'] = $this->load->view('back/institute/pages/site_settings',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	



    function update_basic(){
        $data= array();
        $id = $this->input->post('id');
        $data['site_name'] = $this->input->post('site_name');
        $data['tagline'] = $this->input->post('tagline');
        $this->Super_admin_model->save_settings($id,$data);
        $sdata = array();
        $sdata['message'] = "You are Successfully Updated";
        $this->session->set_userdata($sdata);
        redirect('institute/system_settings');
        
    }

    function updated_contact_info(){
        $data= array();
        $id = $this->input->post('id');
        $data['address'] = $this->input->post('address');
        $data['email'] = $this->input->post('email');
        $data['mobile'] = $this->input->post('mobile');
        $this->Super_admin_model->save_settings($id,$data);
        $sdata = array();
        $sdata['message'] = "You are Successfully Updated";
        $this->session->set_userdata($sdata);

        redirect('institute/system_settings');
        
    }


    function update_password(){
        $data= array();
        $id = $this->session->userdata('id');
        $a = $this->Institute_model->password($id);
        $old = $a->password;
        $oldinput = $this->input->post('old');
        $new = $this->input->post('password');
      
        if($oldinput == $old) {
	        if ($old != $new) {                    
	            $id = $this->session->userdata('id');
	            $data['password'] = $new;
	            $this->Super_admin_model->change_password($id,$data);
	            $sdata = array();
	            $sdata['message'] = "Password Successfully Updated";
	            $this->session->set_userdata($sdata);
	            redirect('institute/system_settings');
	            
	        }
	        else {

	            $sdata = array();
	           $sdata['exception'] = '<p style="color: red;" > Password already used </p>';
	            $this->session->set_userdata($sdata);
	            redirect('institute/system_settings'); 
	            
	        }  
	     } else {
	     		$sdata = array();
	            $sdata['exception'] = '<p style="color: red;" > Old Password doesnot matched!</p>';
	            $this->session->set_userdata($sdata);
	            redirect('institute/system_settings'); 
	     } 
    }
 	

 	function update_logo(){
        $data= array();
        $id = $this->input->post('id');
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/logo',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp',
            'encrypt_name' => TRUE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['userfile'] =$fileUpload['file_name'];
            $this->Super_admin_model->save_settings($id,$data);
            $this->Super_admin_model->change_logo($data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['logo'] = $fileUpload['file_name'];
            $sdata['message'] = 'Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('institute/system_settings');
        }
        else {
            echo 'Invalid Image';
        }
	}

    function update_user_basic(){
        $data= array();
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['mobile'] = $this->input->post('mobile');
        $data['email'] = $this->input->post('email');
        $this->Super_admin_model->update_user_basic($id,$data);
        $sdata = array();
        $sdata['message'] = "Successfully Updated";
        $this->session->set_userdata($sdata);
        redirect('institute/profile');
        
    }
 	function update_user_photo(){
        $data= array();
        $id = $this->input->post('id');
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/user',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp',
            'encrypt_name' => TRUE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['userfile'] =$fileUpload['file_name'];
            $this->Super_admin_model->change_user_photo($data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['userfile'] = $fileUpload['file_name'];
            $sdata['message'] = 'Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('institute/profile');
        }
        else {
            echo 'Invalid Image';
        }
	}

 	function update_signature(){
        $data= array();
        $id = $this->input->post('id');
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/signature',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp',
            'encrypt_name' => TRUE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['signature'] =$fileUpload['file_name'];
            $this->Super_admin_model->save_settings($id,$data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['userfile'] = $fileUpload['file_name'];
            $sdata['message'] = 'Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('institute/system_settings');
        }
        else {
            echo 'Invalid Image';
        }
	}


//====================== Result <>=============================================================

	public function marks_entry()
	{
		$data = array();
		$data['menu'] = "Results";
		$data['title'] = "Marks Entry";
		$data['private'] = $this->load->view('back/institute/pages/marks_entry',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function result()
	{
		$data = array();
		$data['menu'] = "Results";
		$data['title'] = "Results";
		$data['private'] = $this->load->view('back/institute/pages/result',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
		
	public function marksentry()
	{
		$id = $this->input->post('trainee_id');
		if($this->input->post('course_id') == 1 || $this->input->post('course_id') == 2 || $this->input->post('course_id') == 3 ) {
			if($this->input->post('attendance') <= 20 ){ 
				$m['attendance'] = $this->input->post('attendance');
			}else {
				$sdata['message'] = 'Attendance Marks should not larger than 20';
			}if($this->input->post('typing') <= 20 ){ 
				$m['typing'] = $this->input->post('typing');
			}else {
				$sdata['message'] = 'Typing Test Marks should not larger than 20';
			}	if($this->input->post('viva') <= 20 ){ 
				$m['viva'] = $this->input->post('viva');
			}else {
				$sdata['message'] = 'Viva Marks should not larger than 20';
			}if($this->input->post('practical') <= 80 ){ 
				$m['practical'] = $this->input->post('practical');
			}else {
				$sdata['message'] = 'Practical Marks should not larger than 80';
			}

			if($this->input->post('attendance') <= 20 && $this->input->post('typing') <= 20 && $this->input->post('viva') <= 20 && $this->input->post('practical') <= 80   ) {
				
				$this->db->where('trainee_id',$id);
				$this->db->update('exam_marks',$m);
				$sdata['message'] = 'Marks Updated!';
				$this->session->set_userdata($sdata);
				redirect('institute/result');
			}else {
				$this->session->set_userdata($sdata);
				redirect('institute/marks_entry');
			}
		
		} 
		//====================== To others courses ============================
		else {
			if($this->input->post('attendance') <= 20 ){ 
				$m['attendance'] = $this->input->post('attendance') ;
			}else {
				$sdata['message'] = 'Attendance Marks should not larger than 20';
			}if($this->input->post('viva') <= 20 ){ 
				$m['viva'] = $this->input->post('viva');
			}else {
				$sdata['message'] = 'Viva Marks should not larger than 20';
			}if($this->input->post('practical') <= 100 ){ 
				$m['practical'] = $this->input->post('practical');
			}else {
				$sdata['message'] = 'Practical Marks should not larger than 100';
			}

			if($this->input->post('attendance') <= 20 || $this->input->post('viva') <= 20 || $this->input->post('practical') <= 100   ) {
				
				$this->db->where('trainee_id',$id);
				$this->db->update('exam_marks',$m);
				$sdata['message'] = 'Marks Updated!';
				$this->session->set_userdata($sdata);
				redirect('institute/result');
			}else {
				$this->session->set_userdata($sdata);
				redirect('institute/marks_entry');
			}
		}
	

	// 	$data = array();
			// 	$trainee_id = $this->input->post('trainee_id[]');
			// 	$attendance = $this->input->post('attendance[]');
			// 	$typing = $this->input->post('typing[]');
			// 	$viva = $this->input->post('viva[]');
			// 	$practical = $this->input->post('practical[]');		

		 //        $value = array();
		 //        for($i = 0; $i < count($trainee_id); $i++) { 
		 //            $value = array (
		 //                'trainee_id'=>$trainee_id[$i],
		 //                'attendance'=>$attendance[$i],
		 //                'typing'=>$typing[$i],
		 //                'viva'=>$viva[$i],
		 //                'practical'=>$practical[$i]
		 //            );        			     
	  //       	$this->Institute_model->marksentry($value);
	  //       }
		
			// redirect('institute/result');

				// $data = array();
				// $trainee_id = $this->input->post('trainee_id');
				// $data['attendance'] = $this->input->post('attendance');
				// $data['typing'] = $this->input->post('typing');
				// $data['viva'] = $this->input->post('viva[]');
				// $data['practical'] = $this->input->post('practical');		      			     
	   //      	$this->Institute_model->marksentry($trainee_id, $data);
	        
		//
		//	redirect('institute/result');
	}

	public function marksheet($id)
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Marksheet";
		$data['subject_result'] = $this->Exam_model->subjects_result($id);
		$data['trainee'] = $this->Exam_model->trainee_information($id);
		$data['private'] = $this->load->view('back/institute/pages/marksheet',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

//====================== Result </> =============================================================

//====================== Course Registration <> =============================================================

	function add_course_fee($tid) {
		$data = array();
		$id = $this->input->post('id');      			     
		$data['course_fee'] = $this->input->post('course_fee');	      			     
		$data['registration'] = $this->input->post('registration');	      			     
		$data['admission'] = $this->input->post('admission');	      			     
		$data['exam'] = $this->input->post('exam');	      			     
		$data['practical'] = $this->input->post('practical');	      			     
		$data['center'] = $this->input->post('center');	      			     
		$data['idcard'] = $this->input->post('idcard');	      			     
		$data['others'] = $this->input->post('others');	      			     
    	$this->Institute_model->add_course_fee($id, $data);
	        
		
		redirect('admission/payment/'.$tid);
	}

	function course_fee_payment() {
		$data = array();
		$data['code'] = $this->session->userdata('icode');	
		$data['trainee_id']  = $this->input->post('trainee_id');
		$data['amount'] = $this->input->post('course_fee');	       			     
    	$this->Institute_model->course_fee_payment($data);   
		
		redirect('admission/payment/'.$data['trainee_id']);
	}

	public function course_registration()
	{
		$data = array();
		$data['menu'] = "Course";
		$data['title'] = "Course Registration";
		$data['private'] = $this->load->view('back/institute/course/new_course',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	function course_registration_info() {
    	//================ Payment for course registrtion ===============================
        $data['code'] = $this->session->userdata('icode');       			     
        $data['for'] = 'Course Registration';
        $data['amount'] = 3000;
       	$payment_id = $this->Institute_model->feeadd($data); 

		$regi = array();
		$regi['course_id']  = $this->input->post('course_id');
		$regi['course_fee']  = $this->input->post('course_fee');
		$regi['admission']  = $this->input->post('admission');
		$regi['exam']  = $this->input->post('exam');
		$regi['idcard']  = $this->input->post('idcard');
		$regi['registration']  = $this->input->post('registration');
		$regi['center']  = $this->input->post('center');
		$regi['practical']  = $this->input->post('practical');
		$regi['others']  = $this->input->post('others');
		$regi['fee']  = 350;
		$regi['code'] = $this->session->userdata('icode');	       			     
		$regi['payment_id'] = $payment_id;	       			     
    	$this->Institute_model->course_registration_info($regi);


		redirect('wallet/paynow/'.$payment_id);
	}

	public function my_courses()
	{
		$data = array();
		$data['menu'] = "Course";
		$data['title'] = "My Courses";
		$data['private'] = $this->load->view('back/institute/course/my_courses',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function course_edit($id)
	{
		$data = array();
		$data['menu'] = "Course";
		$data['title'] = "My Courses";
		$data['course'] = $this->Institute_model->cinfo($id);
		$data['private'] = $this->load->view('back/institute/course/course_edit',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	function update_course_registration_info() {
    	//================ Payment for course registrtion ===============================
     	$regi = array();
		$id  = $this->input->post('id');
		$regi['course_id']  = $this->input->post('course_id');
		$regi['course_fee']  = $this->input->post('course_fee');
		$regi['admission']  = $this->input->post('admission');
		$regi['exam']  = $this->input->post('exam');
		$regi['idcard']  = $this->input->post('idcard');
		$regi['registration']  = $this->input->post('registration');
		$regi['center']  = $this->input->post('center');
		$regi['practical']  = $this->input->post('practical');
		$regi['others']  = $this->input->post('others');	       			        			     
    	$this->Institute_model->update_course_registration_info($id,$regi);

		redirect('institute/my_courses');
	}
//====================== Course Registration </> =============================================================


//====================== Notice Management <> =============================================================



	public function new_notice()
	{
		$data = array();
		$data['menu'] = "Announcement";
		$data['title'] = "New Notice";
		$data['private'] = $this->load->view('back/institute/announcement/notice',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function publish_notice() {
		$data = array();
		$data['code']  = $this->session->userdata('icode');
		$data['title']  = $this->input->post('title');
		$data['short'] = $this->input->post('short');	       			     
		$data['details'] = $this->input->post('details');

        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/notice',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp|pdf',
            'encrypt_name' => FALSE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {
            $type = $this->upload->data('file_ext');
            if($type == '.jpg' || $type == '.png') {
              $data['userfile'] = $fileUpload['file_name'];  
          }if($type == '.pdf') {
              $data['pdf'] = $fileUpload['file_name']; 
          }
            
        }
        	       			     
		$this->Institute_model->publish_notice($data);   
		
		redirect('institute/all_notice');
	}


	public function all_notice()
	{
		$data = array();
		$data['menu'] = "Announcement";
		$data['title'] = "All Notice";
		$data['private'] = $this->load->view('back/institute/announcement/notice',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function edit_notice($id)
	{
		$data = array();
		$data['menu'] = "Announcement";
		$data['title'] = "Edit Notice";
		$data['notice'] = $this->Institute_model->notice_details($id);
		$data['private'] = $this->load->view('back/institute/announcement/notice',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function update_notice() {
		$data = array();
		$id  = $this->input->post('id');
		$data['title']  = $this->input->post('title');
		$data['short'] = $this->input->post('short');	       			     
		$data['details'] = $this->input->post('details');

        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/notice',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp|pdf',
            'encrypt_name' => FALSE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {
            $type = $this->upload->data('file_ext');
            if($type == '.jpg' || $type == '.png') {
              $data['userfile'] = $fileUpload['file_name'];  
          }if($type == '.pdf') {
              $data['pdf'] = $fileUpload['file_name']; 
          }
            
        }
        	       			     
		$this->Institute_model->update_notice($id,$data);   
		
		redirect('institute/all_notice');
	}





	public function new_circular()
	{
		$data = array();
		$data['menu'] = "Announcement";
		$data['title'] = "Admission Circular";
		$data['private'] = $this->load->view('back/institute/announcement/admission_circular',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function admission_circular() {
		$data = array();
		$data['code']  = $this->session->userdata('icode');
		$data['title']  = $this->input->post('title');
		$data['short'] = $this->input->post('short');	       			     
		$data['details'] = $this->input->post('details');	       			     
		$this->Institute_model->admission_circular($data);   
		
		redirect('institute/all_circular');
	}


	public function all_circular()
	{
		$data = array();
		$data['menu'] = "Announcement";
		$data['title'] = "All Circular";
		$data['private'] = $this->load->view('back/institute/announcement/admission_circular',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function new_event()
	{
		$data = array();
		$data['menu'] = "Announcement";
		$data['title'] = "New Event";
		$data['private'] = $this->load->view('back/institute/announcement/event',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function publish_event() {
		$data = array();
		$data['code']  = $this->session->userdata('icode');
		$data['title']  = $this->input->post('title');
		$data['date']  = $this->input->post('date');
		$data['time']  = $this->input->post('time');
		$data['short'] = $this->input->post('short');	       			     
		$data['details'] = $this->input->post('details');	       			     
		$this->Institute_model->publish_event($data);   
		
		redirect('institute/new_event');
	}


	public function all_event()
	{
		$data = array();
		$data['menu'] = "Announcement";
		$data['title'] = "Publish Event";
		$data['private'] = $this->load->view('back/institute/announcement/admission_circular',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

//====================== Notice Management </> =============================================================



//====================== BTEB Student Management <> =============================================================



	public function bteb_student_add()
	{
		$data = array();
		$data['menu'] = "BTEB";
		$data['title'] = "Student Add";
		$data['private'] = $this->load->view('back/institute/bteb/bteb_student_add',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function btebdetails()
	{
		$id = $this->input->post('regi');		
		$this->btebdetailsinfo($id);

	}

	public function btebdetailsinfo($id)
	{
		$data = array();
		$data['menu'] = "BTEB";
		$data['title'] = "Student Details";		
		$data['info'] = $this->Exam_model->regiinfo($id);
		$data['private'] = $this->load->view('back/institute/bteb/bteb_student_add',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function deliveryinfo($id)
	{
		$data = array();
		$data['menu'] = "BTEB";
		$data['title'] = "Student Details";		
		$data['info'] = $this->Exam_model->regiinfo($id);
		$data['bteb'] = $this->Institute_model->result_check($id);
		$data['private'] = $this->load->view('back/institute/bteb/delivery_info',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function save_bteb_info() {
		$data = array();
		$data['code']  = $this->session->userdata('icode');
		$data['trainee_id']  = $this->input->post('trainee_id');
		$data['course_id']  = $this->input->post('course_id');
		$data['session_id']  = $this->input->post('session_id');
		$data['registration']  = $this->input->post('registration');
		$data['result']  = $this->input->post('result');
		$data['year'] = $this->input->post('year');	      	       			     
		$data['date'] = date('d-m-Y');	      	       			     
		$this->db->insert('bteb_students',$data);
		redirect('institute/bteb_student_add');
	}

	public function save_delivery() {
		$data = array();
		$trainee_id  = $this->input->post('trainee_id');
		$data['deliver_date']  = $this->input->post('deliver_date');
		$data['by']  = $this->input->post('by');
		$data['cert_deliver']  = 'Delivered';	     
		$this->db->where('trainee_id',$trainee_id);
		$this->db->update('bteb_students',$data);
		redirect('institute/bteb_students');
	}


	public function bteb_students()
	{
		$data = array();
		$data['menu'] = "BTEB";
		$data['title'] = "BTEB Students";
		$data['private'] = $this->load->view('back/institute/bteb/bteb_students',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	public function delete_bteb_trainee($id) { 
		$this->db->like('trainee_id',$id);
		$this->db->delete('bteb_students');
		redirect('institute/bteb_students');
	}
//====================== BTEB Student Management </> =============================================================





// ====================== Credit / Debit =================================================================

	public function credit()
	{
		$data = array();
		$data['menu'] = "Accounts";
		$data['title'] = "Credit";
		$data['private'] = $this->load->view('back/accounts/ins_credit',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function addactnx()
	{
		$data = array();
		if($this->input->post('type') == 'credit') {
			$data['credit'] = $this->input->post('amount');
		}if ($this->input->post('type')== 'debit') {
			$data['debit'] = $this->input->post('amount');// code...
		}
		$data['code'] = $this->session->userdata('icode');
		$data['remarks'] = $this->input->post('remarks');
		$data['for'] = $this->input->post('for');
		$data['title'] = $this->input->post('title');
		$data['date'] = date('d-m-Y');
	    $this->Super_admin_model->addactnx($data);



	    if($this->input->post('type') == 'credit') {
			redirect('institute/credit');
		}if ($this->input->post('type')== 'debit') {
			redirect('institute/disbursment');
		}
		
	
	}
	public function disbursment()
	{

		$data = array();
		$data['menu'] = "Accounts";
		$data['title'] = "Disbursment";
		$data['private'] = $this->load->view('back/accounts/disbursment',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

//====================== SMS Management <> =============================================================
    public function sms_purchase()
    {       
        $data = array();
        $data['menu'] = "SMS";
        $data['title'] = "SMS Purchase";
        $data['private'] = $this->load->view('back/institute/sms/sms_purchase',$data,true);   
        $this->load->view('back/institute/index',$data);
    }


    
public function sms_purchase_now()
    {
    	$data = array();
        $sms = $this->input->post('sms_amount');
	    $balance = $this->Institute_model->sms_balance();
	    $data['total'] = $sms + $balance->total;	         
	    $payments = $this->Wallet_model->payments(); 
        $paymentsa = $this->Wallet_model->paymentsa(); 
        $balance = $this->Wallet_model->balance(); 
        $price = $sms * 0.35;
       	if($balance->amount-($payments->amount+$paymentsa->amount) > $price) {
       		$this->db->where('code',$this->session->userdata('icode'));
       		$this->db->update('sms_balance',$data);
       		$d['code'] = $this->session->userdata('icode');
       		$d['amount'] = $this->input->post('sms_amount');
       		$d['balance'] =  $price;
       		$this->db->insert('sms_purchase',$d);
        	$sdata['message'] = "SMS Purchase Complete";
       		$this->session->set_userdata($sdata);

       	}else{
        	$sdata['exception'] = "insufficient Balance";
       		$this->session->set_userdata($sdata);
       	}     
        redirect('institute/sms_purchase');
	    
	}


    public function send_sms()
    {       
        $data = array();
        $data['menu'] = "SMS";
        $data['title'] = "Send SMS";
        $data['private'] = $this->load->view('back/institute/sms/sms',$data,true);   
        $this->load->view('back/institute/index',$data);
    }

    public function sms()
    {
        $phone = $this->input->post('phone');
        $message = $this->input->post('message');   
        $this->bdbulk->sendSMS($phone,$message);
        $sdata['message'] = "Messege has been Sent!";
        $this->session->set_userdata($sdata);

        $data['code'] = $this->session->userdata('icode');
        $data['message'] = $message;
        $data['numbers'] = $phone;
	    $total = strlen($phone)/12;
	    if(is_float($total) == 1) {
			$data['total'] = round($total) + 1;	
	    }else {
	        $data['total'] = round($total);	
	    }	

	    $me = strlen($message);
        if($this->input->post('lang') == 'English'){
	        $me = mb_strlen($message, 'UTF8');
	        if($me <= 160) {
	        	$to = 1;
	        }if($me <= 320) {
	        	$to = 2;
	        }if($me <= 480) {
	        	$to = 3;	        
	        }if($me <= 640 ) {
	        	$to = 4;
	        } 
	        $data['total_sms'] = $data['total']*$to;	
     	} else {
			$me = mb_strlen($message, 'UTF8');
	        if($me >= 1) {
	        	$to = 1;
	        }if($me >= 71) {
	        	$to = 2;
	        }if($me >= 141) {
	        	$to = 3;
	        }if($me >= 211) {
	        	$to = 4;
	        }if($me >= 281) {
	        	$to = 5;
	        }   if($me >= 351) {
	        	$to = 6;
	        } 
	        $data['total_sms'] = $data['total']*$to;	         
	        
    	}

        $this->db->insert('sms',$data);

        redirect('institute/send_sms');
	    
	}


    public function send_due_sms()
    {       
    	$data = array();
        $data['menu'] = "SMS";
        $data['title'] = "Due SMS";
        $data['private'] = $this->load->view('back/institute/sms/due_sms',$data,true);   
        $this->load->view('back/institute/index',$data);
    }

	public function sms_due($value='')
	{
		// print_r($this->input->post('trainee_id[]'));
		// print_r($this->input->post('name[]'));
		// print_r($this->input->post('mobile[]'));
		// print_r($this->input->post('due[]'));
		$trainee_id = $this->input->post('trainee_id[]');
		$name = $this->input->post('name[]');
		$mobile = $this->input->post('mobile[]');
		$due = $this->input->post('due[]');
		$date = $this->input->post('date');
		
		$value = array();
	    for($i = 0; $i < count($trainee_id); $i++) { 		        	
	        $value[$i] = array (		               
	            'name'		=>$name[$i],
	            'trainee_id'=>$trainee_id[$i],
	            'mobile'	=>$mobile[$i],
	            'due' =>$due[$i]
	        );	        
        	$phone = $mobile[$i];
        	$message = 'Dear '.$name[$i].', Your total due is : '.$due[$i].'TK, Please Pay before '.$date.'. '.$this->data['site_name'] ;   
        	$this->bdbulk->sendSMS($phone,$message);  

        	$data['code'] = $this->session->userdata('icode');
        	$data['message'] = $message;
        	$data['numbers'] = $phone;
	    	$data['total'] = 1;
	   	 	$data['total_sms'] = 1;
        	$this->db->insert('sms',$data);         			     	
		}
		
        $sdata['message'] = "Messege has been Sent!";
        $this->session->set_userdata($sdata);
		redirect('institute/send_due_sms');
	}

//==================== Gallery Starts ===========================================

	public function home_slider()
	{
		$data = array();
		$data['menu'] = "Gallery";
		$data['title'] = "Home Slider";
		$data['private'] = $this->load->view('back/institute/gallery/home_slider',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	function upload_slider_photo(){
 
        $data= array();
        $fileUpload = array();
        $isUpload = FALSE;
	    $userFile = array(
	        'upload_path' => './upload/slider',
	        'allowed_types' => 'jpg|png|jpeg|gif',
	        'encrypt_name' => FALSE,   
	        'max_size'    => 3000,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {
            $data = array();
            $data['userfile'] =$fileUpload['file_name'];
            $data['code'] = $this->session->userdata('icode');
            $data['title'] = $this->input->post('title');
            $this->db->insert('slider',$data);
            //message show after successfully saved data to database
            $sdata = array();
            $sdata['message'] = 'Slider Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('institute/home_slider');
        }
        else {
            $sdata = array();
            $sdata['exception'] = 'Invalid Image, Image Not Upladed!';
            $this->session->set_userdata($sdata);
            redirect('institute/home_slider');
        }
	}	




	public function create_gallery()
	{
		$data = array();
		$data['menu'] = "Gallery";
		$data['title'] = "Create Gallery";
		$data['private'] = $this->load->view('back/institute/gallery/create_gallery',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	
	public function gallery_groups_info()
	{
		$data = array();
		$data['code'] = $this->session->userdata('icode');
		$data['title'] = $this->input->post("title");
		$this->Super_admin_model->gallery_groups_info($data); 
		redirect('institute/create_gallery');
	}

	public function gallery_photo()
	{
		$data = array();
		$data['menu'] = "Gallery";
		$data['title'] = "Gallery Photos";
		$data['private'] = $this->load->view('back/institute/gallery/gallery_photo',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	function upload_gallery_photo(){
 
        $data= array();
        $fileUpload = array();
        $isUpload = FALSE;
	    $userFile = array(
	        'upload_path' => './upload/gallery',
	        'allowed_types' => 'jpg|png|jpeg|gif',
	        'encrypt_name' => FALSE,   
	        'max_size'    => 1000,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['userfile'] =$fileUpload['file_name'];
            $data['group_id'] = $this->input->post('id');
            $data['title'] = $this->input->post('title');
            $this->Super_admin_model->upload_gallery_photo($data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['userfile'] =$fileUpload['file_name'];
            $sdata['message'] = 'Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('institute/gallery_photo');
        }
        else {
            echo 'Invalid Image';
        }
	}

//==================== Gallery Ends ===========================================



	public function profile()
	{
		$data = array();
		$data['menu'] = "Settings";
		$data['title'] = "Profile";
		$data['private'] = $this->load->view('back/institute/pages/profile',$data,true);	
		$this->load->view('back/institute/index',$data);
	}
	

	public function download($fileName = NULL) {   
	   if ($fileName) {
	    $file = realpath ( "download" ) . "\\" . $fileName;
	    // check file exists    
	    if (file_exists ( $file )) {
	     // get file content
	     $data = file_get_contents ( $file );
	     //force download
	     force_download ( $fileName, $data );
	    } else {
	     // Redirect to base url
	     redirect ( base_url ('super_admin/myList') );
	    }
	   }
	  }











}


