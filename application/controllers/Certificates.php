<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Courier_model','');
        $this->load->model('Institute_model','');
        $this->load->model('Exam_model','');
  		$this->load->library('phpqrcode/qrlib');
        $admin_id = $this->session->userdata('id');
        $usertype = $this->session->userdata('usertype');
        if ($admin_id == NULL and $usertype != 'cert' ||  $usertype != 'super_admin' ) {
            redirect('authenticator', 'refresh');
        }
        
       // if ($admin_id == NULL) {
       //      redirect('authenticator', 'refresh');
       //  }
       //  if ($usertype != 'super_admin' || $usertype != 'branch'  ) {
       //      redirect('authenticator/thanks', 'refresh');
       //  }

		$this->data = array(
            'url' => 'tif.org.bd/'
        );
		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		//echo $this->data['now'];
    }





	public function reissue()
	{
		$data = array();
		$data['menu'] = "Certificates";
		$data['title'] = "Reissue Certificate";
		$data['private'] = $this->load->view('back/institute/pages/certificates',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function reissue_cert($value='')
	{
		$data = array();
		$data['code'] = $this->session->userdata('icode');
		$data['regi'] = $this->input->post("id");
		$data['type'] = 'Reissued';
		$data['date'] = date('d-m-Y');
		$check = $this->Certificates_model->check_exam_enroll($data['regi']);
		if($check != NULL) {
		$this->Certificates_model->reissue_cert($data); 
		} else {			
	    	$sdata['exception'] = ' Information not found !';
	    	$this->session->set_userdata($sdata);
		}
		redirect('certificates/all');
	}




	public function all()
	{
		$data = array();
		$data['menu'] = "Certificates";
		$data['title'] = "All Certificates";
		$data['id'] = 0;
		//$data['info'] = $this->Certificates_model->application_info($id);
		//$info = $this->Certificates_model->application_info($id);
		$data['private'] = $this->load->view('back/institute/pages/certificates',$data,true);	
		$this->load->view('back/institute/index',$data);
	}






//======================================= Super Admin Functinos ===========================================


	public function issue()
	{
		$data = array();
		$data['menu'] = "Certificates";
		$data['title'] = "Issue Certificate";	
		$id = $this->input->post('code');	
		$data['id'] = $this->input->post('code');	
		$data['documents'] = $this->Courier_model->enrolled($id);
		$data['private'] = $this->load->view('back/pages/issue',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function reissueapp()
	{
		$data = array();
		$data['menu'] = "Certificates";
		$data['title'] = "Reissue Application";	
		$id = $this->input->post('code');	
		$data['id'] = $this->input->post('code');	
		$data['documents'] = $this->Courier_model->enrolled($id);
		$data['private'] = $this->load->view('back/pages/issue',$data,true);	
		$this->load->view('back/index',$data);
	}


	public function issue_cert($value='')
	{
		$data = array();
		$trainee_id = $this->input->post('trainee_id[]');
		$code = $this->input->post('code');
        $status = 'Approved'; 			
        $date = date('d-m-Y'); 	

		if(isset($trainee_id)) {
	        $value = array();
	        for($i = 0; $i < count($trainee_id); $i++) {  
	        	$regi = $trainee_id[$i];
	        	$this->appqrcodeGenerator($regi);
	            $value[$i] = array (
	                'regi'	=>$trainee_id[$i],
	                'qr'	=>$this->session->userdata('qr'),
	                'status'	=>$status,
	                'type'	=>'Issued',
	                'date'	=>$date,
	                'code' 	=> $code
	            );        	 
		    }
		    $id = $this->Certificates_model->issue_cert($value);
		}
	    //================= Send Notification ======================
	    $not['to'] = $code;
	    $not['for'] = 'Certificate Issued';
		$this->Courier_model->notification($not);


	    $sdata['message'] = ' Certificate Issued !';
	    $this->session->set_userdata($sdata);
		redirect('certificates/all_cert');
	}







	public function approve_now($id){
		$data['status'] = 'Approved';
		$this->Certificates_model->approve_now($id, $data);
		redirect('certificates/all_cert');
	}	

	public function print_complet($id){
		$data['print'] = 'Printed';
		$this->db->where('regi',$id);
		$this->db->update('certificates',$data);
		redirect('certificates/all_cert');
	}

	public function all_cert()
	{
		$data = array();
		$data['menu'] = "Certificates";
		$data['title'] = "All Certificates";
		$id = $this->input->post('code');	
		$data['id'] = $this->input->post('code');	
		$data['documents'] = $this->Courier_model->documents($id);
		$data['private'] = $this->load->view('back/pages/issue',$data,true);	
		$this->load->view('back/index',$data);
	}


public function print_certificate($id)
	{
		$data = array();
		$data['menu'] = "Exam Management";
		$data['title'] = "Print Certificate";
		$data['payment'] = $this->Institute_model->payment($id);
		$data['course'] = $this->Institute_model->courseinfo($id);
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['exam'] = $this->Exam_model->admitinfo($id);
		$data['private'] = $this->load->view('back/certificate/print',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function appqrcodeGenerator($regi)
	{	
		$r = $this->Certificates_model->markscheck($regi);
		$total= $r->mcq+$r->attendance+$r->viva+$r->practical+$r->typing;
		if($total > 160) {
			$re = 'A+';
		}elseif($total >= 140) {
			$re = 'A';
		}elseif($total >= 120) {
			$re = 'A-';
		}elseif($total >= 100) {
			$re = 'B';
		}elseif($total < 100) {
			$re = 'Failed';
		}
		$t = $this->Institute_model->single_trainee($regi);
		$qrtext = 'Name : '.$t->name.'
Regi : '.$t->regi.'
Course : '.$t->course.'
Session: '.$t->session.','.$t->year.'
Result: '.$re.'
https://'.$this->data['url'].'result/'.$regi;
		if(isset($qrtext))
		{
			//file path for store images
		    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/images/';
		   	$text = $qrtext;
			$text1= substr($text, 0,9);			
			$folder = $SERVERFILEPATH;
			$file_name1 = $text1.rand(2,200).".png";
			$file_name = $folder.$file_name1;
			QRcode::png($text,$file_name);
			$qdata['qr'] = $file_name1;
			$this->session->set_userdata($qdata);
			//===== Update QR info =============			
			//$this->Certificates_model->certificate_qr_info($regi,$qdata);
		}
		else
		{
			echo 'No Text Entered';
		}	
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


