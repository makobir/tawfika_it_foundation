<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends CI_Controller {

    function __construct() {
        parent::__construct();  
        $this->load->model('Institute_model', '', TRUE);
        $this->load->model('Exam_model', '', TRUE);
        $this->load->library('bdbulk');
        $site = $this->Authenticator_model->setting_data();
       	$sdata['icode'] = $site->code;
       $this->session->set_userdata($sdata);
  		$this->load->library('phpqrcode/qrlib');
  		$this->data = array(
            'url' => 'tif.org.bd/'
        );

    }


	public function admission_info($value='')
	{
				$data = array();	
				$icode = $this->session->userdata('icode');
				$dateOfBirth = $this->input->post('dob',true);
				$today = date('Y-m-d');
				$diff = date_diff(date_create($dateOfBirth), date_create($today));
				if($diff->format('%y') > 11 ) {
					$data['session'] = $this->input->post('session_id');
					$session = $this->input->post('session_id',true);
					$year = $this->input->post('year',true);
					$total = $this->Institute_model->total_student($year,$session);
					if($total == NULL) {
						$count = 1;
						$data['regi'] = $icode.($year-2000).$data['session'].str_pad($count,3,"0",STR_PAD_LEFT);
					}else {	
						$total = $total + 1;				
						$data['regi'] = $icode.($year-2000).$data['session'].str_pad($total,3,"0",STR_PAD_LEFT);
					}
					$regi = $data['regi'];
					$data['code'] = $this->session->userdata('icode');
					$data['name'] = ucwords(strtolower($this->input->post('name',true)));
					$data['father'] = ucwords(strtolower($this->input->post('father',true)));
					$data['mother'] = ucwords(strtolower($this->input->post('mother',true)));
					$data['dob'] = $this->input->post('dob',true);
					$data['gender'] = $this->input->post('gender',true);
					$data['religion'] = $this->input->post('religion',true);
					$data['blood'] = $this->input->post('blood',true);
					$data['nid'] = $this->input->post('nid',true);
					$data['birth'] = $this->input->post('birth',true);
					$data['mobile'] = $this->input->post('mobile',true);
					$data['email'] = $this->input->post('email',true);
					$data['status'] = 'Active';


					$data['division'] = $this->input->post('pdivision',true);
					$data['district'] = $this->input->post('pdistrict',true);
					$data['upazila'] = $this->input->post('pupazila',true);
					$data['village'] = $this->input->post('pvillage',true);
					$data['post'] = $this->input->post('ppost',true);
					$data['post_code'] = $this->input->post('ppost_code',true);

					$dat = array();
					$dat['trainee_id'] = $regi ;
					$dat['exam'] = $this->input->post('exam',true);
					$dat['board'] = $this->input->post('board',true);
					$dat['roll'] = $this->input->post('roll',true);
					$dat['passing_year'] = $this->input->post('passing_year',true);
					$dat['result'] = $this->input->post('result',true);
					$dat['exam2'] = $this->input->post('exam2',true);
					$dat['board2'] = $this->input->post('board2',true);
					$dat['roll2'] = $this->input->post('roll2',true);
					$dat['passing_year2'] = $this->input->post('passing_year2',true);
					$dat['result2'] = $this->input->post('result2',true);


					if($this->input->post('same') == 1 ){
						$data['pdivision'] = $this->input->post('pdivision',true);
						$data['pdistrict'] = $this->input->post('pdistrict',true);
						$data['pupazila'] = $this->input->post('pupazila',true);
						$data['pvillage'] = $this->input->post('pvillage',true);
						$data['ppost'] = $this->input->post('ppost',true);
						$data['ppost_code'] = $this->input->post('ppost_code',true);
					}else {
						$data['pdivision'] = $this->input->post('prdivision',true);
						$data['pdistrict'] = $this->input->post('prdistrict',true);
						$data['pupazila'] = $this->input->post('prupazila',true);
						$data['pvillage'] = $this->input->post('prvillage',true);
						$data['ppost'] = $this->input->post('prpost',true);
						$data['ppost_code'] = $this->input->post('prpost_code',true);
					}

					if($this->input->post('relation',true) == "Father") {
						$data['gurdian'] = $this->input->post('father',true);
					}
					elseif($this->input->post('relation',true) == "Mother") {
						$data['gurdian'] = $this->input->post('mother',true);
					}
					else {
						$data['gurdian'] = $this->input->post('gurdian',true);
					}				
					$data['relation'] = $this->input->post('relation',true);
					$data['gurdian_mobile'] = $this->input->post('gurdian_mobile',true);
					$data['email'] = $this->input->post('email',true);
					if ($this->input->post('admission_date',true) == NULL) {
						$data['admission_date'] = date('d-m-Y');
						$admission_date = date('d-m-Y');
					} else {
						$orgDate = $this->input->post('admission_date');  
	     				$date = date("d-m-Y", strtotime($orgDate)); 
						$data['admission_date'] = $date;
						$admission_date = $date;
					}




					$fileUpload = array();
			        $isUpload = FALSE;
			        $userFile = array(
			            'upload_path' => './upload/user',
			            'allowed_types' => 'jpg|png|jpeg|gif',
			            'encrypt_name' => TRUE,   
			            'max_size'    => 200,
			        );
			        $this->upload->initialize($userFile);
			        if ($this->upload->do_upload('userfile')) {
			            $fileUpload = $this->upload->data();
			            $isUpload = TRUE;
			        }
			        if ($isUpload) {        	
					$data['userfile'] = $fileUpload['file_name'];
					$file_name = $fileUpload['file_name'];
			        }else {
			        	echo 'Invalid Image!';
			        }


					$fileUpload2 = array();
			        $isUpload2 = FALSE;
			        $userFile2 = array(
			            'upload_path' => './upload/document',
			            'allowed_types' => 'jpg|png|jpeg|gif',
			            'encrypt_name' => TRUE,  
			            'max_size'    => 300,
			        );
			        $this->upload->initialize($userFile2);
			        if ($this->upload->do_upload('userfile2')) {
			            $fileUpload2 = $this->upload->data();
			            $isUpload2 = TRUE;
			        }
			        if ($isUpload2) {        	
					$data['userfile2'] = $fileUpload2['file_name'];
			        }else {
			        	// echo 'Invalid NID/Birth!';
			        }

			        if ($isUpload) {    

						$this->Institute_model->trainee_info($data);
						//============== BTEB =========================================						
						if($this->input->post('bteb') != NULL ) {
							$a['code']  = $this->session->userdata('icode');
							$a['trainee_id']  = $regi;
							$a['course_id']  = $this->input->post('course_id');
							$a['session_id']  = $session;	      	       			     
							$a['date'] = date('d-m-Y');	      	       			     
							$this->db->insert('bteb_students',$a);
						} 
						//======= Education ========================================
						$this->db->insert('education',$dat);
						//====== Course Enroll ========================================
						$this->course_enroll($regi,$admission_date);
						//====== User Signup ========================================				
						$this->user_signup($regi,$file_name);
						//======= QR Code Generator ===================================				
						$this->appqrcodeGenerator($regi);
				    	$sdata['message'] = 'Student Admitted.';
				    	$this->session->set_userdata($sdata);
				    	//=========== Aditional info add ======================
				    	if($this->input->post('donor') == 'Yes') { 		    		
							$ata['name'] = $this->input->post('name');
							$ata['mobile'] = $this->input->post('mobile');
							$ata['group'] = $this->input->post('blood');
							$ata['email'] = $this->input->post('email');
							$ata['division'] = $this->input->post('pdivision');
							$ata['district'] = $this->input->post('pdistrict');
							$ata['upazila'] = $this->input->post('pupazila');
							$ata['address'] = $this->input->post('pvillage');
							$ata['status'] = 'Approved';
							$this->db->insert('blood_donors',$ata);				
				    	}

				    	$this->session->unset_userdata('aadmission_date');
						$this->session->unset_userdata('asession');
						$this->session->unset_userdata('ayear');
						$this->session->unset_userdata('acourse');
						$this->session->unset_userdata('aname');
						$this->session->unset_userdata('afather');
						$this->session->unset_userdata('amother');
						$this->session->unset_userdata('adob');
						$this->session->unset_userdata('agender');
						$this->session->unset_userdata('areligion');
						$this->session->unset_userdata('ablood');
						$this->session->unset_userdata('anid');
						$this->session->unset_userdata('abirth');		
						$this->session->unset_userdata('avillage');
						$this->session->unset_userdata('amobile');
						$this->session->unset_userdata('aemail');
						$this->session->unset_userdata('arelation');
						$this->session->unset_userdata('agurdian_mobile');
						$this->session->unset_userdata('agurdian');
						$this->session->unset_userdata('aexam');
						$this->session->unset_userdata('aboard');
						$this->session->unset_userdata('aroll');
						$this->session->unset_userdata('apassing_year');
						$this->session->unset_userdata('aresult');
						$this->session->unset_userdata('aexam2');
						$this->session->unset_userdata('aboard2');
						$this->session->unset_userdata('aroll2');
						$this->session->unset_userdata('apassing_year2');
						$this->session->unset_userdata('aresult2');
						redirect('admission/payment/'.$regi);

					} else {						
						$s['aadmission_date'] = $this->input->post('admission_date');
						$s['asession'] = $this->input->post('session_id');
						$s['ayear'] = $this->input->post('year');
						$s['acourse'] = $this->input->post('course_id');
						$s['aname'] = ucwords(strtolower($this->input->post('name',true)));
						$s['afather'] = ucwords(strtolower($this->input->post('father',true)));
						$s['amother'] = ucwords(strtolower($this->input->post('mother',true)));
						$s['adob'] = $this->input->post('dob',true);
						$s['agender'] = $this->input->post('gender',true);
						$s['areligion'] = $this->input->post('religion',true);
						$s['ablood'] = $this->input->post('blood',true);
						$s['anid'] = $this->input->post('nid',true);
						$s['abirth'] = $this->input->post('birth',true);		
						$s['aaddress'] = $this->input->post('avillage',true);
						$s['aaddress'] = $this->input->post('apost',true);
						$s['aaddress'] = $this->input->post('apost_code',true);
						$s['amobile'] = $this->input->post('mobile',true);
						$s['aemail'] = $this->input->post('email',true);
						$s['arelation'] = $this->input->post('relation',true);
						$s['agurdian_mobile'] = $this->input->post('gurdian_mobile',true);
						$s['agurdian'] = $data['gurdian'];
						$s['aexam'] = $this->input->post('exam',true);
						$s['aboard'] = $this->input->post('board',true);
						$s['aroll'] = $this->input->post('roll',true);
						$s['apassing_year'] = $this->input->post('passing_year',true);
						$s['aresult'] = $this->input->post('result',true);
						$s['aexam2'] = $this->input->post('exam2',true);
						$s['aboard2'] = $this->input->post('board2',true);
						$s['aroll2'] = $this->input->post('roll2',true);
						$s['apassing_year2'] = $this->input->post('passing_year2',true);
						$s['aresult2'] = $this->input->post('result2',true);
						$s['message'] = 'Please check all information';
		    			$this->session->set_userdata($s);
		    			redirect('institute/admission');
					}
			}

			else {


		    	$sdata['message'] = 'Min age 11 required, Trainee age is :'.$diff->format('%y');
		    	$this->session->set_userdata($sdata);
		    	redirect('institute/admission');
			}
				//$id = $sid;
				//$this->appqrcodeGenerator($id);

		//redirect('institute/trainee/'.$regi);
	}



	public function print_preview($id) {
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "Payment";
		$data['payment'] = $this->Institute_model->payment($id);
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['course'] = $this->Institute_model->courseinfo($id);
		$data['exam'] = $this->Exam_model->admitinfo($id);
		$data['private'] = $this->load->view('back/institute/trainee_management/print_admission_form',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function online_admission()
	{
				$data = array();	
				$icode = $this->session->userdata('icode');

    //             foreach ($this->Institute_model->last_regi() as $key => $last_id) { };
    //             if (isset($last_id)) {
    //                $data['regi'] = $last_id->regi + 1 ;
    //             }else {
    //             	$regi = 1;
				// 	$data['regi'] = $icode.date('y').str_pad($regi,4,"0",STR_PAD_LEFT);
				// };

				$dateOfBirth = $this->input->post('dob',true);
				$today = date('Y-m-d');
				$diff = date_diff(date_create($dateOfBirth), date_create($today));
				if($diff->format('%y') > 11 ) {
				$data['session'] = $this->input->post('session_id');
				$session = $this->input->post('session_id',true);
				$year = $this->input->post('year',true);
				$total = $this->Institute_model->total_student($year,$session);
				$count = $total + 1;
				$data['regi'] = $icode.$year.$data['session'].str_pad($count,3,"0",STR_PAD_LEFT);
				$regi = $data['regi'];
				$data['code'] = $this->session->userdata('icode');
				$data['name'] = $this->input->post('name',true);
				$data['father'] = $this->input->post('father',true);
				$data['mother'] = $this->input->post('mother',true);
				$data['dob'] = $this->input->post('dob',true);
				$data['gender'] = $this->input->post('gender',true);
				$data['religion'] = $this->input->post('religion',true);
				$data['blood'] = $this->input->post('blood',true);
				$data['nid'] = $this->input->post('nid',true);
				$data['birth'] = $this->input->post('birth',true);
				$data['division'] = $this->input->post('division',true);
				$data['district'] = $this->input->post('district',true);
				$data['upazila'] = $this->input->post('upazila',true);
				$data['address'] = $this->input->post('address',true);
				$data['mobile'] = $this->input->post('mobile',true);
				$data['email'] = $this->input->post('email',true);
				if ($this->input->post('admission_date',true) == NULL) {
					$data['admission_date'] = date('d-m-Y');
					$admission_date = date('d-m-Y');
				} else {
					$orgDate = $this->input->post('admission_date');  
     				$date = date("d-m-Y", strtotime($orgDate)); 
					$data['admission_date'] = $date;
					$admission_date = $date;
				}

				$fileUpload = array();
		        $isUpload = FALSE;
		        $userFile = array(
		            'upload_path' => './upload/user',
		            'allowed_types' => 'jpg|png|jpeg|gif',
		            'encrypt_name' => TRUE,   
		            'max_size'    => 100,
		        );
		        $this->upload->initialize($userFile);
		        if ($this->upload->do_upload('userfile')) {
		            $fileUpload = $this->upload->data();
		            $isUpload = TRUE;
		        }
		        if ($isUpload) {        	
				$data['userfile'] = $fileUpload['file_name'];
				$file_name = $regi.' : '.$fileUpload['file_name'];
		        }else {
		        	echo 'Invalid Image!';
		        }


				$fileUpload2 = array();
		        $isUpload2 = FALSE;
		        $userFile2 = array(
		            'upload_path' => './upload/document',
		            'allowed_types' => 'jpg|png|jpeg|gif',
		            'encrypt_name' => TRUE,  
		            'max_size'    => 300,
		        );
		        $this->upload->initialize($userFile2);
		        if ($this->upload->do_upload('userfile2')) {
		            $fileUpload2 = $this->upload->data();
		            $isUpload2 = TRUE;
		        }
		        if ($isUpload2) {        	
				$data['userfile2'] = $fileUpload2['file_name'];
		        }else {
		        	// echo 'Invalid NID/Birth!';
		        }
		         if ($isUpload) {    
				$this->Institute_model->trainee_info($data);
				//====== Course Enroll ========================================
				$this->course_enroll($regi);
				//====== User Signup ========================================				
				$this->user_signup($regi,$file_name);
				//======= QR Code Generator ===================================				
				$this->appqrcodeGenerator($regi);
		    	$sdata['message'] = 'Student Admitted.';
		    	$this->session->set_userdata($sdata);
		    	//=========== Aditional info add ======================

				redirect('home/admission');

				}
			} else {				
		    	$sdata['message'] = 'Min age 11 required, Trainee age is :'.$diff->format('%y');
		    	$this->session->set_userdata($sdata);
		    	redirect('home/admission');
			}
				//$id = $sid;
				//$this->appqrcodeGenerator($id);
			
		redirect('institute/trainee/'.$regi);

	
	}

	public function payment($id) {
		$data = array();
		$data['menu'] = "Trainee Management";
		$data['title'] = "Payment";
		$data['payment'] = $this->Institute_model->payment($id);
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['course'] = $this->Institute_model->courseinfo($id);
		$data['exam'] = $this->Exam_model->admitinfo($id);
		$data['private'] = $this->load->view('back/institute/trainee_management/details',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function course_enroll($regi,$admission_date)
	{
		$enroll['trainee_id'] = $regi;
		$enroll['code'] = $this->session->userdata('icode');
		$enroll['year'] = $this->input->post('year');
		$enroll['session_id'] = $this->input->post('session_id');

		if($enroll['session_id'] == 31 or $enroll['session_id'] == 32 or $enroll['session_id'] == 33 or $enroll['session_id'] ==34) {
		  $enroll['duration'] = 3;
		}
		if($enroll['session_id'] == 21 or $enroll['session_id'] == 22 ) {
		  $enroll['duration'] = 6;
		}
		if($enroll['session_id'] == 11 or $enroll['session_id'] == 12 ) {
		  $enroll['duration'] = 12;
		}
		$fee = $this->Institute_model->enrolled_course($this->input->post('course_id'));
		if($fee != NULL) {
		$enroll['year'] = $this->input->post('year');;
		$enroll['course_fee'] = $fee->course_fee;
		$enroll['admission'] = $fee->admission;
		$enroll['registration'] = $fee->registration;
		$enroll['exam'] = $fee->exam;
		$enroll['idcard'] = $fee->idcard;
		$enroll['center'] = $fee->center;
		$enroll['practical'] = $fee->practical;
		$enroll['others'] = $fee->others;
		$enroll['course_id'] = $this->input->post('course_id');
		$enroll['admission_date'] = $admission_date;
		}else {
		$enroll['year'] = $this->input->post('year');;
		$enroll['course_fee'] = 0;
		$enroll['admission'] = 0;
		$enroll['registration'] = 0;
		$enroll['exam'] = 0;
		$enroll['idcard'] = 0;
		$enroll['center'] = 0;
		$enroll['practical'] = 0;
		$enroll['others'] = 0;
		$enroll['course_id'] = $this->input->post('course_id');
		$enroll['admission_date'] = $admission_date;
		}

		$this->Institute_model->course_enroll($enroll);
	}




	public function user_signup($regi,$file_name)
	{
		$user['code'] = $this->session->userdata('icode');
		$user['trainee_id'] = $regi;
		$user['role'] = 'trainee';
		$user['name'] = $this->input->post('name');
		$user['mobile'] = $this->input->post('mobile');
		$user['email2'] = $this->input->post('email');
		$user['email'] = $regi;         
        $pass = $this->generate_password();
		$user['password'] = $pass;
		$user['email_verification'] = '1';        	
		$user['userfile'] = $file_name;
		$this->Institute_model->user_signup($user);


        $phone = $this->input->post('mobile'); 
        $message = 'Congratulations! '.$user['name'].', You are admitted to TIF affiliated Training Center. Your User ID: '.$regi. ', & Password: '.$pass.' . To login visit https://tif.org.bd/login  : Tawfika IT Foundation.';
       // $this->bdbulk->sendSMS($phone,$message);
	}

	public function update_info($value='')
		{				
			$regi = $this->input->post('regi',true);
			$dateOfBirth = $this->input->post('dob',true);
			$today = date('Y-m-d');
			$diff = date_diff(date_create($dateOfBirth), date_create($today));
			if($diff->format('%y') > 11 ) {
			$data['session'] = $this->input->post('session_id');	
			$data['name'] = $this->input->post('name',true);
			$data['father'] = $this->input->post('father',true);
			$data['mother'] = $this->input->post('mother',true);
			$data['dob'] = $this->input->post('dob',true);
			$data['gender'] = $this->input->post('gender',true);
			$data['religion'] = $this->input->post('religion',true);
			$data['blood'] = $this->input->post('blood',true);
			$data['nid'] = $this->input->post('nid',true);
			$data['birth'] = $this->input->post('birth',true);
			if($this->input->post('pdivision',true) != NULL ) {
				$data['division'] = $this->input->post('pdivision',true);
			}if($this->input->post('pdistrict',true) != NULL ) {
				$data['district'] = $this->input->post('pdistrict',true);
			}if($this->input->post('pupazila',true) != NULL ) {
				$data['upazila'] = $this->input->post('pupazila',true);
			}
			$data['village'] = $this->input->post('pvillage',true);
			$data['post'] = $this->input->post('ppost',true);
			$data['post_code'] = $this->input->post('ppost_code',true);
			if($this->input->post('same') == 1 ){
				if($this->input->post('pdivision',true) != NULL ) {
				$data['pdivision'] = $this->input->post('pdivision',true);
				}if($this->input->post('pdistrict',true) != NULL ) {
				$data['pdistrict'] = $this->input->post('pdistrict',true);
				}if($this->input->post('pupazila',true) != NULL ) {
				$data['pupazila'] = $this->input->post('pupazila',true);
				}
				$data['pvillage'] = $this->input->post('pvillage',true);
				$data['ppost'] = $this->input->post('ppost',true);
				$data['ppost_code'] = $this->input->post('ppost_code',true);
			}else {
				if($this->input->post('prdivision',true) != NULL ) {
				$data['pdivision'] = $this->input->post('prdivision',true);
				}if($this->input->post('district',true) != NULL ) {
				$data['pdistrict'] = $this->input->post('prdistrict',true);
				}if($this->input->post('upazila',true) != NULL ) {
				$data['pupazila'] = $this->input->post('prupazila',true);
				}
				$data['pvillage'] = $this->input->post('prvillage',true);
				$data['ppost'] = $this->input->post('prpost',true);
				$data['ppost_code'] = $this->input->post('prpost_code',true);
			}
			$data['mobile'] = $this->input->post('mobile',true);
			$data['email'] = $this->input->post('email',true);				
			$data['gurdian'] = $this->input->post('gurdian',true);							
			$data['relation'] = $this->input->post('relation',true);
			$data['gurdian_mobile'] = $this->input->post('gurdian_mobile',true);
			$data['email'] = $this->input->post('email',true);	
				
			$orgDate = $this->input->post('admission_date');  
 			$date = date("d-m-Y", strtotime($orgDate)); 
			$data['admission_date'] = $date;
			$admission_date = $date;
		

			$dat = array();
			$dat['exam'] = $this->input->post('exam',true);
			$dat['board'] = $this->input->post('board',true);
			$dat['roll'] = $this->input->post('roll',true);
			$dat['passing_year'] = $this->input->post('passing_year',true);
			$dat['result'] = $this->input->post('result',true);
			$dat['exam2'] = $this->input->post('exam2',true);
			$dat['board2'] = $this->input->post('board2',true);
			$dat['roll2'] = $this->input->post('roll2',true);
			$dat['passing_year2'] = $this->input->post('passing_year2',true);
			$dat['result2'] = $this->input->post('result2',true);
			$this->db->where('trainee_id',$regi);
			$this->db->update('education',$dat);

			$fileUpload = array();
	        $isUpload = FALSE;
	        $userFile = array(
	            'upload_path' => './upload/user',
	            'allowed_types' => 'jpg|png|jpeg|gif',
	            'encrypt_name' => TRUE,   
	            'max_size'    => 100,
	        );
	        $this->upload->initialize($userFile);
	        if ($this->upload->do_upload('userfile')) {
	            $fileUpload = $this->upload->data();
	            $isUpload = TRUE;
	        }
	        if ($isUpload) {        	
			$data['userfile'] = $fileUpload['file_name'];
			$file_name = $fileUpload['file_name'];
	        }


			$fileUpload2 = array();
	        $isUpload2 = FALSE;
	        $userFile2 = array(
	            'upload_path' => './upload/document',
	            'allowed_types' => 'jpg|png|jpeg|gif',
	            'encrypt_name' => TRUE,  
	            'max_size'    => 300,
	        );
	        $this->upload->initialize($userFile2);
	        if ($this->upload->do_upload('userfile2')) {
	            $fileUpload2 = $this->upload->data();
	            $isUpload2 = TRUE;
	        }
	        if ($isUpload2) {        	
			$data['userfile2'] = $fileUpload2['file_name'];
	        }	           
	        $this->db->where('regi',$regi);
	        $this->db->update('trainee',$data);	
	        $this->update_course_enroll($regi,$admission_date);
			redirect('institute/trainee/'.$regi);

			}		
	
	}

	public function update_course_enroll($regi,$admission_date)
	{
		
		$enroll['year'] = $this->input->post('year');
		$enroll['session_id'] = $this->input->post('session_id');
		if($enroll['session_id'] == 31 or $enroll['session_id'] == 32 or $enroll['session_id'] == 33 or $enroll['session_id'] ==34) {
		  $enroll['duration'] = 3;
		}
		if($enroll['session_id'] == 21 or $enroll['session_id'] == 22 ) {
		  $enroll['duration'] = 6;
		}
		if($enroll['session_id'] == 11 or $enroll['session_id'] == 12 ) {
		  $enroll['duration'] = 12;
		}
		$fee = $this->Institute_model->enrolled_course($this->input->post('course_id'));
		if($fee != NULL) {
		$enroll['year'] = $this->input->post('year');;
		$enroll['course_fee'] = $fee->course_fee;
		$enroll['admission'] = $fee->admission;
		$enroll['registration'] = $fee->registration;
		$enroll['exam'] = $fee->exam;
		$enroll['idcard'] = $fee->idcard;
		$enroll['center'] = $fee->center;
		$enroll['practical'] = $fee->practical;
		$enroll['others'] = $fee->others;
		$enroll['course_id'] = $this->input->post('course_id');
		$enroll['admission_date'] = $admission_date;
		}else {
		$enroll['year'] = $this->input->post('year');;
		$enroll['course_fee'] = 0;
		$enroll['admission'] = 0;
		$enroll['registration'] = 0;
		$enroll['exam'] = 0;
		$enroll['idcard'] = 0;
		$enroll['center'] = 0;
		$enroll['practical'] = 0;
		$enroll['others'] = 0;
		$enroll['course_id'] = $this->input->post('course_id');
		$enroll['admission_date'] = $admission_date;
		}
		$this->db->where('trainee_id',$regi);
		$this->db->update('course_enroll',$enroll);
	}

    private function generate_password(int $length = 8)
    {
        $otp = "";
        $numbers = "123456789ABCSEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        };
        return $otp;
    }


	
	public function appqrcodeGenerator($regi)
	{	
		$t = $this->Institute_model->single_trainee($regi);
		$qrtext2 = $regi;
		$qrtext = 'Name : '.$t->name.'
Regi : '.$t->regi.'
Course : '.$t->course.'
Session: '.$t->session.','.$t->year.'
https://'.$this->data['url'].'home/regi/'.$regi;
		if(isset($qrtext))
		{
			//file path for store images
		    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/images/';
		   	$text = $qrtext2;
			$text1= substr($text, 0,9);			
			$folder = $SERVERFILEPATH;
			$file_name1 = $text1.rand(2,200).".png";
			$file_name = $folder.$file_name1;
			QRcode::png($text,$file_name);
			$qdata['qr'] = $file_name1;
			//===== Update QR info =============			
			$this->Institute_model->update_qr_info($regi,$qdata);
		}
		else
		{
			echo 'No Text Entered';
		}	
	}



 }