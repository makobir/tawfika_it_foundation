<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier extends CI_Controller {

    function __construct() {
        parent::__construct();        
        $this->load->model('Courier_model', '', TRUE);
        $this->load->library('bdbulk');
        $admin_id = $this->session->userdata('id');
        $usertype = $this->session->userdata('usertype');
        if ($admin_id == NULL and $usertype != 'super_admin' ) {
            redirect('authenticator', 'refresh');
        }
        // if ($usertype != 'super_admin' ) {
        //     redirect('authenticator/thanks', 'refresh');
        // }
        $site = $this->Authenticator_model->site();
        $this->data = array(
            //'theme' => $site->theme,
            //'type' => $site->type,
         //   'language' => $site->lang
        );
      //  $this->lang->load('language',$this->data['language']);


		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		//echo $this->data['now'];
		//echo $usertype;
    }


	public function receive($id='')
	{
		$data = array();
		$data['menu'] = "Courier";
		$data['title'] = "Receive";
		$data['id'] = $id;
		$data['documents'] = $this->Courier_model->documents($id);
		$data['private'] = $this->load->view('back/courier/courier',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function details($id='')
	{
		$not = $id;
		$data['is_view'] = 1;
		$this->Courier_model->update_view($id, $data);
		$data = array();
		$data['menu'] = "Courier";
		$data['title'] = "Receive";
		$data['document'] = $this->Courier_model->documents_details($id);
		$data['private'] = $this->load->view('back/courier/details',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function history($id='')
	{
		$data = array();
		$data['menu'] = "Courier";
		$data['title'] = "History";
		$data['id'] = $id;
		$data['documents'] = $this->Courier_model->documents($id);
		$data['private'] = $this->load->view('back/courier/courier',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function receive_now($id) {
		$data['status'] = 'Received';
		$data['received_date'] = date('d-m-Y');
		$this->Courier_model->update_status($id,$data);
		//$this->Courier_model->update_status_exam_enroll($id,$data);
		redirect('courier/receive');
	}

//======================= Super Admin Area ======================================================
	public function send($id='')
	{
		$data = array();
		$data['menu'] = "Courier";
		$data['title'] = "Send";
		$data['id'] = $id;
		$data['documents'] = $this->Courier_model->documents($id);
		$data['private'] = $this->load->view('back/courier/courier',$data,true);	
		$this->load->view('back/index',$data);
	}


	public function send_to($id)
	{
		$code = $id;
		$data = array();
		$data['code'] = $id;
		$data['name'] = $this->input->post('name');
		$data['details'] = $this->input->post('details');
        $data['status'] = 'Send'; 			
        $data['date'] = date('d-m-Y'); 			
		$id = $this->Courier_model->send($data);

		$trainee_id = $this->input->post('trainee_id[]');
		if(isset($trainee_id)) {
	        $value = array();
	        for($i = 0; $i < count($trainee_id); $i++) { 
	            $value[$i] = array (
	                'trainee_id'	=>$trainee_id[$i],
	                'courier_id' 	=> $id
	            ); 
		    }
		    $this->Courier_model->update_courier_info($value);
		}
	    //================= Send Notification ======================
	    $not['to'] = $code;
	    $not['for'] = 'Courier';
	    $not['id'] = $id;
		$this->Courier_model->notification($not);

		$id = $data['code'];
		$center = $this->Courier_model->center($id);
        $phone = $center->mobile; 
        $message = 'A courier has been sent to you. Please check for details, Tawfika IT Foundation.';
        $this->bdbulk->sendSMS($phone,$message);

	redirect('courier/send');
	
	}




	public function report()
	{
		$data = array();
		$data['menu'] = "Courier";
		$data['title'] = "Report";
		$data['private'] = $this->load->view('back/courier/courier',$data,true);	
		$this->load->view('back/index',$data);
	}















}


